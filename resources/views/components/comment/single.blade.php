<article class="flex items-start gap-3 relative">
    <div class="absolute top-0 right-0">
        <button class="text-neutral-500 ml-auto open-report-{{ $comment->id }} cursor-pointer" data-toggle="dropdown" data-target="#report-{{ $comment->id }}">
            <span class="icon-[tabler--dots] size-5"></span>
        </button>

        <form id="report-{{ $comment->id }}" method="POST" action="{{ route('comment.report', ['comment' => $comment->id]) }}" class="hidden shadow-md absolute top-6 right-0 bg-white border border-neutral-200 rounded-md p-4 space-y-2 z-10" data-click-outside-close="dropdown" data-ignore=".open-report-{{ $comment->id }}">
            @csrf
            <p class="font-bold text-neutral-900">Laporkan Komentar</p>
            <div class="flex flex-col gap-2">
                <label class="whitespace-nowrap flex items-center gap-2 text-neutral-700">
                    <input type="radio" name="report_type" value="spam" class="border-neutral-400 checked:border-red-700 focus:outline-red-700 checked:bg-red-700">
                    Spam
                </label>
                <label class="whitespace-nowrap flex items-center gap-2 text-neutral-700">
                    <input type="radio" name="report_type" value="hate_speech" class="border-neutral-400 checked:border-red-700 focus:outline-red-700 checked:bg-red-700">
                    Ujaran Kebencian
                </label>
                <label class="whitespace-nowrap flex items-center gap-2 text-neutral-700">
                    <input type="radio" name="report_type" value="toxic" class="border-neutral-400 checked:border-red-700 focus:outline-red-700 checked:bg-red-700">
                    Kata-Kata Kasar
                </label>
                <label class="whitespace-nowrap flex items-center gap-2 text-neutral-700">
                    <input type="radio" name="report_type" value="hoax" class="border-neutral-400 checked:border-red-700 focus:outline-red-700 checked:bg-red-700">
                    Hoaks / Misinformasi
                </label>
            </div>

            <x-base.button color="primary" size="sm" icon="icon-[tabler--message-report-filled]" class="block w-full">Laporkan</x-base.button>
        </form>
    </div>
    <img src="{{ $comment->avatar_url }}" alt="{{ $comment->name }}" class="size-8 rounded-full mt-1">
    <div class="grow space-y-2">
        <div>
            <div>
                <p class="font-bold text-neutral-900">{{ $comment->name }}</p>
                @if ($comment->reported)
                    <x-base.alert color="light" size="sm" class="italic my-1">
                        <p>Komentar ini telah dihapus oleh moderator karena melanggar pedoman komunitas.</p>
                    </x-base.alert>
                @else
                    <p class="text-neutral-700">
                        @if ($comment->reply_name)
                            <span class="text-red-700">{{ '@' . $comment->reply_name }}</span>
                        @endif
                        {{ $comment->content }}
                    </p>
                @endif
            </div>
            <form method="POST" action="{{ route('comment.react', ['comment' => $comment->id]) }}" class="flex gap-4">
                @csrf
                <span class="text-sm text-neutral-500">{{ formatDate($comment->created_at) }}</span>
                <div class="flex items-center gap-1 text-sm {{ $reactions->has($comment->id) && $reactions[$comment->id] === 'like' ? 'text-red-700' : 'text-neutral-500' }}">
                    <button type="submit" class="flex items-center cursor-pointer" name="reaction" value="like">
                        <span class="{{ $reactions->has($comment->id) && $reactions[$comment->id] === 'like' ? 'icon-[tabler--thumb-up-filled]' : 'icon-[tabler--thumb-up]' }} size-4"></span>
                    </button>
                    {{ $comment->likes }}
                </div>
                <div class="flex items-center gap-1 text-sm {{ $reactions->has($comment->id) && $reactions[$comment->id] === 'dislike' ? 'text-red-700' : 'text-neutral-500' }}">
                    <button type="submit" class="flex items-center cursor-pointer" name="reaction" value="dislike">
                        <span class="{{ $reactions->has($comment->id) && $reactions[$comment->id] === 'dislike' ? 'icon-[tabler--thumb-down-filled]' : 'icon-[tabler--thumb-down]' }} size-4"></span>
                    </button>
                    {{ $comment->dislikes }}
                </div>
                <button type="button" class="cursor-pointer text-sm text-red-700" data-reply-comment="{{ $comment->reply_id ?? $comment->id }}" data-mention="{{ $comment->name }}" data-mention-id="{{ $comment->id }}">Balas @if (!$comment->reply_id) ({{ $comment->replies_count }}) @endif</button>
            </form>
        </div>

        @if ($comment->replies->count())
            <div id="comment-list-{{ $comment->id }}" class="space-y-2">
                @foreach ($comment->replies as $reply)
                    <x-comment.single :comment="$reply" :reactions="$reactions" />
                @endforeach
            </div>

            @if ($comment->replies->count() < $comment->replies_count)
                <button class="text-red-700 font-medium cursor-pointer" data-load-more="#comment-list-{{ $comment->id }}" data-reply-id="{{ $comment->id }}" data-total="{{ $comment->replies_count }}" data-page="1">Lihat Lebih banyak</button>
            @endif
        @endif

        @if (!$comment->reply_id)
            <x-comment.form type="reply" :reply="$comment" />
        @endif
    </div>
</article>