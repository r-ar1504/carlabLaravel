<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Car Lab</title>

    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset ('assets/img/icons/ico.png')}}"/>
    <!-- Bootstrap core CSS -->
    <link href="{{asset ('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset ('css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="{{asset ('css/magnific-popup.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{elixir ('css/creative.css')}}" rel="stylesheet">

  </head>
  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><bold class="text-white">Car</bold><bold class="text-primary">Lab</bold></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">Nosotros</a>             
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Servicios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Galería</a>
            </li>            
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contacto</a>
            </li>
            <li class="nav-item">
              <a id="Login" class="nav-link js-scroll-trigger">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>    

    <header class="masthead text-center text-white d-flex" data-parallax="scroll" data-image-src="{{asset ('assets/img/header/fondo.jpg')}}">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <img src="{{asset ('assets/img/icons/logo_blanco.png')}}" class="img-fluid logo">
            </h1>
            <hr>
            <img src="{{asset ('assets/img/icons/slogan.png')}}" class="img-fluid">
          </div>
          <div class="col-lg-8 mx-auto">
              <br>
              <br>
            <a class="android btn btn-light btn-xl js-scroll-trigger" href="#"></a>
            <a class="ios btn btn-light btn-xl js-scroll-trigger" href="#"></a>
          </div>
        </div>
      </div>
    </header>

    <!-- Container (About Section) -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 mx-auto text-center">
            <h2 class="section-heading">Sobre Nosotros</h2><br>         
            <h4><b class="text-primary">Valoramos tu tiempo</b>, <b class="text-dark">cuidamos tu auto.</b></h4><br>
            <p class="mt-5 mx-auto">Porque sabemos que tu auto es una parte de ti y valoramos tu tiempo, la <b class="text-primary">MISIÓN</b> en CAR<b class="text-primary">LAB</b> es ofrecerte un servicio integral atendiendo con excelencia las necesidades de tu auto hasta la comodidad de tu ubicación.
            <br>
            <br>
            Nuestra <b class="text-primary">VISIÓN</b> es llegar a ser el auto lavado más grande y eficaz de la región teniendo como prioridad la atención al cliente y las mejores condiciones de trabajo.</p>
          </div>
          <div class="col-sm-4 text-center">
            <img src="{{asset ('assets/img/icons/logo.png')}}" class="img-fluid logo">
          </div>
        </div>
      </div>
    </section>

      <!--div class="container-fluid bg-dark">
        <div class="row">
          <div class="col-sm-4">
            <span class="fa fa-mobile fa-6x mb-3 sr-contact text-primary"></span>
          </div>
          <div class="col-sm-8">
            <h2>Our Values</h2><br>
            <h4><strong>MISSION:</strong> Our mission lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
            <p><strong>VISION:</strong> Our vision Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
      </div-->    

    <section id="services" class="bg-white">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center text-dark">
            <h2 class="section-heading">Servicios</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <span style="padding-right:3px; padding-top: 3px; display:inline-block;">
                  <img class="mb-3 sr-icons" src="{{asset ('assets/img/icons/lavado.png')}}" width="125"></img>
              </span>
              <h3 class="mb-3 text-dark">Lavado</h3>
              <p class="text-muted mb-0">
              La tecnología de lavado en seco que utilizamos protege tu pintura y deja una capa residual que prolonga limpieza de auto repeliendo polvo y agentes contaminantes. Los productos que utilizamos son biodegradables y al no utilizar agua ayudamos a proteger el medio ambiente.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <span style="padding-right:3px; padding-top: 3px; display:inline-block;">
                  <img class="mb-3 sr-icons" src="{{asset ('assets/img/icons/detallado.png')}}" width="125"></img>
              </span>
              <h3 class="mb-3 text-dark">Detallado</h3>
              <p class="text-muted mb-0">Brindamos estética automotriz detallando interiores y exteriores,evitando gastos de traslado y pérdida de tiempo.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <span style="padding-right:3px; padding-top: 3px; display:inline-block;">
                  <img class="mb-3 sr-icons" src="{{asset ('assets/img/icons/vulka.png')}}" width="125"></img>
              </span>
              <h3 class="mb-3 text-dark">Vulka</h3>
              <p class="text-muted mb-0">Te ayudamos a reemplazar tu llanta averiada en la comodidad de tu ubicación, con opción de repararla.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <span style="padding-right:3px; padding-top: 3px; display:inline-block;">
                  <img class="mb-3 sr-icons" src="{{asset ('assets/img/icons/grua.png')}}" width="125"></img>
              </span>
              <h3 class="mb-3 text-dark">Grúa</h3>
              <p class="text-muted mb-0">Con solo unos clicks solicita por parte de expertos el servicio de transporte para tu vehículo.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="p-0" id="portfolio">
      <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="{{asset ('assets/img/portfolio/fullsize/1.jpg')}}">
              <img class="img-fluid gallery" src="{{asset ('assets/img/portfolio/thumbnails/1.jpg')}}" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    CUIDA
                  </div>
                  <div class="project-name">
                    Y ahorra 39 lt. de agua.
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="{{asset ('assets/img/portfolio/fullsize/2.jpg')}}">
              <img class="img-fluid gallery" src="{{asset ('assets/img/portfolio/thumbnails/2.jpg')}}" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    VALORA
                  </div>
                  <div class="project-name">
                    Tu tiempo.
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="{{asset ('assets/img/portfolio/fullsize/3.jpg')}}">
              <img class="img-fluid gallery" src="{{asset ('assets/img/portfolio/thumbnails/3.jpg')}}" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    DESCARGA
                  </div>
                  <div class="project-name">
                    Carlab app para solicitar tu servicio.
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="{{asset ('assets/img/portfolio/fullsize/4.jpg')}}">
              <img class="img-fluid gallery" src="{{asset ('assets/img/portfolio/thumbnails/4.jpg')}}" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    DISFRUTA
                  </div>
                  <div class="project-name">
                    Tu tiempo en tus ocupaciones.
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="{{asset ('assets/img/portfolio/fullsize/5.jpg')}}">
              <img class="img-fluid gallery" src="{{asset ('assets/img/portfolio/thumbnails/5.jpg')}}" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    AHORRA
                  </div>
                  <div class="project-name">
                    1 lt. de gasolina.
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="{{asset ('assets/img/portfolio/fullsize/6.jpg')}}">
              <img class="img-fluid gallery" src="{{asset ('assets/img/portfolio/thumbnails/6.jpg')}}" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    CUIDA
                  </div>
                  <div class="project-name">
                    Tu auto con los mejores productos.
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-dark">
      <div class="container">
          <div class="row">
            <div class="col-md-4 team-box">
              <div class="team-img">
                <img src="{{asset ('assets/img/icons/SILUETA1-NEGRA.png')}}" class="img-thumbnail">
                <div class="team-content text-muted">
                    <h3>Alejandro</h3>
                    <div class="border-team"></div>
                    <p>Súper recomendado, dejaron mi carro padrísimo!!!</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 team-box">
              <div class="team-img">
                <img src="{{asset ('assets/img/icons/SILUETA2-NEGRA.png')}}" class="img-thumbnail">
                <div class="team-content text-muted">
                    <h3>Martha</h3>
                    <div class="border-team"></div>
                    <p>Muy facil de usar la aplicación, el lavado muy bien y muy atento el joven</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 team-box">
              <div class="team-img">
                <img src="{{asset ('assets/img/icons/SILUETA3-NEGRA.png')}}" class="img-thumbnail">
                <div class="team-content text-muted">
                    <h3>Ricardo</h3>
                    <div class="border-team"></div>
                    <p>Muy buen servicio, excelente el ahorro de agua</p>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
    
    <div class="map" style="width=100%; height="350px;">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d225.02268788588222!2d-103.41687218545623!3d25.526282475319263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x868fdb9004663a09%3A0x205abd48886a3634!2sCARLAB+Carwash+Grua+Vulka+A+Domicilio!5e0!3m2!1ses!2smx!4v1520881223972" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
    </div>
    <!--section id="contact">   
      <div class="container">
        <div class="row">
          <div class="col-lg-2 ml-auto text-center">
            <i class="fa fa-mobile fa-4x mb-3 sr-contact text-primary"></i>
            <p class="text-dark" style="margin-top: -10%">87-14-66-52-02</p>                        
          </div>
          <div class="col-lg-2 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact text-primary"></i>
            <p class="text-dark">2-09-09-54</p>
          </div>
          <div class="col-lg-2 ml-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact text-primary"></i>
            <p>
              <a class="text-dark">feedback@startbootstrap.com</a>                     
          </div>
          <div class="col-lg-2 ml-auto text-center">                                              
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook fa-3x mb-3 sr-contact"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-lg-2 ml-auto text-center">
            <ul class="list-inline social-buttons"> 
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram fa-3x mb-3 sr-contact"></i>
                </a>
              </li>
            </ul>
          </div>          
        </div>        
      </div>
    </section-->

     <!-- Footer>
    <footer class="bg-dark text-white" id="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <span class="copyright">&copy; 2017 Car Lab. Todos los Derechos Reservados | <small>Powered by Supernova Apps</small></span>
          </div>          
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="/terms">Términos Y Condiciones</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer-->

    <footer class="footer-distributed" id="contact">
      <div class="footer-left">        
        <p class="footer-links">
          <a href="#page-top">Inicio</a>
          ·
          <a href="#about">Nosotros</a>
          ·
          <a href="#services">Servicios</a>
          ·
          <a href="#portfolio">Galería</a>
          ·         
          <a href="#contact">Contacto</a>          
        </p>
        <p class="footer-company-name">2017 Car Lab. Todos los Derechos Reservados | <small>Powered by Supernova Apps</small></p>        
      </div>
      <div class="footer-center">
        <div>
          <i class="fa fa-map-marker"></i>
          <p><span>Avenida Central 1899, Torreón Jardín</span> Torreón, COAH</p>
        </div>
        <div>
          <i class="fa fa-phone"></i>
          <p>2-09-09-54</p>
        </div>
        <div>
          <i class="fa fa-mobile"></i>
          <p>87-14-66-52-02</p>
        </div>
        <div>
          <i class="fa fa-envelope"></i>
          <p>contacto@carlab.com.mx</a></p>
        </div>
      </div>
      <div class="footer-right">
        <p class="footer-company-about">          
          <h4><b class="text-primary">Valoramos tu tiempo</b>, <b class="text-white">cuidamos tu auto.</b></h4><br>
        </p>
        <div class="footer-icons">
          <a href="https://www.facebook.com/Carlab-App-1542867705826647"><i class="fa fa-facebook"></i></a>
          <a href="https://www.instagram.com/carlabapp/"><i class="fa fa-instagram"></i></a>         
        </div>
        <a href="/terms">Términos Y Condiciones</a>
      </div>


  <!-- Modal del login-->
  <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="Modal1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body" style="background-image: url({{asset ('assets/img/header/fondo.jpg')}}); background-size: cover; background-repeat: no-repeat; padding: 0;">
          <!--Head-->
          <div class="head" align="center">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title tittle" id="exampleModalLabel" align="center">Login</h4>
          </div>
          <!---->
          <div class="form-group row">
            <div class="col-md-12">
              <form method="POST">
                <div class="container">
                  <div class="col-md-12" align="center">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="col-md-12">
                      <br>
                      <input type="text" name="email" class="user" placeholder="Correo Electronico" required>
                    </div>
                    <br>
                    <div class="col-md-12">
                      <input type="password" name="password" class="user" placeholder="Contraseña" required>
                    </div>
                    <div class="col-md-12">
                      
                    </div>
                    <br>
                    <div class="col-md-12" align="center">
                      <input type="submit" class="btn btn-success" value="Ingresar">
                    </div>
                    <br>
                  </div>
                  <div class="col-md-6"></div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Fin-->
    <!-- Bootstrap core JavaScript -->
    <script src="{{asset ('js/jquery.min.js')}}"></script>
    <script src="{{asset ('js/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{asset ('js/jquery.easing.min.js')}}"></script>
    <script src="{{asset ('js/scrollreveal.min.js')}}"></script>
    <script src="{{asset ('js/jquery.magnific-popup.min.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{asset ('js/creative.min.js')}}"></script>
    <!-- Parallax -->
    <script src="{{asset ('js/parallax.min.js')}}"></script>
    <script type="text/javascript">
      /*Modal del Login*/
      $('#Login').click(function(){
        $("#modalLogin").modal('show');
      });
    </script>
  </body>

</html>
