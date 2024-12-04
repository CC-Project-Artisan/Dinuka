@props(['disabled' => false, 'name' => '', 'error' => false, 'required' => false])

<div class="w-full">
    <input 
        {{ $disabled ? 'disabled' : '' }}
        {{ $required ? 'required' : '' }}
        name="{{ $name }}"
        {!! $attributes->merge(['class' => 'block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm' . ($errors->has($name) ? ' border-red-500' : ' border-gray-300')]) !!}
    />
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>