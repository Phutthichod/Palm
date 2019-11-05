<?php
include("../../dbConnect.php");

$conn = connectDB();

//echo $_POST['addDiseases'];
if (isset($_POST['addDiseases'])) {
     echo "add";
     $tileName = $_POST['tilename'];
     $officeName = $_POST['tilename'];
     $style = $_POST['style'];
     $styleDanger = $_POST['styleDanger'];

     /*
     // UPLOAD
     $target_file = $target_dir . basename($_FILES["lcon"]["name"]);
     $target_dir = "../../picture/Pest/insect/";
     $uploadOk = 1;
     $picLogo = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

     // UPLOADING
     $upload_path = $target_dir . $target_file;
     $success = move_uploaded_file($_FILES['lcon']['tmp_name'], $upload_path);
     
     // CHECK
     $check = getimagesize($_FILES["lcon"]["tmp_name"]);
     if ($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
     } else {
          echo "File is not an image.";
          $uploadOk = 0;
     }
     */
     
     //upload
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
          VALUES ('','$tileName','$officeName','2','$style','$styleDanger','$picLogo','0','0')";
     if ($conn->query($sql) == TRUE) {
          echo "<script>";
          echo "alert('New record created successfully');";
          echo "window.location.href='DiseasesList.php';";
          echo "</script>";
     } else {
          echo "ERROR" . $sql . "<BR>" . $con->error;
     }
}
/*
// Check if file already exists
if (file_exists($target_file)) {
     echo "Sorry, file already exists.";
     $uploadOk = 0;
 }
 // Check file size
 if ($_FILES["lcon"]["size"] > 500000) {
     echo "Sorry, your file is too large.";
     $uploadOk = 0;
 }
 // Allow certain file formats
 if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
 && $imageFileType != "gif" ) {
     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
     $uploadOk = 0;
 }
 // Check if $uploadOk is set to 0 by an error
 if ($uploadOk == 0) {
     echo "Sorry, your file was not uploaded.";
 // if everything is ok, try to upload file
 } else {
     if (move_uploaded_file($_FILES["lcon"]["tmp_name"], $target_file)) {
         echo "The file ". basename( $_FILES["lcon"]["name"]). " has been uploaded.";
     } else {
         echo "Sorry, there was an error uploading your file.";
     }
 }
 */