@extends('admin.layouts.main')

@section('content')
    <div class="space-y-8">

        <div
            class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-zinc-900 pb-6 text-left">
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <a href="#"
                        class="text-[10px] font-mono text-zinc-500 hover:text-zinc-300 transition-colors uppercase tracking-wider">
                        &larr; Back to Users
                    </a>
                    <span class="text-zinc-700">/</span>
                    <span class="text-[10px] font-mono text-indigo-400 uppercase tracking-wider">Student Profile</span>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                    <h1 class="text-2xl font-display font-bold tracking-tight text-white">
                        {{ $user->name }}
                    </h1>
                    @if(($user->status ?? 'active') === 'active')
                        <span
                            class="px-2 py-0.5 rounded bg-emerald-500/10 border border-emerald-500/20 text-[9px] font-mono font-bold text-emerald-400 uppercase tracking-widest">Active</span>
                    @else
                        <span
                            class="px-2 py-0.5 rounded bg-zinc-800 border border-zinc-700 text-[9px] font-mono font-bold text-zinc-400 uppercase tracking-widest">Inactive</span>
                    @endif
                </div>

                <p class="text-xs font-mono text-zinc-500 mt-1.5">
                    Joined System: <span
                        class="text-zinc-400">{{ now()->parse($user->created_at)->format('M d, Y') }}</span>
                </p>
            </div>

            <div class="text-left sm:text-right font-mono text-[11px] text-zinc-500">
                <span class="text-zinc-600 block text-[9px] uppercase tracking-wider">Email Address</span>
                <span class="text-zinc-300 font-bold">{{ $user->email }}</span>
            </div>
        </div>

        <div class="bg-[#050507] border border-zinc-900 rounded-xl p-4">
            <form
                action="{{ $user->status === 'active' ? route('deactivate', $user->id) : route('reactivate', $user->id) }}"
                method="POST" class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                @csrf
                @method('PATCH')

                <div class="text-left">
                    <span class="text-[10px] font-mono text-zinc-500 uppercase tracking-wider block mb-0.5">// Security
                        Authorization Layer</span>
                    <p class="text-xs text-zinc-300">
                        Account access is currently set to:
                        <span
                            class="font-mono font-bold uppercase {{ ($user->status ?? 'active') === 'active' ? 'text-emerald-400' : 'text-zinc-400' }}">
                            {{ $user->status ?? 'active' }}
                        </span>
                    </p>
                </div>

                <input type="hidden" name="current_status" value="{{ $user->status ?? 'active' }}">

                @if(($user->status ?? 'active') === 'active')
                    <button type="submit"
                        class="px-4 py-2 bg-zinc-900 hover:bg-rose-950/20 border border-zinc-800 hover:border-rose-900/30 text-xs font-mono font-bold uppercase tracking-wide text-rose-400 rounded-lg transition-all duration-150">
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
            <div class="bg-[#050507] border border-zinc-900 rounded-xl p-4 flex items-center justify-between">
                <div>
                    <span class="text-zinc-600 block text-[9px] font-mono uppercase tracking-wider">Total Attempted</span>
                    <span class="text-2xl font-bold text-white tracking-tight mt-1 block">24</span>
                </div>
                <div
                    class="w-10 h-10 rounded-lg bg-indigo-500/5 border border-indigo-500/10 flex items-center justify-center font-mono text-indigo-400 font-bold text-sm">
                    ∑
                </div>
            </div>

            <div class="bg-[#050507] border border-zinc-900 rounded-xl p-4 flex items-center justify-between">
                <div>
                    <span class="text-zinc-600 block text-[9px] font-mono uppercase tracking-wider">Passed Quizzes</span>
                    <span class="text-2xl font-bold text-emerald-400 tracking-tight mt-1 block">19</span>
                </div>
                <div
                    class="w-10 h-10 rounded-lg bg-emerald-500/5 border border-emerald-500/10 flex items-center justify-center font-mono text-emerald-400 font-bold text-sm">
                    ✓
                </div>
            </div>

            <div class="bg-[#050507] border border-zinc-900 rounded-xl p-4 flex items-center justify-between">
                <div>
                    <span class="text-zinc-600 block text-[9px] font-mono uppercase tracking-wider">Failed Quizzes</span>
                    <span class="text-2xl font-bold text-rose-500 tracking-tight mt-1 block">05</span>
                </div>
                <div
                    class="w-10 h-10 rounded-lg bg-rose-500/5 border border-rose-500/10 flex items-center justify-center font-mono text-rose-500 font-bold text-sm">
                    ✕
                </div>
            </div>
        </div>

        <div class="space-y-4">
            <div class="flex items-center justify-between border-b border-zinc-900 pb-2">
                <h2 class="text-sm font-bold text-zinc-300 uppercase tracking-wide font-mono">// Quiz Attempt History</h2>
            </div>

            <form action="#" method="GET"
                class="grid grid-cols-1 sm:grid-cols-3 gap-4 bg-zinc-950/20 border border-zinc-900 p-3 rounded-xl">
                <div class="relative sm:col-span-2">
                    <input type="text" name="quiz_search" placeholder="Filter by quiz title or reference ID..." value=""
                        class="w-full bg-[#050507] border border-zinc-900 rounded-lg px-3 py-1.5 text-xs font-mono text-zinc-300 placeholder-zinc-600 focus:outline-none focus:border-indigo-500 transition-colors">
                </div>

                <div>
                    <select name="result_status"
                        class="w-full bg-[#050507] border border-zinc-900 rounded-lg px-3 py-1.5 text-xs font-mono text-zinc-400 focus:outline-none focus:border-indigo-500 transition-colors">
                        <option value="">All Results</option>
                        <option value="passed">Status: Passed</option>
                        <option value="failed">Status: Failed</option>
                    </select>
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <div
                class="bg-[#050507]/40 border border-zinc-900 rounded-2xl p-5 flex flex-col justify-between relative overflow-hidden transition-all duration-300 hover:border-zinc-800/80 group shadow-xl">
                <div class="space-y-4 text-left">
                    <div class="flex items-center justify-between text-[10px] font-mono">
                        <span class="font-bold text-indigo-400 uppercase tracking-wider">[Back-End Development]</span>
                        <span class="text-zinc-600">2026-06-25</span>
                    </div>
                    <div class="space-y-2">
                        <h3
                            class="text-sm font-display font-bold text-zinc-100 group-hover:text-white transition-colors tracking-tight uppercase">
                            Laravel Application Structures</h3>
                        <p class="text-[11px] leading-relaxed text-zinc-500 font-normal">Test understanding of Service
                            Providers, Middleware layers, and Service Container binding mechanics.</p>
                    </div>
                </div>
                <div class="mt-6 pt-4 border-t border-zinc-900/60 flex items-center justify-between">
                    <span class="text-[10px] font-mono text-zinc-500">Total Items: <span class="text-zinc-300 font-bold">10
                            Questions</span></span>
                    <button type="button"
                        class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-[10px] font-mono uppercase tracking-wider text-white font-bold rounded-lg transition-all duration-150">Start
                        Quiz</button>
                </div>
            </div>

            <div
                class="bg-[#050507]/40 border border-zinc-900 rounded-2xl p-5 flex flex-col justify-between relative overflow-hidden transition-all duration-300 hover:border-zinc-800/80 group shadow-xl">
                <div class="space-y-4 text-left">
                    <div class="flex items-center justify-between text-[10px] font-mono">
                        <span class="font-bold text-purple-400 uppercase tracking-wider">[Data Structures]</span>
                        <span class="text-zinc-600">2026-06-24</span>
                    </div>
                    <div class="space-y-2">
                        <h3
                            class="text-sm font-display font-bold text-zinc-100 group-hover:text-white transition-colors tracking-tight uppercase">
                            Discrete Algorithmic Logic</h3>
                        <p class="text-[11px] leading-relaxed text-zinc-500 font-normal">Examine complex tree
                            implementations, graphing structures, optimization trees, and matrix mapping vectors.</p>
                    </div>
                </div>
                <div class="mt-6 pt-4 border-t border-zinc-900/60 flex items-center justify-between">
                    <span class="text-[10px] font-mono text-zinc-500">Total Items: <span class="text-zinc-300 font-bold">15
                            Questions</span></span>
                    <button type="button"
                        class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-[10px] font-mono uppercase tracking-wider text-white font-bold rounded-lg transition-all duration-150">Start
                        Quiz</button>
                </div>
            </div>

            <div
                class="bg-[#050507]/40 border border-zinc-900 rounded-2xl p-5 flex flex-col justify-between relative overflow-hidden transition-all duration-300 hover:border-zinc-800/80 group shadow-xl">
                <div class="space-y-4 text-left">
                    <div class="flex items-center justify-between text-[10px] font-mono">
                        <span class="font-bold text-pink-500 uppercase tracking-wider">[Interface Design]</span>
                        <span class="text-zinc-600">2026-06-22</span>
                    </div>
                    <div class="space-y-2">
                        <h3
                            class="text-sm font-display font-bold text-zinc-100 group-hover:text-white transition-colors tracking-tight uppercase">
                            Human Computer Interaction</h3>
                        <p class="text-[11px] leading-relaxed text-zinc-500 font-normal">Evaluates cognitive load balance
                            variables, responsive grid configurations, layout rules, and usability protocols.</p>
                    </div>
                </div>
                <div class="mt-6 pt-4 border-t border-zinc-900/60 flex items-center justify-between">
                    <span class="text-[10px] font-mono text-zinc-500">Total Items: <span class="text-zinc-300 font-bold">10
                            Questions</span></span>
                    <button type="button"
                        class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-[10px] font-mono uppercase tracking-wider text-white font-bold rounded-lg transition-all duration-150">Start
                        Quiz</button>
                </div>
            </div>

        </div>

        <div class="pt-4 flex items-center justify-between text-xs font-mono text-zinc-500">
            <div>Showing 1 to 3 of 24 quiz entries</div>
            <div class="flex gap-2">
                <a href="#"
                    class="px-3 py-1.5 bg-zinc-950/20 border border-zinc-900 text-zinc-700 rounded-lg cursor-not-allowed pointer-events-none">Previous</a>
                <a href="#"
                    class="px-3 py-1.5 bg-zinc-950 border border-zinc-900 hover:border-zinc-800 text-zinc-400 rounded-lg hover:text-white transition-colors duration-150">Next</a>
            </div>
        </div>

    </div>
@endsection