<?php
session_start();

$idUT = $_SESSION[md5('typeid')];
$CurrentMenu = "FarmerList";
?>


<?php include_once("../layout/LayoutHeader.php"); ?>

<body>
    <?php include_once("connect_db.php"); ?>
    <div class="container">
        <div class="row mb-4">
            <div class="col-xl-12 col-12">
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
            <?php
            $sql = "SELECT COUNT(`UFID`) c FROM `db-farmer`";
            $result = $conn->query($sql);
            ?>

            <div class="col-xl-3 col-12 mb-4">
                <div class="card border-left-primary card-color-one shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold  text-uppercase mb-1">เกษตรกร (มีสวน)</div>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['c']; ?> คน</div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col-auto">
                                <i class="material-icons icon-big">group</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $sql = "SELECT COUNT(`FSID`) AS sf FROM `db-subfarm`";
            $sql1 = "SELECT COUNT(`FMID`) AS f FROM `db-farm`";
            $result = $conn->query($sql);
            $result1 = $conn->query($sql1);
            ?>

            <div class="col-xl-3 col-12 mb-4">
                <div class="card border-left-primary card-color-two shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold  text-uppercase mb-1">จำนวนสวน/แปลง</div>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                    $row1 = $result1->fetch_assoc()
                                    ?>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row1['f']; ?> สวน /
                                        <?php echo $row['sf']; ?> แปลง </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col-auto">
                                <i class="material-icons icon-big">waves</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $sql = "SELECT SUM(`AreaRai`) AS r FROM `db-subfarm`";
            $result = $conn->query($sql);
            ?>

            <div class="col-xl-3 col-12 mb-4">
                <div class="card border-left-primary card-color-three shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold  text-uppercase mb-1">พื้นที่ทั้งหมด</div>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['r']; ?> ไร่</div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col-auto">
                                <i class="material-icons icon-big">dashboard</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $sql = "SELECT COUNT(`FCID`) AS t FROM `db-coorfarm`";
            $result = $conn->query($sql);
            ?>

            <div class="col-xl-3 col-12 mb-4">
                <div class="card border-left-primary card-color-four shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold  text-uppercase mb-1">จำนวนต้นไม้</div>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['t']; ?> ต้น</div>
                                <?php
                                }
                                ?>
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
            <div class="col-xl-12 col-12 mb-2">
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
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
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
                        <div class="row mb-4">
                            <div class="col-xl-4 col-12 text-right">
                                <span>อำเภอ</span>
                            </div>
                            <div class="col-xl-6 col-12">
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

        <div class="row mt-4">
            <div class="col-xl-12 col-12">
                <div class="card">
                    <div class="card-header card-bg">
                        รายชื่อเกษตรกรในระบบ (มีสวน)
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
                                        <th>ชื่อ-นามสกุล</th>
                                        <th>จังหวัด</th>
                                        <th>อำเภอ</th>
                                        <th>จำนวนสวน</th>
                                        <th>จำนวนแปลง</th>
                                        <th>พื้นที่ปลูก</th>
                                        <th>จำนวนต้น</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ชื่อ-นามสกุล</th>
                                        <th>จังหวัด</th>
                                        <th>อำเภอ</th>
                                        <th>จำนวนสวน</th>
                                        <th>จำนวนแปลง</th>
                                        <th>พื้นที่ปลูก</th>
                                        <th>จำนวนต้น</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </tfoot>
                                <?php
                                //INFO
                                $sql = "SELECT `FirstName`,`LastName`,`Distrinct`,`Province` FROM `db-farmer` 
                                        JOIN `db-subdistrinct` ON `db-subdistrinct`.`AD3ID` = `db-farmer`.`AD3ID` 
                                        JOIN `db-distrinct` ON `db-distrinct`.`AD2ID` = `db-subdistrinct`.`AD2ID`
                                        JOIN `db-province` ON `db-province`.`AD1ID` = `db-distrinct`.`AD1ID`";
                                $result = $conn->query($sql);
                                //COUNT FARM
                                $sql1 = "SELECT UFID, COUNT(CASE WHEN `UFID` IN (`UFID`) THEN 1 END) f FROM `db-farmer` GROUP BY `UFID`";
                                $result1 = $conn->query($sql1);
                                //COUNT subFARM
                                $sql2 = "SELECT UFID, COUNT(CASE WHEN `UFID` IN (`UFID`) THEN 1 END) sf 
                                FROM `db-farm` LEFT JOIN `db-subfarm` ON `db-farm`.`FMID` = `db-subfarm`.`FMID` GROUP BY UFID ";
                                $result2 = $conn->query($sql2);
                                //COUNT TREE
                                $sql3 = "SELECT UFID, COUNT(CASE WHEN `UFID` IN (`UFID`) THEN 1 END) t 
                                FROM `db-farm` LEFT JOIN `db-subfarm` ON `db-farm`.`FMID` = `db-subfarm`.`FMID` 
                                LEFT JOIN `db-coorfarm` ON `db-subfarm`.`FSID` = `db-coorfarm`.`FSID` WHERE `FCID`
                                GROUP BY UFID ";
                                $result3 = $conn->query($sql3);
                                //COUNT AREA
                                $sql4 = "SELECT UFID, SUM(CASE WHEN `UFID` IN (`UFID`) THEN `AreaRai` END) A 
                                FROM `db-farm` LEFT JOIN `db-subfarm` ON `db-farm`.`FMID` = `db-subfarm`.`FMID` 
                                GROUP BY UFID ";
                                $result4 = $conn->query($sql4);
                                ?>

                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row["FirstName"] . " " . $row["LastName"]; ?></td>
                                                <td><?php echo $row["Province"] ?></td>
                                                <td><?php echo $row["Distrinct"] ?></td>
                                                <?php $row1 = $result1->fetch_assoc() ?>
                                                <td><?php echo $row1["f"] ?></td>
                                                <?php $row2 = $result2->fetch_assoc() ?>
                                                <td><?php echo $row2["sf"] ?></td>
                                                <?php $row4 = $result4->fetch_assoc() ?>
                                                <td><?php echo $row4["A"] ?></td>
                                                <?php $row3 = $result3->fetch_assoc() ?>
                                                <td><?php echo $row3["t"] ?></td>
                                                <td style="text-align:center;">
                                                    <a href="FarmerListDetail.php"><?php $_SESSION[md5('value')] = "UFID"; ?><button type="button" id="btn_info" class="btn btn-info btn-sm">
                                                    <i class="fas fa-bars"></i></button></a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "0 row";
                                    }
                                    $conn->close();
                                    ?>

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
    <script src="FarmerList.js"></script>
    <script src="FarmerListModal.js"></script>

    <script>
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