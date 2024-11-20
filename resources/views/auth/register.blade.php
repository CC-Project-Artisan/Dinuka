@extends('layouts.frontend')
@section('pages')
<div class="flex justify-evenly w-full ">
    <div>
        <x-guest-layout>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1 class="text-4xl mb-3">Register</h1>

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                        type="password"
                        name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="login-link">{{ __('Register') }}</button>
                </div>
            </form>
        </x-guest-layout>
    </div>
    <div class="flex flex-col gap-4 justify-center">
        <div class="heading">
            <h1 class="text-4xl text-center">Log In</h1>
            <p>Access your account now and enjoy all the features:</p>
        </div>

        <div class="sign-page-lable flex gap-3 ml-20 flex-col" style="color: black;">
            <label class=""><i class="fa-solid fa-car mr-2"></i> Manage Advertisements</label>
            <label class=""><i class="fa-regular fa-heart mr-2"></i> Save Favorite Vehicles</label>
            <label class=""><i class="fa-regular fa-message mr-2"></i> Interact with Atrisans</label>
            <label class=""><i class="fa-regular fa-paper-plane mr-2"></i> Stay Updated with Industry News</label>
        </div>
        <div class="new-register-link">
            @if (Route::has('register'))
            <a class="py-3 px-2 flex items-center justify-center" href="{{ route('login') }}" id="login-link">
                {{ __("Already have an account") }}
            </a>
            @endif
        </div>
    </div>
</div>
@endsection