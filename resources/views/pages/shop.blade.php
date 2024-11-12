

@extends('layouts.frontend')
@section('pages')
<div class="breadcrumb-bar">
    <div class="breadcrumb-title">
        PRODUCT LIST
    </div>
    <div class="breadcrumb-nav">
        <span>Home</span> &gt; <span>Product List</span>
    </div>
</div>
<br>
<div class="main-content">
    
        
    
    <main class="grid w-3/4 grid-cols-1 gap-0 pl-8 border-l border-gray-300 sm:grid-cols-2 md:grid-cols-3">

        @php
            $products = [
                [
                    'imageUrl' => asset('images/shop1.jpg'),
                    'title' => 'Organic Raw',
                    'category' => 'Organic Food',
                    'price' => '11.99'
                ],
                [
                    'imageUrl' => asset('images/shop2.jpg'),
                    'title' => 'Blue Cushion',
                    'category' => 'Home Decor',
                    'price' => '8.99'
                ],
                [
                    'imageUrl' => asset('images/product3.jpg'),
                    'title' => 'Wooden Toy',
                    'category' => 'Wood
                    en Toys',
                    'price' => '5.99'
                ],
                [
                    'imageUrl' => asset('images/product4.jpg'),
                    'title' => 'Handmade Soap',
                    'category' => 'Homemade Cosmetics',
                    'price' => '7.99'
                ],
                [
                    'imageUrl' => asset('images/product5.jpg'),
                    'title' => 'White T-Shirt',
                    'category' => 'Clothing Accessories',
                    'price' => '9.99'
                ],
                [
                    'imageUrl' => asset('images/product6.jpg'),
                    'title' => 'Wooden Chair',
                    'category' => 'Furniture',
                    'price' => '19.99'
                ],
               
            ];
            @endphp
       
            
            
            @foreach($products as $product)
                <div class="relative border-b border-r border-gray-300 group">
                    <div class="p-6 text-center">
                        <div class="relative overflow-hidden">
                            
                            <img src="{{ $product['imageUrl'] }}" alt="{{ $product['title'] }}" class="mx-auto mb-2 transition-transform duration-300 transform group-hover:scale-105" style="max-width: 100%; height: auto;">
                            
                            
                            <div class="absolute transition-opacity duration-300 transform -translate-x-1/2 -translate-y-1/2 opacity-0 top-1/2 left-1/2 group-hover:opacity-100" style="background-color: rgba(0, 0, 0, 0.6); padding: 0.5rem 1.5rem; color: white; font-family: 'Georgia', serif;">
                                Add to Cart
                            </div>
                        </div>
                        
                        
                        <h3 class="mt-4 text-lg font-semibold" style="color: #8b5e34; font-family: 'Georgia', serif;">{{ $product['title'] }}</h3>
                        <p class="text-sm text-gray-500">{{ $product['category'] }}</p>
                        <p class="text-xl font-bold" style="color: #d97706; font-family: 'Georgia', serif;">${{ $product['price'] }}</p>
                    </div>
                </div>
            @endforeach
        </main>     
        
        <aside class="sidebar">
      
        <div class="filter-section">
    <h3 class="section-title">Filter</h3>
    
    
    <div class="price-range-container">
        <input type="range" min="0" max="210" value="105" class="price-range">
    </div>
        
    
    
    <div class="price-apply-container">
        <span class="price-display">$0.00 — $210.00</span>
        <button class="apply-button">Apply</button>
    </div>
</div>

        
        <div class="categories-section">
            <h3 class="section-title">Categories</h3>
            <ul class="categories-list">
                <li><a href="#" class="category-item">Mask (10)</a></li>
                <li><a href="#" class="category-item">Jewelry (6)</a></li>
                <li><a href="#" class="category-item">Batik & Silk (11)</a></li>
                <li><a href="#" class="category-item">Paintings (12)</a></li>
                <li><a href="#" class="category-item">Pottery (30)</a></li>
               
            </ul>
        </div>


        <div class="related-items">
            <h3 class="section-title">Related Items</h3>
            <ul class="item-list">
                @foreach($products as $item)
                    <li class="item-entry">
                        <div class="item-image-wrapper">
                            <img src="{{ $item['imageUrl'] }}" alt="{{ $item['title'] }}">
                        </div>
                        <div class="item-details">
                            <h4 class="item-title">{{ $item['title'] }}</h4>
                            <div class="item-rating">★★★★☆</div> 
                            <p class="item-price">${{ $item['price'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>


    </aside>
</div>

    
    <div class="pagination-container">
        <div class="pagination">
            <a href="#" class="prev">&lsaquo;</a> 
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">7</a>
            <a href="#" class="next">&rsaquo;</a> 
        </div>
    </div>
</div>



</div>










