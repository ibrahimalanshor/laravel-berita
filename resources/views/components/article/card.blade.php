<article {{ $attributes->class($classList['container']) }}>
    <img src="{{ $article['thumbnail'] }}" alt="{{ $article['title'] }}" class="{{ $classList['thumbnail'] }}">
    <div class="{{ $classList['content'] }}">
        <h3 @class([
            'font-bold',
            $classList['title'],
            $classList['title-featured'] => $article['featured'],
            $classList['title-normal'] => !$article['featured'],
        ])>{{ $article['title'] }}</h3>
        <div class="{{ $classList['meta'] }}">
            <a href="" @class([
                'truncate',
                $classList['category'],
            ])>{{ $article['category'] }}</a>
            <span>|</span>
            <time class="truncate">{{ $article['date'] }}</time>
        </div>
        @if ($type === 'highlight' && $article['featured'])
            <p class="hidden sm:block sm:text-neutral-700">{{ $article['summary'] }}</p>
        @endif
    </div>
</article>