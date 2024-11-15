<div class="cart-totals centered">
    <h2>Cart Totals</h2>
    <div class="totals-row">
        <h3>Subtotal</h3>
        <span>Rs.3750</span>
    </div>

    <div class="shipping">
        <h3>Shipping</h3>
        <span class="shipping-options">
            <label><input type="radio" name="shipping" checked> Flat rate</label>
            <label><input type="radio" name="shipping"> Free shipping</label>
            <label><input type="radio" name="shipping"> Local pickup</label>
        
        <p id="shipping-address" class="shipping-address">
            No shipping options were found for <strong>default</strong>. <br>
            <button onclick="toggleAddressForm()" class="address-toggle-btn">Enter a different address</button>
        </p>
        
        <form id="address-form" class="hidden address-form">
            <select>
                <option>Country/Region</option>
                <option value="Sri Lanka">Sri Lanka</option>
                   
            </select>
            <input type="text" placeholder="State/County">
            <input type="text" placeholder="City">
            <input type="text" placeholder="Postcode/ZIP">
            <button type="button" onclick="updateShippingAddress()">Update</button>
        </form>
        </span>
    </div>

    <div class="totals-row">
        <h3>Total</h3>
        <span>Rs.3750</span>
    </div>
    <button class="checkout-btn">Proceed to Checkout</button>
</div>


<script>
    function toggleAddressForm() {
        document.getElementById('address-form').classList.toggle('hidden');
    }

    function updateShippingAddress() {
        const country = document.querySelector('#address-form select').value;
        const city = document.querySelector('#address-form input[placeholder="City"]').value;
        const postcode = document.querySelector('#address-form input[placeholder="Postcode/ZIP"]').value;

        document.getElementById('shipping-address').innerHTML = 
            `Shipping to <strong>${city}, ${postcode}, ${country}</strong>. <button onclick="toggleAddressForm()">Change address</button>`;
        
        toggleAddressForm();
    }

    function removeCartItem(button) {
        button.closest('tr').remove();
    }
</script>
