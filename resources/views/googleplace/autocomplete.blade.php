<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


<script src='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css' rel='stylesheet' />

</head>
<body>
<div class="input-group flex-nowrap">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">@</span>
  </div>
  <input type="text" class="form-control" placeholder="Username" id="autocmp" aria-label="Username" aria-describedby="addon-wrapping">
</div>
<div>
	<button type="submit" class="btn btn-success">
		Submit
	</button>
</div>
<!-- <div id='map' style='width: 400px; height: 300px;'></div>
<script>
mapboxgl.accessToken = 'pk.eyJ1Ijoiam95YW50YSIsImEiOiJjazlyZnNzM2gwOW15M2htdDJyamZ1cXVkIn0.ujH9SXqlcM2TKqIbnRSLTQ';
var map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11'
});
</script> -->

<div id="nearplace-root" style="position:relative"><img id="nearplace-logo" style="position: absolute;top:50%;left:50%;transform:translateX(-50%) translateY(-50%);z-index:-1;" src="https://api.nearplace.com/images/logo.png"><div id="nearplace-contribution" style="position:absolute;bottom:0;right:0;font-size:11px;color:#000;letter-spacing:normal;">map by&nbsp;<a href="https://nearplace.com" target="_blank">nearplace.com</a></div></div><script>var _nearplace=_nearplace||{};_nearplace.organization='591bf7c9-ba21-482c-be2f-c24e092912a9';_nearplace.onpage='2526caf4-9a66-4b00-85e9-7913b06fb13e';window.nearplace||function(){var s=document.createElement('script');s.type='text/javascript';s.async=!0;s.src='https://widget.nearplace.com/loader-onpage.js';document.addEventListener("DOMContentLoaded",function(){(document.scripts[0]||document.head).appendChild(s)})}();</script>
<script></script>
<script type="text/javascript">
	var settings = {
	"async": true,
	"crossDomain": true,
	"url": "https://google-maps-geocoding.p.rapidapi.com/geocode/json?language=en&latlng=40.714224%252C-73.96145",
	"method": "GET",
	"headers": {
		"x-rapidapi-host": "google-maps-geocoding.p.rapidapi.com",
		"x-rapidapi-key": "23cf74ee5dmsh10f661092b4aa86p171a5djsn3dd5e6fd462a"
	}
}

$.ajax(settings).done(function (response) {
	console.log(response);
});

function activatePlacesSearch(){
	var input = document.getElementById('autocmp');
	var autocomplete = new google.maps.places.Autocomplete(input);
}
</script>
</body>
</html>


