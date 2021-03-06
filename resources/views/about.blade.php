<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link href="./static/css/product.css" rel="stylesheet">
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
  </head>
  <body>
    <!-- NavBar -->
    <nav id="home" class="navbar navbar-expand-lg fixed-top navbar-dark snap-scroll scrolling-navbar" style="background-color: #212121;">
      <a class="btn navbar-brand nav-btn" href="/"> <img src="./static/img/logo.png" width="36" height="25" class="d-inline-block align-top" alt="mci-ico" style="margin-top: -13%;"> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup" name="nav-collapsers" style="color: white;">
          <div class="navbar-nav">
              <a class="btn nav-btn nav-link" href="/" style="color: white;"> Features </a>
              <li class="nav-item dropdown">
                  <a class="btn nav-btn nav-link dropdown-toggle" href="#" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Coding
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="./gnu.php">C++ GNU</a>
                      <a class="dropdown-item" >Jupyter Notebook</a>
                      <a class="dropdown-item" href="./java_editor.php">Java</a>
                  </div>
              </li>
              <a class="btn nav-btn nav-link" href="/education" style="color: white;"> Education </a>
              <li class="nav-item dropdown">
                  <a class="btn nav-btn nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Instances
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="#">Linux Mint</a>
                      <a class="dropdown-item" href="#">Ubuntu Server</a>
                      <a class="dropdown-item" href="#">Windows Server</a>
                      <a class="dropdown-item disabled" href="#">More to come...</a>
                  </div>
              </li>
              <a class="btn nav-btn nav-link" href="/about" style="color: white;"> About Us </a>
              <a class="btn nav-btn nav-link" href="https://github.com/RoachLok/MyCloudInstance" style="color: white;"> GitHub </a>
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

    <!-- Content -->
    <!-- Team -->
    <center>
      <h1 style="margin-top: 6rem; font-weight: bolder;">About our team</h1>
    </center>
    <section id="team">
      <div class="container text-center text-md-left mt-5" style="margin-bottom: 3.7rem;">
        <div class="row" style="text-align: center;">
          <div class="col-md-3 mx-auto columna text-black">
            <img src="./static/img/ghector.jpg" style="width: 100%; padding-top: 2rem; padding-bottom: 1rem"></img>
            <h3>Hector Palencia</h3>
            <a href="https://github.com/HectorSkm">GitHub Link</a>
          </div>
          <div class="col-md-3 mx-auto columna text-black">
            <img src="./static/img/gjavi.png" style="width: 100%; padding-top: 2rem; padding-bottom: 1rem"></img>
            <h3>Javier Taborda</h3>
            <a href="https://github.com/RoachLok">GitHub Link</a>
          </div>
          <div class="col-md-3 mx-auto columna text-black">
            <img src="./static/img/garturo.jpg" style="width: 100%; padding-top: 2rem; padding-bottom: 1rem"></img>
            <h3>Arturo Alba</h3>
            <a href="https://github.com/ArtySaurio">GitHub Link</a>
          </div>
        </div>
      </div> 
    </section>

    <!-- Technologies used -->
    <h1 style="margin-top: 6rem; font-weight: bolder; text-align: center;">About our project</h1>
    <section id="aboutcont">
      <div class="container text-center text-md-left mt-5" style="margin-bottom: 3.7rem;">
        <div class="row" style="text-align: center; padding-top: 4rem;">
          <div class="col-md-5 mx-auto columna text-black">
            <img src="static/img/about/fphp.png" style="width: 50%" />
          </div>
          <div class="col-md-5 mx-auto columna text-black">
            <p style="text-align: justify">
              PHP (acrónimo recursivo de PHP: Hypertext Preprocessor) es un lenguaje de código abierto muy
              popular especialmente adecuado para el desarrollo web y que puede ser incrustado en HTML. 
            </p>
          </div>
        </div>
        <div class="row" style="text-align: center; padding-top: 4rem;">
          <div class="col-md-5 mx-auto columna text-black">
            <p style="text-align: justify">
              Git es un software de control de versiones diseñado por Linus
              Torvalds, pensando en la eficiencia, la confiabilidad y
              compatibilidad del mantenimiento de versiones de aplicaciones cuando
              éstas tienen un gran número de archivos de código fuente.
            </p>
          </div>
          <div class="col-md-5 mx-auto columna text-black">
            <img src="static/img/about/fgit.png" style="width: 50%; text-align: center;"/>
          </div>
        </div>
        <div class="row" style="text-align: center; padding-top: 4rem;">
          <div class="col-md-5 mx-auto columna text-black">
            <img src="static/img/about/face.png" style="width: 50%" />
          </div>
          <div class="col-md-5 mx-auto columna text-black">
            <p style="text-align: justify">
              Ace es un editor de código escrito en JavaScript. Coincide con las funciones y el rendimiento de editores nativos como Sublime, Vim y TextMate. Puede integrarse fácilmente en cualquier página web y aplicación JavaScript.
            </p>
          </div>
        </div>
        <div class="row" style="text-align: center; padding-top: 4rem;">
          <div class="col-md-5 mx-auto columna text-black">
            <p style="text-align: justify">
              HTML es un lenguaje de marcado que nos permite indicar la estructura de nuestro documento mediante etiquetas. Este lenguaje nos ofrece una gran adaptabilidad, una estructuración lógica y es fácil de interpre­tar tanto por humanos como por máquinas.
            </p>
          </div>
          <div class="col-md-5 mx-auto columna text-black">
            <img src="static/img/about/html.png" style="width: 50%" />
          </div>
        </div>
        <div class="row" style="text-align: center; padding-top: 4rem;">
          <div class="col-md-5 mx-auto columna text-black">
            <img src="static/img/about/fjs.png" style="width: 50%" />
          </div>
          <div class="col-md-5 mx-auto columna text-black">
            <p style="text-align: justify">
              JavaScript (abreviado comúnmente JS) es un lenguaje de
              programación interpretado, dialecto del estándar ECMAScript. Se
              define como orientado a objetos,​ basado en prototipos,
              imperativo, débilmente tipado y dinámico. Se utiliza
              principalmente del lado del cliente, implementado como parte de un
              navegador web permitiendo mejoras en la interfaz de usuario y
              páginas web dinámicas​ y JavaScript del lado del servidor
              (Server-side JavaScript o SSJS). Su uso en aplicaciones externas a
              la web, por ejemplo en documentos PDF, aplicaciones de escritorio
              (mayoritariamente widgets) es también significativo.
            </p>
          </div>
        </div>
        <div class="row" style="text-align: center; padding-top: 4rem;">
          <div class="col-md-5 mx-auto columna text-black">
            <p style="text-align: justify">
              MySQL es un sistema de gestión de bases de datos relacional desarrollado bajo licencia dual: Licencia pública general/Licencia comercial por Oracle Corporation y está considerada como la base de datos de código abierto más popular del mundo, y una de las más populares en general junto a Oracle y Microsoft SQL Server, todo para entornos de desarrollo web.
            </p>
          </div>
          <div class="col-md-5 mx-auto columna text-black">
            <img src="static/img/about/fmysql.png" style="width: 50%" class="center" />
          </div>
        </div>
        <div class="row" style="text-align: center; padding-top: 4rem;">
          <div class="col-md-5 mx-auto columna text-black">
            <img src="static/img/about/fmdb.png" style="width: 50%" class="center" />
          </div>
          <div class="col-md-5 mx-auto columna text-black">
            <p style="text-align: justify">
              Material Design fue desarrollado en 2014 por Google. Es un
              lenguaje de diseño mobile-first. Además de su facilidad de
              implementación y uso, otra gran característica de esta
              plataforma de diseño es la falta de dependencia de los marcos y
              bibliotecas de JavaScript. En Materialize también cuenta con su
              propio sistema de grid (no definido propiamente en Material
              Design). Lo cual permite la realización de paginas muy complejas
              con el estilo de Google y todas sus funcionalidades. Y al igual
              que Bootstrap podemos darles, a partir del CSS, nuestros propios
              estilos.
            </p>
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
