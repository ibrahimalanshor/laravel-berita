@extends('layouts.profile')

@section('profile-content')
<section class="border border-neutral-300 rounded-md p-4 space-y-4">
    <h1 class="font-bold text-neutral-900 text-lg">Baca Nanti ({{ $bookmarksCount }})</h1>

    <div class="space-y-4">
        @foreach ($bookmarks as $bookmark)
            <x-article.card type="bookmark" :article="$bookmark" />
        @endforeach
    </div>

    {{ $bookmarks->links('article.pagination') }}
</section>
@endsection