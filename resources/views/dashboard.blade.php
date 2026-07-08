<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-2">
            <div>
                <span
                    class="text-[10px] font-semibold tracking-widest uppercase text-indigo-600 dark:text-white block">Your
                    Quiz Dashboard</span>
                <h1 class="text-3xl sm:text-4xl font-bold tracking-tight theme-text font-display mt-1">Welcome back,
                    {{ auth()->user()->name }}
                </h1>
            </div>
            <span class="text-[10px] font-semibold theme-muted uppercase tracking-widest">Ready to learn</span>
        </div>
    </x-slot>

    <div x-data="{ activeTab: 'available' }" class="space-y-8">

        <section class="space-y-4">
            <div class="text-left">
                <span
                    class="text-[9px] font-semibold tracking-widest text-indigo-600 dark:text-white uppercase">Your
                    Progress</span>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-5 gap-4">
                <div class="p-5 rounded-xl theme-panel-soft border transition-all">
                    <span class="text-[9px] font-mono uppercase tracking-widest theme-muted block mb-2">Available
                        Quizzes</span>
                    <div class="text-2xl font-display font-bold theme-text">
                        {{ (count($quizzesAvailable) < 10) ? '0' . count($quizzesAvailable) : count($quizzesAvailable) }}
                    </div>
                    <p class="text-[10px] theme-muted mt-1">Ready for you now</p>
                </div>

                <div class="p-5 rounded-xl theme-panel-soft border transition-all">
                    <span class="text-[9px] font-mono uppercase tracking-widest theme-muted block mb-2">Attempted</span>
                    <div class="text-2xl font-display font-bold text-indigo-500">
                        {{ (count($attempted) < 10) ? '0' . count($attempted) : count($attempted) }}
                    </div>
                    <p class="text-[10px] theme-muted mt-1">Completed so far</p>
                </div>

                <div class="p-5 rounded-xl theme-panel-soft border transition-all">
                    <span class="text-[9px] font-mono uppercase tracking-widest theme-muted block mb-2">Average
                        Score</span>
                    <div class="text-2xl font-display font-bold theme-text">{{ number_format($averageScore, 1) }}%</div>
                    <p class="text-[10px] theme-muted mt-1">Your overall progress</p>
                </div>

                <div class="p-5 rounded-xl theme-panel-soft border transition-all">
                    <span class="text-[9px] font-mono uppercase tracking-widest theme-muted block mb-2">Passed</span>
                    <div class="text-2xl font-display font-bold text-emerald-500">
                        {{ ($passedUnits < 10) ? '0' . $passedUnits : $passedUnits }}
                    </div>
                    <p class="text-[10px] text-emerald-500 font-mono text-[9px] mt-1"><svg class="w-3 h-3 inline-block text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg> Great job</p>
                </div>

                <div class="p-5 rounded-xl theme-panel-soft border transition-all col-span-2 lg:col-span-1">
                    <span class="text-[9px] font-mono uppercase tracking-widest theme-muted block mb-2">Needs
                        Review</span>
                    <div class="text-2xl font-display font-bold text-pink-500">
                        {{ ($failedUnits < 10) ? '0' . $failedUnits : $failedUnits }}
                    </div>
                    <p class="text-[10px] text-pink-500 font-mono text-[9px] mt-1"><svg class="w-3 h-3 inline-block text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" /></svg> Review and retry</p>
                </div>
            </div>
        </section>

        @if($lastAttempt && $lastAttempt->quiz)
            <section class="space-y-4">
                <div class="text-left border-b theme-border pb-2">
                    <span
                        class="text-[9px] font-semibold tracking-widest text-indigo-600 dark:text-white uppercase">Your
                        Last Quiz</span>
                </div>
                <div
                    class="p-6 rounded-2xl theme-panel-soft border theme-border flex flex-col md:flex-row justify-between items-start md:items-center gap-6 relative overflow-hidden group hover:shadow-md transition-all">
                    <div class="space-y-2 max-w-2xl text-left">
                        <div class="flex items-center gap-3">
                            <span
                                class="px-2 py-0.5 bg-indigo-100 dark:bg-white/10 border border-indigo-200 dark:border-white/20 text-[9px] font-semibold text-indigo-700 dark:text-gray-300 rounded">Recent</span>
                            <h3 class="text-base font-bold theme-text uppercase tracking-wide font-display">
                                {{ $lastAttempt->quiz->title }}
                            </h3>
                        </div>
                        <p class="text-xs theme-muted font-light leading-relaxed">
                            {{ $lastAttempt->quiz->desc }}
                        </p>
                    </div>
                    <div
                        class="flex items-center gap-6 w-full md:w-auto border-t theme-border md:border-none pt-4 md:pt-0 justify-between md:justify-end">
                        <div class="text-left md:text-right font-display">
                            <span class="text-[10px] theme-muted uppercase block tracking-wider">Score</span>
                            <span
                                class="text-lg font-bold {{ $lastAttempt->score >= 50 ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400' }}">
                                {{ $lastAttempt->score }}/100
                            </span>
                        </div>
                        <a href="{{ route('start-quizz', $lastAttempt->quizz_id) }}"
                            class="px-4 py-2.5 rounded-lg bg-indigo-600 hover:bg-indigo-500 border border-indigo-600 hover:border-indigo-500 text-xs font-display font-medium tracking-wide text-white transition-all flex-shrink-0">
                            Try Again
                        </a>
                    </div>
                </div>
            </section>
        @endif

        <div class="flex items-center justify-start border-b theme-border gap-2 font-display text-xs">
            <button @click="activeTab = 'available'"
                :class="activeTab === 'available' ? 'border-indigo-600 dark:border-indigo-400 theme-text bg-indigo-50 dark:bg-indigo-500/5' : 'border-transparent theme-muted hover:theme-text'"
                class="px-4 py-2.5 border-b-2 transition-all duration-200 outline-none uppercase tracking-wider font-bold">
                Available ({{ count($quizzesAvailable) }})
            </button>
            <button @click="activeTab = 'passed'"
                :class="activeTab === 'passed' ? 'border-emerald-600 dark:border-emerald-400 text-emerald-700 dark:text-emerald-300 bg-emerald-50 dark:bg-emerald-500/5' : 'border-transparent theme-muted hover:theme-text'"
                class="px-4 py-2.5 border-b-2 transition-all duration-200 outline-none uppercase tracking-wider font-bold">
                Passed ({{ count($passedQuizzes) }})
            </button>
            <button @click="activeTab = 'failed'"
                :class="activeTab === 'failed' ? 'border-pink-600 dark:border-pink-400 text-pink-700 dark:text-pink-300 bg-pink-50 dark:bg-pink-500/5' : 'border-transparent theme-muted hover:theme-text'"
                class="px-4 py-2.5 border-b-2 transition-all duration-200 outline-none uppercase tracking-wider font-bold">
                Needs Review ({{ count($failedQuizzes) }})
            </button>
        </div>

        <div class="pt-2">

            <div x-show="activeTab === 'available'" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 text-left">
                    @forelse ($quizzesAvailable as $quizz)
                        <div
                            class="p-6 rounded-xl theme-panel-soft border theme-border hover:shadow-md flex flex-col justify-between min-h-[280px] transition-all duration-200 group relative">
                            <div class="space-y-3">
                                <div class="flex justify-between items-center text-[10px] font-semibold">
                                    <span
                                        class="text-indigo-600 dark:text-white uppercase tracking-wider">{{ $quizz->category ?? 'General' }}</span>
                                    <span class="theme-muted">{{ $quizz->created_at->format('Y-m-d') }}</span>
                                </div>
                                <div class="space-y-1">
                                    <h4
                                        class="text-base font-bold theme-text uppercase tracking-wide font-display group-hover:text-indigo-600 dark:group-hover:text-white transition-colors">
                                        {{ $quizz->title }}
                                    </h4>
                                    <p class="text-xs theme-muted font-light leading-normal line-clamp-2">
                                        {{ $quizz->desc }}
                                    </p>
                                </div>
                            </div>
                            <div class="pt-4 border-t theme-border flex justify-between items-center mt-6">
                                <span class="text-[10px] font-semibold theme-muted">
                                    <span class="theme-text font-bold">{{ $quizz->questions_count ?? 0 }} Questions</span>
                                </span>
                                <a href="{{ route('start-quizz', $quizz->id) }}"
                                    class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white font-display text-xs font-bold uppercase tracking-wider rounded-md shadow-lg shadow-indigo-600/10 transition-all">
                                    Start
                                </a>
                            </div>
                        </div>
                    @empty
                        <div
                            class="col-span-full p-12 text-center theme-panel-soft border border-dashed theme-border rounded-2xl">
                            <p class="text-xs font-semibold text-indigo-600 dark:text-white">No quizzes available right
                                now. Come back soon!</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div x-show="activeTab === 'passed'" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                class="grid sm:grid-cols-1 md:grid-cols-2 gap-4">
                @forelse($passedQuizzes as $pass)
                    @if($pass->quiz)
                        <div
                            class="p-5 rounded-xl theme-panel-soft border theme-border hover:shadow-md flex justify-between items-center gap-4 transition-all">
                            <div class="text-left space-y-1">
                                <span
                                    class="text-[8px] font-semibold bg-emerald-100 dark:bg-emerald-500/20 border border-emerald-200 dark:border-emerald-500/30 text-emerald-700 dark:text-emerald-300 px-1.5 py-0.5 rounded">Passed</span>
                                <h5
                                    class="text-sm font-bold theme-text font-display uppercase tracking-wide truncate max-w-[220px] sm:max-w-md">
                                    {{ $pass->quiz->title }}
                                </h5>
                                <p class="text-[10px] theme-muted font-semibold">Completed:
                                    {{ $pass->created_at->format('Y-m-d H:i') }}</p>
                            </div>
                            <div class="text-right font-display flex-shrink-0">
                                <span class="text-[9px] theme-muted block uppercase tracking-wider">Score</span>
                                <span
                                    class="text-base font-black text-emerald-600 dark:text-emerald-400">{{ $pass->score }}%</span>
                            </div>
                        </div>
                    @endif
                @empty
                    <div
                        class="col-span-full p-12 text-center theme-panel-soft border border-dashed theme-border rounded-2xl">
                        <p class="text-xs font-semibold theme-muted">No passed quizzes yet. Keep practicing!</p>
                    </div>
                @endforelse
            </div>

            <div x-show="activeTab === 'failed'" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                class="grid sm:grid-cols-1 md:grid-cols-2 gap-4">
                @forelse($failedQuizzes as $fail)
                    @if($fail->quiz)
                        <div
                            class="p-5 rounded-xl theme-panel-soft border theme-border hover:shadow-md flex justify-between items-center gap-4 transition-all">
                            <div class="text-left space-y-1">
                                <span
                                    class="text-[8px] font-semibold bg-pink-100 dark:bg-pink-500/20 border border-pink-200 dark:border-pink-500/30 text-pink-700 dark:text-pink-300 px-1.5 py-0.5 rounded\">Needs
                                    Review</span>
                                <h5
                                    class="text-sm font-bold theme-text font-display uppercase tracking-wide truncate max-w-[220px] sm:max-w-md">
                                    {{ $fail->quiz->title }}
                                </h5>
                                <p class="text-[10px] theme-muted font-semibold\">Attempted:
                                    {{ $fail->created_at->format('Y-m-d H:i') }}</p>
                            </div>
                            <div class="text-right font-display flex-shrink-0">
                                <span class="text-[9px] theme-muted block uppercase tracking-wider\">Score</span>
                                <span class="text-base font-black text-pink-600 dark:text-pink-400\">{{ $fail->score }}%</span>
                            </div>
                        </div>
                    @endif
                @empty
                    <div
                        class="col-span-full p-12 text-center theme-panel-soft border border-dashed theme-border rounded-2xl\">
                        <p class="text-xs font-semibold theme-muted\">No quizzes need review. Great work!</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>