<div class="body">
    <div class="card-body" id="card-pest-orther">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 " style="text-align: center;">
                <div style="text-align: center;">
                    <img src=<?php echo $src = "../../picture/Pest/other/icon/" . $row["PID"] . "/" . $row["lcon"]; ?> width="120" height="120" alt="User" style="border-radius: 100px;">
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
                <?php
                echo $row["Charactor"];
                ?>
                <br>
                <br>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" id="silder">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src=<?php echo $src = "../../picture/Pest/other/style/" . $row["PID"] . "/" . $row["lcon"]; ?> alt="First slide" style="height:200px;">
                        </div>
                        <!--
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../../picture/default2.jpg" alt="Second slide" style="height:200px;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../../picture/default2.jpg" alt="Third slide" style="height:200px;">
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
                <h6>อันตรายของศัตรูพืช</h6>
                <?php echo $row["Danger"]; ?>
                <br>
                <br>
                <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel" id="silder">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src=<?php echo $src = "../../picture/Pest/other/danger/" . $row["PID"] . "/" . $row["lcon"]; ?> alt="First slide" style="height:200px;">
                        </div>
                        <!--
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../../picture/default2.jpg" alt="Second slide" style="height:200px;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../../picture/default2.jpg" alt="Third slide" style="height:200px;">
                    </div>-->
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