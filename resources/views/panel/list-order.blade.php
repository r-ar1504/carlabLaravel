<!DOCTYPE html>
<html>
<head>
	<title>Lista de Ordenes</title>
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
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;language=en" type="text/javascript"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-inverse" style="background-color: black;" id="mainNav">
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
	@if(Session::has('msg'))
  <!--Actualizaón-->
  <div class="modal fade" id="msgAcept" tabindex="-1" role="dialog" aria-labelledby="messaggeModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="messaggeModalLabel">Actualización con exito</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @foreach(Session::get('msg') as $mensaje)
          <p>{{$mensaje}}</p>
          @endforeach
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-success" data-dismiss="modal">Aceptar</a>
        </div>
      </div>
    </div>
  </div>
  <!--Fin-->
  @endif
	<form action="/ordenes-estatus" method="POST">
		<div class="container">
			<div class="row">
				<div class="col-md-4" align="center">
					<label>Busqueda por estatus: </label>
				</div>
				<div class="col-md-4">
					<select class="form-control" name="status" required>
						<option value="all">Ordenes</option>
						<option value="0">No Asignado</option>
						<option value="1">Asignado</option>
						<option value="4">Terminado</option>
						<option value="10">No se pudo asignar</option>
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
				<table class="table table-order">
				  <thead class="thead-dark" align="center">
				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">Estatus</th>
				      <th scope="col">Nombre del Servicio</th>
				      <th scope="col">Fecha del Servicio</th>
				      <th scope="col">Fecha de Terminación</th>
				      <th scope="col">Nombre del Trabajador</th>
				      <th scope="col">ID del Usuario</th>
				      <th scope="col">Localidad</th>
				      <th scope="col">Editar</th>
				    </tr>
				  </thead>
				  <tbody align="center">
				  	@if(! empty($orders))
					  	@foreach($orders as $order)
					  	<tr>
					  		<td>{{ $order->orderid }}</td>
					  		<td>
					  			@if($order->orderstatus == 0)
					  				No asignado
					  			@elseif($order->orderstatus == 1)
					  				Asignado
					  			@elseif($order->orderstatus == 4)
					  				Terminado
					  			@elseif($order->orderstatus == 10)
					  				No se pudo asignar
					  			@endif
					  		</td>
					  		<td>{{ $order->service_name }}</td>
					  		<td>{{ $order->service_date }}</td>
					  		<td>{{ $order->end_date }}</td>
					  		<td>{{ $order->nameworker }}</td>
					  		<td>
					  			{{ $order->name }}
					  			{{ $order->userlast }}
					  			<br>
					  			{{ $order->userphone }}
					  			<br>
					  			{{ $order->useremail }}
					  		</td>
					  		<td>
					  			<!--<span class="lat" hidden="false">{{ $order->latitude }}</span><span class="lng" hidden="false">{{ $order->longitude }}</span>-->
					  			<button title="Ver Ubicación" class="btn btn-info reverseGeocoding loc" data-lat="{{ $order->lat }}" data-long="{{ $order->lng }}" type="button"><i class="fa fa-map-marker"></i></button>
					  		</td>
					  		<td>
					  			<button type="button" class="btn btn-danger edit" title="Editar Orden" value="{{ $order->orderid }}">
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
            <h4 class="modal-title" id="exampleModalLabel" align="center">Editar Orden</h4>
          </div>
          <!---->
          <div class="form-group row">
            <div class="col-md-12">
              <form method="POST" action="/ordenes">
                <div class="container">
                  <div class="col-md-12" align="center">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="col-md-12">
                      <br>
                      <input type="text" name="id_order" name="id" id="id" hidden="false">
                      <select class="form-control" name="status" required>
												<option value="0">No Asignado</option>
												<option value="1">Asignado</option>
												<option value="4">Terminado</option>
												<option value="10">No se pudo asignar</option>
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

  <!-- Modal para mostrar ubicación-->
  <div class="modal fade" id="modalLocation" tabindex="-1" role="dialog" aria-labelledby="Modal1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <!--Head-->
          <div class="head" align="center" style="border-bottom: 1px black solid">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="exampleModalLabel" align="center"><span id="addr" class="reverseGeocodingResult_formatted_address"></span></h4>
          </div>
          <!---->
          <div class="form-group row" align="center">
            <div class="col-md-12">
              <div id="map" style="width: auto; height: 300px;"></div>
              <br>
              <button class="btn btn-success" id="close" data-dismiss="modal">Aceptar</button>
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

    $(document).ready(function(){
	    $("#msgAcept").modal('show');
	  });

	  $('.loc').click(function(){
	  	$('#modalLocation').modal('show');
	  });
	</script>

	<script type="text/javascript">

		$('.reverseGeocoding').click(function () {
			var map;
			var lat = $(this).data('lat');
			var lng = $(this).data('long');
			var geocoder;

			geocoder = new google.maps.Geocoder();
			var LatLng = {lat: parseFloat(lat), lng: parseFloat(lng)};
		  
			geocoder.geocode({'location': LatLng}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					$('.reverseGeocodingResult_formatted_address').text(results[0].formatted_address);
				   
					var temp=[];
					for(var i=0; i<results[0].address_components.length; i++) {
						
						if($.inArray(results[0].address_components[i].long_name, temp) === -1) { // evita potenziali duplicati
							temp.push(results[0].address_components[i].long_name);
						}
						if($.inArray(results[0].address_components[i].short_name, temp) === -1) { // evita potenziali duplicati
							temp.push(results[0].address_components[i].short_name);
						}
					}

					$('.reverseGeocodingResult_address_components').html(temp.join('<br>'));

					geocoder = new google.maps.Geocoder();
					geocoder.geocode( {'location': LatLng}, function(results, status) {
						if (status == google.maps.GeocoderStatus.OK) {
							if (results[1]) {
								console.log(results);
								console.log(status);
								var mapOptions = {
									zoom: 16,
									mapTypeControl: true,
									mapTypeControlOptions: {
									  style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
									},
									zoomControl: true,
									zoomControlOptions: {
									  style: google.maps.ZoomControlStyle.SMALL
									},
									//streetViewControl: false,
									center: results[0].geometry.location
								}
								
								map = new google.maps.Map(document.getElementById('map'), mapOptions);
								
								$('.lat').text(results[0].geometry.location.lat());
								$('.lng').text(results[0].geometry.location.lng());
								
								//map.setCenter(results[0].geometry.location);
								var marker = new google.maps.Marker({
									map: map,
									position: results[0].geometry.location,
									draggable: true,
									animation: google.maps.Animation.DROP
								});
							}
							else{

							}
						} else {
							alert('Si \u00E8 verificato un problema nel generare la mappa (' + status + ')');
						}
					});
					
				} else {
					alert("Fallo, checa tu código: " + status);
				}
			});
		});
	</script>
</body>
</html>