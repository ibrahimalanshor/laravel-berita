@extends('layouts.home')

@section('content')

<div class="py-4">
    <x-base.container>
        <nav class="pb-2 flex items-center gap-2 text-neutral-700 text-sm sm:border-b sm:border-neutral-300">
            <a class="hover:underline" href="{{ route('home') }}">Beranda</a>
            <span class="icon-[tabler--chevron-right]"></span>
            <a class="hover:underline" href="{{ route('category.detail', ['slug' => $article->category->slug]) }}">{{ $article->category->name }}</a>
        </nav>
    </x-base.container>
</div>

@endsection