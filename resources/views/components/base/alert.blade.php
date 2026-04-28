<div {{ $attributes->class("border rounded-md flex items-start gap-2 $classList") }}>
    @if ($icon)
        <span class="icon {{ $icon }} text-{{ $color }}-500 mt-1 shrink-0"></span>
    @endif
    {{ $slot}}
</div>