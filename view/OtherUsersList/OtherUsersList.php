<?php 
    session_start();
    
    $idUT = $_SESSION[md5('typeid')];
    $CurrentMenu = "OtherUsersList";
?>


<?php include_once("../layout/LayoutHeader.php"); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">


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
<?php 
include_once("../../dbConnect.php");
$sql = "SELECT * FROM `db-user` 
        INNER JOIN `db-department` ON `db-user`.`DID` = `db-department`.`DID` 
        INNER JOIN `db-emailtype` on `db-emailtype`.`ETID` = `db-user`.`ETID`";
$myConDB = connectDB();
$result = $myConDB->prepare( $sql ); 
$result->execute();

$sql1 = "SELECT * FROM `db-department`";
$result1 = $myConDB->prepare( $sql1 ); 
$result1->execute();

$sql2 = "SELECT * FROM `db-user`";
$result2 = $myConDB->prepare( $sql2 ); 
$result2->execute();

$sql3 = "SELECT * FROM `db-user` WHERE IsAdmin = 1 ";
$result3 = $myConDB->prepare( $sql3 ); 
$result3->execute();

?>

<div class="container">
    <div class="row">
        <div class="col-xl-12 col-12 mb-4">
            <div class="card">
                <div class="card-header card-bg">
                    <div class="row">
                        <div class="col-12">
                            <span class="link-active">รายชื่อผู้ใช้</span>
                            <span style="float:right;">
                                <i class="fas fa-bookmark"></i>
                                <a class="link-path" href="#">หน้าแรก</a>
                                <span> > </span>
                                <a class="link-path link-active" href="#">รายชื่อผู้ใช้</a>
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
                            <div class="font-weight-bold  text-uppercase mb-1">หน่วยงาน</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php  
                                    $count = $result1->rowCount();
                                    echo $count; ?>  หน่วยงาน</div>
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
                            <div class="font-weight-bold  text-uppercase mb-1">ผู้ใช้งานทั้งหมด</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php  
                                    $count = $result2->rowCount();
                                    echo $count; ?>  คน</div>
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
                            <div class="font-weight-bold  text-uppercase mb-1">ผู้ดูแลระบบ</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php  
                                    $count = $result3->rowCount();
                                    echo $count; ?> คน</div>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons icon-big">format_size</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-12 mb-4">
            <div class="card border-left-primary card-color-four shadow h-100 py-2" id="addUser" style="cursor:pointer;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold  text-uppercase mb-1">เพิ่มผู้ใช้งานใหม่</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">+1 คน</div>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons icon-big">add_location</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 


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
                <div class="card-body" style="background-color: white;">
                    <div class="row mb-4 ">
                        <div class="col-xl-4 col-12 text-right">
                            <span>หน่วยงาน</span>
                        </div>
                        <div class="col-xl-6 col-12">
                            <input type="text" class="form-control">
                            <!-- <select id="select-testing" class="selectpicker" data-live-search="true" title="Please select">
                                <option>Ant</option>
                                <option>Bat</option>
                                <option>Cat</option>
                                <option>Dog</option>
                                <option>Egg</option>
                            </select> -->

                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-4 col-12 text-right">
                            <span>สิทธิการเข้าใช้งาน</span>
                        </div>
                        <div class="col-xl-6 col-12">
                            <input type="text" class="form-control" id="right">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-4 col-12 text-right">
                            <span>การบล็อกการเข้าใช้งานของผู้ใช้</span>
                        </div>
                        <div class="col-xl-6 col-12">
                            <input type="text" class="form-control" id="block">
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



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header card-header-table py-3">
            <h6 class="m-0 font-weight-bold">รายชื่อผู้ใช้ในระบบ</h6>
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
                        <th>บัญชีชื่อผู้ใช้</th>
                        <th>อีเมล์</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>หน่วยงาน</th>
                        <th>สิทธิการเข้าใช้งาน</th>
                        <th>จัดการ</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                        <th>บัญชีชื่อผู้ใช้</th>
                        <th>อีเมล์</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>หน่วยงาน</th>
                        <th>สิทธิการเข้าใช้งาน</th>
                        <th>จัดการ</th>
                </tr>
                </tfoot>
                <tbody>
                <?php 
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                        

                ?>
                <tr>
                    <td><?php echo $row["UserName"]; ?></td>
                    <td><?php echo $row["EMAIL"]; ?>@<?php echo $row["Type"]; ?></td>
                    <td><?php echo $row["FirstName"]; ?>   <?php echo $row["LastName"]; ?></td>
                    <td><?php echo $row["Department"]; ?></td>
                    <td style="text-align:center;">
                        <?php if($row["IsAdmin"] ){?> 
                        <button type="button" id="btn_comfirm" class="btn btn-success btn-sm btn-circle">A</button>
                        <?php } ?> 
                        <?php if($row["IsResearch"] ){?> 
                        <button type="button" id="btn_info" class=" btn btn-success btn-sm btn-circle">R</button>
                        <?php } ?> 
                        <?php if($row["IsOperator"] ){ ?> 
                        <button type="button" id="btn_delete" class="btn btn-danger btn-sm btn-circle">O</button>
                        <?php } ?> 
                        <?php if($row["IsFarmer"] ){?> 
                        <button type="button" id="btn_delete" class="btn btn-danger btn-sm btn-circle">F</button>
                        <?php } ?> 

                    </td>
                    
                    <td style="text-align:center;">
                        <button type="button" 
                        <?php 
                        if($row["IsBlock"] == 0){ 
                            echo "class='btn btn-success btn-sm' ";
                        }else{
                            echo "class='btn btn-danger btn-sm' ";
                        }
                        ?>
                         id ="<?php echo $row["UID"] ?>" 
                        onclick="
                        <?php if($row["IsBlock"] == 0){
                            echo "block";
                        }else{
                            echo "unblock"; 
                        }
                         ?>
                        ('<?php echo $row["UserName"]; ?>' , '<?php echo $row["UID"] ?>')">
                        <i class="fas fa-ban"></i></button>

                        <button type="button" hidden class="btn btn-info btn-sm pass_edit"
                        uid="<?php echo $row["UID"]; ?>"  username= "<?php echo $row["UserName"]; ?>" pass="<?php echo $row["PWD"]; ?>"> 
                        <i class="fas fa-lock"></i></button>

                        <button type="button" class="btn btn-warning btn-sm btn_edit" 
                            uid="<?php echo $row["UID"]; ?>" title="<?php echo $row["Title"]; ?>"
                            username= "<?php echo $row["UserName"]; ?>" fname="<?php echo $row["FirstName"]; ?>" 
                            lname = "<?php echo $row["LastName"]; ?>" mail="<?php echo $row["EMAIL"]; ?>"
                            type_email="<?php echo $row["ETID"]; ?>" department="<?php echo $row["DID"]; ?>"
                            admin = "<?php echo $row["IsAdmin"]; ?>" research = "<?php echo $row["IsResearch"]; ?>" 
                            operator = "<?php echo $row["IsOperator"]; ?>" farmer = "<?php echo $row["IsFarmer"]; ?>">
                            <i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm"
                        onclick="delfunction('<?php echo $row["UserName"]; ?>' , '<?php echo $row["UID"] ?>')">
                        <i class="fas fa-trash-alt"></i></button>

                        

                    </td>
                </tr>
                <?php 
                    }
                        

                ?>


                </tbody>
            </table>
            </div>
        </div>
    </div>

    <div class="Modal">
    
    </div>

</div>


<?php include_once("../layout/LayoutFooter.php"); ?>
<?php include_once("OtherUsersListModal.php"); ?>

<script src="OtherUsersList.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>