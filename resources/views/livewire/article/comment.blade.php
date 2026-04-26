<section {{ $attributes->class(!$replyId ? 'space-y-4' : 'space-y-2') }}>
    @if (!$replyId)
        <div class="flex flex-col gap-2 lg:flex-row lg:items-center lg:justify-between">
            <h2 class="font-bold text-neutral-900 text-lg">0 Komentar</h2>
            @guest
                <x-base.button icon="icon-[tabler--brand-google-filled]" tag-name="a" color="bordered" class="w-full sm:w-auto" href="{{ route('auth.google') }}">
                    Masuk untuk berkomentar
                </x-base.button>
            @endguest
        </div>
    @endif

    @auth
        <form id="{{ !$replyId ? 'komentar_baru' : 'reply-' . $replyId }}" class="{{ $replyId ? 'hidden px-3 py-2.5 space-y-3' : 'p-4 space-y-3' }} border border-neutral-300 rounded-md has-focus:border-red-700 has-focus:border-2 divide-y divide-neutral-200" wire:submit="submitNewComment">
            <div class="flex items-start gap-3 pb-3">
                @if (!$replyId)
                    <img src="{{ $this->user->avatar_url ?? asset('avatar.svg') }}" alt="{{ $this->user?->name ?? 'Avatar pengguna' }}" class="size-8 rounded-full">
                @endif
                <textarea name="content" placeholder="Tulis Komentar..." maxlength="1000" rows="{{ $replyId ? '2' : '3' }}" class="p-0 align-middle w-full placeholder-neutral-500 text-neutral-700 border-0 focus:ring-0" required wire:model="newComment"></textarea>
            </div>
            <div class="flex items-center gap-2 {{ !$replyId ? 'justify-between' : 'justify-end' }}">
                @if (!$replyId)
                    <p class="text-sm text-neutral-500 word_left">1000 karakter tersisa</p>
                @else
                    <x-base.button type="button" color="bordered" size="sm" wire:click="cancelReply">Batal</x-base.button>
                @endif
                <x-base.button color="primary" size="sm" icon="icon-[tabler--send-2]" icon-pos="right">Kirim</x-base.button>
            </div>
        </form>
    @endauth

    <div class="space-y-2">
        @if (!$replyId && !$comments->count())
            <div class="flex flex-col items-center text-center gap-2">
                <span class="icon-[tabler--bubble-text] size-12 text-neutral-300"></span>
                <div>
                    <p class="font-bold text-neutral-900">Belum ada Komentar</p>
                    <p class="text-neutral-500 text-sm">Jadilah yang pertama berkomentar di sini</p>
                </div>
            </div>
        @else
            @foreach ($comments as $comment)
                <article wire:key="{{ $comment['id'] }}" class="flex items-start gap-3 relative">
                    <div class="absolute top-0 right-0">
                        <button class="text-neutral-500 ml-auto">
                            <span class="icon-[tabler--dots] size-5"></span>
                        </button>
                    </div>
                    <img src="{{ $comment['avatar_url'] }}" alt="{{ $comment['name'] }}" class="size-8 rounded-full mt-1">
                    <div class="grow space-y-2">
                        <div>
                            <div>
                                <p class="font-bold text-neutral-900">{{ $comment['name'] }}</p>
                                <p class="text-neutral-700">
                                    @if ($comment['reply_name'])
                                        <span class="text-red-700">{{ '@' . $comment['reply_name'] }}</span>
                                    @endif
                                    {{ $comment['content'] }}
                                </p>
                            </div>
                            <div class="flex gap-4">
                                <span class="text-sm text-neutral-500">{{ formatDate($comment['created_at']) }}</span>
                                <div class="flex items-center gap-1 text-sm {{ $reactions->has($comment['id']) && $reactions[$comment['id']] === 'like' ? 'text-red-700' : 'text-neutral-500' }}">
                                    <button class="flex items-center cursor-pointer" wire:click="react({{ $comment['id'] }}, 'like')">
                                        <span class="{{ $reactions->has($comment['id']) && $reactions[$comment['id']] === 'like' ? 'icon-[tabler--thumb-up-filled]' : 'icon-[tabler--thumb-up]' }} size-4"></span>
                                    </button>
                                    {{ $comment['likes'] }}
                                </div>
                                <div class="flex items-center gap-1 text-sm {{ $reactions->has($comment['id']) && $reactions[$comment['id']] === 'dislike' ? 'text-red-700' : 'text-neutral-500' }}">
                                    <button class="flex items-center cursor-pointer" wire:click="react({{ $comment['id'] }}, 'dislike')">
                                        <span class="{{ $reactions->has($comment['id']) && $reactions[$comment['id']] === 'dislike' ? 'icon-[tabler--thumb-down-filled]' : 'icon-[tabler--thumb-down]' }} size-4"></span>
                                    </button>
                                    {{ $comment['dislikes'] }}
                                </div>
                                <button class="cursor-pointer text-sm text-red-700" data-toggle="block" data-target="#reply-{{ $replyId ? $replyId : $comment['id'] }}">Balas</button>
                            </div>
                        </div>

                        @if (!$replyId)
                            <livewire:article.comment :reply-id="$comment['id']" />    
                        @endif
                    </div>
                </article>
            @endforeach
        @endif
    </div>
</section>

@push('scripts')
    @if (!$replyId)
        <script>
            const textarea = document.querySelector('#komentar_baru textarea')
            const wordLeft = document.querySelector('#komentar_baru .word_left')

            textarea.addEventListener('input', () => {
                wordLeft.textContent = 1000 - textarea.value.trim().length + ' karakter tersisa'
            })
        </script>
    @endif
@endpush