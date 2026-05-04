@extends('layouts.home')

@section('content')

<x-base.container :paddless="true" class="py-4 space-y-4 sm:px-4">
    <nav class="px-4 flex items-center gap-2 text-neutral-700 text-sm sm:border-b sm:pb-2 sm:border-neutral-200 sm:px-0">
        <a class="hover:underline" href="{{ route('home') }}">Beranda</a>
        <span class="icon-[tabler--chevron-right] text-neutral-400"></span>
        <a class="hover:underline" href="{{ route('category.detail', ['category' => $article->category->slug]) }}">{{ $article->category->name }}</a>
    </nav>

    <div class="grid grid-cols-1 divide-y divide-neutral-200 gap-6 sm:grid-cols-5 sm:divide-y-0 lg:grid-cols-6">
        <div class="sm:col-span-3 lg:col-span-4 space-y-6 pb-6 sm:pb-0">
            <article class="px-4 space-y-4 sm:px-0">
                <header class="space-y-2">
                    <h1 class="font-bold text-neutral-900 text-3xl/8 sm:text-4xl">{{ $article->title }}</h1>
                    <p class="text-lg/6 text-neutral-700">{{ $article->summary }}</p>

                    <div class="text-sm flex items-center justify-between">
                        <div>
                            <a href="{{ route('author.detail', ['author' => $article->author->slug])}}" class="text-red-700 font-medium hover:underline">{{ $article->author->name }}</a>
                            <p class="text-xs text-neutral-700 sm:text-sm">Terbit {{ formatDate($article->published_at) }}</p>
                        </div>

                        <div class="flex items-center gap-2 sm:flex-col sm:items-end">
                            @auth
                                <x-article.action :article="$article" />
                            @endauth
                            <x-article.share :article="$article" />
                        </div>
                    </div>
                </header>

                <figure>
                    <img src="{{ $article->thumbnails['16x9'][800] }}" alt="{{ $article->title }}" class="w-full object-cover">

                    <figcaption class="text-xs text-neutral-700 mt-1">{{ $article->thumbnail_caption }}</figcaption>
                </figure>

                <div @class([
                    'prose prose-neutral prose-a:text-red-700 max-w-none',
                    'line-clamp-[10] relative' => $article->premium && (!$subscription || $subscription->expired)
                ])>
                    {!! $article->content !!}

                    @if ($article->premium && (!$subscription || $subscription->expired))
                        <div class="absolute inset-0 bg-linear-to-b from-white-0 to-white pointer-events-none"></div>
                    @endif
                </div>

                @if ($article->premium && (!$subscription || $subscription->expired))
                    <section class="space-y-4">
                        <div class="space-y-1">
                            <h2 class="font-bold text-xl text-center flex items-center justify-center gap-2 text-neutral-900">
                                <span class="icon-[tabler--lock-filled] text-amber-600 size-5"></span>
                                Konten Premium
                            </h2>
                            <p class="text-neutral-500 text-center">Berlangganan premium untuk membaca berita dan artikel premium.</p>
                        </div>

                        <form class="border border-neutral-300 rounded-md divide-y divide-neutral-300" method="POST" action="{{ route('subscribe.checkout') }}">
                            @csrf
                            @foreach ($packages as $package)
                                <div class="p-4 flex items-center justify-between">
                                    <div>
                                        <h3 class="font-bold text-neutral-900">{{ $package['name'] }}</h3>
                                        <p class="text-red-700 font-bold text-xl">
                                            {{ number_format($package['price']) }}
                                            <span class="text-base text-neutral-700 font-normal">/ {{ $package['period_name'] }}</span>
                                        </p>
                                    </div>
                                    <x-base.button name="period" type="submit" value="{{ $package['period'] }}" :color="$package['featured'] ? 'primary' : 'bordered'" size="custom" class="h-9 px-3 rounded-md text-sm lg:h-10 lg:px-4 lg:text-base">
                                        {{ auth()->check() ? ($subscription ? 'Perpanjang' : 'Upgrade') : 'Berlangganan' }}
                                    </x-base.button>
                                </div>
                            @endforeach
                            </form>
                    </section>
                @endif
            </article>

            <hr class="border-neutral-200">

            @if (!$article->premium || ($subscription && !$subscription->expired))
                <x-article.comment class="px-4 sm:px-0" :article="$article" />

                <hr class="border-neutral-200">
            @endif

            <section class="px-4 space-y-2 lg:border-b-0 sm:px-0">
                <h2 class="font-bold text-neutral-900 text-lg">Topik Terkait</h2>

                <ul class="flex flex-wrap gap-2">
                    @foreach ($article->tags as $tag)
                        <li>
                            <x-tag.link :tag="$tag" />
                        </li>
                    @endforeach
                </ul>
            </section>

            <hr class="border-neutral-200 sm:hidden">

            <section class="px-4 space-y-4 lg:border-b-0 sm:px-0">
                <x-article.section-title>{{ $article->category->name }}</x-article.section-title>

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-6">
                    @foreach ($categoryArticles as $article)
                        <x-article.card :article="$article" type="article-category" />
                    @endforeach
                </div>
            </section>

            <hr class="border-neutral-200 sm:hidden">

            <section class="px-4 space-y-4 sm:px-0 md:pb-0">
                <x-article.section-title>Artikel Terkait</x-article.section-title>

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:gap-6">
                    @foreach ($relatedArticles as $article)
                        <x-article.card :article="$article" type="related-article" />
                    @endforeach
                </div>
            </section>
        </div>

        <x-article.sidebar class="sm:col-span-2 space-y-6" :bordered-top="false" />
    </div>
</x-base.container>
@endsection

@push('scripts')
<script>
window.onload = function () {
    function createSlider(el) {
        return new Splide(el, {
            mediaQuery: 'min',
            breakpoints: {
                640: {
                    destroy: 'completely'
                }
            },
            pagination: false,
            arrows: false,
            padding: '2rem',
            gap: '1rem',
            type: 'loop'
        });
    }

    createSlider('#main-article').mount();
    createSlider('#editor-article').mount();
}
</script>
@endpush