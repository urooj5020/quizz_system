@extends('admin.layouts.main')

@section('content')
    <div class="space-y-8">
        
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-zinc-900 pb-6 text-left">
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <span class="text-[9px] font-mono font-bold uppercase tracking-widest px-2 py-0.5 rounded bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                        FACTORY CLUSTER
                    </span>
                    <span class="text-[10px] font-mono text-zinc-500">
                        Platform Sync: Verified
                    </span>
                </div>

                <h1 class="text-2xl font-display font-bold tracking-tight text-white">
                    Quiz Framework Factory
                </h1>

                <div class="flex items-center gap-4 font-mono text-[10px] text-zinc-500 uppercase tracking-wider mt-1.5">
                    <span>// Evaluative Questionnaire Repositories</span>
                    <span class="hidden md:inline text-zinc-600">|</span>
                    <span class="hidden md:inline">Data Matrix Refresh: <span class="text-zinc-300 font-bold">Real-Time</span></span>
                </div>
            </div>

            <a href="{{ route('add-new-quizz') }}"
                class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-xs font-mono uppercase tracking-wider text-white font-bold rounded-xl transition-all duration-200 shadow-lg shadow-indigo-600/10 self-start sm:self-center">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Initialize New Quiz
            </a>
        </div>

        <form action="#" method="GET" class="grid grid-cols-1 sm:grid-cols-3 gap-4 bg-zinc-950/20 border border-zinc-900 p-4 rounded-xl">
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search arrays..."
                    class="w-full bg-[#050507] border border-zinc-900 rounded-lg px-3 py-2 text-xs font-mono text-zinc-300 placeholder-zinc-600 focus:outline-none focus:border-indigo-500 transition-colors">
            </div>

            <div>
                <select name="category"
                    class="w-full bg-[#050507] border border-zinc-900 rounded-lg px-3 py-2 text-xs font-mono text-zinc-400 focus:outline-none focus:border-indigo-500 transition-colors"
                    onchange="this.form.submit()">
                    <option value="">// Select Category</option>
                    <option value="syntax" {{ request('category') == 'syntax' ? 'selected' : '' }}>Syntax Array</option>
                    <option value="logic" {{ request('category') == 'logic' ? 'selected' : '' }}>Logic Arrays</option>
                    <option value="security" {{ request('category') == 'security' ? 'selected' : '' }}>Security Protocols</option>
                </select>
            </div>

            <div>
                <select name="sort_by"
                    class="w-full bg-[#050507] border border-zinc-900 rounded-lg px-3 py-2 text-xs font-mono text-zinc-400 focus:outline-none focus:border-indigo-500 transition-colors"
                    onchange="this.form.submit()">
                    <option value="latest" {{ request('sort_by') == 'latest' ? 'selected' : '' }}>Sort: Latest Commits</option>
                    <option value="questions_high" {{ request('sort_by') == 'questions_high' ? 'selected' : '' }}>Sort: Dynamic High Count</option>
                </select>
            </div>
        </form>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($quizzData as $quizz)
                <div class="bg-[#050507]/40 border border-zinc-900 hover:border-zinc-800/80 rounded-2xl p-5 flex flex-col justify-between relative overflow-hidden transition-all duration-300 group shadow-xl hover:shadow-2xl">
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 to-purple-500/0 opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none duration-500"></div>

                    <div class="relative z-10 space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="px-2.5 py-0.5 rounded-md bg-zinc-900 border border-zinc-800 font-mono text-[9px] font-bold text-zinc-400 uppercase tracking-wider">
                                {{ $quizz->category }}
                            </span>
                            <div class="flex items-center gap-1.5 font-mono text-[10px] text-zinc-500">
                                <span class="w-1.5 h-1.5 rounded-full bg-indigo-500 shadow-sm shadow-indigo-500/50"></span>
                                12 System Nodes
                            </div>
                        </div>

                        <a href="{{ route('show', $quizz->id) }}" class="block text-left focus:outline-none group/link">
                            <h3 class="text-sm font-display font-bold text-zinc-100 group-hover/link:text-indigo-400 group-hover:text-white transition-colors tracking-tight line-clamp-1">
                                {{ $quizz->title }}
                            </h3>
                            <p class="text-xs text-zinc-500 mt-1.5 line-clamp-2 leading-relaxed font-light">
                                {{ $quizz->desc }}
                            </p>
                        </a>
                    </div>

                    <div class="mt-6 pt-4 border-t border-zinc-900/60 flex items-center justify-between relative z-10">
                        <span class="text-[9px] font-mono text-zinc-600 tracking-tight">ID: #00{{ $quizz->id }}</span>

                        <div class="flex items-center gap-2">
                            <a href="{{ route('edit' , $quizz->id) }}"
                                class="p-2 bg-zinc-950/60 hover:bg-indigo-950/30 border border-zinc-900 hover:border-indigo-900/40 text-zinc-500 hover:text-indigo-400 rounded-xl transition-all duration-150 focus:outline-none"
                                title="Edit Terminal Parameters">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>

                            <form action="{{ route('delete' , $quizz->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to purge this cluster?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="p-2 bg-zinc-950/60 hover:bg-rose-950/30 border border-zinc-900 hover:border-rose-900/40 text-zinc-600 hover:text-rose-400 rounded-xl transition-all duration-150 focus:outline-none"
                                    title="Purge Matrix Entry">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8 pt-4 border-t border-zinc-900/40 flex items-center justify-between text-xs font-mono text-zinc-500">
            <div>Showing 1 to 6 of 24 active clusters</div>
            <div class="flex gap-2">
                <a href="#" class="px-3 py-1.5 bg-zinc-950 border border-zinc-900 hover:border-zinc-800 text-zinc-400 rounded-lg hover:text-white transition-colors duration-150">Previous</a>
                <a href="#" class="px-3 py-1.5 bg-zinc-950 border border-zinc-900 rounded-lg hover:text-white transition-colors duration-150">Next</a>
            </div>
        </div>
    </div>
@endsection