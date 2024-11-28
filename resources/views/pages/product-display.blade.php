@extends('layouts.frontend')
@section('pages')
<div class="breadcrumb-bar">
    <div class="breadcrumb-title">
        PRODUCT LIST
    </div>
    <div class="breadcrumb-nav">
        <a href="{{ route('welcome') }}">Home</a> &gt; <a href="{{ route('pages.shop') }}">Product List</a> &gt; <a href="{{ route('pages.product-display') }}">Product Details</a>
    </div>
</div>
<br>

<div class="container px-4 mx-auto">
    <x-product-details.product-detail />
    <x-product-details.product-info />
</div>
@endsection