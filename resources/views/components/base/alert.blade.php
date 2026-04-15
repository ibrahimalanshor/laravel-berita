<div @class([
    'border rounded-md flex items-start gap-3 px-3 py-2 min-h-10',
    $classList
])>
    <span class="icon {{ $icon }} text-{{ $color }}-500 mt-1 shrink-0"></span>
    {{ $slot}}
</div>