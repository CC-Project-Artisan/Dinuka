<span>Fill out the form below to add a new category. Ensure that all information is accurate and complete.</span>
<div class="mt-2">
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <x-compo.input type="text" name="name" id="name" placeholder="Enter category name" class="form-control" required />
            <!-- <input type="text" name="name" id="name" class="form-control" required> -->
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" placeholder="Enter category description" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="ud-btn font-secondaryText">Add category</button>
        <!-- <button  class="btn btn-primary">Add Category</button> -->
    </form>
</div>