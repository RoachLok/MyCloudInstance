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
      

            <!-- Page Content -->
            <div class="header" style="display:flex; flex-direction: row;">
                <a class="font-semibold text-xl text-gray-800 leading-tight"  style="color: white;">
                    {{ __('Login Locations') }}
                </a>
                <a class="ml-4" href="#info" style="color: white;"> Here are displayed the logged in user past login locations.</a>
            
            </div>

            <div class="container" style="display: flex; flex-direction: row;"> 
                <div style="height:900px;  flex:90%; " id="map"></div>
                <div id="text-area" style="background-color: coral; height:900px; flex:10%; margin-left:auto;"></div>
            </div>

            

            <script>
                var map = L.map('map', {
                    zoomControl:true, 
                    maxZoom:20,
                    layers:[Spain_UnidadAdministrativa,Spain_PNOA_Ortoimagen]
                }).fitBounds([[24.9300000311,-19.6],[46.0700000311,5.6]]);
                map.setView([40.4167754, -3.70379020], 9);
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

            <script>
                // Create a request variable and assign a new XMLHttpRequest object to it.
                const request = new XMLHttpRequest();

                // Open a new connection, using the POST request on the URL endpoint.
                request.open('GET', 'http://localhost:8000/login_logs', true);

                request.onload = function () {  // Process response somehow // A json can also be retrieved. 
                    test = this.response;

                    console.log(test);
                    parsed_json = JSON.parse(test);

                    for (row of parsed_json) {
                        if (row.authenticatable_id == "<?php echo Auth::user()->id; ?>") {
                            console.log(row.ip_address);
                            L.marker([row.user_agent, row.authenticatable_type]).addTo(map);
                        }
                    }
                }

                // Send request
                request.send();
            </script>

          
        </div>
        <footer class="text-muted text-md text-center text-white">&copy; <a href="/">MCI</a> - 2021</footer>
    </body>
</html>

