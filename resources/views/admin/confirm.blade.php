@extends('admin.layouts.main')

@section('content')
<div class="min-h-[calc(100vh-12rem)] flex items-center justify-center">
    <div class="max-w-md w-full bg-admin-surface border border-admin p-8 rounded-2xl shadow-2xl text-center space-y-6 relative overflow-hidden">
        
        <div class="absolute -top-24 -left-24 w-48 h-48 bg-emerald-500/10 rounded-full blur-[80px] pointer-events-none"></div>
        
        <div class="mx-auto w-14 h-14 rounded-full bg-emerald-950/30 border border-emerald-500/30 flex items-center justify-center text-emerald-400 shadow-lg shadow-emerald-500/5 relative z-10">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
        </div>

        <div class="space-y-2 relative z-10">
            <span class="text-[9px] font-mono font-bold uppercase tracking-widest px-2.5 py-0.5 rounded bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 inline-block">
                Success
            </span>
            <h1 class="text-xl font-display font-bold text-admin-fg tracking-tight">
                Question Added
            </h1>
            <p class="text-xs text-admin-muted max-w-xs mx-auto leading-relaxed font-sans font-light">
                The question has been added to the quiz successfully.
            </p>
        </div>

        <div class="pt-4 border-t border-admin space-y-3 relative z-10">
            
            <a href="{{ route('question') }}" 
               class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-xs font-mono uppercase tracking-wider text-white font-bold rounded-xl transition-all duration-200 shadow-lg shadow-indigo-600/10">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Add Another Question
            </a>

            <a href="{{ route('factory') }}" 
               class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 bg-admin-raised hover:bg-admin-secondary border border-admin text-xs font-mono uppercase tracking-wider text-admin-muted hover:text-admin-fg rounded-xl transition-all duration-150">
                Done
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7-7M21 12H3" />
                </svg>
            </a>
            
        </div>
    </div>
</div>
@endsection