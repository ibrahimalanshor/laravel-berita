@extends('layouts.home')

@section('content')
    <x-base.container :paddless="true" class="sm:px-4">
        <section id="highlight-article" class="splide py-4" aria-label="Rekomendasi Artikel">
            <h2 class="sr-only">Rekomendasi Artikel</h2>
            <div class="splide__track">
                <ul class="splide__list splide__list__grid sm:grid-cols-4 sm:grid-rows-2 sm:gap-6">
                    @foreach ($highlights as $article)
                        <x-article.card type="highlight" :article="$article" :slide-on-mobile="true" @class(['splide__slide', 'col-span-1 row-span-1 sm:col-span-2 sm:row-span-2' => $article['featured']]) />
                    @endforeach
                </ul>
            </div>
        </section>
    </x-base.container>

    <div class="flex flex-col">
        <x-article.section class="lg:order-last">
            <x-base.container class="space-y-2 lg:space-y-4">
                <x-article.section-title>Berita Terbaru</x-article.section-title>

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-6">
                    @foreach ($flash as $article)
                        <x-article.card type="flash" :article="$article" />
                    @endforeach
                </div>
            </x-base.container>
        </x-article.section>

        <x-article.section>
            <x-base.container :paddless="true">
                <div id="editor-pick-article" class="splide space-y-4">
                    <div class="px-4">
                        <x-article.section-title>Pilihan Editor</x-article.section-title>
                    </div>
                    <div class="splide__track px-4 ">
                        <ul class="splide__list splide__list__grid sm:grid-cols-5 sm:gap-4">
                            @foreach ($editors as $article)
                                <x-article.card :article="$article" type="editor" @class(['splide__slide']) />
                            @endforeach
                        </ul>
                    </div>
                </div>
            </x-base.container>
        </x-article.section>
    </div>
    <livewire:article.top-category category="Otomotif" />
    <livewire:article.top-category category="Pendidikan" />
    <livewire:article.top-category category="Teknologi" />
@endsection

@push('scripts')
<script>
window.onload = function () {
    new Splide('#highlight-article', {
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
    }).mount();

    new Splide('#editor-pick-article', {
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
    }).mount();
}
</script>
@endpush