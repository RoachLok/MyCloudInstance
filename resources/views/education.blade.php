<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./static/img/ico.png">
    <title>MyCloudInstance</title>

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"/>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
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
    <!-- Local dependencies -->
    <script defer type="text/javascript" src="./static/js/main.js"></script>
    <script type="text/javascript" src="./static/js/nav.js"></script>

    <!-- Stylesheet -->
    <link href="./static/css/educa.css" rel="stylesheet" />
    <link href="./static/css/footer.css" rel="stylesheet" />
    <link href="./static/css/nav.css" rel="stylesheet">
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
            <a class="btn btn-outline-white nav-btn nav-link" href="/"> Features </a>
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
        <button style="margin-left: 0px;" type="button" class="fixed" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="" style="border-radius: 50%; width: 40px; height: 40px;" class="" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
        </button>
        <div style="z-index:9999;" class="dropdown-menu">
          <a class="dropdown-item" href="dashboard">Dashboard</a>
          <a class="dropdown-item" href="user/profile">Profile</a>
        </div>
      </div>
    @else
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup" name="nav-collapsers">
        <a class="btn btn-outline-white nav-btn nav-link" href="login"> Login </a>    
        <a class="btn btn-outline-white nav-link nav-btn" href="register"> Register </a>
      </div>
    @endif
  </nav>

  <!-- Coding courses -->
  <div class="candt">
    <img src="./static/img/educa.jpg" alt="Card image cap" style="width: 100%; border-radius: 20px; height: auto; margin-bottom: 4%; margin-top: 4rem;">
    <h1 style="color: white; margin-bottom: 2%;">Available courses:</h1>
    <div class="card-deck">
      <div class="card">
        <img class="card-img-top" src="./static/img/java.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Java course</h5>
          <p class="card-text">Join this course to learn all about this very used coding language.</p>
        </div>
        <div class="card-footer">
          <a class="btn btn-dark acceso" href="/cursojava" style="border-radius: 30px;">Access course</a>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="./static/img/curso2.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Python course</h5>
          <p class="card-text">You will learn how to use and master the most popular coding language of recent years. Try it now and start learning.</p>
        </div>
        <div class="card-footer">
          <a class="btn btn-dark acceso" href="/cursojava" style="border-radius: 30px;">Access course</a>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="./static/img/prog.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">C++ course</h5>
          <p class="card-text">Learn to code in the most demanded coding language in the market.</p>
        </div>
        <div class="card-footer">
          <a class="btn btn-dark acceso" href="/cursojava" style="border-radius: 30px;">Access course</a>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="./static/img/curso3.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">PyQt5 course</h5>
          <p class="card-text">This is  s even longer content than the first to show that equal height action.</p>
        </div>
        <div class="card-footer">
          <a class="btn btn-dark acceso" href="/cursojava" style="border-radius: 30px;">Access course</a>
        </div>
      </div>
    </div>

    <!-- Tutorials -->
    <div style="margin-top: 4%; margin-left: 5%; margin-right: 5%;"></div>
      <h1 style="color: white; margin-bottom: 2%;">Recent tutorials:</h1>
      <div class="card-deck" style="margin-right: 24%;">
        <div class="card">
          <img class="card-img-top" src="./static/img/javaN.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Java course</h5>
            <p class="card-text">Join this course to learn all about this very used coding language.</p>
          </div>
          <div class="card-footer">
            <a class="btn btn-dark acceso" style="border-radius: 30px;">Access tutorials</a>
          </div>
        </div>
        <div class="card">
          <img class="card-img-top" src="./static/img/pythonN.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Python course</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
          </div>
          <div class="card-footer">
            <a class="btn btn-dark acceso" style="border-radius: 30px;">Access tutorials</a>
          </div>
        </div>
        <div class="card">
          <img class="card-img-top" src="./static/img/cN.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">C++ course</h5>
            <p class="card-text">This t. This card has even longer content than the first to show that equal height action.</p>
          </div>
          <div class="card-footer">
            <a class="btn btn-dark acceso" style="border-radius: 30px;">Access tutorials</a>
          </div>
        </div>
      </div>
    </div>
  </div>
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