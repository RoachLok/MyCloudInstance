<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=0.75" />
        <link rel="icon" href="./static/img/ico.png" />
        <title>MCI - ID. Confirmation</title>

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

            <div class="mb-4 text-sm text-gray-600">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div>
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" autofocus />
                </div>

                <div class="flex justify-end mt-4">
                    <x-jet-button class="ml-4">
                        {{ __('Confirm') }}
                    </x-jet-button>
                </div>
            </form>
        </x-jet-authentication-card>
    </x-guest-layout>
    <script>
        // Temp fix for mega-crazy blade templating. No time to figure out where they wrap the html.
        document.getElementsByClassName("min-h-screen")[0].style="background-color: #212121;"
    </script>
</html> 

