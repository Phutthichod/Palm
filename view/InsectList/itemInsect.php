<div class="col-xl-3 col-12 mb-4 item.card" id="itemInsectCard">
    <div id=<?php echo $row["PID"]; ?> class="card card-item border-left-primary card-color-one shadow h-100 py-2 item">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="text-align: center;">
                    <img src=<?php echo $src = "../../picture/Pest/insect/icon/" . $row["PID"] . "/" . $row["lcon"]; ?> width="100" height="100" alt="User" style="border-radius: 100px;">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 card-pest" id="changeInsect">
                    <h6>
                        <br>
                        <?php echo $row["Alias"]; ?>
                        </br>
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div>