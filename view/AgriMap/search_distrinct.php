<?php
include("connect_db.php");
$province = $_REQUEST['province'];

$sql = "SELECT * FROM `db-distrinct` WHERE `AD1ID` = '$province' ";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) 
{
    echo "<option value =".$row['AD2ID'].">".$row['Distrinct']."</option>";
}
?>
