<x-app-layout>
<div class="max-w-3xl mx-auto space-y-6">

    <div class="border-b border-zinc-900 pb-4 text-left">
        <h1 class="text-xl font-bold tracking-tight text-white">Evaluation Finalized</h1>
        <p class="text-xs font-mono text-zinc-500 mt-1">// Core processing loop complete. Matrix data committed successfully.</p>
    </div>

    <div class="bg-[#050507] border border-zinc-900 rounded-2xl p-6 md:p-8 space-y-8 text-center relative overflow-hidden">
        
        <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-72 h-72 rounded-full blur-3xl pointer-events-none {{ $scorePercentage >= 50 ? 'bg-indigo-500/10' : 'bg-rose-500/10' }}"></div>

        <div class="relative z-10 space-y-2">
            <span class="text-[10px] font-mono text-zinc-500 uppercase tracking-widest block">
                // Final Evaluation Matrix Grade
            </span>
            
            <div class="inline-flex flex-col items-center justify-center w-36 h-36 rounded-full bg-zinc-950 border border-zinc-900 shadow-xl shadow-indigo-500/5">
                <span class="text-3xl font-display font-black tracking-tight {{ $scorePercentage >= 50 ? 'text-emerald-400' : 'text-rose-500' }}">
                    {{ $scorePercentage }}%
                </span>
                <span class="text-[10px] font-mono text-zinc-600 uppercase tracking-wider mt-0.5">Grade Achieved</span>
            </div>
            
            <h2 class="text-base font-bold text-zinc-200 pt-2">{{ $quizz_info->title }}</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-left font-mono text-[11px] relative z-10">
            <div class="p-4 bg-zinc-950/40 border border-zinc-900/60 rounded-xl">
                <span class="text-zinc-600 block text-[9px] uppercase tracking-wider mb-1">Total Score Array</span>
                <span class="text-zinc-200 font-bold">{{ $totalCorrect }} / {{ count($quizz_questions) }} Correct</span>
            </div>
            <div class="p-4 bg-zinc-950/40 border border-zinc-900/60 rounded-xl">
                <span class="text-zinc-600 block text-[9px] uppercase tracking-wider mb-1">Time Elapsed</span>
                <span class="text-zinc-200 font-bold">Completed</span>
            </div>
            <div class="p-4 bg-zinc-950/40 border border-zinc-900/60 rounded-xl">
                <span class="text-zinc-600 block text-[9px] uppercase tracking-wider mb-1">Status Verified</span>
                @if($scorePercentage >= 50)
                    <span class="text-emerald-400 font-bold uppercase tracking-widest font-black">Passed</span>
                @else
                    <span class="text-rose-500 font-bold uppercase tracking-widest font-black">Failed</span>
                @endif
            </div>
        </div>

        @if($scorePercentage >= 50)
            <div class="p-4 bg-emerald-500/5 border border-emerald-500/10 rounded-xl text-left relative z-10">
                <p class="text-xs text-zinc-400 leading-relaxed">
                    <strong class="text-emerald-400">Excellent Work Node!</strong> You have successfully crossed the passing parameter boundary threshold specified for this terminal cluster module block.
                </p>
            </div>
        @else
            <div class="p-4 bg-rose-500/5 border border-rose-500/10 rounded-xl text-left relative z-10">
                <p class="text-xs text-zinc-400 leading-relaxed">
                    <strong class="text-rose-400">Threshold Breach!</strong> Evaluation grade falls below target parameters. Review the system logs and delta anomalies below to clear the matrix.
                </p>
            </div>
        @endif

        <div class="pt-6 border-t border-zinc-900/60 flex flex-col sm:flex-row items-center justify-end gap-3 relative z-10">
            <a href="{{ route('review') }}" class="w-full sm:w-auto text-center px-4 py-2 bg-zinc-950 hover:bg-zinc-900 border border-zinc-900 text-xs font-mono uppercase tracking-wider text-zinc-400 rounded-xl transition-all duration-150">
                Review Mistakes
            </a>
            
            <a href="{{ route('dashboard') }}" class="w-full sm:w-auto text-center px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-xs font-mono uppercase tracking-wider text-white font-bold rounded-xl transition-all duration-200 shadow-lg shadow-indigo-600/10">
                Exit to Dashboard &rarr;
            </a>
        </div>

    </div>
</div>
</x-app-layout>