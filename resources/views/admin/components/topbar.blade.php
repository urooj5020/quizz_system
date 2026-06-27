<header class="w-full bg-[#050507] border-b border-zinc-900 sticky top-0 z-50 backdrop-blur-md bg-opacity-95">
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
        
        <div class="flex items-center gap-3">
            <button @click="mobileSidebar = !mobileSidebar" class="p-2 md:hidden bg-zinc-950 border border-zinc-900 rounded-xl text-zinc-400 hover:text-white transition-colors" aria-label="Toggle Navigation">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>

            <div class="flex items-center">
                <span class="text-[10px] px-2 py-0.5 rounded-full bg-zinc-950 border border-zinc-900 text-indigo-400 font-mono font-bold uppercase tracking-wider">HQ</span>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <div class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-zinc-950/40 border border-zinc-900 text-xs text-zinc-500 font-mono">
                <span class="w-1.5 h-1.5 rounded-full bg-[#10b981] animate-pulse"></span>
                <span>Node Active</span>
            </div>

            <div class="relative" x-data="{ userMenu: false }">
                <button @click="userMenu = !userMenu" @click.outside="userMenu = false" class="flex items-center gap-2.5 px-3 py-1.5 border border-zinc-900 bg-zinc-950/40 hover:bg-zinc-900/60 rounded-xl text-xs font-mono text-zinc-400 hover:text-white focus:outline-none transition-all duration-200">
                    <div class="w-5 h-5 rounded-md bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-black text-[10px] uppercase">
                        A
                    </div>
                    <span class="hidden sm:inline">Admin User</span>
                    <svg class="fill-current h-3.5 w-3.5 text-zinc-600 transition-transform duration-200" :class="{'rotate-180': userMenu}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <div x-show="userMenu" x-cloak class="absolute right-0 mt-2 w-48 bg-[#050507] border border-zinc-900 rounded-xl shadow-2xl py-1 overflow-hidden z-50">
                    <a href="#" class="block w-full px-4 py-2.5 text-left font-mono text-[10px] uppercase tracking-wider text-zinc-400 hover:bg-zinc-900/40 hover:text-white transition duration-150 ease-in-out">
                        System Configuration
                    </a>
                    <hr class="border-zinc-900 my-1">
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full px-4 py-2.5 text-left font-mono text-[10px] uppercase tracking-wider text-zinc-500 hover:bg-zinc-900/40 hover:text-rose-400 font-medium transition duration-150 ease-in-out">
                            Terminate Session (Logout)
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</header>