@props(['type' => 'button', 'color' => 'primary'])

<button type="{{ $type }}" {{ $attributes->merge(['class' => "btn btn-{$color} px-3 py-2", 'style' => 'border-radius: 6px; font-weight: 500;']) }}>
    {{ $slot }}
</button>