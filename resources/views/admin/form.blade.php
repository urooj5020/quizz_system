@extends('admin.layouts.main')

@section('content')
    <div class="max-w-3xl mx-auto space-y-8">

        @if($categories->isEmpty())
            
            <div class="border border-dashed border-admin bg-admin-surface p-8 md:p-12 rounded-2xl text-center space-y-6 shadow-admin">
                <div class="space-y-2">
                    <span class="text-[10px] font-mono font-bold tracking-[0.4em] uppercase text-pink-500 block">
                        Category Required
                    </span>
                    <h1 class="text-2xl font-display font-bold text-admin-fg tracking-tight">
                        No Categories Found
                    </h1>
                    <p class="text-xs font-mono text-admin-muted max-w-md mx-auto leading-relaxed">
                        You need to create a category before you can build a quiz. Categories help organize your questions.
                    </p>
                </div>

                <div class="pt-4 border-t border-admin flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('quizz-factory') }}"
                        class="px-4 py-2.5 bg-admin-raised hover:bg-admin-secondary border border-admin text-xs font-mono uppercase tracking-wider text-admin-muted hover:text-admin-fg rounded-xl transition-all w-full sm:w-auto">
                        &larr; Back to Quizzes
                    </a>

                    <a href="{{ route('add-category') }}"
                        class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-xs font-mono uppercase tracking-wider text-white font-bold rounded-xl transition-all duration-200 shadow-lg shadow-indigo-600/10 w-full sm:w-auto whitespace-nowrap">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Add Category First
                    </a>
                </div>
            </div>

        @else
            <div class="flex items-center justify-between border-b border-admin pb-6">
                <div class="text-left">
                    <a href="{{ route('quizz-factory') }}"
                        class="inline-flex items-center gap-2 text-xs font-mono text-admin-muted hover:text-admin-fg uppercase tracking-wider mb-2 transition-colors">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                        Back to Quizzes
                    </a>
                    
                    <h1 class="text-2xl font-display font-bold tracking-tight text-admin-fg flex items-center gap-2">
                        <span class="w-2 h-2 rounded bg-indigo-500 shadow-md shadow-white/10"></span>
                        {{ $quizz->exists ? 'Edit Quiz' : 'Create New Quiz' }}
                    </h1>
                    <p class="text-xs font-mono text-admin-muted uppercase tracking-widest mt-1">
                        {{ $quizz->exists ? 'Update quiz settings for ID: #00'.$quizz->id : 'Set up your new quiz' }}
                    </p>
                </div>
            </div>

            <form method="POST" action="{{ $quizz->exists ? route('update-quizz', $quizz->id) : route('add-quizz-info') }}"
                class="bg-admin-surface border border-admin p-6 md:p-8 rounded-2xl shadow-admin relative overflow-hidden space-y-6">
                @csrf
                
                @if($quizz->exists)
                    @method('PUT')
                @endif

                <div class="space-y-2 text-left">
                    <label class="block text-xs font-mono uppercase tracking-wider text-admin-muted font-bold">
                        Quiz Title
                    </label>
                    <input type="text" name="title" value="{{ old('title', $quizz->title) }}" placeholder="e.g., Laravel Basics"
                        class="w-full bg-admin-surface border @error('title') border-rose-900/60 text-rose-200 focus:border-rose-500 focus:ring-rose-500/20 @else border-admin focus:border-indigo-500 focus:ring-indigo-500 @enderror rounded-xl px-4 py-3 text-sm font-sans placeholder-admin-muted-soft focus:outline-none focus:ring-1 transition-all duration-200">
                    
                    @error('title')
                        <div class="flex items-center gap-1.5 font-mono text-[10px] uppercase tracking-wide text-rose-400/90 pl-1 pt-1">
                            <span class="text-rose-500 font-bold">!!</span> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2 text-left">
                        <label class="block text-xs font-mono uppercase tracking-wider text-admin-muted font-bold">
                            Category
                        </label>
                        <select name="category"
                            class="w-full bg-admin-surface border @error('category') border-rose-900/60 text-rose-300 focus:border-rose-500 focus:ring-rose-500/20 @else border-admin focus:border-indigo-500 focus:ring-indigo-500 @enderror rounded-xl px-4 py-3 text-sm font-mono focus:outline-none focus:ring-1 transition-all duration-200">
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->name }}" {{ old('category', $quizz->category) == $category->name ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option> 
                            @endforeach
                            <option value="logic" {{ old('category', $quizz->category) == 'logic' ? 'selected' : '' }}>Logic Arrays</option>
                            <option value="security" {{ old('category', $quizz->category) == 'security' ? 'selected' : '' }}>Security Protocols</option>
                        </select>

                        @error('category')
                            <div class="flex items-center gap-1.5 font-mono text-[10px] uppercase tracking-wide text-rose-400/90 pl-1 pt-1">
                                <span class="text-rose-500 font-bold">!!</span> {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="space-y-2 text-left">
                        <label class="block text-xs font-mono uppercase tracking-wider text-admin-muted font-bold">
                            Time Limit (Minutes)
                        </label>
                        <input type="number" placeholder="15" name="time" value="{{ old('time', $quizz->time) }}"
                            class="w-full bg-admin-surface border @error('time') border-rose-900/60 text-rose-200 focus:border-rose-500 focus:ring-rose-500/20 @else border-admin focus:border-indigo-500 focus:ring-indigo-500 @enderror rounded-xl px-4 py-3 text-sm font-mono placeholder-admin-muted-soft focus:outline-none focus:ring-1 transition-all duration-200">
                        
                        @error('time')
                            <div class="flex items-center gap-1.5 font-mono text-[10px] uppercase tracking-wide text-rose-400/90 pl-1 pt-1">
                                <span class="text-rose-500 font-bold">!!</span> {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="space-y-2 text-left">
                    <label class="block text-xs font-mono uppercase tracking-wider text-admin-muted font-bold">
                        Description
                    </label>
                    <textarea rows="4" name="desc"
                        placeholder="Describe what this quiz covers..."
                        class="w-full bg-admin-surface border @error('desc') border-rose-900/60 text-rose-200 focus:border-rose-500 focus:ring-rose-500/20 @else border-admin focus:border-indigo-500 focus:ring-indigo-500 @enderror rounded-xl px-4 py-3 text-sm font-sans placeholder-admin-muted-soft focus:outline-none focus:ring-1 transition-all duration-200 resize-none">{{ old('desc', $quizz->desc) }}</textarea>
                    
                    @error('desc')
                        <div class="flex items-center gap-1.5 font-mono text-[10px] uppercase tracking-wide text-rose-400/90 pl-1 pt-1">
                            <span class="text-rose-500 font-bold">!!</span> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="space-y-3 text-left pt-2" x-data="{ currentStatus: '{{ old('status', $quizz->status ?? 'active') }}' }">
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
                        <div class="flex items-center gap-1.5 font-mono text-[10px] uppercase tracking-wide text-rose-400/90 pl-1 pt-1">
                            <span class="text-rose-500 font-bold">!!</span> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="pt-6 border-t border-admin flex items-center justify-end gap-4">
                    <a href="{{ route('quizz-factory') }}"
                        class="px-4 py-2.5 bg-admin-raised hover:bg-admin-secondary border border-admin text-xs font-mono uppercase tracking-wider text-admin-muted hover:text-admin-fg rounded-xl transition-all duration-150 text-center">
                        Cancel
                    </a>

                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-xs font-mono uppercase tracking-wider text-white font-bold rounded-xl transition-all duration-200 shadow-lg shadow-indigo-600/10">
                        {{ $quizz->exists ? 'Update Quiz' : 'Continue' }}
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </button>
                </div>

            </form>
        @endif
    </div>
@endsection