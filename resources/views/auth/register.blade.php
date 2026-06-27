<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-5 text-left">
        @csrf

        <div class="border-b border-slate-900 pb-3">
            <div class="flex items-center justify-between">
                <h2 class="text-xs font-semibold uppercase tracking-wider text-white font-display">Create Access Node</h2>
                <span class="text-[9px] font-mono text-indigo-400">SYS_AUTH_v2</span>
            </div>
            <p class="text-[11px] text-slate-500 font-light mt-0.5">Register a unified identifier profile below.</p>
        </div>

        <div>
            <x-input-label for="name" :value="__('Full Identity Name')" class="text-[10px] font-mono uppercase tracking-wider text-slate-500" />
            <x-text-input id="name" 
                class="block mt-1.5 w-full bg-[#010204]/60 border border-slate-800 text-slate-200 text-xs px-4 py-2.5 rounded-lg focus:outline-none focus:ring-1 focus:ring-indigo-500/50 focus:border-indigo-500/60 transition-all placeholder-slate-700 font-sans" 
                type="text" 
                name="name" 
                :value="old('name')" 
                required 
                autofocus 
                autocomplete="name" 
                placeholder="e.g. Anas Nasr" />
            <x-input-error :messages="$errors->get('name')" class="mt-1.5 text-xs font-mono text-pink-500" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email Address Route')" class="text-[10px] font-mono uppercase tracking-wider text-slate-500" />
            <x-text-input id="email" 
                class="block mt-1.5 w-full bg-[#010204]/60 border border-slate-800 text-slate-200 text-xs px-4 py-2.5 rounded-lg focus:outline-none focus:ring-1 focus:ring-indigo-500/50 focus:border-indigo-500/60 transition-all placeholder-slate-700 font-sans" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autocomplete="username" 
                placeholder="name@domain.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs font-mono text-pink-500" />
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <x-input-label for="password" :value="__('Set Password')" class="text-[10px] font-mono uppercase tracking-wider text-slate-500" />
                <x-text-input id="password" 
                    class="block mt-1.5 w-full bg-[#010204]/60 border border-slate-800 text-slate-200 text-xs px-4 py-2.5 rounded-lg focus:outline-none focus:ring-1 focus:ring-indigo-500/50 focus:border-indigo-500/60 transition-all placeholder-slate-700 font-sans" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="new-password" 
                    placeholder="••••••••••••" />
                <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-xs font-mono text-pink-500" />
            </div>

            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Matrix')" class="text-[10px] font-mono uppercase tracking-wider text-slate-500" />
                <x-text-input id="password_confirmation" 
                    class="block mt-1.5 w-full bg-[#010204]/60 border border-slate-800 text-slate-200 text-xs px-4 py-2.5 rounded-lg focus:outline-none focus:ring-1 focus:ring-indigo-500/50 focus:border-indigo-500/60 transition-all placeholder-slate-700 font-sans" 
                    type="password" 
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password" 
                    placeholder="••••••••••••" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1.5 text-xs font-mono text-pink-500" />
            </div>
        </div>

        <div class="flex items-center justify-between pt-4 border-t border-slate-900/60 mt-6">
            <a class="text-xs font-mono text-slate-500 hover:text-indigo-400 transition-colors duration-200 underline underline-offset-4 decoration-slate-900 hover:decoration-indigo-500/40" 
               href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button type="submit" class="px-5 py-2.5 rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white font-display text-xs font-bold uppercase tracking-wider shadow-lg shadow-indigo-600/10 transition-all duration-200">
                {{ __('Initialize Profile') }}
            </button>
        </div>
    </form>
</x-guest-layout>