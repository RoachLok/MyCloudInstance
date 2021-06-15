<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="../static/img/ico.png" />

        <title>MCI - Mapview Copy</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

        <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" />
        <script src="//api.tiles.mapbox.com/mapbox.js/plugins/turf/v1.4.0/turf.min.js"></script>
        <script src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script>
        <script src="https://sigdeletras.github.io/Leaflet.Spain.WMS/src/Leaflet.Spain.WMS.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@turf/turf@5/turf.min.js"></script>


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

        @livewire('navigation-menu')
        <div class=" bg-gray-100">


            <!-- Page Content -->

            <div class="container" style="display: flex; flex-direction: row;"> 
                <div style="height:900px;  flex:90%; " id="map"></div>
                <div style="background-color: coral; height:900px; flex:10%; margin-left:auto;"></div>
            </div>


            <script>
                var map = L.map('map', {
                    zoomControl:true, 
                    maxZoom:20,
                    layers:[Spain_UnidadAdministrativa,Spain_PNOA_Ortoimagen]
                }).fitBounds([[24.9300000311,-19.6],[46.0700000311,5.6]]);
                
                var baselayers = {
                    "PNOA Mosaico": Spain_PNOA_Mosaico,
                    "PNOA Máx. Actualidad": Spain_PNOA_Ortoimagen,
                    "PNOA 2010": Spain_PNOA_2010
                };
                var overlayers = {
                    "Unidades administrativas": Spain_UnidadAdministrativa
                };
                
                L.control.layers(baselayers, overlayers,{collapsed:false}).addTo(map);
            </script>

            
        </div>
        

        <footer class="text-muted text-md text-center text-white">&copy;
        <?php
            use Http\Controllers\UserLogs;
            echo Auth::user()->name.'<br>'.Auth::user()->previousLoginAt().'<br>'.Auth::user()->is_admin;
        ?>
            <a href="/">MCI</a> - 2021</footer>
    </body>
</html>

