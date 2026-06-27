@extends('admin.layouts.main')

@section('content')
    <div class="max-w-3xl mx-auto space-y-8">

        <div class="flex items-center justify-between border-b border-zinc-900 pb-6">
            <div class="text-left">
                <a href="#"
                    class="inline-flex items-center gap-2 text-xs font-mono text-zinc-500 hover:text-indigo-400 uppercase tracking-wider mb-2 transition-colors">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Return to Factory Cluster
                </a>
                <h1 class="text-2xl font-display font-bold tracking-tight text-white flex items-center gap-2">
                    <span class="w-2 h-2 rounded bg-indigo-500 shadow-md shadow-indigo-500/50"></span>
                    Initialize New Quiz Node
                </h1>
                <p class="text-xs font-mono text-zinc-500 uppercase tracking-widest mt-1">// Inject new questionnaire
                    parameters into system</p>
            </div>
        </div>

        <div
            class="bg-[#050507]/40 border border-zinc-900 p-6 md:p-8 rounded-2xl shadow-xl relative overflow-hidden space-y-6">

            <div class="space-y-2 text-left">
                <label class="block text-xs font-mono uppercase tracking-wider text-zinc-500 font-bold">
                    // Quiz Module Title
                </label>
                <input type="text" placeholder="e.g., Core Laravel Controller Routing Syntax"
                    class="w-full bg-[#050507] border border-zinc-900 rounded-xl px-4 py-3 text-sm font-sans text-zinc-200 placeholder-zinc-700 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all duration-200">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2 text-left">
                    <label class="block text-xs font-mono uppercase tracking-wider text-zinc-500 font-bold">
                        // Cluster Category Array
                    </label>
                    <select
                        class="w-full bg-[#050507] border border-zinc-900 rounded-xl px-4 py-3 text-sm font-mono text-zinc-400 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all duration-200">
                        <option value="">// Select Parameters</option>
                        <option value="syntax">Syntax Array</option>
                        <option value="logic">Logic Arrays</option>
                        <option value="security">Security Protocols</option>
                    </select>
                </div>

                <div class="space-y-2 text-left">
                    <label class="block text-xs font-mono uppercase tracking-wider text-zinc-500 font-bold">
                        // Timeout Constraint (Minutes)
                    </label>
                    <input type="number" placeholder="15"
                        class="w-full bg-[#050507] border border-zinc-900 rounded-xl px-4 py-3 text-sm font-mono text-zinc-200 placeholder-zinc-700 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all duration-200">
                </div>
            </div>

            <div class="space-y-2 text-left">
                <label class="block text-xs font-mono uppercase tracking-wider text-zinc-500 font-bold">
                    // System Parameter Description
                </label>
                <textarea rows="4"
                    placeholder="Describe the structural evaluation metrics or expectations of this questionnaire..."
                    class="w-full bg-[#050507] border border-zinc-900 rounded-xl px-4 py-3 text-sm font-sans text-zinc-200 placeholder-zinc-700 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all duration-200 resize-none"></textarea>
            </div>

            <div class="pt-2 border-t border-zinc-900/60 space-y-4">
                <div class="flex items-start gap-3 text-left">
                    <div class="flex items-center h-5 mt-0.5">
                        <input type="checkbox"
                            class="w-4 h-4 bg-[#050507] border border-zinc-900 text-indigo-600 rounded focus:ring-indigo-500/20 focus:ring-offset-0 focus:outline-none">
                    </div>
                    <div>
                        <span class="text-xs font-mono uppercase tracking-wider text-zinc-300 block">Randomize Question
                            Arrays</span>
                        <span class="text-[11px] text-zinc-500 block">Shuffle question vectors for each distinct active
                            terminal session.</span>
                    </div>
                </div>
            </div>

            <div class="pt-6 border-t border-zinc-900 flex items-center justify-end gap-4">
                <button
                    class="px-4 py-2.5 bg-zinc-950 hover:bg-zinc-900 border border-zinc-900 text-xs font-mono uppercase tracking-wider text-zinc-400 hover:text-zinc-200 rounded-xl transition-all duration-150">
                    Abort Setup
                </button>

                <button
                    class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-xs font-mono uppercase tracking-wider text-white font-bold rounded-xl transition-all duration-200 shadow-lg shadow-indigo-600/10">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    Commit Quiz Node
                </button>
            </div>

        </div>
    </div>
@endsection