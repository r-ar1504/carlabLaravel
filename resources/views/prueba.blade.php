<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;language=en" type="text/javascript"></script>
<style type="text/css">
	body {
  text-align: center;
}

iframe {
  display: block;
  margin: auto;
}

.map {
  border: 1px solid #ccc;
  background-color: #efefef;
  height: 300px;
}
</style>

<p>Drag the cursor to change coordinates</p>
<p><strong>Coords</strong>: <span id="lat">25.5173974</span>, <span id="lng">-103.3971488</span></p>
<div class="map" id="map1"></div>

<h2>Reverse Geocoding</h2>
<p>Retrieve coordinates first, then trigger reverse geocoding:</p>
<p><button id="reverseGeocoding" type="button">Reverse Geocoding</button></p>
<p>Reverse Geocoding result formatted_address: <span id="reverseGeocodingResult_formatted_address">--</span></p>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset ('js/jquery.min.js')}}"></script>
<script type="text/javascript">
	var lat = 25.5173974;
	var lng = -103.3971488;
	$('#reverseGeocoding').click(function () {
		var geocoder;
		geocoder = new google.maps.Geocoder();
		var LatLng = {lat: parseFloat($('#lat').text()), lng: parseFloat($('#lng').text())};
	   
		geocoder.geocode({'location': LatLng}, function(results, status) {
			console.log(results);
			console.log(status);
			console.log(LatLng);
			if (status == google.maps.GeocoderStatus.OK) {
				
				console.log('Reverse Geocoding:');
				console.dir(results);
				
				$('#reverseGeocodingResult_formatted_address').text(results[0].formatted_address);
				
				// address components: recupero di tutti gli elementi 
				console.log('Address components:');
				console.dir(results[0].address_components);
			   
				var temp=[];
				for(var i=0; i<results[0].address_components.length; i++) {
					console.log(results[0].address_components[i]);
					
					if($.inArray(results[0].address_components[i].long_name, temp) === -1) { // evita potenziali duplicati
						temp.push(results[0].address_components[i].long_name);
					}
					if($.inArray(results[0].address_components[i].short_name, temp) === -1) { // evita potenziali duplicati
						temp.push(results[0].address_components[i].short_name);
					}
				}
				
				console.log('Address components (elaborati):');
				console.dir(temp);
				$('#reverseGeocodingResult_address_components').html(temp.join('<br>'));
				
			} else {
				alert("Fallo, checa tu código: " + status);
			}
		});
	});
</script>