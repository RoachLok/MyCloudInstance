<?php
    require_once('db.php');
    $hide=1;
    $link = "index.html";
    include ('session.php');
    include ('userclass.php');
    if ($hide == 0) {
        $userClass = new userClass();
	    $userDetails=$userClass->userDetails($session_id);
        $user= $userDetails->username;
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.75">
        <link rel="icon" href="./static/img/ico.png">
        <title>MyCloudInstance</title>
        
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
        <link href="./static/css/product.css" rel="stylesheet">
        <link href="./static/css/nav.css" rel="stylesheet">
        
        <!-- JQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
        <!-- Local dependencies -->
        <script defer type="text/javascript" src="./static/js/main.js"></script>
        <script type="text/javascript" src="./static/js/nav.js"></script>

    </head>
    <body>
        <!-- NavBar -->
        <nav id="home" class="navbar navbar-expand-lg fixed-top navbar-dark snap-scroll scrolling-navbar">
            <a class="btn navbar-brand nav-btn" href="#"> <img src="./static/img/logo.png" width="36" height="25" class="d-inline-block align-top" alt="mci-ico" style="margin-top: -13%;"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup" name="nav-collapsers">
                <div class="navbar-nav" name="nav-collapsers">
                    <a class="btn btn-outline-light nav-btn nav-link" href="#features"> Features </a>
                    <a class="btn btn-outline-light nav-btn nav-link" href="#howto"> How To </a>

                    <li class="nav-item dropdown">
                        <a class="btn btn-outline-light nav-btn nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Environments
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="./gnu.php">C++ GNU</a>
                            <a class="dropdown-item" >Jupyter Notebook</a>
                            <a class="dropdown-item" href="./java_editor.php">Java</a>
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
                    <a class="btn btn-outline-light nav-btn nav-link" href="https://github.com/RoachLok/MyCloudInstance"> GitHub </a>
                    <a class="btn btn-outline-light nav-btn nav-link"> docs </a>
                </div>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup" name="nav-collapsers" >
                <a class="btn btn-outline-light nav-btn nav-link"> Hello <?php echo $user; ?> </a>    
                <a class="btn btn-outline-light nav-btn nav-link" href="logout.php"> Logout </a>    
            </div>
        </nav> 
        <script>
            if (window.innerWidth < 1000) {
                const query = document.getElementsByName('nav-collapsers');
                for (element of query) {
                    element.style.backgroundColor = '#212121';
                    element.style.opacity = '93%';
                }
            } else {
                const query = document.getElementsByName('nav-collapsers');
                for (element of query) {
                    element.style.backgroundColor = 'transparent';
                    element.style.opacity = '100%';
                }
            }
        </script>

        <!-- Carousel -->
        <div id="carousel" class="carousel slide snap-scroll" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
                <li data-target="#carousel" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="./static/img/caru_4.jpg" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1>Simplicity as a Premise</h1>
                            <p>Start coding now without the need of registering.</p>
                            <p>
                                <a class="btn btn-light" href="gnu.php">Start coding</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./static/img/caru_1.png" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1>Do more</h1>
                            <p>Register now to access more free services.</p>
                            <p>
                                <button class="btn btn-light">ALREADY REGISTERED</button>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./static/img/caru_3.jpg" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1>Instance Hosting</h1>
                            <p style="max-width: 50vw;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam libero et fermentum commodo. Vivamus maximus erat fermentum ex vulputate accumsan. Nam congue neque eget leo posuere, non ornare ex imperdiet.</p>
                            <p>
                                <button class="btn btn-light">Pricing</button>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./static/img/caru_2.png" alt="Fourth slide">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1>About Us</h1>
                            <p style="max-width: 50vw;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam libero et fermentum commodo. Vivamus maximus erat fermentum ex vulputate accumsan. Nam congue neque eget leo posuere, non ornare ex imperdiet.</p>
                            <p>
                                <a class="btn btn-light" href="about.html">Go to About us</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!-- Info Sections -->
        <section id="features">
            <div class="container">
                <div class="row">
                    <h4 class="title">FEATURES</h4>
                </div>
                <div class="row">
                    <div class="col info-col text-col">
                        <div class="row">
                            <h3 class="subtitle">As Premise: Simplicity and Efficiency</h3>
                        </div>
                        <div class="row">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam libero et fermentum commodo. Vivamus maximus erat fermentum ex vulputate accumsan. Nam congue neque eget leo posuere, non ornare ex imperdiet. Curabitur augue nulla, aliquam tincidunt ultricies vehicula, interdum vel tellus. Vestibulum augue orci, lacinia nec diam dapibus, elementum fringilla mi. Nunc sit amet ligula ut tortor feugiat pharetra. Ut tristique elit in tincidunt rhoncus. Cras ac condimentum sapien. 
                        </div>
                    </div>
                    <div class="col info-col">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/dH0yz-Osy54" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="d-md-flex flex-md-equal w-60 my-md-3 pl-md-3">
                <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
                    <div class="my-3 py-3">
                        <h2 class="display-5">Testing this</h2>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="bg-light box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
                </div>
                <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                    <div class="my-3 p-3">
                        <h2 class="display-5">That had been</h2>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="bg-dark box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
                </div>
            </div>     
        </section>

        <section id="howto">
            <div class="container">
                <div class="row">
                    <h4 class="title">HOW TO</h4>
                </div>
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/dH0yz-Osy54" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="d-md-flex flex-md-equal w-60 my-md-3 pl-md-3">
                <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                    <div class="my-3 p-3">
                        <h2 class="display-5">Not so cool</h2>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="bg-dark box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
                </div>
                <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
                    <div class="my-3 py-3">
                        <h2 class="display-5">Im not sure</h2>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="bg-light box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
                </div>
            </div>   
            
        </section>

        <!-- Footer -->
        <footer>
            <div class="container"><div class="row">
                <span class="col-xl-5">
                    <div>
                        <a class="navbar-brand" href="index.html"><b class="footer-title">My Cloud Instance</b></a>
                        <p style="margin-top: 1em;">Simple instance and environment hosting platform where services are offered with simplicity as a premise.</p>
                        <p style="margin-top: 5.5em;">©  2021 MyCloudInstance. All Rights Reserved.</p>
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
                        <li><a href="about.html">About</a></li>
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