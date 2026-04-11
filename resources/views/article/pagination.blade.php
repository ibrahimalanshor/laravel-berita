@if ($paginator->hasPages())
<nav class="flex items-center justify-center border rounded w-fit mx-auto border-neutral-300">
    @if (!$paginator->onFirstPage())
    <a href="{{ $paginator->previousPageUrl() }}" class="w-9 h-9 flex items-center justify-center border-r border-neutral-300">
        <span class="icon-[tabler--chevron-left]"></span>
    </a>
    @endif
    @foreach ($elements as $element)
        @if (is_string($element))
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span @class([
                        'w-9 h-9 flex items-center justify-center bg-sky-600 text-white font-medium',
                        'rounded-l' => $page === 1,
                        'border-r border-neutral-300' => $page !== $paginator->lastPage(),
                        'rounded-r' => $page === $paginator->lastPage()
                    ])>{{ $page }}</span>
                @else
                    <a href="{{ $url }}" @class([
                        'w-9 h-9 flex items-center justify-center',
                        'border-r border-neutral-300'
                    ])>{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" class="w-9 h-9 flex items-center justify-center ">
        <span class="icon-[tabler--chevron-right]"></span>
    </a>
    @endif
</nav>
@endif