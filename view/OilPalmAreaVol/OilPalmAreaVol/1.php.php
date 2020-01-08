<?php 
    session_start();
    
    $idUT = $_SESSION[md5('typeid')];
    $CurrentMenu = "OilPalmAreaVol";
?>


<?php include_once("../layout/LayoutHeader.php"); ?>
<?php include_once("connect_db.php"); ?>
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
                        <img class="img-radius" style="width:100%;max-width:150px"  src="../../picture/default.jpg" />
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
                                <option>2562</option>
                                <option  selected>2561</option>
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
                                    <canvas id="productMonth" style="height:200px;"></canvas>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <div class="card">
                                        <div class="card-header card-bg">
                                            สรุปผลผลิตปี 2561
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
                                                    <tr>

                                                    <?php
                                                            $sql = "SELECT `NumSubFarm`,`Modify`, `Weight`, `UnitPrice`, `TotalPrice` FROM `log-harvest` 
                                                                    JOIN `log-farm` ON `log-harvest`.`DIMfarmID`=`log-farm`.`DIMfarmID`
                                                                    ";
                                                            $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                        ?>
                                                            <td><?php echo $row["NumSubFarm"]; ?></td>
                                                            <td><?php echo date('d-m-Y',$row["Modify"]); ?></td>
                                                            <td><?php echo $row["Weight"]; ?></td>
                                                            <td><?php echo $row["UnitPrice"]; ?></td>
                                                            <td><?php echo $row["TotalPrice"]; ?></td>
                                                            <td style="text-align:center;">
                                                                <button type="button" id="btn_image" class="btn btn-info btn-sm"><i class="fas fa-images"></i></button>
                                                                <button type="button" id="btn_delete" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                                                            </td>
                                                        <?php
                                                            }
                                                        } else {
                                                            echo "0 row";
                                                        }
                                                        //$conn->close();
                                                        ?>
                                                        </tr>
                                                        <!--<tr>
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
                                                        </tr>-->
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

<?php include_once("../layout/LayoutFooter.php"); ?>

<script src="OilPalmAreaVol.js"></script>
<script src="OilPalmAreaVolModal.js"></script>

<script>

    $("#card_height").css('height', $("#for_card").css('height'));

    $("#btn_add_product").click(function () {
        $("body").append(addProductModal);
        $("#addProductModal").modal('show');
    });

    $("#btn_image").click(function () {
        $("body").append(imageModal);
        $("#imageModal").modal('show');
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
       $sql = "SELECT * FROM `log-harvest` ";
       $result = $conn->query($sql);
       $num = 0;
      
       while ($row = $result->fetch_assoc()) {
          ?>
          <?php 
              $A[$num] = (date("Y",$row["Modify"]));
              $num += 1;
           ?>
      <?php
      }
      $Year= array_unique($A);
      sort($Year);
      $x= count($Year);
      ?> 
      <?php
      $sql = "SELECT * FROM `log-harvest` ";
      $result = $conn->query($sql);
           for ($i=0; $i < $x; $i++) { 
              $Area["$Year[$i]"] = 0;
             }
             while ($row = $result->fetch_assoc()) {
               $Area[(date("Y",$row["Modify"]))] = $Area[(date("Y",$row["Modify"]))] + $row["Weight"];
             }
      
      ?>
          labels: [<?php 
                 for ($i=0 ; $i < $x  ; $i++ ) { 
                      echo array_pop($Year).",";
                 }
           ?>],
          datasets: [
          {
              
      
            label: "Demo Data 1",
            data: [<?php
             for ($i=0 ; $i < $x  ; $i++ ) { 
              echo array_pop($Area).",";
         }
            ?>],
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
    datasets: [{
      label: "ปี 2561",
      data: [0, 0, 0,
            0, 0, 50,
            30, 0, 0,
            0, 0, 20],
      backgroundColor: '#05acd3'
    }]
  };

    var ctx = $("#productMonth");
    var plantPie = new Chart(ctx, {
        type: 'bar',
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