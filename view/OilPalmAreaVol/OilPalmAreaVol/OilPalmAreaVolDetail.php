<?php 
    session_start();
    $idUT = $_SESSION[md5('typeid')];
    $idUTLOG = $_SESSION[md5('LOG_LOGIN')];
    $CurrentMenu = "OilPalmAreaVol";
    $currentYear = date("Y") + 543;
    $DIMownerID = $idUTLOG[1]['DIMuserID'];


    $logFarmID = $_POST['logfarmID'];
    $farmID = $_POST['farmID'];
?>


<?php include_once("../layout/LayoutHeader.php"); ?>
<?php include_once("../../dbConnect.php"); ?>

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
                        <img class="img-radius" width="250px" src="../../picture/palm1.jpg" />
                    </div>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-xl-3 col-3 text-right">
                            <span>ชื่อสวน :</span>
                        </div>
                        <div class="col-xl-3 col-3">
                            <span>  
                            <?php 
                            $sql = "SELECT * FROM `log-farm` 
                                    JOIN `dim-farm` ON `log-farm`.`DIMfarmID` = `dim-farm`.`ID`
                                    JOIN `dim-user` ON `log-farm`.`DIMownerID` = `dim-user`.`ID` 
                                    ";
                            $myConDB = connectDB();
                            $result = $myConDB->prepare( $sql ); 
                            $result->execute();        
                            if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            
                                echo $row["Name"];
                                  
                            ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-12">
            <div class="card">
                <div class="card-body" id="card_height">
                    <div class="row">
                        <img class="img-radius" style="width:100%;max-width:150px" src="../../picture/default.jpg" />
                    </div>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-xl-3 col-3 text-right">
                            <span>เกษตรกร : </span>
                        </div>
                        <div class="col-xl-4 col-3">
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
                            <div class="font-weight-bold  text-uppercase mb-1">จำนวนแปลง</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">100</div>
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
                            <div class="font-weight-bold  text-uppercase mb-1">จำนวนต้น</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">2000</div>
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
                            <div class="font-weight-bold  text-uppercase mb-1">พื้นที่ทั้งหมด</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">300 ไร่ 5 งาน 4 วา</div>
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
    <div class="row mt-4">
        <div class="col-xl-12 col-12">
            <div class="card">
                <div class="card-header card-bg">
                    <div class="row">
                        <div class="col-6">
                            <span>รายละเอียดผลผลิตปี : </span>
                        </div>  
                        <div class="col-6">
                            <select id="year" class="form-control">
                                <option  selected><?php echo $currentYear; ?></option>
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
                                            $CountYear= array_unique($PerYear);
                                            sort($CountYear);
                                ?>
                                <option><?php echo array_pop($CountYear);?></option>
                            </select>
                        </div>  
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <div class="row mb-2">
                                <div class="col-xl-6 col-12">
                                    <canvas id="productMonth" style="height:200px;"></canvas>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div class="card">
                                        <div class="card-header card-bg">
                                            สรุปผลผลิตปี <?php echo $selectYear; ?>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <span>ผลผลิตทั้งหมด : 100 กิโลกรัม</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <span>รายได้ทั้งหมด   : 200 บาท</span>
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
                                                <table id="product" class="table table-bordered table-striped table-hover table-data" width="100%">
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
                                                    <tbody>
                                                        <?php
                                                        echo "Owner ID = " ,$idUTLOG[1]['DIMuserID']." "."logFarm ID = ",$logFarmID." "."Farm ID = ",$farmID;
                                                        
                                                        //  echo date("d-m-Y",1525376494);
                                                            $sql = "SELECT * , `log-harvest`.`ID` as IDFarm FROM `log-harvest` 
                                                                    JOIN `dim-farm` ON `log-harvest`.`DIMsubFID` = `dim-farm`.`ID` 
                                                                    WHERE `log-harvest`.`DIMownerID` = $DIMownerID 
                                                                        AND `isDelete` = 0
                                                                        AND `log-harvest`.`DIMfarmID` = $farmID
                                                                    ";
                                                            $myConDB = connectDB();
                                                            $result = $myConDB->prepare( $sql ); 
                                                            $result->execute();        
                                                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row["Alias"]; ?></td>
                                                            <td ><?php echo date('d-m-',$row["Modify"]).(date('Y',$row["Modify"])+543); ?></td>
                                                            <td><?php echo $row["Weight"]; ?></td>
                                                            <td><?php echo $row["UnitPrice"]; ?></td>
                                                            <td><?php echo $row["TotalPrice"]; ?></td>
                                                            <td style="text-align:center;">
                                                                <input type="text" hidden class="form-control" name="request" id="request" value="delete">
                                                                <button type="button"  id="btn_image" class="btn btn-info btn-sm"><i class="fas fa-images"></i></button>
                                                                <button type="button" onclick="delfunction('<?php echo $row['IDFarm'];  ?>')" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                    
                                                            </td>
                                                        </tr>
                                                        <?php
                                                            }
                                                        
                                                        //$conn->close();
                                                        ?>
                                                        <!--
                                                        <tr>
                                                            <td>ไลอ้อนแปลง 1</td>
                                                            <td>15/06/2561</td>
                                                            <td>50</td>
                                                            <td>2</td>
                                                            <td>100</td>
                                                            <td style="text-align:center;">
                                                                <button type="button" id="btn_image" class="btn btn-info btn-sm"><i class="fas fa-images"></i></button>
                                                                <button type="button" id="btn_delete" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>ไลอ้อนแปลง 2</td>
                                                            <td>10/07/2561</td>
                                                            <td>30</td>
                                                            <td>2</td>
                                                            <td>60</td>
                                                            <td style="text-align:center;">
                                                                <button type="button" id="btn_image" class="btn btn-info btn-sm"><i class="fas fa-images"></i></button>
                                                                <button type="button" id="btn_delete" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>ไลอ้อนแปลง 3</td>
                                                            <td>19/12/2561</td>
                                                            <td>20</td>
                                                            <td>2</td>
                                                            <td>40</td>
                                                            <td style="text-align:center;">
                                                                <button type="button" id="btn_image" class="btn btn-info btn-sm"><i class="fas fa-images"></i></button>
                                                                <button type="button" id="btn_delete" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>

                                                            </td>
                                                        </tr>
                                                        -->
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
    </div>
    <div class="row mt-4">
        <div class="col-xl-12 col-12">
            <div class="card">
                <div class="card-header card-bg">
                    <span>การ</span>
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
                        <span>ชื่อแปลง</span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <select id="sub" name="SubFarmID" class="form-control">
                            <option selected>เลือกแปลง</option>
                            
                                <?php
                                $sql = "SELECT * FROM `dim-farm`
                                    WHERE `isFarm` = 0 ";
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
                        <span>วันที่เก็บผลผลิต</span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <input type="date" name="date" class="form-control" id="rank">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-xl-3 col-12 text-right">
                        <span>ผลผลิต (ก.ก.)</span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <input type="number" name="weight" class="form-control" id="rank">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-xl-3 col-12 text-right">
                        <span>ราคาต่อหน่วย</span>
                    </div>
                    <div class="col-xl-9 col-12">
                        <input type="number" name="UnitPrice" class="form-control" id="rank">
                        <input type="text" hidden class="form-control" name="request" id="request" value="insert">
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <input type="text" hidden class="form-control" name="AddFarmID" id="FarmID" value="<?php echo $logFarmID; ?>">
                <button type="submit" name="manageButton"  class="btn btn-success">ยืนยัน</button>
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

<script>
    /*$(document).ready(function () {
        $('#product').DataTable({
            "order": [[ 1, "asc" ]]
        }); 
        $('.dataTables_length').addClass('bs-select');
    });*/

    $("#card_height").css('height', $("#for_card").css('height'));

    $("#btn_add_product").click(function () {
        $("body").append(addProductModal);
        $("#addProductModal").modal('show');
    });

    $("#btn_image").click(function () {
        $("body").append(imageModal);
        $("#imageModal").modal('show');
    });

    //รายละเอียดผลผลิตปี
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
          ?>
          <?php 
              $A[$num] = (date("Y",$row["Modify"]));
              $num += 1;
           ?>
      <?php
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
        /*
        labels: ["2562", "2561", "2560", "2559", "2558", "2557"],
        datasets: [
        {
            label: "Demo Data 1",
            data: [100, 50, 25, 80, 40, 90],
            backgroundColor: '#00ce68'
        }]
        */
  };

    var ctx = $("#productYear");
    var plantPie = new Chart(ctx, {
        type: 'bar',
        data: speedData,
        options: chartOptions
    });


    //รายการเก็บผลผลิตต่อแปลง
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
          labelString: 'รายเดือน'
        },
        gridLines: {
            display:false
        }
      }],
    }
  };

  var speedData = {

          labels: ["ม.ค.", "ก.พ.", "มี.ค.", 
            "เม.ย", "พ.ค.", "มิ.ย.",
            "ก.ค.", "ส.ค.", "ก.ย.",
            "ต.ค.", "พ.ย.", "ธ.ค."],
          datasets: [
          {
              
      
            label: "ผลผลิตสวนปาร์มน้ำมัน",
            data: [0, 0, 0,
            0, 0, 50,
            30, 0, 0,
            0, 0, 20],
            backgroundColor: '#00ce68'
          }]

    /*labels: ["ม.ค.", "ก.พ.", "มี.ค.", 
            "เม.ย", "พ.ค.", "มิ.ย.",
            "ก.ค.", "ส.ค.", "ก.ย.",
            "ต.ค.", "พ.ย.", "ธ.ค."],
    datasets: [{
      label: "ปี 2561",
      data: [0, 0, 0,
            0, 0, 50,
            30, 0, 0,
            0, 0, 20],
      backgroundColor: '#05acd3'
    }]*/
  };

    var ctx = $("#productMonth");
    var plantPie = new Chart(ctx, {
        type: 'bar',
        data: speedData,
        options: chartOptions
    });


    //
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
                labelString: 'ผลผลิต (ก.ก./ปี) '
                },
                gridLines: {
                    display:true
                }
            }],
            xAxes: [{
                scaleLabel: {
                display: true,
                labelString: 'ปริมาณปุ๋ยที่ใส่ (ก.ก./ต้น)'
                },
                gridLines: {
                    display:false
                }
            }],
            }
        };

  var speedData = {
            labels: ["2562", "2561", "2560", "2559", "2558", "2557"],
            datasets: [
            {
            label: "Demo Data 1",
            data: [100, 50, 25, 80, 40, 90],
            backgroundColor: 'transparent',
            borderColor: '#00ce68'
            },
            {
            label: "Demo Data 1",
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