<?php 
    session_start();
    $idUT = $_SESSION[md5('typeid')];
    $CurrentMenu = "FertilizerList";
?>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<?php include_once("../layout/LayoutHeader.php"); ?>

<?php require("headF.php"); ?>
       
<?php require("bodyF.php"); ?>

<?php require("modalInsert.php"); ?>

<?php require("modalUpdate.php"); ?>


<?php include_once("../layout/LayoutFooter.php"); ?>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="chart.js"></script>
<script src="edit_Fertilizer.js"></script>


