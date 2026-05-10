@extends('home.layouts.profile')

@section('profile-content')
<section class="border border-neutral-300 rounded-md p-4 space-y-4">
    <h1 class="font-bold text-neutral-900 text-lg">Artikel Favorit ({{ $favouriteCount }})</h1>

    @if ($favouriteCount === 0)
        <p class="text-neutral-500">Belum ada artikel favorit. Tandai artikel yang kamu suka dengan ikon hati untuk melihatnya di sini.</p>
    @else
        <div class="space-y-4">
            @foreach ($favourites as $favourite)
                <x-home.article.card type="favorite" :article="$favourite" />
            @endforeach
        </div>
    @endif

    {{ $favourites->links('home.article.pagination') }}
</section>
@endsection