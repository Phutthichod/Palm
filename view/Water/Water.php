<?php
session_start();
$idUT = $_SESSION[md5('typeid')];
$CurrentMenu = "Water";
?>

<?php include_once("../layout/LayoutHeader.php"); ?>

<style>
    .mar {
        margin-top: 5px;
    }

    .padding {
        padding-top: 10px;
    }

    .export-button {
        background: white;
        margin-right: 7px;
        margin-bottom: 10px;
    }

    font {
        font-family: 'Kanit';
        font-weight: normal;
    }

    span.select2-container {
        box-sizing: border-box;
        display: block;
        margin: 0;
        position: relative;
    }

    .border-from-control {
        border: 3px solid rgba(78, 115, 223, 0.3);
        border-radius: .55rem;
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
        width: 100%;
        color: #6E707E;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #d1d3e2;
        border-radius: .35rem;
    }

    span.select2-container .select2-selection--single .select2-selection__rendered {
        padding-left: 15px;
    }

    span.select2-container--default .select2-selection--single {
        display: contents;
        background-color: #fff;
        border: 0px;
        border-radius: 4px;
    }

    span.select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #6E707E;
        line-height: 25px;
    }

    input.gj-textbox-md {
        border: 1px solid #d1d3e2;
        border-radius: .35rem;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .9rem;
        color: #6e707e;
        font-family: 'Kanit', sans-serif;
    }

    .gj-datepicker-md [role=right-icon] {
        padding-top: 6.5px;
        padding-right: 6.5px;
    }
</style>

<div class="container">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

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
                            <div class="font-weight-bold text-primary text-uppercase mb-1">ค่าเฉลี่ยการให้น้ำสะสม</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">xxxx</div>
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

    <!------------ Start Serch ------------>
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
            <div id="collapseOne" class="card collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-header card-bg">
                    ตำแหน่งการให้น้ำสวนปาล์มน้ำมัน
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6 col-12">
                            <div id="map" style="width:auto; height:75vh;"></div>
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
                                        <option value="2562" selected>2562</option>
                                        <option value="2561">2561</option>
                                        <option value="2560">2560</option>
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
                                    <select id="province" class="js-example-basic-single">
                                        <option disabled selected>เลือกจังหวัด</option>
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
                                    <select id="amp" class="js-example-basic-single">
                                        <option disabled selected>เลือกอำเภอ</option>
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
                                    <input type="text" class="form-control" id="name">
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
                            <div class="row mb-2 padding">
                                <div class="col-12">
                                    <button type="button" id="btn_search" class="btn btn-success btn-sm form-control">ค้นหา</button>
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
                            <a class="nav-link active" id="raining-tab" data-toggle="tab" href="#raining" role="tab" aria-controls="raining" aria-selected="true">ปริมาณฝน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="water-tab" data-toggle="tab" href="#water" role="tab" aria-controls="water" aria-selected="false">ระบบให้น้ำ</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent" style="margin-top:20px;">
                        <div class="tab-pane fade show active" id="raining" role="tabpanel" aria-labelledby="raining-tab">
                            <div class="table-responsive">
                                <button id="btn-modal1" type="button" style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#modal-1"><i class="fas fa-plus"></i> เพิ่มปริมาณฝนตก</button>
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
                                        </tr>
                                    </thead>
                                    <tfoot>
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
                                        </tr>
                                    </tfoot>
                                    <tbody id="fetchDatatable1">

                                    </tbody>
                                </table>
                                <!------- Stop DataTable ------->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="water" role="tabpanel" aria-labelledby="water-tab">
                            <div class="table-responsive">
                                <button id="btn-modal2" type="button" style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#modal-2"><i class="fas fa-plus"></i> เพิ่มระบบให้น้ำ</button>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!------------ Start Modal ------------>
<div class="modal" id="modal-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header header-modal">
                <h4 class="modal-title">เพิ่มปริมาณฝนตก</h4>
            </div>
            <div class="modal-body" id="addModalBody1">
                <div class="row mb-4">
                    <div class="col-xl-3 col-12 text-right">
                        <span>จากสวน</span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <select class="js-example-basic-single" id="r_farm1">
                            <option disabled selected>เลือกสวน</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-xl-3 col-12 text-right">
                        <span>จากแปลง</span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <select class="js-example-basic-single" id="r_subfarm1">
                            <option disabled selected>เลือกแปลง</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-xl-3 col-12 text-right">
                        <span>ระดับฝนตก</span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <select class="form-control" id="r_rank1">
                            <option>เบา (ปริมาณ 0.1 มม. ถึง 10.0 มม.)</option>
                            <option>ปานกลาง (ปริมาณ 10.1 มม. ถึง 35.0 มม.)</option>
                            <option>หนัก (ปริมาณ 35.1 มม. ถึง 90.0 มม.)</option>
                            <option>หนักมาก (ปริมาณ 90.1 มม. ขึ้นไป)</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-xl-3 col-12 text-right">
                        <span>ปริมาณน้ำฝน / ลิตร</span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <input type="number" class="form-control" id="r_raining1">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-xl-3 col-12 text-right">
                        <span>วันที่</span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <input class="form-control" width="auto" class="" id="r_date1" />
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-xl-3 col-12 text-right">
                        <span>ระยะเวลา / นาที</span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <input type="number" class="form-control" id="r_time1">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="m_success" type="button" class="btn btn-success">ยืนยัน</button>
                <button id="m_not_success" type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modal-2">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header header-modal">
                <h4 class="modal-title">เพิ่มระบบการให้น้ำ</h4>
            </div>
            <div class="modal-body" id="addModalBody2">
                <div class="row mb-4">
                    <div class="col-xl-3 col-12 text-right">
                        <span>จากสวน</span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <select class="js-example-basic-single" id="r_farm2">
                            <option disabled selected>เลือกสวน</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-xl-3 col-12 text-right">
                        <span>จากแปลง</span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <select class="js-example-basic-single" id="r_subfarm2">
                            <option disabled selected>เลือกแปลง</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-xl-3 col-12 text-right">
                        <span>ปริมาณการให้น้ำ / ลิตร</span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <input type="number" class="form-control" id="r_raining2">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-xl-3 col-12 text-right">
                        <span>วันที่</span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <input class="form-control" width="auto" class="" id="r_date2" />
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-xl-3 col-12 text-right">
                        <span>ระยะเวลา / นาที</span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <input type="number" class="form-control" id="r_time2">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="m_success" type="button" class="btn btn-success">ยืนยัน</button>
                <button id="m_not_success" type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>

<!------------ Stop Modal ------------>

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

<script src="WaterModal.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMLhtSzox02ZCq2p9IIuihhMv5WS2isyo&callback=initMap&language=th" async defer></script>

<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

<script>
    pdfMake.fonts = {
        THSarabun: {
            normal: 'THSarabun.ttf',
            bold: 'THSarabun-Bold.ttf',
            italics: 'THSarabun-Italic.ttf',
            bolditalics: 'THSarabun-BoldItalic.ttf'
        }
    }
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        $('.js-example-basic-single').on('select2:open', function(e) {
            $(this).next().addClass("border-from-control");
        });
        $('.js-example-basic-single').on('select2:close', function(e) {
            $(this).next().removeClass("border-from-control");
        });

        $('#example1').DataTable({
            dom: '<"row"<"col-sm-6"B>>' +
                '<"row"<"col-sm-6 mar"l><"col-sm-6 mar"f>>' +
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
            dom: '<"row"<"col-sm-6"B>>' +
                '<"row"<"col-sm-6 mar"l><"col-sm-6 mar"f>>' +
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

        $('#d_raining1').datepicker({
            showOtherMonths: true
        });
        $('#d_raining2').datepicker({
            showOtherMonths: true
        });
    });

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
    let ID_Province = null;
    let ID_Distrinct = null;

    let dataFarm;
    let dataSubFarm;
    let ID_Farm = null;
    let ID_SubFarm = null;

    let data;

    let year = null;
    let score_From = 0;
    let score_To = 0;
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
    // โหลด Farm
    function loadFarm() {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                dataFarm = JSON.parse(this.responseText);
                console.log(dataFarm)
                let text = "<option value='-1'>ทุกสวน</option>";
                for (i in dataFarm) {
                    text += ` <option value="${dataFarm[i].FMID}">${dataFarm[i].Name}</option> `
                }
                $("#r_farm1").append(text);
            }
        };
        xhttp.open("GET", "./loadFarm.php", true);
        xhttp.send();
    }
    // โหลด SubFarm
    function loadSubFarm(farm) {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                dataSubFarm = JSON.parse(this.responseText);
                console.log(dataSubFarm);
                let text = "<option value='-1'>ทุกแปลง</option>";
                for (i in dataSubFarm) {
                    text += ` <option value="${dataSubFarm[i].FSID}">${dataSubFarm[i].Name}</option> `
                }
                $("#r_subfarm1").append(text);
            }
        };
        xhttp.open("GET", "./loadSubFarm.php?farm=" + farm, true);
        xhttp.send();
    }
    // โหลด Datatable 1
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
                                <button id='${i}' type="button" class="btn btn-info btn-sm btn-detail"><i class="fas fa-bars"></i></button>
                                <!------------
                                <button type="button" id="btn_add" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-1">
                                    <i class="fas fa-plus">
                                </i></button>
                                <a href="WaterDetail.php?type=1"></a>
                                ------------!>
                            </th>
                        </tr>`
                }
                $("#fetchDatatable1").html(text);
                $('#example1').DataTable({
                    dom: '<"row"<"col-sm-6"B>>' +
                        '<"row"<"col-sm-6 mar"l><"col-sm-6 mar"f>>' +
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

    //Start Event Select_จังหวัด && Select_อำเภอ
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
    //Stop Event Select_จังหวัด && Select_อำเภอ

    //Start Event Select_สวน && Select_แปลง
    $("#r_farm1").on('change', function() {
        $("#r_subfarm1").empty();
        let x = document.getElementById("r_farm1").value;
        ID_Farm = x;
        loadSubFarm(x);

    });
    $("#r_subfarm1").on('change', function() {
        let x = document.getElementById("r_subfarm1").value;
        ID_SubFarm = x;
    });
    //Stop Event Select_สวน && Select_แปลง

    $("#btn-modal1").on('click', function() {
        loadFarm();
    });

    $(document).on('click', '.btn-detail', function() {
        let id = $(this).attr('id');
        localStorage.setItem("data", JSON.stringify(data[id]));
        // let x = localStorage.getItem('data');
        // console.log(x);
        // console.log(JSON.parse(x).FullName);
        window.location.href = "http://localhost/KU-PALM-master/view/Water/WaterDetail.php";
    });

    $("#btn_search").on('click', function() {
        year = document.getElementById("year").value;
        name = document.getElementById("name").value;
        passport = document.getElementById("idcard").value;
        console.log(" [ " + year + " " + score_From + " " + score_To +
            " " + ID_Province + " " + ID_Distrinct + " " + name + " " + passport + " ] ");
        loadData();
    });
</script>