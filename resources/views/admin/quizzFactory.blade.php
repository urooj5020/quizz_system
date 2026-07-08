@extends('admin.layouts.main')

@section('content')
    <div class="space-y-8">
        
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-admin pb-6 text-left">
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <span class="text-[9px] font-mono font-bold uppercase tracking-widest px-2 py-0.5 rounded bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                        Quiz Manager
                    </span>
                    <span class="text-[10px] font-mono text-admin-muted">
                        Platform Sync: Verified
                    </span>
                </div>

                <h1 class="text-2xl font-display font-bold tracking-tight text-admin-fg">
                    Quiz Manager
                </h1>

                <div class="flex items-center gap-4 font-mono text-[10px] text-admin-muted uppercase tracking-wider mt-1.5">
                    <span>Create and manage your quizzes</span>
                    <span class="hidden md:inline text-admin-muted-soft">|</span>
                    <span class="hidden md:inline">Live Data: <span class="text-admin-fg font-bold">Active</span></span>
                </div>
            </div>

            <a href="{{ route('add-new-quizz') }}"
                class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-xs font-mono uppercase tracking-wider text-white font-bold rounded-xl transition-all duration-200 shadow-lg shadow-indigo-600/10 self-start sm:self-center">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Create New Quiz
            </a>
        </div>

        <form action="#" method="GET" class="grid grid-cols-1 sm:grid-cols-3 gap-4 bg-admin-secondary border border-admin p-4 rounded-xl">
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search quizzes..."
                    class="w-full bg-admin-surface border border-admin rounded-lg px-3 py-2 text-xs font-mono text-admin-fg placeholder-admin-muted-soft focus:outline-none focus:border-indigo-500 transition-colors">
            </div>

            <div>
                <select name="category"
                    class="w-full bg-admin-surface border border-admin rounded-lg px-3 py-2 text-xs font-mono text-admin-muted focus:outline-none focus:border-indigo-500 transition-colors"
                    onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    <option value="syntax" {{ request('category') == 'syntax' ? 'selected' : '' }}>Syntax</option>
                    <option value="logic" {{ request('category') == 'logic' ? 'selected' : '' }}>Logic</option>
                    <option value="security" {{ request('category') == 'security' ? 'selected' : '' }}>Security</option>
                </select>
            </div>

            <div>
                <select name="sort_by"
                    class="w-full bg-admin-surface border border-admin rounded-lg px-3 py-2 text-xs font-mono text-admin-muted focus:outline-none focus:border-indigo-500 transition-colors"
                    onchange="this.form.submit()">
                    <option value="latest" {{ request('sort_by') == 'latest' ? 'selected' : '' }}>Sort: Latest</option>
                    <option value="questions_high" {{ request('sort_by') == 'questions_high' ? 'selected' : '' }}>Sort: Most Questions</option>
                </select>
            </div>
        </form>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($quizzData as $quizz)
                <div class="bg-admin-surface border border-admin hover:border-admin-strong rounded-2xl p-5 flex flex-col justify-between relative overflow-hidden transition-all duration-300 group shadow-admin hover:shadow-2xl">
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 to-purple-500/0 opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none duration-500"></div>

                    <div class="relative z-10 space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="px-2.5 py-0.5 rounded-md bg-admin-raised border border-admin font-mono text-[9px] font-bold text-admin-muted uppercase tracking-wider">
                                {{ $quizz->category }}
                            </span>
                            <div class="flex items-center gap-1.5 font-mono text-[10px] text-admin-muted">
                                <span class="w-1.5 h-1.5 rounded-full bg-indigo-500 shadow-sm shadow-white/10"></span>
                                Active
                            </div>
                        </div>

                        <a href="{{ route('show', $quizz->id) }}" class="block text-left focus:outline-none group/link">
                            <h3 class="text-sm font-display font-bold text-admin-fg group-hover/link:text-admin-fg group-hover:text-admin-fg transition-colors tracking-tight line-clamp-1">
                                {{ $quizz->title }}
                            </h3>
                            <p class="text-xs text-admin-muted mt-1.5 line-clamp-2 leading-relaxed font-light">
                                {{ $quizz->desc }}
                            </p>
                        </a>
                    </div>

                    <div class="mt-6 pt-4 border-t border-admin flex items-center justify-between relative z-10">
                        <span class="text-[9px] font-mono text-admin-muted-soft tracking-tight">ID: #00{{ $quizz->id }}</span>

                        <div class="flex items-center gap-2">
                            <a href="{{ route('edit' , $quizz->id) }}"
                                class="p-2 bg-admin-raised hover:bg-admin-secondary border border-admin hover:border-admin-strong text-admin-muted hover:text-admin-fg rounded-xl transition-all duration-150 focus:outline-none"
                                title="Edit Quiz">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>

                            <form action="{{ route('delete' , $quizz->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this quiz?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="p-2 bg-admin-raised hover:bg-rose-950/30 border border-admin hover:border-rose-900/40 text-admin-muted hover:text-rose-400 rounded-xl transition-all duration-150 focus:outline-none"
                                    title="Delete Quiz">
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

        <div class="mt-8 pt-4 border-t border-admin flex items-center justify-between text-xs font-mono text-admin-muted">
            <div>Showing 1 to 6 of 24 quizzes</div>
            <div class="flex gap-2">
                <a href="#" class="px-3 py-1.5 bg-admin-raised border border-admin hover:border-admin-strong text-admin-muted rounded-lg hover:text-admin-fg transition-colors duration-150">Previous</a>
                <a href="#" class="px-3 py-1.5 bg-admin-raised border border-admin rounded-lg hover:text-admin-fg transition-colors duration-150">Next</a>
            </div>
        </div>
    </div>
@endsection