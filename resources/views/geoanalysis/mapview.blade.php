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
        <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">


        <!-- JQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
        
        <!-- Map Plugins and Leaflet -->
        <script src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script>
        <script src="../static/js/Leaflet.heat/dist/leaflet-heat.js"></script>
        <script src="https://sigdeletras.github.io/Leaflet.Spain.WMS/src/Leaflet.Spain.WMS.js"></script>

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

            .drop_hover:hover {
                color: #16181b !important; 
                text-decoration: none;
                background-color: #737373 !important;
            }
        </style>

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

    </head>
    <body class="font-sans antialiased" >
    <!-- To top Button -->
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
        <x-jet-banner />

        @livewire('navigation-menu')
        <div class="container">
            <!-- Page Content -->
            <div style="background-color: #333333;  margin-right:auto; ">
                <h1 style="font-size: 2rem; color:white; padding-top:0.25rem; padding-left:1rem;">Output Settings:</h1>
                <hr style="background-color: #ee9107; margin-left:0.75rem; margin-right:0.75rem; margin-top:0.25rem;">
            </div>
            <div style="background-color: #333333;  margin-right:auto;">
                <div style="display: flex; flex-wrap: wrap; margin-left: 2vw; align-items: center; margin-bottom: 0.2rem;">
                    <h1 style="font-size: 1rem; color:white; padding-top:0.25rem; padding-left:1rem; min-width: 180px; width: 6vw;">Geographical Filters:</h1>
                    <div class="btn-group dropdown">
                        <button id="auco_drop_btn" style="width: 13vw; min-width: 185px;" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                AACC
                        </button>
                        <div id="auco_dropdown" class="dropdown-menu" style="z-index:9999; overflow-y: scroll; max-height: 25vh;">
                                <a class="dropdown-item">Loading Aucos ...</a>
                        </div>
                    </div>
                    <div class="btn-group dropdown">
                        <button id="city_drop_btn" style="width: 13vw; min-width: 185px;" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                City
                        </button>
                        <div id="city_dropdown" class="dropdown-menu" style="z-index:9999; overflow-y: scroll; max-height: 25vh;" >
                                <a class="dropdown-item">Waiting for auco.</a>
                        </div>
                    </div>
                    <div class="btn-group dropdown">
                        <button id="muni_drop_btn" style="width: 13vw; min-width: 185px;" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Muni
                        </button>
                        <div id="muni_dropdown" class="dropdown-menu" style="z-index:9999; overflow-y: scroll; max-height: 25vh;" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item">Waiting for city.</a>
                        </div>
                    </div>
                </div>
            </div>
            <div style="background-color: #333333; height:900px; margin-right:auto; ">
                <div style="display: flex; flex-wrap: wrap; margin-left: 2vw; align-items: center; margin-bottom: 0.2rem;">
                    <h1 style="font-size: 1rem; color:white; padding-top:0.25rem; padding-left:1rem; min-width: 180px; width: 6vw;">User Filters:</h1>
                    <div class="btn-group dropright">
                        <button id="user_drop_btn" style="width: 13vw;  min-width: 200px;" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            User Selector
                        </button>
                        <div id="user_dropdown" style="z-index:9999; overflow-y: scroll; max-height: 25vh;" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item">Loading Users ...</a>
                        </div>
                    </div>
                    <button class="btn btn-unique btn-outline-light" onclick="drawHeatMap()" style=" background-color: #880e4f !important; margin-left:auto; min-width:149px;" title="Lanzar">
                     Search <i class="fas fa-search-location ml-2"></i>
                    </button> 
                </div>
                <div style="height:900px;" id="map"></div>
                <footer class="text-muted text-md text-center text-white">&copy; <a href="/">MCI</a> - 2021</footer>
            </div>

            <!-- map init -->
            <script>
                var map = L.map('map', {
                    zoomControl:true, 
                    maxZoom:20,
                    layers:[Spain_UnidadAdministrativa,Spain_PNOA_Ortoimagen]
                }).fitBounds([[24.9300000311,-19.6],[46.0700000311,5.6]]);

                map.setView([40.4167754, -3.70379020], 7);
                
                var baselayers = {
                    "PNOA Mosaico": Spain_PNOA_Mosaico,
                    "PNOA Máx. Actualidad": Spain_PNOA_Ortoimagen,
                    "PNOA 2010": Spain_PNOA_2010
                };
                var overlayers = {
                    "Unidades administrativas": Spain_UnidadAdministrativa
                };
                
                L.control.layers(baselayers, overlayers,{collapsed:false}).addTo(map);

                var heat = L.heatLayer([
                    [40.4168, -3.7038, 4000], // lat, lng, intensity. Max intensity 4000
                    [50.6, 30.4, 0.5]
                ], {radius: 25}).addTo(map);
            </script> 
            <!-- get logs -->
            <script>
                function handleUserLogs() {
                    // Create a request variable and assign a new XMLHttpRequest object to it.
                    const request = new XMLHttpRequest();
                    // Open a new connection, using the POST request on the URL endpoint.
                    request.open('GET', 'http://rocho.duckdns.org/login_logs/all', true);
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
                }
            </script>

            <!-- Filters init -->
            <script>
                function user_select(user_info, element) {
                    switch(element) {
                        case 'user':
                            document.getElementById('user_drop_btn').textContent = '\n' + user_info + '\n';
                            break;

                        case 'auco':
                            document.getElementById('auco_drop_btn').textContent = '\n' + user_info + '\n';
                            initCityDrop(user_info);
                            break;
                        case 'city':
                            document.getElementById('city_drop_btn').textContent = '\n' + user_info + '\n';
                            initMuniDrop(user_info);
                        break;
                        case 'muni':
                            document.getElementById('muni_drop_btn').textContent = '\n' + user_info + '\n';
                        break;
                    } 
                }

                function initUserDrop() {
                    // Create a request variable and assign a new XMLHttpRequest object to it.
                    const request = new XMLHttpRequest();
                    // Open a new connection, using the POST request on the URL endpoint.
                    request.open('GET', 'http://rocho.duckdns.org/list_users', true);
                    request.onload = function () {  // Process response somehow // A json can also be retrieved. 
                        parsed_json = JSON.parse(this.response);
                        user_drop = document.getElementById('user_dropdown');
                        
                        user_drop_content = '<input class="form-control" type="text" placeholder="Search" id="user-search-input" onkeyup="searchDropdown(`user`)">\n';
                        for (user of parsed_json) {
                            content = user.id + ' -> ' + user.name;
                            user_drop_content += '<a class="dropdown-item drop_hover" onclick="user_select(`'+ content +'`, `user`)">' + content + '</a>';
                        }
                            
                        user_drop.innerHTML = user_drop_content;
                    }
                    // Send request
                    request.send();
                }

                function initAucoDrop() {
                    // Create a request variable and assign a new XMLHttpRequest object to it.
                    const request = new XMLHttpRequest();
                    // Open a new connection, using the POST request on the URL endpoint.
                    request.open('GET', 'http://rocho.duckdns.org/get_ac', true);
                    request.onload = function () {  // Process response somehow // A json can also be retrieved. 
                        parsed_json = JSON.parse(this.response);
                        auco_drop = document.getElementById('auco_dropdown');
                        
                        user_drop_content = '<input class="form-control" type="text" placeholder="Search" id="auco-search-input" onkeyup="searchDropdown(`auco`)">\n';
                        for (auco of parsed_json) {
                            content = auco.auco;
                            user_drop_content += '<a class="dropdown-item drop_hover" onclick="user_select(`'+ content +'`, `auco`)">' + content + '</a>';
                        }
                            
                        auco_drop.innerHTML = user_drop_content;
                    }
                    // Send request
                    request.send();
                }

                function initCityDrop(from_auco) {
                    // Create a request variable and assign a new XMLHttpRequest object to it.
                    const request = new XMLHttpRequest();
                    // Open a new connection, using the POST request on the URL endpoint.
                    request.open('GET', 'http://rocho.duckdns.org/get_city/'+from_auco, true);
                    request.onload = function () {  // Process response somehow // A json can also be retrieved. 
                        parsed_json = JSON.parse(this.response);
                        city_drop = document.getElementById('city_dropdown');
                        
                        user_drop_content = '<input class="form-control" type="text" placeholder="Search" id="city-search-input" onkeyup="searchDropdown(`city`)">\n';
                        for (city of parsed_json) {
                            content = city.city;
                            user_drop_content += '<a class="dropdown-item drop_hover" onclick="user_select(`'+ content +'`, `city`)">' + content + '</a>';
                        }
                            
                        city_drop.innerHTML = user_drop_content;
                    }
                    // Send request
                    request.send();
                }

                function initMuniDrop(from_city) {
                    // Create a request variable and assign a new XMLHttpRequest object to it.
                    const request = new XMLHttpRequest();
                    // Open a new connection, using the POST request on the URL endpoint.
                    request.open('GET', 'http://rocho.duckdns.org/get_muni/'+from_city, true);
                    request.onload = function () {  // Process response somehow // A json can also be retrieved. 
                        parsed_json = JSON.parse(this.response);
                        muni_drop = document.getElementById('muni_dropdown');
                        
                        user_drop_content = '<input class="form-control" type="text" placeholder="Search" id="muni-search-input" onkeyup="searchDropdown(`muni`)">\n';
                        for (muni of parsed_json) {
                            content = muni.muni;
                            user_drop_content += '<a class="dropdown-item drop_hover" onclick="user_select(`'+ content +'`, `muni`)">' + content + '</a>';
                        }
                            
                        muni_drop.innerHTML = user_drop_content;
                    }
                    // Send request
                    request.send();
                }

                initUserDrop();
                initAucoDrop();
            </script>

            <!-- Drawn Heatmap -->
            <script>
                function drawHeatMap() {
                    const request = new XMLHttpRequest();
                    // Open a new connection, using the POST request on the URL endpoint.
                    request.open('POST', './train_model', true);

                    request.onload = function () {  // Process response somehow.
                        let results_section = document.getElementById('results-section');

                        let results_div = document.createElement('div');
                        results_div.classList.add('row');
                        results_div.id = 'model-metrics';
                        results_div.innerHTML = this.response;

                        results_section.style.height = '130vh';
                        results_section.replaceChild(results_div, results_section.children[2]);
                        

                        $("html, body").animate({ scrollTop: document.body.scrollHeight }, "slow");
                    }

                    // Send request
                    request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                    request.send(JSON.stringify(form_values));
                }
            </script>

            <!-- Search on dropdowns -->
            <script>
                function searchDropdown(item_type) {
                    /*
                    * Source: https://www.w3schools.com/howto/howto_js_filter_dropdown.asp
                    */

                    let input, filter, ul, li, a, i;
                    input = document.getElementById(item_type + '-search-input');
                    filter = input.value.toUpperCase();
                    div = document.getElementById(item_type + '_dropdown');
                    button = div.getElementsByTagName('a');
                    for (i = 0; i < button.length; i++) {
                        txtValue = button[i].textContent || button[i].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            button[i].style.display = "";
                        } else {
                            button[i].style.display = "none";
                        }
                    }
                } 
            </script>
        </div>
    </body>
</html>

