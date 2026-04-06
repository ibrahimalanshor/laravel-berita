@extends('layouts.home')

@section('content')
    <x-base.container :paddless="true" class="sm:px-4">
        <section id="highlight-article" class="splide py-4" aria-label="Rekomendasi Artikel">
            <h2 class="sr-only">Rekomendasi Artikel</h2>
            <div class="splide__track">
                <ul class="splide__list splide__list__grid sm:grid-cols-4 sm:grid-rows-2 sm:gap-6">
                    @foreach ($highlights as $article)
                        <x-article.card type="highlight" :featured="$loop->first" :article="$article" :slide-on-mobile="true" @class(['splide__slide', 'col-span-1 row-span-1 sm:col-span-2 sm:row-span-2' => $loop->first]) />
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
                        <x-article.card type="flash" :article="(object) $article" />
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
                    <div class="splide__track px-4">
                        <ul class="splide__list splide__list__grid sm:grid-cols-5 sm:gap-4">
                            @foreach ($editors as $article)
                                <x-article.card :article="(object) $article" type="editor" @class(['splide__slide']) />
                            @endforeach
                        </ul>
                    </div>
                </div>
            </x-base.container>
        </x-article.section>
    </div>

    {{-- <div class="flex flex-col">
        <x-article.section class="lg:order-last">
            <x-base.container class="space-y-2 lg:space-y-4">
                <x-article.section-title>Berita Terbaru</x-article.section-title>

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-6">
                    @foreach ($flash as $article)
                        <x-article.card type="flash" :article="(object) $article" />
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
                    <div class="splide__track px-4">
                        <ul class="splide__list splide__list__grid sm:grid-cols-5 sm:gap-4">
                            @foreach ($editors as $article)
                                <x-article.card :article="(object) $article" type="editor" @class(['splide__slide']) />
                            @endforeach
                        </ul>
                    </div>
                </div>
            </x-base.container>
        </x-article.section>
    </div>

    <x-article.section>
        <x-base.container :paddless="true">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-5 sm:px-4">
                <div class="px-4 sm:col-span-full sm:px-0">
                    <x-article.section-title>Otomotif</x-article.section-title>
                </div>
                <div class="px-4 sm:px-0">
                    <x-article.card :article="$otomotif[0]" type="editor" />
                </div>
                <div id="otomotif-article" class="splide sm:col-span-4">
                    <div class="splide__track px-4 sm:px-0">
                        <ul class="splide__list splide__list__grid sm:grid-cols-4 sm:gap-4">
                            @foreach ($otomotif->skip(1) as $article)
                                <x-article.card :article="(object) $article" type="category" @class(['splide__slide']) />
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </x-base.container>
    </x-article.section>

    <x-article.section>
        <x-base.container :paddless="true">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-5 sm:px-4">
                <div class="px-4 sm:col-span-full sm:px-0">
                    <x-article.section-title>Pendidikan</x-article.section-title>
                </div>
                <div class="px-4 sm:px-0">
                    <x-article.card :article="$pendidikan[0]" type="editor" />
                </div>
                <div id="pendidikan-article" class="splide sm:col-span-4">
                    <div class="splide__track px-4 sm:px-0">
                        <ul class="splide__list splide__list__grid sm:grid-cols-4 sm:gap-4">
                            @foreach ($pendidikan->skip(1) as $article)
                                <x-article.card :article="(object) $article" type="category" @class(['splide__slide']) />
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </x-base.container>
    </x-article.section>

    <x-article.section>
        <x-base.container :paddless="true">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-5 sm:px-4">
                <div class="px-4 sm:col-span-full sm:px-0">
                    <x-article.section-title>Teknologi</x-article.section-title>
                </div>
                <div class="px-4 sm:px-0">
                    <x-article.card :article="$teknologi[0]" type="editor" />
                </div>
                <div id="teknologi-article" class="splide sm:col-span-4">
                    <div class="splide__track px-4 sm:px-0">
                        <ul class="splide__list splide__list__grid sm:grid-cols-4 sm:gap-4">
                            @foreach ($teknologi->skip(1) as $article)
                                <x-article.card :article="(object) $article" type="category" @class(['splide__slide']) />
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </x-base.container>
    </x-article.section> --}}
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
    // createSlider('#otomotif-article').mount();
    // createSlider('#pendidikan-article').mount();
    // createSlider('#teknologi-article').mount();
}
</script>
@endpush