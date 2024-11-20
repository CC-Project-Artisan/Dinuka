<section class="savedAd-listing-container shadow ">
    <div class="sub-listing-content">
        <div class="savedAd-listing-wrapper">
            <div class="savedAd-img">
                <img src="https://avatars.githubusercontent.com/u/55277482?v=4" alt="" class="savedimg">
            </div>
            <div class="savedAd-details">
                <div class="savedAd-title">
                    <h3>Pottery</h3>
                </div>
                <div class="savedAd-price">
                    <label for="vahiclePrice">Rs. 1,000,000</label>
                </div>
                <div class="savedAd-location">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="savedAd-buttons">
            <div class="border-r border-customGray">
                <button class="savedAd-view"><i class="fa-regular fa-eye mr-1"></i>View advert</button>
            </div>
            <div class="border-l border-customGray">
                <button class="remove-button savedAd-delete"><i class="fa-regular fa-trash-can mr-1"></i>
                    Remove
                </button>
            </div>
        </div>
    </div>
</section>

<script>
    function deleteAlert() {
            //delete pop-up display and transitions
            const deleteButton = document.querySelector('.remove-button');
            const popup = document.querySelector('.popup');
            const cancelButton = document.querySelector('cancel-button');
            const confirmDeleteButton = document.querySelector('delete-button');

            deleteButton.addEventListener('click', () => {
                popup.classList.remove('opacity-0', 'pointer-events-none');
                popup.classList.add('opacity-100');
                popup.children[0].classList.remove('scale-90');
                popup.children[0].classList.add('scale-100');
            });

            cancelButton.addEventListener('click', () => {
                popup.classList.remove('opacity-100');
                popup.classList.add('opacity-0');
                popup.children[0].classList.remove('scale-100');
                popup.children[0].classList.add('scale-90');
                setTimeout(() => {
                    popup.classList.add('pointer-events-none');
                }, 300);
            });

            confirmDeleteButton.addEventListener('click', () => {
                popup.classList.remove('opacity-100');
                popup.classList.add('opacity-0');
                popup.children[0].classList.remove('scale-100');
                popup.children[0].classList.add('scale-90');
                setTimeout(() => {
                    popup.classList.add('pointer-events-none');
                }, 300);
            });
    }
</script>