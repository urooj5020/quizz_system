<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-2 border-b border-admin pb-4 text-left">
            <div>
                <span class="text-[10px] font-mono font-bold tracking-[0.4em] uppercase text-indigo-400 block">Profile Settings</span>
                <h1 class="text-4xl font-bold tracking-tight text-admin-fg font-display mt-1">{{ __('Profile Settings') }}</h1>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto space-y-8 px-4 sm:px-6 lg:px-8">
            
            <section class="space-y-3">
                <div class="text-left border-b border-admin pb-2">
                    <span class="text-[9px] font-mono tracking-widest text-admin-muted uppercase">Personal Information</span>
                </div>
                
                <div class="p-6 md:p-8 rounded-2xl bg-admin-surface border border-admin relative overflow-hidden shadow-admin transition-all duration-300 hover:border-admin-strong">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-indigo-500/[0.01] to-transparent pointer-events-none"></div>
                    <div class="max-w-xl text-admin-fg font-sans">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </section>

            <section class="space-y-3">
                <div class="text-left border-b border-admin pb-2">
                    <span class="text-[9px] font-mono tracking-widest text-admin-muted uppercase">Password</span>
                </div>
                
                <div class="p-6 md:p-8 rounded-2xl bg-admin-surface border border-admin relative overflow-hidden shadow-admin transition-all duration-300 hover:border-admin-strong">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-indigo-500/[0.01] to-transparent pointer-events-none"></div>
                    <div class="max-w-xl text-admin-fg font-sans">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </section>

            <section class="space-y-3">
                <div class="text-left border-b border-rose-950/60 pb-2">
                    <span class="text-[9px] font-mono tracking-widest text-rose-500 uppercase">Danger Zone</span>
                </div>
                
                <div class="p-6 md:p-8 rounded-2xl bg-admin-surface border border-rose-950/20 hover:border-rose-950/40 relative overflow-hidden shadow-admin transition-all duration-300">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-rose-500/[0.01] to-transparent pointer-events-none"></div>
                    <div class="max-w-xl text-admin-fg font-sans">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </section>

        </div>
    </div>
</x-app-layout>