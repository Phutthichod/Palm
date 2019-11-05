
<?php 
    session_start();
    
    $idUT = $_SESSION[md5('typeid')];
    $CurrentMenu = "OilPalmAreaList";
?>


<?php include_once("../layout/LayoutHeader.php"); ?>

<style>
    .export-button {
        background: white;
        margin-right: 7px;
        margin-bottom: 10px;
    }

    font {
        font-family: 'Kanit';
        font-weight: normal;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-xl-12 col-12 mb-4">
            <div class="card">
                <div class="card-header card-bg">
                    <div class="row">
                        <div class="col-12">
                            <span class="link-active">รายชื่อสวนปาล์มน้ำมัน</span>
                            <span style="float:right;">
                                <i class="fas fa-bookmark"></i>
                                <a class="link-path" href="#">หน้าแรก</a>
                                <span> > </span>
                                <a class="link-path link-active" href="#">รายชื่อสวนปาล์มน้ำมัน</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-12 mb-4">
            <div class="card border-left-primary card-color-one shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold  text-uppercase mb-1">จำนวนสวน</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">3 สวน</div>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons icon-big">group</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-12 mb-4">
            <div class="card border-left-primary card-color-two shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold  text-uppercase mb-1">จำนวนแปลง</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">20 แปลง</div>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons icon-big">waves</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-12 mb-4">
            <div class="card border-left-primary card-color-three shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold  text-uppercase mb-1">พื้นที่ทั้งหมด</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">10 ไร่</div>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons icon-big">dashboard</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-12 mb-4">
            <div class="card border-left-primary card-color-four shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold  text-uppercase mb-1">จำนวนต้นไม้</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">150 ต้น</div>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons icon-big">format_size</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-12">
            <div class="card">
                <div class="card-header card-bg">
                    ตำแหน่งสวนปาล์มน้ำมัน
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6 col-12">
                            <div id="map_area" style="width:auto;"></div>
                        </div>
                        <div class="col-xl-6 col-12" id="forMap">
                            <div class="row">
                                <div class="col-12">
                                    <span>จังหวัด</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                <select class="form-control" id="farmer" name="farmer">
                                    <option selected="" disabled="">เลือกจังหวัด</option>
                                
                                </select>
                                

                                </div>  
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <span>อำเภอ</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    
                                </div>  
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <span>ชื่อเกษตรกร</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <input type="text" class="form-control" id="rank">
                                </div>  
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <span>หมายเลขบัตรประชาชน</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <input type="password" class="form-control input-setting" id="idcard">
                                    <i class="far fa-eye-slash eye-setting"></i>
                                </div>
                            </div>
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
                        <span>สวนปาล์มน้ำมันในระบบ</span>
                        <button type="button" style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#modal-1"><i class="fas fa-plus"></i> เพิ่มสวน</button>
                    </div>
                </div>
                <div class="card-body" style="overflow-x:scroll;">
                    
                    <div class="table-responsive" style="">
                        <table id="example1" class="table table-bordered table-striped table-hover table-data" width="100%">
                            <thead>
                                <tr>
                                    <th>จังหวัด</th>
                                    <th>อำเภอ</th>
                                    <th>ชื่อเกษตรกร</th>
                                    <th>ชื่อสวน</th> 
                                    <th>จำนวนแปลง</th>
                                    <th>พื้นที่ปลูก (ไร่)</th>
                                    <th>จำนวนต้น</th>
                                    <th>รายละเอียด</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>จังหวัด</th>
                                    <th>อำเภอ</th>
                                    <th>ชื่อเกษตรกร</th>
                                    <th>ชื่อสวน</th> 
                                    <th>จำนวนแปลง</th>
                                    <th>พื้นที่ปลูก (ไร่)</th>
                                    <th>จำนวนต้น</th>
                                    <th>รายละเอียด</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>กรุงเทพ</td>
                                    <td>พระประะแดง</td>
                                    <td>บรรยาวัชร</td>
                                    <td>ไลอ้อน 1</td>
                                    <td>10</td>
                                    <td>120</td>
                                    <td>320</td>
                                    <td style="text-align:center;">
                                        <a href="OilPalmAreaListDetail.php"><button type="button" id="btn_info" class="btn btn-info btn-sm"><i class="fas fa-bars"></i></button></a>
                                        <button type="button" id="btn_delete" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>

                                    </td>
                                </tr>
                                <tr>
                                    <td>กรุงเทพ</td>
                                    <td>พระประะแดง</td>
                                    <td>บรรยาวัชร</td>
                                    <td>ไลอ้อน 2</td>
                                    <td>20</td>
                                    <td>120</td>
                                    <td>320</td>
                                    <td style="text-align:center;">
                                        <button type="button" id="btn_info" class="btn btn-info btn-sm"><i class="fas fa-bars"></i></button>
                                        <button type="button" id="btn_delete" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>

                                    </td>
                                </tr>
                                <tr>
                                    <td>กรุงเทพ</td>
                                    <td>พระประะแดง</td>
                                    <td>ธารินทร์</td>
                                    <td>นัท 1</td>
                                    <td>30</td>
                                    <td>120</td>
                                    <td>320</td>
                                    <td style="text-align:center;">
                                        <button type="button" id="btn_info" class="btn btn-info btn-sm"><i class="fas fa-bars"></i></button>
                                        <button type="button" id="btn_delete" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="modal-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header header-modal">
                    <h4 class="modal-title">เพิ่มสวนปาล์ม</h4>
                </div>
                <div class="modal-body" id="addModalBody">
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>ชื่อสวนปาล์ม</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="rank1">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>ที่อยู่</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="rrr">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">ยืนยัน</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
    
</div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<?php include_once("./import_Js.php"); ?>

</body>

</html>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwVxLnsuNM9mJUqDFkj6r7FSxVcQCh4ic&callback=map_create" async defer></script>
<script src="OilPalmAreaList.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
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
        
</script>



<script>

    $("#map_area").css('height', $("#forMap").css('height'));

    


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
<script>
    // $("#map_area").css('height', $("#forMap").css('height'));
    // $("#btn_delete").click(function() {
    //     swal({
    //         title: "ยืนยันการลบข้อมูล",
    //         icon: "warning",
    //         buttons: ["ยกเลิก", "ยืนยัน"],
    //     });
    // });

    pdfMake.fonts = {
        THSarabun: {
            normal: 'THSarabun.ttf',
            bold: 'THSarabun-Bold.ttf',
            italics: 'THSarabun-Italic.ttf',
            bolditalics: 'THSarabun-BoldItalic.ttf'
        }
    }

    $(document).ready(function() {
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
       
    });
</script>