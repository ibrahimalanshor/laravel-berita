@extends('layouts.profile')

@section('profile-content')
<section class="border border-neutral-300 rounded-md p-4 space-y-4">
    <h1 class="font-bold text-neutral-900 text-lg">Status Langganan</h1>

    <div>
        @if (!$user->subscribtion)
            <p class="text-neutral-500">Belum ada langganan. <a href="{{ route('subscribe.index') }}" class="text-red-700 font-medium underline">Tambah Langganan</a>.</p>
        @endif
    </div>
</section>
@endsection