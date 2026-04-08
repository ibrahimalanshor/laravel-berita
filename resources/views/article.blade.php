@extends('layouts.home')

@section('content')

<x-base.container class="py-4 space-y-2 sm:space-y-6">
    <nav class="pb-2 flex items-center gap-2 text-neutral-700 text-sm sm:border-b sm:border-neutral-300">
        <a class="hover:underline" href="{{ route('home') }}">Beranda</a>
        <span class="icon-[tabler--chevron-right]"></span>
        <a class="hover:underline" href="{{ route('category.detail', ['slug' => $article->category->slug]) }}">{{ $article->category->name }}</a>
    </nav>

    <div class="grid grid-cols-1 sm:grid-cols-5 lg:grid-cols-6">
        <div class="sm:col-span-4">
            <article class="space-y-4">
                <header class="space-y-2">
                    <h1 class="font-bold text-neutral-900 text-3xl/8 sm:text-4xl">{{ $article->title }}</h1>
                    <p class="text-lg/6 text-neutral-700">{{ $article->summary }}</p>

                    <div class="text-sm flex items-center justify-between">
                        <div>
                            <a href="" class="text-sky-600 font-medium">Supriyanto</a>
                            <p class="text-xs text-neutral-700 sm:text-sm">Terbit {{ formatDate($article->published_at) }}</p>
                        </div>

                        <button class="text-neutral-700">
                            <span class="icon-[tabler--share-3]"></span>
                        </button>
                    </div>
                </header>

                <figure>
                    <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}" class="w-full object-cover">

                    <figcaption class="text-xs text-neutral-700 mt-1">{{ $article->thumbnail_caption }}</figcaption>
                </figure>

                <div class="prose prose-neutral prose-a:text-sky-600 max-w-none">
                    {!! $article->content !!}
                </div>
            </article>

            <section>
                <h2>Topik Terkait</h2>

                <ul>
                    <li><a href="">harga minyak</a></li>
                    <li><a href="">donald trump</a></li>
                    <li><a href="">iran</a></li>
                    <li><a href="">selat hormuz</a></li>
                    <li><a href="">guncatan senjata</a></li>
                </ul>
            </section>

            <section>
                <h2>{{ $article->category->name }}</h2>
            </section>

            <section>
                <h2>Artikel Terkait</h2>
            </section>
        </div>

        <aside class="sm:col-span-2">
            <section>
                <h2>Berita Utama</h2>
            </section>
            <section>
                <h2>Pilihan Editor</h2>
            </section>
        </aside>
    </div>
</x-base.container>

@endsection