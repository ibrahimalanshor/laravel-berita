@extends('layouts.profile')

@section('profile-content')
<section class="border border-neutral-300 rounded-md p-4 space-y-4">
    <h1 class="font-bold text-neutral-900 text-lg">Notifikasi ({{ $notifications->total() }})</h1>

    <div class="space-y-4">
        @php
            $icons = [
                'App\Notifications\CommentReacted' => 'icon-[tabler--thumb-up-filled]',
                'App\Notifications\CommentReplied' => 'icon-[tabler--bubble-text-filled]',
                'App\Notifications\SubscriptionExpired' => 'icon-[tabler--credit-card-filled]'
            ];
            $iconColors = [
                'App\Notifications\CommentReacted' => 'bg-blue-100 text-blue-600',
                'App\Notifications\CommentReplied' => 'bg-green-100 text-green-600',
                'App\Notifications\SubscriptionExpired' => 'bg-yellow-100 text-yellow-600'
            ];
        @endphp
        @foreach ($notifications as $notification)
            @php
                if ($notification->type === 'App\Notifications\CommentReacted') {
                    $reaction = $notification->data['reaction'] === 'like' ? 'menyukai' : 'tidak menyukai';
                    $message = "{$notification->data['user_name']} $reaction komentar anda";
                } else if ($notification->type === 'App\Notifications\CommentReplied') {
                    $message = "{$notification->data['user_name']} membalas komentar anda \"{$notification->data['content']}\"";
                } else {
                    $message = "Langganan {$notification->data['period']} akan habis pada {$notification->data['end_at']}";
                }
            @endphp

            <div class="flex items-start gap-4">
                <div class="mt-1 {{ $iconColors[$notification->type] }} size-10 shrink-0 rounded-full flex items-center justify-center">
                    <span class="{{ $icons[$notification->type] }} size-4"></span>
                </div>

                <div>
                    @if ($notification->type === 'App\Notifications\CommentReacted')
                        <a href="{{ $notification->data['article_url'] }}" class="text-neutral-700 hover:underline">
                            <span class="font-medium text-neutral-900">{{ $notification->data['user_name'] }}</span>
                            {{ $notification->data['reaction'] === 'like' ? 'menyukai' : 'tidak menyukai' }} komentar anda.
                        </a>
                    @elseif ($notification->type === 'App\Notifications\CommentReplied')
                        <a href="{{ $notification->data['article_url'] }}" class="text-neutral-700 line-clamp-3 hover:underline">
                            <span class="font-medium text-neutral-900">{{ $notification->data['user_name'] }}</span>
                            <span>membalas komentar anda</span>
                            <span class="text-neutral-500">
                                "{{ $notification->data['content'] }}".
                            </span>
                        </a>
                    @else
                        <a href="{{ route('profile.subscription') }}" class="text-neutral-700 hover:underline">Langganan premium {{ $notification->data['period'] === 'month' ? 'bulanan' : 'tahunan' }} anda akan habis besok. Segera perpanjang.</a>
                    @endif
                    <p class="text-sm text-neutral-500">{{ formatDate($notification->created_at, 'd M Y H:m') }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection