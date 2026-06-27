<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-2">
            <div>
                <span class="text-[10px] font-mono font-bold tracking-[0.4em] uppercase text-indigo-400 block">// DATA_CONSOLE_NODE</span>
                <h1 class="text-2xl font-bold tracking-tight text-white font-display mt-1">Assessment Dashboard</h1>
            </div>
            <span class="text-[10px] font-mono text-slate-600 uppercase tracking-widest">// session_node: authenticated</span>
        </div>
    </x-slot>

    <div class="space-y-12">
        
        <section class="space-y-4">
            <div class="text-left">
                <span class="text-[9px] font-mono tracking-widest text-slate-500 uppercase">// METRIC_COUNTERS</span>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-5 gap-4">
                
                <div class="p-5 rounded-xl bg-[#04060c]/40 border border-slate-900 hover:border-slate-800 transition-all">
                    <span class="text-[9px] font-mono uppercase tracking-widest text-slate-500 block mb-2">Total Available</span>
                    <div class="text-2xl font-display font-bold text-white">12</div>
                    <p class="text-[10px] text-slate-600 mt-1">Active evaluation models</p>
                </div>

                <div class="p-5 rounded-xl bg-[#04060c]/40 border border-slate-900 hover:border-slate-800 transition-all">
                    <span class="text-[9px] font-mono uppercase tracking-widest text-slate-500 block mb-2">Total Attempted</span>
                    <div class="text-2xl font-display font-bold text-indigo-400">08</div>
                    <p class="text-[10px] text-slate-600 mt-1">Completed matrices</p>
                </div>

                <div class="p-5 rounded-xl bg-[#04060c]/40 border border-slate-900 hover:border-slate-800 transition-all">
                    <span class="text-[9px] font-mono uppercase tracking-widest text-slate-500 block mb-2">Average Score</span>
                    <div class="text-2xl font-display font-bold text-white">84.2%</div>
                    <p class="text-[10px] text-slate-600 mt-1">Mean competency yield</p>
                </div>

                <div class="p-5 rounded-xl bg-[#04060c]/40 border border-slate-900 hover:border-slate-800 transition-all">
                    <span class="text-[9px] font-mono uppercase tracking-widest text-slate-500 block mb-2">Passed Units</span>
                    <div class="text-2xl font-display font-bold text-emerald-400">07</div>
                    <p class="text-[10px] text-emerald-500/50 font-mono text-[9px] mt-1">✔ SUCCESS_THRESHOLD</p>
                </div>

                <div class="p-5 rounded-xl bg-[#04060c]/40 border border-slate-900 hover:border-slate-800 transition-all col-span-2 lg:col-span-1">
                    <span class="text-[9px] font-mono uppercase tracking-widest text-slate-500 block mb-2">Failed Units</span>
                    <div class="text-2xl font-display font-bold text-pink-500">01</div>
                    <p class="text-[10px] text-pink-500/50 font-mono text-[9px] mt-1">⚠️ ANOMALY_DETECTED</p>
                </div>

            </div>
        </section>

        <section class="space-y-4">
            <div class="text-left border-b border-slate-900 pb-2">
                <span class="text-[9px] font-mono tracking-widest text-indigo-400 uppercase">// RECENT_HISTORICAL_LOG</span>
            </div>
            
            <div class="p-6 rounded-2xl bg-[#04060c]/60 border border-slate-900 flex flex-col md:flex-row justify-between items-start md:items-center gap-6 relative overflow-hidden group hover:border-slate-800 transition-all">
                <div class="absolute top-0 left-0 w-32 h-32 bg-indigo-500/[0.01] blur-2xl pointer-events-none"></div>
                
                <div class="space-y-2 max-w-2xl text-left">
                    <div class="flex items-center gap-3">
                        <span class="px-2 py-0.5 bg-[#0b0e17] border border-indigo-900/40 text-[9px] font-mono text-indigo-400 rounded">LAST_ATTEMPT</span>
                        <h3 class="text-base font-bold text-white uppercase tracking-wide font-display">Advanced System Engineering Architecture</h3>
                    </div>
                    <p class="text-xs text-slate-400 font-light leading-relaxed">
                        Evaluates core algorithmic parameters, structural design patterns, data caching strategies, and concurrency optimization structures across high-throughput pipeline infrastructures.
                    </p>
                </div>

                <div class="flex items-center gap-6 w-full md:w-auto border-t border-slate-900/60 md:border-none pt-4 md:pt-0 justify-between md:justify-end">
                    <div class="text-left md:text-right font-mono">
                        <span class="text-[10px] text-slate-500 uppercase block tracking-wider">Final Grade</span>
                        <span class="text-lg font-bold text-emerald-400">92/100</span>
                    </div>
                    <a href="#" class="px-4 py-2.5 rounded-lg bg-[#07090e] border border-indigo-500/30 text-xs font-display font-medium tracking-wide text-indigo-300 hover:bg-indigo-500/10 transition-all flex-shrink-0">
                        Re-Start Quiz
                    </a>
                </div>
            </div>
        </section>

        <section class="space-y-4">
            <div class="text-left border-b border-slate-900 pb-2">
                <span class="text-[9px] font-mono tracking-widest text-slate-500 uppercase">// AVAILABLE_EVALUATION_MODELS</span>
            </div>
            
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 text-left">
                
                <div class="p-6 rounded-xl bg-[#04060c]/30 border border-slate-900 hover:border-slate-800 flex flex-col justify-between min-h-[280px] transition-all duration-200 group relative">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-indigo-500/[0.02] to-transparent pointer-events-none"></div>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between items-center text-[10px] font-mono">
                            <span class="text-indigo-400 uppercase font-medium tracking-wider">[Back-End Development]</span>
                            <span class="text-slate-600">2026-06-25</span>
                        </div>
                        <div class="space-y-1">
                            <h4 class="text-base font-bold text-white uppercase tracking-wide font-display group-hover:text-indigo-400 transition-colors">Laravel Application Structures</h4>
                            <p class="text-xs text-slate-400 font-light leading-normal line-clamp-2">Test understanding of Service Providers, Middleware layers, and Service Container binding mechanics.</p>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-950 flex justify-between items-center mt-6">
                        <span class="text-[10px] font-mono text-slate-500">Total Items: <span class="text-slate-300 font-bold">10 Questions</span></span>
                        <a href="#" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white font-display text-xs font-bold uppercase tracking-wider rounded-md shadow-lg shadow-indigo-600/10 transition-all">
                            Start Quiz
                        </a>
                    </div>
                </div>

                <div class="p-6 rounded-xl bg-[#04060c]/30 border border-slate-900 hover:border-slate-800 flex flex-col justify-between min-h-[280px] transition-all duration-200 group relative">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-purple-500/[0.02] to-transparent pointer-events-none"></div>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between items-center text-[10px] font-mono">
                            <span class="text-purple-400 uppercase font-medium tracking-wider">[Data Structures]</span>
                            <span class="text-slate-600">2026-06-24</span>
                        </div>
                        <div class="space-y-1">
                            <h4 class="text-base font-bold text-white uppercase tracking-wide font-display group-hover:text-purple-400 transition-colors">Discrete Algorithmic Logic</h4>
                            <p class="text-xs text-slate-400 font-light leading-normal line-clamp-2">Examine complex tree implementations, graphing structures, optimization trees, and matrix mapping vectors.</p>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-950 flex justify-between items-center mt-6">
                        <span class="text-[10px] font-mono text-slate-500">Total Items: <span class="text-slate-300 font-bold">15 Questions</span></span>
                        <a href="#" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white font-display text-xs font-bold uppercase tracking-wider rounded-md shadow-lg shadow-indigo-600/10 transition-all">
                            Start Quiz
                        </a>
                    </div>
                </div>

                <div class="p-6 rounded-xl bg-[#04060c]/30 border border-slate-900 hover:border-slate-800 flex flex-col justify-between min-h-[280px] transition-all duration-200 group relative sm:col-span-2 lg:col-span-1">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-pink-500/[0.02] to-transparent pointer-events-none"></div>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between items-center text-[10px] font-mono">
                            <span class="text-pink-400 uppercase font-medium tracking-wider">[Interface Design]</span>
                            <span class="text-slate-600">2026-06-22</span>
                        </div>
                        <div class="space-y-1">
                            <h4 class="text-base font-bold text-white uppercase tracking-wide font-display group-hover:text-pink-400 transition-colors">Human Computer Interaction</h4>
                            <p class="text-xs text-slate-400 font-light leading-normal line-clamp-2">Evaluates cognitive load balance variables, responsive grid configurations, layout rules, and usability protocols.</p>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-950 flex justify-between items-center mt-6">
                        <span class="text-[10px] font-mono text-slate-500">Total Items: <span class="text-slate-300 font-bold">10 Questions</span></span>
                        <a href="#" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white font-display text-xs font-bold uppercase tracking-wider rounded-md shadow-lg shadow-indigo-600/10 transition-all">
                            Start Quiz
                        </a>
                    </div>
                </div>

            </div>
        </section>

    </div>
</x-app-layout>