<?php
session_start();

$idUT = $_SESSION[md5('typeid')];
$CurrentMenu = "FarmerList";
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
                                <span class="link-active">รายละเอียดเกษตรกร</span>
                                <span style="float:right;">
                                    <i class="fas fa-bookmark"></i>
                                    <a class="link-path" href="#">หน้าแรก</a>
                                    <span> > </span>
                                    <a class="link-path" href="#">รายชื่อเกษตรกร</a>
                                    <span> > </span>
                                    <a class="link-path link-active" href="#">รายละเอียดเกษตรกร</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $sql = "SELECT UFID, COUNT(CASE WHEN `UFID` IN (`UFID`) THEN 1 END) f FROM `db-farmer` WHERE `UFID` = '1' GROUP BY `UFID`";
        $result = $conn->query($sql);
        ?>

        <div class="row">
            <div class="col-xl-3 col-12 mb-4">
                <div class="card border-left-primary card-color-one shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold  text-uppercase mb-1">จำนวนสวน</div>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['f']; ?> สวน</div>
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
        $sql = "SELECT UFID, COUNT(CASE WHEN `UFID` IN (`UFID`) THEN 1 END) sf 
        FROM `db-farm` LEFT JOIN `db-subfarm` ON `db-farm`.`FMID` = `db-subfarm`.`FMID` WHERE `UFID` = '1' GROUP BY UFID ";
        $result = $conn->query($sql);
        ?>


            <div class="col-xl-3 col-12 mb-4">
                <div class="card border-left-primary card-color-two shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold  text-uppercase mb-1">จำนวนแปลง</div>
                                <?php
                                while($row = $result-> fetch_assoc()){
                                    ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row["sf"] ?> แปลง</div>
                                <?php } ?>
                            </div>
                            <div class="col-auto">
                                <i class="material-icons icon-big">waves</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $sql = "SELECT UFID, SUM(CASE WHEN `UFID` IN (`UFID`) THEN `AreaRai` END) A 
            FROM `db-farm` LEFT JOIN `db-subfarm` ON `db-farm`.`FMID` = `db-subfarm`.`FMID` 
            WHERE `UFID` = '1' GROUP BY UFID ";
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
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row["A"]; ?> ไร่</div>
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
            $sql = "SELECT UFID, COUNT(CASE WHEN `UFID` IN (`UFID`) THEN 1 END) t FROM `db-coorfarm` 
            LEFT JOIN `db-subfarm` ON `db-coorfarm`.`FSID` = `db-subfarm`.`FSID` 
            LEFT JOIN `db-farm` ON `db-subfarm`.`FMID`= `db-farm`.`FMID` WHERE `UFID` = '1'
            GROUP BY UFID ";
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
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row["t"]; ?> ต้น</div>
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
            <div class="col-xl-6 col-12 mb-4">
                <div class="row">
                    <div class="col-xl-12 col-12">
                        <div class="card">
                            <div class="card-header card-bg">โปรไฟล์</div>

                            <?php
                            $sql = "SELECT * , CASE WHEN `Title` IN ('1') THEN 'นาย'
                                    WHEN `Title` IN ('2') THEN 'นาง' 
                                    WHEN `Title` IN ('3') THEN 'นางสาว' END AS Title                          
                                    FROM `db-farmer` JOIN `db-subdistrinct` ON `db-subdistrinct`.`AD3ID` = `db-farmer`.`AD3ID` 
                                    JOIN `db-distrinct` ON `db-distrinct`.`AD2ID` = `db-subdistrinct`.`AD2ID`
                                    JOIN `db-province` ON `db-province`.`AD1ID` = `db-distrinct`.`AD1ID` WHERE `UFID` ='1' ";
                            $result = $conn->query($sql);
                            ?>

                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <div class="card-body" id="forMap">
                                        <div class="row">
                                            <img class="img-radius" src="../../picture/default.jpg" />
                                        </div>

                                        <div class="row mb-4 mt-3">
                                            <div class="col-xl-3 col-12 text-right">
                                                <span>คำนำหน้า</span>
                                            </div>
                                            <div class="col-xl-9 col-12">
                                                <input type="text" class="form-control" id="rank" value="<?php echo $row['Title'] ?>" disabled>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-xl-3 col-12 text-right">
                                                <span>ชื่อ</span>
                                            </div>
                                            <div class="col-xl-9 col-12">

                                                <input type="text" class="form-control" id="firstname" value="<?php echo $row["FirstName"] ?>" disabled>

                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-xl-3 col-12 text-right">
                                                <span>นามสกุล</span>
                                            </div>
                                            <div class="col-xl-9 col-12">
                                                <input type="text" class="form-control" id="lastname" value="<?php echo $row["LastName"] ?>" disabled>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-xl-3 col-12 text-right">
                                                <span>ที่อยู่</span>
                                            </div>
                                            <div class="col-xl-9 col-12">
                                                <input type="text" class="form-control" id="address" value="<?php echo $row["Address"] ?>" disabled>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-xl-3 col-12 text-right">
                                                <span>ตำบล</span>
                                            </div>
                                            <div class="col-xl-9 col-12">
                                                <input type="text" class="form-control" id="subdistrict" value="<?php echo $row["subDistrinct"] ?>" disabled>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-xl-3 col-12 text-right">
                                                <span>อำเภอ</span>
                                            </div>
                                            <div class="col-xl-9 col-12">
                                                <input type="text" class="form-control" id="district" value="<?php echo $row["Distrinct"] ?>" disabled>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-xl-3 col-12 text-right">
                                                <span>จังหวัด</span>
                                            </div>
                                            <div class="col-xl-9 col-12">
                                                <input type="text" class="form-control" id="province" value="<?php echo $row["Province"] ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "0 row";
                            }
                            //$conn->close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-12 mb-4">
                <div class="card">
                    <div class="card-header card-bg">
                        ตำแหน่งสวนปาล์ม
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12 col-12 mb-2">
                                <div id="map_area" style="width:auto; height:200px;"></div>
                            </div>
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
        $("#map_area").css('height', $("#forMap").css('height'));

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