@extends('layouts.frontend')
@section('pages')
<div class="breadcrumb-bar">
    <div class="breadcrumb-title">
        PRODUCT LIST
    </div>
    <div class="breadcrumb-nav">
        <a href="{{ route('welcome') }}">Home</a> &gt; <a href="{{ route('pages.shop') }}">Product List</a> &gt; <a href="{{ route('pages.product-display', ['id' => $product->id]) }}">Product Details</a>

    </div>
</div>
<br>

<div class="container px-4 mx-auto">
    @if (isset($product))
        <x-product-details.product-detail
            :product="$product"
            :productId="$product->id" 
            :productName="$product->productName"
            :productPrice="$product->productPrice"
            :productImage="json_decode($product->productImages)[0] " 
            :categoryName="$product->category->name"
        />
        <x-product-details.product-info 
            :product="$product"
        />
    @endif
</div>



    
 @endsection