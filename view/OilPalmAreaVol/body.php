<?php 
$year = $currentYear-1;
?>
<div class="card-body" id="card-productPerYear">
                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <div class="row mb-2">
                                <div class="col-xl-6 col-12">
                                    <canvas id="productMonth" style="height:200px;"></canvas>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div class="card">
                                        <div class="card-header card-bg">
                                            สรุปผลผลิตปี <?php echo $year; ?>
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
                                                    if((int)date('Y',$row["Modify"]) + 543==$year){
                                                        $weight = $weight + $row['Weight'];
                                                        $totalPrice = $totalPrice + $row['TotalPrice'];
                                                    }
                                                }
                                            ?>
                                            <div class="row">
                                                <div class="col-12">
                                                    <span>ผลผลิตทั้งหมด : <?php echo $weight;?> กิโลกรัม</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <span>รายได้ทั้งหมด   : <?php echo $totalPrice;?> บาท</span>
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
                                                    <tbody>
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
                                                                if((int)date('Y',$row["Modify"]) + 543==$year){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row["Alias"]; ?></td>
                                                            <td ><?php echo date('d-m-',$row["Modify"]).(date('Y',$row["Modify"])+543); ?></td>
                                                            <td><?php echo $row["Weight"]; ?></td>
                                                            <td><?php echo $row["UnitPrice"]; ?></td>
                                                            <td><?php echo $row["TotalPrice"]; ?></td>
                                                            <td style="text-align:center;">
                                                                <!--<input type="text" hidden class="form-control" name="request" id="request" value="delete">-->
                                                                <button type="button"  id="btn_image" class="btn btn-info btn-sm"><i class="fas fa-images"></i></button>
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

    <script>
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

    <?php
      for($i=1;$i<13;$i++){
          $month["$i"]=0;
      }
      $sql = "SELECT * FROM `log-harvest` WHERE `DIMownerID` = $DIMownerID AND `isDelete`= 0 AND `log-harvest`.`DIMfarmID` = $farmID ";
      $myConDB = connectDB();
       $result = $myConDB->prepare( $sql ); 
       $result->execute(); 
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    if((int)date('Y',$row["Modify"]) + 543==$year){
                        $month[(date("n",$row["Modify"]))] = $month[(date("n",$row["Modify"]))] + $row["Weight"];
                    }
                }
    ?>

    labels: ["ม.ค.", "ก.พ.", "มี.ค.", 
            "เม.ย", "พ.ค.", "มิ.ย.",
            "ก.ค.", "ส.ค.", "ก.ย.",
            "ต.ค.", "พ.ย.", "ธ.ค."],
    datasets: [{
      label: "ปี <?php echo $year?>",
      data: [<?php
             for ($i=1 ; $i < 13  ; $i++ ) { 
              echo $month["$i"].",";
         }
            ?>,0],
      backgroundColor: '#05acd3'
    }]
  };

    var ctx = $("#productMonth");
    var plantPie = new Chart(ctx, {
        type: 'bar',
        data: speedData,
        options: chartOptions
    });
  </script>
