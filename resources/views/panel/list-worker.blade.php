<!DOCTYPE html>
<html>
<head>
	<title>Lista de Trabajadores</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

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
<body>
	<nav class="navbar navbar-expand-lg navbar-inverse n">
		<div class="container">
			<a class="navbar-brand js-scroll-trigger" href="#page-top"><bold class="text-white">Car</bold><bold class="text-primary">Lab</bold></a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="/trabajadores">Lista de Trabajadores</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="/ordenes">Lista de Ordenes</a>
					</li>            
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href='/Logout'>Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<br>
	<br>
	<form action="/trabajadores-estatus" method="POST">
		<div class="container">
			<div class="row">
				<div class="col-md-4" align="center">
					<label>Busqueda por estatus: </label>
				</div>
				<div class="col-md-4">
					<select class="form-control" name="status" required>
						<option value="all">Trabajadores</option>
						<option value="1">Activo</option>
						<option value="0">Inactivo</option>
					</select>
				</div>
				<div class="col-md-4">
					<button type="submit" class="btn btn-success">
						<i class="fa fa-search"></i>
					</button>
				</div>
			</div>
		</div> 
	</form>
	<br>
	<br>
	<form action="/trabajadores" action="POST">
		<div class="container">
			<div class="row">
				<table class="table">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">Nombre</th>
				      <th scope="col">Apellidos</th>
				      <th scope="col">Correo Electronico</th>
				      <th scope="col">Telefono</th>
				      <th scope="col">Estatus</th>
				      <th scope="col">Editar</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@if(! empty($workers))
					  	@foreach($workers as $worker)
					  	<tr>
					  		<td>{{ $worker['name'] }}</td>
					  		<td>{{ $worker['last_name'] }}</td>
					  		<td>{{ $worker['email'] }}</td>
					  		<td>{{ $worker['phone'] }}</td>
					  		<td>{{ $worker['status'] }}</td>
					  		<td>
					  			<button type="button" class="btn btn-danger edit" value="{{ $worker['id'] }}">
					  				<i class="fa fa-edit"></i>
					  			</button>
					  		</td>
					  	</tr>
					  	@endforeach
					  @else
					    <label>Necesita filtrar los estatus de sus trabajadores</label>
					  @endif
				  </tbody>
				</table>
			</div>
		</div>
	</form>

	<!-- Modal para editar-->
  <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="Modal1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <!--Head-->
          <div class="head" align="center">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="exampleModalLabel" align="center">Editar Trabajador</h4>
          </div>
          <!---->
          <div class="form-group row">
            <div class="col-md-12">
              <form method="POST" action="/trabajadores">
                <div class="container">
                  <div class="col-md-12" align="center">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="col-md-12">
                      <br>
                      <input type="text" name="id_worker" name="id" id="id" hidden="false">
                      <select class="form-control" name="status" required>
												<option value="1">Activo</option>
												<option value="0">Inactivo</option>
											</select>
                    </div>
                    <br>
                    <div class="col-md-12" align="center">
                      <input type="submit" class="btn btn-success" value="Cambiar">
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
	<script type="text/javascript">
		$('.edit').click(function(){
      $("#modalEdit").modal('show');
      $('#id').val($(this).val());
    });
	</script>
</body>
</html>