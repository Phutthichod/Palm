<?php
session_start();

$idUT = $_SESSION[md5('typeid')];
$CurrentMenu = "OilPalmAreaVol";
$currentYear = date("Y") + 543;
$backYear = date("Y") + 543 - 1;
?>


<?php include_once("../layout/LayoutHeader.php"); ?>

<body>
    <?php include_once("connect_db.php"); ?>
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
                                <?php ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">21 ก.ก.</div>
                                
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
        <div class="row">
            <div class="col-xl-12 col-12">
                <div class="card">
                    <div class="card-header card-bg">
                        ตำแหน่งผลผลิตสวนปาล์มน้ำมัน
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
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <option> <?php echo $row["Province"]; ?> </option>
                                            <?php
                                                }
                                            } else {
                                                echo "0 row";
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
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <option> <?php echo $row["Distrinct"]; ?> </option>
                                            <?php
                                                }
                                            } else {
                                                echo "0 row";
                                            }
                                            //$conn->close();
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
        <div class="row mt-4">
            <div class="col-xl-12 col-12">
                <div class="card">
                    <div class="card-header card-bg">
                        <div>
                            <span>ผลผลิตสวนปาล์มน้ำมันในระบบ</span>
                            <span style="float:right;">ปี 2562</span>
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
                                    <tr>

                                    <!--SELECT FirstName , `LastName`, Distrinct , Province , FMID 
                                    FROM db-farmer JOIN db-subdistrinct ON `db-subdistrinct`.`AD3ID` = `db-farmer`.`AD3ID` 
                                    JOIN db-distrinct ON `db-subdistrinct`.`AD2ID` = `db-distrinct`.`AD2ID` 
                                    JOIN db-province ON `db-distrinct`.`AD1ID` = `db-province`.`AD1ID` 
                                    JOIN db-farm ON `db-farm`.`UFID` = `db-farmer`.`UFID
                            
                                    
                                    SELECT  `dim-user`.`Alias`, `dim-farm`.`Alias`  FROM `dim-user` 
                                    JOIN `dim-farm` ON `dim-user`.`dbID`=`dim-farm`.`dbID`
                                    JOIN `log-farm` ON `log-farm`.`ID` = `dim-user`.`dbID`

                                    -->

                                        <?php
                                        $sql = "SELECT `dim-user`.`Alias`, `dim-farm`.`Alias` as Alias2,  `NumSubFarm`, `NumTree`, `AreaRai` ,`Weight` FROM `log-farm` 
                                                JOIN `dim-user` ON `log-farm`.`DIMownerID` = `dim-user`.`ID` 
                                                JOIN `dim-farm` ON `log-farm`.`DIMfarmID`=`dim-farm`.`ID`
                                                JOIN `log-harvest` ON `log-farm`.`DIMfarmID` = `log-harvest`.`DIMfarmID`
                                                ";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                ?>
                                                <td><?php echo $row["Alias"]; ?></td>
                                                <td><?php echo $row["Alias2"]; ?></td>
                                                <td><?php echo $row["NumSubFarm"]; ?></td>
                                                <td><?php echo $row["NumTree"]; ?></td>
                                                <td><?php echo $row["AreaRai"]; ?></td>
                                                <td><?php echo $row["Weight"]; ?></td>
                                        <?php
                                            }
                                        } else {
                                            echo "0 row";
                                        }
                                        $conn->close();
                                        ?>
                                        <td style="text-align:center;">
                                            <a href="OilPalmAreaVolDetail.php"><button type="button" id="btn_info" class="btn btn-info btn-sm"><i class="fas fa-bars"></i></button></a>
                                        </td>
                                    </tr>
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