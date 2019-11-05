function map_create() {
    var startLatLng = new google.maps.LatLng(13.736717, 100.523186);

    var map = new google.maps.Map(document.getElementById('map_area'), {
        // center: { lat: 13.7244416, lng: 100.3529157 },
        center: startLatLng,
        zoom: 8,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    map.markers = [];
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(13.736717, 100.523186),
        map: map,
        title: "test"
    });
    map.markers.push(marker);
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(13.814029, 100.037292),
        map: map,
        title: "test"
    });
    map.markers.push(marker);
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(13.361143, 100.984673),
        map: map,
        title: "test"
    });
    map.markers.push(marker);

    var citymap = {
        chicago: {
            center: { lat: 13.736717, lng: 100.523186 },
            population: 90000,
            color: '#e74a3b'
        },
        newyork: {
            center: { lat: 13.814029, lng: 100.037292 },
            population: 90000,
            color: '#f6c23e'
        },
        losangeles: {
            center: { lat: 13.361143, lng: 100.984673 },
            population: 90000,
            color: '#1cc88a'
        },
    };

    for (var city in citymap) {
        // Add the circle for this city to the map.
        var cityCircle = new google.maps.Circle({
            strokeColor: citymap[city].color,
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: citymap[city].color,
            map: map,
            center: citymap[city].center,
            radius: Math.sqrt(citymap[city].population) * 100
        });
    }
}

$("#palmvolsilder").ionRangeSlider({
    type: "double",
    from: 40,
    to: 65,
    step: 1,
    min: 0,
    max: 100,
    grid: true,
    grid_num: 10,
    grid_snap: false,
    onFinish: function(data) {
        console.log(data.to + " " + data.from);
    }
});

document.getElementById("province").addEventListener("load", loadProvince());

let data;

// โหลดจังหวัด
function loadProvince() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            data = JSON.parse(this.responseText);
            let text = "";
            for (i in data) {
                text += ` <option>${data[i].Province}</option> `
            }
            $("#province").append(text);
        }
    };
    xhttp.open("GET", "./loadProvince.php", true);
    xhttp.send();
}
// โหลดอำเภอ
function loadDistrinct(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            data = JSON.parse(this.responseText);
            let text = "";
            for (i in data) {
                text += ` <option>${data[i].Distrinct}</option> `
            }
            $("#amp").append(text);
        }
    };
    xhttp.open("GET", "./loadDistrinct.php?id=" + id, true);
    xhttp.send();
}

$("#province").on('change', function() {
    $("#amp").empty();
    let x = document.getElementById("province").value;
    let y = document.getElementById("province");
    if (y.length == 78)
        y.remove(0);
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            data = JSON.parse(this.responseText);
            for (i in data)
                if (data[i].Province == x)
                    loadDistrinct(data[i].AD1ID);
        }
    };
    xhttp.open("GET", "./loadProvince.php", true);
    xhttp.send();
});