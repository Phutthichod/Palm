function map_create()
{
    var startLatLng = new google.maps.LatLng(13.736717, 100.523186);
    
    var map = new google.maps.Map(document.getElementById('map_area'), {
        // center: { lat: 13.7244416, lng: 100.3529157 },
        center:  startLatLng ,
        zoom: 6,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    map.markers = [];
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(13.736717, 100.523186),
        map: map,
        title:"test"
    });
    map.markers.push(marker);
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(13.814029, 100.037292),
        map: map,
        title:"test"
    });
    map.markers.push(marker);
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(13.361143, 100.984673),
        map: map,
        title:"test"
    });
    map.markers.push(marker);
}

function map_create_detail()
{
    var startLatLng = new google.maps.LatLng(13.736717, 100.523186);
    
    mapdetail = new google.maps.Map(document.getElementById('map_area_detail'), {
        // center: { lat: 13.7244416, lng: 100.3529157 },
        center:  startLatLng ,
        zoom: 8,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    mapdetail.markers = [];
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(13.736717, 100.523186),
        icon: "http://maps.google.com/mapfiles/kml/paddle/grn-circle.png",
        map: mapdetail,
        title:"test"
    });
    mapdetail.markers.push(marker);
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(13.814029, 100.037292),
        map: mapdetail,
        title:"test"
    });
    mapdetail.markers.push(marker);
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(13.361143, 100.984673),
        map: mapdetail,
        title:"test"
    });
    mapdetail.markers.push(marker);
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(14.31761484, 100.6072998),
        map: mapdetail,
        title:"test"
    });
    mapdetail.markers.push(marker);
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(13.5338601, 100.54962158),
        map: mapdetail,
        title:"test"
    });
    mapdetail.markers.push(marker);

    var startLatLng = new google.maps.LatLng(13.736717, 100.523186);
    
    mapcolor = new google.maps.Map(document.getElementById('map_area_color'), {
        // center: { lat: 13.7244416, lng: 100.3529157 },
        center:  startLatLng ,
        zoom: 8,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    mapcolor.markers = [];
    mapcolor.markers.push(marker);
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(13.814029, 100.037292),
        map: mapcolor,
        title:"test"
    });
    mapcolor.markers.push(marker);
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(13.361143, 100.984673),
        map: mapcolor,
        title:"test"
    });
    mapcolor.markers.push(marker);
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(14.31761484, 100.6072998),
        map: mapcolor,
        title:"test"
    });
    mapcolor.markers.push(marker);
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(13.5338601, 100.54962158),
        map: mapcolor,
        title:"test"
    });
    mapcolor.markers.push(marker);


    var triangleCoords = [
        {lat: 13.814029, lng: 100.037292},
        {lat: 13.5338601, lng: 100.54962158},
        {lat: 13.361143, lng: 100.984673},
        {lat: 14.31761484, lng: 100.6072998},
      ];
    
      // Construct the polygon.
    var mapPoly = new google.maps.Polygon({
    paths: triangleCoords,
    strokeColor: '#FF0000',
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: '#FF0000',
    fillOpacity: 0.35
    });
    mapPoly.setMap(mapcolor);
}


function map_create_subdetail()
{
    var startLatLng = new google.maps.LatLng(13.736717, 100.523186);
    
    var map = new google.maps.Map(document.getElementById('map_area_detail'), {
        // center: { lat: 13.7244416, lng: 100.3529157 },
        center:  startLatLng ,
        zoom: 8,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    map.markers = [];
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(13.5338601, 100.54962158),
        map: map,
        title:"test"
    });
    map.markers.push(marker);
}