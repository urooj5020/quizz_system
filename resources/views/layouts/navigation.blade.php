<nav x-data="{ open: false }"
    class="w-full theme-panel-soft backdrop-blur-md border-b sticky top-0 z-50 px-4 sm:px-6 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between h-20 items-center">
            <div class="flex items-center gap-6">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                        <div
                            class="w-9 h-9 rounded-xl bg-white/80 dark:bg-slate-900/80 border border-indigo-500/20 flex items-center justify-center relative shadow-sm">
                            <svg class="w-4 h-4 text-indigo-500 group-hover:scale-110 transition-transform duration-300"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                        </div>
                        <span class="text-base font-display font-bold tracking-tight theme-text">Brain<span
                                class="text-indigo-500 font-light">Matrix</span></span>
                    </a>
                </div>

                <div class="hidden space-x-1 sm:-my-px sm:flex h-20">
                    <a href="{{ route('dashboard') }}"
                        class="inline-flex items-center px-1 pt-1 text-xs font-semibold uppercase tracking-widest transition-colors duration-150 focus:outline-none {{ request()->routeIs('dashboard') ? 'text-indigo-500 border-b-2 border-indigo-500' : 'theme-muted hover:theme-text border-b-2 border-transparent' }}">
                        {{ __('Dashboard') }}
                    </a>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <button id="theme-toggle" type="button"
                    class="inline-flex items-center gap-2 rounded-full border theme-border bg-white/70 px-3 py-2 text-sm font-medium transition hover:shadow-sm dark:bg-slate-900/70">
                    <span aria-hidden="true">
                        <svg class="theme-sun-icon w-4 h-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <svg class="theme-moon-icon w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                        </svg>
                    </span>
                    <span id="theme-toggle-label">Dark</span>
                </button>

                <div class="hidden sm:flex sm:items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-4 py-2 rounded-lg border theme-border bg-white/70 text-sm font-medium theme-text hover:shadow-sm transition duration-150 ease-in-out gap-2 dark:bg-slate-900/70">
                                <span class="w-2 h-2 rounded-full bg-indigo-500"></span>
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1 theme-muted">
                                    <svg class="fill-current h-3 w-3" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div
                                class="rounded-lg border theme-border bg-white/95 shadow-xl py-1 text-sm dark:bg-slate-900/95">
                                <x-dropdown-link :href="route('profile.edit')"
                                    class="block px-4 py-2.5 theme-muted hover:theme-text hover:bg-slate-100/80 transition-colors dark:hover:bg-slate-800/70">
                                    {{ __('View Profile') }}
                                </x-dropdown-link>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        class="block px-4 py-2.5 text-rose-500 hover:text-rose-400 hover:bg-slate-100/80 transition-colors dark:hover:bg-slate-800/70 border-t theme-border"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Logout') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-lg border theme-border bg-white/70 text-slate-500 hover:text-slate-700 dark:bg-slate-900/70 dark:text-slate-300 transition duration-150 ease-in-out">
                    <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}"
        class="hidden sm:hidden border-t theme-border bg-white/95 left-0 w-full z-40 absolute shadow-2xl dark:bg-slate-950/95">
        <div class="pt-3 pb-4 space-y-1 px-4">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                class="block px-4 py-3 rounded-xl text-sm font-semibold uppercase tracking-wider {{ request()->routeIs('dashboard') ? 'bg-indigo-500/10 text-indigo-500 border-l-2 border-indigo-500' : 'theme-muted border-l-2 border-transparent' }}">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-4 border-t theme-border px-6">
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-indigo-500"></span>
                <div>
                    <div class="font-medium text-sm theme-text">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-xs theme-muted mt-0.5">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-4 space-y-1 text-sm">
                <x-responsive-nav-link :href="route('profile.edit')" class="block py-2 theme-muted hover:theme-text">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <button id="mobile-theme-toggle" type="button"
                    class="w-full text-left py-2 theme-muted hover:theme-text flex items-center gap-2">
                    <span aria-hidden="true">
                        <svg class="theme-sun-icon w-4 h-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <svg class="theme-moon-icon w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                        </svg>
                    </span>
                    <span id="mobile-theme-label">{{ __('Theme') }}</span>
                </button>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" class="block py-2 text-rose-500 hover:text-rose-400"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>