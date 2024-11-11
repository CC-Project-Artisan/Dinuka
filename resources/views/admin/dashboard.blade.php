<!-- resources/views/admin/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto mt-10">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-green-500">Admin Dashboard</h1>
            <p class="mt-2 text-lg">Welcome, Admin {{ auth()->user()->name }}!</p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </div>
        <div class="mt-10 p-5 bg-white rounded shadow-md">
            <h2 class="text-2xl font-semibold">Admin Controls</h2>
            <p class="mt-2">Here, you can add admin-specific options like managing users, viewing reports, and site settings.</p>
        </div>
    </div>
</body>

</html>