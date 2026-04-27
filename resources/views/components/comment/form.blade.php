<form action="{{ route('article.comment', ['article' => $article]) }}" method="POST" id="{{ $type === 'create' ? 'komentar_baru' : 'reply-' . $reply->id }}" class="{{ $type === 'reply' ? 'hidden px-3 py-2.5 space-y-3' : 'p-4 space-y-3' }} border border-neutral-300 rounded-md has-focus:border-red-700 has-focus:border-2 divide-y divide-neutral-200 mb-4">
    @csrf
    @if ($type === 'reply')
        <input type="hidden" name="reply_id" value="{{ $reply->id }}">
        <input type="hidden" name="mention_id" value="{{ $reply->id }}">
    @endif
    <div class="flex items-start gap-3 pb-3 relative">
        @if ($type === 'create')
            <img src="{{ $user->avatar_url ?? asset('avatar.svg') }}" alt="{{ $user->name }}" class="size-8 rounded-full">
        @else
            <span class="absolute left-0 truncate z-10 text-red-700 mention"></span>
        @endif
        <textarea name="content" placeholder="Tulis Komentar..." maxlength="1000" rows="{{ $type == 'reply' ? '2' : '3' }}" class="p-0 align-middle w-full placeholder-neutral-500 text-neutral-700 border-0 focus:ring-0" required></textarea>
    </div>
    <div class="flex items-center gap-2 {{ $type === 'create' ? 'justify-between' : 'justify-end' }}">
        @if ($type === 'create')
            <p class="text-sm text-neutral-500 word_left">1000 karakter tersisa</p>
        @else
            <x-base.button type="button" color="bordered" size="sm" data-cancel-reply="{{ $reply->id }}">Batal</x-base.button>
        @endif

        <x-base.button color="primary" size="sm" icon="icon-[tabler--send-2]" icon-pos="right">Kirim</x-base.button>
    </div>
</form>