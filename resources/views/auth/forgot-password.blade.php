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

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="block">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-jet-button>
                        {{ __('Email Password Reset Link') }}
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