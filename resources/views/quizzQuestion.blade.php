<x-app-layout>
<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex items-center justify-between text-left">
        <a href="#" class="text-[10px] font-mono text-zinc-500 hover:text-zinc-300 transition-colors uppercase tracking-wider">
            &larr; Return to Quiz Dashboard
        </a>
        <span class="text-[11px] font-mono text-indigo-400 font-bold">
            Question {{ $currentIndex + 1 }} of {{ $totalQuestions }}
        </span>
    </div>

    <div class="bg-[#050507] border border-zinc-900 rounded-2xl p-6 md:p-8 space-y-8">
        
        <div class="text-left space-y-1">
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-indigo-500 shadow-sm shadow-indigo-500/50 animate-pulse"></span>
                <h1 class="text-xl font-display font-bold text-white tracking-tight">
                    Evaluation Matrix Node
                </h1>
            </div>
            <p class="text-xs font-mono text-zinc-500 uppercase tracking-wider">
                // Active Question Runtime Stream
            </p>
            
            <div class="w-full bg-zinc-950 rounded-full h-1 border border-zinc-900/60 overflow-hidden mt-3">
                <div class="bg-indigo-500 h-full rounded-full transition-all duration-300" style="width: {{ (($currentIndex + 1) / $totalQuestions) * 100 }}%"></div>
            </div>
        </div>

        <hr class="border-zinc-900" />

        <form action="{{ route('submit-answer') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="space-y-2 text-left">
                <span class="text-[10px] font-mono text-zinc-600 uppercase tracking-widest block">
                    // Question Statement / Prompt
                </span>
                <div class="w-full bg-[#050507] border border-zinc-900/80 rounded-xl p-4 min-h-[70px] flex items-center">
                    <p class="text-sm font-medium text-zinc-200 leading-relaxed">
                        {{ $question->content }}
                    </p>
                </div>
            </div>

            <div class="space-y-3 text-left">
                <span class="text-[10px] font-mono text-zinc-600 uppercase tracking-widest block">
                    // Option Variants Array (Select Target Node)
                </span>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @php
                        // Mapping your database columns cleanly to an array sequence
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
                            
                            <label for="{{ $uniqueDomId }}" class="relative flex items-center justify-between gap-4 bg-zinc-950/20 border border-zinc-900 hover:border-zinc-800 rounded-xl p-4 cursor-pointer transition-all group select-none">
                                <div class="flex items-center gap-3">
                                    <div class="w-6 h-6 rounded bg-zinc-900 border border-zinc-800 text-[10px] font-mono font-bold text-zinc-500 flex items-center justify-center group-hover:text-indigo-400 group-hover:border-indigo-500/20 transition-colors">
                                        {{ $option['label'] }}
                                    </div>
                                    <span class="text-xs text-zinc-400 group-hover:text-zinc-200 transition-colors">
                                        {{ $option['value'] }}
                                    </span>
                                </div>
                                
                                <input type="radio" 
                                       id="{{ $uniqueDomId }}" 
                                       name="answer" 
                                       value="{{ $key }}" 
                                       required 
                                       class="w-3.5 h-3.5 text-indigo-600 bg-zinc-950 border-zinc-800 focus:ring-indigo-500 focus:ring-offset-zinc-950 accent-indigo-500">
                            </label>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="mt-8 pt-4 border-t border-zinc-900/60 flex items-center justify-end gap-3">
                <button type="button" class="px-4 py-2 bg-zinc-950 hover:bg-zinc-900 border border-zinc-900 text-xs font-mono uppercase tracking-wider text-zinc-400 rounded-xl transition-all duration-150">
                    Skip Question
                </button>
                
                <button type="submit" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-xs font-mono uppercase tracking-wider text-white font-bold rounded-xl transition-all duration-200 shadow-lg shadow-indigo-600/10">
                    {{ ($currentIndex + 1) === $totalQuestions ? 'Finish Exam ⚑' : 'Save answer and move to next →' }}
                </button>
            </div>

        </form>
    </div>
</div>
</x-app-layout>