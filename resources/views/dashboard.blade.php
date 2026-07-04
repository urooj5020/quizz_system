<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-2">
            <div>
                <span class="text-[10px] font-mono font-bold tracking-[0.4em] uppercase text-indigo-400 block">// DATA_CONSOLE_NODE</span>
                <h1 class="text-4xl font-bold tracking-tight text-white font-display mt-1">{{ auth()->user()->name }}</h1>
            </div>
            <span class="text-[10px] font-mono text-slate-600 uppercase tracking-widest">// session_node: authenticated</span>
        </div>
    </x-slot>

    <div x-data="{ activeTab: 'available' }" class="space-y-8">
        
        <section class="space-y-4">
            <div class="text-left">
                <span class="text-[9px] font-mono tracking-widest text-slate-500 uppercase">// METRIC_COUNTERS</span>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-5 gap-4">
                <div class="p-5 rounded-xl bg-[#04060c]/40 border border-slate-900 hover:border-slate-800 transition-all">
                    <span class="text-[9px] font-mono uppercase tracking-widest text-slate-500 block mb-2">Total Available</span>
                    <div class="text-2xl font-display font-bold text-white">
                        {{ (count($quizzesAvailable) < 10) ? '0' . count($quizzesAvailable) : count($quizzesAvailable) }}
                    </div>
                    <p class="text-[10px] text-slate-600 mt-1">Active evaluation models</p>
                </div>

                <div class="p-5 rounded-xl bg-[#04060c]/40 border border-slate-900 hover:border-slate-800 transition-all">
                    <span class="text-[9px] font-mono uppercase tracking-widest text-slate-500 block mb-2">Total Attempted</span>
                    <div class="text-2xl font-display font-bold text-indigo-400">
                        {{ (count($attempted) < 10) ? '0' . count($attempted) : count($attempted) }}
                    </div>
                    <p class="text-[10px] text-slate-600 mt-1">Completed matrices</p>
                </div>

                <div class="p-5 rounded-xl bg-[#04060c]/40 border border-slate-900 hover:border-slate-800 transition-all">
                    <span class="text-[9px] font-mono uppercase tracking-widest text-slate-500 block mb-2">Average Score</span>
                    <div class="text-2xl font-display font-bold text-white">{{ number_format($averageScore, 1) }}%</div>
                    <p class="text-[10px] text-slate-600 mt-1">Mean competency yield</p>
                </div>

                <div class="p-5 rounded-xl bg-[#04060c]/40 border border-slate-900 hover:border-slate-800 transition-all">
                    <span class="text-[9px] font-mono uppercase tracking-widest text-slate-500 block mb-2">Passed Units</span>
                    <div class="text-2xl font-display font-bold text-emerald-400">
                        {{ ($passedUnits < 10) ? '0' . $passedUnits : $passedUnits }}
                    </div>
                    <p class="text-[10px] text-emerald-500/50 font-mono text-[9px] mt-1">✔ SUCCESS_THRESHOLD</p>
                </div>

                <div class="p-5 rounded-xl bg-[#04060c]/40 border border-slate-900 hover:border-slate-800 transition-all col-span-2 lg:col-span-1">
                    <span class="text-[9px] font-mono uppercase tracking-widest text-slate-500 block mb-2">Failed Units</span>
                    <div class="text-2xl font-display font-bold text-pink-500">
                        {{ ($failedUnits < 10) ? '0' . $failedUnits : $failedUnits }}
                    </div>
                    <p class="text-[10px] text-pink-500/50 font-mono text-[9px] mt-1">⚠️ ANOMALY_DETECTED</p>
                </div>
            </div>
        </section>

        @if($lastAttempt && $lastAttempt->quiz)
            <section class="space-y-4">
                <div class="text-left border-b border-slate-900 pb-2">
                    <span class="text-[9px] font-mono tracking-widest text-indigo-400 uppercase">// RECENT_HISTORICAL_LOG</span>
                </div>
                <div class="p-6 rounded-2xl bg-[#04060c]/60 border border-slate-900 flex flex-col md:flex-row justify-between items-start md:items-center gap-6 relative overflow-hidden group hover:border-slate-800 transition-all">
                    <div class="absolute top-0 left-0 w-32 h-32 bg-indigo-500/[0.01] blur-2xl pointer-events-none"></div>
                    <div class="space-y-2 max-w-2xl text-left">
                        <div class="flex items-center gap-3">
                            <span class="px-2 py-0.5 bg-[#0b0e17] border border-indigo-900/40 text-[9px] font-mono text-indigo-400 rounded">LAST_ATTEMPT</span>
                            <h3 class="text-base font-bold text-white uppercase tracking-wide font-display">{{ $lastAttempt->quiz->title }}</h3>
                        </div>
                        <p class="text-xs text-slate-400 font-light leading-relaxed">
                            {{ $lastAttempt->quiz->desc }}
                        </p>
                    </div>
                    <div class="flex items-center gap-6 w-full md:w-auto border-t border-slate-900/60 md:border-none pt-4 md:pt-0 justify-between md:justify-end">
                        <div class="text-left md:text-right font-mono">
                            <span class="text-[10px] text-slate-500 uppercase block tracking-wider">Final Grade</span>
                            <span class="text-lg font-bold {{ $lastAttempt->score >= 50 ? 'text-emerald-400' : 'text-rose-500' }}">
                                {{ $lastAttempt->score }}/100
                            </span>
                        </div>
                        <a href="{{ route('start-quizz', $lastAttempt->quizz_id) }}" class="px-4 py-2.5 rounded-lg bg-[#07090e] border border-indigo-500/30 text-xs font-display font-medium tracking-wide text-indigo-300 hover:bg-indigo-500/10 transition-all flex-shrink-0">
                            Re-Start Quiz
                        </a>
                    </div>
                </div>
            </section>
        @endif

        <div class="flex items-center justify-start border-b border-slate-900 gap-2 font-mono text-xs">
            <button @click="activeTab = 'available'" 
                    :class="activeTab === 'available' ? 'border-indigo-500 text-white bg-indigo-500/5' : 'border-transparent text-slate-500 hover:text-slate-300'"
                    class="px-4 py-2.5 border-b-2 transition-all duration-200 outline-none uppercase tracking-wider font-bold">
                // Available Nodes ({{ count($quizzesAvailable) }})
            </button>
            <button @click="activeTab = 'passed'" 
                    :class="activeTab === 'passed' ? 'border-emerald-500 text-emerald-400 bg-emerald-500/5' : 'border-transparent text-slate-500 hover:text-slate-300'"
                    class="px-4 py-2.5 border-b-2 transition-all duration-200 outline-none uppercase tracking-wider font-bold">
                // Passed ({{ count($passedQuizzes) }})
            </button>
            <button @click="activeTab = 'failed'" 
                    :class="activeTab === 'failed' ? 'border-pink-500 text-pink-400 bg-pink-500/5' : 'border-transparent text-slate-500 hover:text-slate-300'"
                    class="px-4 py-2.5 border-b-2 transition-all duration-200 outline-none uppercase tracking-wider font-bold">
                // Anomalies ({{ count($failedQuizzes) }})
            </button>
        </div>

        <div class="pt-2">
            
            <div x-show="activeTab === 'available'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 text-left">
                    @forelse ($quizzesAvailable as $quizz)
                        <div class="p-6 rounded-xl bg-[#04060c]/30 border border-slate-900 hover:border-slate-800 flex flex-col justify-between min-h-[280px] transition-all duration-200 group relative">
                            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-indigo-500/[0.02] to-transparent pointer-events-none"></div>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center text-[10px] font-mono">
                                    <span class="text-indigo-400 uppercase font-medium tracking-wider">[{{ $quizz->category ?? 'General' }}]</span>
                                    <span class="text-slate-600">{{ $quizz->created_at->format('Y-m-d') }}</span>
                                </div>
                                <div class="space-y-1">
                                    <h4 class="text-base font-bold text-white uppercase tracking-wide font-display group-hover:text-indigo-400 transition-colors">
                                        {{ $quizz->title }}
                                    </h4>
                                    <p class="text-xs text-slate-400 font-light leading-normal line-clamp-2">
                                        {{ $quizz->desc }}
                                    </p>
                                </div>
                            </div>
                            <div class="pt-4 border-t border-slate-950 flex justify-between items-center mt-6">
                                <span class="text-[10px] font-mono text-slate-500">
                                    Total Items: <span class="text-slate-300 font-bold">{{ $quizz->questions_count ?? 0 }} Questions</span>
                                </span>
                                <a href="{{ route('start-quizz', $quizz->id) }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white font-display text-xs font-bold uppercase tracking-wider rounded-md shadow-lg shadow-indigo-600/10 transition-all">
                                    Start Quiz
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full p-12 text-center bg-[#04060c]/20 border border-dashed border-slate-900 rounded-2xl">
                            <p class="text-xs font-mono text-indigo-400">All available evaluation nodes committed. No pending matrices remaining.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div x-show="activeTab === 'passed'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="grid sm:grid-cols-1 md:grid-cols-2 gap-4">
                @forelse($passedQuizzes as $pass)
                    @if($pass->quiz)
                        <div class="p-5 rounded-xl bg-[#03060a]/50 border border-emerald-950/40 hover:border-emerald-900/50 flex justify-between items-center gap-4 transition-all">
                            <div class="text-left space-y-1">
                                <span class="text-[8px] font-mono bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 px-1.5 py-0.5 rounded font-bold">VERIFIED</span>
                                <h5 class="text-sm font-bold text-zinc-200 font-display uppercase tracking-wide truncate max-w-[220px] sm:max-w-md">
                                    {{ $pass->quiz->title }}
                                </h5>
                                <p class="text-[10px] text-zinc-600 font-mono">// committed: {{ $pass->created_at->format('Y-m-d H:i') }}</p>
                            </div>
                            <div class="text-right font-mono flex-shrink-0">
                                <span class="text-[9px] text-zinc-600 block uppercase tracking-wider">Score</span>
                                <span class="text-base font-black text-emerald-400">{{ $pass->score }}%</span>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="col-span-full p-12 text-center bg-[#04060c]/20 border border-dashed border-slate-900 rounded-2xl">
                        <p class="text-xs font-mono text-zinc-600">No completed success matrices detected inside database terminal registry.</p>
                    </div>
                @endforelse
            </div>

            <div x-show="activeTab === 'failed'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="grid sm:grid-cols-1 md:grid-cols-2 gap-4">
                @forelse($failedQuizzes as $fail)
                    @if($fail->quiz)
                        <div class="p-5 rounded-xl bg-[#03060a]/50 border border-pink-950/40 hover:border-pink-900/50 flex justify-between items-center gap-4 transition-all">
                            <div class="text-left space-y-1">
                                <span class="text-[8px] font-mono bg-pink-500/10 border border-pink-500/20 text-pink-400 px-1.5 py-0.5 rounded font-bold">DELTA_ERROR</span>
                                <h5 class="text-sm font-bold text-zinc-200 font-display uppercase tracking-wide truncate max-w-[220px] sm:max-w-md">
                                    {{ $fail->quiz->title }}
                                </h5>
                                <p class="text-[10px] text-zinc-600 font-mono">// logged: {{ $fail->created_at->format('Y-m-d H:i') }}</p>
                            </div>
                            <div class="text-right font-mono flex-shrink-0">
                                <span class="text-[9px] text-zinc-600 block uppercase tracking-wider">Score</span>
                                <span class="text-base font-black text-pink-500">{{ $fail->score }}%</span>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="col-span-full p-12 text-center bg-[#04060c]/20 border border-dashed border-slate-900 rounded-2xl">
                        <p class="text-xs font-mono text-zinc-600">Zero delta anomalies or failed execution nodes logged inside current session stream.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>