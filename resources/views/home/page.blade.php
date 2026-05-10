@extends('home.layouts.home')

@section('content')
<x-home.base.container class="py-6 sm:py-8 lg:py-10">
    <article class="space-y-6 max-w-prose mx-auto">
        <h1 class="text-3xl font-bold text-neutral-900">{{ $page->title }}</h1>
        <hr class="border-neutral-200">
        <div class="prose prose-neutral prose-a:text-red-700 max-w-none mx-auto">{!! $page->content !!}</div>
    </article>
</x-base.container>
@endsection