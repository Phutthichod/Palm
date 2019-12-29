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

$("#palmvolsilder").ionRangeSlider({
    type: "double",
    from: 0,
    to: 0,
    step: 1,
    min: 0,
    max: 100,
    grid: true,
    grid_num: 10,
    grid_snap: false,
    onFinish: function(data) {
        score_From = data.from;
        score_To = data.to;
        console.log(score_From + " " + score_To);
    }
});

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

function loadData() {
    $('#example1').DataTable().destroy();
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            data = JSON.parse(this.responseText);
            console.log(data);
            let text = "";
            for (i in data) {
                text += `<tr>
                            <th>${data[i].FullName}</th>
                            <th>${data[i].Name}</th>
                            <th>${data[i].count_FSID}</th>
                            <th>${data[i].AreaTotal}</th>
                            <th>${data[i].NumTree}</th>
                            <th>${data[i].count_dateID}</th>
                            <th>---</th>
                            <th>---</th>
                            <th>${data[i].vol}</th>
                            <th style="text-align:center;">
                                <a href="WaterDetail.php?type=1"><button type="button" id="btn_info" class="btn btn-info btn-sm"><i class="fas fa-bars"></i></button></a>
                                <button type="button" id="btn_add" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-1">
                                    <i class="fas fa-plus">
                                </i></button>
                            </th>
                        </tr>`
            }
            $("#fetchDatatable1").html(text);
            $('#example1').DataTable({
                dom: '<"row"<"col-sm-12"B>>' +
                    '<"row"<"col-sm-6"l><"col-sm-6"f>>' +
                    '<"row"<"col-sm-12"tr>>' +
                    '<"row"<"col-sm-5"i><"col-sm-7"p>>',
                buttons: [{
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel"> <font> Excel</font> </i>',
                        className: 'btn btn-outline-success btn-sm export-button'
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf"> <font> PDF</font> </i>',
                        className: 'btn btn-outline-danger btn-sm export-button',
                        pageSize: 'A4',
                        customize: function(doc) {
                            doc.defaultStyle = {
                                font: 'THSarabun',
                                fontSize: 16
                            };
                        }
                    }
                ]
            });
        }
    };
    xhttp.open("GET", "./loadRaining.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
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
    console.log(" [ " + year + " " + score_From + " " + score_To +
        " " + ID_Province + " " + ID_Distrinct + " " + name + " " + passport + " ] ");
    loadData();
});