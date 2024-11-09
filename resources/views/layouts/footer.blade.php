@extends('layouts.frontend')
@section('footer')
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
@endsection