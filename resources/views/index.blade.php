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
        <link href="./static/css/footer.css" rel="stylesheet">
        
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
        <!-- Script for login button to work  -->
        <script src="{{ mix('js/app.js') }}" defer></script>

    </head>
    <body>
        <!-- NavBar -->
        <nav id="home" class="navbar navbar-expand-lg fixed-top navbar-dark snap-scroll scrolling-navbar">
            <a class="btn navbar-brand nav-btn" href="/"> <img src="./static/img/logo.png" width="36" height="25" class="d-inline-block align-top" alt="mci-ico" style="margin-top: -13%;"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup" name="nav-collapsers">
                <div class="navbar-nav">
                    <a class="btn btn-outline-white nav-btn nav-link" href="#features"> Features </a>
                    <li class="nav-item dropdown">
                        <a class="btn btn-outline-white nav-btn nav-link dropdown-toggle" href="#" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Coding
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="./gnu">C++ GNU</a>
                            <a class="dropdown-item" >Jupyter Notebook</a>
                            <a class="dropdown-item" href="./java_editor">Java</a>
                        </div>
                    </li>
                    <a class="btn btn-outline-white nav-btn nav-link" href="/education"> Education </a>
                    <li class="nav-item dropdown">
                        <a class="btn btn-outline-white nav-btn nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Instances
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Linux Mint</a>
                            <a class="dropdown-item" href="#">Ubuntu Server</a>
                            <a class="dropdown-item" href="#">Windows Server</a>
                            <a class="dropdown-item disabled" href="#">More to come...</a>
                        </div>
                    </li>
                    <a class="btn btn-outline-white nav-btn nav-link" href="/about"> About Us </a>
                    <a class="btn btn-outline-white nav-btn nav-link" href="https://github.com/RoachLok/MyCloudInstance"> GitHub </a>
                </div>
            </div>

            @if (auth()->user())
                <div class="btn-group dropleft">
                    <button style="border-radius: 50%; width: 50px; height: 50px;" type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img style="border-radius: 50%; width: 40px; height: 40px;" class="" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </button>
                    <div style="z-index:9999;" class="dropdown-menu">
                            <a class="dropdown-item">Loading Users ...</a>
                    </div>
                </div>
            @else
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup" name="nav-collapsers">
                    <a class="btn btn-outline-white nav-btn nav-link" href="login"> Login </a>    
                    <a class="btn btn-outline-white nav-link nav-btn" href="register"> Register </a>
                </div>
            @endif
        </nav>
        <script>
            if (window.innerWidth < 1000) {
                const query = document.getElementsByName('nav-collapsers');
                for (element of query) {
                    element.style.backgroundColor = '#212121';
                    element.style.opacity = '95%';
                }
            } else {
                const query = document.getElementsByName('nav-collapsers');
                for (element of query) {
                    element.style.backgroundColor = 'transparent';
                    element.style.opacity = '0%';
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
                                <a class="btn btn-white" href="gnu.html">Start coding</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./static/img/caru_1.jpg" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1>Do more</h1>
                            <p>Register now to access more free services.</p>
                            <p>
                                <a class="btn btn-white" href="signup.php">SIGN UP</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./static/img/domore.png" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1>Instance Hosting</h1>
                            <p style="max-width: 50vw;">Enjoy our instance hosting service!</p>
                            <p>
                                <button href="#instancias" class="btn btn-white">Pricing</button>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./static/img/caru_2.jpg" alt="Fourth slide">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1>About Us</h1>
                            <p style="max-width: 50vw;">Discover our team and more!</p>
                            <p>
                                <a class="btn btn-white" href="about.html">Go to About us</a>
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
                <div class="row" style="padding-top: 10rem;">
                    <div class="col">
                        <img src="./static/img/prim.png" style="width: 80%;"></img>
                    </div>
                    <div class="col">
                        <div class="row">
                            <h3 class="subtitle" style="font-weight: bolder;">As Premise: Simplicity and Efficiency</h3>
                        </div>
                        <div class="row" style="text">
                            <p style="text-align: justify;">Haz que los adversarios vean como extraordinario lo que es ordinario para ti; haz que vean como ordinario lo que es extraordinario para ti.</p>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 2rem; padding botom: 10rem;">
                    <div class="col">
                        <p>Nuestra plataforma ofrece varios servicios SaaS IaaS y PaaS. Puede conocer mas sobre el concepto de clopud computing
                            mediante el siguiente video.
                        </p>

                    </div>
                    <div class="col">
                        <iframe width="400" height="225" src="https://www.youtube.com/embed/dH0yz-Osy54" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div> 
        </section>
        
        <section id="onlineide">
            <div class="container">
                <div class="row" style="padding-top: 10rem;">
                    <div class="col">
                        <div class="row">
                            <h3 class="subtitle" style="font-weight: bolder;">Online coding IDE</h3>
                        </div>
                        <div class="row">
                            <p style="text-align: justify;">Without the need of a registered account,
                                you will be able to access freely to our on-line IDE. Here you will be
                                able to programe in: Java, C++ and Python.
                                To unlock all of the on-line IDE features, you will need to
                                creat an account, freely of cost. 
                                Stop wasting your time, and hop onto the coding life.
                            </p> 
                            <a class="btn btn-dark" href="">Start coding</a>
                        </div>
                    </div>
                    <div class="col">
                        <img src="./static/img/progra.png" style="width: 100%;"></img>
                    </div>
                </div>
                <div class="d-md-flex flex-md-equal w-60 my-md-3 pl-md-3">
                    <div class="bg-white mr-md-3 pt-3 px-3 pt-md-1 px-md-5 text-center text-black overflow-hidden">
                        <div class="my-3 py-3">
                            <h2 class="display-5">Simple</h2>
                        </div>
                        <img src="./static/img/mac.png" style="width: 130%;"></img>
                    </div>
                    <div class="bg-white mr-md-3 pt-3 px-3 pt-md-1 px-md-5 text-center text-black overflow-hidden">
                        <div class="my-3 py-3">
                            <h2 class="display-5">Portable</h2>
                        </div>
                        <img src="./static/img/CloudInstance.png" style="width: 50%;"></img>
                    </div>
                </div>
            </div> 
        </section>

        <section id="education">
            <div class="container">
                <div class="row" style="padding-top: 10rem;">
                    <div class="col">
                        <img src="./static/img/educa.png" style="width: 70%;"></img>
                    </div>
                    <div class="col">
                        <div class="row">
                            <h3 class="subtitle" style="font-weight: bolder;">Education section</h3>
                        </div>
                        <div class="row">
                            <p style="text-align: justify;">If you are in need of some help when it comes to coding, the educational section is just what you need. 
                                Sing-up and start learning with the best on-line tutorials out there. 
                                Whether you are a beginner or an advance programer, you will find a tutorial with the latest coding languages out there. 
                                Sing-up and discover the programing world you were missing. 
                            </p> 
                            <a class="btn btn-dark" href="">Start learning</a>
                        </div>
                    </div>
                    
                </div>
                <div class="row" style="padding-top: 6rem; text-align: center;">
                    <img class="center" src="./static/img/grad.png"></img>
                </div>
            </div> 
        </section>        
        
        <section id="instancias">
            <div class="container">
                <div class="row" style="padding-top: 10rem;">
                    <div class="col">
                        <div class="row">
                            <h3 class="subtitle" style="font-weight: bolder;">Instances Service Payment Plans:</h3>
                        </div>
                        <div class="row">
                            <p style="text-align: justify;">Our service of instance hsoting includes various options
                            for the diferent types of users of it. Or Instances hosting payment plan consist of 3 dinsticted levels.
                            Basic, Professional and Education are the diferent plans aviable each one with its own advantajes.</p>  
                        </div>
                    </div>
                    <div class="col" style="text-align: center">
                        <img src="./static/img/planes.png" style="width: 130%;"></img>
                    </div>
                </div>
            </div>
            <div class="container text-center text-md-left mt-5" style="margin-bottom: 3.7rem;">
              <div class="row" style="text-align: center;">
                <div class="col-md-3 mx-auto columna text-black">
                  <h3 class="">Linux Mint</h3>
                  <img class="imginst" src="./static/img/lmint.jpg" style="width: 100%; padding-top: 2rem;"></img>
                </div>
                <div class="col-md-3 mx-auto columna text-black">
                  <h3 class="">Ubuntu</h3>
                  <img class="imginst" src="./static/img/lubuntu.jpg" style="width: 100%; padding-top: 2rem;"></img>
                </div>
                <div class="col-md-3 mx-auto columna text-black">
                  <h3 class="">Windows Server</h3>
                  <img class="imginst" src="./static/img/wserver.jpg" style="width: 100%; padding-top: 2rem;"></img>
                </div>
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
                        <dd><a href="https://www.google.com/maps/place/Mulah,+Maldives/@2.9464588,73.5796558,16z/data=!3m1!4b1!4m5!3m4!1s0x3b387db8bde51311:0x5101633cf14e8bc9!8m2!3d2.9440625!4d73.5873853">Grand Line</a></dd>
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