<nav x-data="{ open: false }" class="w-full bg-[#010204]/80 backdrop-blur-md border-b border-slate-900 sticky top-0 z-50 px-6 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between h-20">
            <div class="flex items-center gap-10">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                        <div class="w-8 h-8 rounded-lg bg-[#07090e] border border-indigo-500/20 flex items-center justify-center relative shadow-lg shadow-indigo-500/5">
                            <svg class="w-4 h-4 text-indigo-400 group-hover:scale-110 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                            <div class="absolute inset-0 border border-indigo-500/30 rounded-lg animate-ping opacity-10 scale-75 pointer-events-none"></div>
                        </div>
                        <span class="text-base font-display font-bold tracking-tight text-white">Brain<span class="text-indigo-400 font-light">Matrix</span></span>
                    </a>
                </div>

                <div class="hidden space-x-1 sm:-my-px sm:flex h-20">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 text-xs font-semibold uppercase tracking-widest transition-colors duration-150 focus:outline-none {{ request()->routeIs('dashboard') ? 'text-indigo-400 border-b-2 border-indigo-500' : 'text-slate-400 hover:text-slate-200 border-b-2 border-transparent' }}">
                        {{ __('Dashboard') }}
                    </a>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 bg-[#07090e] border border-slate-800 rounded-lg text-xs font-mono tracking-wide text-slate-300 hover:text-white focus:outline-none focus:border-indigo-500/50 transition duration-150 ease-in-out gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-indigo-400"></span>
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1 text-slate-500">
                                <svg class="fill-current h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-[#07090e] border border-slate-900 rounded-lg shadow-2xl py-1 font-mono text-xs">
                            <x-dropdown-link :href="route('profile.edit')" class="block px-4 py-2.5 text-slate-400 hover:text-white hover:bg-[#010204]/60 transition-colors">
                                {{ __('// View Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" class="block px-4 py-2.5 text-pink-500/80 hover:text-pink-400 hover:bg-[#010204]/60 transition-colors border-t border-slate-900/40"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('// Terminate Session') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg bg-[#07090e] border border-slate-800 text-slate-400 hover:text-white focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-slate-900 bg-[#010204] left-0 w-full z-40 absolute shadow-2xl">
        <div class="pt-3 pb-4 space-y-1 px-4">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="block px-4 py-3 rounded-xl text-sm font-semibold uppercase tracking-wider {{ request()->routeIs('dashboard') ? 'bg-indigo-600/10 text-indigo-400 border-l-2 border-indigo-500' : 'text-slate-400 border-l-2 border-transparent' }}">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-4 border-t border-slate-900 px-6">
            <div class="flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-indigo-400"></span>
                <div>
                    <div class="font-medium text-sm text-white font-display">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-xs text-slate-500 font-mono mt-0.5">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-4 space-y-1 font-mono text-xs">
                <x-responsive-nav-link :href="route('profile.edit')" class="block py-2 text-slate-400 hover:text-white">
                    {{ __('// Profile Config') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" class="block py-2 text-pink-500/80 hover:text-pink-400"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('// Disconnect Node') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>