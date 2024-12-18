@extends('layouts.frontend')
@section('pages')

<div class="container mt-3 w-[70%]">
    <div class="row bg-white p-6 rounded shadow">
        <div class="col-md-12">

            <h1 class="text-4xl text-center my-5">Exhibitor Registration Form</h1>
            <!-- Success Message -->
            @if(session('success'))
            <div id="success-message" class="alert alert-success">
                {{ session('success') }}
                <button onclick="closeSuccessMessage()" class="absolute top-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 5.652a.5.5 0 10-.707-.707L10 8.586 6.36 4.945a.5.5 0 10-.707.708L9.293 10l-4.647 4.648a.5.5 0 00.707.708L10 11.414l3.64 3.64a.5.5 0 00.707-.707L10.707 10l4.641-4.648z" />
                    </svg>
                </button>
            </div>
            @endif


            @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <form action="{{ route('exhibition.vendor.register.store') }}" method="POST" id="exhibition-form">
                @csrf

                <!-- details -->
                <h1 class="text-xl mb-6">Exhibitor Details</h1>
                <div class="ml-5">
                    <!--Exhibitor name -->
                    <div class="form-group row">
                        <label for="exhibitor_name" class="col-sm-2 col-form-label star">Exhibitor Name</label>
                        <div class="col-sm-10">
                            <x-compo.input type="text" id="exhibitor_name" name="exhibitor_name" placeholder="Enter exhibitor name" :value="old('exhibition_name')" autofocus required />
                        </div>
                    </div>

                    <!-- Exhibitor email -->
                    <div class="form-group row">
                        <label for="exhibitor_email" class="col-sm-2 col-form-label star">Exhibitor Email</label>
                        <div class="col-sm-10">
                            <x-compo.input type="text" id="exhibitor_email" name="exhibitor_email" placeholder="Enter exhibitor email" :value="old('exhibition_name')" required />
                        </div>
                    </div>

                    <!-- Exhibitor phone -->
                    <div class="form-group row">
                        <label for="exhibitor_phone" class="col-sm-2 col-form-label star">Exhibitor Phone</label>
                        <div class="col-sm-10">
                            <x-compo.input type="text" id="exhibitor_phone" name="exhibitor_phone" placeholder="Enter exhibitor phone number" :value="old('exhibition_name')" required />
                        </div>
                    </div>

                    <!-- Exhibitor address -->
                    <div id="one_date_input" class="form-group row">
                        <label for="exhibition_address" class="col-sm-2 col-form-label star">Exhibitor Address</label>
                        <div class="col-sm-10">
                            <x-compo.input type="text" id="exhibition_address" name="exhibition_address" placeholder="Enter exhibition address" required />
                        </div>
                    </div>

                    <!-- Business name -->
                    <div id="one_date_input" class="form-group row pt-4">
                        <label for="Business_name" class="col-sm-2 col-form-label star">Business Name</label>
                        <div class="col-sm-10">
                            <x-compo.input type="text" id="Business_name" name="business_name" placeholder="Enter business name" required />
                        </div>
                    </div>

                    <!-- Business category -->
                    <div id="one_date_input" class="form-group row">
                        <label for="business_category" class="col-sm-2 col-form-label star">Business Category</label>
                        <div class="col-sm-10">
                            <x-compo.input type="text" id="business_category" name="business_category" placeholder="Enter business category" required />
                        </div>
                    </div>

                    <!-- Business email -->
                    <div id="one_date_input" class="form-group row">
                        <label for="business_email" class="col-sm-2 col-form-label star">Business Email</label>
                        <div class="col-sm-10">
                            <x-compo.input type="text" id="business_email" name="business_email" placeholder="Enter business email" required />
                        </div>
                    </div>

                    <!-- Business phone -->
                    <div id="one_date_input" class="form-group row">
                        <label for="business_phone" class="col-sm-2 col-form-label star">Business Phone</label>
                        <div class="col-sm-10">
                            <x-compo.input type="text" id="business_phone" name="business_phone" placeholder="Enter business phone number" required />
                        </div>
                    </div>
                </div>

                <!-- stall -->
                <h1 class="text-xl mt-10 mb-6">Stall Information</h1>
                <div class="ml-5">
                    <div class="form-group row">
                        <label for="stall" class="col-sm-2 col-form-label star">Stall Size</label>
                        <div class="col-sm-10">
                            <select name="stall" id="stall" class="form-control" required>
                                <option value="">Select Stall</option>
                                @foreach($stalls as $stall)
                                <option value="{{ $stall->id }}" data-price="{{ $stall->price }}">
                                    {{ $stall->name }} ({{ $stall->size }}) - Rs.{{ $stall->price }}/=
                                </option>
                                @endforeach
                            </select>
                            @error('stall') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stall_type" class="col-sm-2 col-form-label star">Stall Type</label>
                        <div class="col-sm-10">
                            <select name="stall_type" id="stall_type" class="form-control" required>
                                <option value="">Select Stall Type</option>
                                @foreach($stalls as $stall)
                                <option value="{{ $stall->type }}" data-price="{{ $stall->type_price }}">
                                    {{ $stall->type }} - Rs.{{ $stall->type_price }}/=
                                </option>
                                @endforeach
                            </select>
                            @error('stall_type') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="requirements" class="col-sm-2 col-form-label star">Requirements</label>
                        <div class="col-sm-10">
                            <x-compo.textarea id="requirements" name="requirements" class="form-control" readonly>
                            </x-compo.textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Total Stall Fee</label>
                        <div class="col-sm-10">
                            <!-- add readonly input to show the total stall fee -->
                            <x-compo.input type="text" id="total_stall_fee" name="total_stall_fee" class="form-control" readonly />
                        </div>
                    </div>

                </div>

                <h1 class="text-xl mt-10 mb-6">Payment Information</h1>
                <div class="ml-5">
                    @if (isset($exhibition->vendor_entrance_fee))
                    <div class="form-group row">
                        <label for="registration_fee" class="col-sm-2 col-form-label">Registration Fee</label>
                        <div class="col-sm-10">
                            <p class="form-control-plaintext" value="{{ $exhibition->vendor_entrance_fee }}">The registration fee for exhibitors is Rs. {{ $exhibition->vendor_entrance_fee }}/=</p>
                        </div>
                    </div>
                    @endif

                    <div class="form-group row">
                        <label for="total_price" class="col-sm-2 col-form-label">Total Price</label>
                        <div class="col-sm-10">
                            <x-compo.input type="text" id="total_price" name="total_price" class="form-control" readonly />
                        </div>
                    </div>
                </div>

                <!-- <input type="hidden" id="hidden_total_price" name="total_price" value="0"> -->
                <!-- Payment Form -->
                <!-- <div class="payment-section">
                    <h2>Payment Method</h2>
                    <div id="card-element" class="input-ar">

                    </div>
                    <div id="card-errors" role="alert" style="color: red;"></div>
                </div>
                <button id="submit-button" type="submit" class="btn btn-primary">Pay</button> -->

                <!-- submit button -->
                <div class="flex gap-4">
                    <button type="submit" class="apply-button">Pay & Register for the exhibition</button>
                </div>

                <!-- Hidden input for registration ID -->
                <!-- <input type="hidden" id="registration_id" name="registration_id" value="{{ $registration->id ?? '' }}"> -->

            </form>
        </div>
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    // function calculateTotalPrice() {
    //     const stallPrice = parseFloat(stallSelect.options[stallSelect.selectedIndex]?.getAttribute('data-price')) || 0;
    //     const stallTypePrice = parseFloat(stallTypeSelect.options[stallTypeSelect.selectedIndex]?.getAttribute('data-price')) || 0;
    //     const totalPrice = registrationFee + stallPrice + stallTypePrice;

    //     totalPriceInput.value = totalPrice.toFixed(2);
    //     totalStallFeeInput.value = stallTypePrice.toFixed(2);
    // }

    // document.addEventListener('DOMContentLoaded', function() {
    //     const stallSelect = document.getElementById('stall');
    //     const stallTypeSelect = document.getElementById('stall_type');
    //     const totalPriceInput = document.getElementById('total_price');
    //     const totalStallFeeInput = document.getElementById('total_stall_fee');
    //     const registrationFee = {
    //         {
    //             $exhibition -> vendor_entrance_fee ?? 0
    //         }
    //     };

    //     function calculateTotalPrice() {
    //         const stallTypeOption = stallTypeSelect.options[stallTypeSelect.selectedIndex];
    //         const stallTypePrice = parseFloat(stallTypeOption.getAttribute('data-price')) || 0;
    //         const totalPrice = stallTypePrice + registrationFee;
    //         totalPriceInput.value = totalPrice.toFixed(2);
    //         totalStallFeeInput.value = stallTypePrice.toFixed(2);
    //     }

    //     stallTypeSelect.addEventListener('change', calculateTotalPrice);

    //     const stripe = Stripe("{{ config('services.stripe.key') }}");
    //     const elements = stripe.elements();
    //     const cardElement = elements.create('card');
    //     cardElement.mount('#card-element');

    //     const paymentFormBtn = document.getElementById('submit-button');
    //     const form = document.querySelector('form');

    //     if (paymentFormBtn) {
    //         paymentFormBtn.addEventListener('click', async (event) => {
    //             event.preventDefault();

    //             // Recalculate the total price just before submission
    //             calculateTotalPrice();

    //             const totalPrice = parseFloat(hiddenTotalPriceInput.value);

    //             if (totalPrice <= 0.5) {
    //                 alert("Total price must be greater than $0.50!");
    //                 return;
    //             }

    //             // Add total price to the FormData
    //             const formData = new FormData(form);
    //             formData.append('total_price', totalPrice);

    //             console.log("Submitting form with total price:", totalPrice);

    //             // Continue with PaymentIntent creation...
    //             try {
    //                 // Create PaymentIntent
    //                 const response = await fetch('/checkout/payment', {
    //                     method: 'POST',
    //                     body: JSON.stringify({
    //                         total_price: parseFloat(totalPriceInput.value),
    //                         registration_id
    //                     }),
    //                     headers: {
    //                         'Content-Type': 'application/json',
    //                         'X-CSRF-TOKEN': '{{ csrf_token() }}',
    //                     },
    //                 });

    //                 const data = await response.json();
    //                 if (data.success) {
    //                     const clientSecret = data.client_secret;
    //                     const {
    //                         paymentIntent,
    //                         error
    //                     } = await stripe.confirmCardPayment(clientSecret, {
    //                         payment_method: {
    //                             card: cardElement
    //                         },
    //                     });

    //                     if (paymentIntent && paymentIntent.status === "succeeded") {
    //                         alert("Payment Successful!");
    //                         window.location.href = "{{ route('payment.success') }}";
    //                     } else {
    //                         alert("Payment failed: " + error.message);
    //                     }
    //                 } else {
    //                     alert("Payment initialization failed: " + data.message);
    //                 }
    //             } catch (err) {
    //                 console.error("Error processing payment:", err);
    //                 alert("An error occurred. Please try again.");
    //             }
    //         });
    //     }
    // });

    // Show success message
    function showSuccess() {
        const successMessage = document.getElementById('success-message');
        successMessage.classList.remove('hidden');
        successMessage.scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });

        // Auto hide after 5 seconds
        setTimeout(() => {
            closeSuccessMessage();
        }, 10000);
    }

    function closeSuccessMessage() {
        document.getElementById('success-message').classList.add('hidden');
    }

    // Calculate the total price based on selected stall and stall type
    // document.addEventListener('DOMContentLoaded', function() {
    //     const stallSelect = document.getElementById('stall');
    //     const stallTypeSelect = document.getElementById('stall_type');
    //     const totalPriceInput = document.getElementById('total_price');

    //     // Properly escape PHP variable for JavaScript
    //     const registrationFee = @json($exhibition -> vendor_entrance_fee ?? 0);

    //     // Set initial total to registration fee with proper formatting
    //     totalPriceInput.value = `Rs. ${registrationFee.toFixed(2)}/=`;

    //     function calculateTotalPrice() {
    //         let stallPrice = 0;
    //         let stallTypePrice = 0;

    //         // Safe access to selected option data-price
    //         if (stallSelect.selectedIndex > 0) {
    //             stallPrice = parseFloat(stallSelect.options[stallSelect.selectedIndex].getAttribute('data-price')) || 0;
    //         }

    //         if (stallTypeSelect.selectedIndex > 0) {
    //             stallTypePrice = parseFloat(stallTypeSelect.options[stallTypeSelect.selectedIndex].getAttribute('data-price')) || 0;
    //         }

    //         // Calculate total with proper number handling
    //         const totalPrice = (registrationFee + stallPrice + stallTypePrice);

    //         // Format with 2 decimal places
    //         totalPriceInput.value = `Rs. ${totalPrice.toFixed(2)}/=`;
    //     }

    //     // Add event listeners
    //     stallSelect.addEventListener('change', calculateTotalPrice);
    //     stallTypeSelect.addEventListener('change', calculateTotalPrice);
    // });

    document.addEventListener('DOMContentLoaded', function() {
        const stallSelect = document.getElementById('stall');
        const stallTypeSelect = document.getElementById('stall_type');
        const totalPriceInput = document.getElementById('total_price');
        const hiddenTotalPriceInput = document.getElementById('hidden_total_price');
        const registrationFee = parseFloat("{{ $exhibition->vendor_entrance_fee ?? 0 }}");

        function calculateTotalPrice() {
            const stallPrice = parseFloat(stallSelect.options[stallSelect.selectedIndex]?.getAttribute('data-price')) || 0;
            const stallTypePrice = parseFloat(stallTypeSelect.options[stallTypeSelect.selectedIndex]?.getAttribute('data-price')) || 0;

            // Calculate total price
            const totalPrice = registrationFee + stallPrice + stallTypePrice;

            // Set values
            totalPriceInput.value = `Rs. ${totalPrice.toFixed(2)}`;
            hiddenTotalPriceInput.value = totalPrice.toFixed(2); // Ensures it's passed as a float
        }

        // Trigger calculation when inputs change
        stallSelect.addEventListener('change', calculateTotalPrice);
        stallTypeSelect.addEventListener('change', calculateTotalPrice);
        calculateTotalPrice(); // Initialize the total on page load
    });

    // show only total stall fee
    document.addEventListener('DOMContentLoaded', function() {
        const stallSelect = document.getElementById('stall');
        const stallTypeSelect = document.getElementById('stall_type');
        const totalStallFeeInput = document.getElementById('total_stall_fee');

        function calculateTotalStallFee() {
            const stallPrice = parseFloat(stallSelect.options[stallSelect.selectedIndex].getAttribute('data-price')) || 0;
            const stallTypePrice = parseFloat(stallTypeSelect.options[stallTypeSelect.selectedIndex].getAttribute('data-price')) || 0;
            const totalStallFee = stallPrice + stallTypePrice;
            totalStallFeeInput.value = `Rs. ${totalStallFee.toFixed(2)}/=`;
        }

        stallSelect.addEventListener('change', calculateTotalStallFee);
        stallTypeSelect.addEventListener('change', calculateTotalStallFee);
    });
</script>

@endsection