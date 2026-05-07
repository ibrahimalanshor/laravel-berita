<section id="komentar" class="px-4 scroll-mt-20 sm:p-0">
    <div class="flex flex-col gap-2 mb-2 lg:flex-row lg:items-center lg:justify-between">
        <h2 class="font-bold text-neutral-900 text-lg">{{ $total }} Komentar</h2>
        @guest
            <x-base.button icon="icon-[tabler--brand-google-filled]" tag-name="a" color="bordered" class="w-full sm:w-auto" href="{{ route('auth.google') }}">
                Masuk untuk berkomentar
            </x-base.button>
        @endguest
    </div>

    @auth
        <x-comment.form type="create" :article="$article->slug" />
    @endauth

    <div class="space-y-4">
        @if (!$comments->count())
            <div class="flex flex-col items-center text-center gap-2">
                <span class="icon-[tabler--bubble-text] size-12 text-neutral-300"></span>
                <div>
                    <p class="font-bold text-neutral-900">Belum ada Komentar</p>
                    <p class="text-neutral-500 text-sm">Jadilah yang pertama berkomentar di sini</p>
                </div>
            </div>
        @else
            <form class="flex flex-wrap gap-2">
                <x-base.button type="submit" name="sort" value="latest" color="{{ $sort === 'latest' ? 'primary' : 'bordered' }}" size="sm">Terbaru</x-base.button>
                <x-base.button type="submit" name="sort" value="oldest" color="{{ $sort === 'oldest' ? 'primary' : 'bordered' }}" size="sm">Terlama</x-base.button>
                <x-base.button type="submit" name="sort" value="popular" color="{{ $sort === 'popular' ? 'primary' : 'bordered' }}" size="sm">Terpopuler</x-base.button>
            </form>
            <div class="space-y-2" id="comment-list">
                @foreach ($comments as $comment)
                    <x-comment.single :comment="$comment" :reactions="$reactions" :article="$article->slug" />
                @endforeach
            </div>

            @if ($comments->count() < $total)
                <div class="flex items-center justify-center">
                    <x-base.button data-load-more="#comment-list" data-total="{{ $total }}" data-page="1" size="sm" class="text-sm" color="bordered" icon="icon-[tabler--reload]">Lebih banyak</x-base.button>
                </div>
            @endif
        @endif
    </div>
</section>

@push('scripts')
    <script>
        @auth
            const textarea = document.querySelector('#komentar_baru textarea')
            const wordLeft = document.querySelector('#komentar_baru .word_left')

            if (textarea) {
                textarea.addEventListener('input', () => {
                    wordLeft.textContent = 255 - textarea.value.trim().length + ' karakter tersisa'
                })
            }

            const replyButtons = document.querySelectorAll('[data-reply-comment]')
            const cancelReplyButtons = document.querySelectorAll('[data-cancel-reply]')

            replyButtons.forEach(button => addReplyButtonEvent(button))
            cancelReplyButtons.forEach(button => addCancelReplyButtonEvent(button))
        @endauth
        
        const loadMoreButtons = document.querySelectorAll('[data-load-more]')

        loadMoreButtons.forEach(button => {
            const commentList = document.querySelector(button.dataset.loadMore)

            button.addEventListener('click', async () => {
                const page = +button.dataset.page
                const replyId = button.dataset.replyId

                const res = await fetch(`{{ route('comment.load-more', ['article_id' => $article->id]) }}&page=${page + 1}&reply_id=${replyId ?? ''}`)
                const html = await res.text()

                commentList.insertAdjacentHTML('beforeend', html)

                const replyButtons = Array.from(commentList.querySelectorAll('[data-reply-comment]'))
                    .filter(button => !button.dataset.bound)
                    .forEach(button => addReplyButtonEvent(button))
                const cancelButtons = Array.from(commentList.querySelectorAll('[data-cancel-reply]'))
                    .filter(button => !button.dataset.bound)
                    .forEach(button => addCancelReplyButtonEvent(button))

                if (commentList.childElementCount >= +button.dataset.total) {
                    button.remove()
                } else {
                    button.dataset.page++
                }
            })
        })

        function addReplyButtonEvent(button) {
            @auth
                const replyForm = document.querySelector(`#reply-${button.dataset.replyComment}`)
                const mention = button.dataset.mention
                const mentionId = button.dataset.mentionId

                button.addEventListener('click', () => {
                    const mentionSpan = replyForm.querySelector('.mention')
                    const mentionInput = replyForm.querySelector('[name=mention_id]')

                    replyForm.classList.remove('hidden')
                    mentionSpan.innerHTML = `@${mention}`
                    mentionInput.value = mentionId

                    requestAnimationFrame(() => {
                        const textarea = replyForm.querySelector('textarea')

                        textarea.style.textIndent = `${mentionSpan.offsetWidth + 8}px`
                        textarea.focus()
                    })
                })

                button.dataset.bound = true
            @endauth
        }

        function addCancelReplyButtonEvent(button) {
            @auth
                const replyForm = document.querySelector(`#reply-${button.dataset.cancelReply}`)

                button.addEventListener('click', () => {
                    replyForm.classList.add('hidden')
                    replyForm.querySelector('textarea').value = ''
                })

                button.dataset.bound = true
            @endauth
        }
    </script>
@endpush