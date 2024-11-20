<section class="user-info-container">
    <div class="user-info-content">
        <div>
            <span class="user-info-title">Category ID: {{ $category->id }}</span>
        </div>
        <div class="user-listing-info flex">
            <div class="user-info-column">
                <div class="user-info-tag">
                    <span><i class="fa-regular fa-id-card mr-3"></i>Name: <span id="category-name">{{ $category->name }}</span></span>
                    <x-compo.input type="text" id="category-name-input" value="{{ $category->name }}" class="hidden form-control" />
                </div>
                <div class="user-info-tag">
                    <span><i class="fa-regular fa-calendar-days mr-3"></i>Created At: {{ $category->created_at }}</span>
                </div>
            </div>
            <div class="user-info-column">
                <div class="user-info-tag">
                    <span><i class="fa-regular fa-calendar-days mr-3"></i>Updated At: {{ $category->updated_at }}</span>
                </div>
            </div>
        </div>
        <div class="user-info-tag mt-3">
            <span><i class="fa-solid fa-audio-description mr-3"></i>Description: <span id="category-description">{{ $category->description }}</span></span>
            <x-compo.input type="textarea" id="category-description-input" class="hidden form-control">{{ $category->description }}</x-compo.input>
        </div>
    </div>
    <div class="savedAd-buttons">
        <div class="border-r border-customGray">
            <button id="update-button" class="savedAd-view" onclick="toggleEditMode(event)"><i class="fa-solid fa-pen mr-1"></i>Update</button>
            <button id="save-button" class="savedAd-view hidden" onclick="saveCategory(event)"><i class="fa-solid fa-save mr-1"></i>Save</button>
        </div>
        <div class="border-l border-customGray flex">
            <form action="{{ route('category.destroy', ['id' => $category->id]) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="remove-button savedAd-delete">
                    <i class="fa-solid fa-trash mr-1"></i> Delete
                </button>
            </form>
        </div>
    </div>

    <!-- Update Category Form -->
    <form id="update-category-form" action="{{ route('category.update', ['id' => $category->id]) }}" method="POST" class="hidden">
        @csrf
        @method('PUT')
        <x-compo.input type="hidden" name="name" id="form-category-name" value="{{ $category->name }}" />
        <x-compo.input type="hidden" name="description" id="form-category-description" value="{{ $category->description }}" />
    </form>
</section>

<script>
    function toggleEditMode(event) {
        event.preventDefault();
        document.getElementById('category-name').classList.toggle('hidden');
        document.getElementById('category-name-input').classList.toggle('hidden');
        document.getElementById('category-description').classList.toggle('hidden');
        document.getElementById('category-description-input').classList.toggle('hidden');
        document.getElementById('update-button').classList.toggle('hidden');
        document.getElementById('save-button').classList.toggle('hidden');
    }

    function saveCategory(event) {
        event.preventDefault();
        const nameInput = document.getElementById('category-name-input').value;
        const descriptionInput = document.getElementById('category-description-input').value;

        document.getElementById('form-category-name').value = nameInput;
        document.getElementById('form-category-description').value = descriptionInput;

        document.getElementById('update-category-form').submit();
    }
</script>