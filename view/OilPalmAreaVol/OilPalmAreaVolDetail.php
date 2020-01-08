<?php 
    session_start();
    $idUT = $_SESSION[md5('typeid')];
    $idUTLOG = $_SESSION[md5('LOG_LOGIN')];
    $USER = $_SESSION[md5('user')];
    $CurrentMenu = "OilPalmAreaVol";
    $currentYear = date("Y") + 543;
    $DIMownerID = $idUTLOG[1]['DIMuserID'];

    include_once("../layout/LayoutHeader.php"); 
    include_once("../../dbConnect.php"); 
    
    if(isset($_POST['farmID']))
        $_SESSION["farmID"] = $_POST['farmID'];
    $farmID = $_SESSION["farmID"];

    $icon = $USER[1]['Icon'];
    if($icon == "default.jpg"){
        // echo "yes";
        $userId = 0;
        $icon = "default.jpg";
    }else{
        $userId = $USER[1]['UID'];
        $icon = $USER[1]['Icon'];
    }

    $sql = "SELECT * FROM `dim-farm` JOIN `db-farm` ON `dim-farm`.`dbID` = `db-farm`.`FMID` WHERE `dim-farm`.`ID` = $farmID AND `isFarm` = 1";
    $myConDB = connectDB();
    $result = $myConDB->prepare($sql); 
    $result->execute(); 
    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
        $iconFarm = $row['Icon'];
    }
    
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">


<div class="container">
    <div class="row">
        <div class="col-xl-12 col-12 mb-4">
            <div class="card">
                <div class="card-header card-bg">
                    <div class="row">
                        <div class="col-12">
                            <span class="link-active">รายละเอียดผลผลิตสวนปาล์มน้ำมัน</span>
                            <span style="float:right;">
                                <i class="fas fa-bookmark"></i>
                                <a class="link-path" href="#">หน้าแรก</a>
                                <span> > </span>
                                <a class="link-path" href="#">ผลผลิตสวนปาล์มน้ำมัน</a>
                                <span> > </span>
                                <a class="link-path link-active" href="#">รายละเอียดผลผลิตสวนปาล์มน้ำมัน</a>
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
                        <img class="img-radius" width="200" height="200" src="../../icon/farm/<?php echo $farmID; ?>/<?php echo $iconFarm; ?>" />
                       
                    </div>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-xl-3 col-3 text-right">
                            <span>ชื่อสวน : </span>
                        </div>
                        <div class="col-xl-6 col-3">
                            <span>
                            <?php
                             $sql = "SELECT * FROM `log-farm` 
                                    JOIN `dim-farm` ON `log-farm`.`DIMfarmID` = `dim-farm`.`ID`
                                    JOIN `dim-user` ON `log-farm`.`DIMownerID` = `dim-user`.`ID`  
                                    WHERE `dim-user`.`ID` = $DIMownerID AND `dim-farm`.`ID` = $farmID
                                    ";
                            $myConDB = connectDB();
                            $result = $myConDB->prepare( $sql ); 
                            $result->execute();        
                            if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            
                                echo $row["Name"];
                            ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-12">
            <div class="card">
                <div class="card-body" id="card_height">
                    <div class="row">                       
                        <img class="img-radius" width="200" height="200"  src="../../icon/user/<?php echo $userId; ?>/<?php echo $icon; ?>" />
                                
                    </div>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-xl-3 col-3 text-right">
                            <span>เกษตรกร : </span>
                        </div>
                        <div class="col-xl-6 col-3">
                            <span>
                            <?php 
                                echo $row["FullName"];
                            }      
                            ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-xl-4 col-12 mb-4">
            <div class="card border-left-primary card-color-one shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <?php
                                $sql = "SELECT * FROM `log-farm`
                                JOIN `dim-farm` ON `log-farm`.`DIMsubfID` = `dim-farm`.`ID`
                                JOIN `db-subfarm` ON `dim-farm`.`dbID` = `db-subfarm`.`FSID`
                                WHERE `dim-farm`.`isFarm` = 0 AND `DIMownerID` = $DIMownerID AND `DIMfarmID` = $farmID
                                ";
                                $myConDB = connectDB();
                                $result = $myConDB->prepare( $sql ); 
                                $result->execute(); 
                                $subFarm = 0;
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                                    $subFarm = $subFarm + 1;
                                }
                            ?>
                            <div class="font-weight-bold  text-uppercase mb-1">จำนวนแปลง</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $subFarm; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons icon-big">waves</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-12 mb-4">
            <div class="card border-left-primary card-color-two shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <?php
                                $sql = "SELECT * FROM `log-planting` WHERE  `DIMownerID` = $DIMownerID AND `isDelete`= 0 AND `DIMfarmID` = $farmID";
                                $myConDB = connectDB();
                                $result = $myConDB->prepare( $sql ); 
                                $result->execute(); 
                                $numTree = 0;
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                                    if((int)date('Y',$row["Modify"]) + 543==(int)$currentYear)
                                        $numTree = $numTree + $row['NumGrowth1'] + $row['NumGrowth2'] - $row['NumDead'];
                                }
                            ?>
                            <div class="font-weight-bold  text-uppercase mb-1">จำนวนต้น</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numTree; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons icon-big">format_size</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-12 mb-4">
            <div class="card border-left-primary card-color-three shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                                <?php
                                    $sql = "SELECT `log-farm`.`DIMfarmID` , `db-subfarm`.`AreaRai` , `db-subfarm`.`AreaNgan` , `db-subfarm`.`AreaWa`   FROM `log-farm`
                                    JOIN `dim-farm` ON `log-farm`.`DIMsubfID` = `dim-farm`.`ID`
                                    JOIN `db-subfarm` ON `dim-farm`.`dbID` = `db-subfarm`.`FSID`
                                    WHERE `dim-farm`.`isFarm` = 0 AND `DIMownerID` = $DIMownerID AND `DIMfarmID` = $farmID
                                    ";
                                $myConDB = connectDB();
                                $result = $myConDB->prepare( $sql ); 
                                $result->execute();
                                $Rai = 0;
                                $Ngan = 0;
                                $Wa = 0;
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)){ 
                                    $Rai = $Rai + $row['AreaRai'];
                                    $Ngan = $Ngan + $row['AreaNgan'];
                                    $Wa = $Wa + $row['AreaWa'];
                                }
                                ?>
                            <div class="font-weight-bold  text-uppercase mb-1">พื้นที่ทั้งหมด</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $Rai; ?> ไร่ <?php echo $Ngan ?> งาน <?php echo $Wa; ?> วา</div>
                        </div>
                        <div class="col-auto">
                            <i class="material-icons icon-big">dashboard</i>
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
                    <span>ผลผลิตต่อปี</span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <canvas id="productYear" style="height:200px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ผลผลิตรายปี -->
    <div class="row mt-4">
        <div class="col-xl-12 col-12">
            <div class="card" >
                <div class="card-header card-bg">
                    <div class="row">
                        <div class="col-6">
                            <span>รายละเอียดผลผลิตปี : </span>
                        </div>  
                        <div class="col-6">
                            <select id="productPerYear" name="productPerYear" class="form-control">
                                <?php
                                            $num = 0;
                                            $selectYear=$currentYear;
                                            $sql = "SELECT * FROM `log-harvest`  WHERE `DIMownerID` = $DIMownerID AND `isDelete`= 0 ";
                                            $myConDB = connectDB();
                                            $result = $myConDB->prepare( $sql ); 
                                            $result->execute();        
                                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                    $PerYear[$num] = (date("Y",$row["Modify"])+543);
                                                    $num += 1;
                                            }
                                            $CountYear = array_unique($PerYear);
                                            rsort($CountYear);
                                            $x=count($CountYear);
                                ?>
                                <?php 
                                    for($i=0;$i<$x;$i++){
                                        $year =$CountYear[$i];
                                        if($i==0){?>
                                        <option value ="<?php echo $year; ?>" selected><?php echo $year; ?></option>
                                        <?php 
                                        } 
                                        else {
                                        ?>
                                        <option value="<?php echo $year; ?>"><?php echo $year;?></option>
                                <?php 
                                    } 
                                }                              
                                ?>                
                            </select>
                        </div>  
                    </div>
                </div>
                <div class="card-body" id="card-productPerYear">
                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <div class="row mb-2">
                                <div class="col-xl-6 col-12 productMonth">
                                    <canvas id="productMonth" style="height:200px;"></canvas>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div class="card">
                                        <div class="card-header card-bg">
                                            <span>สรุปผลผลิตปี</span><span id="sumyear"><?php echo $currentYear; ?></span>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                                $sql = "SELECT *  FROM `log-harvest`  
                                                WHERE `log-harvest`.`DIMownerID` = $DIMownerID 
                                                    AND `isDelete` = 0
                                                    AND `log-harvest`.`DIMfarmID` = $farmID
                                                ";
                                                $myConDB = connectDB();
                                                $result = $myConDB->prepare( $sql ); 
                                                $result->execute();    
                                                $weight = 0;
                                                $totalPrice = 0;    
                                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                    if((int)date('Y',$row["Modify"]) + 543==$currentYear){
                                                        $weight = $weight + $row['Weight'];
                                                        $totalPrice = $totalPrice + $row['TotalPrice'];
                                                    }
                                                }
                                            ?>
                                            <div class="row">
                                                <div class="col-12" >
                                                    <span >ผลผลิตทั้งหมด : <span id="sumweight"><?php echo $weight;?></span> กิโลกรัม</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12" >
                                                    <span >รายได้ทั้งหมด   : <span id="sumprice"><?php echo $totalPrice;?></span> บาท</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header card-bg">
                                            <div>
                                                <span>รายการเก็บผลผลิตต่อแปลง</span>
                                                <button type="button" id="btn_add_product" style="float:right;" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> เพิ่มผลผลิต</button>
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
                                                            <th>วันที่เก็บผลผลิต</th>
                                                            <th>ผลผลิต (ก.ก.)</th>
                                                            <th>ราคาต่อหน่วย</th>
                                                            <th>ราคาสุทธิ์</th>
                                                            <th>จัดการ</th>

                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>ชื่อแปลง</th>
                                                            <th>วันที่เก็บผลผลิต</th>
                                                            <th>ผลผลิต (ก.ก.)</th>
                                                            <th>ราคาต่อหน่วย (บาท)</th>
                                                            <th>ราคาสุทธิ์</th>
                                                            <th>จัดการ</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody id="table">
                                                        <?php
                                                        echo "Owner ID = " ,$idUTLOG[1]['DIMuserID']." "."Farm ID = ",$farmID;
                                                        
                                                        //  echo date("d-m-Y",1525376494);
                                                            $sql = "SELECT * , `log-harvest`.`ID` as IDlog FROM `log-harvest` 
                                                                    JOIN `dim-farm` ON `log-harvest`.`DIMsubFID` = `dim-farm`.`ID` 
                                                                    WHERE `log-harvest`.`DIMownerID` = $DIMownerID 
                                                                        AND `isDelete` = 0
                                                                        AND `log-harvest`.`DIMfarmID` = $farmID
                                                                    ";
                                                            $myConDB = connectDB();
                                                            $result = $myConDB->prepare( $sql ); 
                                                            $result->execute();        
                                                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                                if((int)date('Y',$row["Modify"]) + 543==$currentYear){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row["Alias"]; ?></td>
                                                            <td ><?php echo date('d-m-',$row["Modify"]).(date('Y',$row["Modify"])+543); ?></td>
                                                            <td><?php echo $row["Weight"]; ?></td>
                                                            <td><?php echo $row["UnitPrice"]; ?></td>
                                                            <td><?php echo $row["TotalPrice"]; ?></td>
                                                            <td style="text-align:center;">
                                                                <!--<input type="text" hidden class="form-control" name="request" id="request" value="delete">-->
                                                                <button type="button" class="btn btn-info btn-sm" onclick="$('#imageModal').modal('show')"><i class="fas fa-images"></i></button>
                                                                <button type="button" class="btn btn-danger btn-sm" onclick="delfunction('<?php echo $row["IDlog"]; ?> ' , '<?php echo $row["Alias"]; ?>')" ><i class="far fa-trash-alt"></i></button>
                    
                                                            </td>
                                                        </tr>
                                                        <?php
                                                            }
                                                        }
                                                        
                                                        //$conn->close();
                                                        ?>
                                                    </tbody>
                                                </table>
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
        <!-- ผลผลิตรายปี -->
    </div>
    <div class="row mt-4">
        <div class="col-xl-12 col-12">
            <div class="card">
                <div class="card-header card-bg">
                    <span>การเก็บผลผลิต / ปริมาณปุ๋ยที่ใส่ต่อต้น</span>
                </div>
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-xl-12 col-12">
                            <canvas id="tradFer" style="height:200px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
<form method="post" id="formAdd" name = "formAdd" action="manage.php"
    < div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header header-modal">
                <h4 class="modal-title">เพิ่มผลผลิต</h4>
            </div>
            <div class="modal-body" id="addModalBody">
                <div class="row mb-4">
                    <div class="col-xl-3 col-12 text-right">
                        <span>ชื่อแปลง<span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <select id="sub" name="SubFarmID" class="form-control" required=""  oninput="setCustomValidity('')">
                            <option selected>เลือกแปลง</option>
                            
                                <?php
                                $sql = "SELECT * FROM `dim-farm`
                                        JOIN `db-subfarm` ON `dim-farm`.`dbID` = `db-subfarm`.`FSID`
                                        WHERE `isFarm` = 0 AND `FMID` = $farmID 
                                        ";
                                $myConDB = connectDB();
                                $result = $myConDB->prepare( $sql ); 
                                $result->execute();        
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    
                                    ?>
                                        <option value="<?php echo $row['ID']; ?>"> <?php echo $row['Alias']; ?> </option>   
                                <?php    
                                    }
                                
                                ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-xl-3 col-12 text-right">
                        <span>วันที่เก็บผลผลิต<span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <input type="date" name="date" class="form-control" id="date" required="" oninput="setCustomValidity('')">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-xl-3 col-12 text-right">
                        <span>ผลผลิต (ก.ก.)<span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <input type="number" name="weight" class="form-control" id="weight" required="" oninput="setCustomValidity('')">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-xl-3 col-12 text-right">
                        <span>ราคาต่อหน่วย<span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <input type="number" name="UnitPrice" class="form-control" id="UnitPrice" required="" oninput="setCustomValidity('')">
                        <input type="text" hidden class="form-control" name="request" id="request" value="insert">
                        <input type="text" hidden class="form-control" name="AddFarmID" id="FarmID" value="<?php echo $farmID; ?>">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="save" id="save"  class="btn btn-success">ยืนยัน</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>               
            </div>
        </div>
        </form>
    </div>
</div>

<?php include_once("../layout/LayoutFooter.php"); ?>
<?php include_once("modalOilPalmAreaVol.php"); ?>

<script src="OilPalmAreaVol.js"></script>
<script src="OilPalmAreaVolModal.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
<script>

    $("#card_height").css('height', $("#for_card").css('height'));


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
    scales: {
      yAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'ผลผลิต (ก.ก.)'
        },
        gridLines: {
            display:true
        }
      }],
      xAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'รายปี'
        },
        gridLines: {
            display:false
        }
      }],
    }
  };

  var speedData = {
    <?php
       $sql = "SELECT * FROM `log-harvest` WHERE `DIMownerID` = $DIMownerID AND `isDelete`= 0 AND `log-harvest`.`DIMfarmID` = $farmID";
       $myConDB = connectDB();
       $result = $myConDB->prepare( $sql ); 
       $result->execute(); 
       $num = 0;        
       while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

              $A[$num] = (date("Y",$row["Modify"]));
              $num += 1;
 
      }
      $Year= array_unique($A);
      rsort($Year);
      $x= count($Year);
      ?> 
      <?php
      $sql = "SELECT * FROM `log-harvest` WHERE `DIMownerID` = $DIMownerID AND `isDelete`= 0 AND `log-harvest`.`DIMfarmID` = $farmID";
      $myConDB = connectDB();
       $result = $myConDB->prepare( $sql ); 
       $result->execute(); 
            for ($i=0; $i < $x; $i++) { 
              $Area["$Year[$i]"] = 0;
            }
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $Area[(date("Y",$row["Modify"]))] = $Area[(date("Y",$row["Modify"]))] + $row["Weight"];
                }
            
      ?>
          labels: [<?php 
                 for ($i=0 ; $i < $x  ; $i++ ) { 
                      echo (array_pop($Year)+543).",";
                 }
           ?>,""],
          datasets: [
          {
              
      
            label: "ผลผลิตสวนปาร์มน้ำมัน",
            data: [<?php
             for ($i=0 ; $i < $x  ; $i++ ) { 
              echo array_pop($Area).",";
         }
            ?>,0],
            backgroundColor: '#00ce68'
          }]
  };

    var ctx = $("#productYear");
    var plantPie = new Chart(ctx, {
        type: 'bar',
        data: speedData,
        options: chartOptions
    });

   

    var chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
            display: true,
            position: 'top',
            labels: {
                boxWidth: 80,
                fontColor: 'black'
                }
            },
            scales: {
            yAxes: [{
                id : 'left-y',
                scaleLabel: {
                display: true,
                labelString: 'ผลผลิต (ก.ก./ปี) '
                },
                gridLines: {
                    display:true
                },
                position: 'left'
            },
            {
                id : 'right-y',
                scaleLabel: {
                display: true,
                labelString: 'ปริมาณปุ๋ยที่ใส่ (ก.ก./ต้น)'
                },
                gridLines: {
                    display:false
                } ,
                position: 'right'
            }
            ],
            xAxes: [{
                scaleLabel: {
                display: true,
                labelString: 'รายปี'
                },
                gridLines: {
                    display:false
                }
            }],
            }
        };

  var speedData = {
    <?php
       $sql = "SELECT * FROM `log-harvest` WHERE `DIMownerID` = $DIMownerID AND `isDelete`= 0 AND `log-harvest`.`DIMfarmID` = $farmID";
       $myConDB = connectDB();
       $result = $myConDB->prepare( $sql ); 
       $result->execute(); 
       $num = 0;        
       while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

              $A[$num] = (date("Y",$row["Modify"]));
              $num += 1;
 
      }
      $Year= array_unique($A);
      rsort($Year);
      $x= count($Year);
      ?> 
      <?php
      $sql = "SELECT * FROM `log-harvest` WHERE `DIMownerID` = $DIMownerID AND `isDelete`= 0 AND `log-harvest`.`DIMfarmID` = $farmID";
      $myConDB = connectDB();
       $result = $myConDB->prepare( $sql ); 
       $result->execute(); 
            for ($i=0; $i < $x; $i++) { 
              $Area["$Year[$i]"] = 0;
            }
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $Area[(date("Y",$row["Modify"]))] = $Area[(date("Y",$row["Modify"]))] + $row["Weight"];
                }
            
      ?>

            labels: [<?php 
                 for ($i=0 ; $i < $x  ; $i++ ) { 
                      echo (array_pop($Year)+543).",";
                 }
            ?>],
            datasets: [
            {
            yAxisID: 'left-y',
            label: "ผลผลิต",
            data: [<?php
             for ($i=0 ; $i < $x  ; $i++ ) { 
              echo array_pop($Area).",";
            }
            ?>],
            backgroundColor: 'transparent',
            borderColor: '#00ce68',
            
            },
            {
            yAxisID: 'right-y',
            label: "ปุ๋ย",
            data: [100, 60, 40, 80, 80, 100],
            backgroundColor: 'transparent',
            borderColor: '#05acd3'
            }]
        };

    var ctx = $("#tradFer");
    var plantPie = new Chart(ctx, {
        type: 'line',
        data: speedData,
        options: chartOptions
    });

    
</script>