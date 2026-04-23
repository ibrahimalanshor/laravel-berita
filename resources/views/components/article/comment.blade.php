<section {{ $attributes->class('space-y-2') }}>
    <h2 class="font-bold text-neutral-900 text-lg">0 Komentar</h2>

    <form id="komentar_baru" class="border border-neutral-300 p-4 rounded-md has-focus:border-red-700 has-focus:border-2 divide-y divide-neutral-200 space-y-3" method="POST" action="{{ route('article.comment', ['article' => $article] )}}">
        @csrf
        <div class="flex items-start gap-3 pb-3">
            <img src="{{ asset('avatar.svg') }}" alt="" class="size-8">
            <textarea name="" id="" placeholder="Tulis Komentar..." maxlength="1000" rows="3" class="p-0 align-middle w-full placeholder-neutral-500 text-neutral-700 border-0 focus:ring-0"></textarea>
        </div>
        <div class="flex items-center justify-between">
            <p class="text-sm text-neutral-500 word_left">1000 karakter tersisa</p>
            <x-base.button color="primary" size="sm" icon="icon-[tabler--send-2]" icon-pos="right">Kirim</x-base.button>
        </div>
    </form>

    <div class="mt-4">
        @if (!$comments->count())
            <div class="flex flex-col items-center text-center gap-2">
                <span class="icon-[tabler--bubble-text] size-12 text-neutral-300"></span>
                <div>
                    <p class="font-bold text-neutral-900">Belum ada Komentar</p>
                    <p class="text-neutral-500 text-sm">Jadilah yang pertama berkomentar di sini</p>
                </div>
            </div>
        @else
            <article class="flex items-start gap-3">
                <img src="{{ asset('avatar.svg') }}" alt="" class="size-8 mt-1">
                <div class="space-y-1">
                    <div>
                        <p class="font-bold text-neutral-900">Maryono</p>
                        <p class="text-neutral-700">Astofirulloh..figur pemecah belah sprti ini yg dilihat negara sebesar NKRI ini...pahlawan n pendiri bangsa ini pasti nangiss melihat fenomena bangsa skrng ini...</p>
                    </div>
                    <div class="flex gap-4">
                        <span class="text-sm text-neutral-500">9 bulan yang lalu</span>
                        <div class="flex items-center gap-1 text-sm text-neutral-500">
                            <button class="flex items-center">
                                <span class="icon-[tabler--thumb-up] size-4"></span>
                            </button>
                            4
                        </div>
                        <div class="flex items-center gap-1 text-sm text-neutral-500">
                            <button class="flex items-center">
                                <span class="icon-[tabler--thumb-down] size-4"></span>
                            </button>
                            0
                        </div>
                        <button class="text-sm text-red-700">Balas</button>
                    </div>
                </div>
                <button class="text-neutral-500 mt-0.5">
                    <span class="icon-[tabler--dots] size-5"></span>
                </button>
            </article>
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