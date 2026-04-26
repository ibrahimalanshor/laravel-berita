<section {{ $attributes->class('space-y-2') }}>
    <div class="flex flex-col gap-2 lg:flex-row lg:items-center lg:justify-between">
        <h2 class="font-bold text-neutral-900 text-lg">0 Komentar</h2>
        @guest
            <x-base.button icon="icon-[tabler--brand-google-filled]" tag-name="a" color="bordered" class="w-full sm:w-auto" href="{{ route('auth.google') }}">
                Masuk untuk berkomentar
            </x-base.button>
        @endguest
    </div>

    @auth
        <form id="komentar_baru" class="border border-neutral-300 p-4 rounded-md has-focus:border-red-700 has-focus:border-2 divide-y divide-neutral-200 space-y-3" wire:submit="submitNewComment">
            <div class="flex items-start gap-3 pb-3">
                <img src="{{ $this->user->avatar_url ?? asset('avatar.svg') }}" alt="{{ $this->user?->name ?? 'Avatar pengguna' }}" class="size-8 rounded-full">
                <textarea name="content" placeholder="Tulis Komentar..." maxlength="1000" rows="3" class="p-0 align-middle w-full placeholder-neutral-500 text-neutral-700 border-0 focus:ring-0" required wire:model="newComment"></textarea>
            </div>
            <div class="flex items-center justify-between">
                <p class="text-sm text-neutral-500 word_left">1000 karakter tersisa</p>
                <x-base.button color="primary" size="sm" icon="icon-[tabler--send-2]" icon-pos="right">Kirim</x-base.button>
            </div>
        </form>
    @endauth

    <div class="mt-4 space-y-4">
        @if (!$comments->count())
            <div class="flex flex-col items-center text-center gap-2">
                <span class="icon-[tabler--bubble-text] size-12 text-neutral-300"></span>
                <div>
                    <p class="font-bold text-neutral-900">Belum ada Komentar</p>
                    <p class="text-neutral-500 text-sm">Jadilah yang pertama berkomentar di sini</p>
                </div>
            </div>
        @else
            @foreach ($comments as $comment)
                <article class="flex items-start gap-3 relative">
                    <div class="absolute top-0 right-0">
                        <button class="text-neutral-500 ml-auto">
                            <span class="icon-[tabler--dots] size-5"></span>
                        </button>
                    </div>
                    <img src="{{ $comment['avatar_url'] }}" alt="{{ $comment['name'] }}" class="size-8 rounded-full mt-1">
                    <div class="space-y-2 grow">
                        <div>
                            <div>
                                <p class="font-bold text-neutral-900">{{ $comment['name'] }}</p>
                                <p class="text-neutral-700">{{ $comment['content'] }}</p>
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
                                <button class="cursor-pointer text-sm text-red-700" data-toggle="block" data-target="#reply-{{ $comment['id'] }}">Balas</button>
                            </div>
                        </div>

                        <livewire:comment.reply-form :comment-id="$comment['id']" />

                        @if ($comment['replies'])
                            <div class="space-y-1">
                                @foreach ($comment['replies'] as $reply)                            
                                @endforeach
                                <button class="text-red-700 font-medium underline">Lihat komentar lainnya</button>
                            </div>
                        @endif
                    </div>
                </article>
            @endforeach
        @endif
    </div>
</section>

@push('scripts')
<script>
    const textarea = document.querySelector('#komentar_baru textarea')
    const wordLeft = document.querySelector('#komentar_baru .word_left')

    textarea.addEventListener('input', () => {
        wordLeft.textContent = 1000 - textarea.value.trim().length + ' karakter tersisa'
    })
</script>
@endpush