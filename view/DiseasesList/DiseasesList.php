<?php

session_start();

$idUT = $_SESSION[md5('typeid')];
$CurrentMenu = "DiseasesList";

?>

<?php include_once("../layout/LayoutHeader.php"); ?>

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
</style>


<body>
    <?php include_once("../../dbConnect.php");  ?>

    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-12 mb-4">
                <div class="card">
                    <div class="card-header card-bg">
                        <div class="row">
                            <div class="col-12">
                                <span class="link-active">รายชื่อโรคพืช</span>
                                <span style="float:right;">
                                    <i class="fas fa-bookmark"></i>
                                    <a class="link-path" href="#">หน้าแรก</a>
                                    <span> > </span>
                                    <a class="link-path link-active" href="#">รายชื่อโรคพืช</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <?php
            $sql = "SELECT COUNT(`PTID`) c FROM `db-pestlist` WHERE `PTID` = 2";
            $myConDB = connectDB();
            $result = $myConDB->prepare($sql);
            $result->execute();
            ?>

            <div class="col-xl-3 col-12 mb-4">
                <div class="card border-left-primary card-color-one shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold  text-uppercase mb-1">จำนวนชนิดโรคพืช</div>
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
                <div class="card border-left-primary card-color-four shadow h-100 py-2" id="addDiseases" style="cursor:pointer;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center" role="button" id="addDiseases" data-toggle="modal" data-target="#insert" aria-haspopup="true" aria-expanded="false">
                            <div class="col mr-2">
                                <div class="font-weight-bold  text-uppercase mb-1">เพิ่มชนิดโรคพืช</div>
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
                <h6 class="m-0 font-weight-bold ">รายชื่อแมลง</h6>
            </div>
            <?php
            $sql = "SELECT * FROM `db-pestlist` WHERE `PTID` = 2 ";
            $myConDB = connectDB();
            $result = $myConDB->prepare($sql);
            $result->execute();
            ?>
            <?php
            if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <?php require("bodyDiseases.php"); ?>
            <?php
            }
            ?>
        </div>

        <div>
            <div class="row">
                <?php
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <?php require("itemDiseases.php"); ?>

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

    <script src="DiseasesList.js"></script>
    <!--<script src="DiseasesListModal.js"></script>-->

    <script>


    </script>


</body>

</html>