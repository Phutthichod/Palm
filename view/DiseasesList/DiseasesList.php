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
                        <div class="row no-gutters align-items-center">
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

        <?php
        $sql = "SELECT * FROM `db-pestlist` WHERE `PTID` = 2 ";
        $myConDB = connectDB();
        $result = $myConDB->prepare($sql);
        $result->execute();
        ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold ">รายชื่อแมลง</h6>
            </div>



            <?php
            if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                ?>

                <div class="card-body" id="card-pest">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 " style="text-align: center;">
                            <div style="text-align: center;">
                                  <?php //$src = "picture/pest/insect/".$insectList[1]['PL_ID']."/logo/1.jpg"; ?>
                               <img src=<?php echo $src = "../../picture/Pest/insect/" . $row["lcon"]; ?> width="120" height="120" alt="User" style="border-radius: 100px;"> 
                                <!--<img src="../../picture/Pest/disease/01.jpg" width="120" height="120" alt="User" style="border-radius: 100px;"> -->
                                <br><br>
                            </div>
                            <h6>ชื่อ :

                                <?php echo $row["Alias"]; ?>
                                <!--โรคใบไหม้-->
                            </h6>
                            <h6>ชื่อทางการ :

                                <?php echo $row["Name"]; ?>
                                <!--Curvularia Seeding Blight-->
                            </h6>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <h6>ลักษณะทั่วไป</h6>

                            <?php echo $row["Charactor"]; ?>

                            <!--
                        เป็นโรคสำคัญ พบมากในช่วงระยะต้นกล้าปาล์ม และพบในระยะที่ลงแปลงปลูกในช่วง 1 ปีแรก
                        ไม่เหมาะกับการนำไปปลูก เพราะต้นกล้าเจริญเติบโตช้ากว่าปกติ หากอาการรุนแรงอาจจะทำให้ใบใหม่และต้นกล้าตายได้-->
                            <br>
                            <br>
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" id="silder">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="../../picture/Pest/disease/01.jpg" alt="First slide" style="height:200px;">
                                    </div>


                                    <!-- <div class="carousel-item">
                            <img class="d-block w-100" src="picture/default2.jpg" alt="Second slide" style="height:200px;">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="picture/default2.jpg" alt="Third slide" style="height:200px;">
                            </div> -->
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
                            <h6>อันตรายของโรคพืช</h6>

                            <?php echo $row["Danger"]; ?>
                            <!--
                            มักพบอาการบนใบอ่อน ซึ่งส่วนมากจะเป็นช่วงที่ใบเริ่มคลี่ โดยระยะแรกจะเกิดเป็นจุดเล็กๆ ลักษณะโปร่งใส ระยะต่อมาเมื่อแผลขยายเต็มที่จะมีสีน้ำตาลแดงขอบสีน้ำเงินเข้มมีวงแหวนสีเหลืองล้อมรอบ <br>
            -->
                            <br>
                            <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel" id="silder">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="../../picture/Pest/disease/01.jpg" alt="First slide" style="height:200px;">
                                    </div>
                                    <!-- <div class="carousel-item">
                                <img class="d-block w-100" src="picture/default2.jpg" alt="Second slide" style="height:200px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="picture/default2.jpg" alt="Third slide" style="height:200px;"> 
                            </div> -->
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
            <?php
            }
            ?>
        </div>

        <div>
            <div class="row">
                <!--
                <div class="col-xl-3 col-12 mb-4">
                    <div class="card border-left-primary card-color-one shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                    <img src="../../picture/Pest/disease/01.jpg" class="w-100" alt="User" style="border-radius: 100px;">

                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 card-pest">
                                    <h5> 
                                        
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                    -->


                <?php

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    ?>
                    <div class="col-xl-3 col-12 mb-4">
                        <div class="card border-left-primary card-color-one shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                                        <img src="../../picture/default2.jpg" class="w-100" alt="User" style="border-radius: 100px;">

                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 card-pest">
                                        <h5>
                                            <?php
                                                echo $row["Alias"];
                                                ?>
                                            <!--โรค1-->
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

        </div>


        <div class="Modal"></div>







    </div>



    <?php include_once("../layout/LayoutFooter.php"); ?>


    <script src="DiseasesList.js"></script>
    <script src="DiseasesListModal.js"></script>

    <script>


    </script>


</body>

</html>