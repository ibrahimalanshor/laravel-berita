@extends('home.layouts.home')

@section('content')
<x-home.base.container class="mt-6">
    <h1 class="font-bold text-neutral-900 text-3xl">Pilihan Editor</h1>
    <section class="py-4 space-y-4" aria-label="Berita Utama Pilihan Editor">
        <div class="grid gap-4 sm:grid-cols-5">
                @foreach ($articles as $article)
                    <x-home.article.card :article="$article" title-level="2" type="editor" @class(['splide__slide']) />
                @endforeach
            </div>
        </div>
        {{ $articles->links('home.article.pagination') }}
    </section>
</x-base.container>
@endsection