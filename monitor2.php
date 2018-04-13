<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Monitor</title>
<style type="text/css">
table {
	background-color: white;
	border: 5px solid green;
	padding: 1px;
	border-spacing: 1px
}

td, th {
	text-align: left;
	border: 1px solid black;
	padding: 5px;
}

html, html body, #map {
	height: 80%;
	width: 100%;
	padding: 0;
	margin: 0;
}
</style>
<script src="jquery-1.10.2.js"></script>
<script
	src='https://maps.google.com/maps/api/js?key=AIzaSyAXcmVPT65nQMHpdbOg8QpHryyEXyhgnrY'
	type='text/javascript'></script>

<script type="text/javascript">

var firstTime=true;

var interval = 5000;

var map,marker,latlng,bounds,infowin;

/* initial locations for map */
var _lat=22.57722797;
var _lng=88.27761404;

document.addEventListener( 'DOMContentLoaded',myMap, false );

function myMap() {

	latlng={ lat: _lat, lng: _lng };

    bounds = new google.maps.LatLngBounds();
    infowin = new google.maps.InfoWindow();

    /* invoke the map */
    map = new google.maps.Map( document.getElementById('map'), {
       center:latlng,
       zoom: 15
    });
}

var markersArray = [];

function addMarker(lat,lng,title,icon){
    marker = new google.maps.Marker({/* Cast the returned data as floats using parseFloat() */
        position:{ lat:parseFloat( lat ), lng:parseFloat( lng ) },
        map:map,
        title:title,
        icon:icon
        });

    markersArray.push(marker);
    
    google.maps.event.addListener( marker, 'click', function(event){
        infowin.setContent(this.title);
        infowin.open(map,this);
        infowin.setPosition(this.position);
        }.bind( marker ));

    bounds.extend( marker.position );
    map.fitBounds( bounds );

//     google.maps.event.addListenerOnce(map, 'bounds_changed', function(event) {
//     	  if (this.getZoom() < 15) {
//     	    this.setZoom(20);
//     	  }
//     	});
}

function clearAllMarkers() {
	var length=markersArray.length;
	for (var i = 0; i <length ; i++ ) {
		markersArray[i].setMap(null);
		}
	markersArray.length = 0;
	}

function getSelectedCheckboxesArray() {
    var ch_list = Array();
    $("input:checkbox[type=checkbox]:checked").each(function () {
        ch_list.push($(this).val());
    });
    return ch_list;
}

function displayUsers() {
    var check_list = Array();
    check_list = getSelectedCheckboxesArray();
    var noOfCheckedItems = check_list.length;
    
    if (noOfCheckedItems === 0) {
        jQuery.ajax({
            type: "GET",
            url: "call_webservice_and_load_data.php",
//             data: { 'ajax': true },
            dataType: "json",
            success: function(response) {
            	clearAllMarkers();
            	            	
                document.getElementById("test").innerHTML=response.html;
                document.getElementById("time").innerHTML="time : "+new Date();
                $.each( response.places, function( i,item ){
                    if (item.status ==='Online') {
						addMarker(item.latitude,item.longitude,item.name,"greenball.png");
					}else{
						addMarker(item.latitude,item.longitude,item.name,"pinkball.png");
					}
					
                	
                    document.getElementById("test"+i).innerHTML=item.name;
                    });
                },
                error: function( status,error){
                	document.getElementById("error").innerHTML="status "+status+" , error "+error;
                }
        });

//     	$.ajax({
//             type: "GET",
//             url: "json.php",
// //             data: {"ajax" :null},
//             datatype: "json",
//             async: true,
//             success: function (data) {
//             	document.getElementById("test").innerHTML = data.html;
//                 document.getElementById("time").innerHTML="time : "+new Date();
//                 $.each( data.places, function( i,item ){
//                 	document.getElementById("test"+i).innerHTML=item.name;
//                 })
// //                 window.scrollTo(0,document.body.scrollHeight);
//             }
//         });
    }
}


displayUsers();

setInterval("displayUsers()", interval);

// jQuery.ajax({
//     type: "GET",
//     url: "json.php",
//     dataType: "json",
//     success: function(response) {
//         console.log(response.status);
//         console.log(response.message);
//         console.log(response.html);
//         document.getElementById("test").innerHTML=response.html;
//         $.each( response.places, function( i,item ){
//         	document.getElementById("test"+i).innerHTML=item.name;
//         });
//     }
// });
</script>
</head>
<body>

	<p>test</p>
	<div id='firstTime'></div>
	<div id='test'></div>
	<div id='time'></div>

	<div id='test0'></div>
	<div id='test1'></div>
	<div id='test2'></div>
	<div id='test3'></div>
	<div id='map'></div>

	<div id='error'>No error</div>



</body>

</html>