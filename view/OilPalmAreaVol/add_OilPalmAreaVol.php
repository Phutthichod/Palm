<?php
//include("../../dbConnect.php");
session_start();
$idUT = $_SESSION[md5('typeid')];

include_once("connect_db.php");

echo $_POST['addOilPalmAreaVol'];
if (isset($_POST['addOilPalmAreaVol'])) {

     $weight = $_POST['weight'];
     $UnitPrice = $_POST['UnitPrice'];
     $TotalPrice = $weight*$UnitPrice;
     $date = time($_POST['date']);
     $name = $_POST['name'];
     $LOGloginID = $_POST['$idUT'];
     $style=$_POST['style'];
     echo $TotalPrice;

     $sql = "INSERT INTO `log-harvest`( `isDelete`, `GuessFrom`, `Modify`, `LOGloginID`, `DIMdateID`, `DIMownerID`, `DIMfarmID`, `DIMsubFID`, `Weight`, `UnitPrice`, `TotalPrice`, `PICs`) 
     VALUES (0,null,$date,[value-5],[value-6],[value-7],[value-8],[value-9],$weight,$UnitPrice,$TotalPrice,null)";
     
     mysql_query($sql);
     if ($conn->query($sql) == TRUE) {
          echo "<script>";
          echo "alert('New record created successfully');";
          echo "window.location.href='OilPalmAreaVol.php';";
          echo "</script>";
     } else {
          echo "ERROR" . $sql . "<BR>" . $con->error;
     }
}
