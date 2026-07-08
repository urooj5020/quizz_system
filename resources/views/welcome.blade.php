<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainMatrix — High-Throughput Assessment Grid</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            color-scheme: light;
            --bg: #ffffff;
            --panel: #f8f9fa;
            --panel-soft: #f3f4f6;
            --text: #1f2937;
            --muted: #6b7280;
            --border: #e5e7eb;
            --border-strong: #d1d5db;
            --accent: #4f46e5;
            --accent-soft: rgba(79, 70, 229, 0.12);
            --success: #059669;
            --danger: #dc2626;
            --shadow: rgba(0, 0, 0, 0.06);
        }

        html[data-theme='dark'],
        html.dark {
            color-scheme: dark;
            --bg: #050505;
            --panel: #0d0d0d;
            --panel-soft: #111111;
            --text: #f5f5f5;
            --muted: #a0a0a0;
            --border: #1a1a1a;
            --border-strong: #2a2a2a;
            --accent: #ffffff;
            --accent-soft: rgba(255, 255, 255, 0.08);
            --success: #34d399;
            --danger: #f87171;
            --shadow: rgba(0, 0, 0, 0.5);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg);
            color: var(--text);
            transition: background-color 0.25s ease, color 0.25s ease;
        }

        .font-display {
            font-family: 'Space Grotesk', sans-serif;
        }

        .theme-shell {
            background-color: var(--bg);
            color: var(--text);
        }

        .theme-panel {
            background-color: var(--panel);
            border-color: var(--border);
            box-shadow: 0 12px 30px var(--shadow);
        }

        .theme-panel-soft {
            background-color: var(--panel-soft);
            border-color: var(--border);
        }

        .theme-text {
            color: var(--text);
        }

        .theme-muted {
            color: var(--muted);
        }

        .theme-border {
            border-color: var(--border);
        }

        .theme-accent {
            color: var(--accent);
        }

        .theme-accent-soft {
            background-color: var(--accent-soft);
            color: var(--accent);
            border-color: var(--accent-soft);
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="theme-shell antialiased overflow-x-hidden transition-colors duration-300" x-data="{ mobileMenu: false }">

    <div
        class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-[550px] bg-gradient-to-b from-indigo-500/15 via-indigo-500/5 to-transparent blur-3xl pointer-events-none">
    </div>

    <header class="w-full border-b theme-border theme-panel-soft/80 backdrop-blur-md sticky top-0 z-50 px-6 md:px-8">
        <div class="max-w-7xl mx-auto h-20 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3 group">
                <div
                    class="w-8 h-8 rounded-lg bg-white/80 border border-indigo-500/20 flex items-center justify-center relative shadow-sm dark:bg-slate-900/80">
                    <svg class="w-4 h-4 text-indigo-500 group-hover:scale-110 transition-transform" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <span class="text-base font-display font-bold tracking-tight theme-text">Brain<span
                        class="text-indigo-500 font-light">Matrix</span></span>
            </a>

            <nav class="hidden md:flex items-center gap-8 text-xs font-semibold uppercase tracking-widest theme-muted">
                <a href="#quizzes" class="hover:theme-text transition-colors">Quizzes</a>
                <a href="#features" class="hover:theme-text transition-colors">Features</a>
                <a href="#benefits" class="hover:theme-text transition-colors">Why Quizzes</a>
                <a href="#how-it-works" class="hover:theme-text transition-colors">How It Works</a>
            </nav>

            <div class="flex items-center gap-3">
                <button id="theme-toggle" type="button"
                    class="inline-flex items-center gap-2 rounded-full border theme-border bg-white/70 px-3 py-2 text-sm font-medium transition hover:shadow-sm dark:bg-slate-900/70">
                    <span aria-hidden="true">
                        <svg class="theme-sun-icon w-4 h-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <svg class="theme-moon-icon w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                        </svg>
                    </span>
                    <span id="theme-toggle-label" class="text-sm">Dark</span>
                </button>

                @auth
                    <a href="{{ (auth()->user()->is_admin == '1') ? route('dashboard-overview') : route('dashboard') }}"
                        class="px-4 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-500 text-xs font-display font-medium text-white transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 text-xs font-semibold theme-text hover:bg-white/50 rounded-lg transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-4 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-500 text-xs font-semibold text-white transition">
                        Sign Up
                    </a>
                @endauth
            </div>
        </div>
    </header>


    <section class="relative pt-20 pb-16 px-8 max-w-7xl mx-auto text-center">

        <div class="max-w-4xl mx-auto space-y-6 relative z-10">

            <span
                class="inline-flex items-center gap-2 px-3 py-1 bg-indigo-100 border border-indigo-200 rounded-full text-[10px] font-semibold uppercase tracking-widest text-indigo-600 dark:bg-white/10 dark:border-white/20 dark:text-gray-300">

                <svg class="w-3 h-3 inline-block -mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
                Learn Better with Quizzes

            </span>

            <h1 class="text-4xl sm:text-5xl font-bold font-display tracking-tight theme-text leading-tight">

                Master any subject through<br>

                <span class="text-indigo-600 dark:text-white">smart quizzing</span>

            </h1>

            <p class="text-base theme-muted max-w-xl mx-auto font-light leading-relaxed">

                Take timed quizzes, see instant results, track your progress, and improve your knowledge with real-time
                feedback.

            </p>

            <div class="pt-6 flex flex-col sm:flex-row items-center justify-center gap-4">

                <a href="{{ route('register') }}"
                    class="w-full sm:w-auto px-8 py-3.5 bg-indigo-600 hover:bg-indigo-500 text-white font-display text-sm font-bold rounded-lg shadow-lg shadow-indigo-600/10 transition-all">

                    Get Started Free

                </a>

                <a href="#features"
                    class="w-full sm:w-auto px-8 py-3.5 bg-white/80 border theme-border text-theme-text hover:shadow-sm font-display text-sm font-bold rounded-lg transition-all dark:bg-slate-900/80">

                    Learn More

                </a>

            </div>

        </div>

    </section>


    <section id="quizzes" class="w-full py-24 px-6 md:px-8 relative overflow-hidden border-t theme-border">
        <div
            class="absolute top-1/2 right-1/4 w-[500px] h-[500px] bg-indigo-500/10 rounded-full blur-[120px] pointer-events-none dark:bg-indigo-500/[0.08]">
        </div>

        <div class="max-w-7xl mx-auto relative z-10 space-y-12">
            <div class="max-w-3xl text-left">
                <span
                    class="text-[10px] font-semibold tracking-widest uppercase text-indigo-600 dark:text-white block">Explore</span>
                <h2 class="text-3xl sm:text-4xl font-bold theme-text tracking-tight font-display mt-2">
                    Available Quizzes
                </h2>
                <p class="text-base theme-muted font-light mt-4 leading-relaxed">
                    Test your knowledge with our curated collection of quizzes.
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($quizzes as $quiz)
                    <div
                        class="group p-6 rounded-2xl theme-panel-soft border theme-border hover:shadow-md transition-all duration-300 flex flex-col">
                        <div class="flex items-start justify-between mb-4">
                            <span
                                class="text-[10px] font-semibold uppercase tracking-widest text-indigo-600 dark:text-white px-2.5 py-1 rounded-full bg-indigo-500/10 border border-indigo-500/20">
                                {{ $quiz->category }}
                            </span>
                            <div class="flex items-center gap-1.5 text-xs theme-muted">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $quiz->time }}
                            </div>
                        </div>

                        <h3 class="text-lg font-bold font-display theme-text tracking-wide mb-2 group-hover:text-indigo-500 transition-colors">
                            {{ $quiz->title }}
                        </h3>

                        <p class="text-sm theme-muted font-light leading-relaxed mb-6 line-clamp-2">
                            {{ $quiz->desc }}
                        </p>

                        <div class="mt-auto flex items-center justify-between">
                            <span class="text-xs theme-muted flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                {{ $quiz->questions_count }} {{ Str::plural('question', $quiz->questions_count) }}
                            </span>

                            
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16">
                        <svg class="w-12 h-12 mx-auto theme-muted mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2-2z" />
                        </svg>
                        <p class="text-lg font-display font-semibold theme-muted">No quizzes available yet</p>
                        <p class="text-sm theme-muted font-light mt-2">Check back soon for new quizzes!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>


    <section id="features" class="w-full py-24 px-6 md:px-8 relative overflow-hidden border-t theme-border">
        <div
            class="absolute inset-0 bg-[linear-gradient(to_right,var(--border)_1px,transparent_1px),linear-gradient(to_bottom,var(--border)_1px,transparent_1px)] bg-[size:4rem_4rem] opacity-20 pointer-events-none">
        </div>
        <div
            class="absolute top-1/2 left-1/4 w-[500px] h-[500px] bg-indigo-500/10 rounded-full blur-[120px] pointer-events-none dark:bg-indigo-500/[0.08]">
        </div>

        <div class="max-w-7xl mx-auto relative z-10 space-y-16">
            <div class="max-w-3xl text-left">
                <span
                    class="text-[10px] font-semibold tracking-widest uppercase text-indigo-600 dark:text-white block">Why
                    Choose Quizzes?</span>
                <h2 class="text-3xl sm:text-4xl font-bold theme-text tracking-tight font-display mt-2">
                    Learning that actually sticks
                </h2>
                <p class="text-base theme-muted font-light mt-4 leading-relaxed">
                    Quizzes test your knowledge actively, which helps your brain remember information much better than
                    just reading.
                </p>
            </div>

            <div class="grid lg:grid-cols-12 gap-4 text-left">
                <div
                    class="lg:col-span-7 p-8 rounded-2xl theme-panel-soft border flex flex-col justify-between min-h-[260px] hover:shadow-md transition-all duration-300">
                    <div class="flex justify-between items-start">
                        <div
                            class="text-[10px] font-semibold text-indigo-600 dark:text-white uppercase tracking-widest">
                            01. Learn</div>
                        <span class="w-1.5 h-1.5 rounded-full bg-indigo-500 animate-pulse"></span>
                    </div>
                    <div class="space-y-2 mt-8">
                        <h3 class="text-lg font-bold font-display theme-text tracking-wide">Test Yourself</h3>
                        <p class="text-sm theme-muted font-light leading-relaxed max-w-xl">
                            Forcing the brain to recall information makes memories stronger and lasts much longer than
                            passive learning.
                        </p>
                    </div>
                </div>

                <div
                    class="lg:col-span-5 p-8 rounded-2xl theme-panel-soft border flex flex-col justify-between min-h-[260px] hover:shadow-md transition-all duration-300">
                    <div class="text-[10px] font-semibold text-indigo-600 dark:text-white uppercase tracking-widest">
                        02. Track</div>
                    <div class="space-y-2 mt-8">
                        <h3 class="text-lg font-bold font-display theme-text tracking-wide">See Your Progress</h3>
                        <p class="text-sm theme-muted font-light leading-relaxed">
                            Get instant feedback on every answer to see what you know and what you need to study more.
                        </p>
                    </div>
                </div>

                <div
                    class="lg:col-span-5 p-8 rounded-2xl theme-panel-soft border flex flex-col justify-between min-h-[260px] hover:shadow-md transition-all duration-300">
                    <div class="text-[10px] font-semibold text-indigo-600 dark:text-white uppercase tracking-widest">
                        03. Improve</div>
                    <div class="space-y-2 mt-8">
                        <h3 class="text-lg font-bold font-display theme-text tracking-wide">Stay Motivated</h3>
                        <p class="text-sm theme-muted font-light leading-relaxed">
                            Earn badges, set goals, and watch your scores improve. Learning becomes fun and engaging!
                        </p>
                    </div>
                </div>

                <div
                    class="lg:col-span-7 p-8 rounded-2xl theme-panel-soft border flex flex-col justify-between min-h-[260px] hover:shadow-md transition-all duration-300">
                    <div class="flex justify-between items-start">
                        <div
                            class="text-[10px] font-semibold text-indigo-600 dark:text-white uppercase tracking-widest">
                            04. Master
                        </div>
                        <div
                            class="px-2 py-0.5 bg-emerald-100 border border-emerald-300 text-[9px] font-semibold text-emerald-700 rounded dark:bg-emerald-500/20 dark:border-emerald-500/30 dark:text-emerald-300">
                            Ready</div>
                    </div>
                    <div class="space-y-2 mt-8">
                        <h3 class="text-lg font-bold font-display theme-text tracking-wide">Build Confidence</h3>
                        <p class="text-sm theme-muted font-light leading-relaxed max-w-xl">
                            Practice under timed conditions helps you perform better in real exams and high-pressure
                            situations.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="benefits" class="w-full py-24 px-6 md:px-8 relative overflow-hidden border-t theme-border">
        <div
            class="absolute inset-0 bg-[radial-gradient(var(--border)_1px,transparent_1px)] [background-size:32px_32px] opacity-20 pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 right-1/4 w-[450px] h-[450px] bg-indigo-500/10 rounded-full blur-[100px] pointer-events-none dark:bg-indigo-500/[0.08]">
        </div>

        <div class="max-w-7xl mx-auto relative z-10 grid lg:grid-cols-12 gap-12 items-start text-left">
            <div class="lg:col-span-5 space-y-6 lg:sticky lg:top-28">
                <div>
                    <span
                        class="text-[10px] font-semibold tracking-widest uppercase text-indigo-600 dark:text-white block">How
                        It Works</span>
                    <h2 class="text-3xl font-bold theme-text tracking-tight font-display mt-2">Your Learning Dashboard
                    </h2>
                    <p class="text-base theme-muted font-light mt-2 leading-relaxed">
                        Track what you've learned, see your score history, and know exactly which topics need more
                        practice.
                    </p>
                </div>

                <div class="p-6 rounded-xl theme-panel-soft border space-y-4">
                    <div
                        class="flex justify-between items-center text-xs font-semibold theme-muted border-b theme-border pb-3">
                        <span>Your Progress</span>
                        <span class="text-emerald-600 dark:text-emerald-400 font-bold">Ready</span>
                    </div>

                    <div class="space-y-3 text-xs theme-muted">
                        <div class="flex justify-between items-center">
                            <span class="text-slate-400">Memory Consolidation Yield</span>
                            <span class="text-indigo-400 font-bold">+240%</span>
                        </div>
                        <div class="w-full bg-[#010204] h-1 rounded-full overflow-hidden">
                            <div class="bg-indigo-500 h-full w-[84%]"></div>
                        </div>

                        <div class="flex justify-between items-center pt-2">
                            <span class="text-slate-400">Recall Latency Reduction</span>
                            <span class="text-purple-400 font-bold">-48ms</span>
                        </div>
                        <div class="w-full bg-[#010204] h-1 rounded-full overflow-hidden">
                            <div class="bg-purple-500 h-full w-[68%]"></div>
                        </div>

                        <div class="flex justify-between items-center pt-2">
                            <span class="text-slate-400">Stress Tolerance Index</span>
                            <span class="text-pink-400 font-bold">99.4%</span>
                        </div>
                        <div class="w-full bg-[#010204] h-1 rounded-full overflow-hidden">
                            <div class="bg-pink-500 h-full w-[99.4%]"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7 space-y-4 font-sans">
                <div
                    class="p-6 rounded-xl theme-panel-soft border theme-border hover:shadow-md transition-all duration-200 flex gap-6 items-start group">
                    <div
                        class="w-8 h-8 rounded-lg bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center font-mono text-xs font-bold text-indigo-600 dark:text-white flex-shrink-0 group-hover:bg-indigo-500/20 transition-colors">
                        01</div>
                    <div class="space-y-1">
                        <h4 class="text-sm font-bold theme-text uppercase tracking-wider font-display">Better Memory
                            Retention</h4>
                        <p class="text-xs theme-muted font-light leading-relaxed">
                            Quizzes help your brain remember information better. When you try to recall an answer, your
                            memory becomes stronger and lasts much longer.
                        </p>
                    </div>
                </div>

                <div
                    class="p-6 rounded-xl theme-panel-soft border theme-border hover:shadow-md transition-all duration-200 flex gap-6 items-start group">
                    <div
                        class="w-8 h-8 rounded-lg bg-purple-500/10 border border-purple-500/20 flex items-center justify-center font-mono text-xs font-bold text-purple-600 dark:text-purple-400 flex-shrink-0 group-hover:bg-purple-500/20 transition-colors">
                        02</div>
                    <div class="space-y-1">
                        <h4 class="text-sm font-bold theme-text uppercase tracking-wider font-display">Know What You
                            Need to Learn</h4>
                        <p class="text-xs theme-muted font-light leading-relaxed">
                            Quizzes show you exactly what topics you understand and which ones need more practice. This
                            helps you focus your study time where it matters most.
                        </p>
                    </div>
                </div>

                <div
                    class="p-6 rounded-xl theme-panel-soft border theme-border hover:shadow-md transition-all duration-200 flex gap-6 items-start group">
                    <div
                        class="w-8 h-8 rounded-lg bg-pink-500/10 border border-pink-500/20 flex items-center justify-center font-mono text-xs font-bold text-pink-600 dark:text-pink-400 flex-shrink-0 group-hover:bg-pink-500/20 transition-colors">
                        03</div>
                    <div class="space-y-1">
                        <h4 class="text-sm font-bold theme-text uppercase tracking-wider font-display">Make Learning Fun
                        </h4>
                        <p class="text-xs theme-muted font-light leading-relaxed">
                            Earn points, compete with friends, and climb the leaderboard. Learning becomes exciting and
                            engaging instead of boring. Points and badges keep you motivated to study more.
                        </p>
                    </div>
                </div>

                <div
                    class="p-6 rounded-xl theme-panel-soft border theme-border hover:shadow-md transition-all duration-200 flex gap-6 items-start group">
                    <div
                        class="w-8 h-8 rounded-lg bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center font-mono text-xs font-bold text-emerald-600 dark:text-emerald-400 flex-shrink-0 group-hover:bg-emerald-500/20 transition-colors">
                        04</div>
                    <div class="space-y-1">
                        <h4 class="text-sm font-bold theme-text uppercase tracking-wider font-display">Practice Under
                            Time Pressure</h4>
                        <p class="text-xs theme-muted font-light leading-relaxed">
                            Timed quizzes help you get used to working fast. When you practice with time limits, you
                            feel less nervous during real exams and perform much better.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="metrics" class="w-full py-24 px-6 md:px-8 border-t theme-border">
        <div class="max-w-7xl mx-auto">
            <div class="mb-16 text-left">
                <span
                    class="text-[10px] font-semibold tracking-widest uppercase text-indigo-600 dark:text-white block">Why
                    Students Love It</span>
                <h2 class="text-3xl font-bold theme-text tracking-tight font-display mt-2">Real Results from Real
                    Students</h2>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 text-left">
                <div class="p-6 rounded-xl theme-panel-soft border theme-border hover:shadow-md transition-all">
                    <span class="text-[9px] font-semibold uppercase tracking-widest theme-muted block mb-4">Score
                        Improvement</span>
                    <div class="text-3xl font-display font-bold text-indigo-600 dark:text-white mb-1">+42%</div>
                    <p class="text-xs theme-muted font-light leading-relaxed">Students who use our quizzes improve their
                        test scores significantly in just 3 weeks.</p>
                </div>
                <div class="p-6 rounded-xl theme-panel-soft border theme-border hover:shadow-md transition-all">
                    <span class="text-[9px] font-semibold uppercase tracking-widest theme-muted block mb-4">Students
                        Love It</span>
                    <div class="text-3xl font-display font-bold text-purple-600 dark:text-purple-400 mb-1">9.8/10</div>
                    <p class="text-xs theme-muted font-light leading-relaxed">Students rate their learning experience
                        highly and come back regularly to practice.</p>
                </div>
                <div class="p-6 rounded-xl theme-panel-soft border theme-border hover:shadow-md transition-all">
                    <span class="text-[9px] font-semibold uppercase tracking-widest theme-muted block mb-4">Time
                        Saved</span>
                    <div class="text-3xl font-display font-bold text-pink-600 dark:text-pink-400 mb-1">5 Hours</div>
                    <p class="text-xs theme-muted font-light leading-relaxed">Smart quizzes help you study smarter, not
                        longer. Save 5 hours per week on homework.</p>
                </div>
                <div class="p-6 rounded-xl theme-panel-soft border theme-border hover:shadow-md transition-all">
                    <span class="text-[9px] font-semibold uppercase tracking-widest theme-muted block mb-4">Works for
                        Everyone</span>
                    <div class="text-3xl font-display font-bold text-emerald-600 dark:text-emerald-400 mb-1">100%</div>
                    <p class="text-xs theme-muted font-light leading-relaxed">Whether you're preparing for a big test or
                        just learning a new topic, our quizzes work.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="max-w-4xl mx-auto pt-12 pb-6 px-4">
        <div class="border-t theme-border pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-left">

            <div class="space-y-1 select-none">
                <span class="text-[10px] font-semibold tracking-widest uppercase text-indigo-600 dark:text-white block">
                    Teacher Access
                </span>
                <p class="text-xs theme-muted">
                    Teachers can create quizzes, track student progress, and manage classes.
                </p>
            </div>

            <a href="{{ route('login') }}"
                class="inline-flex items-center gap-2 px-3.5 py-2.5 rounded-lg bg-indigo-600 hover:bg-indigo-500 border border-indigo-600 hover:border-indigo-500 text-[11px] font-semibold uppercase tracking-wider text-white transition-all duration-200 group shadow-md shadow-indigo-600/20">
                <svg class="w-3.5 h-3.5 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2.2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                </svg>
                Teacher Login
            </a>

        </div>
    </section>
    <footer class="w-full border-t theme-border py-10 theme-panel-soft px-6 md:px-8">
        <div class="max-w-7xl mx-auto text-center">
            <span class="text-[10px] font-semibold uppercase tracking-widest theme-muted">© 2024 BrainMatrix. Master
                your learning with smarter quizzes.</span>
        </div>
    </footer>

    <script>
        const applyTheme = (theme) => {
            document.documentElement.setAttribute("data-theme", theme);
            document.documentElement.classList.toggle("dark", theme === "dark");
            localStorage.setItem("theme", theme);

            const isDark = theme === "dark";

            document.querySelectorAll("#theme-toggle-label, #mobile-theme-label").forEach((el) => {
                if (el) el.textContent = isDark ? "Light" : "Dark";
            });

            document.querySelectorAll(".theme-sun-icon").forEach((el) => el.classList.toggle("hidden", isDark));
            document.querySelectorAll(".theme-moon-icon").forEach((el) => el.classList.toggle("hidden", !isDark));
        };

        const initializeTheme = () => {
            const savedTheme = localStorage.getItem("theme");
            const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
            const theme = savedTheme || (prefersDark ? "dark" : "light");

            applyTheme(theme);

            document.querySelectorAll("#theme-toggle, #mobile-theme-toggle").forEach((toggle) => {
                if (toggle) {
                    toggle.addEventListener("click", () => {
                        const currentTheme =
                            document.documentElement.getAttribute("data-theme") === "dark" ? "light" : "dark";
                        applyTheme(currentTheme);
                    });
                }
            });
        };

        document.addEventListener("DOMContentLoaded", initializeTheme);
    </script>
</body>

</html>