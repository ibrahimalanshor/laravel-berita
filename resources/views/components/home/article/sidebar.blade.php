<aside {{ $attributes }}>
    <section id="main-article" class="splide space-y-4" aria-label="Rekomendasi Artikel">
        <div class="px-4 sm:p-0">
            <x-home.article.section-title :bordered-top="$borderedTop">Berita Utama</x-article.section-title>
        </div>
        <div class="splide__track">
            <div class="splide__list splide__list__grid sm:gap-6">
                @foreach ($highlightArticles as $article)
                    <x-home.article.card type="highlight-sidebar" :featured="$loop->first" :article="$article" :slide-on-mobile="true" @class(['splide__slide']) />
                @endforeach
            </div>
        </div>
    </section>

    <hr class="border-neutral-200 sm:hidden">

    <section id="editor-article" class="splide space-y-4" aria-label="Rekomendasi Artikel">
        <div class="px-4 sm:p-0">
            <x-home.article.section-title :bordered-top="$borderedTop" :read-more-url="route('featured')">Pilihan Editor</x-article.section-title>
        </div>
        <div class="splide__track">
            <div class="splide__list splide__list__grid sm:gap-6">
                @foreach ($editorArticles as $article)
                    <x-home.article.card type="editor-sidebar" :featured="$loop->first" :article="$article" :slide-on-mobile="true" @class(['splide__slide']) />
                @endforeach
            </div>
        </div>
    </section>
</aside>