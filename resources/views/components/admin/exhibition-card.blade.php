<section class="user-info-container">
    <div class="user-info-content">
        <div class="sub-listing-content-up">
            <div class="main-img-wrapper">
                <img src="https://avatars.githubusercontent.com/u/55277482?v=4" alt="" class="savedimg">
            </div>
            <div class="sub-listing-info pt-0">
                <lable class="sub-listing-title">Exhibition Name</lable>
                <div class="sub-listing-features-container">
                    <div class="sub-listing-features">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-5 gap-x-10 mt-3">
                            <div class="sub-listing-feature">
                                <label class="sub-listing-feature-value">Title: </label>
                            </div>
                            <div class="sub-listing-feature">
                                <label class="sub-listing-feature-value">Category: </label>
                            </div>
                            <div class="sub-listing-feature">
                                <label class="sub-listing-feature-value">Location: </label>
                            </div>
                            <div class="sub-listing-feature">
                                <label class="sub-listing-feature-value">Date: </label>
                            </div>
                            <div class="sub-listing-feature">
                                <label class="sub-listing-feature-value">Posted At: </label>
                            </div>
                            <div class="sub-listing-feature">
                                <label class="sub-listing-feature-value">Time: </label>
                            </div>
                            <div class="sub-listing-feature">
                                <label class="sub-listing-feature-value">Updated At: </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <label for="title" class="text-customBrown font-semibold tracking-wide mt-4">Business Information</label>
        <div class="user-listing-info flex">
            <div class="user-info-column">
                <div class="user-info-tag">
                    <span class=""><i class="fa-regular fa-id-card mr-3 text-customBlue"></i>
                        Name:
                    </span>
                </div>
                <div class="user-info-tag">
                    <span class=""><i class="fa-solid fa-location-crosshairs mr-3 text-customBlue"></i>
                        Location:
                    </span>
                </div>
                <div class="user-info-tag">
                    <span class=""><i class="fa-regular fa-calendar-days mr-3 text-customBlue"></i>
                        Registered Date:
                    </span>
                </div>
            </div>
            <div class="user-info-column">
                <div class="user-info-tag">
                    <span class=""><i class="fa-solid fa-layer-group mr-3 text-customBlue"></i>

                        Category:

                    </span>
                </div>
                <div class="user-info-tag">
                    <span class=""><i class="fa-solid fa-mobile-screen mr-3 text-customBlue"></i>
                        Tel Number:
                    </span>
                </div>
                <div class="user-info-tag">
                    <span class=""><i class="fa-solid fa-envelope-open-text mr-3 text-customBlue"></i>
                        Email:
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="savedAd-buttons">
        <div class="border-r border-customGray">
            <a href="#" class="savedAd-view">
                <button class="savedAd-view"><i class="fa-regular fa-eye mr-1"></i>View Post</button></a>
        </div>
        <div class="border-l border-customGray flex">
            <button type="submit" class="remove-button savedAd-delete"><i class="fa-solid fa-clipboard-check mr-1"></i>Accept Post</button>
            <button type="submit" class="remove-button savedAd-delete border-l"><i class="fa-solid fa-ban mr-1"></i>Reject Post</button>
            <!-- <a href="#" class="remove-button savedAd-delete border-l"><i class="fa-regular fa-trash-can mr-1"></i>Delete Ad</a> -->

            <form action="" method="POST">
                @csrf
                <!-- <button type="submit" class="remove-button savedAd-delete border-l"><i class="fa-solid fa-toggle-off mr-1"></i>Deactivate Post</button> -->
            </form>
            <form action="" method="POST">
                @csrf
                <!-- <button type="submit" class="remove-button savedAd-delete"><i class="fa-solid fa-toggle-on mr-1"></i>Activate Account</button> -->
            </form>
        </div>
    </div>
</section>