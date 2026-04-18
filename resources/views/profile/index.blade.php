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

<form action="{{ route('profile.update' )}}" enctype="multipart/form-data" class="border border-neutral-300 rounded-md p-4 space-y-4" method="POST">
    @csrf
    <h1 class="font-bold text-neutral-900 text-lg">Edit Profil</h1>
    
    <div class="flex flex-col space-y-1">
        <label for="">Nama</label>
        <x-base.input
            placeholder="Andi"
            :color="$errors->has('name') ? 'error' : 'light'"
            type="text"
            name="name"
            value="{{ old('name', $user->name) }}"
            required
            :message="$errors->has('name') ? $errors->first('name') : ''"
        />
    </div>
    
    <div class="flex flex-col space-y-1">
        <label for="">Avatar</label>
        <x-base.input
            type="file"
            name="avatar"
            :color="$errors->has('avatar') ? 'error' : 'light'"
            :message="$errors->has('avatar') ? $errors->first('avatar') : 'Kosongkan jika tidak diganti'"
        />
    </div>
    
    <div class="flex flex-col space-y-1">
        <label for="">Password</label>
        <x-base.input
            placeholder="12345678"
            type="password"
            name="password"
            :color="$errors->has('password') ? 'error' : 'light'"
            :message="$errors->has('password') ? $errors->first('password') : 'Kosongkan jika tidak diganti'"
        />
    </div>
    
    <div class="flex flex-col space-y-1">
        <label for="">Konfirmasi Password</label>
        <x-base.input
            placeholder="12345678"
            type="password"
            name="password_confirmation"
            :color="$errors->has('password_confirmation') ? 'error' : 'light'"
            :message="$errors->has('password_confirmation') ? $errors->first('password_confirmation') : 'Kosongkan jika tidak diganti'"
        />
    </div>

    <x-base.button color="primary">Simpan</x-base.button>
</form>
@endsection