@extends('admin.layouts.main')

@section('content')
    <div class="space-y-8">

        <div
            class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-admin pb-6 text-left">
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <a href="#"
                        class="text-[10px] font-mono text-admin-muted hover:text-admin-fg transition-colors uppercase tracking-wider">
                        &larr; Back to Users
                    </a>
                    <span class="text-admin-muted-soft">/</span>
                    <span class="text-[10px] font-mono text-admin-fg uppercase tracking-wider">User Profile</span>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                    <h1 class="text-2xl font-display font-bold tracking-tight text-admin-fg">
                        {{ $user->name }}
                    </h1>
                    @if(($user->status ?? 'active') === 'active')
                        <span
                            class="px-2 py-0.5 rounded bg-emerald-500/10 border border-emerald-500/20 text-[9px] font-mono font-bold text-emerald-400 uppercase tracking-widest">Active</span>
                    @else
                        <span
                            class="px-2 py-0.5 rounded bg-admin-raised border border-admin-strong text-[9px] font-mono font-bold text-admin-muted uppercase tracking-widest">Inactive</span>
                    @endif
                </div>

                <p class="text-xs font-mono text-admin-muted mt-1.5">
                    Joined: <span
                        class="text-admin-fg">{{ now()->parse($user->created_at)->format('M d, Y') }}</span>
                </p>
            </div>

            <div class="text-left sm:text-right font-mono text-[11px] text-admin-muted">
                <span class="text-admin-muted-soft block text-[9px] uppercase tracking-wider">Email</span>
                <span class="text-admin-fg font-bold">{{ $user->email }}</span>
            </div>
        </div>

        <div class="bg-admin-surface border border-admin rounded-xl p-4">
            <form
                action="{{ $user->status === 'active' ? route('deactivate', $user->id) : route('reactivate', $user->id) }}"
                method="POST" class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                @csrf
                @method('PATCH')

                <div class="text-left">
                    <span class="text-[10px] font-mono text-admin-muted uppercase tracking-wider block mb-0.5">Account Status</span>
                    <p class="text-xs text-admin-fg">
                        This account is currently:
                        <span
                            class="font-mono font-bold uppercase {{ ($user->status ?? 'active') === 'active' ? 'text-emerald-400' : 'text-admin-muted' }}">
                            {{ $user->status ?? 'active' }}
                        </span>
                    </p>
                </div>

                <input type="hidden" name="current_status" value="{{ $user->status ?? 'active' }}">

                @if(($user->status ?? 'active') === 'active')
                    <button type="submit"
                        class="px-4 py-2 bg-admin-raised hover:bg-rose-500/10 border border-admin hover:border-rose-500/30 text-xs font-mono font-bold uppercase tracking-wide text-rose-500 rounded-lg transition-all duration-150">
                        Deactivate Account
                    </button>
                @else
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-xs font-mono font-bold uppercase tracking-wide text-white rounded-lg transition-all duration-150 shadow-lg shadow-indigo-600/10">
                        Activate Account
                    </button>
                @endif
            </form>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-admin-surface border border-admin rounded-xl p-4 flex items-center justify-between">
                <div>
                    <span class="text-admin-muted-soft block text-[9px] font-mono uppercase tracking-wider">Attempted</span>
                    <span class="text-2xl font-bold text-admin-fg tracking-tight mt-1 block">24</span>
                </div>
                <div
                    class="w-10 h-10 rounded-lg bg-admin-badge border border-admin-badge flex items-center justify-center font-mono text-admin-fg font-bold text-sm">
                    ∑
                </div>
            </div>

            <div class="bg-admin-surface border border-admin rounded-xl p-4 flex items-center justify-between">
                <div>
                    <span class="text-admin-muted-soft block text-[9px] font-mono uppercase tracking-wider">Passed</span>
                    <span class="text-2xl font-bold text-emerald-400 tracking-tight mt-1 block">19</span>
                </div>
                <div
                    class="w-10 h-10 rounded-lg bg-emerald-500/5 border border-emerald-500/10 flex items-center justify-center font-mono text-emerald-400 font-bold text-sm">
                    ✓
                </div>
            </div>

            <div class="bg-admin-surface border border-admin rounded-xl p-4 flex items-center justify-between">
                <div>
                    <span class="text-admin-muted-soft block text-[9px] font-mono uppercase tracking-wider">Failed</span>
                    <span class="text-2xl font-bold text-rose-500 tracking-tight mt-1 block">05</span>
                </div>
                <div
                    class="w-10 h-10 rounded-lg bg-rose-500/5 border border-rose-500/10 flex items-center justify-center font-mono text-rose-500 font-bold text-sm">
                    ✕
                </div>
            </div>
        </div>

        <div class="space-y-4">
            <div class="flex items-center justify-between border-b border-admin pb-2">
                <h2 class="text-sm font-bold text-admin-fg uppercase tracking-wide font-mono">Quiz History</h2>
            </div>

            <form action="#" method="GET"
                class="grid grid-cols-1 sm:grid-cols-3 gap-4 bg-admin-secondary border border-admin p-3 rounded-xl">
                <div class="relative sm:col-span-2">
                    <input type="text" name="quiz_search" placeholder="Filter by quiz title..." value=""
                        class="w-full bg-admin-surface border border-admin rounded-lg px-3 py-1.5 text-xs font-mono text-admin-fg placeholder-admin-muted-soft focus:outline-none focus:border-indigo-500 transition-colors">
                </div>

                <div>
                    <select name="result_status"
                        class="w-full bg-admin-surface border border-admin rounded-lg px-3 py-1.5 text-xs font-mono text-admin-muted focus:outline-none focus:border-indigo-500 transition-colors">
                        <option value="">All Results</option>
                        <option value="passed">Passed</option>
                        <option value="failed">Failed</option>
                    </select>
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <div
                class="bg-admin-surface border border-admin rounded-2xl p-5 flex flex-col justify-between relative overflow-hidden transition-all duration-300 hover:border-admin-strong group shadow-admin">
                <div class="space-y-4 text-left">
                    <div class="flex items-center justify-between text-[10px] font-mono">
                        <span class="font-bold text-admin-fg uppercase tracking-wider">[Back-End Development]</span>
                        <span class="text-admin-muted-soft">2026-06-25</span>
                    </div>
                    <div class="space-y-2">
                        <h3
                            class="text-sm font-display font-bold text-admin-fg group-hover:text-admin-fg transition-colors tracking-tight uppercase">
                            Laravel Application Structures</h3>
                        <p class="text-[11px] leading-relaxed text-admin-muted font-normal">Test understanding of Service
                            Providers, Middleware layers, and Service Container binding mechanics.</p>
                    </div>
                </div>
                <div class="mt-6 pt-4 border-t border-admin flex items-center justify-between">
                    <span class="text-[10px] font-mono text-admin-muted">Total Items: <span class="text-admin-fg font-bold">10
                            Questions</span></span>
                    <button type="button"
                        class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-[10px] font-mono uppercase tracking-wider text-white font-bold rounded-lg transition-all duration-150">Start
                        Quiz</button>
                </div>
            </div>

            <div
                class="bg-admin-surface border border-admin rounded-2xl p-5 flex flex-col justify-between relative overflow-hidden transition-all duration-300 hover:border-admin-strong group shadow-admin">
                <div class="space-y-4 text-left">
                    <div class="flex items-center justify-between text-[10px] font-mono">
                        <span class="font-bold text-admin-fg uppercase tracking-wider">[Data Structures]</span>
                        <span class="text-admin-muted">2026-06-24</span>
                    </div>
                    <div class="space-y-2">
                        <h3
                            class="text-sm font-display font-bold text-admin-fg group-hover:text-admin-fg transition-colors tracking-tight uppercase">
                            Discrete Algorithmic Logic</h3>
                        <p class="text-[11px] leading-relaxed text-admin-muted font-normal">Examine complex tree
                            implementations, graphing structures, optimization trees, and matrix mapping vectors.</p>
                    </div>
                </div>
                <div class="mt-6 pt-4 border-t border-admin flex items-center justify-between">
                    <span class="text-[10px] font-mono text-admin-muted">Total Items: <span class="text-admin-fg font-bold">15
                            Questions</span></span>
                    <button type="button"
                        class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-[10px] font-mono uppercase tracking-wider text-white font-bold rounded-lg transition-all duration-150">Start
                        Quiz</button>
                </div>
            </div>

            <div
                class="bg-admin-surface border border-admin rounded-2xl p-5 flex flex-col justify-between relative overflow-hidden transition-all duration-300 hover:border-admin-strong group shadow-admin">
                <div class="space-y-4 text-left">
                    <div class="flex items-center justify-between text-[10px] font-mono">
                        <span class="font-bold text-pink-500 uppercase tracking-wider">[Interface Design]</span>
                        <span class="text-admin-muted">2026-06-22</span>
                    </div>
                    <div class="space-y-2">
                        <h3
                            class="text-sm font-display font-bold text-admin-fg group-hover:text-admin-fg transition-colors tracking-tight uppercase">
                            Human Computer Interaction</h3>
                        <p class="text-[11px] leading-relaxed text-admin-muted font-normal">Evaluates cognitive load balance
                            variables, responsive grid configurations, layout rules, and usability protocols.</p>
                    </div>
                </div>
                <div class="mt-6 pt-4 border-t border-admin flex items-center justify-between">
                    <span class="text-[10px] font-mono text-admin-muted">Total Items: <span class="text-admin-fg font-bold">10
                            Questions</span></span>
                    <button type="button"
                        class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-[10px] font-mono uppercase tracking-wider text-white font-bold rounded-lg transition-all duration-150">Start
                        Quiz</button>
                </div>
            </div>

        </div>

        <div class="pt-4 flex items-center justify-between text-xs font-mono text-admin-muted">
            <div>Showing 1 to 3 of 24 entries</div>
            <div class="flex gap-2">
                <a href="#"
                    class="px-3 py-1.5 bg-admin-raised border border-admin text-admin-muted-soft rounded-lg cursor-not-allowed pointer-events-none">Previous</a>
                <a href="#"
                    class="px-3 py-1.5 bg-admin-raised border border-admin hover:border-admin-strong text-admin-muted rounded-lg hover:text-admin-fg transition-colors duration-150">Next</a>
            </div>
        </div>

    </div>
@endsection