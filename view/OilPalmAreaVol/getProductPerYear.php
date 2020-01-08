<?php
session_start();
require('../../dbConnect.php');

$DIMownerID = $idUTLOG[1]['DIMuserID'];
$farmID = $_SESSION["farmID"];
$year = $_POST["dataF"];

?>

