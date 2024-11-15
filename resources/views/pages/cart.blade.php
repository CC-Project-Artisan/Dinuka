@extends('layouts.frontend')
@section('pages')
<div class="breadcrumb-bar">
    <div class="breadcrumb-title">
        CART
    </div>
    <div class="breadcrumb-nav">
        <a href="{{ route('welcome') }}">Home</a> &gt; <a href="{{ route('pages.shop') }}">Cart</a>
    </div>
</div>
<br>



            
                <x-cart.cart-item  />
            
       

       
          
            <x-cart.cart-totals />
        

    
 @endsection