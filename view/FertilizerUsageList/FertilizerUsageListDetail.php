<?php
session_start();

$idUT = $_SESSION[md5('typeid')];
$CurrentMenu = "FertilizerUsageList";

$currentYear = date("Y") + 543;
$backYear = date("Y") + 543 - 1;
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
                            <span class="link-active">รายละเอียดการใส่ปุ๋ยสวนปาล์มน้ำมัน</span>
                            <span style="float:right;">
                                <i class="fas fa-bookmark"></i>
                                <a class="link-path" href="#">หน้าแรก</a>
                                <span> > </span>
                                <a class="link-path" href="#">การใส่ปุ๋ย</a>
                                <span> > </span>
                                <a class="link-path link-active" href="#">รายละเอียดการใส่ปุ๋ยสวนปาล์มน้ำมัน</a>
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
                        <img class="img-radius" style="box-shadow: 2px 4px 10px #888888;" width="125px" height="125px" src="../../picture/palm1.jpg" />
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
    <div class="row mt-4">
        <div class="col-xl-3 col-12 mb-2">
            <div class="card border-left-primary card-color-one shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold  text-uppercase mb-1">จำนวนแปลง</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">10 แปลง</div>
                            <br>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons icon-big">waves</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-12 mb-2">
            <div class="card border-left-primary card-color-two shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold  text-uppercase mb-1">จำนวนต้น</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">2000 ต้น</div>
                            <br>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons icon-big">format_size</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-12 mb-2">
            <div class="card border-left-primary card-color-three shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold  text-uppercase mb-1">พื้นที่ทั้งหมด</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">300 ไร่ 5 3 งาน 150 ตารางวา</div>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons icon-big">dashboard</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-12 mb-2">
            <div class="card border-left-primary card-color-one shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold  text-uppercase mb-1">ผลผลิตปี 2561</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">1250 (ก.ก.)</div>
                            <br>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons icon-big">filter_vintage</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">

        <!-- <div class="col-xl-3 col-12 mb-4">
            <div class="card border-left-primary card-color-two shadow h-100 py-2">
                <div class="card-body">
                    <div class="row">
                        <canvas id="FerPie1"></canvas>
                    </div>
                    <div class="row">
                        <span style="margin: auto; color: black;">ปูนขาว</span>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <div class="col-xl-3 col-12 mb-4">
            <div class="card border-left-primary card-color-three shadow h-100 py-2">
                <div class="card-body">
                    <div class="row">
                        <canvas id="FerPie2"></canvas>
                    </div>
                    <div class="row">
                        <span style="margin: auto; color: black;">ปุ๋ยสูตร 1</span>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <div class="col-xl-3 col-12 mb-4">
            <div class="card border-left-primary card-color-four shadow h-100 py-2">
                <div class="card-body">
                    <div class="row">
                        <canvas id="FerPie3"></canvas>
                    </div>
                    <div class="row">
                        <span style="margin: auto; color: black;">ปุ๋ยสูตร 2</span>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <div class="row mt-4">
        <div class="col-xl-12 col-12">
            <div class="card">
                <div class="card-header card-bg">
                    <div class="row">
                        <div class="col-10">
                            <h4>โดโลไมท์ </h4>
                        </div>
                        <div class="col-2">
                            <select id="year" class="form-control">
                                <option selected>2562</option>
                                <option>2561</option>
                                <option>2560</option>
                                <option>2559</option>
                                <option>2558</option>
                                <option>2557</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <div class="row mb-2">
                                <div class="col-xl-6 col-12">
                                    <canvas id="ferVol1" style="height:200px;"></canvas>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <canvas id="FerPie1"></canvas>
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
                    <div class="row">
                        <div class="col-10">
                            <h4>ปุ๋ยทั่วไป </h4>
                        </div>
                        <div class="col-2">
                            <select id="year" class="form-control">
                                <option selected>2562</option>
                                <option>2561</option>
                                <option>2560</option>
                                <option>2559</option>
                                <option>2558</option>
                                <option>2557</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <div class="row mb-2">
                                <div class="col-xl-6 col-12">
                                    <canvas id="ferVol2" style="height:200px;"></canvas>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <canvas id="FerPie2"></canvas>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4 mb-4">
        <div class="col-xl-12 col-12">
            <div class="card">
                <div class="card-header card-bg">
                    <div>
                        <span>การใส่ปุ๋ยสวนปาล์มน้ำมันในระบบ</span>
                        <span style="float:right;">ปี 2562</span>
                    </div>
                </div>
                <div class="card-body" style="overflow-x:scroll;">
                    <!-- <div class="row mb-2">
                        <div class="col-xl-3 col-12">
                            <button type="button" id="btn_comfirm" class="btn btn-outline-success btn-sm"><i class="fas fa-file-excel"></i> Excel</button>
                            <button type="button" id="btn_comfirm" class="btn btn-outline-danger btn-sm"><i class="fas fa-file-pdf"></i> PDF</button>

                        </div>
                    </div> -->
                    <div class="table-responsive" style="">
                        <table id="test" class="table table-bordered table-striped table-hover table-data" width="100%">
                            <thead style="text-align:center;">
                                <tr>
                                    <th>ชื่อแปลง</th>
                                    <th>วันที่</th>
                                    <th>สูตรปุ๋ย</th>
                                    <th>จำนวน (กก.)</th>
                                    <th>จัดการ</th>
                                </tr>

                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ชื่อแปลง</th>
                                    <th>วันที่</th>
                                    <th>สูตรปุ๋ย</th>
                                    <th>จำนวน (กก.)</th>
                                    <th>จัดการ</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>แปลง1</td>
                                    <td>06/06/2562</td>
                                    <td>โดโลไมท์</td>
                                    <td>20</td>
                                    <td style="text-align:center;">
                                        <button type="button" id="btn_pic" class="btn btn-info btn-sm"><i class="fas fa-images"></i></button>
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

    <div class="modal"></div>
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
<script src="FertilizerUsageList.js"></script>
<script src="FertilizerUsageListModal.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> -->
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script>

<script src="FertilizerUsageJS/vfs_fonts.js"></script>

<script>
    $("#card_height").css('height', $("#for_card").css('height'));

    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            display: true,
            position: 'top',
            labels: {
                boxWidth: 50,
                fontColor: 'black'
            }
        },
    };

    var speedData = {
        labels: ["ปริมาณที่ใส่แล้ว", "ปริมาณที่ควรใส่เพิ่ม"],
        datasets: [{
            label: "Demo Data 1",
            data: [100, 50],
            backgroundColor: ["#00ce68", "#F32C24"]
        }]
    };

    var ctx = $("#FerPie1");
    var plantPie = new Chart(ctx, {
        type: 'pie',
        data: speedData,
        options: chartOptions
    });

    // var speedData = {
    // labels: ["ปริมาณที่ใส่", "ปริมาณที่ควรใส่"],
    // datasets: [{
    //     label: "Demo Data 1",
    //     data: [30,70],
    //     backgroundColor: ["#00ce68", "#f6c23e"]
    // }]
    // };

    var ctx = $("#FerPie2");
    var plantPie = new Chart(ctx, {
        type: 'pie',
        data: speedData,
        options: chartOptions
    });

    // var speedData = {
    // labels: ["ปริมาณที่ใส่", "ปริมาณที่ควรใส่"],
    // datasets: [{
    //     label: "Demo Data 1",
    //     data: [80,20],
    //     backgroundColor: ["#00ce68", "#f6c23e"]
    // }]
    // };

    var ctx = $("#FerPie3");
    var plantPie = new Chart(ctx, {
        type: 'pie',
        data: speedData,
        options: chartOptions
    });

    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            display: false,
            position: 'top',
            labels: {
                boxWidth: 80,
                fontColor: 'black'
            }
        },
        tooltips: {
            mode: 'index',
            intersect: false
        },
        scales: {
            yAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'ปริมาณปุ๋ยที่ใส่ (ก.ก.)'
                },
                gridLines: {
                    display: true
                },
                stacked: true
            }],
            xAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'รายปี'
                },
                gridLines: {
                    display: false
                },
                stacked: true
            }],
        }
    };

    var speedData1 = {
        labels: ["2560", "2561", "2562"],
        datasets: [{
                label: "ใส่แล้ว",
                data: [100, 70, 50],
                backgroundColor: '#00ce68'
            },
            {
                label: "ควรใส่",
                data: [50, 40, 30],
                backgroundColor: '#F32C24'
            },
        ]
    };

    var ctx = $("#ferVol1");
    var plantPie = new Chart(ctx, {
        type: 'bar',
        data: speedData1,
        options: chartOptions
    });

    var speedData2 = {
        labels: ["2560", "2561", "2562"],
        datasets: [{
            label: "Demo Data 1",
            data: [100, 50, 60],
            backgroundColor: '#00ce68'
        }]
    };

    var ctx = $("#ferVol2");
    var plantPie = new Chart(ctx, {
        type: 'bar',
        data: speedData1,
        options: chartOptions
    });

    var speedData3 = {
        labels: ["2560", "2561", "2562"],
        datasets: [{
            label: "Demo Data 1",
            data: [100, 50, 70],
            backgroundColor: '#00ce68'
        }]
    };


    $('#btn_pic').click(function() {
        $('body').append(imageModal)
        console.log('xxx')
        $('#imageModal').modal('show')
    })

    pdfMake.fonts = {
        THSarabun: {
            normal: 'THSarabun.ttf',
            bold: 'THSarabun-Bold.ttf',
            italics: 'THSarabun-Italic.ttf',
            bolditalics: 'THSarabun-BoldItalic.ttf'
        }
    }

    $(document).ready(function() {
        $('#test').DataTable({
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