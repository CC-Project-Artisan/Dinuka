<!-- Navigation Bar -->
@extends('layouts.frontend')
@section('navigation')
<header class="main-nav" id="main-nav">
    <a href="#" class="main-logo">{{config('app.name')}}</a>

    <!-- Hamburger Icon for Mobile Toggle -->
    <div class="menu-toggle" id="menu-toggle">
        <i class="fas fa-bars"></i>
    </div>

    <nav class="main-menu" id="main-menu">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Shop</a></li>
            <li><a href="#">Events</a></li>
            <li><a href="#">Exhibitions</a></li>
            <li><a href="#">About</a></li>
        </ul>
    </nav>

    <div class="main-icons">
        <a href="#"><i class="fas fa-search"></i></a>
        <a href="#"><i class="fas fa-shopping-cart"></i></a>
        <a href="{{route('login')}}"><i class="fas fa-user"></i></a>
    </div>
</header>
@endsection