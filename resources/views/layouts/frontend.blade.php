<!-- this is the entry point -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>{{config('app.name')}}</title>

    @include('layouts.head')
    @livewireStyles
</head>

<body>
    @include('layouts.nav')


    <div id="search-modal" class="search-modal">
        <div class="search-modal-content">
            <!-- Close Button -->
            <a href="#" class="close">&times;</a>

            <!-- Search Bar -->
            <form action="{{ route('search') }}" method="GET" class="search-bar" id="search-form">
                <select name="category" id="category-select">
                    <option value="all">All Categories</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <input type="text" name="query" placeholder="Search..." id="search-input" required>
                <button type="submit" class="search-btn">Search</button>
            </form>

            <!-- Placeholder for search results -->
            <div id="search-results">
                <p>Type a letter to search for products</p>
            </div>
        </div>
    </div>


    <!-- Page Contents -->
    <div class="page-content pt-[87px]">
        @yield('pages')
        @livewireScripts
    </div>

    @include('layouts.footer')
</body>

</html>