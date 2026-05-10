@extends('home.layouts.profile')

@section('profile-content')
<section class="border border-neutral-300 rounded-md">
    <div class="p-4 flex items-center justify-between">
        <h1 class="font-bold text-neutral-900 text-lg">Notifikasi ({{ $notifications->total() }})</h1>

        @if ($notifications->total())
            <form action="{{ route('notification.read-all') }}" method="POST">
                @csrf
                <x-home.base.button size="sm" color="primary" icon="icon-[tabler--check]">Baca semua</x-base.button>
            </form>
        @endif
    </div>

    <div class="divide-y divide-neutral-200 border-t border-neutral-200">
        @php
            $icons = [
                'App\Notifications\CommentReacted' => 'icon-[tabler--thumb-up-filled]',
                'App\Notifications\CommentReplied' => 'icon-[tabler--bubble-text-filled]',
                'App\Notifications\SubscriptionExpired' => 'icon-[tabler--credit-card-filled]',
                'App\Notifications\SubscriptionCreated' => 'icon-[tabler--credit-card-off]'
            ];
            $iconColors = [
                'App\Notifications\CommentReacted' => 'bg-blue-100 text-blue-600',
                'App\Notifications\CommentReplied' => 'bg-green-100 text-green-600',
                'App\Notifications\SubscriptionExpired' => 'bg-yellow-100 text-yellow-600',
                'App\Notifications\SubscriptionCreated' => 'bg-green-100 text-green-600'
            ];
        @endphp
        @forelse ($notifications as $notification)
            @if ($notification->unread())
                <form action="{{ route('notification.read', ['notification' => $notification->id]) }}" method="POST">
                @csrf
            @else
                <div>
            @endif
                <{{ $notification->unread() ? 'button' : 'div' }} class="flex items-start text-left gap-4 {{ $notification->read() ? '' : 'bg-neutral-50 cursor-pointer' }} w-full p-4" type="sbumit">
                    <div class="mt-1 {{ $iconColors[$notification->type] }} size-10 shrink-0 rounded-full flex items-center justify-center">
                        <span class="{{ $icons[$notification->type] }} size-4"></span>
                    </div>

                    <div>
                        @php
                            if ($notification->type === 'App\Notifications\CommentReacted' || $notification->type === 'App\Notifications\CommentReplied') {
                                $link = $notification->data['article_url'];
                            } else {
                                $link = route('profile.subscription');
                            }
                        @endphp
                        @if ($notification->type === 'App\Notifications\CommentReacted')
                            <{{ $notification->read() ? 'a href="' . $link . '"' : 'p' }} class="text-neutral-700">
                                <span class="font-medium text-neutral-900">{{ $notification->data['user_name'] }}</span>
                                {{ $notification->data['reaction'] === 'like' ? 'menyukai' : 'tidak menyukai' }} komentar anda.
                            </{{ $notification->read() ? 'a' : 'p' }}>
                        @elseif ($notification->type === 'App\Notifications\CommentReplied')
                            <{{ $notification->read() ? 'a href="' . $link . '"' : 'p' }} class="text-neutral-700">
                                <span class="font-medium text-neutral-900">{{ $notification->data['user_name'] }}</span>
                                <span>membalas komentar anda</span>
                                <span class="text-neutral-500">
                                    "{{ $notification->data['content'] }}".
                                </span>
                            </{{ $notification->read() ? 'a' : 'p' }}>
                        @elseif ($notification->type === 'App\Notifications\SubscriptionCreated')
                            <{{ $notification->read() ? 'a href="' . $link . '"' : 'p' }} class="text-neutral-700">Langganan premium {{ $notification->data['period'] === 'month' ? 'bulanan' : 'tahunan' }} telah aktif, nikmati manfaatnya.</{{ $notification->read() ? 'a' : 'p' }}>
                        @else
                            <{{ $notification->read() ? 'a href="' . $link . '"' : 'p' }} class="text-neutral-700">Langganan premium {{ $notification->data['period'] === 'month' ? 'bulanan' : 'tahunan' }} anda akan habis besok. Segera perpanjang.</{{ $notification->read() ? 'a' : 'p' }}>
                        @endif
                        <p class="text-sm text-neutral-500">{{ formatDate($notification->created_at, 'd M Y H:m') }}</p>
                    </div>
                </{{ $notification->unread() ? 'button' : 'div' }}>
            @if ($notification->unread())
                </form>
            @else
                </div>
            @endif
        @empty
            <p class="p-4 text-neutral-500">Tidak ada notifikasi.</p>
        @endforelse
    </div>
</section>

{{ $notifications->links('home.article.pagination') }}
@endsection