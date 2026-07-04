@extends('admin.layouts.main')

@section('content')
    <div class="space-y-8">

        <div
            class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-zinc-900 pb-6 text-left">
            <div>
                <a href="{{ route('quizz-factory') }}"
                    class="inline-flex items-center gap-2 text-xs font-mono text-zinc-500 hover:text-indigo-400 uppercase tracking-wider mb-2 transition-colors">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Return to Factory Cluster
                </a>

                <div class="flex items-center gap-2 mb-1">
                    <span
                        class="text-[9px] font-mono font-bold uppercase tracking-widest px-2 py-0.5 rounded bg-indigo-500/10 text-indigo-400 border border-indigo-500/20">
                        CORE NODE INSPECTION
                    </span>
                    <span class="text-[10px] font-mono text-zinc-500">ID: #00{{ $quizz->id }}</span>
                </div>

                <h1 class="text-2xl font-display font-bold tracking-tight text-white">
                    {{ $quizz->title }}
                </h1>
            </div>

            <div class="flex items-center gap-3 self-start sm:self-center">
                <a href="#"
                    class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-zinc-950 hover:bg-zinc-900 border border-zinc-900 text-xs font-mono uppercase tracking-wider text-zinc-300 rounded-xl transition-all duration-150">
                    Modify Parameters
                </a>
                <a href="{{ route('add-new-q' , $quizz->id) }}"
                    class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-xs font-mono uppercase tracking-wider text-white font-bold rounded-xl transition-all duration-200 shadow-lg shadow-indigo-600/10">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Inject Question
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="space-y-6">
                <div class="bg-[#050507]/40 border border-zinc-900 rounded-2xl p-6 space-y-4 text-left">
                    <h3 class="text-xs font-mono uppercase tracking-widest text-zinc-400 font-bold">// Node Configurations
                    </h3>

                    <div class="space-y-3 font-mono text-xs pt-2">
                        <div class="flex justify-between py-2 border-b border-zinc-900/40">
                            <span class="text-zinc-600">CLUSTER CLASS</span>
                            <span class="text-zinc-300 font-bold">{{ Str::title($quizz->category) }} Array</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-zinc-900/40">
                            <span class="text-zinc-600">TIMEOUT VALUE</span>
                            <span class="text-zinc-300">{{ $quizz->time }} Minutes</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-zinc-900/40">
                            <span class="text-zinc-600">TOTAL QUESTIONS</span>
                            <span class="text-zinc-300 font-bold">{{ count($questions) }} Nodes</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-zinc-900/40">
                            <span class="text-zinc-600">RANDOMIZATION</span>
                            <span class="text-emerald-500 font-bold">ENABLED</span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="text-zinc-600">GLOBAL RUNS</span>
                            <span class="text-indigo-400 font-bold">1,420 Times</span>
                        </div>
                    </div>
                </div>

                <div class="bg-[#050507]/40 border border-zinc-900 rounded-2xl p-6 text-left space-y-2">
                    <h3 class="text-xs font-mono uppercase tracking-widest text-zinc-500 font-bold">// Description</h3>
                    <p class="text-xs text-zinc-400 leading-relaxed font-light font-sans">
                        {{ $quizz->desc }}
                    </p>
                </div>
                <div class="bg-[#050507]/40 border border-zinc-900 rounded-2xl p-6 text-left space-y-2">
                    <h3 class="text-xs font-mono uppercase tracking-widest text-zinc-500 font-bold">// Status</h3>
                    <p class="text-xs text-zinc-400 leading-relaxed font-light font-sans">
                        {{ strtoupper($quizz->status) }}
                    </p>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-4">
                <div class="text-left mb-2">
                    <h2 class="text-sm font-mono uppercase tracking-wider text-zinc-400 font-bold flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-indigo-500"></span>
                        Embedded Question Vectors ({{ count($questions) }})
                    </h2>
                </div>

                @forelse ($questions as $index => $question)
                    <div
                        class="bg-[#050507]/40 border border-zinc-900 p-5 rounded-2xl relative overflow-hidden group space-y-4 text-left">
                        <div class="flex items-start justify-between gap-4">
                            <div class="space-y-1">
                                <span class="text-[10px] font-mono text-zinc-600 uppercase tracking-tight">
                                    Vector NODE #{{ sprintf('%02d', $index + 1) }} —
                                    {{ $question->option_three ? 'MULTIPLE CHOICE' : 'BINARY CHOICE / BOOLEAN' }}
                                </span>
                                <h4 class="text-sm font-sans font-semibold text-zinc-200">
                                    {{ $question->content }}
                                </h4>
                            </div>

                            <div class="flex items-center gap-1.5 opacity-40 group-hover:opacity-100 transition-opacity">
                                <a href="{{ route('edit-question' , $question->id) }}" class="p-1.5 hover:text-indigo-400 transition-colors" title="Edit Question">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <a href="{{ route('delete-question' , $question->id) }}" class="p-1.5 hover:text-rose-400 transition-colors" title="Purge Question">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 pt-2">

                            <div
                                class="p-3 rounded-xl text-xs font-sans flex items-center justify-between {{ $question->correct_key == 'A' ? 'bg-emerald-950/10 border border-emerald-900/40 text-emerald-400' : 'bg-zinc-950/40 border border-zinc-900 text-zinc-400' }}">
                                <span>A. {{ $question->option_one }}</span>
                                @if($question->correct_key == 'A')
                                    <span
                                        class="text-[9px] font-mono font-bold uppercase tracking-widest px-1.5 py-0.5 bg-emerald-500/10 rounded border border-emerald-500/20">CORRECT</span>
                                @endif
                            </div>

                            <div
                                class="p-3 rounded-xl text-xs font-sans flex items-center justify-between {{ $question->correct_key == 'B' ? 'bg-emerald-950/10 border border-emerald-900/40 text-emerald-400' : 'bg-zinc-950/40 border border-zinc-900 text-zinc-400' }}">
                                <span>B. {{ $question->option_two }}</span>
                                @if($question->correct_key == 'B')
                                    <span
                                        class="text-[9px] font-mono font-bold uppercase tracking-widest px-1.5 py-0.5 bg-emerald-500/10 rounded border border-emerald-500/20">CORRECT</span>
                                @endif
                            </div>

                            @if($question->option_three)
                                <div
                                    class="p-3 rounded-xl text-xs font-sans flex items-center justify-between {{ $question->correct_key == 'C' ? 'bg-emerald-950/10 border border-emerald-900/40 text-emerald-400' : 'bg-zinc-950/40 border border-zinc-900 text-zinc-400' }}">
                                    <span>C. {{ $question->option_three }}</span>
                                    @if($question->correct_key == 'C')
                                        <span
                                            class="text-[9px] font-mono font-bold uppercase tracking-widest px-1.5 py-0.5 bg-emerald-500/10 rounded border border-emerald-500/20">CORRECT</span>
                                    @endif
                                </div>
                            @endif

                            @if($question->option_four)
                                <div
                                    class="p-3 rounded-xl text-xs font-sans flex items-center justify-between {{ $question->correct_key == 'D' ? 'bg-emerald-950/10 border border-emerald-900/40 text-emerald-400' : 'bg-zinc-950/40 border border-zinc-900 text-zinc-400' }}">
                                    <span>D. {{ $question->option_four }}</span>
                                    @if($question->correct_key == 'D')
                                        <span
                                            class="text-[9px] font-mono font-bold uppercase tracking-widest px-1.5 py-0.5 bg-emerald-500/10 rounded border border-emerald-500/20">CORRECT</span>
                                    @endif
                                </div>
                            @endif

                        </div>
                    </div>
                @empty
                    <div class="border border-dashed border-zinc-900 p-12 rounded-2xl text-center">
                        <p class="text-xs font-mono text-zinc-600 uppercase tracking-wider">// No question nodes linked into
                            current terminal</p>
                        <a href="{{ route('add-new-q', $quizz->id) }}"
                            class="inline-block mt-3 text-xs text-indigo-400 hover:underline font-mono">// Inject First Vector
                            Node</a>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
@endsection