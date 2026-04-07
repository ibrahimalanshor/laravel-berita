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
    </article>
</x-base.container>

@endsection