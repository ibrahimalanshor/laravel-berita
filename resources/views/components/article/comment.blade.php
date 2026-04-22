<section {{ $attributes->class('space-y-2') }}>
    <h2 class="font-bold text-neutral-900 text-lg">0 Komentar</h2>

    <form id="komentar_baru" class="border border-neutral-300 p-4 rounded-md has-focus:border-red-700 has-focus:border-2 divide-y divide-neutral-200 space-y-3">
        <div class="flex items-start gap-3 pb-3">
            <img src="{{ asset('avatar.svg') }}" alt="" class="size-8">
            <textarea name="" id="" placeholder="Tulis Komentar..." rows="3" class="p-0 align-middle w-full placeholder-neutral-500 text-neutral-700 border-0 focus:ring-0"></textarea>
        </div>
        <div class="flex items-center justify-between">
            <p class="text-sm text-neutral-500 word_left">1000 karakter tersisa</p>
            <x-base.button color="primary" size="sm" icon="icon-[tabler--send-2]" icon-pos="right">Kirim</x-base.button>
        </div>
    </form>
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