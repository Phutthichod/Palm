<?php
$PID= $_POST['PID'];
$PICS = $_POST['PICS'];
$type = $_POST['type'];
function dirToArray($dir)
{
    $result = array();
    $cdir = scandir($dir);
    foreach ($cdir as $key => $value) {
        if (!in_array($value, array(".", ".."))) {
            if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
                $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
            } else {
                $result[] = $value;
            }
        }
    }
    return $result;
}

$data = dirToArray($PICS . $type . $PID);

echo json_encode($data);
