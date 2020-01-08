<?php
include("../../dbConnect.php");
session_start();
$idUT = $_SESSION[md5('LOG_LOGIN')];
?>

<?php 
if (isset($_POST['manageButton'])) {
     $manage = $_POST['request'];

     switch($manage){
     
          case 'insert':
               $weight = $_POST['weight'];
               $UnitPrice = $_POST['UnitPrice'];
               $TotalPrice = $weight * $UnitPrice;
               $date =date_create( $_POST['date']);
               $modify = strtotime(date_format($date,'d F Y'));
               $DIMownerID=$idUT[1]['DIMuserID'];
               $LOGLoginID=$idUT[1]['ID'];
               $DIMdateID=$idUT[1]['StartID'];
               $DIMFarmID=$_POST['AddFarmID'];
               $DIMSubfID=$_POST['SubFarmID'];
               $PIC= '"text"';
               $sql = "INSERT INTO `log-harvest`( `isDelete`, `GuessFrom`, `Modify`, `LOGloginID`, `DIMdateID`, `DIMownerID`, `DIMfarmID`, `DIMsubFID`, `Weight`, `UnitPrice`, `TotalPrice`, `PICs`) 
               VALUES (0,null,$modify,$LOGLoginID,$DIMdateID,$DIMownerID,$DIMFarmID,$DIMSubfID,$weight,$UnitPrice,$TotalPrice,$PIC)";

               $result = addinsertData($sql);
               if ($result) {
                    header("location:OilPalmAreaVol.php");
               } else {
                    echo "ERROR" . $sql . "<BR>" . $conn->error;
                    header("location:OilPalmAreaVol.php");
               }
          break;

          case 'delete':
               $fid =  $_POST['fid'];
               $sql ="UPDATE `log-harvest` SET `isDelete` = 1 WHERE ID = $fid";
               $text = updateData($sql);
               header("location:OilPalmAreaVol.php");
          break;
     }
}
?>
