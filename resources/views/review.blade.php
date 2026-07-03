<x-app-layout>
    <div class="max-w-4xl mx-auto space-y-6">

        <div class="flex items-center justify-between text-left border-b border-zinc-900 pb-4">
            <div>
                <a href="#"
                    class="text-[10px] font-mono text-zinc-500 hover:text-zinc-300 transition-colors uppercase tracking-wider">
                    &larr; Exit to Dashboard
                </a>
                <h1 class="text-xl font-display font-bold text-white tracking-tight mt-1">
                    Evaluation Performance Review
                </h1>
            </div>
            <div class="text-right font-mono text-[11px] text-zinc-500">
                <span class="text-zinc-600 block text-[9px] uppercase tracking-wider">// Execution Summary</span>
                <span class="text-emerald-400 font-bold">Review Mode Matrix</span>
            </div>
        </div>

        <div class="space-y-8">
            @foreach($questions as $questionIndex => $question)
                @php
                    // 1. Session se user ka answer nikalna (e.g., '1', '2', '3', '4' ya 'A', 'B', 'C', 'D')
                    $userSelectedKey = $sessionAnswers[$question->id] ?? null;

               
                    $numToLetterMap = ['1' => 'A', '2' => 'B', '3' => 'C', '4' => 'D'];
                    if (isset($numToLetterMap[$userSelectedKey])) {
                        $userSelectedKey = $numToLetterMap[$userSelectedKey];
                    }

                    $correctKey = trim(strtoupper($question->correct_key)); // e.g., 'D'
                    $isUserCorrect = ($userSelectedKey == $correctKey);

                    // 2. Keys ko database ki tarah alphabets ('A', 'B', 'C', 'D') kar diya
                    $optionsGrid = [
                        'A' => ['label' => 'A', 'value' => $question->option_one],
                        'B' => ['label' => 'B', 'value' => $question->option_two],
                        'C' => ['label' => 'C', 'value' => $question->option_three],
                        'D' => ['label' => 'D', 'value' => $question->option_four],
                    ];
                @endphp

                <div
                    class="bg-[#050507] border {{ $isUserCorrect ? 'border-zinc-900' : 'border-rose-950/40' }} rounded-2xl p-6 space-y-5 text-left relative overflow-hidden">

                    <div class="flex items-center justify-between text-[10px] font-mono">
                        <span class="text-zinc-500 font-bold">// NODE NODE-0{{ $questionIndex + 1 }}</span>
                        @if($isUserCorrect)
                            <span
                                class="text-emerald-400 font-bold uppercase tracking-wider bg-emerald-500/5 px-2 py-0.5 border border-emerald-500/10 rounded">✓
                                Correct</span>
                        @else
                            <span
                                class="text-rose-500 font-bold uppercase tracking-wider bg-rose-500/5 px-2 py-0.5 border border-rose-500/10 rounded">✕
                                System Delta Error</span>
                        @endif
                    </div>

                    <div class="w-full bg-zinc-950/40 border border-zinc-900/80 rounded-xl p-4">
                        <p class="text-sm font-medium text-zinc-300 leading-relaxed">
                            {{ $question->content }}
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($optionsGrid as $key => $option)
                            @if(!empty($option['value']))
                                @php
                                    $isThisCorrectAnswer = ($key == $correctKey);
                                    $isThisUserSelection = ($key == $userSelectedKey);
                                @endphp

                                <div
                                    class="relative flex items-center justify-between gap-4 rounded-xl p-4 transition-all 
                                    @if($isThisCorrectAnswer) bg-emerald-500/5 border border-emerald-500/40 text-emerald-400 
                                    @elseif($isThisUserSelection && !$isUserCorrect) bg-rose-500/5 border border-rose-500/40 text-rose-400 
                                    @else bg-zinc-950/20 border border-zinc-900 text-zinc-500 @endif

                                    @if($isThisUserSelection) ring-1 ring-blue-500 border-blue-500/50 shadow-md shadow-blue-500/5 @endif">

                                    <div class="flex items-center gap-3">
                                        <div class="w-6 h-6 rounded text-[10px] font-mono font-bold flex items-center justify-center 
                                            @if($isThisCorrectAnswer) bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 
                                            @elseif($isThisUserSelection && !$isUserCorrect) bg-rose-500/20 border border-rose-500/30 text-rose-400 
                                            @else bg-zinc-900 border border-zinc-800 text-zinc-500 @endif">
                                            {{ $option['label'] }}
                                        </div>
                                        <span
                                            class="text-xs @if($isThisCorrectAnswer) text-emerald-300 @elseif($isThisUserSelection && !$isUserCorrect) text-rose-300 @else text-zinc-400 @endif">
                                            {{ $option['value'] }}
                                        </span>
                                    </div>

                                    <div class="flex items-center font-mono text-[9px] font-bold uppercase tracking-wider">
                                        @if($isThisUserSelection)
                                            <span
                                                class="text-blue-400 bg-blue-500/10 border border-blue-500/20 px-1.5 py-0.5 rounded">Selected</span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pt-6 border-t border-zinc-900 flex items-center justify-end">
            <a href="{{ route('evaluation-complete') }}"
                class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-xs font-mono uppercase tracking-wider text-white font-bold rounded-xl transition-all duration-200 shadow-lg shadow-indigo-600/10">
                Complete Evaluation Review &rarr;
            </a>
        </div>

    </div>
</x-app-layout>