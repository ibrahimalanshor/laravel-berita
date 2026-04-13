<div class="relative sm:flex sm:items-center sm:gap-2">
    <button class="text-neutral-700 flex items-center open-share-dropdown sm:hidden" data-toggle="dropdown" data-target="#share-dropdown" aria-label="Bagikan">
        <span class="icon-[tabler--share] size-5"></span>
    </button>
    <p class="hidden md:block text-sm text-neutral-700">Bagikan:</p>
    <div
        id="share-dropdown"
        class="hidden absolute bg-white border border-neutral-200 rounded-md shadow-lg right-0 mt-2 py-1 sm:flex sm:static sm:bg-none sm:border-0 sm:shadow-none sm:p-0 sm:m-0 sm:gap-2"
        data-click-outside-close="drawer"
        data-ignore=".open-share-dropdown"
    >
        <a target="_blank" href="https://api.whatsapp.com/send?text={{  urlencode($shareText) }}" class="flex items-center gap-2 px-3 py-2 sm:p-0">
            <span class="icon-[tabler--brand-whatsapp-filled] text-green-600 size-4 sm:size-5"></span>
            <span class="text-neutral-700 sm:hidden">Whatsapp</span>
        </a>
        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ request()->url() }}" class="flex items-center gap-2 px-3 py-2 sm:p-0">
            <span class="icon-[tabler--brand-facebook-filled] text-blue-600 size-4 sm:size-5"></span>
            <span class="text-neutral-700 sm:hidden">Facebook</span>
        </a>
        <a target="_blank" href="https://twitter.com/intent/tweet?text={{  urlencode($shareText) }}" class="flex items-center gap-2 px-3 py-2 sm:p-0">
            <span class="icon-[tabler--brand-twitter-filled] text-sky-600 size-4 sm:size-5"></span>
            <span class="text-neutral-700 sm:hidden">Twitter</span>
        </a>
        <a target="_blank" href="{{ $mailText }}" class="flex items-center gap-2 px-3 py-2 sm:p-0">
            <span class="icon-[tabler--mail-filled] text-neutral-600 size-4 sm:size-5"></span>
            <span class="text-neutral-700 sm:hidden">Email</span>
        </a>
    </div>
</div>