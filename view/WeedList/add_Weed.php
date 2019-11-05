<?php
include("../../dbConnect.php");

$conn = connectDB();
//echo $_POST['addweed'];
if (isset($_POST['addweed'])) {
     echo "add";
     $tileName = $_POST['tilename'];
     $officeName = $_POST['tilename'];
     $style = $_POST['style'];
     $styleDanger = $_POST['styleDanger'];

     $image_path = "../../picture/Pest/insect/";
     $ext = pathinfo(basename($_FILES['lcon']['name']), PATHINFO_EXTENSION);
     $new_image_name = 'img_' . uniqid() . "." . $ext;
     
     $upload_path = $image_path . $new_image_name;

     //uploading
     $success = move_uploaded_file($_FILES['lcon']['tmp_name'], $upload_path);
     if($success == FALSE)
     {
          echo "upload error" ;
          exit();
     }
     
     $picLogo = $new_image_name ;

     $sql = "INSERT INTO `db-pestlist` (`PID`, `Name`, `Alias`, `PTID`, `Charactor`, `Danger`, `lcon`, `NumPicChar`, `NumPicDanger`)
          VALUES ('','$tileName','$officeName','3','$style','$styleDanger','$picLogo','0','0')";
     if ($conn->query($sql) == TRUE) {
          echo "<script>";
          echo "alert('New record created successfully');";
          echo "window.location.href='WeedList.php';";
          echo "</script>";
     } else {
          echo "ERROR" . $sql . "<BR>" . $con->error;
     }
}
