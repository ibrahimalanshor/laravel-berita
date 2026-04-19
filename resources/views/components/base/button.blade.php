<{{ $tagName }} {{ $attributes->class("gap-2 font-medium $classList") }}>
    @if ($icon)
        <span class="{{ $icon }}"></span>
    @endif
    {{ $slot }}
</{{ $tagName }}>