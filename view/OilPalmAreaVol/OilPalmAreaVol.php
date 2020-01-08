<?php
session_start();

$idUT = $_SESSION[md5('typeid')];
$idUTLOG = $_SESSION[md5('LOG_LOGIN')];
$CurrentMenu = "OilPalmAreaVol";
$currentYear = date("Y") + 543;
$backYear = date("Y") + 543 - 1;

include_once("../layout/LayoutHeader.php"); 
include_once("../../dbConnect.php"); 

$DIMownerID = $idUTLOG[1]['DIMuserID'];



?>

<body>
    
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-12 mb-4">
                <div class="card">
                    <div class="card-header card-bg">
                        <div class="row">
                            <div class="col-12">
                                <span class="link-active">ผลผลิตสวนปาล์มน้ำมัน</span>
                                <span style="float:right;">
                                    <i class="fas fa-bookmark"></i>
                                    <a class="link-path" href="#">หน้าแรก</a>
                                    <span> > </span>
                                    <a class="link-path link-active" href="#">ผลผลิตสวนปาล์มน้ำมัน</a>
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
                                <div class="font-weight-bold  text-uppercase mb-1">ผลผลิตปี <?php echo $currentYear ?></div>
                                <?php 
                                    $sql = "SELECT * FROM `log-harvest` WHERE `DIMownerID` = $DIMownerID AND `isDelete` =0";
                                    $myConDB = connectDB();
                                    $result = $myConDB->prepare( $sql ); 
                                    $result->execute(); 
                                    $weightCard = 0;
                                    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                                        if((int)date('Y',$row["Modify"]) + 543==(int)$currentYear)
                                            $weightCard = $weightCard + $row['Weight'];
                                    }
                                ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $weightCard; ?> ก.ก.</div>
                                
                            </div>
                            <div class="col-auto">
                                <i class="material-icons icon-big">filter_vintage</i>
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
                                <div class="font-weight-bold  text-uppercase mb-1">ผลผลิตปี <?php echo $backYear ?></div>
                                <?php
                                    $sql = "SELECT * FROM `log-harvest` WHERE `DIMownerID` = $DIMownerID AND `isDelete` =0";
                                    $myConDB = connectDB();
                                    $result = $myConDB->prepare( $sql ); 
                                    $result->execute(); 
                                    $weightCardBY = 0;
                                    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                                        if((int)date('Y',$row["Modify"]) + 543==(int)$backYear)
                                            $weightCardBY = $weightCardBY + $row['Weight'];
                                    } 
                                ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $weightCardBY;?> ก.ก.</div>
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
                                <?php
                                    $sql = "SELECT `log-farm`.`DIMfarmID` , `db-subfarm`.`AreaRai` FROM `log-farm`
                                    JOIN `dim-farm` ON `log-farm`.`DIMsubfID` = `dim-farm`.`ID`
                                    JOIN `db-subfarm` ON `dim-farm`.`dbID` = `db-subfarm`.`FSID`
                                    WHERE `dim-farm`.`isFarm` = 0 AND `DIMownerID` = $DIMownerID
                                    ";
                                $myConDB = connectDB();
                                $result = $myConDB->prepare( $sql ); 
                                $result->execute();
                                $areaCard = 0;
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)){ 
                                    $areaCard= $areaCard + $row['AreaRai'];
                                
                                }
                                ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $areaCard; ?> ไร่</div>
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
                                <?php
                                     $sql = "SELECT * FROM `log-planting` WHERE  `DIMownerID` = $DIMownerID AND `isDelete`= 0";
                                     $myConDB = connectDB();
                                     $result = $myConDB->prepare( $sql ); 
                                     $result->execute(); 
                                     $numTreeCard = 0;
                                     while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                                         if((int)date('Y',$row["Modify"]) + 543==(int)$currentYear)
                                             $numTreeCard = $numTreeCard + $row['NumGrowth1'] + $row['NumGrowth2'] - $row['NumDead'];
                                     }
                                ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numTreeCard; ?> ต้น</div>
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
                <div id="accordion">
                    <div class="card">
                        <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="cursor:pointer; background-color: #E91E63; color: white;">
                        <div class="row">
                            <div class="col-6">
                                <i class="fas fa-search"> ตำแหน่งผลผลิตสวนปาล์มน้ำมัน</i>
                            </div>
                        </div>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
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
                                            <b>ผลผลิต (ก.ก)</b>
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
                                            <?php
                                            $sql = "SELECT * FROM `db-province` ";
                                            $myConDB = connectDB();
                                            $result = $myConDB->prepare( $sql ); 
                                            $result->execute();
                                        
                                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                    <option> <?php echo $row["Province"]; ?> </option>
                                            <?php
                                                }
                                            
                                            //$conn->close();
                                            ?>
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
                                            <?php
                                            $sql = "SELECT * FROM `db-distrinct` ";
                                            $myConDB = connectDB();
                                            $result = $myConDB->prepare( $sql ); 
                                            $result->execute();
                                        
                                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                    <option> <?php echo $row["Distrinct"]; ?> </option>
                                            <?php
                                                }
                                          
                                            //$conn->close();*/
                                            ?>

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
        </div>
    </div>
        <div class="row mt-4">
            <div class="col-xl-12 col-12">
                <div class="card">
                    <div class="card-header card-bg">
                        <div>
                            <span>ผลผลิตสวนปาล์มน้ำมันในระบบ</span>
                            <span style="float:right;">ปี <?php echo $currentYear; ?></span>
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
                                        <th>ชื่อเกษตรกร</th>
                                        <th>ชื่อสวน</th>
                                        <th>จำนวนแปลง</th>
                                        <th>พื้นที่ปลูก (ไร่)</th>
                                        <th>จำนวนต้น</th>
                                        <th>ผลผลิต (ก.ก.)</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ชื่อเกษตรกร</th>
                                        <th>ชื่อสวน</th>
                                        <th>จำนวนแปลง</th>
                                        <th>พื้นที่ปลูก (ไร่)</th>
                                        <th>จำนวนต้น</th>
                                        <th>ผลผลิต (ก.ก.)</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                        echo "Owner ID = " ,$idUTLOG[1]['DIMuserID']." ".$idUTLOG[1]['ID'];

                                         // ID ของ farm
                                        $sql = "SELECT `log-farm`.`DIMfarmID` FROM `log-farm` 
                                                JOIN `dim-farm` ON `log-farm`.`DIMSubfID`=`dim-farm`.`ID`
                                                WHERE `log-farm`.`DIMownerID` = $DIMownerID 
                                         ";
                                        $myConDB = connectDB();
                                        $result = $myConDB->prepare( $sql ); 
                                        $result->execute();
                                        $num = 0;    
                                        $A1 = array();    
                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                            $A1[$num] = $row['DIMfarmID'];
                                            $num += 1;
                                        }
                                        $A = array_unique($A1);
                                        rsort($A);
                                        $x = count($A);
                                        for($i=0;$i<$x;$i++){
                                            $subFarm["$A[$i]"]=0;
                                            $area["$A[$i]"]=0;
                                            $numTree["$A[$i]"]=0;
                                            $weight["$A[$i]"]=0;
                                        }
                                        //

                                        // จำนวนแปลง
                                        $sql = "SELECT * FROM `log-farm`
                                                JOIN `dim-farm` ON `log-farm`.`DIMsubfID` = `dim-farm`.`ID`
                                                JOIN `db-subfarm` ON `dim-farm`.`dbID` = `db-subfarm`.`FSID`
                                                WHERE `dim-farm`.`isFarm` = 0 AND `DIMownerID` = $DIMownerID 
                                                ";
                                        $myConDB = connectDB();
                                        $result = $myConDB->prepare( $sql ); 
                                        $result->execute(); 
                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                                                $subFarm[$row['DIMfarmID']] = $subFarm[$row['DIMfarmID']] + 1;
                                        }
                                        //

                                        // จำนวนไร่
                                        $sql = "SELECT `log-farm`.`DIMfarmID` , `db-subfarm`.`AreaRai` FROM `log-farm`
                                                JOIN `dim-farm` ON `log-farm`.`DIMsubfID` = `dim-farm`.`ID`
                                                JOIN `db-subfarm` ON `dim-farm`.`dbID` = `db-subfarm`.`FSID`
                                                WHERE `dim-farm`.`isFarm` = 0 AND `DIMownerID` = $DIMownerID
                                                ";
                                        $myConDB = connectDB();
                                        $result = $myConDB->prepare( $sql ); 
                                        $result->execute(); 
                                        
                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)){ 
                                            $area[$row['DIMfarmID']] = $area[$row['DIMfarmID']] + $row['AreaRai'];
                                            
                                        }
                                        //

                                        // จำนวนต้นไม้
                                        $sql = "SELECT * FROM `log-planting` WHERE  `DIMownerID` = $DIMownerID AND `isDelete`= 0";
                                        $myConDB = connectDB();
                                        $result = $myConDB->prepare( $sql ); 
                                        $result->execute(); 
                                        
                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                                            if((int)date('Y',$row["Modify"]) + 543==$currentYear)
                                                $numTree[$row['DIMfarmID']] = $numTree[$row['DIMfarmID']] + $row['NumGrowth1'] + $row['NumGrowth2']-$row['NumDead'];
                                        }
                                        //

                                        // น้ำหนักรวม
                                        $sql = "SELECT * FROM `log-harvest` WHERE `DIMownerID` = $DIMownerID AND `isDelete`= 0";
                                        $myConDB = connectDB();
                                        $result = $myConDB->prepare( $sql ); 
                                        $result->execute(); 
                                        
                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                                            if((int)date('Y',$row["Modify"]) + 543==$currentYear)
                                                $weight[$row['DIMfarmID']] = $weight[$row['DIMfarmID']] + $row['Weight'];
                                        }
                                        //

                                        // ชื่อ
                                        $sql = "SELECT * FROM `dim-user` WHERE `dim-user`.`ID` = $DIMownerID ";
                                        $myConDB = connectDB();
                                        $result = $myConDB->prepare( $sql ); 
                                        $result->execute();
                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                                            $uname= $row['Alias'];
                                        }
                                        //

                                        //แสดงค่าในตาราง
                                        
                                            for($i=0;$i<$x;$i++){
                                                $DIMfarmID = $A[$i];
                                                ?>
                                            <tr>
                                                <td><?php echo $uname; ?></td>
                                                <td><?php $sql = "SELECT * FROM `log-farm` JOIN `dim-farm` ON `log-farm`.`DIMFarmID` = `dim-farm`.`ID`
                                                            WHERE `dim-farm`.`ID` = $A[$i]";
                                                            $myConDB = connectDB();
                                                            $result = $myConDB->prepare($sql); 
                                                            $result->execute();
                                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                                                            $fname = $row["Alias"];
                                                        } 
                                                        echo $fname;
                                                    ?></td>
                                                <td style="text-align:right;"><?php echo $subFarm["$DIMfarmID"]; ?></td>
                                                <td style="text-align:right;"><?php echo $area["$DIMfarmID"]; ?></td>
                                                <td style="text-align:right;"><?php echo $numTree["$DIMfarmID"]; ?></td>
                                                <td style="text-align:right;"><?php echo $weight["$DIMfarmID"];?></td>
                                                <td style="text-align:center;">
                                                <?php 
                                                   $farmID=$A[$i];
                                                ?>
                                                <form method="post" id="ID" name = "formID" action="OilPalmAreaVolDetail.php">
                                                    <input type="text" hidden class="form-control" name="farmID" id="farmID" value="<?php echo "$farmID"?>">
                                                    <button type="submit"  id="btn_info" class="btn btn-info btn-sm"><i class="fas fa-bars"></i></button></a>
                                                </form>
                                                </td>
                                            </tr>       
                                        <?php
                                            }
                                        
                                        ?>
                                    <!-- <tr>
                                    <td>บรรยาวัชร</td>
                                    <td>ไลอ้อน</td>
                                    <td>50</td>
                                    <td>210</td>
                                    <td>50</td>
                                    <td>150</td>
                                    <td>19/05/1996</td>
                                    <td style="text-align:center;">
                                        <button type="button" id="btn_info" class="btn btn-info btn-sm"><i class="fas fa-bars"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>บรรยาวัชร</td>
                                    <td>ไลอ้อน</td>
                                    <td>50</td>
                                    <td>210</td>
                                    <td>50</td>
                                    <td>150</td>
                                    <td>19/05/1996</td>
                                    <td style="text-align:center;">
                                        <button type="button" id="btn_info" class="btn btn-info btn-sm"><i class="fas fa-bars"></i></button>
                                    </td>
                                </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once("../layout/LayoutFooter.php"); ?>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwVxLnsuNM9mJUqDFkj6r7FSxVcQCh4ic&callback=map_create" async defer></script>
    <script src="OilPalmAreaVol.js"></script>
    <script src="OilPalmAreaVolModal.js"></script>

    <script>
        $("#map_area").css('height', $("#forMap").css('height'));
        // $("#card_add").click(function () {
        //     $("body").append(addModal);
        //     $("#addModal").modal('show');
        // });

        // $("#btn_info").click(function () {
        //     console.log("testefe");
        // });

        $("#btn_delete").click(function() {
            swal({
                title: "ยืนยันการลบข้อมูล",
                icon: "warning",
                buttons: ["ยกเลิก", "ยืนยัน"],
            });
        });

    </script>