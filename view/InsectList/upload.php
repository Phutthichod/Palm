<?php
session_start();
require "../../dbConnect.php";
$request = $_POST['request'];

switch ($request) {
  case 'insert':
    $Name =  $_POST['name_insert'];
    $Alias = $_POST['alias_insert'];
    $Charactor = $_POST['charactor_insert'];
    $Danger = $_POST['danger_insert'];

    $t = time();

    // pic-icon
    $file = $_FILES['icon_insert']['name'];
    $type = explode(".", "$file");
    $tmp = end($type);
    $Icon = "$t.$tmp";

    // pic-style
    $file_style = $_FILES['picstyle_insert']['name'];
    $type_style = explode(".", "$file_style");
    $tmp_style = end($type_style);
    $stylechar = "$t.$tmp_style";

    // pic-danger
    $file_danger = $_FILES['picdan_insert']['name'];
    $type_danger = explode(".", "$file_danger");
    $tmp_danger = end($type_danger);
    $dangerous = "$t.$tmp_danger";

    $sql = "INSERT INTO `db-pestlist` (`PID`, `Name`, `Alias`, `PTID`, `Charactor`, `Danger`, `lcon` , `NumPicChar`, `NumPicDanger`)
          VALUES ('','$Alias','$Name','1','$Charactor','$Danger','$Icon','1','1')";

    $insertData = addinsertData($sql);
    $sql = "SELECT `PID` FROM `db-pestlist` ORDER BY `PID` DESC LIMIT 1";
    $id = selectDataOne($sql)['PID'];

    $path = "../../picture/Pest/insect/icon/$id";
    if (!file_exists($path)) {
      mkdir("../../picture/Pest/insect/icon/$id");
      mkdir("../../picture/Pest/insect/style/$id");
      mkdir("../../picture/Pest/insect/danger/$id");
    }

    if (move_uploaded_file($_FILES["icon_insert"]["tmp_name"], "../../picture/Pest/insect/icon/$id/$Icon")) { }
    if (move_uploaded_file($_FILES["picstyle_insert"]["tmp_name"], "../../picture/Pest/insect/style/$id/$stylechar")) { }
    if (move_uploaded_file($_FILES["picdan_insert"]["tmp_name"], "../../picture/Pest/insect/danger/$id/$stylechar")) { }

    header("location:InsectList.php");

    break;
}