function map_create()
{   
    var startLatLng = new google.maps.LatLng(13.736717, 100.523186);
    
    var map = new google.maps.Map(document.getElementById('map_area'), {
        // center: { lat: 13.7244416, lng: 100.3529157 },
        center:  startLatLng ,
        zoom: 8,
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

$("#palmvolsilder").ionRangeSlider({
    type: "double",
    grid: true,
    from: 1,
    to: 5,
    values: [1, 2, 3, 4, 5]
});