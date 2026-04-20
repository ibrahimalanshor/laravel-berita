<{{ $tagName }} {{ $attributes->class("gap-2 font-medium disabled:opacity-50 disabled:cursor-not-allowed $classList") }}>
    @if ($icon)
        <span class="{{ $icon }}"></span>
    @endif
    {{ $slot }}
</{{ $tagName }}>