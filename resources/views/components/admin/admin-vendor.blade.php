<section class="user-info-container">
    <div class="user-info-content">
        <div class="flex justify-between">
            <div class="ud-profile-image-wrapper">
                <img src="{{ asset('https://png.pngtree.com/png-clipart/20230927/original/pngtree-man-avatar-image-for-profile-png-image_13001877.png') }}" alt="profile image" class="user-card-profile-image">
                <div class="flex flex-col ml-2">
                    <span class="user-info-title p-0">User ID: {{ $user->id }}</span>
                    <label for="user-role" class="savedAd-view p-0"><i class="fa-solid fa-street-view mr-1"></i>Vendor</label>
                </div>
            </div>
        </div>

        <label for="title" class="text-customBrown font-semibold tracking-wide">User Information</label>
        <div class="user-listing-info flex">
            <div class="user-info-column">
                <div class="user-info-tag">
                    <span class=""><i class="fa-regular fa-id-card mr-3 text-customBlue"></i>Name: {{ $user->name }}</span>
                </div>
                <div class="user-info-tag">
                    <span class=""><i class="fa-regular fa-calendar-days mr-3 text-customBlue"></i>Registered Date: {{ Auth::user()->created_at->format('d M Y') }}</span>
                </div>
            </div>
            <div class="user-info-column">
                <div class="user-info-tag">
                    <span class=""><i class="fa-solid fa-mobile-screen mr-3 text-customBlue"></i>Tel Number: {{ $user->phone }}</span>
                </div>
                <div class="user-info-tag">
                    <span class=""><i class="fa-solid fa-envelope-open-text mr-3 text-customBlue"></i>Email: {{ $user->email }}</span>
                </div>
            </div>
        </div>

        <label for="title" class="text-customBrown font-semibold tracking-wide mt-4">Business Information</label>
        <div class="user-listing-info flex">
            <div class="user-info-column">
                <div class="user-info-tag">
                    <span class=""><i class="fa-regular fa-id-card mr-3 text-customBlue"></i>
                        Name: {{ $vendor->business_name }}
                    </span>
                </div>
                <div class="user-info-tag">
                    <span class=""><i class="fa-solid fa-location-crosshairs mr-3 text-customBlue"></i>
                        Location: {{ $vendor->business_location }}
                    </span>
                </div>
                <div class="user-info-tag">
                    <span class=""><i class="fa-regular fa-calendar-days mr-3 text-customBlue"></i>
                        Registered Date: {{ $vendor->created_at->format('d M Y') }}
                    </span>
                </div>
            </div>
            <div class="user-info-column">
                <div class="user-info-tag">
                    <span class=""><i class="fa-solid fa-layer-group mr-3 text-customBlue"></i>
                        Category: {{ $vendor->business_category }}
                    </span>
                </div>
                <div class="user-info-tag">
                    <span class=""><i class="fa-solid fa-mobile-screen mr-3 text-customBlue"></i>
                        Tel Number: {{ $vendor->business_phone }}
                    </span>
                </div>
                <div class="user-info-tag">
                    <span class=""><i class="fa-solid fa-envelope-open-text mr-3 text-customBlue"></i>
                        Email: {{ $vendor->business_email }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="savedAd-buttons">
        <div class="border-r border-customGray">
            <a href="#" class="savedAd-view">
                <button class="savedAd-view"><i class="fa-regular fa-eye mr-1"></i>View Vendor Account</button></a>
        </div>
        <div class="border-l border-customGray flex">
            @if($user->isActive)
            <form action="{{ route('admin.users.deactivate', $user) }}" method="POST">
                @csrf
                <button type="submit" class="remove-button savedAd-delete"><i class="fa-solid fa-user-lock mr-1"></i>Deactivate Account</button>
            </form>
            @else
            <form action="{{ route('admin.users.activate', $user) }}" method="POST">
                @csrf
                <button type="submit" class="remove-button savedAd-delete"><i class="fa-solid fa-unlock-keyhole mr-1"></i>Activate Account</button>
            </form>
            @endif
        </div>
    </div>
</section>