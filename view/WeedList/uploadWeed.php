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
    // Count style images files
    $countfiles_style = count($_FILES['picstyle_insert']['name']);
    for ($index_style = 0; $index_style < $countfiles_style; $index_style++) {
      $file_style = $_FILES['picstyle_insert']['name'][$index_style];
      $type_style = explode(".", "$file_style");
      $tmp_style = end($type_style);
      $stylechar = "$t.$tmp_style";
    }

    // pic-danger
    // Count danger images files
    $countfiles_danger = count($_FILES['picdan_insert']['name']);
    for ($index_danger = 0; $index_danger < $countfiles_danger; $index_danger++) {
      $file_danger = $_FILES['picdan_insert']['name'][$index_danger];
      $type_danger = explode(".", "$file_danger");
      $tmp_danger = end($type_danger);
      $dangerous = "$t.$tmp_danger";
    }


    $sql = "INSERT INTO `db-pestlist` (`PID`, `Name`, `Alias`, `PTID`, `Charactor`, `Danger`, `lcon` , `NumPicChar`, `NumPicDanger`)
          VALUES ('','$Alias','$Name','3','$Charactor','$Danger','$Icon','$countfiles_style','$countfiles_danger')";

    $insertData = addinsertData($sql);
    $sql = "SELECT `PID` FROM `db-pestlist` ORDER BY `PID` DESC LIMIT 1";
    $id = selectDataOne($sql)['PID'];

    $path = "../../picture/Pest/weed/icon/$id";
    if (!file_exists($path)) {
      mkdir("../../picture/Pest/weed/icon/$id");
      mkdir("../../picture/Pest/weed/style/$id");
      mkdir("../../picture/Pest/weed/danger/$id");
    }

    if (move_uploaded_file($_FILES["icon_insert"]["tmp_name"], "../../picture/Pest/weed/icon/$id/$Icon")) {
    }
    for ($index_style = 0; $index_style < $countfiles_style; $index_style++) {
      if (move_uploaded_file($_FILES["picstyle_insert"]["tmp_name"][$index_style], "../../picture/Pest/weed/style/$id/$stylechar")) {
      }
      $stylechar = $index_style . "_" . $t . "." . $tmp_style;
    }
    for ($index_danger = 0; $index_danger < $countfiles_danger; $index_danger++) {
      if (move_uploaded_file($_FILES["picdan_insert"]["tmp_name"][$index_danger], "../../picture/Pest/weed/danger/$id/$dangerous")) {
      }
      $dangerous = $index_danger . "_" . $t . "." . $tmp_danger;
    }

    header("location:WeedList.php");
    break;
}
