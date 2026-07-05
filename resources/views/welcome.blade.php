<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainMatrix — High-Throughput Assessment Grid</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap"
        rel="stylesheet">
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

<body class="bg-[#010204] text-slate-300 antialiased overflow-x-hidden" x-data="{ matrixNode: 'builder' }">

    <div
        class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-[550px] bg-gradient-to-b from-indigo-950/20 via-slate-950/0 to-transparent blur-3xl pointer-events-none">
    </div>

    <header class="w-full border-b border-slate-900 bg-[#010204]/80 backdrop-blur-md sticky top-0 z-50 px-6 md:px-8">
        <div class="max-w-7xl mx-auto h-20 flex items-center justify-between">
            <a href="#" class="flex items-center gap-3 group">
                <div
                    class="w-8 h-8 rounded-lg bg-[#07090e] border border-indigo-500/20 flex items-center justify-center relative shadow-lg shadow-indigo-500/5">
                    <svg class="w-4 h-4 text-indigo-400 group-hover:scale-110 transition-transform" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                    <div
                        class="absolute inset-0 border border-indigo-500/30 rounded-lg animate-ping opacity-10 scale-75 pointer-events-none">
                    </div>
                </div>
                <span class="text-base font-display font-bold tracking-tight text-white">Brain<span
                        class="text-indigo-400 font-light">Matrix</span></span>
            </a>

            <nav
                class="hidden md:flex items-center gap-8 text-xs font-semibold uppercase tracking-widest text-slate-400">
                <a href="#advantages-core" class="hover:text-white transition-colors">Matrix Advantages</a>
                <a href="#advantages-dashboard" class="hover:text-white transition-colors">Core Diagnostics</a>
                <a href="#metrics" class="hover:text-white transition-colors">Performance Analytics</a>
            </nav>

            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ route('dashboard') }}"
                        class="px-5 py-2.5 rounded-lg bg-[#07090e] border border-indigo-500/30 text-xs font-display font-medium tracking-wide text-indigo-300 hover:bg-indigo-500/10 transition-all">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="text-xs font-mono tracking-wider uppercase text-slate-400 hover:text-white transition-all">Console
                        Access</a>
                    <a href="{{ route('register') }}"
                        class="px-5 py-2.5 rounded-lg bg-[#07090e] border border-indigo-500/30 text-xs font-display font-medium tracking-wide text-indigo-300 hover:bg-indigo-500/10 transition-all">
                        Initialize Core
                    </a>
                @endauth
            </div>
        </div>
    </header>


    <section class="relative pt-20 pb-16 px-8 max-w-7xl mx-auto text-center">

        <div class="max-w-4xl mx-auto space-y-6 relative z-10">

            <span
                class="inline-flex items-center gap-2 px-3 py-1 bg-[#06080d] border border-indigo-900/40 rounded-full text-[10px] font-mono uppercase tracking-widest text-indigo-400">

                ⚡ System Diagnostics // Execution Active

            </span>

            <h1 class="text-4xl sm:text-6xl font-bold font-display tracking-tight text-white leading-[1.15]">

                High-performance evaluation grid <br>

                <span
                    class="bg-gradient-to-r from-slate-200 via-slate-400 to-indigo-900 bg-clip-text text-transparent font-light">engineered

                    for automated testing scale.</span>

            </h1>

            <p class="text-sm text-slate-400 max-w-xl mx-auto font-light leading-relaxed">

                BrainMatrix orchestrates instant multi-user evaluations, precise real-time ranking matrices, and

                anti-cheat infrastructure from a centralized console.

            </p>

            <div class="pt-6 flex flex-col sm:flex-row items-center justify-center gap-4">

                <a href="#"
                    class="w-full sm:w-auto px-8 py-3.5 bg-indigo-600 hover:bg-indigo-500 text-white font-display text-xs font-bold uppercase tracking-wider rounded-lg shadow-lg shadow-indigo-600/10 transition-all">

                    Deploy Assessment Matrix

                </a>

                <a href="#features"
                    class="w-full sm:w-auto px-8 py-3.5 bg-[#05060b] border border-slate-900 text-slate-400 hover:text-white font-display text-xs font-bold uppercase tracking-wider rounded-lg transition-all">

                    Review Architecture

                </a>

            </div>

        </div>

    </section>


    <section id="advantages-core"
        class="w-full py-24 px-6 md:px-8 bg-[#010204] relative overflow-hidden border-t border-slate-900/60">
        <div
            class="absolute inset-0 bg-[linear-gradient(to_right,#080a10_1px,transparent_1px),linear-gradient(to_bottom,#080a10_1px,transparent_1px)] bg-[size:4rem_4rem] opacity-30 pointer-events-none">
        </div>
        <div
            class="absolute top-1/2 left-1/4 w-[500px] h-[500px] bg-indigo-500/[0.02] rounded-full blur-[120px] pointer-events-none">
        </div>

        <div class="max-w-7xl mx-auto relative z-10 space-y-16">
            <div class="max-w-3xl text-left">
                <span class="text-[10px] font-mono font-bold tracking-[0.4em] uppercase text-indigo-400 block">//
                    COGNITIVE OVERCLOCKING</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-white tracking-tight font-display mt-2">
                    Why Structured Quizzing Accelerates Brain Performance
                </h2>
                <p class="text-sm text-slate-400 font-light mt-4 leading-relaxed">
                    Testing is not just a method of measurement; it is an active cognitive catalyst. Breaking
                    information down into retrieval matrices triggers neurological optimization pathways.
                </p>
            </div>

            <div class="grid lg:grid-cols-12 gap-4 text-left">
                <div
                    class="lg:col-span-7 p-8 rounded-2xl bg-[#05070f]/60 border border-slate-900 flex flex-col justify-between min-h-[260px] hover:border-indigo-500/20 transition-all duration-300 relative group overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-indigo-500/[0.01] blur-xl rounded-full pointer-events-none">
                    </div>
                    <div class="flex justify-between items-start">
                        <div class="text-[10px] font-mono text-slate-600 uppercase tracking-widest">[PROC_TYPE_01]</div>
                        <span class="w-1.5 h-1.5 rounded-full bg-indigo-500 animate-pulse"></span>
                    </div>
                    <div class="space-y-2 mt-8">
                        <h3 class="text-lg font-bold font-display text-white tracking-wide uppercase">Active Retrieval
                            Optimization</h3>
                        <p class="text-xs text-slate-400 font-light leading-relaxed max-w-xl">
                            Forcing the brain to pull information from memory reserves hardwires neural circuits far
                            deeper than passive reading. Every quiz session creates an instant memory anchor,
                            drastically lowering future recall latency.
                        </p>
                    </div>
                </div>

                <div
                    class="lg:col-span-5 p-8 rounded-2xl bg-[#05070f]/60 border border-slate-900 flex flex-col justify-between min-h-[260px] hover:border-purple-500/20 transition-all duration-300 group">
                    <div class="text-[10px] font-mono text-slate-600 uppercase tracking-widest">[DIAG_MAPPING]</div>
                    <div class="space-y-2 mt-8">
                        <h3 class="text-lg font-bold font-display text-white tracking-wide uppercase">Precision
                            Blindspot Isolation</h3>
                        <p class="text-xs text-slate-400 font-light leading-relaxed">
                            Immediate evaluation matrices point out exact cognitive blindspots instantly. Instead of
                            reviewing broad data sets blindly, users isolate the weak failure nodes in their knowledge
                            layer.
                        </p>
                    </div>
                </div>

                <div
                    class="lg:col-span-5 p-8 rounded-2xl bg-[#05070f]/60 border border-slate-900 flex flex-col justify-between min-h-[260px] hover:border-pink-500/20 transition-all duration-300 group">
                    <div class="text-[10px] font-mono text-slate-600 uppercase tracking-widest">[RETENTION_DRIVE]</div>
                    <div class="space-y-2 mt-8">
                        <h3 class="text-lg font-bold font-display text-white tracking-wide uppercase">Gamified Focus
                            Stacking</h3>
                        <p class="text-xs text-slate-400 font-light leading-relaxed">
                            Combining strict execution counters, real-time scoreboards, and milestone trackers turns
                            boring evaluation structures into highly engaging game cycles, unlocking long-term visual
                            focus.
                        </p>
                    </div>
                </div>

                <div
                    class="lg:col-span-7 p-8 rounded-2xl bg-[#05070f]/60 border border-slate-900 flex flex-col justify-between min-h-[260px] hover:border-emerald-500/20 transition-all duration-300 relative group overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/[0.01] blur-xl rounded-full pointer-events-none">
                    </div>
                    <div class="flex justify-between items-start">
                        <div class="text-[10px] font-mono text-slate-600 uppercase tracking-widest">[STRESS_BAL_SYS]
                        </div>
                        <div
                            class="px-2 py-0.5 bg-[#0b1313] border border-emerald-900/40 text-[9px] font-mono text-emerald-400 rounded">
                            CALIBRATED</div>
                    </div>
                    <div class="space-y-2 mt-8">
                        <h3 class="text-lg font-bold font-display text-white tracking-wide uppercase">High-Pressure
                            Runtime Adaptation</h3>
                        <p class="text-xs text-slate-400 font-light leading-relaxed max-w-xl">
                            Simulating timed constraints conditions the brain to make decisions quickly and accurately
                            under stress. This mitigates exam anxiety completely by turning high-stakes pressure into a
                            normal, familiar environment.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="advantages-dashboard"
        class="w-full py-24 px-6 md:px-8 bg-[#010204] relative overflow-hidden border-t border-slate-900/60">
        <div
            class="absolute inset-0 bg-[radial-gradient(#111524_1px,transparent_1px)] [background-size:32px_32px] opacity-40 pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 right-1/4 w-[450px] h-[450px] bg-indigo-500/[0.02] rounded-full blur-[100px] pointer-events-none">
        </div>

        <div class="max-w-7xl mx-auto relative z-10 grid lg:grid-cols-12 gap-12 items-start text-left">
            <div class="lg:col-span-5 space-y-6 lg:sticky lg:top-28">
                <div>
                    <span class="text-[10px] font-mono font-bold tracking-[0.4em] uppercase text-indigo-400 block">//
                        TELEMETRY_MATRIX</span>
                    <h2 class="text-3xl font-bold text-white tracking-tight font-display mt-2">Cognitive Core
                        Diagnostics</h2>
                    <p class="text-xs text-slate-500 font-light mt-2 leading-relaxed">
                        Data visualization of neurological performance yield under continuous retrieval execution loops.
                    </p>
                </div>

                <div class="p-6 rounded-xl bg-[#04060c] border border-slate-900 space-y-4">
                    <div
                        class="flex justify-between items-center text-xs font-mono text-slate-500 border-b border-slate-950 pb-3">
                        <span>CORE // BRAIN_LOAD_TEST</span>
                        <span class="text-emerald-400 font-bold">OPTIMIZED</span>
                    </div>

                    <div class="space-y-3 font-mono text-xs">
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
                    class="p-6 rounded-xl bg-[#04060c]/40 border border-slate-900/80 hover:border-slate-800 transition-colors duration-200 flex gap-6 items-start group">
                    <div
                        class="w-8 h-8 rounded-lg bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center font-mono text-xs font-bold text-indigo-400 flex-shrink-0 group-hover:bg-indigo-500/20 transition-colors">
                        01</div>
                    <div class="space-y-1">
                        <h4 class="text-sm font-bold text-white uppercase tracking-wider font-mono">Neural Storage
                            Consolidation</h4>
                        <p class="text-xs text-slate-400 font-light leading-relaxed">
                            Quizzing fires intensive electrical impulses across your brain's synapses, converting
                            fragile short-term data packets into permanent neurological long-term storage nodes
                            effortlessly.
                        </p>
                    </div>
                </div>

                <div
                    class="p-6 rounded-xl bg-[#04060c]/40 border border-slate-900/80 hover:border-slate-800 transition-colors duration-200 flex gap-6 items-start group">
                    <div
                        class="w-8 h-8 rounded-lg bg-purple-500/10 border border-purple-500/20 flex items-center justify-center font-mono text-xs font-bold text-purple-400 flex-shrink-0 group-hover:bg-purple-500/20 transition-colors">
                        02</div>
                    <div class="space-y-1">
                        <h4 class="text-sm font-bold text-white uppercase tracking-wider font-mono">Dynamic Node
                            Validation</h4>
                        <p class="text-xs text-slate-400 font-light leading-relaxed">
                            Continuous testing filters out false confidence signals. By isolating exactly what you fail
                            to remember, the engine immediately flags broken knowledge configurations so you can debug
                            structural blindspots instantly.
                        </p>
                    </div>
                </div>

                <div
                    class="p-6 rounded-xl bg-[#04060c]/40 border border-slate-900/80 hover:border-slate-800 transition-colors duration-200 flex gap-6 items-start group">
                    <div
                        class="w-8 h-8 rounded-lg bg-pink-500/10 border border-pink-500/20 flex items-center justify-center font-mono text-xs font-bold text-pink-400 flex-shrink-0 group-hover:bg-pink-500/20 transition-colors">
                        03</div>
                    <div class="space-y-1">
                        <h4 class="text-sm font-bold text-white uppercase tracking-wider font-mono">Attention Loop
                            Stacking</h4>
                        <p class="text-xs text-slate-400 font-light leading-relaxed">
                            Using structured points calculations, points multipliers, and active group rankings turns
                            heavy learning materials into high-engagement competitive gaming sprints, wiping out mental
                            drift completely.
                        </p>
                    </div>
                </div>

                <div
                    class="p-6 rounded-xl bg-[#04060c]/40 border border-slate-900/80 hover:border-slate-800 transition-colors duration-200 flex gap-6 items-start group">
                    <div
                        class="w-8 h-8 rounded-lg bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center font-mono text-xs font-bold text-emerald-400 flex-shrink-0 group-hover:bg-emerald-500/20 transition-colors">
                        04</div>
                    <div class="space-y-1">
                        <h4 class="text-sm font-bold text-white uppercase tracking-wider font-mono">High-Pressure
                            Calibration</h4>
                        <p class="text-xs text-slate-400 font-light leading-relaxed">
                            By simulating structured micro-timers natively inside practice sessions, the brain
                            normalizes rapid problem-solving under stress. This conditions your mind to wipe out exam
                            day performance anxieties.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="metrics" class="w-full py-24 px-6 md:px-8 border-t border-slate-900/60">
        <div class="max-w-7xl mx-auto">
            <div class="mb-16 text-left">
                <span class="text-[10px] font-mono font-bold tracking-[0.4em] uppercase text-indigo-400 block">System
                    Logs</span>
                <h2 class="text-2xl font-bold text-white tracking-tight font-display mt-1">Engine Metrics</h2>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 text-left">
                <div
                    class="p-6 rounded-xl bg-[#030408]/60 border border-slate-900 hover:border-slate-800 transition-all">
                    <span class="text-[9px] font-mono uppercase tracking-widest text-slate-500 block mb-4">Calculation
                        Latency</span>
                    <div class="text-3xl font-display font-bold text-white mb-1">0ms</div>
                    <p class="text-xs text-slate-400 font-light leading-relaxed">No processing overhead or state
                        mutation frames dropping during execution cascades.</p>
                </div>
                <div
                    class="p-6 rounded-xl bg-[#030408]/60 border border-slate-900 hover:border-slate-800 transition-all">
                    <span class="text-[9px] font-mono uppercase tracking-widest text-slate-500 block mb-4">Engagement
                        Spike</span>
                    <div class="text-3xl font-display font-bold text-indigo-400 mb-1">+40%</div>
                    <p class="text-xs text-slate-400 font-light leading-relaxed">Continuous quiz challenge dynamics
                        enhance target metrics tracking smoothly.</p>
                </div>
                <div
                    class="p-6 rounded-xl bg-[#030408]/60 border border-slate-900 hover:border-slate-800 transition-all">
                    <span class="text-[9px] font-mono uppercase tracking-widest text-slate-500 block mb-4">Operational
                        Overhead</span>
                    <div class="text-3xl font-display font-bold text-white mb-1">0.00</div>
                    <p class="text-xs text-slate-400 font-light leading-relaxed">Automated scoring parameters remove
                        evaluation administration constraints completely.</p>
                </div>
                <div
                    class="p-6 rounded-xl bg-[#030408]/60 border border-slate-900 hover:border-slate-800 transition-all">
                    <span class="text-[9px] font-mono uppercase tracking-widest text-slate-500 block mb-4">Grid
                        Adaptability</span>
                    <div class="text-3xl font-display font-bold text-white mb-1">100%</div>
                    <p class="text-xs text-slate-400 font-light leading-relaxed">Fluid component sizing constraints map
                        perfectly across client terminals or mobile viewports.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="max-w-4xl mx-auto pt-12 pb-6 px-4">
        <div
            class="border-t border-zinc-900/60 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-left">

            <div class="space-y-1 select-none">
                <span class="text-[9px] font-mono font-bold tracking-[0.3em] uppercase text-zinc-600 block">
                    // SECURE_ACCESS_PORTAL
                </span>
                <p class="text-xs font-mono text-zinc-500">
                    Authorized system engineering personnel only. Access matrices require elevated tokens.
                </p>
            </div>

            <a href="{{ route('login') }}"
                class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl bg-[#04060c]/20 hover:bg-[#07090e] border border-zinc-900 hover:border-indigo-500/30 text-[11px] font-mono uppercase tracking-wider text-zinc-500 hover:text-indigo-400 font-bold transition-all duration-200 group shadow-md shadow-black/20">
                <svg class="w-3.5 h-3.5 text-zinc-600 group-hover:text-indigo-400 transition-colors" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                </svg>
                Login as Admin
            </a>

        </div>
    </section>
    <footer class="w-full border-t border-slate-950 py-10 bg-[#010204] px-6 md:px-8">
        <div class="max-w-7xl mx-auto text-center">
            <span class="text-[10px] font-mono uppercase tracking-widest text-slate-600">// BrainMatrix Console
                Instance. Network Nodes Synced.</span>
        </div>
    </footer>

</body>

</html>