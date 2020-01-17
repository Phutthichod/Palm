<?php
include('../../dbConnect.php');
connectDB();
$sql = "
    SELECT DISTINCT `db-user`.`FirstName` as `firstName`,`db-user`.`LastName` as `lastName`, `db-farm`.`Name` as `farmName`,`db-subfarm`.`Name` as `subfarmName`,`dim-address`.`FullAddress` as `address`,`db-activity`.`Activity` as `activity`,`db-activity`.`Note` as `activityDescription`,`dim-time`.`Date` as `date`
    FROM `log-farm` join `dim-farm` on `log-farm`.`DIMfarmID` = `dim-farm`.`ID` 
    join `db-farm` on `db-farm`.`FMID` = `dim-farm`.`dbID`
    join `db-subfarm` on `db-subfarm`.`FSID`=`db-farm`.`FMID`
    join `dim-address` on `log-farm`.`DIMaddrID` = `dim-address`.`ID`
    join `log-activity` on `log-activity`.`DIMfarmID` = `log-farm`.`DIMfarmID`
    join `db-activity` on `db-activity`.`ID` = `log-activity`.`DBactID`
    join `dim-user`on `dim-user`.`ID` = `log-farm`.`DIMownerID`
    join `db-user` on `dim-user`.`dbID` = `db-user`.`UID`
    join `dim-time` on `dim-time`.`ID` = `log-activity`.`DIMdateID`
    WHERE `log-farm`.`EndID` is null AND `log-activity`.`isDelete` = 0";

$data = selectData($sql);

$sql = "SELECT DISTINCT `db-user`.`FirstName` as `firstName`,`db-user`.`LastName` as `lastName`, `db-farm`.`Name` as `farmName`,`db-subfarm`.`Name` as `subfarmName`,`dim-address`.`FullAddress` as `address`,
`fact-drying`.`DIMstartDID`,`dim-time`.`Date` as `date`
    FROM `log-farm` join `dim-farm` on `log-farm`.`DIMfarmID` = `dim-farm`.`ID` 
    join `db-farm` on `db-farm`.`FMID` = `dim-farm`.`dbID`
    join `db-subfarm` on `db-subfarm`.`FSID`=`db-farm`.`FMID`
    join `dim-address` on `log-farm`.`DIMaddrID` = `dim-address`.`ID`
    join `dim-user`on `dim-user`.`ID` = `log-farm`.`DIMownerID`
    join `db-user` on `dim-user`.`dbID` = `db-user`.`UID`
    join `fact-drying` on `fact-drying`.`DIMfarmID` = `log-farm`.`DIMfarmID`
    join `dim-time` on `dim-time`.`ID` = `fact-drying`.`DIMstartDID`
    WHERE `log-farm`.`EndID` is null AND `fact-drying`.`DIMstopDID` is  null";

$data2 = selectData($sql);
$event;
for($i = 0; $i < sizeof($data); $i++ ){
    $color;
    if($i > 0){
        $event[$i-1]['id'] = $i;
        $event[$i-1]['title'] = $data[$i]['activity'];
        $event[$i-1]['start'] = $data[$i]['date'];
        $event[$i-1]['end'] = $data[$i]['date'];
        $event[$i-1]['color'] = '#42f554';
        $event[$i-1]['extendedProps'] = ['name-farmer'=>$data[$i]['firstName'],'name-farm'=>$data[$i]['farmName'],'name-subfarm'=>$data[$i]['subfarmName'],'address'=>$data[$i]['address']]; 
    }
    
}
$j = 0;
for($i = sizeof($data)-1; $i < (sizeof($data2)+sizeof($data))-2; $i++ ){
    if($j > 0){
        $event[$i-1]['id'] = $i;
        $event[$i-1]['title'] = 'ขาดน้ำ';
        $event[$i-1]['start'] = $data2[$j]['date'];
        $event[$i-1]['end'] = $data2[$j]['date'];
        $event[$i-1]['extendedProps'] = ['name-farmer'=>$data2[$j]['firstName'],'name-farm'=>$data2[$j]['farmName'],'name-subfarm'=>$data2[$j]['subfarmName'],'address'=>$data2[$j]['address']]; 
        }
        $j++;   
    }


// $event = array();
    // foreach($data as $val)
    // {
    //     if($i > 0){
    //     $event[$i-1]['id'] = $i;
    //     $event[$i-1]['title'] = $val['activity'];
    //     $event[$i-1]['start'] = $val['date'];
    //     $event[$i-1]['end'] = $val['date'];
    //     $event[$i-1]['extendedProps'] = ['name-farmer'=>$val['firstName'],'name-farm'=>$val['farmName'],'name-subfarm'=>$val['subfarmName']];

    //     }


    //     $i++;
    // }



//echo sizeof($event);
// print_r($data);

// print_r('ssssssss');
echo json_encode($event);