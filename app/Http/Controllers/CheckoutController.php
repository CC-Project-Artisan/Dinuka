<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Models\Cart;

class CheckoutController extends Controller
{
    // Display the checkout page with cart items and subtotal
    public function Checkout()
    {
        $cartItems = [];
        $subtotal = 0;

        if (Auth::check()) {
            // Get cart items for authenticated user
            $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
            $subtotal = $cartItems->sum(fn ($item) => $item->price * $item->quantity);
        } else {
            // Get cart items from session for guest user
            $cart = session()->get('cart', []);
            foreach ($cart as $item) {
                $subtotal += $item['price'] * $item['quantity'];
                $cartItems[] = (object) $item;
            }
        }

        return view('pages.checkout', compact('cartItems', 'subtotal'));
    }

    // Handle delivery details submission
    public function Delivery(Request $request)
    {
        // Validate delivery details
        $request->validate([
            'email' => 'required|email',
            'country' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'apartment' => 'nullable',
            'city' => 'required',
            'postal_code' => 'nullable',
            'phone' => 'required',
        ]);

        // Save delivery details in session
        session()->put('delivery_details', $request->only(
            'email', 'country', 'first_name', 'last_name', 'address', 'apartment', 'city', 'postal_code', 'phone'
        ));

        return response()->json(['success' => true, 'message' => 'Delivery details saved.']);
    }

    // Handle payment processing
    public function Payment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Create a Payment Intent
            $paymentIntent = PaymentIntent::create([
                'amount' => $request->total * 100,
                'currency' => 'lkr',
                'payment_method' => $request->payment_method,
                'confirmation_method' => 'manual',
                'confirm' => true,
            ]);

            if ($paymentIntent->status == 'succeeded') {
                // Retrieve delivery details and cart items from session
                $deliveryDetails = session('delivery_details');
                $cartItems = Auth::check()
                    ? Cart::where('user_id', Auth::id())->get()->toArray()
                    : session('cart', []);

                if (!$deliveryDetails || !$cartItems) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Delivery details or cart data is missing.',
                    ]);
                }

                // Create order and order items
                $this->createOrder($deliveryDetails, $cartItems, $paymentIntent->id, $request->payment_method);

                // Clear cart and delivery details from session
                if (Auth::check()) {
                    Cart::where('user_id', Auth::id())->delete();
                } else {
                    session()->forget('cart');
                }
                session()->forget('delivery_details');

                return response()->json(['success' => true, 'message' => 'Payment successful!']);
            }

            return response()->json(['success' => false, 'message' => 'Payment not confirmed.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    // Create a Payment Intent for Stripe
    public function createPaymentIntent(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $request->amount * 100,
                'currency' => 'lkr',
                'automatic_payment_methods' => [
                    'enabled' => true,
                    'allow_redirects' => 'never',
                ],
            ]);

            return response()->json([
                'clientSecret' => $paymentIntent->client_secret,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    // Handle payment completion
    public function handlePaymentComplete(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $paymentIntentId = $request->query('payment_intent');
        $paymentStatus = $request->query('redirect_status');

        if ($paymentStatus === 'succeeded') {
            try {
                // Retrieve the Payment Intent
                $paymentIntent = PaymentIntent::retrieve($paymentIntentId);

                // Retrieve delivery details and cart items from session
                $deliveryDetails = session('delivery_details');
                $cartItems = session('cart');

                if (!$deliveryDetails || !$cartItems) {
                    return redirect()->route('checkout')->with('error', 'Missing delivery details or cart data.');
                }

                // Save order in the database
                $order = Order::create([
                    'user_id' => Auth::id(),
                    'email' => $deliveryDetails['email'],
                    'first_name' => $deliveryDetails['first_name'],
                    'last_name' => $deliveryDetails['last_name'],
                    'address' => $deliveryDetails['address'],
                    'city' => $deliveryDetails['city'],
                    'phone' => $deliveryDetails['phone'],
                    'total' => collect($cartItems)->sum(fn($item) => $item['price'] * $item['quantity']),
                    'stripe_payment_id' => $paymentIntent->id,
                    'status' => 'completed',
                ]);

                // Save order items in the database
                foreach ($cartItems as $item) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item['id'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                    ]);
                }

                // Clear cart and delivery details from session
                session()->forget('cart');
                session()->forget('delivery_details');

                return redirect()->route('payment.success')->with('success', 'Payment successful! Your order has been placed.');
            } catch (\Exception $e) {
                return redirect()->route('checkout')->with('error', 'An error occurred while processing the payment: ' . $e->getMessage());
            }
        }

        return redirect()->route('payment.failed')->with('error', 'Payment failed. Please try again.');
    }

    /**
     * Create an order in the database.
     */
    private function createOrder($deliveryDetails, $cartItems, $paymentId, $paymentMethod)
    {
        // Step 1: Create the Order
        $order = Order::create([
            'user_id' => Auth::id() ?? null,
            'email' => $deliveryDetails['email'],
            'first_name' => $deliveryDetails['first_name'] ?? null,
            'last_name' => $deliveryDetails['last_name'],
            'address' => $deliveryDetails['address'],
            'apartment' => $deliveryDetails['apartment'] ?? null,
            'city' => $deliveryDetails['city'],
            'country' => $deliveryDetails['country'],
            'postal_code' => $deliveryDetails['postal_code'] ?? null,
            'phone' => $deliveryDetails['phone'],
            'stripe_payment_id' => $paymentId,
            'payment_method' => $paymentMethod,
            'total' => collect($cartItems)->sum(fn($item) => $item['price'] * $item['quantity']),
            'status' => 'pending',
        ]);

        // Step 2: Create Order Items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        return $order;
    }
}