<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=0.75" />
        <link rel="icon" href="./static/img/ico.png" />
        <title>MCI - Privacy Policy</title>

        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"/>

        <style>
            html,body {
                background-color: #212121;
            }
        </style>
        
    </head>
    <x-guest-layout>
        <div class="pt-4 bg-gray-100" style="background-color: #212121;">
            <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
                <div>
                    <a href="/"><img src="./static/img/ico.png" width="73" height="72"/> </a>
                </div>

                <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                    {!! $policy !!}
                </div>
            </div>
        </div>
    </x-guest-layout>
    <footer class="text-muted text-md text-center">&copy; <a href="/">MCI</a> - 2021</footer>
    <script>
        // Temp fix for mega-crazy blade templating. No time to figure out where they wrap the html.
        document.getElementsByClassName("min-h-screen")[0].style="background-color: #212121;"
    </script>
</html> 
