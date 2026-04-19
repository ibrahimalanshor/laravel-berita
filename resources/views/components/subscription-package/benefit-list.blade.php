<ul class="space-y-1">
    <li @class(['flex items-center gap-2', 'line-through opacity-50' => !$package->newsletter])>
        <span class="{{ $package->newsletter ? 'icon-[tabler--check] text-green-700' : 'icon-[tabler--x] text-red-700' }}"></span>
        <p class="text-neutral-700">Notifikasi email artikel terbaru</p>
    </li>
    <li @class(['flex items-center gap-2', 'line-through opacity-50' => !$package->no_ads])>
        <span class="{{ $package->no_ads ? 'icon-[tabler--check] text-green-700' : 'icon-[tabler--x] text-red-700' }}"></span>
        <p class="text-neutral-700">Bebas Iklan</p>
    </li>
    <li @class(['flex items-center gap-2', 'line-through opacity-50' => !$package->premium_articles])>
        <span class="{{ $package->premium_articles ? 'icon-[tabler--check] text-green-700' : 'icon-[tabler--x] text-red-700' }}"></span>
        <p class="text-neutral-700">Akses ke artikel premium sepuasnya</p>
    </li>
</ul>