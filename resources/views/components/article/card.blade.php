<article {{ $attributes->class($classList['container']) }}>
    <a @class(['block shrink-0', $classList['thumbnail-link']]) href="{{ route('article.detail', ['article' => $article]) }}">
        <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}" @class([$classList['thumbnail'], $classList['thumbnail-normal'] => !$featured, $classList['thumbnail-featured'] => $featured])>
    </a>
    <div class="{{ $classList['content'] }}">
        <h3 @class([
            'font-bold sm:hover:underline',
            $classList['title'],
            $classList['title-featured'] => $featured,
            $classList['title-normal'] => !$featured,
        ])>
            <a href="{{ route('article.detail', ['article' => $article]) }}">{{ $article->title }}</a>
        </h3>
        <div class="{{ $classList['meta'] }}">
            <a href="{{ route('category.detail', ['category' => $article->category] )}}" @class([
                'truncate hover:underline',
                $classList['category'],
            ])>{{ $article->category->name }}</a>
            <span>|</span>
            <time class="truncate">{{ formatDate($article->published_at) }}</time>
        </div>
        @if (($type === 'highlight' && $featured) || $type === 'category-detail')
            <p @class([
                'hidden sm:block sm:text-neutral-700',
                $classList['summary']
            ])>{{ $article->summary }}</p>
        @endif
    </div>
</article>