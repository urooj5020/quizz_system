@extends('admin.layouts.main')
@section('content')
    <div class="border-b border-admin pb-4 text-left mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <span class="text-[10px] font-mono font-bold tracking-[0.4em] uppercase text-admin-fg block">Categories</span>
            <h1 class="text-xl font-bold tracking-tight text-admin-fg mt-1">Category Management</h1>
            <p class="text-xs font-mono text-admin-muted mt-1">Manage your quiz categories here.</p>
        </div>

        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
            <div class="relative flex items-center">
                <span class="absolute left-3 text-[10px] font-mono text-admin-muted-soft font-bold uppercase">Search:</span>
                <input type="text" placeholder="Search categories..."
                    class="bg-admin-surface border border-admin text-xs font-mono rounded-xl pl-20 pr-4 py-2 text-admin-fg placeholder-admin-muted-soft w-full sm:w-56 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all">
            </div>

            <a href="{{ route('add-category') }}"
                class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-xs font-mono uppercase tracking-wider text-white font-bold rounded-xl transition-all duration-200 shadow-lg shadow-indigo-600/10 whitespace-nowrap">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Add Category
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 text-left">
        @forelse ($categories as $category)

            <div class="p-6 rounded-2xl bg-admin-surface border border-admin hover:border-admin-strong flex flex-col justify-between min-h-[220px] transition-all duration-200 group relative overflow-hidden shadow-admin">
                <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-indigo-500/[0.02] to-transparent pointer-events-none"></div>

                <div class="space-y-4">
                    <div class="flex justify-between items-center text-[9px] font-mono">
                        <span class="text-admin-fg uppercase font-bold tracking-wider bg-admin-badge px-2 py-0.5 border border-admin-badge rounded">
                            ID: #{{ sprintf('%02d', $category->id) }}
                        </span>
                    </div>

                    <div class="space-y-1">
                        <h4 class="text-base font-bold text-admin-fg uppercase tracking-wide font-display group-hover:text-admin-fg transition-colors">
                            {{ $category->name }}
                        </h4>
                        <p class="text-xs text-admin-muted font-light leading-relaxed line-clamp-3">
                            {{ $category->desc }}
                        </p>
                    </div>
                </div>

                <div class="pt-4 border-t border-admin flex justify-between items-center mt-6">
                    <span class="text-[9px] font-mono text-admin-muted-soft uppercase tracking-widest">
                        <span class="{{ $category->status === 'inactive' ? 'text-admin-muted' : 'text-emerald-500' }} font-bold">{{ ucfirst($category->status ?? 'active') }}</span>
                    </span>

                    <a href="{{ route('edit-category', $category->id) }}" aria-label="Edit category"
                        class="p-2 bg-admin-raised hover:bg-admin-secondary border border-admin hover:border-admin-strong text-admin-muted hover:text-admin-fg rounded-xl transition-all shadow-md group/btn">
                        <svg class="w-3.5 h-3.5 transform group-hover/btn:scale-110 transition-transform" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                        </svg>
                    </a>
                </div>
            </div>

        @empty
            <div class="col-span-full p-12 text-center bg-admin-surface border border-dashed border-admin rounded-2xl space-y-2">
                <p class="text-sm font-mono text-admin-fg">No categories found.</p>
                <p class="text-xs text-admin-muted-soft max-w-md mx-auto leading-relaxed">
                    Create your first category to start organizing your quizzes.
                </p>
            </div>
        @endforelse
    </div>
@endsection