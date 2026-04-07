<footer class="bg-neutral-900 text-white py-4 relative sm:py-6 lg:py-8">
    <x-base.container class="space-y-4 lg:grid grid-cols-2 lg:space-y-0 lg:gap-4">
        <div class="space-y-4">
            <h2 class="font-bold text-lg text-neutral-500">Telusuri</h2>
            <ul class="grid grid-cols-2 gap-4 font-medium">
                @foreach ($menus as $menu)
                    <li>
                        <a href="{{ $menu->url }}" class="hover:text-neutral-400">{{ $menu->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        
        <hr class="border-neutral-800 lg:hidden">

        <div class="space-y-4">
            <h2 class="font-bold text-lg text-neutral-500">Navigasi</h2>

            <ul class="grid grid-cols-2 gap-4 font-medium">
                @foreach ($navs as $nav)
                    <li>
                        <a href="">{{ $nav }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <hr class="border-neutral-800 sm:hidden">

        <ul class="flex items-center gap-4 sm:absolute sm:bottom-8 sm:left-1/2 sm:-translate-x-1/2 sm:m-0 lg:bottom-10">
            <li>
                <a href="" class="w-10 h-10 bg-neutral-800 flex items-center justify-center rounded-md">
                    <span class="icon-[tabler--brand-instagram-filled]"></span>
                </a>
            </li>
            <li>
                <a href="" class="w-10 h-10 bg-neutral-800 flex items-center justify-center rounded-md">
                    <span class="icon-[tabler--brand-facebook-filled]"></span>
                </a>
            </li>
            <li>
                <a href="" class="w-10 h-10 bg-neutral-800 flex items-center justify-center rounded-md">
                    <span class="icon-[tabler--brand-twitter-filled]"></span>
                </a>
            </li>
            <li>
                <a href="" class="w-10 h-10 bg-neutral-800 flex items-center justify-center rounded-md">
                    <span class="icon-[tabler--brand-tiktok-filled]"></span>
                </a>
            </li>
            <li>
                <a href="" class="w-10 h-10 bg-neutral-800 flex items-center justify-center rounded-md">
                    <span class="icon-[tabler--brand-youtube-filled]"></span>
                </a>
            </li>
        </ul>

        <div class="flex items-center justify-between border-t border-neutral-800 pt-4 sm:p-0 sm:h-16 lg:col-span-full">
            <x-includes.logo class="max-h-6" />
            <p class="text-sm text-neutral-500">Copyright &copy; 2025</p>
        </div>
    </x-base.container>
</footer>