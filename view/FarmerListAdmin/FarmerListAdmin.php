<?php 
    session_start();
    
    $idUT = $_SESSION[md5('typeid')];
    $CurrentMenu = "FarmerListAdmin";
?>


<?php include_once("../layout/LayoutHeader.php"); ?>


<style>
    #serach{
        background-color: #E91E63;
        color:white;
        float:right;
    }
    #card-detail{
        border-color: #E91E63;
        border-top:none;
    }

</style>

<div class="container">

<div class="row">
    <div class="col-xl-12 col-12 mb-4">
        <div class="card">
            <div class="card-header card-bg">
                    <div class="row">
                        <div class="col-12">
                            <span class="link-active">รายชื่อเกษตรกร</span>
                            <span style="float:right;">
                                <i class="fas fa-bookmark"></i>
                                <a class="link-path" href="#">หน้าแรก</a>
                                <span> > </span>
                                <a class="link-path link-active" href="#">รายชื่อเกษตรกร</a>
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
                            <div class="font-weight-bold  text-uppercase mb-1">จำนวนแปลง</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">2 แปลง</div>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons icon-big">waves</i>
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
                            <div class="font-weight-bold  text-uppercase mb-1">พื้นที่ทั้งหมด</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">20 ไร่</div>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons icon-big">dashboard</i>
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
                            <div class="font-weight-bold  text-uppercase mb-1">จำนวนต้นไม้ทั้งหมด</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">100 ต้น</div>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons icon-big">format_size</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-12 mb-4">
            <div class="card border-left-primary card-color-four shadow h-100 py-2" style="cursor:pointer;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold  text-uppercase mb-1">เพิ่มแปลงปลูก</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">+1 แปลง</div>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons icon-big">add_location</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="">


        <div class="row">
            <div class="col-xl-12 col-12 mb-4">
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
                <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body" style="background-color: white; ">
                        <div class="row mb-4 ">
                            <div class="col-xl-4 col-12 text-right">
                                <span>หมายเลขบัตรประชาชน</span>
                            </div>
                            <div class="col-xl-6 col-12">
                                <input type="password" class="form-control input-setting" id="idcard">
                                <i class="far fa-eye-slash eye-setting"></i>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-4 col-12 text-right">
                                <span>ชื่อเกษตรกร</span>
                            </div>
                            <div class="col-xl-6 col-12">
                                <input type="text" class="form-control" id="username">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-4 col-12 text-right">
                                <span>จังหวัด</span>
                            </div>
                            <div class="col-xl-6 col-12">
                                <input type="text" class="form-control" id="username">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-4 col-12 text-right">
                                <span>อำเภอ</span>
                            </div>
                            <div class="col-xl-6 col-12">
                                <input type="text" class="form-control" id="username">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-4 col-12 text-right">
                            </div>
                            <div class="col-xl-6 col-12">
                                <button type="button" id="btn_pass" class="btn btn-success btn-sm form-control">ค้นหา</button>

                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">รายชื่อเกษตรกรในระบบ</h6>
        </div>
        <div class="card-body">

            <div class="row mb-2">
                <div class="col-xl-3 col-12">
                    <button type="button" id="btn_comfirm" class="btn btn-outline-success btn-sm"><i class="fas fa-file-excel"></i> Excel</button>
                    <button type="button" id="btn_comfirm" class="btn btn-outline-danger btn-sm"><i class="fas fa-file-pdf"></i> PDF</button>

                </div>
            
            </div>
            <div class="table-responsive">
            <table class="table table-bordered table-data" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>หมายเลขบัตรประชาชน</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>อำเภอ</th>
                    <th>จังหวัด</th>
                    <th>สถานะ</th>
                    <th>จัดการ</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>หมายเลขบัตรประชาชน</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>อำเภอ</th>
                    <th>จังหวัด</th>
                    <th>สถานะ</th>
                    <th>จัดการ</th>
                </tr>
                </tfoot>
                <tbody>
                <tr>
                    <td>123xxxxxxx011</td>
                    <td>ธารินทร์ ตันตะโยธิน</td>
                    <td>ไทรน้อย</td>
                    <td>นนทบุรี</td>
                    <td>ไม่ยืนยัน</td>
                    
                    <td style="text-align:center;">
                        <button type="button" id="btn_comfirm" class="btn btn-success btn-sm"><i class="fas fa-user-plus"></i></button>

                        <button type="button" id="btn_info" class="btn btn-info btn-sm"><i class="fas fa-bars"></i></button>
                        <button type="button" id="btn_delete" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                        

                    </td>
                </tr>
                <tr>
                    <td>123xxxxxxx011</td>
                    <td>ธารินทร์ ตันตะโยธิน</td>
                    <td>ไทรน้อย</td>
                    <td>นนทบุรี</td>
                    <td>ยืนยัน</td>
                    
                    <td style="text-align:center;"> 
                        <button type="button" id="btn_comfirm" class="btn btn-warning btn-sm"><i class="fas fa-ban"></i></button>


                        <button type="button" id="btn_info" class="btn btn-info btn-sm"><i class="fas fa-bars"></i></button>
                        <button type="button" id="btn_delete" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                        

                    </td>
                </tr>
                <tr>
                    <td>123xxxxxxx011</td>
                    <td>ธารินทร์ ตันตะโยธิน</td>
                    <td>ไทรน้อย</td>
                    <td>นนทบุรี</td>
                    <td>บล็อก</td>
                    
                    <td style="text-align:center;"> 
                        <button type="button" id="btn_comfirm" class="btn btn-warning btn-sm"> <i class="fas fa-user-check"></i></button>


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
 
<?php include_once("../layout/LayoutFooter.php"); ?>




<script src="FarmerListAdmin.js"></script>

<script>

        $( document ).ready(function() {
       
            $("#btn_delete").click(function () {
                swal({
                    title: "ยืนยันการลบข้อมูล",
                    icon: "warning",
                    buttons:  ["ยืนยัน", "ยกเลิก"],
                });
            });
        });

</script>
