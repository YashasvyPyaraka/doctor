
<script type="text/javascript"
	src="https://maps.googleapis.com/maps/api/js?&sensor=true&region=IN">
    </script>
<script type="text/javascript">

    var points = [
			<?php 	
				$points="";
				foreach($cities as $city) {
				$points.="['";
				$points.=$city->getCityName();
				$points.="',";
				$points.=$city->getLatitude();
				$points.=",";
				$points.=$city->getLongitude();
				$points.=",";
				$points.="5";
				$points.=",";
				$points.="'index.php?chosencity=";
				$points.=$city->getCityName();
				$points.="&lat=";
				$points.=$city->getLatitude();
				$points.="&long=";
				$points.=$city->getLongitude();
				$points.="',";
				$points.=$city->getCityid();
				$points.="],";
				}
				$points=substr($points,0,-1);
				echo $points;

			?>
                ];
 
function setMarkers(map, cities) {
    var shape = {
        coord: [1, 1, 1, 20, 18, 20, 18, 1],
        type: 'poly'
    };
    for (var i = 0; i < cities.length; i++) {
        var flag = new google.maps.MarkerImage(
            'http://googlemaps.googlermania.com/google_maps_api_v3/en/Google_Maps_Marker.png',
        new google.maps.Size(37, 34),
        new google.maps.Point(0, 0),
        new google.maps.Point(0, 19));
        var place = cities[i];
        var myLatLng = new google.maps.LatLng(place[1], place[2]);
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: flag,
            shape: shape,
            title: place[0],
            zIndex: place[3],
            url: place[4]
        });
        google.maps.event.addListener(marker, 'click', function () {
        window.location.href = this.url;
        });
    }
}
function initialize() {
	// Create an array of styles.


    var myOptions = {
    center: new google.maps.LatLng(25.324167, 78.134766),
        zoom: 4,
   mapTypeControlOptions: {
      mapTypeIds: [google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.TERRAIN, google.maps.MapTypeId.SATELLITE, google.maps.MapTypeId.HYBRID ]
    }
    };
	
    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    map.setOptions({draggable: false, zoomControl: true, scrollwheel: false, disableDoubleClickZoom: true});

     setMarkers(map, points);
}
        google.maps.event.addDomListener(window,'load',initialize);
</script>
<div
	id="map_canvas" style="width: 800px; height: 500px"></div>
