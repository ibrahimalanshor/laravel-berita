<div @class([
    'section-title flex items-center justify-between lg:border-b lg:pb-2 lg:border-t-neutral-900 lg:border-b-neutral-300',
    'lg:border-t lg:pt-2' => $borderedTop
])>
    <h2 class="font-bold text-neutral-900 text-lg">
        {{ $slot }}
    </h2>

    @if ($readMoreUrl)
        <a href="{{ $readMoreUrl }}" class="text-red-700 font-medium text-sm inline-flex items-center gap-1 hover:underline">
            Lebih Banyak
            <span class="icon-[tabler--arrow-right]"></span>
        </a>
    @endif
</div>