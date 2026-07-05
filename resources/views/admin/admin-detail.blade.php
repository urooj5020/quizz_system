@extends('admin.layouts.main')

@section('content')
    <div class="max-w-4xl mx-auto space-y-8">

        <div
            class="border-b border-zinc-900 pb-4 text-left flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <span class="text-[10px] font-mono font-bold tracking-[0.4em] uppercase text-indigo-400 block">//
                    OPERATOR_CORE_METRICS</span>
                <h1 class="text-xl font-bold tracking-tight text-white mt-1">Administrative Profile Matrix</h1>
                <p class="text-xs font-mono text-zinc-500 mt-1">// Core security tokens and privileges profile registry
                    view.</p>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('dashboard-overview') }}"
                    class="px-3.5 py-2 bg-[#050507] hover:bg-zinc-950 border border-zinc-900 text-xs font-mono uppercase tracking-wider text-zinc-400 hover:text-zinc-200 rounded-xl transition-all">
                    &larr; Console Dashboard
                </a>

                <a href="{{ route('profile.edit') }}"
                    class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-xs font-mono uppercase tracking-wider text-white font-bold rounded-xl transition-all duration-200 shadow-lg shadow-indigo-600/10">
                    Modify Node
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 text-left">

            <div class="lg:col-span-1 space-y-6">
                <div
                    class="p-6 aspect-square max-w-[200px] mx-auto rounded-2xl bg-[#04060c]/30 border border-zinc-900 flex flex-col items-center justify-center text-center relative overflow-hidden shadow-xl shadow-black/40 group">
                    <div
                        class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-indigo-500/[0.02] to-transparent pointer-events-none">
                    </div>

                    <div
                        class="w-[150px] h-[150px] rounded-xl bg-zinc-950 border border-zinc-800/80 flex items-center justify-center relative overflow-hidden group-hover:border-indigo-500/30 transition-colors">
                        <div class="absolute inset-0 bg-gradient-to-t from-indigo-500/5 to-transparent opacity-50"></div>
                        <svg class="w-6 h-6 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </div>

                    <div class="mt-4 space-y-1">
                        <h3 class="text-base font-bold text-white tracking-wide uppercase font-display">
                            {{ auth()->user()->name }}</h3>
                        <span
                            class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md bg-indigo-500/5 border border-indigo-500/10 text-[9px] font-mono font-bold uppercase text-indigo-400 tracking-widest">
                            SYSTEM_ROOT_OP
                        </span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-6">
                <div
                    class="p-6 md:p-8 rounded-2xl bg-[#04060c]/30 border border-zinc-900 space-y-6 relative overflow-hidden shadow-xl shadow-black/40">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-indigo-500/[0.01] to-transparent pointer-events-none">
                    </div>

                    <div class="border-b border-zinc-950 pb-3">
                        <h3 class="text-sm font-mono font-bold uppercase text-zinc-400">// System Vector Schema Attributes
                        </h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 font-sans">

                        <div class="space-y-1">
                            <span class="block text-[10px] font-mono uppercase tracking-wider text-zinc-600 font-bold">//
                                OPERATOR_NAME</span>
                            <div
                                class="w-full bg-[#050507] border border-zinc-900/80 text-zinc-300 rounded-xl px-4 py-2.5 text-sm font-medium">
                                {{ auth()->user()->name }}
                            </div>
                        </div>

                        <div class="space-y-1">
                            <span class="block text-[10px] font-mono uppercase tracking-wider text-zinc-600 font-bold">//
                                SECURE_EMAIL_ROUTE</span>
                            <div
                                class="w-full bg-[#050507] border border-zinc-900/80 text-zinc-300 rounded-xl px-4 py-2.5 text-sm font-medium overflow-hidden text-ellipsis">
                                {{ auth()->user()->email }}
                            </div>
                        </div>

                        <div class="space-y-1">
                            <span class="block text-[10px] font-mono uppercase tracking-wider text-zinc-600 font-bold">//
                                TOKEN_VERIFIED_AT</span>
                            <div
                                class="w-full bg-[#050507] border border-zinc-900/80 text-zinc-400 rounded-xl px-4 py-2.5 text-sm font-mono">
                                {{ auth()->user()->email_verified_at ? auth()->user()->email_verified_at->format('Y-m-d H:i:s') : 'N/A' }}
                            </div>
                        </div>

                        <div class="space-y-1">
                            <span class="block text-[10px] font-mono uppercase tracking-wider text-zinc-600 font-bold">//
                                NODE_INITIALIZED_ON</span>
                            <div
                                class="w-full bg-[#050507] border border-zinc-900/80 text-zinc-400 rounded-xl px-4 py-2.5 text-sm font-mono">
                                {{ auth()->user()->created_at->format('Y-m-d H:i:s') }}
                            </div>
                        </div>

                    </div>



                </div>
            </div>

        </div>

    </div>
@endsection