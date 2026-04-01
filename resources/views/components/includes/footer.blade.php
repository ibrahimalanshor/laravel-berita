<footer class="bg-neutral-900 text-white py-4">
    <x-base.container class="space-y-4">
        <h2 class="font-bold text-lg text-neutral-500">Telusuri</h2>
        <ul class="grid grid-cols-2 gap-4 font-medium">
            @foreach ($menus as $menu)
                <li>
                    <a href="">{{ $menu }}</a>
                </li>
            @endforeach
        </ul>
        
        <hr class="border-neutral-800">

        <h2 class="font-bold text-lg text-neutral-500">Navigasi</h2>

        <ul class="grid grid-cols-2 gap-4 font-medium">
            @foreach ($navs as $nav)
                <li>
                    <a href="">{{ $nav }}</a>
                </li>
            @endforeach
        </ul>

        <hr class="border-neutral-800">

        <ul class="flex items-center gap-4">
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

        <hr class="border-neutral-800">

        <div class="flex items-center justify-between">
            <img src="{{ asset('logo.png') }}" alt="{{ $title ?? config('app.name') }}" class="w-12">
            <p class="text-sm text-neutral-500">Copyright &copy; 2025</p>
        </div>
    </x-base.container>
</footer>