<head>
    <link rel="stylesheet" href="read-more.css">
</head>

<?php
require('../../dbConnect.php');
$id = $_POST['id'];
$sql = "SELECT * FROM `db-pestlist` WHERE `PID` = $id";
$myConDB = connectDB();
$result = $myConDB->prepare($sql);
$result->execute();

?>

<?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 " style="text-align: center;">
            <div style="text-align: center;">
                <img src=<?php echo $src = "../../picture/Pest/insect/icon/" . $row["PID"] . "/" . $row["lcon"]; ?> width="120" height="120" alt="User" style="border-radius: 100px;">
                <br><br>
            </div>
            <h6>ชื่อ : <?php echo $row["Alias"]; ?> </h6>
            <h6>ชื่อทางการ : <?php echo $row["Name"]; ?> </h6>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <h6>ลักษณะทั่วไป</h6>
            <span class="more">
                <?php echo $row["Charactor"]; ?>
                <?php
                                /*
                $string = strip_tags($row["Charactor"]);
                if (strlen($string) > 500) {

                    // truncate string
                    $stringCut = substr($string, 0, 500);
                    $endPoint = strrpos($stringCut, ' ');

                    //if the string doesn't contain any space then it will cut without word basis.
                    $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                    $string .= '...  <a href="#" class="show_hide" data-content="toggle-text">Read More</a>';
                }
                echo $string;
                */
                ?>
            </span>
            <br>
            <br>
            <br>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" id="silder">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src=<?php echo  $src = "../../picture/Pest/insect/style/" . $row["PID"] . "/" . $row["lcon"]; ?> style="height:200px;">

                    </div>
                    <?php for ($style_index = 0; $style_index < $row["NumPicDanger"] - 2; $style_index++) { ?>
                        <div class="carousel-item">
                            <img class="d-block w-100" src=<?php echo  $src = "../../picture/Pest/insect/style/" . $row["PID"] . "/" . $style_index . "_" . $row["lcon"]; ?> style="height:200px;">
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
            <h6>อันตรายของแมลง</h6>
            <span class="more">
                <?php echo $row["Danger"]; ?>
            </span>
            <br>
            <br>
            <br>
            <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel" id="silder">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src=<?php echo  $src = "../../picture/Pest/insect/danger/" . $row["PID"] . "/" . $row["lcon"]; ?> style="height:200px;">

                    </div>
                    <?php for ($danger_index = 0; $danger_index < $row["NumPicDanger"] - 1; $danger_index++) { ?>
                        <div class="carousel-item">
                            <img class="d-block w-100" src=<?php echo  $src = "../../picture/Pest/insect/danger/" . $row["PID"] . "/" . $danger_index . "_" . $row["lcon"]; ?> style="height:200px;">
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
<?php } ?>

<script>
    $(document).ready(function() {
        // Configure/customize these variables.
        var showChar = 100; // How many characters are shown by default
        var ellipsestext = "...";
        var moretext = "Show more";
        var lesstext = "Show less";

        $('.more').each(function() {
            var content = $(this).html();

            if (content.length > showChar) {

                var c = content.substr(0, showChar);
                var h = content.substr(showChar, content.length - showChar);

                var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h +
                    '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

                $(this).html(html);
            }

        });

        $(".morelink").click(function() {
            if ($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;

        });
    });
</script>