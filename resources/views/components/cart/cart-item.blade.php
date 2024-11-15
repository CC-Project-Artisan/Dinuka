<div class="cart-items centered">
    <table class="shop_table">
        <thead>
            <tr>
                <th class="product-remove"></th>
                <th class="product-thumbnail"></th>
                <th class="product-name">Product</th>
                <th class="product-pri">Price</th>
                <th class="product-quan">Quantity</th>
                <th class="product-subtotal">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <tr class="cart-item">
                <td class="product-remove">
                    <button class="remove-btn" onclick="removeCartItem(this)">×</button>
                </td>
                <td class="product-thumbnail">
                    <img src="{{ asset('images/pngwing.com.png') }}" alt="Product Image">
                </td>
                <td class="product-name">Pottery</td>
                <td class="product-pri">Rs.3750</td>
                <td class="product-quan">
                    <input type="number" value="1" min="1" class="quantity-in">
                </td>
                <td class="product-subtotal">Rs.3750</td>
            </tr>
        </tbody>
    </table>

    <div class="cart-footer">
        
        <button class="update-cart-btn">Update Cart</button>
    </div>
</div>
