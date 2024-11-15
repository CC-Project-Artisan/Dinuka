<div class="product-display-container">
    <div class="product-image-container">
        <img src="{{ asset('images/pngwing.com.png') }}" alt="Product Image">
    </div>

    <div class="product-details-container">
        <h2 class="product-title">Pottery</h2>
        <p class="product-price">Rs.3750</p>
        <p class="product-description">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>


        <!-- <div class="product-quantity-container">
            <div class="product-quantity">
                <input type="number" id="quantity" name="quantity" value="1" min="1">
                <div>
                    <button onclick="incrementQuantity()">&#9650;</button>
                    <button onclick="decrementQuantity()">&#9660;</button>
                </div>
            </div>

            <button class="add-to-cart-button">ADD TO CART</button>
        </div> -->

        <div class="quantity-and-cart">
            <input type="number" min="1" max="10" value="1" class="product-quantity">
            <a href="{{ route('pages.cart') }}" class="add-to-cart-btn">Add to Cart</a>
        </div>

        <ul class="product-meta">
            <li><strong>SKU:</strong> 2</li>
            <li><strong>Category:</strong> Pottery</li>
            <li><strong>Tags:</strong> Crafts, Pottery, Homemade</li>
        </ul>
    </div>
</div>


<!-- <script>
    function incrementQuantity() {
    let quantityInput = document.getElementById('quantity');
    quantityInput.value = parseInt(quantityInput.value) + 1;
}

function decrementQuantity() {
    let quantityInput = document.getElementById('quantity');
    if (quantityInput.value > 1) {
        quantityInput.value = parseInt(quantityInput.value) - 1;
    }
}

</script> -->