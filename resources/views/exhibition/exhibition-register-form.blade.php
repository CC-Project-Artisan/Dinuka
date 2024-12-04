@extends('layouts.frontend')
@section('pages')

<div class="container mt-3 w-[70%]">
    <div class="row bg-white p-6 rounded shadow">
        <div class="col-md-12">

            <h1 class="text-4xl text-center my-5">Vendor Registration Form</h1>
            <form action="" method="POST" id="vendor-registration-form" enctype="multipart/form-data">
                @csrf

                <!-- Vendor Details -->
                <h1 class="text-xl mb-6">Vendor Details</h1>
                <div class="ml-5">
                    <!-- Vendor Name -->
                    <div class="form-group row">
                        <label for="vendor_name" class="col-sm-2 col-form-label">Vendor Name<span class="star"></span></label>
                        <div class="col-sm-10">
                            <x-compo.input type="text" id="vendor_name" name="vendor_name" placeholder="Enter vendor name" required />
                        </div>
                    </div>

                    <!-- Contact Person -->
                    <div class="form-group row">
                        <label for="contact_person" class="col-sm-2 col-form-label">Contact Person<span class="star"></span></label>
                        <div class="col-sm-10">
                            <x-compo.input type="text" id="contact_person" name="contact_person" placeholder="Enter contact person name" required />
                        </div>
                    </div>

                    <!-- Contact Number -->
                    <div class="form-group row">
                        <label for="contact_number" class="col-sm-2 col-form-label">Contact Number<span class="star"></span></label>
                        <div class="col-sm-10">
                            <x-compo.input type="text" id="contact_number" name="contact_number" placeholder="Enter contact number" required />
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email Address<span class="star"></span></label>
                        <div class="col-sm-10">
                            <x-compo.input type="email" id="email" name="email" placeholder="Enter email address" required />
                        </div>
                    </div>

                    <!-- Product Category -->
                    <div class="form-group row">
                        <label for="product_category" class="col-sm-2 col-form-label">Product Category</label>
                        <div class="col-sm-10">
                            <select id="product_category" name="product_category" class="form-control block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                <option value="craft">Craft</option>
                                <option value="painting">Painting</option>
                                <option value="jewelry">Jewelry</option>
                                <option value="ceramics">Ceramics</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>

                    <!-- Description of Products -->
                    <div class="form-group row">
                        <label for="product_description" class="col-sm-2 col-form-label">Product Description</label>
                        <div class="col-sm-10">
                            <x-compo.textarea id="product_description" name="product_description" placeholder="Describe the products you will exhibit" required />
                        </div>
                    </div>
                </div>

                <!-- Booth Preferences -->
                <h1 class="text-xl mt-10 mb-6">Booth Preferences</h1>
                <div class="ml-5">
                    <!-- Booth Size -->
                    <div class="form-group row">
                        <label for="booth_size" class="col-sm-2 col-form-label">Booth Size</label>
                        <div class="col-sm-10">
                            <select id="booth_size" name="booth_size" class="form-control block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                <option value="small">Small</option>
                                <option value="medium">Medium</option>
                                <option value="large">Large</option>
                            </select>
                        </div>
                    </div>

                    <!-- Additional Requirements -->
                    <div class="form-group row">
                        <label for="additional_requirements" class="col-sm-2 col-form-label">Additional Requirements</label>
                        <div class="col-sm-10">
                            <x-compo.textarea id="additional_requirements" name="additional_requirements" placeholder="Specify any additional requirements for your booth (e.g., electricity, tables)" />
                        </div>
                    </div>
                </div>

                <!-- Registration Fee -->
                <h1 class="text-xl mt-10 mb-6">Payment Information</h1>
                <div class="ml-5">
                    <div class="form-group row">
                        <label for="registration_fee" class="col-sm-2 col-form-label">Registration Fee</label>
                        <div class="col-sm-10">
                            <p class="form-control-plaintext">The registration fee for exhibitors is $100.</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="payment_method" class="col-sm-2 col-form-label">Payment Method</label>
                        <div class="col-sm-10">
                            <select id="payment_method" name="payment_method" class="form-control block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                                <option value="credit_card">Credit Card</option>
                                <option value="bank_transfer">Bank Transfer</option>
                                <option value="paypal">PayPal</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <div class="text-center mt-10">
                    <button type="submit" class="apply-button">Submit Registration</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection