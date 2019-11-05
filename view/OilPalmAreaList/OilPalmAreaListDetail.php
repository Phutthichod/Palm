
<?php 
    session_start();
    
    $idUT = $_SESSION[md5('typeid')];
    $CurrentMenu = "OilPalmAreaList";
?>


<?php include_once("../layout/LayoutHeader.php"); ?>


<div class="container">
    <div class="row">
        <div class="col-xl-12 col-12 mb-4">
            <div class="card">
                <div class="card-header card-bg">
                    <div class="row">
                        <div class="col-12">
                            <span class="link-active">รายละเอียดสวนปาล์มน้ำมัน</span>
                            <span style="float:right;">
                                <i class="fas fa-bookmark"></i>
                                <a class="link-path" href="#">หน้าแรก</a>
                                <span> > </span>
                                <a class="link-path" href="#">รายชื่อสวนปาล์มน้ำมัน</a>
                                <span> > </span>
                                <a class="link-path link-active" href="#">รายละเอียดสวนปาล์มน้ำมัน</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-xl-6 col-12">
            <div class="card">
                <div class="card-body" id="for_card">
                    <div class="row">
                        <img class="img-radius" src="../../picture/palm1.jpg" />
                    </div>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-xl-3 col-3 text-right">
                            <span>ชื่อสวน : </span>
                        </div>
                        <div class="col-xl-3 col-3">
                            <span> ไลอ้อนฟาร์ม</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-12">
            <div class="card">
                <div class="card-body" id="card_height">
                    <div class="row">
                        <img class="img-radius" src="../../picture/default.jpg" />
                    </div>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-xl-3 col-3 text-right">
                            <span>เกษตรกร : </span>
                        </div>
                        <div class="col-xl-4 col-3">
                            <span> บรรยาวัชร มาวัชระ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-xl-2 col-2">
                            <span>ที่อยู่ : </span>
                        </div>
                        <div class="col-xl-10 col-10">
                            <span>69/30 หมู่ 8 ต.บางจาก อ.พระประะแดง จ.สมุทรปราการ 10130</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-2 col-2">
                            <span>พื้นที่ทั้งหมด : </span>
                        </div>
                        <div class="col-xl-10 col-10">
                            <span>100 ไร่ 20 งาน 5 วา</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 mb-3">
                            <button type="button" id="btn_edit_map" style="float:right;" class="btn btn-warning btn-sm">แก้ไขตำแหน่งสวน</button>
                            <button type="button" id="btn_edit_detail1" style="float:right; margin-right:10px;" class="btn btn-warning btn-sm">แก้ไขข้อมูลสวน</button>
                        </div>
                        <div class="col-xl-6 col-12">
                            <div id="map_area_detail" style="width:auto; height:400px;"></div>
                        </div>
                        <div class="col-xl-6 col-12">
                            <div id="map_area_color" style="width:auto; height:400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-xl-12 col-12">
            <div class="card">
                <div class="card-header card-bg">
                    <div>
                        <span>รายการแปลงปลูกปาล์มน้ำมัน</span>
                        <button type="button" id="btn_add_subgarden1" style="float:right;" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> เพิ่มแปลง</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-xl-3 col-12">
                            <button type="button" id="btn_comfirm" class="btn btn-outline-success btn-sm"><i class="fas fa-file-excel"></i> Excel</button>
                            <button type="button" id="btn_comfirm" class="btn btn-outline-danger btn-sm"><i class="fas fa-file-pdf"></i> PDF</button>

                        </div>
                    
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover table-data" width="100%">
                            <thead>
                                <tr>
                                    <th>ชื่อแปลง</th>
                                    <th>พื้นที่ปลูก (ไร่)</th>
                                    <th>จำนวนต้น</th>
                                    <th>อายุปาล์มน้ำมัน (วัน)</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ชื่อแปลง</th>
                                    <th>พื้นที่ปลูก (ไร่)</th>
                                    <th>จำนวนต้น</th>
                                    <th>อายุปาล์มน้ำมัน (วัน)</th>
                                    <th>จัดการ</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>ไลอ้อนแปลง 1</td>
                                    <td>200</td>
                                    <td>150</td>
                                    <td>300</td>
                                    <td style="text-align:center;">
                                        <a href="OilPalmAreaListSubDetail.php"><button type="button" id="btn_info" class="btn btn-info btn-sm"><i class="fas fa-bars"></i></button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ไลอ้อนแปลง 2</td>
                                    <td>200</td>
                                    <td>150</td>
                                    <td>300</td>
                                    <td style="text-align:center;">
                                        <button type="button" id="btn_info" class="btn btn-info btn-sm"><i class="fas fa-bars"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ไลอ้อนแปลง 3</td>
                                    <td>200</td>
                                    <td>150</td>
                                    <td>300</td>
                                    <td style="text-align:center;">
                                        <button type="button" id="btn_info" class="btn btn-info btn-sm"><i class="fas fa-bars"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editDetailModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header header-modal">
                    <h4 class="modal-title">แก้ไขข้อมูลแปลงปลูก</h4>
                </div>
                <div class="modal-body" id="addModalBody">
                <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>ชื่อสวนปาล์ม</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="rank">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>ที่อยู่</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="rank">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>จังหวัด</span>
                        </div>
                        <div class="col-xl-9 col-12">
                        <select class="form-control" id="province" name="province">
                            <option selected="" disabled="">เลือกจังหวัด</option>
                            <?php 
                                require 'data.php';
                                $province = loadProvince();
                                foreach ($province as $province) {
                                echo "<option id='".$province['AD1ID']."' value='".$province['AD1ID']."'>".$province['Province']."</option>";
                                }
                           ?>
		                </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>อำเภอ</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <select id="distrinct" name="distrinct" class="form-control">
                                <option selected="" disabled="">เลือกอำเภอ</option>
                                       
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>ตำบล</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <select id="subdistrinct" name="subdistrinct" class="form-control">
                                <option selected="" disabled="">เลือกตำบล</option>
                                       
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>เจ้าของสวนปาล์ม</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <select class="form-control" id="farmer" name="farmer">
                                <option selected="" disabled="">เลือกเจ้าของสวน</option>
                                <?php 
                                    
                                    $farmer = loadFarmer();
                                    foreach ($farmer as $farmer) {
                                    echo "<option id='".$farmer['UFID']."' value='".$farmer['UFID']."'>".$farmer['FirstName']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>พื้นที่</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <div class="row">
                                <div class="col-3">
                                    <input type="number" class="form-control" id="lastname" value="5">
                                </div>
                                <div class="col-3 mt-1">
                                    <span>ไร่</span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-3">
                                    <input type="number" class="form-control" id="lastname" value="2">
                                </div>
                                <div class="col-3 mt-1">
                                    <span>งาน</span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-3">
                                    <input type="number" class="form-control" id="lastname" value="50">
                                </div>
                                <div class="col-3 mt-1">
                                    <span>วา</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">ยืนยัน</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addSubGardenModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header header-modal">
                    <h4 class="modal-title">เพิ่มแปลง</h4>
                </div>
                <div class="modal-body" id="addModalBody">
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>ชื่อแปลง</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="rank">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>จำนวนไร่</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="firstname">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>จำนวนต้นไม้</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="lastname">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>จังหวัด</span>
                        </div>
                        <div class="col-xl-9 col-12">
                        <select class="form-control" id="province2" name="province2">
                            <option selected="" disabled="">เลือกจังหวัด</option>
                           
		                </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>อำเภอ</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <select id="distrinct2" name="distrinct2" class="form-control">
                                <option selected="" disabled="">เลือกอำเภอ</option>
                                       
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">ยืนยัน</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once("../layout/LayoutFooter.php"); ?>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwVxLnsuNM9mJUqDFkj6r7FSxVcQCh4ic&callback=map_create_detail" async defer></script>
<script src="OilPalmAreaList.js"></script>
<script src="OilPalmAreaListModal.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			$("#province").change(function(){
				var aid = $("#province").val();
				$.ajax({
					url: 'data.php',
					method: 'post',
					data: 'aid=' + aid
				}).done(function(distrinct){
					console.log(distrinct);
					distrinct = JSON.parse(distrinct);
					$('#distrinct').empty();
					distrinct.forEach(function(a){
                        $('#distrinct').append('<option value='+ a.AD2ID +'>' + a.Distrinct + '</option>')
                        //<option id='".$province['AD1ID']."' value='".$province['AD1ID']."'>".$province['Province']."</option>
					})
				})
            })

        })
        $(document).ready(function(){
            $("#distrinct").change(function(){
				var did = $("#distrinct").val();
				$.ajax({
					url: 'data.php',
					method: 'post',
					data: 'did=' + did
				}).done(function(subdistrinct){
					console.log(subdistrinct);
					subdistrinct = JSON.parse(subdistrinct);
					$('#subdistrinct').empty();
					subdistrinct.forEach(function(a){
						$('#subdistrinct').append('<option value='+ a.AD3ID +'>' + a.subDistrinct + '</option>')
					})
				})
            })
            
        })
        // 5555555555555555555555555555555555555555555555555555555555
        $(document).ready(function(){
			$("#province2").change(function(){
				var aid = $("#province2").val();
				$.ajax({
					url: 'data.php',
					method: 'post',
					data: 'aid=' + aid
				}).done(function(distrinct){
					console.log(distrinct);
					distrinct = JSON.parse(distrinct);
					$('#distrinct2').empty();
					distrinct.forEach(function(a){
                        $('#distrinct2').append('<option value='+ a.AD2ID +'>' + a.Distrinct + '</option>')
                        //<option id='".$province['AD1ID']."' value='".$province['AD1ID']."'>".$province['Province']."</option>
					})
				})
            })

        })
       
        
</script>

<script>
    var mapdetail, mapcolor;

    $("#card_height").css('height', $("#for_card").css('height'));

    $("#btn_edit_detail1").click(function () {
        $("body").append(editDetailModal);
        $("#editDetailModal").modal('show');
    });

    $("#btn_edit_map").click(function () {
        $("body").append(editMapModalFun(mapdetail, mapcolor));
        $("#editMapModal").modal('show');

        console.log(mapdetail.markers[0].getPosition().lng());
        console.log(mapcolor);


        var startLatLng = new google.maps.LatLng(13.736717, 100.523186);
        
        var mapedit = new google.maps.Map(document.getElementById('map_area_edit'), {
            // center: { lat: 13.7244416, lng: 100.3529157 },
            center:  startLatLng ,
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        mapedit.markers = [];
        for(let i = 0; i < mapdetail.markers.length; i++)
        {
            let marker;
            if(i == 0)
            {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(mapdetail.markers[i].getPosition().lat(), mapdetail.markers[i].getPosition().lng()),
                    map: mapedit,
                    icon: "http://maps.google.com/mapfiles/kml/paddle/grn-circle.png",
                    title:"test",
                    draggable:true,
                });
            }
            else
            {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(mapdetail.markers[i].getPosition().lat(), mapdetail.markers[i].getPosition().lng()),
                    map: mapedit,
                    title:"test",
                    draggable:true,
                });
            }

            mapedit.markers.push(marker);
        }
        
        
        google.maps.event.addListener(mapedit, 'click', function(event) {
            placeMarker(event.latLng);
        });

        function placeMarker(location) {
            var marker = new google.maps.Marker({
                position: location, 
                map: mapedit,
                draggable:true,
            });
            mapedit.markers.push(marker);
        }

        $("#btn_remove_mark").click(function () {
            for (let i = 0; i < mapedit.markers.length; i++) {
                if(i != 0)
                {
                    mapedit.markers[i].setMap(null);
                }
            }
        });

    });

    $("#btn_add_subgarden1").click(function () {
        $("body").append(addSubGardenModal);
        $("#addSubGardenModal").modal('show');
    });

    $("#btn_info").click(function () {
        console.log("testefe");
    });

    $("#btn_delete").click(function () {
        swal({
            title: "ยืนยันการลบข้อมูล",
            icon: "warning",
            buttons:  ["ยกเลิก", "ยืนยัน"],
        });
    });
</script>