<?php
if ($_SERVER ['REQUEST_METHOD'] == 'GET' && isset ( $_GET ['ajax'] )) {
	
	// $dbhost = 'localhost';
	// $dbuser = 'root';
	// $dbpwd = 'xx';
	// $dbname = 'xxx';
	// $db = new mysqli( $dbhost, $dbuser, $dbpwd, $dbname );
	
	$places = array ();
	
	$sql = 'select 
                        `location_name` as \'name\',
                        `location_Latitude` as \'lat\',
                        `location_Longitude` as \'lng\'
                        from `maps`
                        limit 100';
	
	// $res = $db->query( $sql );
	// if( $res ) while( $rs=$res->fetch_object() ) $places[]=array( 'latitude'=>$rs->lat, 'longitude'=>$rs->lng, 'name'=>$rs->name );
	// $db->close();
	
	$places [] = array (
			'latitude' => '22.5772364',
			'longitude' => '88.27759891',
			'name' => 'test on map' 
	);
	
	$places [] = array (
			'latitude' => '22.567662',
			'longitude' => '88.4158846',
			'name' => 'test2 on map'
	);
	
	header ( 'Content-Type: application/json' );
	echo json_encode ( $places, JSON_FORCE_OBJECT );
	exit ();
}
?>
<!doctype html>
<html>
<head>
<meta charset='utf-8' />
<title>Google Maps</title>
<!--         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->
<script src="jquery-1.10.2.js"></script>
<script
	src='https://maps.google.com/maps/api/js?key=AIzaSyAXcmVPT65nQMHpdbOg8QpHryyEXyhgnrY'
	type='text/javascript'></script>
<script type='text/javascript'>
//             (function(){

                var map,marker,latlng,bounds,infowin;
                /* initial locations for map */
                var _lat=56.61543329027024;
                var _lng=-2.9266123065796137;

                var getacara=0; /* What should this be? is it a function, a variable ???*/

                function showMap(){
                    /* set the default initial location */
                    latlng={ lat: _lat, lng: _lng };

                    bounds = new google.maps.LatLngBounds();
                    infowin = new google.maps.InfoWindow();

                    /* invoke the map */
                    map = new google.maps.Map( document.getElementById('map'), {
                       center:latlng,
                       zoom: 21
                    });

                    map.setZoom(52);

                    /* show the initial marker */
                    marker = new google.maps.Marker({
                       position:latlng,
                       map: map,
                       title: 'Hello World!'
                    });
                    bounds.extend( marker.position );


                    /* I think you can use the jQuery like this within the showMap function? */
                    $.ajax({
                        /* 
                            I'm using the same page for the db results but you would 
                            change the below to point to your php script ~ namely
                            phpmobile/getlanglong.php
                        */
                        url: document.location.href,/*'phpmobile/getlanglong.php'*/
                        data: { 'id': getacara, 'ajax':true },
                        dataType: 'json',
                        success: function( data, status ){
                            $.each( data, function( i,item ){
//                                 document.getElementById("test1").html="dh1";
                                document.getElementById("test1").innerHTML = item.latitude;
                                document.getElementById("test2").innerHTML = "data";
//                                 document.getElementById("test2").html="dh2";
                                /* add a marker for each location in response data */ 
                                addMarker( item.latitude, item.longitude, item.name );
                            });
                        },
                        error: function(){
                            output.text('There was an error loading the data.');
                        }
                    });                 
                }

                /* simple function just to add a new marker */
                function addMarker(lat,lng,title){
                    marker = new google.maps.Marker({/* Cast the returned data as floats using parseFloat() */
                       position:{ lat:parseFloat( lat ), lng:parseFloat( lng ) },
                       map:map,
                       title:title
                    });

                    google.maps.event.addListener( marker, 'click', function(event){
                        infowin.setContent(this.title);
                        infowin.open(map,this);
                        infowin.setPosition(this.position);
                    }.bind( marker ));

                    bounds.extend( marker.position );
                    map.fitBounds( bounds );
                }


                document.addEventListener( 'DOMContentLoaded', showMap, false );
//             }());
        </script>
<style>
html, html body, #map {
	height: 80%;
	width: 100%;
	padding: 0;
	margin: 0;
}
</style>
</head>
<body>


	<div id='map'></div>
	<div id='test1'></div>
	<div id='test2'></div>
</body>
</html>