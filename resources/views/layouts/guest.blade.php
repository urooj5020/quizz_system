<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BrainMatrix') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;700&family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .font-display {
            font-family: 'Space Grotesk', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body
    class="theme-shell antialiased overflow-x-hidden min-h-screen relative flex items-center justify-center px-4 transition-colors duration-300">

    <button id="theme-toggle" type="button"
        class="fixed top-6 right-6 z-50 inline-flex items-center gap-2 rounded-full border theme-border bg-white/70 px-3 py-2 text-sm font-medium transition hover:shadow-sm dark:bg-slate-900/70">
        <span aria-hidden="true">
            <svg class="theme-sun-icon w-4 h-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <svg class="theme-moon-icon w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
            </svg>
        </span>
        <span id="theme-toggle-label" class="hidden sm:inline text-sm">Dark</span>
    </button>

    <div
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-4xl h-[500px] bg-gradient-to-r from-indigo-500/15 via-purple-500/10 to-transparent blur-3xl pointer-events-none">
    </div>

    <div class="w-full sm:max-w-md relative z-10 flex flex-col items-center">


        <div
            class="w-full theme-panel backdrop-blur-xl border px-8 py-8 rounded-2xl shadow-2xl relative overflow-hidden">
            <div
                class="absolute top-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-indigo-500/30 to-transparent">
            </div>

            <div class="space-y-6">
                <div class="mb-8">
                    <a href="/" class="flex flex-col items-center gap-3 group">
                        <div
                            class="w-12 h-12 rounded-xl bg-white/80 border border-indigo-500/20 flex items-center justify-center relative shadow-lg shadow-indigo-500/10 group-hover:border-indigo-500/40 transition-all duration-300 dark:bg-slate-900/80">
                            <svg class="w-6 h-6 text-indigo-400 group-hover:scale-105 transition-transform duration-300"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                            <div
                                class="absolute inset-0 border border-indigo-500/20 rounded-xl animate-pulse scale-105 pointer-events-none">
                            </div>
                        </div>

                        <div class="text-center">
                            <span class="text-lg font-display font-bold tracking-tight theme-text block">
                                Brain<span class="text-indigo-500 font-light">Matrix</span>
                            </span>
                            <span
                                class="text-[9px] font-semibold tracking-widest uppercase theme-muted block mt-0.5">Sign
                                In Securely</span>
                        </div>
                    </a>
                </div>

                {{ $slot }}
            </div>
        </div>

        <div class="mt-6 text-center">
            <span class="text-[9px] font-semibold uppercase tracking-widest theme-muted">Your information is
                secure</span>
        </div>
    </div>

</body>

</html>