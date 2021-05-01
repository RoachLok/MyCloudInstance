<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="../static/img/ico.png" />

        <title>MCI - Dashboard</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <style>
            html {
                scroll-behavior: smooth;
            }
            .snap-scroll {
                scroll-snap-align: start;
                scroll-snap-stop : normal;
            }
            #tpBtn {
                position: fixed; /* Sticky position */
                bottom: 20px;
                right: 30px;
                z-index: 99; 
                border: none;
                outline: none;
                background-color: #ee9107;
                color: white;
                cursor: pointer; /* Add a mouse pointer on hover */
                padding: 15px;
                border-radius: 10px; /* Rounded corners */
                font-size: 18px;
            }

            #tpBtn:hover {
                background-color: #555;
            }
        </style>

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

    </head>
    <button class="btn" onclick="toTop()" id="tpBtn" title="Go to top">🚀</button>
    <script defer>
        //Get the button:
        mybutton = document.getElementById("tpBtn");
        mybutton.style.display = "none";

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function toTop() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        } 
    </script>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 d-flex flex-row align-items-end">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        <footer class="text-muted text-md text-center text-white">&copy; <a href="/">MCI</a> - 2021</footer>

    </body>
</html>
