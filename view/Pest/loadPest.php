<?php
include_once("../../dbConnect.php");
$id = $_GET['id'];
$sql = "SELECT * FROM `db-pestlist` WHERE PTID = $id";
$data = selectAll($sql);
echo json_encode($data);
