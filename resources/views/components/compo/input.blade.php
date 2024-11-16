<!-- FILE: /Users/alexchamara/Documents/CC2/Artisan.lk/resources/views/components/compo/input.blade.php -->
@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => ' block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm']) }}>