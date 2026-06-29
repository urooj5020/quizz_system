@extends('admin.layouts.main')

@section('content')
    <div class="max-w-3xl mx-auto space-y-8">

        <div class="flex items-center justify-between border-b border-zinc-900 pb-6 text-left">
            <div>
                <a href="#"
                    class="inline-flex items-center gap-2 text-xs font-mono text-zinc-500 hover:text-indigo-400 uppercase tracking-wider mb-2 transition-colors">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Return to Quiz Blueprint
                </a>
                <h1 class="text-2xl font-display font-bold tracking-tight text-white flex items-center gap-2">
                    <span class="w-2 h-2 rounded bg-indigo-500 shadow-md shadow-indigo-500/50"></span>
                    Inject Question Vector
                </h1>
                <p class="text-xs font-mono text-zinc-500 uppercase tracking-widest mt-1">// Append interactive evaluation nodes to cluster</p>
            </div>
        </div>

        <form method="post" action="{{ route('add-new-question') }}"
            class="bg-[#050507]/40 border border-zinc-900 p-6 md:p-8 rounded-2xl shadow-xl space-y-6 relative overflow-hidden">
            @csrf
            
            <div class="space-y-2 text-left">
                <label class="block text-xs font-mono uppercase tracking-wider text-zinc-500 font-bold">
                    // Question Statement / Prompt
                </label>
                <input type="text" name="content" value="{{ old('content') }}"
                    placeholder="e.g., What is the primary operational complexity of a standard quicksort array pivot?"
                    class="w-full bg-[#050507] border @error('content') border-rose-900 focus:border-rose-500 @else border-zinc-900 focus:border-indigo-500 @enderror rounded-xl px-4 py-3 text-sm font-sans text-zinc-200 placeholder-zinc-700 focus:outline-none focus:ring-1 focus:ring-indigo-500 transition-all duration-200">
                @error('content')
                    <span class="text-rose-500 font-mono text-[10px] uppercase pl-1 block">!! {{ $message }}</span>
                @enderror
            </div>

            <div class="space-y-3 text-left">
                <label class="block text-xs font-mono uppercase tracking-wider text-zinc-500 font-bold mb-1">
                    // Option Variants Array (Mark correct variant node)
                </label>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div class="bg-[#050507] border @error('option_one') border-rose-900 @else border-zinc-900 @enderror hover:border-zinc-800 rounded-xl p-3 flex items-center gap-3 transition-all duration-200 focus-within:border-indigo-500/50">
                        <span class="text-xs font-mono font-bold text-zinc-600 px-2 py-1 bg-zinc-950 border border-zinc-900 rounded-lg">A</span>
                        <input type="text" name="option_one" value="{{ old('option_one') }}" placeholder="First parameter variant..."
                            class="flex-1 bg-transparent border-none p-0 text-xs text-zinc-200 placeholder-zinc-700 focus:ring-0 focus:outline-none">
                        <label class="flex items-center cursor-pointer p-1">
                            <input type="radio" name="correct_option" value="A" {{ old('correct_option') == 'A' ? 'checked' : '' }}
                                class="w-4 h-4 bg-[#050507] border border-zinc-800 text-emerald-500 focus:ring-offset-0 focus:ring-0">
                        </label>
                    </div>

                    <div class="bg-[#050507] border @error('option_two') border-rose-900 @else border-zinc-900 @enderror hover:border-zinc-800 rounded-xl p-3 flex items-center gap-3 transition-all duration-200 focus-within:border-indigo-500/50">
                        <span class="text-xs font-mono font-bold text-zinc-600 px-2 py-1 bg-zinc-950 border border-zinc-900 rounded-lg">B</span>
                        <input type="text" name="option_two" value="{{ old('option_two') }}" placeholder="Second parameter variant..."
                            class="flex-1 bg-transparent border-none p-0 text-xs text-zinc-200 placeholder-zinc-700 focus:ring-0 focus:outline-none">
                        <label class="flex items-center cursor-pointer p-1">
                            <input type="radio" name="correct_option" value="B" {{ old('correct_option') == 'B' ? 'checked' : '' }}
                                class="w-4 h-4 bg-[#050507] border border-zinc-800 text-emerald-500 focus:ring-offset-0 focus:ring-0">
                        </label>
                    </div>

                    <div class="bg-[#050507] border @error('option_three') border-rose-900 @else border-zinc-900 @enderror hover:border-zinc-800 rounded-xl p-3 flex items-center gap-3 transition-all duration-200 focus-within:border-indigo-500/50">
                        <span class="text-xs font-mono font-bold text-zinc-600 px-2 py-1 bg-zinc-950 border border-zinc-900 rounded-lg">C</span>
                        <input type="text" name="option_three" value="{{ old('option_three') }}" placeholder="Third parameter variant..."
                            class="flex-1 bg-transparent border-none p-0 text-xs text-zinc-200 placeholder-zinc-700 focus:ring-0 focus:outline-none">
                        <label class="flex items-center cursor-pointer p-1">
                            <input type="radio" name="correct_option" value="C" {{ old('correct_option') == 'C' ? 'checked' : '' }}
                                class="w-4 h-4 bg-[#050507] border border-zinc-800 text-emerald-500 focus:ring-offset-0 focus:ring-0">
                        </label>
                    </div>

                    <div class="bg-[#050507] border @error('option_four') border-rose-900 @else border-zinc-900 @enderror hover:border-zinc-800 rounded-xl p-3 flex items-center gap-3 transition-all duration-200 focus-within:border-indigo-500/50">
                        <span class="text-xs font-mono font-bold text-zinc-600 px-2 py-1 bg-zinc-950 border border-zinc-900 rounded-lg">D</span>
                        <input type="text" name="option_four" value="{{ old('option_four') }}" placeholder="Fourth parameter variant..."
                            class="flex-1 bg-transparent border-none p-0 text-xs text-zinc-200 placeholder-zinc-700 focus:ring-0 focus:outline-none">
                        <label class="flex items-center cursor-pointer p-1">
                            <input type="radio" name="correct_option" value="D" {{ old('correct_option') == 'D' ? 'checked' : '' }}
                                class="w-4 h-4 bg-[#050507] border border-zinc-800 text-emerald-500 focus:ring-offset-0 focus:ring-0">
                        </label>
                    </div>

                </div>
                @if($errors->has('correct_option') || $errors->has('option_one') || $errors->has('option_two') || $errors->has('option_three') || $errors->has('option_four'))
                    <span class="text-rose-500 font-mono text-[10px] uppercase pl-1 block mt-2">!! Please fully populate configurations and select one core correct option vector</span>
                @endif
            </div>

            <div class="pt-6 border-t border-zinc-900 flex items-center justify-end gap-4">
                <button type="button" class="px-4 py-2.5 bg-zinc-950 hover:bg-zinc-900 border border-zinc-900 text-xs font-mono uppercase tracking-wider text-zinc-400 hover:text-zinc-200 rounded-xl transition-all duration-150">
                    Cancel
                </button>


                 <button type="submit" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-xs font-mono uppercase tracking-wider text-white font-bold rounded-xl transition-all duration-200 shadow-lg shadow-indigo-600/10">
                    Commit Vector Node
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7-7M21 12H3" />
                    </svg>
                </button>
            </div>

        </form>
    </div>
@endsection