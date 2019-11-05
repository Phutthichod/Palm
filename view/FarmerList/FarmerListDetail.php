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
        <div class="row">
            <div class="col-xl-3 col-12 mb-4">
                <div class="card border-left-primary card-color-one shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold  text-uppercase mb-1">จำนวนสวน</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">3 สวน</div>
                            </div>
                            <div class="col-auto">
                                <i class="material-icons icon-big">group</i>
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
                                <div class="font-weight-bold  text-uppercase mb-1">จำนวนแปลง</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">20 แปลง</div>
                            </div>
                            <div class="col-auto">
                                <i class="material-icons icon-big">waves</i>
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
                                <div class="font-weight-bold  text-uppercase mb-1">จำนวนต้นไม้</div>
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
            <div class="col-xl-6 col-12 mb-4">
                <div class="row">
                    <div class="col-xl-12 col-12">
                        <div class="card">
                            <div class="card-header card-bg">
                                โปรไฟล์
                            </div>
                            <?php
                            $sql = "SELECT * FROM `db-emailtype` JOIN `db-user` ON `db-emailtype`.`ETID` = `db-user`.`UFID`";
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
                                                <input type="text" class="form-control" id="rank" value="นาย">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-xl-3 col-12 text-right">
                                                <span>ชื่อ</span>
                                            </div>
                                            <div class="col-xl-9 col-12">

                                                <input type="text" class="form-control" id="firstname" value="<?php echo $row["FirstName"]; ?>">

                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-xl-3 col-12 text-right">
                                                <span>นามสกุล</span>
                                            </div>
                                            <div class="col-xl-9 col-12">
                                                <input type="text" class="form-control" id="lastname" value="<?php echo $row["LastName"]; ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-xl-3 col-12 text-right">
                                                <span>อีเมล์</span>
                                            </div>
                                            <div class="col-xl-9 col-12">
                                                <input type="text" class="form-control" id="mail" value="<?php echo $row["EMAIL"] . "@" . $row["Type"]  ?>">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-xl-3 col-12 text-right">
                                                <span>เบอร์โทรศัพท์</span>
                                            </div>
                                            <div class="col-xl-9 col-12">
                                                <input type="text" class="form-control" id="mail" value="0866221212">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-xl-3 col-12 text-right">
                                                <span>ชื่อบัญชี</span>
                                            </div>
                                            <div class="col-xl-9 col-12">
                                                <input type="text" class="form-control" id="username" value="<?php echo $row["UserName"]; ?>">
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