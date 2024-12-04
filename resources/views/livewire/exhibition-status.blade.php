<div class="ehibition-status-buttons-container">
    <div class="status-label-wrapper">
        <div class="absolute bottom-[520px] right-2 m-2">
            @if($exhibition->status === 'approved')
            @if($exhibition->isActive)
            <label for="active" class="status-label py-1 px-3 rounded-md" style="color: white; background-color: green; font-size: medium;">Active Post</label>
            @else
            <label for="deactive" class="status-label py-1 px-3 rounded-md" style="color: white; background-color: #A82E23; font-size: medium;">Deactivated Post</label>
            @endif
            @elseif($exhibition->status === 'pending')
            <label for="pending" class="status-label py-1 px-3 rounded-md" style="color: white; background-color: rgb(208, 208, 53); font-size: medium;">Pending Post</label>
            @elseif($exhibition->status === 'rejected')
            <label for="rejected" class="status-label py-1 px-3 rounded-md" style="color: white; background-color: #A82E23; font-size: medium;">Rejected Post</label>
            @elseif($exhibition->status === 'expired')
            <label for="expired" class="status-label py-1 px-3 rounded-md" style="color: white; background-color: #A82E23; font-size: medium;">Expired Post</label>
            @endif
        </div>
    </div>
    <!-- Display Flash Message -->
    @if (session()->has('message'))
    <div id="flash-message" class="alert alert-success ehibition-status-mg">
        {{ session('message') }}
    </div>
    @endif
    <div class="ehibition-status-buttons">
        <div class="border-r border-customGray">
            <a href="#" class="savedAd-view">
                <button class="savedAd-view"><i class="fa-regular fa-eye mr-1"></i>View Post</button></a>
        </div>
        <div class="border-customGray flex">
            <!-- Activate/Deactivate Buttons -->
            <div class=" border-customGray flex">
                <div>
                    @if($status !== 'approved' && $status !== 'rejected')
                    <button wire:click="accept" type="submit" class="remove-button savedAd-delete border-l">
                        <i class="fa-solid fa-clipboard-check mr-1"></i>Accept Post
                    </button>
                    <button wire:click="reject" type="submit" class="remove-button savedAd-delete border-l">
                        <i class="fa-solid fa-ban mr-1"></i>Reject Post
                    </button>
                    @endif

                    @if($status === 'approved')
                    <button wire:click="toggleActiveStatus" type="submit" class="remove-button savedAd-delete border-l">
                        <i class="fa-solid fa-toggle-on mr-1"></i>{{ $isActive ? 'Deactivate' : 'Activate' }} Post
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>