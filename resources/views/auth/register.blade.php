<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-5 text-left">
        @csrf

        <div class="border-b theme-border pb-3">
            <div class="flex items-center justify-between">
                <h2 class="text-xs font-semibold uppercase tracking-wider theme-text font-display">Create Account</h2>
            </div>
            <p class="text-[11px] theme-muted font-light mt-0.5">Sign up to start learning with smarter quizzes.</p>
        </div>

        <div>
            <x-input-label for="name" :value="__('Full Name')"
                class="text-[10px] font-semibold uppercase tracking-wider theme-text" />
            <x-text-input id="name"
                class="block mt-1.5 w-full theme-panel-soft border theme-border theme-text text-xs px-4 py-2.5 rounded-lg focus:outline-none focus:ring-1 focus:ring-indigo-500/50 focus:border-indigo-500/60 transition-all placeholder-slate-400 dark:placeholder-slate-500 font-sans"
                type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                placeholder="e.g. Ahmed Hassan" />
            <x-input-error :messages="$errors->get('name')"
                class="mt-1.5 text-xs font-semibold text-pink-600 dark:text-pink-400" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')"
                class="text-[10px] font-semibold uppercase tracking-wider theme-text" />
            <x-text-input id="email"
                class="block mt-1.5 w-full theme-panel-soft border theme-border theme-text text-xs px-4 py-2.5 rounded-lg focus:outline-none focus:ring-1 focus:ring-indigo-500/50 focus:border-indigo-500/60 transition-all placeholder-slate-400 dark:placeholder-slate-500 font-sans"
                type="email" name="email" :value="old('email')" required autocomplete="username"
                placeholder="name@domain.com" />
            <x-input-error :messages="$errors->get('email')"
                class="mt-1.5 text-xs font-semibold text-pink-600 dark:text-pink-400" />
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <x-input-label for="password" :value="__('Password')"
                    class="text-[10px] font-semibold uppercase tracking-wider theme-text" />
                <x-text-input id="password"
                    class="block mt-1.5 w-full theme-panel-soft border theme-border theme-text text-xs px-4 py-2.5 rounded-lg focus:outline-none focus:ring-1 focus:ring-indigo-500/50 focus:border-indigo-500/60 transition-all placeholder-slate-400 dark:placeholder-slate-500 font-sans"
                    type="password" name="password" required autocomplete="new-password" placeholder="••••••••••••" />
                <x-input-error :messages="$errors->get('password')"
                    class="mt-1.5 text-xs font-semibold text-pink-600 dark:text-pink-400" />
            </div>

            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')"
                    class="text-[10px] font-semibold uppercase tracking-wider theme-text" />
                <x-text-input id="password_confirmation"
                    class="block mt-1.5 w-full theme-panel-soft border theme-border theme-text text-xs px-4 py-2.5 rounded-lg focus:outline-none focus:ring-1 focus:ring-indigo-500/50 focus:border-indigo-500/60 transition-all placeholder-slate-400 dark:placeholder-slate-500 font-sans"
                    type="password" name="password_confirmation" required autocomplete="new-password"
                    placeholder="••••••••••••" />
                <x-input-error :messages="$errors->get('password_confirmation')"
                    class="mt-1.5 text-xs font-semibold text-pink-600 dark:text-pink-400" />
            </div>
        </div>

        <div class="flex items-center justify-between pt-4 border-t theme-border mt-6">
            <a class="text-xs font-semibold theme-muted hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-200 underline underline-offset-4"
                href="{{ route('login') }}">
                {{ __('Already have an account?') }}
            </a>

            <button type="submit"
                class="px-5 py-2.5 rounded-lg bg-indigo-600 hover:bg-indigo-500 border border-indigo-600 hover:border-indigo-500 text-white font-display text-xs font-bold uppercase tracking-wider shadow-lg shadow-indigo-600/10 transition-all duration-200">
                {{ __('Sign Up') }}
            </button>
        </div>
    </form>
</x-guest-layout>