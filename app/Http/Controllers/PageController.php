<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Exhibition;
use App\Models\ExhibitionContact;
use App\Models\ExhibitionEmail;
use App\Models\Order;
use App\Models\OrderItem;

class PageController extends Controller
{
    //Home Page
    public function index()
    {
        return view('welcome');
    }

    //Shop Page
    public function shop()
    {
        return view('pages.shop');
    }

    //Product Page
    public function productView()
    {
        
        return view('pages.product-display');
    }

    //Cart Page
    public function cartview()
    {
        return view('pages.cart');
    }

    public function checkoutview()
    {
        return view('pages.checkout');
    }

    //About Page
    public function about()
    {
        return view('exhibition.exhibition-view');
    }

    public function exhibition()
    {
        $exhibitions = Exhibition::all();
        return view('pages.exhibition', compact('exhibitions'));
    }

    //Dashboard
    public function dashboard()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $role = $user->role;

            $vendors = Vendor::all();
            $users = User::all();

            $totalUsers = User::where('role', '!=', 'admin')->count();
            $totalVendors = Vendor::count();

            $categories = Category::all();
            // $exhibitions = Exhibition::all();
            $exhibitionContacts = ExhibitionContact::all();
            $exhibitionEmails = ExhibitionEmail::all();
            $orders = Order::all();
            $orderItems = OrderItem::all();

            // Order by pending status first, then paginate
            $exhibitions = Exhibition::orderByRaw("CASE 
                WHEN status = 'pending' THEN 1 
                WHEN status = 'approved' THEN 2
                WHEN status = 'rejected' THEN 3 
                ELSE 4 END")
                ->paginate(2);

            $products = Product::all();


            switch ($role) {
                case 'vendor':
                    $vendor = Vendor::where('user_id', $user->id)->first();
                    if ($vendor) {
                        return view(
                            'vendor.dashboard',
                            compact(
                                'vendor',
                                'categories',
                                'exhibitions',
                                'exhibitionContacts',
                                'exhibitionEmails',
                                'products',
                                'orders',
                                'orderItems',
                            )
                        );
                    } else {
                        return view('welcome');
                    }
                case 'user':
                    return view(
                        'user.dashboard',
                        compact(
                            'categories',
                            'exhibitions',
                            'exhibitionContacts',
                            'exhibitionEmails',
                            'products',
                            'orders',
                            'orderItems',
                        )
                    );
                case 'admin':
                    return view(
                        'admin.dashboard',
                        compact(
                            'totalUsers',
                            'users',
                            'vendors',
                            'totalVendors',
                            'categories',
                            'exhibitions',
                            'exhibitionContacts',
                            'exhibitionEmails',
                            'products',
                            'orders',
                            'orderItems',
                        )
                    );
                default:
                    return view('welcome');
            }
        }

        return redirect()->route('login');
    }

    //Admin Test
    public function admintest()
    {
        return view('admin.test');
    }
}
