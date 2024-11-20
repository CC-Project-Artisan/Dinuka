@props(['for', 'text', 'class' => ''])

<label for="{{ $for }}" {{ $attributes->merge(['class' => '' . $class]) }}>
    {{ $text }}
</label>