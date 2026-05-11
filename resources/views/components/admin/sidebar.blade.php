<aside id="sidebar" class="bg-neutral-900 text-white w-72 h-screen hidden fixed top-0 left-0 z-20 lg:block" data-click-outside-close="drawer" data-ignore=".open-sidebar">
    <div class="border-b border-neutral-800 h-14 flex items-center justify-center lg:h-16">
        <img src="{{ setting('logo_url') }}" alt="{{ setting('name') }}" class="max-h-8">
    </div>
    <div class="p-4 space-y-1">
        @php
            $menuIcons = [
                'admin.dashboard' => 'icon-[tabler--dashboard-filled]',
                'admin.articles' => 'icon-[tabler--article-filled]',
                'admin.pages' => 'icon-[tabler--file-filled]',
                'admin.menus' => 'icon-[tabler--layout-navbar-filled]',
                'admin.users' => 'icon-[tabler--user-filled]',
                'admin.setting' => 'icon-[tabler--settings-filled]'
            ];
        @endphp

        @foreach ($menus as $menu)
            <a href="" @class([
                'flex items-center gap-3 py-2.5 px-3 rounded-md',
                'bg-red-700 text-white font-medium' => $activeMenu === $menu['id'],
                'text-neutral-400 hover:bg-neutral-800 hover:text-white' => $activeMenu !== $menu['id']
            ])>
                <span class="{{ $menuIcons[$menu['id']] }}"></span>
                <p>{{ $menu['name'] }}</p>

                @isset ($menu['children'])
                    <ul class="hidden">
                        @foreach ($menu['children'] as $child)
                            <li>
                                <a href="">
                                    <p>{{ $child['name'] }}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endisset
            </a>
        @endforeach
    </div>
</aside>