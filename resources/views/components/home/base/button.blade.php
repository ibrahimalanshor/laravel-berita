<{{ $tagName }} {{ $attributes->class("gap-2 font-medium disabled:opacity-50 disabled:cursor-not-allowed $classList") }}>
    @if ($icon && $iconPos === 'left')
        <span class="{{ $icon }}"></span>
    @endif
    {{ $slot }}
    @if ($icon && $iconPos === 'right')
        <span class="{{ $icon }}"></span>
    @endif
</{{ $tagName }}>