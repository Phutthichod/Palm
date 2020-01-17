<?php

include('connect_db.php');

$event = array();

$sql = "SELECT `log-activity`.`ID` , `dim-time`.`Date`, `dim-farm`.`Name`,`db-activity`.`Activity`,`log-activity`.`Note` FROM `log-activity` 
JOIN `dim-time` ON `log-activity`.`DIMdateID` = `dim-time`.`ID`
JOIN `dim-farm` ON `log-activity`.`DIMfarmID` = `dim-farm`.`ID`
JOIN `db-activity` ON `log-activity`.`DBactID` = `db-activity`.`ID`
WHERE `log-activity`.`isDelete` = 0";

$result = $conn->query($sql);
$i = 0;
while ($row = $result->fetch_assoc()) 
{
    $event[$i]['id'] = $row['ID'];
    $event[$i]['title'] = $row['Activity'];
    $event[$i]['start'] = $row['Date'];
    $event[$i]['end'] = $row['Date'];
    $event[$i]['description'] = $row['Note'];

    $i++;
}
$result->free();

echo json_encode($event);
