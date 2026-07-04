@extends('admin.layouts.main')
@section('content')
    <div class="border-b border-zinc-900 pb-4 text-left mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <span class="text-[10px] font-mono font-bold tracking-[0.4em] uppercase text-indigo-400 block">// SYSTEM_SCHEMA_REGISTRY</span>
            <h1 class="text-xl font-bold tracking-tight text-white mt-1">Evaluation Category Clusters</h1>
            <p class="text-xs font-mono text-zinc-500 mt-1">// Active database structural classification modules compiled below.</p>
        </div>
        
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
            <div class="relative flex items-center">
                <span class="absolute left-3 text-[10px] font-mono text-zinc-600 font-bold uppercase">CMD_FIND:</span>
                <input type="text" placeholder="Filter matrices..." 
                    class="bg-[#050507] border border-zinc-900 text-xs font-mono rounded-xl pl-20 pr-4 py-2 text-zinc-300 placeholder-zinc-800 w-full sm:w-56 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition-all">
            </div>

            <a href="{{ route('add-category') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-500 border border-indigo-500/30 text-xs font-mono uppercase tracking-wider text-white font-bold rounded-xl transition-all duration-200 shadow-lg shadow-indigo-600/10 whitespace-nowrap">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Add Category
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 text-left">
        
        <div class="p-6 rounded-2xl bg-[#04060c]/30 border border-zinc-900 hover:border-zinc-800/80 flex flex-col justify-between min-h-[220px] transition-all duration-200 group relative overflow-hidden shadow-xl shadow-black/40">
            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-indigo-500/[0.02] to-transparent pointer-events-none"></div>
            
            <div class="space-y-4">
                <div class="flex justify-between items-center text-[9px] font-mono">
                    <span class="text-indigo-400 uppercase font-bold tracking-wider bg-indigo-500/5 px-2 py-0.5 border border-indigo-500/10 rounded">ID: #01</span>
                    <span class="text-zinc-600 uppercase font-medium tracking-widest">// VEC-0x84A1</span>
                </div>
                
                <div class="space-y-1">
                    <h4 class="text-base font-bold text-white uppercase tracking-wide font-display group-hover:text-indigo-400 transition-colors">
                        Syntax Array
                    </h4>
                    <p class="text-xs text-zinc-400 font-light leading-relaxed line-clamp-3">
                        Evaluates core grammatical architecture, framework-specific compilation bindings, code structuring blueprints, and dynamic directive logic rules.
                    </p>
                </div>
            </div>

            <div class="pt-4 border-t border-zinc-950/80 flex justify-between items-center mt-6">
                <span class="text-[9px] font-mono text-zinc-600 uppercase tracking-widest">State: <span class="text-emerald-500 font-bold">READY</span></span>
                
                <a href="#" aria-label="Edit Syntax Array Module" class="p-2 bg-zinc-950 hover:bg-zinc-900 border border-zinc-900 hover:border-zinc-800 text-zinc-500 hover:text-indigo-400 rounded-xl transition-all shadow-md group/btn">
                    <svg class="w-3.5 h-3.5 transform group-hover/btn:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="p-6 rounded-2xl bg-[#04060c]/30 border border-zinc-900 hover:border-zinc-800/80 flex flex-col justify-between min-h-[220px] transition-all duration-200 group relative overflow-hidden shadow-xl shadow-black/40">
            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-indigo-500/[0.02] to-transparent pointer-events-none"></div>
            
            <div class="space-y-4">
                <div class="flex justify-between items-center text-[9px] font-mono">
                    <span class="text-indigo-400 uppercase font-bold tracking-wider bg-indigo-500/5 px-2 py-0.5 border border-indigo-500/10 rounded">ID: #02</span>
                    <span class="text-zinc-600 uppercase font-medium tracking-widest">// VEC-0x92C3</span>
                </div>
                
                <div class="space-y-1">
                    <h4 class="text-base font-bold text-white uppercase tracking-wide font-display group-hover:text-indigo-400 transition-colors">
                        Logic Arrays
                    </h4>
                    <p class="text-xs text-zinc-400 font-light leading-relaxed line-clamp-3">
                        Structural optimization algorithms, algorithm time-complexity models, sorting vectors, pipeline execution loops, and data transformation configurations.
                    </p>
                </div>
            </div>

            <div class="pt-4 border-t border-zinc-950/80 flex justify-between items-center mt-6">
                <span class="text-[9px] font-mono text-zinc-600 uppercase tracking-widest">State: <span class="text-emerald-500 font-bold">READY</span></span>
                
                <a href="#" aria-label="Edit Logic Arrays Module" class="p-2 bg-zinc-950 hover:bg-zinc-900 border border-zinc-900 hover:border-zinc-800 text-zinc-500 hover:text-indigo-400 rounded-xl transition-all shadow-md group/btn">
                    <svg class="w-3.5 h-3.5 transform group-hover/btn:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="p-6 rounded-2xl bg-[#04060c]/30 border border-zinc-900 hover:border-zinc-800/80 flex flex-col justify-between min-h-[220px] transition-all duration-200 group relative overflow-hidden shadow-xl shadow-black/40">
            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-indigo-500/[0.02] to-transparent pointer-events-none"></div>
            
            <div class="space-y-4">
                <div class="flex justify-between items-center text-[9px] font-mono">
                    <span class="text-indigo-400 uppercase font-bold tracking-wider bg-indigo-500/5 px-2 py-0.5 border border-indigo-500/10 rounded">ID: #03</span>
                    <span class="text-zinc-600 uppercase font-medium tracking-widest">// VEC-0x5B77</span>
                </div>
                
                <div class="space-y-1">
                    <h4 class="text-base font-bold text-white uppercase tracking-wide font-display group-hover:text-indigo-400 transition-colors">
                        Security Protocols
                    </h4>
                    <p class="text-xs text-zinc-400 font-light leading-relaxed line-clamp-3">
                        CSRF vector validation guards, token serialization algorithms, encryption parameters, role authorization gates, and application threat mitigation metrics.
                    </p>
                </div>
            </div>

            <div class="pt-4 border-t border-zinc-950/80 flex justify-between items-center mt-6">
                <span class="text-[9px] font-mono text-zinc-600 uppercase tracking-widest">State: <span class="text-emerald-500 font-bold">READY</span></span>
                
                <a href="#" aria-label="Edit Security Protocols Module" class="p-2 bg-zinc-950 hover:bg-zinc-900 border border-zinc-900 hover:border-zinc-800 text-zinc-500 hover:text-indigo-400 rounded-xl transition-all shadow-md group/btn">
                    <svg class="w-3.5 h-3.5 transform group-hover/btn:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                    </svg>
                </a>
            </div>
        </div>

    </div>
@endsection