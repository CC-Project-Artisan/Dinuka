@props(['order', 'product', 'orderItem'])

<section class="sub-listing-container">
    <div class="sub-listing-content">
        <div class="sub-listing-content-up">
            <div class="main-img-wrapper">
                @if(isset($product->productImages) && !empty($product->productImages))
                @php
                $images = json_decode($product->productImages);
                @endphp
                @if(is_array($images) && count($images) > 0)
                <img src="{{ asset('images/' . $images[0]) }}" alt="{{ $product->productName }}" class="savedimg">
                @else
                <img src="{{ asset('images/default.png') }}" alt="Default Image" class="savedimg">
                @endif
                @else
                <img src="{{ asset('images/default.png') }}" alt="Default Image" class="savedimg">
                @endif
            </div>
            <div class="sub-listing-info">
                <label class="sub-listing-title">New Order ID #{{ $order->id }}</label>
                <div class="sub-listing-features-container">
                    <h1 class="text-customBrown font-semibold tracking-wide mt-2">Order Detials</h1>
                    <div class="sub-listing-features">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-5 gap-x-10 mt-3">
                            <div class="sub-listing-feature">
                                <label class="sub-listing-feature-value">Order ID: {{ $order->id }}</label>
                            </div>
                            <div class="sub-listing-feature">
                                <label class="sub-listing-feature-value">Order Pleced At: {{ $order->created_at->format('Y-m-d') }}</label>
                            </div>
                            <div class="sub-listing-feature">
                                <label class="sub-listing-feature-value">Order Quantity: {{ $order->orderItems->count() }}{{ $order->city }}</label>
                            </div>
                            <div class="sub-listing-feature">
                                <label class="sub-listing-feature-value">Order Amout: Rs. {{ number_format($order->total, 2) }}/=</label>
                            </div>
                            <div class="sub-listing-feature">
                                <label class="sub-listing-feature-value">Payment Status: {{ ucfirst($order->status) }}</label>
                            </div>
                            <div class="sub-listing-feature">
                                <label class="sub-listing-feature-value">Payment ID: {{ $order->stripe_payment_id }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-listing-info">
            <div class="sub-listing-features-container">
                <h1 class="text-customBrown font-semibold tracking-wide mt-2">Product Detials</h1>
                <div class="sub-listing-features">
                    @foreach ($order->orderItems as $orderItem)
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-5 gap-x-10 mt-3">
                        <div class="sub-listing-feature">
                            <label class="sub-listing-feature-value">Product ID: {{ $orderItem->product->id }}</label>
                        </div>
                        <div class="sub-listing-feature">
                            <label class="sub-listing-feature-value">Product Name: {{ $orderItem->product->productName }}</label>
                        </div>
                        <div class="sub-listing-feature">
                            <label class="sub-listing-feature-value">Product Category: {{ $orderItem->product->productCategory }}</label>
                        </div>
                        <div class="sub-listing-feature">
                            <label class="sub-listing-feature-value">Product Price: Rs. {{ number_format($orderItem->product->productPrice, 2) }}/=</label>
                        </div>
                        <div class="sub-listing-feature">
                            <label class="sub-listing-feature-value">Dimensions: {{ $orderItem->product->dimensions }}</label>
                        </div>
                        <div class="sub-listing-feature">
                            <label class="sub-listing-feature-value">Product Weight: {{ $orderItem->product->weight }}</label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="savedAd-buttons">
            <div class="border-r border-customGray">
                <a href="{{ route('show.vendor.orders.details', ['order' => $order->id]) }}" class="savedAd-view">
                    <button class="savedAd-view"><i class="fa-regular fa-eye mr-1"></i>View Order</button>
                </a>
            </div>
            @if($order->status === 'pending')
            <div class="border-l border-customGray flex">
                <form action="{{ route('orders.cancel', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="remove-button savedAd-delete border-l">
                        <i class="fa-regular fa-times-circle mr-1"></i>Cancel Order
                    </button>
                </form>
            </div>
            @endif
        </div>
    </div>
</section>