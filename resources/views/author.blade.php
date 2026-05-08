@extends('layouts.home')

@section('content')
<article class="py-6 space-y-4 max-w-prose mx-auto px-4 sm:py-8 lg:py-10">
    <div class="flex items-center gap-6">
        <img src="{{ $author->image_url ?? asset('avatar.svg') }}" alt="{{ $author->name }}" class="w-20 h-20 object-cover rounded-full shrink-0" />
        <div class="space-y-2">
            <h1 class="font-bold text-neutral-900 text-3xl">{{ $author->name }}</h1>
            <div class="flex gap-2">
                <a target="_blank" href="{{ $author->instagram_url }}" aria-label="Instagram">
                    <span class="icon-[tabler--brand-instagram-filled] size-5 text-indigo-600"></span>
                </a>
                <a target="_blank" href="{{ $author->facebook_url }}" aria-label="Facebook">
                    <span class="icon-[tabler--brand-facebook-filled] size-5 text-blue-600"></span>
                </a>
                <a target="_blank" href="{{ $author->twitter_url }}" aria-label="Twitter">
                    <span class="icon-[tabler--brand-twitter-filled] size-5 text-sky-600"></span>
                </a>
                <a target="_blank" href="{{ $author->tiktok_url }}" aria-label="Tikton">
                    <span class="icon-[tabler--brand-tiktok-filled] size-5 text-neutral-900"></span>
                </a>
                <a target="_blank" href="{{ $author->youtube_url }}" aria-label="Youtube">
                    <span class="icon-[tabler--brand-youtube-filled] size-5 text-red-600"></span>
                </a>
                <a target="_blank" href="{{ $author->email }}" aria-label="Email">
                    <span class="icon-[tabler--mail-filled] size-5 text-neutral-600"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="prose prose-neutral prose-a:text-red-700 max-w-none mx-auto">{!! $author->about !!}</div>
    
</article>

<x-base.container :paddless="true" class="border-t border-neutral-200 pt-4 grid grid-cols-1 gap-6 sm:grid-cols-5 sm:px-4 lg:border-0 lg:pt-0">
    <section class="space-y-4 px-4 lg:border-b-0 sm:col-span-3 sm:px-0">
        <x-article.section-title>Tulisan Terbaru</x-article.section-title>

        <div class="grid grid-cols-1 gap-4 lg:gap-6">
            @foreach ($articles as $article)
                <x-article.card :article="$article" type="category-detail" />
            @endforeach
        </div>

        {{ $articles->links('article.pagination') }}
    </section>
    <x-article.sidebar class="sm:col-span-2 space-y-6 border-t border-neutral-200 pt-6 sm:border-0 sm:pt-0" />
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