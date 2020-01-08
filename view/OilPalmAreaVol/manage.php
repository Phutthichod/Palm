<?php
require_once("../../dbConnect.php");
connectDB();
session_start();
$idUT = $_SESSION[md5('LOG_LOGIN')];
?>

<?php 
// if (isset($_POST['manageButton'])) {
     $request = $_POST['request'];
     $sql = '';
     // echo $request;
     switch($request){
          case 'select':
               $sql = "SELECT * FROM `log-harvest` ";

               print_r(json_encode(select($sql)));
               break;
        
          case 'insert':
               $date =date_create( $_POST['date']);
               $modify = strtotime(date_format($date,'d F Y'));
               
               $DIMownerID=$idUT[1]['DIMuserID'];
               $LOGLoginID=$idUT[1]['ID'];

               $DIMdateID=$idUT[1]['StartID'];

               $fid=$_POST['AddFarmID'];
               $DIMSubfID=$_POST['SubFarmID'];

               $weight = $_POST['weight'];
               $UnitPrice = $_POST['UnitPrice'];
               $TotalPrice = $weight * $UnitPrice;

               $PIC = "pictures/activities/harvest/";

               $sql = "INSERT INTO `log-harvest`( `isDelete`, `GuessFrom`, `Modify`, `LOGloginID`, `DIMdateID`, `DIMownerID`, `DIMfarmID`, `DIMsubFID`, `Weight`, `UnitPrice`, `TotalPrice`, `PICs`) 
               VALUES (0,null,$modify,$LOGLoginID,$DIMdateID,$DIMownerID,$fid,$DIMSubfID,$weight,$UnitPrice,$TotalPrice,$PIC)";


               $result = addinsertData($sql);
               if ($result) {
                    header("location:OilPalmAreaVolDetail.php");
               } else {
                    echo "ERROR" . $sql . "<BR>" . $conn->error;
                    header("location:OilPalmAreaVolDetail.php");
               }
          break;

          case 'update':
               $fid =  $_POST['fid'];
               $sql ="UPDATE `log-harvest` SET `isDelete` = 1 WHERE ID = $fid";
               $text = updateData($sql);
               echo $text;
               header("location:OilPalmAreaVolDetail.php");
          break;

          case 'setFarmID':
               $_SESSION["farmID"] = $_POST['farmID'];
               header("location:OilPalmAreaVolDetail.php");
          break;

          case 'getYear':
               $idUTLOG = $_SESSION[md5('LOG_LOGIN')];
               $farmID = $_SESSION["farmID"];
               $DIMownerID = $idUTLOG[1]['DIMuserID'];
               $month = null;
               $num=0;
               $year = $_POST['year'];
                $sql = "SELECT *, `log-harvest`.`ID` as IDfarm FROM `log-harvest`JOIN `dim-farm` ON `log-harvest`.`DIMsubFID` = `dim-farm`.`ID` WHERE `DIMownerID` = $DIMownerID AND `isDelete`= 0 AND `log-harvest`.`DIMfarmID` = $farmID ";
                $myConDB = connectDB();
                 $result = $myConDB->prepare( $sql ); 
                 $result->execute(); 
                          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                              if((int)date('Y',$row["Modify"]) + 543==$year){
                                   $month["$num"]["ID"] = $row['IDfarm'];
                                   $month["$num"]["alias"] = $row['Alias'];
                                   $month["$num"]["modifyday"] = date('d',$row["Modify"]);
                                   $month["$num"]["modifymonth"] = date('n',$row["Modify"]);
                                   $month["$num"]["modifyyear"] = (date('Y',$row["Modify"])+543);
                                   $month["$num"]["weight"] = $row['Weight'];
                                   $month["$num"]["price"] = $row['UnitPrice'];
                                   $month["$num"]["totalprice"] = $row['TotalPrice'];
                                   $num++;
                              }
                          }
               echo json_encode($month);
          break;

     }
// }

   

?>