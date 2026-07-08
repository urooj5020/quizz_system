@extends('admin.layouts.main')

@section('content')
    <div class="space-y-8">

        <div
            class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-admin pb-6 text-left">
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <span
                        class="text-[9px] font-mono font-bold uppercase tracking-widest px-2 py-0.5 rounded bg-admin-badge text-admin-fg border border-admin-badge">
                        Users
                    </span>
                    <span class="text-[10px] font-mono text-admin-muted">
                        Status: Connected
                    </span>
                </div>

                <h1 class="text-2xl font-display font-bold tracking-tight text-admin-fg">
                    User Management
                </h1>

                <div class="flex items-center gap-4 font-mono text-[10px] text-admin-muted uppercase tracking-wider mt-1.5">
                    <span>View and manage user accounts</span>
                    <span class="hidden md:inline text-admin-muted-soft">|</span>
                    <span class="hidden md:inline">Security Level: <span
                            class="text-emerald-400 font-bold">Protected</span></span>
                </div>
            </div>

            <button type="button"
                class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-xs font-mono uppercase tracking-wider text-white font-bold rounded-xl transition-all duration-200 shadow-lg shadow-indigo-600/10 self-start sm:self-center">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                Create New User
            </button>
        </div>

        <form action="#" method="GET"
            class="grid grid-cols-1 sm:grid-cols-4 gap-4 bg-admin-secondary border border-admin p-4 rounded-xl">
            <div class="relative sm:col-span-2">
                <input type="text" name="search" placeholder="Search by name, ID, or email..." value=""
                    class="w-full bg-admin-surface border border-admin rounded-lg px-3 py-2 text-xs font-mono text-admin-fg placeholder-admin-muted-soft focus:outline-none focus:border-indigo-500 transition-colors">
            </div>

            <div>
                <select name="clearance"
                    class="w-full bg-admin-surface border border-admin rounded-lg px-3 py-2 text-xs font-mono text-admin-muted focus:outline-none focus:border-indigo-500 transition-colors">
                    <option value="">Role</option>
                    <option value="alpha">Admin</option>
                    <option value="beta">Manager</option>
                    <option value="delta">Guest</option>
                </select>
            </div>

            <div>
                <select name="status"
                    class="w-full bg-admin-surface border border-admin rounded-lg px-3 py-2 text-xs font-mono text-admin-muted focus:outline-none focus:border-indigo-500 transition-colors">
                    <option value="">Sort by</option>
                    <option value="high">Most Active</option>
                    <option value="low">Least Active</option>
                </select>
            </div>
        </form>
        @foreach ($users as $user)

            <div class="space-y-2">

                <!-- Clickable Row Element -->
                <button type="button"
                    class="w-full text-left block bg-admin-surface border border-admin rounded-lg p-3 flex flex-col sm:flex-row sm:items-center justify-between gap-3 hover:bg-admin-raised hover:border-admin-strong transition-all group">

                    <!-- Left Side: Basic Info -->
                    <div class="flex items-center gap-3">
                        <div
                            class="text-[11px] font-mono font-bold text-admin-fg bg-admin-badge border border-admin-badge px-2 py-1 rounded group-hover:border-admin-strong transition-colors">
                            0{{ $user->id }}-A
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-admin-fg group-hover:text-admin-fg transition-colors">
                                {{ $user->name }}
                            </h4>
                            <p class="text-[10px] font-mono text-admin-muted">{{ $user->email }}</p>
                        </div>
                    </div>

                    <!-- Center Side: Output Status -->
                    <div class="flex items-center gap-6 text-[11px] font-mono">

                        <div>
                            <span class="text-admin-muted-soft block text-[9px] uppercase tracking-wide">Status</span>
                            <span class="text-emerald-400 font-bold">{{ Str::ucfirst($user->status) }}</span>
                        </div>
                    </div>

                    <!-- Right Side: Action Icons -->
                    <div class="flex items-center justify-end gap-1.5 border-t sm:border-t-0 border-admin pt-2 sm:pt-0">
                        <a href="{{ route('user-info', $user->id) }}" title="Edit Status"
                            class="p-1.5 hover:bg-admin-raised border border-transparent hover:border-admin text-admin-muted hover:text-admin-fg rounded transition-all">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </a>


                    </div>
                </button>

            </div>


        @endforeach
        <div
            class="mt-8 pt-4 border-t border-admin flex items-center justify-between text-xs font-mono text-admin-muted">
            <div>Showing 1 to 2 of 58 users</div>
            <div class="flex gap-2">
                <a href="#"
                    class="px-3 py-1.5 bg-admin-raised border border-admin text-admin-muted-soft rounded-lg cursor-not-allowed pointer-events-none">Previous</a>
                <a href="#"
                    class="px-3 py-1.5 bg-admin-raised border border-admin hover:border-admin-strong text-admin-muted rounded-lg hover:text-admin-fg transition-colors duration-150">Next</a>
            </div>
        </div>

    </div>
@endsection