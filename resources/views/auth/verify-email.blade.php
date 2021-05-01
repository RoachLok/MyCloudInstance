<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=0.75" />
        <link rel="icon" href="../static/img/ico.png" />
        <title>MCI - Verify</title>

        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"/>

        <!-- Stylesheet -->
        <link href="../static/css/signin.css" rel="stylesheet" />
    </head>
    <x-guest-layout>
        <x-jet-authentication-card>
            <x-slot name="logo">
                <a href="/"><img src="../static/img/ico.png" width="73" height="72"/> </a>
            </x-slot>

            <h1 class="h3 mb-10 font-weight-normal text-center">Welcome to MCI</h1>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Thank you for signing up! Before getting started, please verify your email by clicking on the link we just sent you. If you didn\'t receive an email you can click on the button bellow.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-jet-button type="submit">
                            {{ __('Resend Verification Email') }}
                        </x-jet-button>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                        {{ __('Log Out') }}
                    </button>
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