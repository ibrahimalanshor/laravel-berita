<form id="reply-{{ $commentId }}" class="hidden border border-neutral-300 px-3 py-2.5 rounded-md has-focus:border-2 has-focus:border-red-700" wire:submit="submit">
    <textarea required maxlength="255" class="w-full p-0 placeholder-neutral-500 text-neutral-700 border-0 focus:border-0 focus:ring-0" name="" id="" rows="2" placeholder="Tulis komentar..." wire:model="content"></textarea>
    <div class="border-t border-neutral-200 pt-2.5 flex justify-end gap-2">
        <x-base.button size="sm" color="bordered" type="button" data-toggle="block" data-target="#reply-{{ $commentId }}">Batal</x-base.button>
        <x-base.button size="sm" color="primary" icon="icon-[tabler--send-2]" icon-pos="right">Kirim</x-base.button>
    </div>
</form>