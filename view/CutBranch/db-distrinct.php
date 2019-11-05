<?php
    $va = $_GET['va'];
    include_once("../../dbConnect.php");
    $sql = "SELECT * FROM `db-distrinct` WHERE AD1ID = $va";
    $data = selectAll( $sql );
    echo json_encode($data);
?>
