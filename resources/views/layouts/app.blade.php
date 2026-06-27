<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'BrainMatrix Console') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;700&family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
            .font-display { font-family: 'Space Grotesk', sans-serif; }
            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body class="bg-[#010204] text-slate-300 antialiased overflow-x-hidden min-h-screen">

        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-[450px] bg-gradient-to-b from-indigo-950/15 via-transparent to-transparent blur-3xl pointer-events-none"></div>

        @include('layouts.navigation')

        <div class="w-full space-y-8 py-8">
            
            @isset($header)
                <header class="w-full px-6 md:px-8">
                    <div class="max-w-7xl mx-auto border-b border-slate-900 pb-6">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main class="w-full px-6 md:px-8">
                <div class="max-w-7xl mx-auto">
                    {{ $slot }}
                </div>
            </main>
        </div>

    </body>
</html>