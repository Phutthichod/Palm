<div class="col-xl-3 col-12 mb-4 item.card" id="itemWeedCard">
    <div id=<?php echo $row["PID"]; ?> class="card border-left-primary card-color-one shadow h-100 py-2 item">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <img src=<?php echo $src = "../../picture/Pest/weed/icon/" . $row["PID"] . "/" . $row["lcon"]; ?> class="w-100" alt="User" style="border-radius: 100px;">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 card-pest-weed" id="changeWeed">
                    <h6>
                        <?php
                        echo $row["Alias"];
                        ?>
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div>