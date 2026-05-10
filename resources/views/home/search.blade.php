@extends('home.layouts.home')

@section('content')
<x-home.base.container>
    <section class="py-6 space-y-4">
        <div class="space-y-1">
            <h1 class="font-bold text-3xl text-neutral-900">Hasil Pencarian</h1>
            <p class="text-neutral-700">Ditemukan {{ $articles->total() }} dari hasil pencarian "{{ $q }}".</p>
        </div>

        <hr class="border-neutral-200">

        <div class="grid grid-cols-1 gap-4">
            @forelse ($articles as $article)
                <x-home.article.card :article="$article" type="search" />
            @empty
                <p class="text-neutral-700">Tidak ada berita dengan kata kunci "{{ $q }}" ditemukan.</p>
            @endforelse
        </div>

        {{ $articles->links('home.article.pagination') }}
    </section>
</x-base.container>
@endsection