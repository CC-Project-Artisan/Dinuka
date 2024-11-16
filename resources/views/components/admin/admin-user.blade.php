<section class="user-info-container">
    <div class="user-info-content">
        <div class="">
            <div class="ud-profile-image-wrapper">
                <img src="{{ asset('https://png.pngtree.com/png-clipart/20230927/original/pngtree-man-avatar-image-for-profile-png-image_13001877.png') }}" alt="profile image" class="user-card-profile-image">
                <span class="user-info-title">User ID: </span>
            </div>
        </div>

        <div class="user-listing-info flex">
            <div class="user-info-column">
                <div class="user-info-tag">
                    <span class=""><i class="fa-regular fa-id-card mr-3 text-customBlue"></i>Name: </span>
                </div>
                <div class="user-info-tag">
                    <span class=""><i class="fa-solid fa-location-crosshairs mr-3 text-customBlue"></i>Location: </span>
                </div>
                <div class="user-info-tag">
                    <span class=""><i class="fa-regular fa-calendar-days mr-3 text-customBlue"></i>Registered Date: </span>
                </div>
            </div>
            <div class="user-info-column">
                <div class="user-info-tag">
                    <span class=""><i class="fa-solid fa-mobile-screen mr-3 text-customBlue"></i>Tel Number: </span>
                </div>
                <div class="user-info-tag">
                    <span class=""><i class="fa-solid fa-envelope-open-text mr-3 text-customBlue"></i>Email: </span>
                </div>
            </div>
        </div>

        <!-- <div class="user-info-btns">
            <a href="" class="btn user-btn-danger">Deactive Account</a>
        </div> -->
    </div>
    <div class="savedAd-buttons">
        <div class="border-customGray">
            <a href="#" class="savedAd-view">
                <button class="savedAd-view"></button></a>
        </div>
        <div class="border-l border-customGray flex">
            <!-- <a href="#" class="remove-button savedAd-delete"><i class="fa-solid fa-street-view mr-1"></i>
                View Vendor Profile
            </a> -->

            <a href="#" class="remove-button savedAd-delete"><i class="fa-solid fa-user-lock mr-1"></i>
                Deactive Account
            </a>
        </div>
    </div>
</section>