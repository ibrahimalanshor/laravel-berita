@extends('layouts.home')

@section('content')
<x-base.container>
    <section>
        <h1>Hasil Pencarian "{{ $q }}"</h1>
        <p>Ditemukan {{ $articles->total() }} hasil pencarian.</p>

        <div>
            @foreach ($articles as $article)
                <x-article.card :article="$article" type="search" />
            @endforeach
        </div>
    </section>
</x-base.container>
@endsection