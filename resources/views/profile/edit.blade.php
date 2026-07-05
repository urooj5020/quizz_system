<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-2 border-b border-zinc-900 pb-4 text-left">
            <div>
                <span class="text-[10px] font-mono font-bold tracking-[0.4em] uppercase text-indigo-400 block">// ACCOUNT_SECURITY_NODE</span>
                <h1 class="text-4xl font-bold tracking-tight text-white font-display mt-1">{{ __('Profile Configuration') }}</h1>
            </div>
            <span class="text-[10px] font-mono text-zinc-600 uppercase tracking-widest">// session_state: matrix_mutator</span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto space-y-8 px-4 sm:px-6 lg:px-8">
            
            <section class="space-y-3">
                <div class="text-left border-b border-zinc-900/60 pb-2 flex justify-between items-center">
                    <span class="text-[9px] font-mono tracking-widest text-zinc-500 uppercase">// VECTOR_IDENTITY_ATTRIBUTES</span>
                    <span class="text-[10px] font-mono text-indigo-500/50">NODE_01</span>
                </div>
                
                <div class="p-6 md:p-8 rounded-2xl bg-[#04060c]/30 border border-zinc-900 relative overflow-hidden shadow-xl shadow-black/40 transition-all duration-300 hover:border-zinc-800">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-indigo-500/[0.01] to-transparent pointer-events-none"></div>
                    <div class="max-w-xl text-zinc-300 font-sans">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </section>

            <section class="space-y-3">
                <div class="text-left border-b border-zinc-900/60 pb-2 flex justify-between items-center">
                    <span class="text-[9px] font-mono tracking-widest text-zinc-500 uppercase">// CRYPTO_KEY_ROTATION</span>
                    <span class="text-[10px] font-mono text-indigo-500/50">NODE_02</span>
                </div>
                
                <div class="p-6 md:p-8 rounded-2xl bg-[#04060c]/30 border border-zinc-900 relative overflow-hidden shadow-xl shadow-black/40 transition-all duration-300 hover:border-zinc-800">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-indigo-500/[0.01] to-transparent pointer-events-none"></div>
                    <div class="max-w-xl text-zinc-300 font-sans">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </section>

            <section class="space-y-3">
                <div class="text-left border-b border-rose-950/60 pb-2 flex justify-between items-center">
                    <span class="text-[9px] font-mono tracking-widest text-rose-500 uppercase">// DESTRUCTIVE_TERMINATION_PROTOCOL</span>
                    <span class="text-[10px] font-mono text-rose-500/40">NODE_CRITICAL</span>
                </div>
                
                <div class="p-6 md:p-8 rounded-2xl bg-[#050507]/60 border border-rose-950/20 hover:border-rose-950/40 relative overflow-hidden shadow-xl shadow-black/40 transition-all duration-300">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-rose-500/[0.01] to-transparent pointer-events-none"></div>
                    <div class="max-w-xl text-zinc-300 font-sans">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </section>

        </div>
    </div>
</x-app-layout>