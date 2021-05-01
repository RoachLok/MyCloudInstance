<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=0.75" />
        <link rel="icon" href="./static/img/ico.png" />
        <title>MCI - 2FA</title>

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

            <h1 class="h3 mb-10 font-weight-normal text-center">2FA</h1>


            <div x-data="{ recovery: false }">
                <div class="mb-4 text-sm text-gray-600" x-show="! recovery">
                    {{ __('Please provide the code from your Authenticator-App to verify your identity.') }}
                </div>

                <div class="mb-4 text-sm text-gray-600" x-show="recovery">
                    {{ __('If you can\'t access your Authenticator App, you can still log in using one of your emergency recovery codes.') }}
                </div>

                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('two-factor.login') }}">
                    @csrf

                    <div class="mt-4" x-show="! recovery">
                        <x-jet-label for="code" value="{{ __('Authenticator App Code') }}" />
                        <x-jet-input id="code" class="block mt-1 w-full" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                    </div>

                    <div class="mt-4" x-show="recovery">
                        <x-jet-label for="recovery_code" value="{{ __('Recovery Code') }}" />
                        <x-jet-input id="recovery_code" class="block mt-1 w-full" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                                        x-show="! recovery"
                                        x-on:click="
                                            recovery = true;
                                            $nextTick(() => { $refs.recovery_code.focus() })
                                        ">
                            {{ __('Use recovery codes instead') }}
                        </button>

                        <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                                        x-show="recovery"
                                        x-on:click="
                                            recovery = false;
                                            $nextTick(() => { $refs.code.focus() })
                                        ">
                            {{ __('Use authentication code') }}
                        </button>

                        <x-jet-button class="ml-4">
                            {{ __('Submit') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </x-jet-authentication-card>
        <footer class="text-muted text-md text-center">&copy; <a href="/">MCI</a> - 2021</footer>
    </x-guest-layout>
    <script>
        // Temp fix for mega-crazy blade templating. No time to figure out where they wrap the html.
        document.getElementsByClassName("min-h-screen")[0].style="background-color: #212121;"
    </script>
</html> 
