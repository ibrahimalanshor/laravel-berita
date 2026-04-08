@extends('layouts.home')

@section('content')
    <x-base.container :paddless="true" class="sm:px-4">
        <section id="highlight-article" class="splide py-4" aria-label="Rekomendasi Artikel">
            <h2 class="sr-only">Berita Utama</h2>
            <div class="splide__track">
                <div class="splide__list splide__list__grid sm:grid-cols-4 sm:grid-rows-2 sm:gap-6">
                    @foreach ($highlights as $article)
                        <x-article.card type="highlight" :featured="$loop->first" :article="$article" :slide-on-mobile="true" @class(['splide__slide', 'col-span-1 row-span-1 sm:col-span-2 sm:row-span-2' => $loop->first]) />
                    @endforeach
                </div>
            </div>
        </section>
    </x-base.container>

    <div class="flex flex-col">
        <x-article.section class="lg:order-last">
            <x-base.container class="space-y-2 lg:space-y-4">
                <x-article.section-title :read-more-url="route('news')">Berita Terbaru</x-article.section-title>

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
                        <x-article.section-title :read-more-url="route('featured')">Pilihan Editor</x-article.section-title>
                    </div>
                    <div class="splide__track px-4">
                        <div class="splide__list splide__list__grid sm:grid-cols-5 sm:gap-4">
                            @foreach ($editors as $article)
                                <x-article.card :article="$article" type="editor" @class(['splide__slide']) />
                            @endforeach
                        </div>
                    </div>
                </div>
            </x-base.container>
        </x-article.section>
    </div>

    @foreach ($categories as $category)
        <x-article.section>
            <x-base.container :paddless="true">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-5 sm:px-4">
                    <div class="px-4 sm:col-span-full sm:px-0">
                        <x-article.section-title :read-more-url="route('category.detail', ['slug' => $category->slug])">{{ $category->name }}</x-article.section-title>
                    </div>
                    <div class="px-4 sm:px-0">
                        <x-article.card :article="$category->articles->first()" type="editor" />
                    </div>
                    <div id="category-{{ $category->id }}-article" class="splide sm:col-span-4">
                        <div class="splide__track px-4 sm:px-0">
                            <div class="splide__list splide__list__grid sm:grid-cols-4 sm:gap-4">
                                @foreach ($category->articles->skip(1) as $article)
                                    <x-article.card :article="$article" type="category" @class(['splide__slide']) />
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </x-base.container>
        </x-article.section>
    @endforeach
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

    createSlider('#highlight-article').mount();
    createSlider('#editor-pick-article').mount();

    const categories = JSON.parse("{{ $categories->pluck('id') }}")
        .map(cat => `category-${cat}-article`)
        .forEach(cat => createSlider(`#${cat}`).mount())
}
</script>
@endpush