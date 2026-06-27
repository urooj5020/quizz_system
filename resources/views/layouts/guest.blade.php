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
    class="bg-[#010204] text-slate-300 antialiased overflow-x-hidden min-h-screen relative flex items-center justify-center px-4">

    <div
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-4xl h-[500px] bg-gradient-to-r from-indigo-950/15 via-purple-950/5 to-transparent blur-3xl pointer-events-none">
    </div>

    <div class="w-full sm:max-w-md relative z-10 flex flex-col items-center">


        <div
            class="w-full bg-[#04060c]/60 backdrop-blur-xl border border-slate-900 px-8 py-8 rounded-2xl shadow-2xl relative overflow-hidden">
            <div
                class="absolute top-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-indigo-500/30 to-transparent">
            </div>

            <div class="space-y-6">
                <div class="mb-8">
                    <a href="/" class="flex flex-col items-center gap-3 group">
                        <div
                            class="w-12 h-12 rounded-xl bg-[#07090e] border border-indigo-500/20 flex items-center justify-center relative shadow-lg shadow-indigo-500/10 group-hover:border-indigo-500/40 transition-all duration-300">
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
                            <span class="text-lg font-display font-bold tracking-tight text-white block">
                                Brain<span class="text-indigo-400 font-light">Matrix</span>
                            </span>
                            <span
                                class="text-[9px] font-mono tracking-[0.25em] uppercase text-slate-500 block mt-0.5">//
                                SECURITY_GATEWAY</span>
                        </div>
                    </a>
                </div>

                {{ $slot }}
            </div>
        </div>

        <div class="mt-6 text-center">
            <span class="text-[9px] font-mono uppercase tracking-widest text-slate-600">// Secure encrypted auth
                instance connection: stable</span>
        </div>
    </div>

</body>

</html>