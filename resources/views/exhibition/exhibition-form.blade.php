@extends('layouts.frontend')
@section('pages')

<div class="container mt-3 w-[70%]">
    <div class="row bg-white p-6 rounded shadow">
        <div class="col-md-12">

            <h1 class="text-4xl text-center my-5">Exhibition Form</h1>
            <form action="" method="POST" id="exhibition-form" enctype="multipart/form-data">
                @csrf

                <!-- details -->
                <h1 class="text-xl mb-6">Exhibition Details</h1>
                <div class="ml-5">
                    <!-- name -->
                    <div class="form-group row">
                        <label for="exhibition_name" class="col-sm-2 col-form-label">Exhibition Name</label>
                        <div class="col-sm-10">
                            <x-compo.input type="text" id="exhibition_name" name="exhibition_name" placeholder="Enter exhibition name" autofocus required />
                        </div>
                    </div>

                    <!-- Exhibition description -->
                    <div class="form-group row">
                        <label for="exhibition_description" class="col-sm-2 col-form-label">Exhibition Description</label>
                        <div class="col-sm-10">
                            <x-compo.textarea id="exhibition_description" name="exhibition_description" placeholder="Enter description" required />
                        </div>
                    </div>

                    <!-- date option -->
                    <div class="form-group row">
                        <label for="date_option" class="col-sm-2 col-form-label">Date Option</label>
                        <div class="col-sm-10">
                            <!-- <x-compo.select option="" id="date_option" name="date_option" onchange="toggleDateInputs()">
                                <option value="">Select</option>
                                <option value="one_date">One Date</option>
                                <option value="few_dates">Few Dates</option>    
                            </x-compo.select> -->
                            <select id="date_option" name="date_option" class="form-control block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" onchange="toggleDateInputs()" required>
                                <option value="one_date">One Date</option>
                                <option value="few_dates">Few Dates</option>
                            </select>
                        </div>
                    </div>

                    <!-- one day -->
                    <div id="one_date_input" class="form-group row">
                        <label for="exhibition_date" class="col-sm-2 col-form-label">Exhibition Date</label>
                        <div class="col-sm-10">
                            <x-compo.input type="date" id="exhibition_date" name="exhibition_date" placeholder="Exhibition Date" required />
                        </div>
                    </div>

                    <!-- start date -->
                    <div id="few_dates_input" class="form-group row hidden">
                        <label for="start_date" class="col-sm-2 col-form-label">Start Date</label>
                        <div class="col-sm-10">
                            <x-compo.input type="date" id="start_date" name="start_date" placeholder="Start Date" required />
                        </div>
                    </div>

                    <!-- end date -->
                    <div id="few_dates_input_end" class="form-group row hidden">
                        <label for="end_date" class="col-sm-2 col-form-label">End Date</label>
                        <div class="col-sm-10">
                            <x-compo.input type="date" id="end_date" name="end_date" placeholder="End Date" required />
                        </div>
                    </div>

                    <!-- Start time -->
                    <div class="form-group row">
                        <label for="start_time" class="col-sm-2 col-form-label">Start Time</label>
                        <div class="col-sm-10">
                            <x-compo.input type="time" id="start_time" name="start_time" placeholder="Start Time" required />
                        </div>
                    </div>

                    <!-- End time -->
                    <div class="form-group row">
                        <label for="end_time" class="col-sm-2 col-form-label">End Time</label>
                        <div class="col-sm-10">
                            <x-compo.input type="time" id="end_time" name="end_time" placeholder="End Time" required />
                        </div>
                    </div>

                    <!-- Exhibition Location -->
                    <div class="form-group row">
                        <label for="exhibition_location" class="col-sm-2 col-form-label">Exhibition Location</label>
                        <div class="col-sm-10">
                            <x-compo.input type="text" id="exhibition_location" name="exhibition_location" placeholder="Enter location" required />
                        </div>
                    </div>

                    <!-- Organizaton name -->
                    <div class="form-group row">
                        <label for="organization_name" class="col-sm-2 col-form-label">Organization Name</label>
                        <div class="col-sm-10">
                            <x-compo.input type="text" id="organization_name" name="organization_name" placeholder="Enter organization name" required />
                        </div>
                    </div>

                    <!-- Telephone Numbers -->
                    <div class="form-group row">
                        <label for="contact-count" class="col-sm-2 col-form-label">Number of Contacts</label>
                        <div class="col-sm-10">
                            <x-compo.select id="contact-count" name="contact-count" :options="[1 => '1', 2 => '2', 3 => '3']" class="flex-grow-1" style="flex: 0 0 25%;" required />
                        </div>
                    </div>
                    <div id="contact-fields">
                        <div class="form-group row">
                            <label for="telephone1" class="col-sm-2 col-form-label">Contact 1</label>
                            <div class="col-sm-10 d-flex gap-2">
                                <x-compo.input type="text" id="name1" name="name1" placeholder="Enter contact name" class="flex-grow-1" style="flex: 0 0 75%;" required />
                                <x-compo.input type="text" id="telephone1" name="telephone1" placeholder="Enter mobile number" class="flex-grow-1" min="0" style="flex: 0 0 25%;" required />
                            </div>
                        </div>
                    </div>

                    <!-- Email Addresses -->
                    <div class="form-group row">
                        <label for="email-count" class="col-sm-2 col-form-label">Number of Emails</label>
                        <div class="col-sm-10">
                            <x-compo.select id="email-count" name="email-count" :options="[1 => '1', 2 => '2', 3 => '3']" class="flex-grow-1" style="flex: 0 0 25%;" />
                        </div>
                    </div>
                    <div id="email-fields">
                        <div class="form-group row">
                            <label for="email1" class="col-sm-2 col-form-label">Email 1</label>
                            <div class="col-sm-10">
                                <x-compo.input type="email" id="email1" name="email1" placeholder="Enter email address" class="flex-grow-1" required />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- category -->
                <h1 class="text-xl mt-10 mb-6">Exhibition Category</h1>
                <div class="ml-5">
                    <!-- category type -->
                    <div class="form-group row">
                        <label for="category" class="col-sm-2 col-form-label">Exhibition Category</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="categories[]" id="category_all" value="all">
                                <label class="form-check-label" for="category_art">All</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="categories[]" id="category_history" value="history">
                                <label class="form-check-label" for="category_history">History</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="categories[]" id="category_science" value="science">
                                <label class="form-check-label" for="category_science">Science</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- exhibitor information -->
                <h1 class="text-xl mt-10 mb-6">Exhibitor Information</h1>
                <div class="ml-5">
                    <!-- registration start date -->
                    <div class="form-group row">
                        <label for="registration_start_date" class="col-sm-2 col-form-label">Registration Start Date</label>
                        <div class="col-sm-10">
                            <x-compo.input type="date" id="registration_start_date" name="registration_start_date" placeholder="Registration Start Date" />
                        </div>
                    </div>
                    <!-- end date -->
                    <div class="form-group row">
                        <label for="registration_end_date" class="col-sm-2 col-form-label">Registration End Date</label>
                        <div class="col-sm-10">
                            <x-compo.input type="date" id="registration_end_date" name="registration_end_date" placeholder="Registration End Date" />
                        </div>
                    </div>

                    <!-- maximum nuber of exhibitors -->
                    <div class="form-group row">
                        <div class="flex flex-col lg:max-w-[16.5%] sm:max-w-full md:max-w-full">
                            <label for="max_exhibitors">Maximum Exhibitors</label>
                            <small>(If limited)</small>
                        </div>
                        <div class="col-sm-10">
                            <x-compo.input type="number" id="max_exhibitors" name="max_exhibitors" min="0" placeholder="Enter maximum exhibitors" />
                        </div>
                    </div>

                </div>

                <!-- Price information -->
                <h1 class="text-xl mt-10">Price Information</h1>
                <div class="ml-5">
                    <!-- exhibitors -->
                    <h2 class=" text-lg mt-3 mb-3">For Exhibitors</h2>
                    <!-- Entrance Fee -->
                    <div class="form-group row">
                        <div class="flex flex-col lg:max-w-[16.5%] sm:max-w-full md:max-w-full">
                            <label for="entrance_fee">Entrance Fee</label>
                            <small>(If applicable)</small>
                        </div>

                        <div class="col-sm-10">
                            <x-compo.input type="number" id="entrance_fee" name="entrance_fee" min="0" placeholder="Enter entrance fee" />
                        </div>
                    </div>

                    <!-- visitors -->
                    <h2 class=" text-lg mt-3 mb-3">For Visitors</h2>
                    <!-- Regular Price -->
                    <div class="form-group row">
                        <div class="flex flex-col lg:max-w-[16.5%] sm:max-w-full md:max-w-full">
                            <label for="regular_price">Adult Price</label>
                            <small>(If applicable)</small>
                        </div>
                        <div class="col-sm-10">
                            <x-compo.input type="number" id="regular_price" name="regular_price" min="0" placeholder="Enter regular price" />
                        </div>
                    </div>

                    <!-- Student Price -->
                    <div class="form-group row">
                        <div class="flex flex-col lg:max-w-[16.5%] sm:max-w-full md:max-w-full">
                            <label for="student_price">Student Price</label>
                            <small>(If applicable)</small>
                        </div>
                        <div class="col-sm-10">
                            <x-compo.input type="number" id="student_price" name="student_price" min="0" placeholder="Enter student price" />
                        </div>
                    </div>

                    <!-- Child Price -->
                    <div class="form-group row">
                        <div class="flex flex-col lg:max-w-[16.5%] sm:max-w-full md:max-w-full">
                            <label for="child_price">Child Price</label>
                            <small>(If applicable)</small>
                        </div>
                        <div class="col-sm-10">
                            <x-compo.input type="number" id="child_price" name="child_price" min="0" placeholder="Enter child price" />
                        </div>
                    </div>
                </div>

                <!-- media -->
                <h1 class="text-xl mt-10 mb-6">Price Information</h1>
                <div class="ml-5">
                    <!-- Social Media Links -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Social Media Links</label>
                        <div class="col-sm-10 flex flex-wrap gap-5">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="facebook-checkbox" name="social-media-checkboxes" value="facebook">
                                <label class="form-check-label" for="facebook-checkbox">Facebook</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="instagram-checkbox" name="social-media-checkboxes" value="instagram">
                                <label class="form-check-label" for="instagram-checkbox">Instagram</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="tiktok-checkbox" name="social-media-checkboxes" value="tiktok">
                                <label class="form-check-label" for="tiktok-checkbox">TikTok</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="youtube-checkbox" name="social-media-checkboxes" value="youtube">
                                <label class="form-check-label" for="youtube-checkbox">YouTube</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="other-checkbox" name="social-media-checkboxes" value="other">
                                <label class="form-check-label" for="other-checkbox">Other</label>
                            </div>
                        </div>
                    </div>
                    <div id="social-media-fields"></div>
                </div>

                <button type="submit" class="apply-button">Apply Exhibition</button>

            </form>

            <!-- popup mg -->
            <div id="success-message" class="hidden">
                <h1>Your application has been submitted successfully!</h1>
                <a href="#">Ok!</a>
            </div>
        </div>
    </div>
</div>

<script>

    // date option selection
    function toggleDateInputs() {
        const dateOption = document.getElementById('date_option').value;
        const oneDateInput = document.getElementById('one_date_input');
        const fewDatesInput = document.getElementById('few_dates_input');
        const fewDatesInputEnd = document.getElementById('few_dates_input_end');

        if (dateOption === 'one_date') {
            oneDateInput.classList.remove('hidden');
            fewDatesInput.classList.add('hidden');
            fewDatesInputEnd.classList.add('hidden');
        } else {
            oneDateInput.classList.add('hidden');
            fewDatesInput.classList.remove('hidden');
            fewDatesInputEnd.classList.remove('hidden');
        }
    }

    // contact number selecetion
    document.getElementById('contact-count').addEventListener('change', function() {
        const count = parseInt(this.value);
        const contactFields = document.getElementById('contact-fields');
        contactFields.innerHTML = '';

        for (let i = 1; i <= count; i++) {
            const fieldGroup = document.createElement('div');
            fieldGroup.className = 'form-group row';
            fieldGroup.innerHTML = `
                <label for="telephone${i}" class="col-sm-2 col-form-label">Contact ${i}</label>
                <div class="col-sm-10 d-flex gap-2">
                    <x-compo.input type="text" id="name${i}" name="name${i}" placeholder="Enter contact name" class="flex-grow-1" style="flex: 0 0 75%;" />
                    <x-compo.input type="text" id="telephone${i}" name="telephone${i}" placeholder="Enter mobile number" class="flex-grow-1" style="flex: 0 0 25%;" />
                </div>
            `;
            contactFields.appendChild(fieldGroup);
        }
    });

    // email number selecetion
    document.getElementById('email-count').addEventListener('change', function() {
        const count = parseInt(this.value);
        const emailFields = document.getElementById('email-fields');
        emailFields.innerHTML = '';

        for (let i = 1; i <= count; i++) {
            const fieldGroup = document.createElement('div');
            fieldGroup.className = 'form-group row';
            fieldGroup.innerHTML = `
                <label for="email${i}" class="col-sm-2 col-form-label">Email ${i}</label>
                <div class="col-sm-10">
                    <x-compo.input type="email" id="email${i}" name="email${i}" placeholder="Enter email address" class="flex-grow-1" />
                </div>
            `;
            emailFields.appendChild(fieldGroup);
        }
    });

    // social media links
    document.querySelectorAll('input[name="social-media-checkboxes"]').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const socialMediaFields = document.getElementById('social-media-fields');
            socialMediaFields.innerHTML = '';

            document.querySelectorAll('input[name="social-media-checkboxes"]:checked').forEach(function(checkedBox) {
                const platform = checkedBox.value;
                const fieldGroup = document.createElement('div');
                fieldGroup.className = 'form-group row';
                fieldGroup.innerHTML = `
                    <label for="${platform}" class="col-sm-2 col-form-label">${platform.charAt(0).toUpperCase() + platform.slice(1)}</label>
                    <div class="col-sm-10">
                        <x-compo.input type="url" id="${platform}" name="${platform}" placeholder="Enter ${platform} link" class="flex-grow-1" />
                    </div>
                `;
                socialMediaFields.appendChild(fieldGroup);
            });
        });
    });
</script>
@endsection