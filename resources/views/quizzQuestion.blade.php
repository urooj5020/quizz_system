<x-app-layout>
    <div class="max-w-4xl mx-auto space-y-6">

        <div class="flex items-center justify-between text-left">
            <a href="#"
                class="text-[10px] font-mono text-admin-muted hover:text-admin-fg transition-colors uppercase tracking-wider">
                &larr; Back to Dashboard
            </a>
            <span class="text-[11px] font-mono text-white font-bold">
                Question {{ $currentIndex + 1 }} of {{ $totalQuestions }}
            </span>
        </div>

        <div class="theme-panel rounded-2xl p-6 md:p-8 space-y-8">

            <div class="text-left space-y-1">
                <div class="flex items-center gap-2">
                    <span
                        class="w-2 h-2 rounded-full bg-indigo-500 shadow-sm shadow-indigo-500/50 animate-pulse"></span>
                    <h1 class="text-xl font-display font-bold theme-text tracking-tight">
                        Quiz Question
                    </h1>
                </div>
                <p class="text-xs font-mono theme-muted uppercase tracking-wider">
                    Choose the best answer
                </p>

                <div class="w-full rounded-full h-2 bg-slate-200/80 overflow-hidden mt-3 dark:bg-slate-800/80">
                    <div class="bg-indigo-500 h-full rounded-full transition-all duration-300"
                        style="width: {{ (($currentIndex + 1) / $totalQuestions) * 100 }}%"></div>
                </div>
            </div>

            <hr class="theme-border" />

            <form action="{{ route('submit-answer') }}" method="POST" class="space-y-6">
                @csrf

                <input type="hidden" name="question_id" value="{{ $question->id }}">

                <div class="space-y-2 text-left">
                    <span class="text-[10px] font-mono theme-muted uppercase tracking-widest block">
                        Question
                    </span>
                    <div class="w-full theme-panel-soft border rounded-xl p-4 min-h-[70px] flex items-center">
                        <p class="text-sm font-medium theme-text leading-relaxed">
                            {{ $question->content }}
                        </p>
                    </div>
                </div>

                <div class="space-y-3 text-left">
                    <span class="text-[10px] font-mono theme-muted uppercase tracking-widest block">
                        Select one option
                    </span>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @php
                            $optionsMap = [
                                '1' => ['label' => 'A', 'value' => $question->option_one],
                                '2' => ['label' => 'B', 'value' => $question->option_two],
                                '3' => ['label' => 'C', 'value' => $question->option_three],
                                '4' => ['label' => 'D', 'value' => $question->option_four],
                            ];
                        @endphp

                        @foreach($optionsMap as $key => $option)
                            @if(!empty($option['value']))
                                @php $uniqueDomId = "option_variant_" . $key; @endphp

                                <label for="{{ $uniqueDomId }}"
                                    class="relative flex items-center gap-3 theme-panel-soft border rounded-xl p-4 cursor-pointer transition-all duration-200 select-none peer-checked:border-indigo-500 peer-checked:bg-indigo-50 dark:peer-checked:bg-indigo-500/10 peer-checked:shadow-md peer-checked:shadow-indigo-500/10">

                                    <input type="radio" id="{{ $uniqueDomId }}" name="answer" value="{{ $key }}" required
                                        class="absolute opacity-0 w-0 h-0 peer">

                                    <div class="w-8 h-8 rounded-lg border border-slate-300 dark:border-slate-600 flex items-center justify-center text-xs font-mono font-bold text-slate-500 dark:text-slate-400 transition-all duration-200 peer-checked:bg-indigo-500 peer-checked:text-white peer-checked:border-indigo-500 peer-checked:shadow-sm">
                                        {{ $option['label'] }}
                                    </div>

                                    <span class="flex-1 text-sm font-medium text-slate-700 dark:text-slate-300 transition-all duration-200 peer-checked:text-indigo-600 dark:peer-checked:text-indigo-300 peer-checked:font-bold">
                                        {{ $option['value'] }}
                                    </span>

                                    <svg class="w-5 h-5 text-indigo-500 opacity-0 peer-checked:opacity-100 transition-all duration-200 peer-checked:scale-100 scale-0 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </label>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="mt-8 pt-4 border-t theme-border flex items-center justify-end gap-3">
                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-xs font-mono uppercase tracking-wider text-white font-bold rounded-xl transition-all duration-200 shadow-lg shadow-indigo-600/10">
                        {{ ($currentIndex + 1) === $totalQuestions ? 'Finish Exam' : 'Save answer and move to next →' }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>