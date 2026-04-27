<article class="flex items-start gap-3 relative">
    <div class="absolute top-0 right-0">
        <button class="text-neutral-500 ml-auto">
            <span class="icon-[tabler--dots] size-5"></span>
        </button>
    </div>
    <img src="{{ $comment->avatar_url }}" alt="{{ $comment->name }}" class="size-8 rounded-full mt-1">
    <div class="grow space-y-2">
        <div>
            <div>
                <p class="font-bold text-neutral-900">{{ $comment->name }}</p>
                <p class="text-neutral-700">
                    @if ($comment->reply_name)
                        <span class="text-red-700">{{ '@' . $comment->reply_name }}</span>
                    @endif
                    {{ $comment->content }}
                </p>
            </div>
            <div class="flex gap-4">
                <span class="text-sm text-neutral-500">{{ formatDate($comment->created_at) }}</span>
                <div class="flex items-center gap-1 text-sm {{ $reactions->has($comment->id) && $reactions[$comment->id] === 'like' ? 'text-red-700' : 'text-neutral-500' }}">
                    <button class="flex items-center cursor-pointer" wire:click="react({{ $comment->id }}, 'like')">
                        <span class="{{ $reactions->has($comment->id) && $reactions[$comment->id] === 'like' ? 'icon-[tabler--thumb-up-filled]' : 'icon-[tabler--thumb-up]' }} size-4"></span>
                    </button>
                    {{ $comment->likes }}
                </div>
                <div class="flex items-center gap-1 text-sm {{ $reactions->has($comment->id) && $reactions[$comment->id] === 'dislike' ? 'text-red-700' : 'text-neutral-500' }}">
                    <button class="flex items-center cursor-pointer" wire:click="react({{ $comment->id }}, 'dislike')">
                        <span class="{{ $reactions->has($comment->id) && $reactions[$comment->id] === 'dislike' ? 'icon-[tabler--thumb-down-filled]' : 'icon-[tabler--thumb-down]' }} size-4"></span>
                    </button>
                    {{ $comment->dislikes }}
                </div>
                <button class="cursor-pointer text-sm text-red-700" data-reply-comment="{{ $comment->reply_id ?? $comment->id }}" data-mention="{{ $comment->name }}" data-mention-id="{{ $comment->id }}">Balas</button>
            </div>
        </div>

        @if ($comment->replies->count())
            @foreach ($comment->replies as $reply)
                <x-comment.single :comment="$reply" :reactions="$reactions" />
            @endforeach
        @endif

        @if (!$comment->reply_id)
            <x-comment.form type="reply" :reply="$comment" />
        @endif
    </div>
</article>