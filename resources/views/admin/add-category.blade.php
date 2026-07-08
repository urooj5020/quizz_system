@extends('admin.layouts.main')

@section('content')
    <div class="max-w-3xl mx-auto space-y-8">

        <div class="flex items-center justify-between border-b border-admin pb-6 text-left">
            <div>
                <a href="{{ route('categories') }}"
                    class="inline-flex items-center gap-2 text-xs font-mono text-admin-muted hover:text-admin-fg uppercase tracking-wider mb-2 transition-colors">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to Categories
                </a>
                <h1 class="text-2xl font-display font-bold tracking-tight text-admin-fg flex items-center gap-2">
                    <span class="w-2 h-2 rounded bg-indigo-500 shadow-md shadow-white/10"></span>
                    {{ $category->exists ? 'Edit Category' : 'Add Category' }}
                </h1>
                <p class="text-xs font-mono text-admin-muted uppercase tracking-widest mt-1">
                    {{ $category->exists ? 'Update category settings for ID: #00'.$category->id : 'Create a new category' }}
                </p>
            </div>
        </div>

        <form method="POST" action="{{ $category->exists ? route('update-category', $category->id) : route('save-category') }}"
            class="bg-admin-surface border border-admin p-6 md:p-8 rounded-2xl shadow-admin space-y-6 relative overflow-hidden">
            @csrf
            
            @if($category->exists)
                @method('PUT')
            @endif
            
            <div class="space-y-2 text-left">
                <label class="block text-xs font-mono uppercase tracking-wider text-admin-muted font-bold">
                    Category Name
                </label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}"
                    placeholder="e.g., Laravel Basics, Data Structures, Security"
                    class="w-full bg-admin-surface border @error('name') border-rose-900 focus:border-rose-500 @else border-admin focus:border-indigo-500 @enderror rounded-xl px-4 py-3 text-sm font-sans text-admin-fg placeholder-admin-muted-soft focus:outline-none focus:ring-1 focus:ring-indigo-500 transition-all duration-200">
                
                @error('name')
                    <span class="text-rose-500 font-mono text-[10px] uppercase pl-1 block">!! {{ $message }}</span>
                @enderror
            </div>

            <div class="space-y-2 text-left">
                <label class="block text-xs font-mono uppercase tracking-wider text-admin-muted font-bold">
                    Description
                </label>
                <textarea rows="5" name="desc"
                    placeholder="Describe this category and the type of questions it will contain..."
                    class="w-full bg-admin-surface border @error('desc') border-rose-900 focus:border-rose-500 @else border-admin focus:border-indigo-500 @enderror rounded-xl px-4 py-3 text-sm font-sans text-admin-fg placeholder-admin-muted-soft focus:outline-none focus:ring-1 focus:ring-indigo-500 transition-all duration-200 resize-none">{{ old('desc', $category->desc) }}</textarea>
                
                @error('desc')
                    <span class="text-rose-500 font-mono text-[10px] uppercase pl-1 block">!! {{ $message }}</span>
                @enderror
            </div>

            <div class="space-y-3 text-left pt-2" x-data="{ currentStatus: '{{ old('status', $category->status ?? 'active') }}' }">
                <label class="block text-xs font-mono uppercase tracking-wider text-admin-muted font-bold">
                    Status
                </label>
                
                <div class="inline-flex rounded-xl bg-admin-surface border border-admin p-1 select-none font-mono text-[11px]">
                    <label class="relative flex items-center gap-2 px-4 py-2 rounded-lg cursor-pointer transition-all duration-150"
                        :class="currentStatus === 'active' ? 'bg-admin-raised text-admin-fg border-admin-strong shadow-md' : 'text-admin-muted hover:text-admin-fg border border-transparent'">
                        <input type="radio" name="status" value="active" x-model="currentStatus" class="hidden">
                        <span class="flex-shrink-0 w-1.5 h-1.5 rounded-full" :class="currentStatus === 'active' ? 'bg-admin-fg animate-pulse' : 'bg-admin-muted-soft'"></span>
                        Active
                    </label>

                    <label class="relative flex items-center gap-2 px-4 py-2 rounded-lg cursor-pointer transition-all duration-150"
                        :class="currentStatus === 'inactive' ? 'bg-admin-raised text-admin-fg border border-admin-strong shadow-md' : 'text-admin-muted hover:text-admin-fg border border-transparent'">
                        <input type="radio" name="status" value="inactive" x-model="currentStatus" class="hidden">
                        <span class="flex-shrink-0 w-1.5 h-1.5 rounded-full" :class="currentStatus === 'inactive' ? 'bg-admin-muted' : 'bg-admin-muted-soft'"></span>
                        Inactive
                    </label>
                </div>

                @error('status')
                    <span class="text-rose-500 font-mono text-[10px] uppercase pl-1 block">!! {{ $message }}</span>
                @enderror
            </div>

            <div class="pt-6 border-t border-admin flex items-center justify-end gap-4">
                <a href="{{ route('categories') }}" class="px-4 py-2.5 bg-admin-raised hover:bg-admin-secondary border border-admin text-xs font-mono uppercase tracking-wider text-admin-muted hover:text-admin-fg rounded-xl transition-all duration-150">
                    Cancel
                </a>

                <button type="submit" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-xs font-mono uppercase tracking-wider text-white font-bold rounded-xl transition-all duration-200 shadow-lg shadow-indigo-600/10">
                    {{ $category->exists ? 'Save Changes' : 'Save Category' }}
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7-7M21 12H3" />
                    </svg>
                </button>
            </div>

        </form>
    </div>
@endsection