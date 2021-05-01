<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=0.75" />
        <link rel="icon" href="./static/img/ico.png" />
        <title>MCI - Login</title>

        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"/>

        <!-- Stylesheet -->
        <link href="./static/css/signin.css" rel="stylesheet" />
    </head>


        <x-guest-layout>
            <x-jet-authentication-card class="flex-col">
                <x-slot name="logo">
                    <a href="/"><img src="./static/img/ico.png" width="73" height="72"/> </a>
                </x-slot>
                
                <h1 class="h3 mb-10 font-weight-normal text-center">User Login</h1>

                <x-jet-validation-errors class="mb-4"/>

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <x-jet-input id="email" placeholder="{{ __('Email') }}" class="block mt-2 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-jet-input id="password" placeholder="{{ __('Password') }}" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="block mt-6 ml-1">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button>
                            {{ __('Log in') }}
                        </x-jet-button>
                        <a class="ml-4 text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                            {{ __('Or make a new account.') }}
                        </a>
                    </div>

                </form>
                <div class="mt-4 text-center">
                    @if (Route::has('password.request'))
                        <a class="underline text-muted text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </x-jet-authentication-card>
            <footer class="text-muted text-md text-center">&copy; <a href="/">MCI</a> - 2021</footer>
        </x-guest-layout>
    <script>
        // Temp fix for mega-crazy blade templating. No time to figure out where they wrap the html.
        document.getElementsByClassName("min-h-screen")[0].style="background-color: #212121;"
    </script>
</html> 

