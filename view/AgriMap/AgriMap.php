<?php
session_start();
$idUT = $_SESSION[md5('typeid')];
$CurrentMenu = "AgriMap";
?>

<?php
include("connect_db.php");

$default = array("lat" => 0.0, "lng" => 0.0);
//print_r ($default);
$coordinate = array(
    array("lat" => 0.0, "lng" => 0.0),
    array("lat" => 0.0, "lng" => 0.0),
    array("lat" => 0.0, "lng" => 0.0),
    array("lat" => 0.0, "lng" => 0.0),
);
$i = 0;
//print_r ($coordinate[1]['lng']);
$sql = "SELECT * FROM `db-coorfarm`";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {

    while ($i < sizeof($coordinate)) {
        $coordinate[$i]['lat'] = $row['Latitude'];
        $coordinate[$i]['lng'] = $row['Longitude'];
        $i++;
        break;
    }
}

//print_r($coordinate);


//print_r($lat);
//print_r($lng);
?>



<?php include_once("../layout/LayoutHeader.php"); ?>

<style>
    #map {
        width: 100%;
        height: 400px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-xl-12 col-12">
            <div id="accordion">
                <div class="card">
                    <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="cursor:pointer; background-color: #E91E63; color: white;">
                        <div class="row">
                            <div class="col-3">
                                <i class="fas fa-search"> ค้นหาขั้นสูง</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body" style="background-color: white; ">
                    <div class="row mb-2">
                        <div class="col-12">
                            <input type="checkbox" name="vehicle1" id="fertilizer_check" value="" style="color:red;" checked>
                            <span>การใส่ปุ๋ย</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <select id="fertilizer" class="form-control">
                                <option value="all" selected>ทั้งหมด</option>
                                <option>ใส่ครบ</option>
                                <option>ใส่ไม่ครบ</option>
                                <option>ไม่ใส่</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <input type="checkbox" id="product_check" name="vehicle1" value="" style="color:red;" checked>
                            <span>ผลผลิต</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <select id="product" class="form-control">
                                <option value="all" selected>ทั้งหมด</option>
                                <option>เกินค่าเฉลี่ย</option>
                                <option>ไม่เกินค่าเฉลี่ย</option>
                                <option>ไม่มีผลผลิต</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-12 mt-4">
            <div class="card">
                <div class="card-header card-bg">
                    ตำแหน่งสวนปาล์ม
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-xl-12 col-12 mb-2">
                            <div id="map"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include_once("../layout/LayoutFooter.php"); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMLhtSzox02ZCq2p9IIuihhMv5WS2isyo&callback=initMap&language=th" async defer></script>


<script>
    function initMap() {
        // The location of Uluru
        var coordinate = <?php echo json_encode($coordinate) ?>;
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


        var zone = [{
                lat: 0,
                lng: 0
            },
            {
                lat: 0,
                lng: 0
            },
            {
                lat: 0,
                lng: 0
            },
            {
                lat: 0,
                lng: 0
            }
        ];

        var i = 0;

        while (i < coordinate.length) {
            zone[i].lat = parseFloat(coordinate[i].lat);
            zone[i].lng = parseFloat(coordinate[i].lng);
            i++;
        }

        console.log(zone);

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
</script>