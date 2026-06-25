<header class="sticky top-0 z-20 flex h-16 items-center justify-between border-b border-slate-200 bg-white px-6">
    <div>
        <h1 class="text-lg font-semibold text-slate-900">@yield('page-title', 'Dashboard')</h1>
        @hasSection('page-subtitle')
            <p class="text-sm text-slate-500">@yield('page-subtitle')</p>
        @endif
    </div>

    <div class="flex items-center gap-4">
        <div class="text-right">
            <p class="text-sm font-medium text-slate-900">{{ auth()->user()->name }}</p>
            <p class="text-xs text-slate-500">Administrator</p>
        </div>
        <form action="{{ route('admin.logout') }}" method="GET">
            @csrf
            <button type="submit" class="rounded-lg border border-slate-300 px-3 py-1.5 text-sm text-slate-600 hover:bg-slate-50">
                Logout
            </button>
        </form>
    </div>
</header>
