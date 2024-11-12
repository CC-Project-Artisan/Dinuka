<!-- resources/views/components/product-card.blade.php -->
<div class="product-list border border-[#C8B8A5] p-4 transition-all duration-300 hover:shadow-lg hover:scale-105">
    <div class="relative overflow-hidden product-image-container">
        <img src="{{ $imageUrl }}" alt="{{ $title }}" class="w-full h-auto mb-4">
        <!-- Button Overlay -->
        <div class="absolute inset-0 flex items-center justify-center transition-opacity duration-300 bg-white bg-opacity-75 opacity-0 overlay hover:opacity-100">
            <button class="add-to-cart-btn px-4 py-2 bg-[#3A3A3A] text-white uppercase font-semibold tracking-wider">Add to Cart</button>
        </div>
    </div>
    <h3 class="text-center font-bold text-lg text-[#8C4C2F] mt-2">{{ $title }}</h3>
    <p class="text-sm text-center text-gray-500">{{ $category }}</p>
    <p class="text-center font-semibold text-lg text-[#8C4C2F]">${{ $price }}</p>
</div>
