<x-app-layout>
    <x-slot name="header">
        <a class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </a>
        <a class="ml-4" href="#info">User Info</a>
        <a class="ml-4" href="#pwd">Password Update</a>
        <a class="ml-4" href="#2FA">2FA</a>
        <a class="ml-4" href="#sess">Sessions</a>
        <a class="ml-4" href="#del">Account</a>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div id="#info" class="snap-scroll">
                    @livewire('profile.update-profile-information-form')
                </div>    

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0 snap-scroll" id="pwd">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0 snap-scroll" id="2FA">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0 snap-scroll" id="sess">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0 snap-scroll" id="del">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
