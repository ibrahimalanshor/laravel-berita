@extends('layouts.home')

@section('content')
<div>
    <aside>
        <a href="">Profil</a>
        <a href="">Artikel Baca Nanti</a>
        <a href="">Artikel Favorit</a>
        <a href="">Langganan</a>
        <a href="">Keluar</a>
    </aside>

    <section>
        <h1>Profil</h1>

        <div>
            <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}">
            <div>
                <p>{{ $user->name }}</p>
                <p>{{ $user->email }}</p>
                <p>Bergabung pada {{ $user->created_at }}</p>
            </div>
        </div>
    </section>
</div>
@endsection