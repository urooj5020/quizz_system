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

    <div class="space-y-12">
        
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

        @if($lastAttempt)
            <section class="space-y-4">
                <div class="text-left border-b border-slate-900 pb-2">
                    <span class="text-[9px] font-mono tracking-widest text-indigo-400 uppercase">// RECENT_HISTORICAL_LOG</span>
                </div>
                
                <div class="p-6 rounded-2xl bg-[#04060c]/60 border border-slate-900 flex flex-col md:flex-row justify-between items-start md:items-center gap-6 relative overflow-hidden group hover:border-slate-800 transition-all">
                    <div class="absolute top-0 left-0 w-32 h-32 bg-indigo-500/[0.01] blur-2xl pointer-events-none"></div>
                    
                    <div class="space-y-2 max-w-2xl text-left">
                        <div class="flex items-center gap-3">
                            <span class="px-2 py-0.5 bg-[#0b0e17] border border-indigo-900/40 text-[9px] font-mono text-indigo-400 rounded">LAST_ATTEMPT</span>
                            <h3 class="text-base font-bold text-white uppercase tracking-wide font-display">{{ $lastAttempt->quizz->title }}</h3>
                        </div>
                        <p class="text-xs text-slate-400 font-light leading-relaxed">
                            {{ $lastAttempt->quiz->desc }}
                        </p>
                    </div>

                    <div class="flex items-center gap-6 w-full md:w-auto border-t border-slate-900/60 md:border-none pt-4 md:pt-0 justify-between md:justify-end">
                        <div class="text-left md:text-right font-mono">
                            <span class="text-[10px] text-slate-500 uppercase block tracking-wider">Final Grade</span>
                            <span class="text-lg font-bold {{ $lastAttempt->score_percentage >= 50 ? 'text-emerald-400' : 'text-rose-500' }}">
                                {{ $lastAttempt->score_percentage }}/100
                            </span>
                        </div>
                        <a href="{{ route('start-quizz', $lastAttempt->quiz_id) }}" class="px-4 py-2.5 rounded-lg bg-[#07090e] border border-indigo-500/30 text-xs font-display font-medium tracking-wide text-indigo-300 hover:bg-indigo-500/10 transition-all flex-shrink-0">
                            Re-Start Quiz
                        </a>
                    </div>
                </div>
            </section>
        @endif

        <section class="space-y-4">
            <div class="text-left border-b border-slate-900 pb-2">
                <span class="text-[9px] font-mono tracking-widest text-slate-500 uppercase">// AVAILABLE_EVALUATION_MODELS</span>
            </div>
            
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 text-left">
                @foreach ($quizzesAvailable as $quizz)
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
                                Total Items: <span class="text-slate-300 font-bold">{{ $quizz->questions_count ?? 10 }} Questions</span>
                            </span>
                            <a href="{{ route('start-quizz', $quizz->id) }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white font-display text-xs font-bold uppercase tracking-wider rounded-md shadow-lg shadow-indigo-600/10 transition-all">
                                Start Quiz
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

    </div>
</x-app-layout>