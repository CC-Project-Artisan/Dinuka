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

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom text styles for this template -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:ital,wght@0,100;0,300;0,400;0,500;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Playwrite+AU+NSW:wght@100..400&family=Playwrite+HR:wght@100..400&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    @vite([
    'resources/css/welcome.css',
    'resources/css/app.css',
    'resources/js/app.js',
    'resources/js/welcome.js',
    'resources/css/banner.css',
    'resources/js/banner.js',
    'resources/css/feature.css',
    'resources/css/category.css',
    'resources/css/dashboard.css',
    'resources/js/dashboard.js',
    'resources/css/product_list.css',
    'resources/js/product_list.js',

    'resources/css/product_details.css',
    'resources/css/cart.css',
    'resources/css/component.css'
    ])
    

    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/brands.min.css">

</head>

<body>
    <!-- Navigation Bar -->
    <header class="main-nav" id="main-nav">
        <a href="{{ route('welcome') }}" class="main-logo">{{config('app.name')}}</a>

        <!-- Hamburger Icon for Mobile Toggle -->
        <div class="menu-toggle" id="menu-toggle">
            <i class="fas fa-bars"></i>
        </div>

        <nav class="main-menu" id="main-menu">
            <ul>
                <li><a href="{{ route('welcome') }}">Home</a></li>
                <li><a href="{{ route('pages.shop') }}">Shop</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Exhibitions</a></li>
                <li><a href="{{ route('pages.about') }}">About</a></li>
            </ul>
        </nav>

        <div class="main-icons">
            <a href="#"><i class="fas fa-search"></i></a>
            <a href="{{route('pages.cart')}}"><i class="fas fa-shopping-cart"></i></a>
            <a href="{{route('login')}}"><i class="fas fa-user"></i></a>
        </div>
    </header>

    <!-- Page Contents -->
   <div class="page-content pt-[87px]">
        @yield('pages')
        
   </div>


 <!-- Footer -->
    <footer class="footer-container">
        <div class="footer-content">
            <!-- Logo and Description -->
            <div class="footer-section logo-section">
                <h2>{{config('app.name')}}</h2>
                <p>Discover a vibrant marketplace where artisans and craft lovers come together.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            <!-- Category Section -->
            <div class="footer-section categories">
                <h3>categories</h3>
                <ul>
                    <li><a href="#">Mask</a></li>
                    <li><a href="#">Jewelry</a></li>
                    <li><a href="#">Batik & Silk</a></li>
                    <li><a href="#">Paintings</a></li>
                    <li><a href="#">Pottery</a></li>
                </ul>
            </div>

            <!-- About Us Section -->
            <div class="footer-section about-us">
                <h3>About Us</h3>
                <ul>
                    <li><a href="#">About Me</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Our Gallary</a></li>
                    <li><a href="#">Track Your Order</a></li>
                </ul>
            </div>

            <!-- Happaning Section -->
            <div class="footer-section Happanings">
                <h3>Happanings</h3>
                <ul>
                    <li><a href="#">Exhibitions</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">Intractive Map</a></li>
                </ul>
            </div>

            <!-- Instagram Section -->
            <div class="footer-section instagram">
                <h3>Instagram</h3>
                <div class="instagram-gallery my-[10px]">
                    <img src="https://via.placeholder.com/80" alt="Image 1">
                    <img src="https://via.placeholder.com/80" alt="Image 2">
                </div>
                <div class="mt-2 instagram-gallery">
                    <img src="https://via.placeholder.com/80" alt="Image 1">
                    <img src="https://via.placeholder.com/80" alt="Image 2">
                </div>
            </div>
        </div>
    </footer>

</body>

</html>