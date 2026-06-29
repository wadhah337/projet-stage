<aside class="fixed inset-y-0 left-0 z-30 w-64 bg-slate-900 text-white">
    <div class="flex h-16 items-center border-b border-slate-700 px-6">
        <div class="flex items-center gap-3">
            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-500 font-bold">
                <img src=""> </img>
            </div>
            <div class=" ">
                <p class="text-sm text-center font-semibold">info wadhah school admin</p>
                <p class="text-xs text-slate-400 text-center">Admin Panel</p>
            </div>
            
        </div>
    </div>

    <nav class="space-y-1 p-4">
        @php
            $links = [
                 ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                // ['route' => 'admin.courses.index', 'label' => 'Courses', 'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                // ['route' => 'admin.categories.index', 'label' => 'Categories', 'icon' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z'],
                // ['route' => 'admin.lessons.index', 'label' => 'Lessons', 'icon' => 'M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
            ];
        @endphp

        @foreach ($links as $link)
            @php $active = request()->routeIs(str_replace('.index', '.*', $link['route'])) || request()->routeIs($link['route']); @endphp
            <a href="{{ route($link['route']) }}"
               class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition {{ $active ? 'bg-indigo-600 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $link['icon'] }}"/>
                </svg>
                {{ $link['label'] }}
            </a>
        @endforeach
    </nav>
</aside>
