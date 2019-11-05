<?php
session_start();

$idUT = $_SESSION[md5('typeid')];
$CurrentMenu = "FertilizerUsageList";

$currentYear = date("Y") + 543;
$backYear = date("Y") + 543 - 1;

// $mysli = NEW mysqli('localhost','root',"",'palmweb2561');
// $resultSet = $mysli->query("SELECT * FROM cube_volume_fertilizer");
?>


<?php
    include_once("../layout/LayoutHeader.php");
    require_once("../../dbConnect.php");
    $a = selectData("SELECT * FROM cube_volume_fertilizer");
    // $b = selectDataOne("SELECT * FROM cube_volume_fertilizer"); 
    $c = selectDataArray("SELECT * FROM cube_volume_fertilizer");

    $province = selectData("SELECT name_th,province_id FROM provinces");
    $amphures = selectData("SELECT name_th,province_id,amphure_id FROM amphures");
?>

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
                            <span class="link-active">การใส่ปุ๋ย</span>
                            <span style="float:right;">
                                <i class="fas fa-bookmark"></i>
                                <!-- เข้าหน้า home page -->
                                <a class="link-path" href="#">หน้าแรก</a>
                                <span> > </span>
                                <!-- เข้าหน้า Fertilizer -->
                                <a class="link-path link-active" href="#">การใส่ปุ๋ย</a>
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
                            <div class="font-weight-bold  text-uppercase mb-1">ปริมาณที่ใส่ปุ๋ย</div>
                            <!-- ปริมาณปุ๋ยที่ใส่รวมของปีที่ผ่านมา from table : cube_volume_fertilizer -->
                            <div class="h5 mb-0 font-weight-bold text-gray-800">21 ก.ก.</div>
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
                            <!-- ปีที่ผ่านมา from table : cube_volume_fertilizer  -->
                            <div class="font-weight-bold  text-uppercase mb-1">ผลผลิตปี <?php echo $backYear ?></div>
                            <!-- ผลผลิตรวมของปีที่ผ่านมา from table : cube_volume_fertilizer  -->
                            <div class="h5 mb-0 font-weight-bold text-gray-800">30 ก.ก.</div>
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
                            <!-- พื้นที่ทั้งหมดของปีที่ผ่านมา from table : cube_volume_fertilizer  -->
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
                            <div class="font-weight-bold  text-uppercase mb-1">จำนวนต้นปาล์มทั้งหมด</div>
                            <!-- จำนวนต้นปาล์มทั้งหมดของปีที่ผ่านมา from table : cube_volume_fertilizer  -->
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
                    ตำแหน่งใส่ปุ๋ยสวนปาล์มน้ำมัน
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
                                        <!-- select year from table : cube_volume_fertilizer  -->
                                        <option selected>2562</option>
                                        <option>2561</option>
                                        <option>2560</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-12">
                                    <div class="irs-demo">
                                        <b>ปริมาณปุ๋ยที่ใส่แล้ว (%)</b>
                                        <!-- เลือกช่วงการค้นหา -->
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

                                    <!-- select province -->
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

                                    <!-- select amphures -->
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
                                    <!-- select name_farmer from table : cube_volume_fertilizer  -->
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
                                    <!-- select name_farmer join famer from table : cube_volume_fertilizer  -->
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

    <div class="row mt-4 mb-4">
        <div class="col-xl-12 col-12">
            <div class="card">
                <div class="card-header card-bg">
                    <div>
                        <span>การใส่ปุ๋ยสวนปาล์มน้ำมันในระบบ</span>
                        <span style="float:right;">ปี 2562</span>
                    </div>
                </div>
                <div class="card-body">
                    <!-- <div class="row mb-2">
                        <div class="col-xl-3 col-12">
                            <button type="button" id="btn_comfirm" class="btn btn-outline-success btn-sm"><i class="fas fa-file-excel"></i> Excel</button>
                            <button type="button" id="btn_comfirm" class="btn btn-outline-danger btn-sm"><i class="fas fa-file-pdf"></i> PDF</button>
                        </div>
                    </div> -->
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-striped table-hover table-data" width="100%">
                            <thead style="text-align:center;">
                                <tr>
                                    <th rowspan="2">ชื่อเกษตรกร</th>
                                    <th rowspan="2">ชื่อสวน</th>
                                    <th rowspan="2">จำนวนแปลง</th>
                                    <th rowspan="2">พื้นที่ปลูก (ไร่)</th>
                                    <th rowspan="2">จำนวนต้น</th>
                                    <th>ผลผลิตปี <?php echo $backYear ?></th>
                                    <th colspan="3">ปริมาณปุ๋ย (ก.ก.)</th>
                                    <th rowspan="2">รายละเอียด</th>
                                </tr>
                                <tr>
                                    <th>(ก.ก. / ไร่)</th>
                                    <th>ที่ควรใส่</th>
                                    <th>ที่ใส่</th>
                                    <th>ที่ควรใส่เพิ่ม</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ชื่อเกษตรกร</th>
                                    <th>ชื่อสวน</th>
                                    <th>จำนวนแปลง</th>
                                    <th>พื้นที่ปลูก (ไร่)</th>
                                    <th>จำนวนต้น</th>
                                    <th>ผลผลิตปี <?php echo $backYear ?></th>
                                    <th>ปริมาณปุ๋ยที่ควรใส่</th>
                                    <th>ปริมาณปุ๋ยที่ใส่</th>
                                    <th>ปริมาณที่ควรใส่เพิ่ม</th>
                                    <th>รายละเอียด</th>
                                </tr>
                            </tfoot>
                            <!-- Loop fet data -->
                            <tbody>
                                <tr>
                                    <td>บรรยาวัชร</td>
                                    <td>ไลอ้อน</td>
                                    <td>150</td>
                                    <td>200</td>
                                    <td>50</td>
                                    <td>150</td>
                                    <td>200</td>
                                    <td>50</td>
                                    <td>50</td>
                                    <td style="text-align:center;">
                                        <a href="FertilizerUsageListDetail.php"><button type="button" id="btn_info" class="btn btn-info btn-sm"><i class="fas fa-bars"></i></button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>บรรยาวัชร</td>
                                    <td>ไลอ้อน</td>
                                    <td>150</td>
                                    <td>200</td>
                                    <td>50</td>
                                    <td>150</td>
                                    <td>200</td>
                                    <td>50</td>
                                    <td>50</td>
                                    <td style="text-align:center;">
                                        <button type="button" id="btn_info" class="btn btn-info btn-sm"><i class="fas fa-bars"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>บรรยาวัชร</td>
                                    <td>ไลอ้อน</td>
                                    <td>150</td>
                                    <td>200</td>
                                    <td>50</td>
                                    <td>150</td>
                                    <td>200</td>
                                    <td>50</td>
                                    <td>50</td>
                                    <td style="text-align:center;">
                                        <button type="button" id="btn_info" class="btn btn-info btn-sm"><i class="fas fa-bars"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                            <!-- Loop fet data -->
                        </table>
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
<script src="FertilizerUsageJS/FertilizerUsageList.js"></script>
<script src="FertilizerUsageJS/FertilizerUsageListModal.js"></script>

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
        $('#example').DataTable({
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

    document.getElementById("province").addEventListener("load", load_province());

    let data;
    let c=1;

    function load_province() {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //console.log(this.responseText);
                data = JSON.parse(this.responseText);
                //console.log(data);
                let text = "";
                for (i in data) {
                    text += ` <option>${data[i].Province}</option> `
                }
                $("#province").append(text);
            }
        };
        xhttp.open("GET", "./db-province.php", true);
        xhttp.send();
    }

    function load_distrinct(va) {
        console.log("va =",va);

        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //console.log(this.responseText);
                data = JSON.parse(this.responseText);
                //console.log(data);
                let text = "";
                let id_dis = [];
                for (i in data) {
                    text += ` <option value=${data[i].AD1ID}>${data[i].Distrinct}</option> `
                }
                $("#amp").append(text);
            }
        };
        xhttp.open("GET", "./db-distrinct.php?va=" + va, true);
        xhttp.send();
    }

    $("#province").on('change', function() {
        $("#amp").empty();
        let x = document.getElementById("province").value;
        let y = document.getElementById("province");
        console.log(x," ",y);
       
        if (c==1) {
            let y = document.getElementById("province").remove(0);
            c=0;
            //console.log("*-*");
        }

        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                data = JSON.parse(this.responseText);
                for (i in data)
                    if (data[i].Province == x)
                        load_distrinct(data[i].AD1ID);
            }
        };
        xhttp.open("GET", "./db-province.php", true);
        xhttp.send();
    });
    

    $("#amp").on('change', function(){
        let id_amp = document.getElementById("amp").value;
        let id_amp2 = document.getElementById("amp").textContent;
        console.log(id_amp,id_amp2);
        let k;
        
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                data = JSON.parse(this.responseText);
                console.log(data);
                for (i in data){
                     if (data[i].Distrinct == id_amp2){
                        //load_distrinct(data[i].AD2ID);
                        console.log(data[i].AD2ID);
                        //k=data[i].AD1ID;
                    }
                }
                   
            }
        };
        xhttp.open("GET", "./db-distrinct.php?va=" + id_amp, true)
        xhttp.send();
    });

</script>