<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.75">
        <link rel="icon" href="./static/img/ico.png">
        <title>MyCloudInstance</title>
        
        <!-- Code Editors Dependencies -->
        <script defer src="./static/js/code-editors/theme.js"></script>
        <link href="./static/css/code-editors/main.css" rel="stylesheet">

        <!-- STYLESHEETS -->

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
        <!-- Stylesheets -->
        <link href="./static/css/style.css" rel="stylesheet">


        <!-- SCRIPTS -->

        <!-- JQuery -->
        <script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

        <!-- Tab Closing -->
        <script defer src="./static/js/code-editors/main.js"></script>
    </head>
    <body class="placehold-color">
        <!-- NavBar -->
        <nav id="home" class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark snap-scroll hidden" style="visibility: hidden;">
            <a class="btn navbar-brand nav-btn" href="./index.html"> <img src="./static/img/logo.png" width="36" height="25" class="d-inline-block align-top" alt="mci-ico" style="margin-top: -13%;"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse overlap bg-dark" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="btn btn-outline-light nav-btn nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Settings
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Change this</a>
                            <a class="dropdown-item" href="#">Change that</a>
                            <a class="dropdown-item" href="#">Reset this</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="btn btn-outline-light nav-btn nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Environments
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="./gnu.html">C++ GNU</a>
                            <a class="dropdown-item" href="#">Jupyter Notebook</a>
                            <a class="dropdown-item" href="#">Java</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="btn btn-outline-light nav-btn nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Instances
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Linux Mint</a>
                            <a class="dropdown-item" href="#">Ubuntu Server</a>
                            <a class="dropdown-item" href="#">Windows Server</a>
                            <a class="dropdown-item disabled" href="#">More to come...</a>
                        </div>
                    </li>
                    <a class="btn btn-outline-light nav-btn nav-link"> docs </a>
                </div>
            </div>
            <div class="btn-group collapse navbar-collapse overlap bg-dark justify-content-end" id="navbarNavAltMarkup">
                <a class="btn btn-outline-light nav-link nav-btn btn-signup" href="signin.html"> Login </a>
                <a class="btn btn-outline-light nav-link nav-btn btn-signup" href="signup.html"> Register </a>
            </div>
        </nav> 

        <!-- Text Editor -->
        <section class="editor-container">
            <section class="code-container">
                <span class="sidebar">
                    <ul class="sidebar-nav">
                        <li class="logo">
                            <a href="./index.html" class="sidebar-link">
                                <span class="link-text logo-text">Home</span>
                                <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="angle-double-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x">
                                    <g class="fa-group">
                                        <path fill="currentColor" d="M224 273L88.37 409a23.78 23.78 0 0 1-33.8 0L32 386.36a23.94 23.94 0 0 1 0-33.89l96.13-96.37L32 159.73a23.94 23.94 0 0 1 0-33.89l22.44-22.79a23.78 23.78 0 0 1 33.8 0L223.88 239a23.94 23.94 0 0 1 .1 34z" class="fa-secondary"></path>
                                        <path fill="currentColor" d="M415.89 273L280.34 409a23.77 23.77 0 0 1-33.79 0L224 386.26a23.94 23.94 0 0 1 0-33.89L320.11 256l-96-96.47a23.94 23.94 0 0 1 0-33.89l22.52-22.59a23.77 23.77 0 0 1 33.79 0L416 239a24 24 0 0 1-.11 34z" class="fa-primary"></path>
                                    </g>
                                </svg>
                            </a>
                        </li>
                
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="cat" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-cat fa-w-16 fa-9x">
                                    <g class="fa-group">
                                        <path fill="currentColor" d="M371.7 238l-176-107c-15.8-8.8-35.7 2.5-35.7 21v208c0 18.4 19.8 29.8 35.7 21l176-101c16.4-9.1 16.4-32.8 0-42zM504 256C504 119 393 8 256 8S8 119 8 256s111 248 248 248 248-111 248-248zm-448 0c0-110.5 89.5-200 200-200s200 89.5 200 200-89.5 200-200 200S56 366.5 56 256z" class="fa-secondary"></path>
                                    </g>
                                </svg>
                                <span class="link-text">Run Code</span>
                            </a>
                        </li>
                
                        <li class="sidebar-item">
                            <a  href="#" id="composeButton" class="sidebar-link">
                                <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="alien-monster" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-alien-monster fa-w-18 fa-9x">
                                    <g class="fa-group" >
                                        <path fill="currentColor" d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm160-14.1v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z" class="fa-secondary"></path>
                                    </g>
                                </svg>
                                <span class="link-text">New</span>
                            </a>
                        </li>
                
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="space-station-moon-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-space-station-moon-alt fa-w-16 fa-5x">
                                    <g class="fa-group">
                                        <path fill="currentColor" d="M501.70312,224H448V160H368V96h48V66.67383A246.86934,246.86934,0,0,0,256,8C119.03125,8,8,119.0332,8,256a250.017,250.017,0,0,0,1.72656,28.26562C81.19531,306.76953,165.47656,320,256,320s174.80469-13.23047,246.27344-35.73438A250.017,250.017,0,0,0,504,256,248.44936,248.44936,0,0,0,501.70312,224ZM192,240a80,80,0,1,1,80-80A80.00021,80.00021,0,0,1,192,240ZM384,343.13867A940.33806,940.33806,0,0,1,256,352c-87.34375,0-168.71094-11.46094-239.28906-31.73633C45.05859,426.01953,141.29688,504,256,504a247.45808,247.45808,0,0,0,192-91.0918V384H384Z" class="fa-secondary"></path>
                                        <path fill="currentColor" d="M256,320c-90.52344,0-174.80469-13.23047-246.27344-35.73438a246.11376,246.11376,0,0,0,6.98438,35.998C87.28906,340.53906,168.65625,352,256,352s168.71094-11.46094,239.28906-31.73633a246.11376,246.11376,0,0,0,6.98438-35.998C430.80469,306.76953,346.52344,320,256,320Zm-64-80a80,80,0,1,0-80-80A80.00021,80.00021,0,0,0,192,240Zm0-104a24,24,0,1,1-24,24A23.99993,23.99993,0,0,1,192,136Z" class="fa-primary"></path>
                                    </g>
                                </svg>
                                <span class="link-text">Space</span>
                            </a>
                        </li>
                
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="space-shuttle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-space-shuttle fa-w-20 fa-5x">
                                    <g class="fa-group">
                                        <path fill="currentColor" d="M32 416c0 35.35 21.49 64 48 64h16V352H32zm154.54-232h280.13L376 168C243 140.59 222.45 51.22 128 34.65V160h18.34a45.62 45.62 0 0 1 40.2 24zM32 96v64h64V32H80c-26.51 0-48 28.65-48 64zm114.34 256H128v125.35C222.45 460.78 243 371.41 376 344l90.67-16H186.54a45.62 45.62 0 0 1-40.2 24z" class="fa-secondary"></path>
                                        <path fill="currentColor" d="M592.6 208.24C559.73 192.84 515.78 184 472 184H186.54a45.62 45.62 0 0 0-40.2-24H32c-23.2 0-32 10-32 24v144c0 14 8.82 24 32 24h114.34a45.62 45.62 0 0 0 40.2-24H472c43.78 0 87.73-8.84 120.6-24.24C622.28 289.84 640 272 640 256s-17.72-33.84-47.4-47.76zM488 296a8 8 0 0 1-8-8v-64a8 8 0 0 1 8-8c31.91 0 31.94 80 0 80z" class="fa-primary"></path>
                                    </g>
                                </svg>
                                <span class="link-text">Shuttle</span>
                            </a>
                        </li>
                
                        <li class="sidebar-item" id="themeButton">
                            <a href="#" class="sidebar-link">
                                <svg class="theme-icon" id="lightIcon" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="moon-stars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-moon-stars fa-w-16 fa-7x">
                                    <g class="fa-group">
                                        <path fill="currentColor" d="M320 32L304 0l-16 32-32 16 32 16 16 32 16-32 32-16zm138.7 149.3L432 128l-26.7 53.3L352 208l53.3 26.7L432 288l26.7-53.3L512 208z" class="fa-secondary"></path>
                                        <path fill="currentColor" d="M332.2 426.4c8.1-1.6 13.9 8 8.6 14.5a191.18 191.18 0 0 1-149 71.1C85.8 512 0 426 0 320c0-120 108.7-210.6 227-188.8 8.2 1.6 10.1 12.6 2.8 16.7a150.3 150.3 0 0 0-76.1 130.8c0 94 85.4 165.4 178.5 147.7z" class="fa-primary"></path>
                                    </g>
                                    </svg>
                                    <svg class="theme-icon" id="solarIcon" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="sun" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-sun fa-w-16 fa-7x">
                                    <g class="fa-group">
                                        <path fill="currentColor" d="M502.42 240.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.41-94.8a17.31 17.31 0 0 0-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4a17.31 17.31 0 0 0 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.41-33.5 47.3 94.7a17.31 17.31 0 0 0 31 0l47.31-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3a17.33 17.33 0 0 0 .2-31.1zm-155.9 106c-49.91 49.9-131.11 49.9-181 0a128.13 128.13 0 0 1 0-181c49.9-49.9 131.1-49.9 181 0a128.13 128.13 0 0 1 0 181z" class="fa-secondary"></path>
                                        <path fill="currentColor" d="M352 256a96 96 0 1 1-96-96 96.15 96.15 0 0 1 96 96z" class="fa-primary"></path>
                                    </g>
                                    </svg>
                                    <svg class="theme-icon" id="darkIcon" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="sunglasses" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-sunglasses fa-w-18 fa-7x">
                                    <g class="fa-group">
                                        <path fill="currentColor" d="M256 160c-52.9 0-96 43.1-96 96s43.1 96 96 96 96-43.1 96-96-43.1-96-96-96zm246.4 80.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.4-94.8c-6.4-12.8-24.6-12.8-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4c-12.8 6.4-12.8 24.6 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.4-33.5 47.3 94.7c6.4 12.8 24.6 12.8 31 0l47.3-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3c13-6.5 13-24.7.2-31.1zm-155.9 106c-49.9 49.9-131.1 49.9-181 0-49.9-49.9-49.9-131.1 0-181 49.9-49.9 131.1-49.9 181 0 49.9 49.9 49.9 131.1 0 181z" class="fa-secondary"></path>
                                    </g>
                                </svg>
                                <span class="link-text">Themify</span>
                            </a>
                        </li>
                    </ul>   
                </span>
                <div class="code-frame">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a id="composeButton" class="nav-link"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#iframe1" role="tab" aria-controls="iframe1" aria-selected="true">Untitled.cpp<button class="close closeTab tab-icon pl-3" type="button">×</button></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#iframe2" role="tab" aria-controls="iframe2" aria-selected="false">Untitled - 2.cpp<button class="close closeTab tab-icon pl-3" type="button" >×</button></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#iframe3" role="tab" aria-controls="iframe2" aria-selected="false">Untitled - 3.cpp<button class="close closeTab tab-icon pl-3" type="button" >×</button></a>
                        </li>
                    </ul>
                    <div class="tab-content code-frame" id="nav-tabContent">
                        <iframe id="iframe1" class="code-frame tab-pane fade show active" role="tabpanel" src="./editor.html?hello" name="test"></iframe>
                        <iframe id="iframe2" class="code-frame tab-pane fade" role="tabpanel" src="./editor.html" name="test"></iframe>
                        <iframe id="iframe3" class="code-frame tab-pane fade" role="tabpanel" src="./editor.html" name="test"></iframe>
                    </div>
                </div>

            </section>
            <section class="shell-container">

                  
            </section>
        </section>
           
        <!-- Footer -->
        <footer>
            <div class="container"><div class="row">
                <span class="col-xl-5">
                    <div>   
                        <a class="navbar-brand" href="index.html"><b class="footer-title">My Cloud Instance</b></a>
                        <p style="margin-top: 1em;">Simple instance and environment hosting platform where services are offered with simplicity as a premise.</p>
                        <p style="margin-top: 4em;">©  2021 MyCloudInstance. All Rights Reserved.</p>
                    </div>
                </span>

                <span class="col-md-4">
                    <h5>Contacto</h5>
                    <dl>
                        <dt>Address:</dt>
                        <dd><a href="https://www.google.com/maps/place/Mulah,+Maldives/@2.9464588,73.5796558,16z/data=!3m1!4b1!4m5!3m4!1s0x3b387db8bde51311:0x5101633cf14e8bc9!8m2!3d2.9440625!4d73.5873853">An address</a></dd>
                    </dl>
                    <dl>
                        <dt>e-Mail:</dt>
                        <dd><a href="mailto:#">mycloudinstance.contact@gmail.com</a></dd>
                    </dl>
                    <dl class="contact-list">
                        <dt>Support:</dt>
                        <dd><a href="#support">https://support.mycloudinstance.com</a> <span>
                        </dd>
                    </dl>
                </span>

                <span class="col-xl-3">
                    <h5>Links</h5>
                    <ul class="list-lash">
                        <li><a href="#home">About</a></li>
                        <li><a href="#home">Projects</a></li>
                        <li><a href="#home">Blog</a></li>
                        <li><a href="#home">Contact</a></li>
                        <li><a href="#home">Pricing</a></li>
                    </ul>
                </span>
            </div>
        </footer>
    </body>
</html> 