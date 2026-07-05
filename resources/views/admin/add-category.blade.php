@extends('admin.layouts.main')

@section('content')
    <div class="max-w-3xl mx-auto space-y-8">

        <div class="flex items-center justify-between border-b border-zinc-900 pb-6 text-left">
            <div>
                <a href="{{ route('categories') }}"
                    class="inline-flex items-center gap-2 text-xs font-mono text-zinc-500 hover:text-indigo-400 uppercase tracking-wider mb-2 transition-colors">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Return to Category Registry
                </a>
                <h1 class="text-2xl font-display font-bold tracking-tight text-white flex items-center gap-2">
                    <span class="w-2 h-2 rounded bg-indigo-500 shadow-md shadow-indigo-500/50"></span>
                    {{ $category->exists ? 'Modify Category Vector' : 'Initialize Category Node' }}
                </h1>
                <p class="text-xs font-mono text-zinc-500 uppercase tracking-widest mt-1">
                    {{ $category->exists ? '// Mutating active matrix parameters for ID: #00'.$category->id : '// Inject new matrix classifications into the database cluster' }}
                </p>
            </div>
        </div>

        <form method="POST" action="{{ $category->exists ? route('update-category', $category->id) : route('save-category') }}"
            class="bg-[#050507]/40 border border-zinc-900 p-6 md:p-8 rounded-2xl shadow-xl space-y-6 relative overflow-hidden">
            @csrf
            
            @if($category->exists)
                @method('PUT')
            @endif
            
            <div class="space-y-2 text-left">
                <label class="block text-xs font-mono uppercase tracking-wider text-zinc-500 font-bold">
                    // Category Name Vector
                </label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}"
                    placeholder="e.g., Syntax Array, Data Architecture, Microservices"
                    class="w-full bg-[#050507] border @error('name') border-rose-900 focus:border-rose-500 @else border-zinc-900 focus:border-indigo-500 @enderror rounded-xl px-4 py-3 text-sm font-sans text-zinc-200 placeholder-zinc-700 focus:outline-none focus:ring-1 focus:ring-indigo-500 transition-all duration-200">
                
                @error('name')
                    <span class="text-rose-500 font-mono text-[10px] uppercase pl-1 block">!! {{ $message }}</span>
                @enderror
            </div>

            <div class="space-y-2 text-left">
                <label class="block text-xs font-mono uppercase tracking-wider text-zinc-500 font-bold">
                    // Cluster Matrix Description
                </label>
                <textarea rows="5" name="desc"
                    placeholder="Describe the structural limitations, scope parameters, or definitions of this category mapping..."
                    class="w-full bg-[#050507] border @error('desc') border-rose-900 focus:border-rose-500 @else border-zinc-900 focus:border-indigo-500 @enderror rounded-xl px-4 py-3 text-sm font-sans text-zinc-200 placeholder-zinc-700 focus:outline-none focus:ring-1 focus:ring-indigo-500 transition-all duration-200 resize-none">{{ old('desc', $category->desc) }}</textarea>
                
                @error('desc')
                    <span class="text-rose-500 font-mono text-[10px] uppercase pl-1 block">!! {{ $message }}</span>
                @enderror
            </div>

            <div class="space-y-3 text-left pt-2" x-data="{ currentStatus: '{{ old('status', $category->status ?? 'active') }}' }">
                <label class="block text-xs font-mono uppercase tracking-wider text-zinc-500 font-bold">
                    // Operational Node State Configuration
                </label>
                
                <div class="inline-flex rounded-xl bg-[#050507] border border-zinc-900 p-1 select-none font-mono text-[11px]">
                    <label class="relative flex items-center gap-2 px-4 py-2 rounded-lg cursor-pointer transition-all duration-150"
                        :class="currentStatus === 'active' ? 'bg-indigo-600/10 text-indigo-400 border border-indigo-500/20 shadow-md shadow-indigo-500/5' : 'text-zinc-600 hover:text-zinc-400 border border-transparent'">
                        <input type="radio" name="status" value="active" x-model="currentStatus" class="hidden">
                        <span class="w-1.5 h-1.5 rounded-full" :class="currentStatus === 'active' ? 'bg-indigo-400 animate-pulse' : 'bg-zinc-800'"></span>
                        ACTIVE_NODE
                    </label>

                    <label class="relative flex items-center gap-2 px-4 py-2 rounded-lg cursor-pointer transition-all duration-150"
                        :class="currentStatus === 'inactive' ? 'bg-zinc-900 text-zinc-400 border border-zinc-800 shadow-md' : 'text-zinc-600 hover:text-zinc-400 border border-transparent'">
                        <input type="radio" name="status" value="inactive" x-model="currentStatus" class="hidden">
                        <span class="w-1.5 h-1.5 rounded-full" :class="currentStatus === 'inactive' ? 'bg-zinc-500' : 'bg-zinc-800'"></span>
                        INACTIVE_OFFLINE
                    </label>
                </div>

                @error('status')
                    <span class="text-rose-500 font-mono text-[10px] uppercase pl-1 block">!! {{ $message }}</span>
                @enderror
            </div>

            <div class="pt-6 border-t border-zinc-900 flex items-center justify-end gap-4">
                <a href="{{ route('categories') }}" class="px-4 py-2.5 bg-zinc-950 hover:bg-zinc-900 border border-zinc-900 text-xs font-mono uppercase tracking-wider text-zinc-400 hover:text-zinc-200 rounded-xl transition-all duration-150">
                    Abort
                </a>

                <button type="submit" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-xs font-mono uppercase tracking-wider text-white font-bold rounded-xl transition-all duration-200 shadow-lg shadow-indigo-600/10">
                    {{ $category->exists ? 'Save Cluster Modifications' : 'Commit Category Node' }}
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7-7M21 12H3" />
                    </svg>
                </button>
            </div>

        </form>
    </div>
@endsection