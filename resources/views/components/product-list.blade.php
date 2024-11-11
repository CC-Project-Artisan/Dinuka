<!-- resources/views/components/product-card.blade.php -->
<div class="relative p-4 text-center transition-transform transform border border-orange-300 product-list hover:scale-105">
    <img src="{{ asset('images/category1.jpg') }}" alt="{{ $title }}" class="object-contain w-full h-48 mx-auto mb-4">
    
    <h3 class="text-lg font-bold text-orange-700">Title</h3>
    <p class="text-sm text-gray-500">Category</p>
    <p class="mt-2 text-lg font-semibold text-orange-800">Rs. 2500/=</p>

    <!-- Hover overlay for "Add to Cart" -->
    <div class="absolute inset-0 flex items-center justify-center transition-opacity bg-orange-100 bg-opacity-50 opacity-0 add-to-cart-overlay hover:opacity-100">
        <button class="px-4 py-2 text-white bg-orange-500 rounded-lg">Add to Cart</button>
    </div>
</div>
