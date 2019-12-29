// LoadMap
function initMap() {
    // The location of Uluru
    //alert(coordinate[0].lat);
    var marker = {
        lat: 12.815300,
        lng: 101.490997
    };

    // The map, centered at Uluru
    var map = new google.maps.Map(
        document.getElementById('map'), {
            zoom: 16,
            center: marker
        });
    // The marker, positioned at Uluru
    var marker = new google.maps.Marker({
        position: marker,
        map: map
    });
    // Construct the polygon.
    var area = new google.maps.Polygon({
        paths: zone,
        strokeColor: '#FF0000',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#FF0000',
        fillOpacity: 0.35
    });
    area.setMap(map);
}

let dataProvince;
let dataDistrinct;
let numProvince = 0;
let data;

let year = null;
let score_From = 0;
let score_To = 0;
let ID_Province = null;
let ID_Distrinct = null;
let name = null;
let passport = null;

document.getElementById("province").addEventListener("load", loadProvince());

// โหลดจังหวัด
function loadProvince() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            dataProvince = JSON.parse(this.responseText);
            let text = "";
            for (i in dataProvince) {
                text += ` <option value="${dataProvince[i].AD1ID}">${dataProvince[i].Province}</option> `
                numProvince++;
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
            dataDistrinct = JSON.parse(this.responseText);
            let text = "<option disabled selected>เลือกอำเภอ</option>";
            for (i in dataDistrinct) {
                text += ` <option value="${dataDistrinct[i].AD2ID}">${dataDistrinct[i].Distrinct}</option> `
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
    for (let i = 0; i < numProvince; i++)
        if (dataProvince[i].AD1ID == x) {
            ID_Province = x;
            ID_Distrinct = null;
            loadDistrinct(dataProvince[i].AD1ID);
        }
});

$("#amp").on('change', function() {
    let x = document.getElementById("amp").value;
    ID_Distrinct = x;
});

$("#btn_search").on('click', function() {
    year = document.getElementById("year").value;
    name = document.getElementById("name").value;
    passport = document.getElementById("idcard").value;
    console.log(" [ " + year + " " + ID_Province + " " + ID_Distrinct + " " + name + " " + passport + " ] ");
});