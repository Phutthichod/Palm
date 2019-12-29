<?php
session_start();

$idUT = $_SESSION[md5('typeid')];
$CurrentMenu = "WeedList";
?>

<?php include_once("../layout/LayoutHeader.php"); ?>

<head>
    <link rel="stylesheet" href="read-more.css">
</head>

<style>
    #serach {
        background-color: #E91E63;
        color: white;
        float: right;
    }

    #card-detail {
        border-color: #E91E63;
        border-top: none;
    }

    /* #carousel-item {
        width : 200px ;
        height : "120";
    } */
    .carouselExampleControls img {
        height: 200px;
    }
</style>

<body>
    <?php include_once("../../dbConnect.php"); ?>

    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-12 mb-4">
                <div class="card">
                    <div class="card-header card-bg">
                        <div class="row">
                            <div class="col-12">
                                <span class="link-active">รายชื่อวัชพืช</span>
                                <span style="float:right;">
                                    <i class="fas fa-bookmark"></i>
                                    <a class="link-path" href="#">หน้าแรก</a>
                                    <span> > </span>
                                    <a class="link-path link-active" href="#">รายชื่อวัชพืช</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <?php
            $sql = "SELECT COUNT(`PTID`) c FROM `db-pestlist` WHERE `PTID` = 3";
            $myConDB = connectDB();
            $result = $myConDB->prepare($sql);
            $result->execute();
            ?>

            <div class="col-xl-3 col-12 mb-4">
                <div class="card border-left-primary card-color-one shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold  text-uppercase mb-1">จำนวนชนิดวัชพืช</div>
                                <?php
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row['c']; ?> ชนิด</div>

                                <?php
                                }
                                ?>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bug fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-12 mb-4">
                <div class="card border-left-primary card-color-four shadow h-100 py-2" id="addWeed" style="cursor:pointer;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center" role="button" id="addWeed" data-toggle="modal" data-target="#insert" aria-haspopup="true" aria-expanded="false">

                            <div class="col mr-2">
                                <div class="font-weight-bold  text-uppercase mb-1">เพิ่มชนิดวัชพืช</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">+1 ชนิด</div>
                            </div>
                            <div class="col-auto">
                                <!-- <i class="material-icons icon-big">add_location</i> -->
                                <i class="fas fa-plus-square fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold ">รายวัชพืช</h6>
            </div>

            <?php
            $sql = "SELECT * FROM `db-pestlist` WHERE `PTID` = 3 ";
            $myConDB = connectDB();
            $result = $myConDB->prepare($sql);
            $result->execute();
            ?>

            <?php
            if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div class="body">
                    <div class="card-body" id="card-pest-weed">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 " style="text-align: center;">
                                <div style="text-align: center;">
                                    <img src=<?php echo $src = "../../picture/Pest/weed/icon/" . $row["PID"] . "/" . $row["lcon"]; ?> width="120" height="120" alt="User" style="border-radius: 100px;">
                                    <br><br>
                                </div>
                                <h6>ชื่อ :
                                    <?php echo $row["Alias"]; ?>
                                </h6>
                                <h6>ชื่อทางการ :
                                    <?php echo $row["Name"]; ?>
                                </h6>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <h6>ลักษณะทั่วไป</h6>
                                <span class="more">
                                    <?php echo $row["Charactor"]; ?>
                                </span>
                                <br>
                                <br>
                                <br>
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" id="silder">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src=<?php echo  $src = "../../picture/Pest/weed/style/" . $row["PID"] . "/" . $row["lcon"]; ?> style="height:200px;">

                                        </div>
                                        <?php for ($style_index = 0; $style_index < $row["NumPicDanger"] - 1; $style_index++) { ?>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src=<?php echo  $src = "../../picture/Pest/weed/style/" . $row["PID"] . "/" . $style_index . "_" . $row["lcon"]; ?> style="height:200px;">
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <h6>อันตรายของวัชพืช</h6>
                                <span class="more">
                                    <?php echo $row["Danger"]; ?>
                                </span>
                                <br>
                                <br>
                                <br>
                                <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel" id="silder">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src=<?php echo  $src = "../../picture/Pest/weed/danger/" . $row["PID"] . "/" . $row["lcon"]; ?> style="height:200px;">

                                        </div>
                                        <?php for ($danger_index = 0; $danger_index < $row["NumPicDanger"] - 1; $danger_index++) { ?>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src=<?php echo  $src = "../../picture/Pest/weed/danger/" . $row["PID"] . "/" . $danger_index . "_" . $row["lcon"]; ?> style="height:200px;">
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php //require("bodyWeed.php"); 
                ?>
            <?php
            }
            ?>
        </div>

        <div>
            <div class="row">
                <?php
                $sql = "SELECT * FROM `db-pestlist` WHERE `PTID` = 3 ";
                $myConDB = connectDB();
                $result = $myConDB->prepare($sql);
                $result->execute();
                ?>

                <?php
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <?php require("itemWeed.php"); ?>
                <?php
                }
                ?>
            </div>

        </div>
        <div class="Modal"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <?php include_once("../layout/LayoutFooter.php"); ?>

    <?php require("modalInsert.php"); ?>

    <script src="WeedList.js"></script>
    <!--<script src="WeedListModal.js"></script>-->
</body>

</html>