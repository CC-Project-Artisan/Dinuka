<button style="color: #a55e3f;
    border: 1px solid black; 
    border-radius: 50px;
    border-color: #a55e3f;" {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs text-customBrown uppercase tracking-widest transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
