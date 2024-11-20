<div class="left-section">
    <form id="delivery-form" action="{{ route('delivery.process') }}" method="POST">
        @csrf

        
        <div class="contact-section">
            <h2>Contact</h2>
            <input type="email" name="email" placeholder="Email" class="input-ar" value="{{ old('email') }}" required>
            <label>
                <input type="checkbox" name="subscribe"> Email me with news and offers
            </label>
        </div>

 
        <div class="delivery-section">
            <h2>Delivery</h2>
            <div class="input-gro">
                <select name="country" class="input-sec" required>
                    <option value="">Country/Region</option>
                    <option value="Sri Lanka" {{ old('country') == 'Sri Lanka' ? 'selected' : '' }}>Sri Lanka</option>
                </select>
            </div>
            <div class="input-gro">
                <input type="text" name="first_name" placeholder="First name (optional)" class="input-sec" value="{{ old('first_name') }}">
                <input type="text" name="last_name" placeholder="Last name" class="input-sec" value="{{ old('last_name') }}" required>
            </div>
            <input type="text" name="address" placeholder="Address" class="input-ar" value="{{ old('address') }}" required>
            <input type="text" name="apartment" placeholder="Apartment, suite, etc. (optional)" class="input-ar" value="{{ old('apartment') }}">
            <div class="input-gro">
                <input type="text" name="city" placeholder="City" class="input-sec" value="{{ old('city') }}" required>
                <input type="text" name="postal_code" placeholder="Postal code (optional)" class="input-sec" value="{{ old('postal_code') }}">
            </div>
            <input type="tel" name="phone" placeholder="Phone" class="input-ar" value="{{ old('phone') }}" required>
            <label>
                <input type="checkbox" name="save_info"> Save this information for next time
            </label>
        </div>

        <!-- Payment Section -->
        <div class="payment-section">
            <h2>Payment Method</h2>
            <div id="card-element"  class="input-ar">
                
            </div>
            <div id="card-errors" role="alert" style="color: red;"></div>
        </div>

        
        <button id="submit-button" type="submit" class="btn btn-primary">Pay & Complete Order</button>
    </form>
</div>
