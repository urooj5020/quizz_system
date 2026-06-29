@extends('admin.layouts.main')

@section('content')
    <div class="max-w-3xl mx-auto space-y-8">

        <div class="flex items-center justify-between border-b border-zinc-900 pb-6">
            <div class="text-left">
                <a href="{{ route('quizz-factory') }}"
                    class="inline-flex items-center gap-2 text-xs font-mono text-zinc-500 hover:text-indigo-400 uppercase tracking-wider mb-2 transition-colors">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Return to Factory Cluster
                </a>
                
                <h1 class="text-2xl font-display font-bold tracking-tight text-white flex items-center gap-2">
                    <span class="w-2 h-2 rounded bg-indigo-500 shadow-md shadow-indigo-500/50"></span>
                    {{ isset($quizz) ? 'Modify Configuration Node' : 'Initialize New Quiz Node' }}
                </h1>
                <p class="text-xs font-mono text-zinc-500 uppercase tracking-widest mt-1">
                    {{ isset($quizz) ? '// Mutating active matrix parameters for ID: #00'.$quizz->id : '// Inject new questionnaire parameters into system' }}
                </p>
            </div>
        </div>

        <form method="POST" action="{{ isset($quizz) ? route('update-quizz', $quizz->id) : route('add-quizz-info') }}"
            class="bg-[#050507]/40 border border-zinc-900 p-6 md:p-8 rounded-2xl shadow-xl relative overflow-hidden space-y-6">
            @csrf
            
            @if(isset($quizz))
                @method('PUT')
            @endif

            <div class="space-y-2 text-left">
                <label class="block text-xs font-mono uppercase tracking-wider text-zinc-500 font-bold">
                    // Quiz Module Title
                </label>
                <input type="text" name="title" value="{{ old('title', $quizz->title ?? '') }}" placeholder="e.g., Core Laravel Controller Routing Syntax"
                    class="w-full bg-[#050507] border @error('title') border-rose-900/60 text-rose-200 focus:border-rose-500 focus:ring-rose-500/20 @else border-zinc-900 focus:border-indigo-500 focus:ring-indigo-500 @enderror rounded-xl px-4 py-3 text-sm font-sans placeholder-zinc-700 focus:outline-none focus:ring-1 transition-all duration-200">
                
                @error('title')
                    <div class="flex items-center gap-1.5 font-mono text-[10px] uppercase tracking-wide text-rose-400/90 pl-1 pt-1">
                        <span class="text-rose-500 font-bold">!!</span> {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2 text-left">
                    <label class="block text-xs font-mono uppercase tracking-wider text-zinc-500 font-bold">
                        // Cluster Category Array
                    </label>
                    <select name="category"
                        class="w-full bg-[#050507] border @error('category') border-rose-900/60 text-rose-300 focus:border-rose-500 focus:ring-rose-500/20 @else border-zinc-900 focus:border-indigo-500 focus:ring-indigo-500 @enderror rounded-xl px-4 py-3 text-sm font-mono focus:outline-none focus:ring-1 transition-all duration-200">
                        <option value="">// Select Parameters</option>
                        <option value="syntax" {{ old('category', $quizz->category ?? '') == 'syntax' ? 'selected' : '' }}>Syntax Array</option>
                        <option value="logic" {{ old('category', $quizz->category ?? '') == 'logic' ? 'selected' : '' }}>Logic Arrays</option>
                        <option value="security" {{ old('category', $quizz->category ?? '') == 'security' ? 'selected' : '' }}>Security Protocols</option>
                    </select>

                    @error('category')
                        <div class="flex items-center gap-1.5 font-mono text-[10px] uppercase tracking-wide text-rose-400/90 pl-1 pt-1">
                            <span class="text-rose-500 font-bold">!!</span> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="space-y-2 text-left">
                    <label class="block text-xs font-mono uppercase tracking-wider text-zinc-500 font-bold">
                        // Timeout Constraint (Minutes)
                    </label>
                    <input type="number" placeholder="15" name="time" value="{{ old('time', $quizz->time ?? '') }}"
                        class="w-full bg-[#050507] border @error('time') border-rose-900/60 text-rose-200 focus:border-rose-500 focus:ring-rose-500/20 @else border-zinc-900 focus:border-indigo-500 focus:ring-indigo-500 @enderror rounded-xl px-4 py-3 text-sm font-mono placeholder-zinc-700 focus:outline-none focus:ring-1 transition-all duration-200">
                    
                    @error('time')
                        <div class="flex items-center gap-1.5 font-mono text-[10px] uppercase tracking-wide text-rose-400/90 pl-1 pt-1">
                            <span class="text-rose-500 font-bold">!!</span> {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="space-y-2 text-left">
                <label class="block text-xs font-mono uppercase tracking-wider text-zinc-500 font-bold">
                    // System Parameter Description
                </label>
                <textarea rows="4" name="desc"
                    placeholder="Describe the structural evaluation metrics or expectations of this questionnaire..."
                    class="w-full bg-[#050507] border @error('desc') border-rose-900/60 text-rose-200 focus:border-rose-500 focus:ring-rose-500/20 @else border-zinc-900 focus:border-indigo-500 focus:ring-indigo-500 @enderror rounded-xl px-4 py-3 text-sm font-sans placeholder-zinc-700 focus:outline-none focus:ring-1 transition-all duration-200 resize-none">{{ old('desc', $quizz->desc ?? '') }}</textarea>
                
                @error('desc')
                    <div class="flex items-center gap-1.5 font-mono text-[10px] uppercase tracking-wide text-rose-400/90 pl-1 pt-1">
                        <span class="text-rose-500 font-bold">!!</span> {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="pt-6 border-t border-zinc-900 flex items-center justify-end gap-4">
                <a href="{{ route('quizz-factory') }}"
                    class="px-4 py-2.5 bg-zinc-950 hover:bg-zinc-900 border border-zinc-900 text-xs font-mono uppercase tracking-wider text-zinc-400 hover:text-zinc-200 rounded-xl transition-all duration-150 text-center">
                    Abort Setup
                </a>

                <button type="submit"
                    class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-xs font-mono uppercase tracking-wider text-white font-bold rounded-xl transition-all duration-200 shadow-lg shadow-indigo-600/10">
                    {{ isset($quizz) ? 'Update Cluster configuration' : 'Move to next Step' }}
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </button>
            </div>

        </form>
    </div>
@endsection