@extends('layouts.home')

@section('content')

<x-base.container class="py-4">
    <nav class="pb-2 flex items-center gap-2 text-neutral-700 text-sm sm:border-b sm:border-neutral-300">
        <a class="hover:underline" href="{{ route('home') }}">Beranda</a>
        <span class="icon-[tabler--chevron-right]"></span>
        <a class="hover:underline" href="{{ route('category.detail', ['slug' => $article->category->slug]) }}">{{ $article->category->name }}</a>
    </nav>

    <article>
        <h1>{{ $article->title }}</h1>
        <p>{{ $article->summary }}</p>

        <div>
            <a href="">Supriyanto</a>
            <p>Terbit {{ formatDate($article->published_at) }}</p>

            <button>
                <span class="icon-[tabler--share-3]"></span>
            </button>
        </div>

        <figure>
            <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}">

            <figcaption>{{ $article->thumbnail_caption }}</figcaption>
        </figure>

        <div>
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

    <aside>
        <section>
            <h2>Berita Utama</h2>
        </section>
        <section>
            <h2>Pilihan Editor</h2>
        </section>
    </aside>
</x-base.container>

@endsection