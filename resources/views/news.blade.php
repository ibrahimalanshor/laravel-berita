@extends('layouts.home')

@section('content')
<x-base.container class="mt-6">
    <h1 class="font-bold text-neutral-900 text-3xl">Berita Terbaru</h1>
</x-base.container>
<x-base.container :paddless="true" class="mb-2 sm:px-4 lg:mb-0">
    <section id="latest-article" class="splide py-4" aria-label="Berita Terbaru">
        <div class="splide__track">
            <div class="splide__list splide__list__grid sm:grid-cols-4 sm:grid-rows-2 sm:gap-6">
                @foreach ($latests as $article)
                    <x-article.card type="highlight" :featured="$loop->first" :article="$article" :slide-on-mobile="true" @class(['splide__slide', 'col-span-1 row-span-1 sm:col-span-2 sm:row-span-2' => $loop->first]) />
                @endforeach
            </div>
        </div>
    </section>
</x-base.container>
<x-base.container class="border-t border-neutral-300 pt-2 lg:border-0 lg:py-0 lg:px-4">
    <section class="py-4 space-y-4">
        <div class="grid gap-4 sm:grid-cols-5">
                @foreach ($articles as $article)
                    <x-article.card :article="$article" type="editor" @class(['splide__slide']) />
                @endforeach
            </div>
        </div>
        {{ $articles->links('article.pagination') }}
    </section>
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

    createSlider('#latest-article').mount();
}
</script>
@endpush