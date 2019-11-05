<?php
include("../../dbConnect.php");

$conn = connectDB();
//echo $_POST['addOilPalmAreaVol'];
if (isset($_POST['addOilPalmAreaVol'])) {
     echo "add";
     $tileName = $_POST['tilename'];
     $officeName = $_POST['tilename'];
     $style = $_POST['style'];
     $styleDanger = $_POST['styleDanger'];

     $sql = "INSERT INTO `db-pestlist` (`PID`, `Name`, `Alias`, `PTID`, `Charactor`, `lcon`, `NumPicChar`, `NumPicDanger`)
          VALUES ('','$tileName','$officeName','1','$style','png','0','0')";
     if ($conn->query($sql) == TRUE) {
          echo "<script>";
          echo "alert('New record created successfully');";
          echo "window.location.href='OilPalmAreaVol.php';";
          echo "</script>";
     } else {
          echo "ERROR" . $sql . "<BR>" . $con->error;
     }
}
