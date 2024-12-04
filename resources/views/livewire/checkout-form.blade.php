<div>
    <form wire:submit.prevent="processPayment">
        @csrf
        <div class="contact-section">
            <h2>Contact</h2>
            <input type="email" wire:model="email" placeholder="Email" class="input-ar" required>
            <label>
                <input type="checkbox" wire:model="save_info"> Save this information for next time
            </label>
        </div>

        <div class="delivery-section">
            <h2>Delivery</h2>
            <div class="input-gro">
                <select wire:model="country" class="input-sec" required>
                    <option value="">Country/Region</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                </select>
            </div>
            <div class="input-gro">
                <input type="text" wire:model="first_name" placeholder="First name" class="input-sec">
                <input type="text" wire:model="last_name" placeholder="Last name" class="input-sec" required>
            </div>
            <input type="text" wire:model="address" placeholder="Address" class="input-ar" required>
            <input type="text" wire:model="apartment" placeholder="Apartment, suite, etc. (optional)" class="input-ar">
            <div class="input-gro">
                <input type="text" wire:model="city" placeholder="City" class="input-sec" required>
                <input type="text" wire:model="postal_code" placeholder="Postal code (optional)" class="input-sec">
            </div>
            <input type="tel" wire:model="phone" placeholder="Phone" class="input-ar" required>
        </div>

        <input type="hidden" name="subtotal" id="subtotal" value="{{ $subtotal }}">
        <input type="hidden" name="cartItems" id="cartItems" value="{{ json_encode($cartItems) }}">
        <div class="payment-section">
            <h2>Payment Method</h2>
            <div id="card-element" class="input-ar">
                <!-- Stripe card element will be mounted here -->
            </div>
            <div id="card-errors" role="alert" style="color: red;"></div>
        </div>
        <button id="submit-button" type="submit" class="btn btn-primary">Pay</button>
    </form>
</div>