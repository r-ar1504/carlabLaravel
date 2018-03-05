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
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="{{asset ('css/magnific-popup.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{elixir ('css/creative.css')}}" rel="stylesheet">

  </head>
  @yield('css')
  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><bold class="text-dark">Car</bold><bold class="text-primary">Lab</bold></a>
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

    <header class="masthead text-center text-white d-flex" data-parallax="scroll" data-image-src="{{asset ('assets/img/header/header.jpg')}}">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <img src="{{asset ('assets/img/icons/logo.png')}}" class="img-fluid logo">
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5" style="font-weight: bold;">Start Bootstrap can help you build better websites using the Bootstrap CSS framework! Just download your template and start going, no strings attached!</p>
            <a class="android btn btn-light btn-xl js-scroll-trigger" href="#"></a>
            <a class="ios btn btn-light btn-xl js-scroll-trigger" href="#"></a>
          </div>
        </div>
      </div>
    </header>

    <section id="services" class="bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center text-muted">
            <h2 class="section-heading">Servicios</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-car text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Lavado</h3>
              <p class="text-muted mb-0">Our templates are updated regularly so they don't break.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-check text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Encerado</h3>
              <p class="text-muted mb-0">You can use this theme as is, or you can make changes!</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-cogs text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Vulka</h3>
              <p class="text-muted mb-0">We update dependencies to keep things fresh.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-truck text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Grúa</h3>
              <p class="text-muted mb-0">You have to make your websites with love these days!</p>
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

<<<<<<< HEAD
=======
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
    
>>>>>>> 4a188eed52eaca0d012425d83245426ac18e0101
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Encuéntranos en:</h2>
            <hr class="my-4">
            <p class="mb-5">Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>123-456-6789</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a>feedback@startbootstrap.com</a>
            </p>
          </div>
        </div>
      </div>
    </section>

     <!-- Footer -->
    <footer class="bg-dark text-white">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <span class="copyright">&copy; 2017 Car Lab. Todos los Derechos Reservados | <small>Powered by Supernova Apps</small></span>
          </div>
          <div class="col-md-3">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
<<<<<<< HEAD
          <div class="col-md-2">
            <ul class="list-inline quicklinks">
=======
          <div class="col-md-3">
            <ul class="list-inline quicklinks">             
>>>>>>> 4a188eed52eaca0d012425d83245426ac18e0101
              <li class="list-inline-item">
                <a href="/terms">Términos Y Condiciones</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    @yield('body')
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
    @yield('js')
  </body>

</html>
