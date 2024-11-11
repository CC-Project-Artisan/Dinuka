<!-- My presonal details -->
<div id="personalDetails" class="ud-page-wrapper ">
    <div class="ud-presonal-page">
        <div class="ud-pro-change">
            <h2 class="text-[50px] font-bold text-customBlue">Your details</h2>
            <span>Please keep your details up to date. Your personal data are stored securely. We do not share information with third parties.</span>
            <form action="" method="POST" class="mt-4">
                <div class="mb-4">
                    <span class="required"></span>
                    <label for="fullName" class="block text-sm font-medium text-gray-700">Full Name
                    </label>
                    <input type="text" name="uName" id="lname" placeholder="{{Auth::user()->name}}" :value="old('name', $user->name)" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email address
                    </label>
                    <input type="text" name="uEmail" id="lemail" placeholder="" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="mobile" class="block text-sm font-medium text-gray-700 ">Mobile
                    </label>
                    <input type="number" name="uPhone" id="lphoen" placeholder="" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <button type="submit" class="ud-btn">Save my details</button>
                </div>
            </form>
        </div>
    </div>
</div>