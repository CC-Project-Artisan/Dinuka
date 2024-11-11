@extends('layouts.frontend')
@section('pages')

<div class="container py-8 mx-auto product-list-wrapper">
        <h1 class="mb-6 text-2xl font-bold">Product List</h1>

        
        <div class="flex">
           
            <aside class="w-1/4 pr-4">
                <!-- Filter Options -->
                <div class="mb-6 filter-section">
                    <h2 class="mb-4 text-lg font-semibold">Filter</h2>
                    <input type="range" min="0" max="210" class="w-full mb-4">
                    <button class="px-4 py-2 text-white bg-orange-500 rounded">Apply</button>
                </div>
                <!-- Category List -->
                <div class="mb-6 categories-section">
                    <h2 class="mb-4 text-lg font-semibold">Categories</h2>
                    <ul class="text-gray-700">
                        <li><a href="#">Clothing Accessories (10)</a></li>
                        <li><a href="#">Furniture (6)</a></li>
                        <li><a href="#">Home Decor (11)</a></li>
                       
                    </ul>
                </div>
            </aside>

            <!-- Product Grid Section -->
            <main class="w-3/4">
                <div class="grid grid-cols-1 gap-6 product-grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    <x-product-list title="Product 1" category="Category 1" price="2500" imageUrl="{{ asset('images/products/product1.jpg') }}" />
                </div>
            </main>
        </div>
    </div>

@endsection