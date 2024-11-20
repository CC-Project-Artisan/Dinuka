@extends('layouts.frontend')
@section('pages')
<div class="breadcrumb-bar">
    <div class="breadcrumb-title">
        CHECKOUT
    </div>
    <div class="breadcrumb-nav">
        <a href="{{ route('welcome') }}">Home</a> &gt; <a href="{{ route('pages.shop') }}">Cart</a> &gt; <a href="{{ route('pages.checkout') }}">Checkout</a>
    </div>
</div>
<br>


<div class="checkout-container">
    <form id="checkout-form" action="{{ route('checkout.payment') }}" method="POST">
        @csrf
        <input type="hidden" name="total" value="{{ $subtotal + 100 }}">
        
        
        <x-checkout.ordersum-drop :cartItems="$cartItems" :subtotal="$subtotal" />
        
     
        <x-checkout.delivery />
        
        <x-checkout.order-sum :cartItems="$cartItems" :subtotal="$subtotal" />
        
        
    </form>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe("{{ config('services.stripe.key') }}");
    const elements = stripe.elements();
    const card = elements.create('card');
    card.mount('#card-element');

    const form = document.getElementById('checkout-form');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        document.getElementById('submit-button').disabled = true;

        const { paymentMethod, error } = await stripe.createPaymentMethod('card', card);

        if (error) {
            alert(error.message);
            document.getElementById('submit-button').disabled = false;
        } else {
            const formData = new FormData(form);
            formData.append('payment_method', paymentMethod.id);

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Payment Successful!');
                        
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => console.error(error))
                .finally(() => {
                    document.getElementById('submit-button').disabled = false;
                });
        }
    });
</script>
@endsection