<?php
session_start();
$idUT = $_SESSION[md5('typeid')];
$CurrentMenu = "Pest";
?>

<?php include_once("../layout/LayoutHeader.php"); ?>

<style>
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
                            <span class="link-active">ศัตรูพืช</span>
                            <span style="float:right;">
                                <i class="fas fa-bookmark"></i>
                                <a class="link-path" href="#">หน้าแรก</a>
                                <span> > </span>
                                <a class="link-path link-active" href="#">ศัตรูพืช</a>
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
                            <div class="font-weight-bold  text-uppercase mb-1">จำนวนครั้งพบศัตรูพืช</div>
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
                            <div class="font-weight-bold  text-uppercase mb-1">จำนวนสวน/แปลง</div>
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
                            <div class="font-weight-bold  text-uppercase mb-1">จำนวนต้นไม้ทั้งหทด</div>
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
                    ตำแหน่งศัตรูพืชสวนปาล์มน้ำมัน
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
                                <div class="col-12">
                                    <span>ชนิด</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <select id="year" class="form-control">
                                        <option selected>เลือกชนิดศัตรูพืข</option>
                                        <option>โรคพืช</option>
                                        <option>แมลง</option>
                                        <option>วัชพืช</option>
                                        <option>อื่นๆ</option>
                                    </select>
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
                        <span>ศัตรูพืชสวนปาล์มน้ำมันในระบบ</span>
                        <button type="button" style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#modal-1"><i class="fas fa-plus"></i> เพิ่มศัตรูพืช</button>
                        <!-- <span style="float:right;">ปี 2562</span> -->
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped table-hover table-data" width="100%">
                            <thead>
                                <tr>
                                    <th>ชื่อเกษตรกร</th>
                                    <th>ชื่อสวน</th>
                                    <th>จำนวนแปลง</th>
                                    <th>พื้นที่ปลูก</th>
                                    <th>จำนวนต้น</th>
                                    <th>ชนิด</th>
                                    <th>ความรุนแรง</th>
                                    <th>วันที่พบ</th>
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
                                    <th>ชนิด</th>
                                    <th>ความรุนแรง</th>
                                    <th>วันที่พบ</th>
                                    <th>จัดการ</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>บรรยาวัชร</td>
                                    <td>ไลอ้อน</td>
                                    <td>150</td>
                                    <td>200</td>
                                    <td>300</td>
                                    <td>วัชพืช</td>
                                    <td>3</td>
                                    <td>19/02/2016</td>
                                    <td style="text-align:center;">
                                        <button type="button" id="btn_info" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-1"><i class="fas fa-bars"></i></button>
                                        <button type="button" id="btn_image" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-2"><i class="far fa-images"></i></button>
                                        <button type="button" id="btn_note" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-3"><i class="far fa-sticky-note"></i></button>
                                        <button type="button" id="btn_delete" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>บรรยาวัชร</td>
                                    <td>ไลอ้อน</td>
                                    <td>150</td>
                                    <td>200</td>
                                    <td>300</td>
                                    <td>โรคพืช</td>
                                    <td>5</td>
                                    <td>19/02/2016</td>
                                    <td style="text-align:center;">
                                        <button type="button" id="btn_info" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-1"><i class="fas fa-bars"></i></button>
                                        <button type="button" id="btn_image" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-2"><i class="far fa-images"></i></button>
                                        <button type="button" id="btn_note" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-3"><i class="far fa-sticky-note"></i></button>
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

    <div class="modal fade" id="modal-1" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header header-modal">
                    <h4 class="modal-title">ข้อมูลลักษณะทั่วไปของศัตรูพืช</h4>
                </div>
                <div class="modal-body" id="infoModalBody">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: center;">
                            <div style="text-align: center;">
                                <img class="img-radius" src="../../picture/default.jpg" />
                            </div>
                            <hr>
                            <h4>ชื่อ : แมลง 1</h4>
                            <h4>ชื่อทางการ : แมลงเต่าทอง</h4>
                            <button type="button" id="M_btn_edit" class="test btn btn-warning btn-sm form-control mt-3" value="0">แก้ไขข้อมูล</button>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <h4>ลักษณะ</h4>
                            <textarea rows="10" cols="40" style="margin-bottom:20px; max-width: 270px;" readonly>ข้อมูลลักษณะ</textarea>

                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="" src="../../picture/defaultPalm.jpg">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="" src="../../picture/defaultPalm.jpg">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="" src="../../picture/defaultPalm.jpg">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <h4>อันตราย</h4>
                            <textarea rows="10" cols="40" style="margin-bottom:20px; max-width: 270px;" readonly>ข้อมูลอันตราย</textarea>

                            <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="" src="../../picture/defaultPalm.jpg">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="" src="../../picture/defaultPalm.jpg">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="" src="../../picture/defaultPalm.jpg">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-2" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header header-modal">
                    <h4 class="modal-title">รูปภาพศัตรูพืช</h4>
                </div>
                <div class="modal-body" id="imageModalBody">
                    <div class="container">
                        <div class="row margin-gal">
                            <a href="picture/defaultPest/01.jpg" class="col-xl-3 col-3">
                                <img src="../../picture/defaultPest/01.jpg" class="img-gal">
                            </a>
                            <a href="picture/defaultPest/02.jpg" class="col-xl-3 col-3">
                                <img src="../../picture/defaultPest/02.jpg" class="img-gal">
                            </a>
                            <a href="picture/defaultPest/03.jpg" class="col-xl-3 col-3">
                                <img src="../../picture/defaultPest/03.jpg" class="img-gal">
                            </a>
                            <a href="picture/defaultPest/04.jpg" class="col-xl-3 col-3">
                                <img src="../../picture/defaultPest/04.jpg" class="img-gal">
                            </a>
                        </div>
                        <div class="row margin-gal">
                            <a href="picture/defaultPest/05.jpg" class="col-xl-3 col-3">
                                <img src="../../picture/defaultPest/05.jpg" class="img-gal">
                            </a>
                            <a href="picture/defaultPest/06.jpg" class="col-xl-3 col-3">
                                <img src="../../picture/defaultPest/06.jpg" class="img-gal">
                            </a>
                            <a href="picture/defaultPest/07.jpg" class="col-xl-3 col-3">
                                <img src="../../picture/defaultPest/07.jpg" class="img-gal">
                            </a>
                            <a href="picture/defaultPest/08.jpg" class="col-xl-3 col-3">
                                <img src="../../picture/defaultPest/08.jpg" class="img-gal">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-3" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header header-modal">
                    <h4 class="modal-title">ข้อมูลสำคัญของศัตรูพืช</h4>
                </div>
                <div class="modal-body" id="noteModalBody">
                    <span>ข้อมูล</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row modal fade" id="modal-4" tabindex="-1" role="dialog">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: center;">
            <div style="text-align: center;">
                <img class="img-radius" src="../../picture/default.jpg" />
            </div>
            <hr>
            <h4>ชื่อ : แมลง 1</h4>
            <h4>ชื่อทางการ : แมลงเต่าทอง</h4>
            <button type="button" id="btn_edit" class="test btn btn-warning btn-sm form-control mt-3" value="0">แก้ไขข้อมูล</button>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <h4>ลักษณะ</h4>
            <textarea rows="10" cols="40" style="margin-bottom:20px; max-width: 270px;" readonly>ข้อมูลลักษณะ</textarea>

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="" src="../../picture/defaultPalm.jpg">
                    </div>
                    <div class="carousel-item">
                        <img class="" src="../../picture/defaultPalm.jpg">
                    </div>
                    <div class="carousel-item">
                        <img class="" src="../../picture/defaultPalm.jpg">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <h4>อันตราย</h4>
            <textarea rows="10" cols="40" style="margin-bottom:20px; max-width: 270px;" readonly>ข้อมูลอันตราย</textarea>

            <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="" src="../../picture/defaultPalm.jpg">
                    </div>
                    <div class="carousel-item">
                        <img class="" src="../../picture/defaultPalm.jpg">
                    </div>
                    <div class="carousel-item">
                        <img class="" src="../../picture/defaultPalm.jpg">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
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

<script src="PestModal.js"></script>
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


        $("#M_btn_edit").click(function() {
            console.log("xxx");
            $('#modal-1').modal('hide');
            $('#modal-4').modal('show');
        });

        // function testfun() {
        //     return function() {
        //         let i = $("#btn_edit").val();

        //         if (i == 0) {
        //             $("#infoModalBody").html(infoModal1);
        //             $("#btn_edit").click(testfun());

        //             $("#image_upload").click(function() {
        //                 $("#file_upload").click();
        //             });
        //         } else if (i == 1) {
        //             $("#infoModalBody").html(infoModal0);
        //             $("#btn_edit").click(testfun());
        //         }
        //     }
        // }

        $("#btn_delete").click(function() {
            swal({
                title: "ยืนยันการลบข้อมูล",
                icon: "warning",
                buttons: ["ยกเลิก", "ยืนยัน"],
            });
        });
    });
</script>

<script src="Pest.js"></script>