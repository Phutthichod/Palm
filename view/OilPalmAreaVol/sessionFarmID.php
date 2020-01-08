<?php 
require("../../set-log-login.php");

$farmID = $_POST['farmID'];

function getFarmID()
{
    $_SESSION[md5('farmID')] = $farmID;
}

?>