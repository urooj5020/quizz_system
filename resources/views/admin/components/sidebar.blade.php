<aside :class="mobileSidebar ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'" 
       class="w-64 bg-[#050507] border-r border-zinc-900 h-screen flex flex-col justify-between fixed top-0 left-0 z-50 transition-transform duration-300 ease-in-out flex-shrink-0">
    
    <div class="w-full flex flex-col">
        <div class="h-[65px] border-b border-zinc-900 flex items-center px-6 gap-3 flex-shrink-0">
            <div class="w-7 h-7 rounded bg-indigo-600/10 border border-indigo-500/30 flex items-center justify-center font-display font-bold text-indigo-400 text-xs shadow-md shadow-indigo-500/5">
                Ω
            </div>
            <div class="flex flex-col text-left">
                <span class="text-sm font-display font-bold tracking-tight text-white block">Brain<span class="text-indigo-400 font-light">Matrix</span></span>
                <span class="text-[9px] font-mono text-zinc-600 uppercase tracking-widest leading-none mt-0.5 block">Admin_Console</span>
            </div>
        </div>

        <nav class="p-4 space-y-6 font-mono text-[11px] uppercase tracking-wider mt-4 text-left">
            
            <div class="space-y-1.5">
                <span class="px-3 text-[9px] text-zinc-700 font-bold block mb-2">// Main Clusters</span>
                
                <a href="{{ route('dashboard-overview') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg border transition-all duration-150 {{ request()->routeIs('dashboard-overview') ? 'text-indigo-400 bg-indigo-950/20 border-indigo-900/40 font-bold' : 'text-zinc-400 hover:text-zinc-200 hover:bg-zinc-900/30 border-transparent' }}">
                    <span class="w-1.5 h-1.5 rounded-full {{ request()->routeIs('dashboard-overview') ? 'bg-indigo-500 animate-pulse' : 'bg-zinc-800' }}"></span>
                    Overview Core
                </a>
                
                <a href="{{ route('quizz-factory') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg border transition-all duration-150 {{ request()->routeIs('quizz-factory') ? 'text-indigo-400 bg-indigo-950/20 border-indigo-900/40 font-bold' : 'text-zinc-400 hover:text-zinc-200 hover:bg-zinc-900/30 border-transparent' }}">
                    <span class="w-1.5 h-1.5 rounded-full {{ request()->routeIs('quizz-factory') ? 'bg-indigo-500 animate-pulse' : 'bg-zinc-800' }}"></span>
                    Quiz Factory
                </a>
            </div>

            <div class="space-y-1.5">
                <span class="px-3 text-[9px] text-zinc-700 font-bold block mb-2">// Integrity Arrays</span>
                
                <a href="{{ route('show-users') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg border transition-all duration-150 {{ request()->routeIs('show-users') ? 'text-indigo-400 bg-indigo-950/20 border-indigo-900/40 font-bold' : 'text-zinc-400 hover:text-zinc-200 hover:bg-zinc-900/30 border-transparent' }}">
                    <span class="w-1.5 h-1.5 rounded-full"></span>
                    User Terminal Nodes
                </a>

                <a href="{{ route('categories') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg border transition-all duration-150 {{ request()->routeIs('categories') ? 'text-indigo-400 bg-indigo-950/20 border-indigo-900/40 font-bold' : 'text-zinc-400 hover:text-zinc-200 hover:bg-zinc-900/30 border-transparent' }}">
                    <span class="w-1.5 h-1.5 rounded-full"></span>
                    Category Nodes
                </a>

                <a href="#" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg border transition-all duration-150 {{ request()->routeIs('admin.audits') ? 'text-indigo-400 bg-indigo-950/20 border-indigo-900/40 font-bold' : 'text-zinc-400 hover:text-zinc-200 hover:bg-zinc-900/30 border-transparent' }}">
                    <span class="w-1.5 h-1.5 rounded-full {{ request()->routeIs('admin.audits') ? 'bg-indigo-500 animate-pulse' : 'bg-zinc-800' }}"></span>
                    Security Audit Logs
                </a>
            </div>
        </nav>
    </div>

    <div class="p-4 border-t border-zinc-900 bg-[#050507] flex-shrink-0 w-full">
        <div class="flex items-center justify-between p-2 rounded-lg bg-zinc-950/40 border border-zinc-900/60 w-full">
            <div class="flex items-center gap-2 min-w-0">
                <div class="w-6 h-6 rounded bg-purple-600/20 text-[10px] text-purple-400 font-mono font-bold flex items-center justify-center flex-shrink-0">
                    AD
                </div>
                <div class="truncate text-left min-w-0">
                    <div class="text-[10px] text-zinc-300 font-medium truncate">Urooj</div>
                    <span class="text-[8px] text-zinc-600 font-mono block leading-none mt-0.5">Root_Privileges</span>
                </div>
            </div>
            
            <form method="POST" action="{{ route('logout') }}" class="flex items-center flex-shrink-0">
                @csrf
                <button type="submit" class="text-zinc-600 hover:text-pink-500 transition-colors p-1">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</aside>

<div x-show="mobileSidebar" @click="mobileSidebar = false" x-cloak class="fixed inset-0 z-40 bg-black/60 backdrop-blur-sm lg:hidden"></div>