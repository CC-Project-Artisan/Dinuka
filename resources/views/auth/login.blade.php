@extends('layouts.frontend')
@section('pages')
<div class="flex w-full justify-evenly ">
    <div class="flex flex-col justify-center gap-4">
        <div class="heading">
            <h1 class="text-4xl text-center">Register</h1>
            <p>Create your account now and receive all the benefits.</p>
        </div>

        <div class="flex flex-col gap-3 ml-20 sign-page-lable" style="color: black;">
            <label class=""><i class="mr-2 fa-solid fa-car"></i> Create Advertises</label>
            <label class=""><i class="mr-2 fa-regular fa-heart"></i></i> Shortlist arts & crafts</label>
            <label class=""><i class="mr-2 fa-regular fa-message"></i> Connect with artisans</label>
            <label class=""><i class="mr-2 fa-regular fa-paper-plane"></i> Receive industry news</label>
        </div>
        <div class="new-register-link">
            @if (Route::has('register'))
            <a class="flex items-center justify-center px-2 py-3" href="{{ route('register') }}">
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
                <h1 class="mb-3 text-4xl">Login</h1>

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block w-full mt-1"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="text-sm text-gray-600 ms-2">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <!-- @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif -->
                <button type="submit" class="login-link" id="submitbtn">{{ __('Log in') }}</button>
            </form>
        </x-guest-layout>
    </div>
</div>
@endsection