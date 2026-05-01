@extends('layouts.profile')

@section('profile-content')
<section class="border border-neutral-300 rounded-md p-4 space-y-4">
    <h1 class="font-bold text-neutral-900 text-lg">Notifikasi ({{ $notifications->total() }})</h1>

    <div>
        @php
            $icons = [
                'App\Notifications\CommentReacted' => 'icon-[tabler--thumb-up]',
                'App\Notifications\CommentReplied' => 'icon-[tabler--bubble-text]',
                'App\Notifications\SubscriptionExpired' => 'icon-[tabler--credit-card]'
            ];
            $messages = [
                'App\Notifications\CommentReacted' => ':user_name :reaction komentar anda.',
                'App\Notifications\CommentReplied' => ':user_name membalas komentar anda :content.',
                'App\Notifications\SubscriptionExpired' => 'Langganan :period akan habis pada :date'
            ];
        @endphp
        @foreach ($notifications as $notification)
            @php
                if ($notification->type === 'App\Notifications\CommentReacted') {
                    $message = "{$notification->data['user_name']} bereaksi {$notification->data['reaction']} pada komentar anda";
                } else if ($notification->type === 'App\Notifications\CommentReplied') {
                    $message = "{$notification->data['user_name']} membalas komentar anda \"{$notification->data['content']}\"";
                } else {
                    $message = "Langganan {$notification->data['period']} akan habis pada {$notification->data['end_at']}";
                }
            @endphp

            <div>
                <div>
                    <span class="{{ $icons[$notification->type] }}"></span>
                </div>

                <div>
                    <p>{{ $message }}</p>
                    <p>{{ formatDate($notification->created_at, 'd M Y H:m') }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection