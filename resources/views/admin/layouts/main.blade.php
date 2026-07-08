<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BrainMatrix Admin') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;700&family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }
        main { overflow-y: auto !important; }
    </style>
</head>

<body class="bg-admin-surface text-admin-fg font-sans antialiased selection:bg-emerald-500 min-h-screen flex flex-col overflow-hidden transition-colors duration-300" x-data="{ mobileSidebar: false }">

    @include('admin.components.topbar')

    <div class="flex h-[calc(100vh-4rem)] w-full relative overflow-hidden">

        @include('admin.components.sidebar')

        <main class="flex-1 min-h-0 max-h-full overflow-y-auto p-6 md:p-10 pl-72 md:pl-76 lg:pl-80 relative">
            
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-white/[0.02] rounded-full blur-[150px] pointer-events-none"></div>
            <div class="absolute bottom-0 left-1/3 w-96 h-96 bg-white/[0.01] rounded-full blur-[150px] pointer-events-none"></div>

            <div class="max-w-7xl mx-auto relative z-10">
                @yield('content')
            </div>

        </main>
    </div>

</body>

</html>