<aside {{ $attributes }}>
    <section id="main-article" class="splide space-y-4 -mx-4 sm:mx-0" aria-label="Rekomendasi Artikel">
        <div class="px-4 sm:p-0">
            <x-article.section-title :bordered-top="false">Berita Utama</x-article.section-title>
        </div>
        <div class="splide__track">
            <div class="splide__list splide__list__grid sm:gap-6">
                @foreach ($highlightArticles as $article)
                    <x-article.card type="highlight-sidebar" :featured="$loop->first" :article="$article" :slide-on-mobile="true" @class(['splide__slide']) />
                @endforeach
            </div>
        </div>
    </section>

    <hr class="border-neutral-200 sm:hidden">

    <section id="editor-article" class="splide space-y-4 -mx-4 sm:m-0" aria-label="Rekomendasi Artikel">
        <div class="px-4 sm:p-0">
            <x-article.section-title :bordered-top="false">Pilihan Editor</x-article.section-title>
        </div>
        <div class="splide__track">
            <div class="splide__list splide__list__grid sm:gap-6">
                @foreach ($editorArticles as $article)
                    <x-article.card type="editor-sidebar" :featured="$loop->first" :article="$article" :slide-on-mobile="true" @class(['splide__slide']) />
                @endforeach
            </div>
        </div>
    </section>
</aside>