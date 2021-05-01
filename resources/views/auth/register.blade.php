<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=0.75" />
        <link rel="icon" href="./static/img/ico.png" />
        <title>MCI - Register</title>

        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"/>

        <!-- Stylesheet -->
        <link href="./static/css/signin.css" rel="stylesheet" />
    </head>

    <x-guest-layout>
        <x-jet-authentication-card>
            <x-slot name="logo">
                <a href="/"><img src="./static/img/ico.png" width="73" height="72"/> </a>
            </x-slot>

            <h1 class="h3 mb-10 font-weight-normal text-center">Registration</h1>

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="{{ __('Username') }}" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="{{ __('Email') }}" :value="old('email')" required />
                </div>

                <br>
                <hr></hr>

                <div class="mt-4">
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox name="terms" id="terms"/>

                                <div class="ml-2 mt-1">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-jet-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already have an account?') }}
                    </a>

                    <x-jet-button class="ml-4">
                        {{ __('Register') }}
                    </x-jet-button>
                </div>
            </form>
        </x-jet-authentication-card>
        <footer class="text-muted text-md text-center">&copy; <a href="/">MCI</a> - 2021</footer>
    </x-guest-layout>
    <script>
        // Temp fix for mega-crazy blade templating. No time to figure out where they wrap the html.
        document.getElementsByClassName("min-h-screen")[0].style="background-color: #212121;"
    </script>
</html> 
