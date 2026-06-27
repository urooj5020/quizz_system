<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BrainMatrix Admin') }} — Control Panel</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;700&family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

   
</head>

<body class="bg-[#050507] text-zinc-100 font-sans antialiased selection:bg-[#10b981] min-h-screen flex flex-col overflow-hidden" x-data="{ mobileSidebar: false }">

    @include('admin.components.topbar')

    <div class="flex flex-1 h-[calc(100vh-4rem)] relative overflow-hidden">

        @include('admin.components.sidebar')

        <main class="flex-1 h-full overflow-y-auto p-6 md:p-10 pl-72 md:pl-76 lg:pl-80 relative">
            
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-[#10b981]/5 rounded-full blur-[150px] pointer-events-none"></div>
            <div class="absolute bottom-0 left-1/3 w-96 h-96 bg-[#3b82f6]/5 rounded-full blur-[150px] pointer-events-none"></div>

            <div class="max-w-7xl mx-auto relative z-10">
                @yield('content')
            </div>

        </main>
    </div>

</body>

</html>