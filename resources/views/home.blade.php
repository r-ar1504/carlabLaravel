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
              <a class="nav-link js-scroll-trigger" href="#services">Servicios</a>
            </li>                       
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Galería</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">Equipo</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contacto</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    @yield('navigation')

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
                  <img class="mb-3 sr-icons" src="{{asset ('assets/img/icons/lavado.png')}}" width="95"></img>
              </span>
              <h3 class="mb-3 text-dark">Lavado</h3>              
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <span style="padding-right:3px; padding-top: 3px; display:inline-block;">
                  <img class="mb-3 sr-icons" src="{{asset ('assets/img/icons/detallado.png')}}" width="95"></img>
              </span>
              <h3 class="mb-3 text-dark">Detallado</h3>              
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <span style="padding-right:3px; padding-top: 3px; display:inline-block;">
                  <img class="mb-3 sr-icons" src="{{asset ('assets/img/icons/vulka.png')}}" width="95"></img>
              </span>
              <h3 class="mb-3 text-dark">Vulka</h3>              
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <span style="padding-right:3px; padding-top: 3px; display:inline-block;">
                  <img class="mb-3 sr-icons" src="{{asset ('assets/img/icons/grua.png')}}" width="85"></img>
              </span>
              <h3 class="mb-3 text-dark">Grúa</h3>              
            </div>
          </div>
        </div>
      </div>
    </section>        

    <section class="p-0" id="portfolio">     
      <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="{{asset ('assets/img/portfolio/fullsize/(1).jpg')}}">
              <img class="img-fluid gallery" src="{{asset ('assets/img/portfolio/thumbnails/(1).jpg')}}" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">            
            <a class="portfolio-box" href="{{asset ('assets/img/portfolio/fullsize/(2).jpg')}}">
              <img class="img-fluid gallery" src="{{asset ('assets/img/portfolio/thumbnails/(2).jpg')}}" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="{{asset ('assets/img/portfolio/fullsize/(3).jpg')}}">
              <img class="img-fluid gallery" src="{{asset ('assets/img/portfolio/thumbnails/(3).jpg')}}" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="{{asset ('assets/img/portfolio/fullsize/(4).jpg')}}">
              <img class="img-fluid gallery" src="{{asset ('assets/img/portfolio/thumbnails/(4).jpg')}}" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="{{asset ('assets/img/portfolio/fullsize/(5).jpg')}}">
              <img class="img-fluid gallery" src="{{asset ('assets/img/portfolio/thumbnails/(5).jpg')}}" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="{{asset ('assets/img/portfolio/fullsize/(6).jpg')}}">
              <img class="img-fluid gallery" src="{{asset ('assets/img/portfolio/thumbnails/(6).jpg')}}" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

    <section id="about" class="bg-dark">    
      <div class="container">                  
          <div class="row">
            <div class="col-md-4 team-box">
              <div class="team-img">
                <img src="https://images.pexels.com/photos/462680/pexels-photo-462680.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" class="img-thumbnail">
                <div class="team-content text-muted">    
                    <h3>Philip Freeman</h3>
                    <div class="border-team"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>                    
                </div>
              </div>
            </div>
            <div class="col-md-4 team-box">
              <div class="team-img">
                <img src="https://images.pexels.com/photos/567459/pexels-photo-567459.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" class="img-thumbnail">
                <div class="team-content text-muted">    
                    <h3>David Smith</h3>
                    <div class="border-team"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>                    
                </div>
              </div>
            </div>
            <div class="col-md-4 team-box">
              <div class="team-img">
                <img src="https://images.pexels.com/photos/325682/pexels-photo-325682.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" class="img-thumbnail">
                <div class="team-content text-muted">    
                    <h3>Robert D'costa</h3>
                    <div class="border-team"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>                   
                </div>
              </div>
            </div>      
          </div>        
      </div>
    </section>
    
    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Encuéntranos en:</h2>
            <hr class="my-4">
            <p class="mb-5">Av. Central #1899 - A Col. Torreón Jardín</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-mobile fa-4x mb-3 sr-contact"></i>
            <p class="text-primary">87-14-66-52-02</p>            
          </div>
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p class="text-primary">2-09-09-54</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a class="text-primary">feedback@startbootstrap.com</a>
            </p>
          </div>
        </div>
      </div>
    </section>

     <!-- Footer -->
    <footer class="bg-dark text-white" id="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <span class="copyright">&copy; 2017 Car Lab. Todos los Derechos Reservados | <small>Powered by Supernova Apps</small></span>
          </div>
          <div class="col-md-2">
            <ul class="list-inline social-buttons">              
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
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
    </footer>   
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
  </body>

</html>
