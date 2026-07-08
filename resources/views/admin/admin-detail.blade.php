@extends('admin.layouts.main')

@section('content')
    <div class="max-w-4xl mx-auto space-y-8">

        <div
            class="border-b border-admin pb-4 text-left flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                    <span class="text-[10px] font-mono font-bold tracking-[0.4em] uppercase text-admin-fg block">Admin Profile</span>
                <h1 class="text-xl font-bold tracking-tight text-admin-fg mt-1">Admin Profile</h1>
                <p class="text-xs font-mono text-admin-muted mt-1">View your account details and permissions.</p>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('dashboard-overview') }}"
                    class="px-3.5 py-2 bg-admin-surface hover:bg-admin-raised border border-admin text-xs font-mono uppercase tracking-wider text-admin-muted hover:text-admin-fg rounded-xl transition-all">
                    &larr; Console Dashboard
                </a>

                <a href="{{ route('profile.edit' , auth()->id()) }}"
                    class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-xs font-mono uppercase tracking-wider text-white font-bold rounded-xl transition-all duration-200 shadow-lg shadow-indigo-600/10">
                    Edit Profile
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 text-left">

            <div class="lg:col-span-1 space-y-6">
                <div
                    class="p-6 aspect-square max-w-[200px] mx-auto rounded-2xl bg-admin-surface border border-admin flex flex-col items-center justify-center text-center relative overflow-hidden shadow-admin group">
                    <div
                        class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-indigo-500/[0.02] to-transparent pointer-events-none">
                    </div>

                    <div
                        class="w-[150px] h-[150px] rounded-xl bg-admin-raised border border-admin-strong flex items-center justify-center relative overflow-hidden group-hover:border-admin-strong transition-colors">
                        <div class="absolute inset-0 bg-gradient-to-t from-indigo-500/5 to-transparent opacity-50"></div>
                        <svg class="w-6 h-6 text-admin-fg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </div>

                    <div class="mt-4 space-y-1">
                        <h3 class="text-base font-bold text-admin-fg tracking-wide uppercase font-display">
                            {{ auth()->user()->name }}</h3>
                        <span
                            class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md bg-admin-badge border border-admin-badge text-[9px] font-mono font-bold uppercase text-admin-fg tracking-widest">
                            Administrator
                        </span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-6">
                <div
                    class="p-6 md:p-8 rounded-2xl bg-admin-surface border border-admin space-y-6 relative overflow-hidden shadow-admin">
                    <div
                        class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-indigo-500/[0.01] to-transparent pointer-events-none">
                    </div>

                    <div class="border-b border-admin pb-3">
                        <h3 class="text-sm font-mono font-bold uppercase text-admin-muted">Account Details
                        </h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 font-sans">

                        <div class="space-y-1">
                            <span class="block text-[10px] font-mono uppercase tracking-wider text-admin-muted-soft font-bold">Name</span>
                            <div
                                class="w-full bg-admin-surface border border-admin text-admin-fg rounded-xl px-4 py-2.5 text-sm font-medium">
                                {{ auth()->user()->name }}
                            </div>
                        </div>

                        <div class="space-y-1">
                            <span class="block text-[10px] font-mono uppercase tracking-wider text-admin-muted-soft font-bold">Email</span>
                            <div
                                class="w-full bg-admin-surface border border-admin text-admin-fg rounded-xl px-4 py-2.5 text-sm font-medium overflow-hidden text-ellipsis">
                                {{ auth()->user()->email }}
                            </div>
                        </div>

                        <div class="space-y-1">
                            <span class="block text-[10px] font-mono uppercase tracking-wider text-admin-muted-soft font-bold">Email Verified</span>
                            <div
                                class="w-full bg-admin-surface border border-admin text-admin-muted rounded-xl px-4 py-2.5 text-sm font-mono">
                                {{ auth()->user()->email_verified_at ? auth()->user()->email_verified_at->format('Y-m-d H:i:s') : 'N/A' }}
                            </div>
                        </div>

                        <div class="space-y-1">
                            <span class="block text-[10px] font-mono uppercase tracking-wider text-admin-muted-soft font-bold">Member Since</span>
                            <div
                                class="w-full bg-admin-surface border border-admin text-admin-muted rounded-xl px-4 py-2.5 text-sm font-mono">
                                {{ auth()->user()->created_at->format('Y-m-d H:i:s') }}
                            </div>
                        </div>

                    </div>



                </div>
            </div>

        </div>

    </div>
@endsection