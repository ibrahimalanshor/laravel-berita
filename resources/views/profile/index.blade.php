@extends('layouts.profile')

@section('profile-content')
<section class="border border-neutral-300 rounded-md p-4 space-y-4">
    <h1 class="font-bold text-neutral-900 text-lg">Profil</h1>
    <div class="flex items-center gap-3">
        <img src="{{ $user->avatar_url ?? asset('avatar.svg') }}" alt="{{ $user->name }}" class="size-12 rounded-full shrink-0">
        <div>
            <p class="font-medium text-neutral-900">{{ $user->name }}</p>
            <p class="text-neutral-700">{{ $user->email }}</p>
        </div>
    </div>
    <p class="text-sm text-neutral-500">Bergabung pada {{ formatDate($user->created_at, 'd F Y') }}</p>
</section>
@endsection