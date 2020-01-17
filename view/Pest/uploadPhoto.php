<?php
session_start();
include_once("../../dbConnect.php");
$request = $_POST['photo'];

function getImg($img)
{
  if ($img != null) {
    $data = $img;
    $img_array = explode(';', $data);
    $img_array2 = explode(",", $img_array[1]);
    $dataI = base64_decode($img_array2[1]);
    return $dataI;
  } else return null;
}

switch ($request) {
  case 'insert':
    $p_date =  $_POST['p_date'];
    $p_farm =  $_POST['p_farm'];
    $p_subfarm =  $_POST['p_subfarm'];
    $p_rank =  $_POST['p_rank'];
    $p_pest =  $_POST['p_pest'];
    $p_note =  $_POST['p_note'];
    $t = time();

    $sql_DimDate = "SELECT ID FROM `dim-time` AS dt WHERE dt.Date = '$p_date'";
    $data1 = selectData($sql_DimDate);
    $dim_date = $data1[1]['ID'];

    $sql_DimFarm = "SELECT ID FROM `dim-farm` AS df WHERE df.dbID = '$p_farm' AND df.IsFarm = 1";
    $data2 = selectData($sql_DimFarm);
    $dim_farm = $data2[1]['ID'];

    $sql_DimSubFarm = "SELECT ID FROM `dim-farm` AS df WHERE df.dbID = '$p_subfarm' AND df.IsFarm = 0";
    $data3 = selectData($sql_DimSubFarm);
    $dim_subfarm = $data3[1]['ID'];

    $sql_DimOwner = "SELECT du.ID FROM `dim-user` AS du JOIN `db-farm` AS df ON df.UFID = du.dbID WHERE  df.FMID = $p_farm";
    $data4 = selectData($sql_DimOwner);
    $dim_owner = $data4[1]['ID'];

    $sql_DimPest = "SELECT ID FROM `dim-pest` AS dp WHERE dp.dbpestTID = $p_rank AND dp.dbpestLID = $p_pest";
    $data5 = selectData($sql_DimPest);
    $dim_pest = $data5[1]['ID'];

    $sql_Insert = "INSERT INTO `log-pestalarm`(`ID`, `isDelete`, `Modify`, `LOGloginID`, `DIMdateID`, `DIMownerID`, `DIMfarmID`, `DIMsubFID`, `DIMpestID`, `Note`, `PICs`) VALUES 
                                              (NULL,0,$t,74,$dim_date,$dim_owner,$dim_farm,$dim_subfarm,$dim_pest,'$p_note','')";
    $idCurrent = addinsertData($sql_Insert);
    $path = "../../picture/activities/pest/$idCurrent";
    $update = "UPDATE `log-pestalarm` SET `PICS` = '$path'  WHERE ID = $idCurrent";
    $x = updateData($update);

    $dataPic = explode('manu20', $_POST['pic']);
    $countNumpic = (sizeof($dataPic) - 1) / 2;

    if (!file_exists($path)) {
      mkdir($path, 777, true);
      echo "\n\n" . $path . "\n\n";
    }
    if ($countNumpic > 0) {
      for ($i = 0; $i < $countNumpic; $i++) {
        $pic = getImg($dataPic[$i]);
        file_put_contents($path . "/" . "$i" . "_" . time() . ".png", $pic);
      }
    }
}
