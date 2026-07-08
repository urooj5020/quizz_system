<header class="w-full bg-admin-surface border-b border-admin sticky top-0 z-50 backdrop-blur-md bg-opacity-95 transition-colors duration-300">
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
        
        <div class="flex items-center gap-3">
            <button @click="mobileSidebar = !mobileSidebar" class="p-2 md:hidden bg-admin-raised border border-admin rounded-xl text-admin-muted hover:text-admin-fg transition-colors" aria-label="Toggle Navigation">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>

            <div class="flex items-center">
                <span class="text-[10px] px-2 py-0.5 rounded-full bg-admin-raised border border-admin text-admin-fg font-mono font-bold uppercase tracking-wider">Admin</span>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <div class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-admin-raised border border-admin text-xs text-admin-muted font-mono">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>System Active</span>
            </div>

            <button id="theme-toggle" type="button"
                class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-admin-raised border border-admin text-admin-muted hover:text-admin-fg transition-colors">
                <span id="theme-toggle-icon" class="block" aria-hidden="true">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path id="theme-sun-icon" stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        <path id="theme-moon-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                    </svg>
                </span>
            </button>

            <div class="relative" x-data="{ userMenu: false }">
                <button @click="userMenu = !userMenu" @click.outside="userMenu = false" class="flex items-center gap-2.5 px-3 py-1.5 border border-admin bg-admin-raised hover:bg-admin-secondary rounded-xl text-xs font-mono text-admin-muted hover:text-admin-fg focus:outline-none transition-all duration-200">
                    <div class="w-5 h-5 rounded-md bg-admin-secondary flex items-center justify-center text-admin-fg font-black text-[10px] uppercase">
                        {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                    </div>
                    <span class="hidden sm:inline">{{ Auth::user()->name ?? 'Admin' }}</span>
                    <svg class="fill-current h-3.5 w-3.5 text-admin-muted-soft transition-transform duration-200" :class="{'rotate-180': userMenu}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <div x-show="userMenu" x-cloak class="absolute right-0 mt-2 w-48 bg-admin-surface border border-admin rounded-xl shadow-2xl py-1 overflow-hidden z-50">
                    <a href="{{ route('profile.edit') }}" class="block w-full px-4 py-2.5 text-left font-mono text-[10px] uppercase tracking-wider text-admin-muted hover:bg-admin-secondary hover:text-admin-fg transition duration-150 ease-in-out">
                        Settings
                    </a>
                    <hr class="border-admin my-1">
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full px-4 py-2.5 text-left font-mono text-[10px] uppercase tracking-wider text-admin-muted hover:bg-admin-secondary hover:text-rose-400 font-medium transition duration-150 ease-in-out">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</header>