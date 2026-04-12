@extends('layouts.home')

@section('content')
<x-base.container>
    <article>
        <img src="{{ $author->image_url }}" />
        <h1>{{ $author->name }}</h1>
        <div class="prose prose-neutral prose-a:text-sky-600 max-w-none mx-auto">{!! $author->about !!}</div>
        <div>
            <a target="_blank" href="" class="">
                <span class="icon-[tabler--brand-whatsapp-filled]"></span>
                <span class="">Whatsapp</span>
            </a>
            <a target="_blank" href="" class="">
                <span class="icon-[tabler--brand-facebook-filled]"></span>
                <span class="">Facebook</span>
            </a>
            <a target="_blank" href="" class="">
                <span class="icon-[tabler--brand-twitter-filled]"></span>
                <span class="">Twitter</span>
            </a>
            <a target="_blank" href="" class="">
                <span class="icon-[tabler--brand-tiktok-filled]"></span>
                <span class="">Tiktok</span>
            </a>
            <a target="_blank" href="" class="">
                <span class="icon-[tabler--brand-youtube-filled]"></span>
                <span class="">Youtube</span>
            </a>
            <a target="_blank" href="" class="">
                <span class="icon-[tabler--mail-filled]"></span>
                <span class="">Email</span>
            </a>
        </div>
    </article>
</x-base.container>

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