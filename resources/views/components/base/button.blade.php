<button {{ $attributes->class("gap-2 font-medium $classList") }}>
    @if ($icon)
        <span class="{{ $icon }} size-4"></span>
    @endif
    {{ $slot }}
</button>