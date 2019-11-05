<?php 
	require 'connect.php';
	if(isset($_POST['aid'])) {
		$db = new DbConnect;
		$conn = $db->connect();
		$stmt = $conn->prepare("SELECT * from `db-distrinct` WHERE AD1ID = " . $_POST['aid']);
		$stmt->execute();
		$distrinct = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($distrinct);
	}
	if(isset($_POST['aid2'])) {
		$db = new DbConnect;
		$conn = $db->connect();
		$stmt = $conn->prepare("SELECT * from `db-distrinct` WHERE AD1ID = " . $_POST['aid']);
		$stmt->execute();
		$distrinct = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($distrinct);
	}
	if(isset($_POST['did'])) {
		$db = new DbConnect;
		$conn = $db->connect();
		$stmt = $conn->prepare("SELECT * from `db-subdistrinct` WHERE AD2ID = " . $_POST['did']);
		$stmt->execute();
		$subdistrinct = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($subdistrinct);
	}
	function loadProvince() {
		$db = new DbConnect;
		$conn = $db->connect();
		$stmt = $conn->prepare("SELECT * from `db-province`");
		$stmt->execute();
		$province = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $province;
	}
	function loadProvince2() {
		$db = new DbConnect;
		$conn = $db->connect();
		$stmt = $conn->prepare("SELECT * from `db-province`");
		$stmt->execute();
		$province = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $province;
	}
	function loadFarmer() {
		$db = new DbConnect;
		$conn = $db->connect();
		$stmt = $conn->prepare("SELECT * FROM `db-farmer`");
		$stmt->execute();
		$farmer = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $farmer;
	}

 ?>