    <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=0.75" />
    <link rel="icon" href="./static/img/ico.png" />
    <title>MCI - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"/>

    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet"/>

    <!-- Stylesheet -->
    <link href="./static/css/signin.css" rel="stylesheet" />
  </head>

  <!--<body class="text-center">
    <form method="POST" action="{{ route('login') }}">
        <img class="mb-4" src="./static/img/ico.png" alt="" width="72" height="72" />
        <h1 class="h3 mb-3 font-weight-normal">User Login</h1>
        <x-jet-input placeholder="{{ __('Email') }}" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus/>
        
        <div class="mt-4">
          <x-jet-input id="password" placeholder="{{ __('Password') }}" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
        </div>

        <div class="block mt-4">
          <label for="remember_me" class="flex items-center ml-10">
            <x-jet-checkbox id="remember_me" name="remember" />
            <span class="ml-4 text-md ">{{ __('Remember me') }}</span>
          </label>
        </div>
        
        

        <div class="flex items-center justify-end mt-4">
          @if (Route::has('password.request'))
              <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                  {{ __('Forgot your password?') }}
              </a>
          @endif

          <input type="submit" value="{{ __('Log in') }}" name="submit" class="btn btn-lg btn-primary btn-block"/>
        </div>


        <div class="btn-group btn-block">
          <a class="btn btn-lg btn-secondary btn-block" style="background-color: #07518f !important; min-width: 50%;" href="signup">Register</a>
          <a class="btn btn-lg btn-warning btn-block" style="max-width: 50%;" href="/">Back</a>
        </div>
        <p class="mt-5 mb-3 text-muted">&copy; MCI - 2021</p> 
    </form>

        <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo" >
          <img class="mb-4" href="/" src="./static/img/ico.png" alt="" width="73" height="72" />
        </x-slot>
          <h1 class="h3 mb-3 font-weight-normal">User Login</h1>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
            </div>

            <div class="mt-4">
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
        <p class="mt-5 mb-3 text-muted">&copy; MCI - 2021</p> 
    </x-jet-authentication-card>
</x-guest-layout>
  </body> -->

  <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        <img href="/" src="./static/img/ico.png" alt="" width="73" height="72" />

        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
      <p class="mt-5 mb-3 text-muted">&copy; MCI - 2021</p> 

    </x-jet-authentication-card>
</x-guest-layout>

</html> 


