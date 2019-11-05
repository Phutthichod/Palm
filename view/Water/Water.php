<?php
session_start();
$idUT = $_SESSION[md5('typeid')];
$CurrentMenu = "Water";
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

    <!------------ Start Head ------------>
    <div class="row">
        <div class="col-xl-12 col-12 mb-4">
            <div class="card">
                <div class="card-header card-bg">
                    <div class="row">
                        <div class="col-12">
                            <span class="link-active">การให้น้ำ</span>
                            <span style="float:right;">
                                <i class="fas fa-bookmark"></i>
                                <a class="link-path" href="#">หน้าแรก</a>
                                <span> > </span>
                                <a class="link-path link-active" href="#">การให้น้ำ</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!------------ Start Card ------------>
    <div class="row">
        <div class="col-xl-3 col-12 mb-4">
            <div class="card border-left-primary card-color-one shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-primary text-uppercase mb-1">จำนวนครั้งการให้น้ำ</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">15 ครั้ง</div>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons icon-big">panorama_vertical</i>
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
                            <div class="font-weight-bold text-primary text-uppercase mb-1">จำนวนสวน/แปลง</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">30 สวน/100 แปลง</div>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons icon-big">filter_vintage</i>
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
                            <div class="font-weight-bold text-primary text-uppercase mb-1">พื้นที่ทั้งหมด</div>
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
                            <div class="font-weight-bold text-primary text-uppercase mb-1">จำนวนต้นไม้ทั้งหทด</div>
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

    <!------------ Start Map ------------>
    <div class="row">
        <div class="col-xl-12 col-12">
            <div class="card">
                <div class="card-header card-bg">
                    ตำแหน่งการให้น้ำสวนปาล์มน้ำมัน
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6 col-12">
                            <div id="map_area" style="width:auto; height:60vh;"></div>
                        </div>
                        <div class="col-xl-6 col-12" id="forMap">
                            <div class="row">
                                <div class="col-12">
                                    <span>ปี</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <select id="year" class="form-control">
                                        <option selected>2562</option>
                                        <option>2561</option>
                                        <option>2560</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-12">
                                    <div class="irs-demo">
                                        <b>ปริมาณการให้น้ำ (%)</b>
                                        <input type="text" id="palmvolsilder" value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <span>จังหวัด</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <select id="province" class="form-control">
                                        <option selected>เลือกจังหวัด</option>
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
                                    <select id="amp" class="form-control">
                                        <option selected>เลือกอำเภอ</option>
                                    </select>
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

    <!------------ Start Table ------------>
    <div class="row mt-4">
        <div class="col-xl-12 col-12">
            <div class="card">
                <div class="card-header card-bg">
                    <div>
                        <span>การให้น้ำสวนปาล์มน้ำมันในระบบ</span>
                        <span style="float:right;">ปี 2562</span>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">ปริมาณฝน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">ระบบให้น้ำ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">รถน้ำ</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent" style="margin-top:20px;">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="table-responsive">
                                <!------- Start DataTable ------->
                                <table id="example1" class="table table-bordered table-striped table-hover table-data">
                                    <thead>
                                        <tr>
                                            <th>ชื่อเกษตรกร</th>
                                            <th>ชื่อสวน</th>
                                            <th>จำนวนแปลง</th>
                                            <th>พื้นที่ปลูก</th>
                                            <th>จำนวนต้น</th>
                                            <th>จำนวนวันที่ฝนตก</th>
                                            <th>จำนวนวันที่ฝนไม่ตก</th>
                                            <th>ฝนทิ้งช่วงมากสุด</th>
                                            <th>ปริมาณฝนสะสม (ลบ.ม.)</th>
                                            <th>จัดการ</th>
                                            <!-- <th>ชื่อเกษตรกร</th>
                                            <th>ชื่อสวน</th> 
                                            <th>จำนวนแปลง</th>
                                            <th>พื้นที่ปลูก</th>
                                            <th>จำนวนต้น</th>
                                            <th>ระยะเวลาฝนตก</th>
                                            <th>เวลาฝนตก</th>
                                            <th>ปริมาณฝน (ลบ.ม.)</th>
                                            <th>จัดการ</th> -->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>ชื่อเกษตรกร</th>
                                            <th>ชื่อสวน</th> 
                                            <th>จำนวนแปลง</th>
                                            <th>พื้นที่ปลูก</th>
                                            <th>จำนวนต้น</th>
                                            <th>ระยะเวลาฝนตก</th>
                                            <th>เวลาฝนตก</th>
                                            <th>ปริมาณฝน (ลบ.ม.)</th>
                                            <th>จัดการ</th> -->
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>บรรยาวัชร</td>
                                            <td>ไลอ้อน</td>
                                            <td>150</td>
                                            <td>200</td>
                                            <td>50</td>
                                            <td>2</td>
                                            <td>28</td>
                                            <td>28</td>
                                            <td>5</td>
                                            <!-- <td>บรรยาวัชร</td>
                                            <td>ไลอ้อน</td>
                                            <td>150</td>
                                            <td>200</td>
                                            <td>50</td>
                                            <td>1 ชั่วโมง 24 นาที</td>
                                            <td>06/06/2562 16.38</td>
                                            <td>5</td> -->
                                            <td style="text-align:center;">
                                                <a href="WaterDetail.php?type=1"><button type="button" id="btn_info" class="btn btn-info btn-sm"><i class="fas fa-bars"></i></button></a>
                                                <button type="button" id="btn_delete" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!------- Stop DataTable ------->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="table-responsive">
                                <!------- Start DataTable ------->
                                <table id="example2" class="table table-bordered table-striped table-hover table-data">
                                    <thead>
                                        <tr>
                                            <th>ชื่อเกษตรกร</th>
                                            <th>ชื่อสวน</th>
                                            <th>จำนวนแปลง</th>
                                            <th>พื้นที่ปลูก</th>
                                            <th>จำนวนต้น</th>
                                            <th>เวลาให้น้ำ</th>
                                            <th>เวลาหยุดให้น้ำ</th>
                                            <th>ระยะเวลาให้น้ำ (นาที)</th>
                                            <th>วันที่</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ชื่อเกษตรกร</th>
                                            <th>ชื่อสวน</th>
                                            <th>จำนวนแปลง</th>
                                            <th>พื้นที่ปลูก</th>
                                            <th>จำนวนต้น</th>
                                            <th>เวลาให้น้ำ</th>
                                            <th>เวลาหยุดให้น้ำ</th>
                                            <th>ระยะเวลาให้น้ำ (นาที)</th>
                                            <th>วันที่</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>บรรยาวัชร</td>
                                            <td>ไลอ้อน</td>
                                            <td>150</td>
                                            <td>200</td>
                                            <td>50</td>
                                            <td>16:00</td>
                                            <td>18:00</td>
                                            <td>200</td>
                                            <td>19/05/1996</td>
                                            <td style="text-align:center;">
                                                <a href="WaterDetail.php?type=2"><button type="button" id="btn_info" class="btn btn-info btn-sm"><i class="fas fa-bars"></i></button></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!------- Stop DataTable ------->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="table-responsive">
                                <!------- Start DataTable ------->
                                <table id="example3" class="table table-bordered table-striped table-hover table-data">
                                    <thead>
                                        <tr>
                                            <th>ชื่อเกษตรกร</th>
                                            <th>ชื่อสวน</th>
                                            <th>จำนวนแปลง</th>
                                            <th>พื้นที่ปลูก</th>
                                            <th>จำนวนต้น</th>
                                            <th>จำนวนรถ</th>
                                            <th>วันที่</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ชื่อเกษตรกร</th>
                                            <th>ชื่อสวน</th>
                                            <th>จำนวนแปลง</th>
                                            <th>พื้นที่ปลูก</th>
                                            <th>จำนวนต้น</th>
                                            <th>จำนวนรถ</th>
                                            <th>วันที่</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>บรรยาวัชร</td>
                                            <td>ไลอ้อน</td>
                                            <td>150</td>
                                            <td>200</td>
                                            <td>50</td>
                                            <td>10</td>
                                            <td>19/05/1996</td>
                                            <td style="text-align:center;">
                                                <a href="WaterDetail.php?type=3"><button type="button" id="btn_info" class="btn btn-info btn-sm"><i class="fas fa-bars"></i></button></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!------- Stop DataTable ------->
                            </div>
                        </div>
                    </div>
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
<script src="Water.js"></script>
<script src="WaterModal.js"></script>

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
        $('#example2').DataTable({
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
        $('#example3').DataTable({
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