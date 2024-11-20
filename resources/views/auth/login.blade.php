@extends('layouts.frontend')
@section('pages')
<div class="flex justify-evenly w-full ">
    <div class="flex flex-col gap-4 justify-center">
        <div class="heading">
            <h1 class="text-4xl text-center">Register</h1>
            <p>Create your account now and receive all the benefits.</p>
        </div>

        <div class="sign-page-lable flex gap-3 ml-20 flex-col" style="color: black;">
            <label class=""><i class="fa-solid fa-car mr-2"></i> Create Advertises</label>
            <label class=""><i class="fa-regular fa-heart mr-2"></i></i> Shortlist arts & crafts</label>
            <label class=""><i class="fa-regular fa-message mr-2"></i> Connect with artisans</label>
            <label class=""><i class="fa-regular fa-paper-plane mr-2"></i> Receive industry news</label>
        </div>
        <div class="new-register-link">
            @if (Route::has('register'))
            <a class="py-3 px-2 flex items-center justify-center" href="{{ route('register') }}">
                {{ __("Register now - it's free") }}
            </a>
            @endif
        </div>
    </div>
    <div>
        <x-guest-layout>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4 w-[90rem]" :status="session('status')" />
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1 class="text-4xl mb-3">Login</h1>

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <!-- @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif -->
                <button type="submit" class="login-link">{{ __('Log in') }}</button>
            </form>
        </x-guest-layout>
    </div>
</div>
@endsection