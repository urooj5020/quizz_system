<aside :class="mobileSidebar ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'" 
       class="w-64 bg-admin-surface border-r border-admin h-screen flex flex-col justify-between fixed top-0 left-0 z-50 transition-transform duration-300 ease-in-out flex-shrink-0">
    
    <div class="w-full flex flex-col">
        <div class="h-[65px] border-b border-admin flex items-center px-6 gap-3 flex-shrink-0">
            <div class="w-7 h-7 rounded bg-admin-secondary border border-admin flex items-center justify-center font-display font-bold text-admin-fg text-xs">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                </svg>
            </div>
            <div class="flex flex-col text-left">
                <span class="text-sm font-display font-bold tracking-tight text-admin-fg block">Brain<span class="text-admin-fg font-light">Matrix</span></span>
                <span class="text-[9px] font-mono text-admin-muted uppercase tracking-widest leading-none mt-0.5 block">Admin Panel</span>
            </div>
        </div>

        <nav class="p-4 space-y-6 font-mono text-[11px] uppercase tracking-wider mt-4 text-left">
            
            <div class="space-y-1.5">
                <span class="px-3 text-[9px] text-admin-muted-soft font-bold block mb-2">Main</span>
                
                <a href="{{ route('dashboard-overview') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg border transition-all duration-150 {{ request()->routeIs('dashboard-overview') ? 'text-admin-fg bg-admin-raised border-admin-strong font-bold' : 'text-admin-muted hover:text-admin-fg hover:bg-admin-secondary border-transparent' }}">
                    <span class="flex-shrink-0 w-1.5 h-1.5 rounded-full {{ request()->routeIs('dashboard-overview') ? 'bg-admin-fg animate-pulse' : 'bg-admin-muted-soft' }}"></span>
                    Dashboard
                </a>
                
                <a href="{{ route('quizz-factory') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg border transition-all duration-150 {{ request()->routeIs('quizz-factory') ? 'text-admin-fg bg-admin-raised border-admin-strong font-bold' : 'text-admin-muted hover:text-admin-fg hover:bg-admin-secondary border-transparent' }}">
                    <span class="flex-shrink-0 w-1.5 h-1.5 rounded-full {{ request()->routeIs('quizz-factory') ? 'bg-admin-fg animate-pulse' : 'bg-admin-muted-soft' }}"></span>
                    Quiz Manager
                </a>
            </div>

            <div class="space-y-1.5">
                <span class="px-3 text-[9px] text-admin-muted-soft font-bold block mb-2">Management</span>
                
                <a href="{{ route('show-users') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg border transition-all duration-150 {{ request()->routeIs('show-users') ? 'text-admin-fg bg-admin-raised border-admin-strong font-bold' : 'text-admin-muted hover:text-admin-fg hover:bg-admin-secondary border-transparent' }}">
                    <span class="flex-shrink-0 w-1.5 h-1.5 rounded-full {{ request()->routeIs('show-users') ? 'bg-admin-fg animate-pulse' : 'bg-admin-muted-soft' }}"></span>
                    Users
                </a>

                <a href="{{ route('categories') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg border transition-all duration-150 {{ request()->routeIs('categories') ? 'text-admin-fg bg-admin-raised border-admin-strong font-bold' : 'text-admin-muted hover:text-admin-fg hover:bg-admin-secondary border-transparent' }}">
                    <span class="flex-shrink-0 w-1.5 h-1.5 rounded-full {{ request()->routeIs('categories') ? 'bg-admin-fg animate-pulse' : 'bg-admin-muted-soft' }}"></span>
                    Categories
                </a>

                <a href="{{ route('admin-detail') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg border transition-all duration-150 {{ request()->routeIs('admin-detail') ? 'text-admin-fg bg-admin-raised border-admin-strong font-bold' : 'text-admin-muted hover:text-admin-fg hover:bg-admin-secondary border-transparent' }}">
                    <span class="flex-shrink-0 w-1.5 h-1.5 rounded-full {{ request()->routeIs('admin-detail') ? 'bg-admin-fg animate-pulse' : 'bg-admin-muted-soft' }}"></span>
                    Admin Profile
                </a>
            </div>
        </nav>
    </div>

    <div class="p-4 border-t border-admin bg-admin-surface flex-shrink-0 w-full">
        <div class="flex items-center justify-between p-2 rounded-lg bg-admin-raised border border-admin w-full">
            <div class="flex items-center gap-2 min-w-0">
                <div class="w-6 h-6 rounded bg-admin-secondary text-[10px] text-admin-fg font-mono font-bold flex items-center justify-center flex-shrink-0">
                    {{ substr(Auth::user()->name ?? 'A', 0, 2) }}
                </div>
                <div class="truncate text-left min-w-0">
                    <div class="text-[10px] text-admin-fg font-medium truncate">{{ Auth::user()->name ?? 'Admin' }}</div>
                    <span class="text-[8px] text-admin-muted-soft font-mono block leading-none mt-0.5">Administrator</span>
                </div>
            </div>
            
            <form method="POST" action="{{ route('logout') }}" class="flex items-center flex-shrink-0">
                @csrf
                <button type="submit" class="text-admin-muted hover:text-rose-400 transition-colors p-1">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</aside>

<div x-show="mobileSidebar" @click="mobileSidebar = false" x-cloak class="fixed inset-0 z-40 bg-black/60 backdrop-blur-sm lg:hidden"></div>