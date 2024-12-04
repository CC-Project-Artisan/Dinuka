<section class="user-info-container">
    <div class="user-info-content">
        <div class="sub-listing-content-up">
            <!-- Exhibition banner -->
            <div class="main-img-wrapper">
                @if($exhibition->exhibitionBanner)
                @php
                $banners = json_decode($exhibition->exhibitionBanner, true);
                $firstBanner = $banners[0] ?? null;
                @endphp
                @if($firstBanner)
                <img src="{{ asset('images/' . $firstBanner) }}"
                    alt="{{ $exhibition->exhibition_name }}"
                    class="savedimg object-cover w-full h-full">
                @else
                <img src="{{ asset('images/default-banner.jpg') }}"
                    alt="Default Exhibition Banner"
                    class="savedimg object-cover w-full h-full">
                @endif
                @else
                <img src="{{ asset('images/default-banner.jpg') }}"
                    alt="Default Exhibition Banner"
                    class="savedimg object-cover w-full h-full">
                @endif
            </div>

            <!-- Publisher information -->
            <div class="sub-listing-info pt-0">
                <div class="flex">
                    <lable class="sub-listing-title">Publisher Information</lable>
                </div>
                <div class="sub-listing-features-container">
                    <div class="sub-listing-features">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-5 gap-x-10 mt-3">
                            <div class="sub-listing-feature">
                                <label class="sub-listing-feature-value">Name: {{ $vendor->business_name }}</label>
                            </div>
                            <div class="sub-listing-feature">
                                <label class="sub-listing-feature-value">ID: {{ $vendor->id }}</label>
                            </div>
                            <div class="sub-listing-feature">
                                <label class="sub-listing-feature-value">
                                    Category: {{ $vendor->business_category }}
                                </label>
                            </div>
                            <div class="sub-listing-feature">
                                <label class="sub-listing-feature-value">Tel Number: {{ $vendor->business_phone }}</label>
                            </div>
                            <div class="sub-listing-feature">
                                <label class="sub-listing-feature-value">Email: {{ $vendor->business_email }}</label>
                            </div>
                            <div class="sub-listing-feature">
                                <label class="sub-listing-feature-value">Registered Date: {{ $vendor->created_at->format('d M Y') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Exhibition information -->
        <label for="title" class="text-customBrown font-semibold tracking-wide mt-4">Exhibition Information</label>
        <div class="user-listing-info flex">
            <div class="user-info-column">
                <div class="user-info-tag">
                    <span class=""><i class="fa-regular fa-id-card mr-3 text-customBlue"></i>
                        <b>Title:</b> {{ $exhibition->exhibition_name }}
                    </span>
                </div>
                <div class="user-info-tag">
                    <span class=""><i class="fa-brands fa-cc-diners-club mr-3"></i>
                        <b>Organization:</b> {{ $exhibition->organization_name }}
                    </span>
                </div>
                <div class="user-info-tag">
                    <span class=""><i class="fa-solid fa-layer-group mr-3"></i>
                        <b>Category:</b> {{ $exhibition->category_name }}
                    </span>
                </div>
                <div class="user-info-tag">
                    <span class=""><i class="fa-solid fa-location-crosshairs mr-3 text-customBlue"></i>
                        <b>Location:</b> {{ $exhibition->exhibition_location }}
                    </span>
                </div>
            </div>
            <div class="user-info-column">
                <div class="user-info-tag">
                    <span class=""><i class="fa-regular fa-calendar-days mr-3 text-customBlue"></i>
                        <b>Date:</b> {{ \Carbon\Carbon::parse($exhibition->exhibition_date)->format('d M Y') }}
                    </span>
                </div>
                <div class="user-info-tag">
                    <span class=""><i class="fa-regular fa-clock mr-3"></i>
                        <b>Time:</b> {{ \Carbon\Carbon::parse($exhibition->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($exhibition->end_time)->format('h:i A') }}
                    </span>
                </div>
                <div class="user-info-tag">
                    <span class=""><i class="fa-solid fa-envelope mr-3"></i>
                        <!-- @foreach($exhibitionContacts as $exhibitionContact)
                        <span>{{ $exhibitionContact->telephone }}</span>
                        @if($exhibitionContact->name)
                            <span class="ml-2">({{ $exhibitionContact->name }})</span>
                        @endif
                    @endforeach -->
                        <!-- pass the exhibition emails -->
                        <!-- @foreach($exhibitionEmails as $email)
                        <span>{{ $email->email }}</span>
                        @if($email->name)
                        <span class="ml-2">({{ $email->name }})</span>
                        @endif
                        @endforeach -->
                </div>
                <div class="user-info-tag">
                    <span class=""><i class="fa-solid fa-mobile-screen mr-3 text-customBlue"></i>
                        <!-- @foreach($exhibitionContacts as $exhibitionContact)
                        <span>{{ $exhibitionContact->telephone }}</span>
                        @if($exhibitionContact->name)
                            <span class="ml-2">({{ $exhibitionContact->name }})</span>
                        @endif
                    @endforeach -->
                </div>
            </div>
        </div>
    </div>
    <livewire:exhibition-status :exhibition-id="$exhibition->id" />
    </div>
</section>