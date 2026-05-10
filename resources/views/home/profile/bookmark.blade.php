@extends('home.layouts.profile')

@section('profile-content')
<section class="border border-neutral-300 rounded-md p-4 space-y-4">
    <h1 class="font-bold text-neutral-900 text-lg">Baca Nanti ({{ $bookmarksCount }})</h1>

    @if ($bookmarksCount === 0)
        <p class="text-neutral-500">Belum ada artikel yang disimpan untuk dibaca nanti.</p>
    @else
        <div class="space-y-4">
            @foreach ($bookmarks as $bookmark)
                <x-home.article.card type="bookmark" :article="$bookmark" />
            @endforeach
        </div>
    @endif

    {{ $bookmarks->links('home.article.pagination') }}
</section>
@endsection