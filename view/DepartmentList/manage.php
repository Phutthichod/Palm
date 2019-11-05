<?php
require_once("../../dbConnect.php");
connectDB();
session_start(); 
require_once("set-log-login.php");
// echo $_POST['did'];
// echo "come";
// echo $_POST['request'];

if(isset($_POST['request'])){
    $request = $_POST['request'];
    $sql ='';
    
    
    // $dateUpdate = json_decode($_POST['dataUpdate']);
    // $ateInsert = json_decode($_POST['dataInsert']);
    // $dateDelete = json_decode($_POST['dataDelete']);
   

    switch($request){
        case 'select' :
            $sql = "SELECT * FROM `db-department`";

            print_r(json_encode(select($sql)));
            break;

        case 'insert' :
            $department = trim($_POST['department']);
            $alias = trim($_POST['alias']);
            $note = trim($_POST['note']);
            $time = time();
            
                    // echo $time;
                    $sql = "INSERT INTO `db-department` (DID,Department,Alias,Note) 
                    VALUES ('','$department','$alias','$note')";

                    $did = addinsertData($sql);
                    $DATA = select_dimDepartment();
                    $i = 1;
                    $check_dim = 1;
                    for($i = 1;$i <= $DATA[0]['numrow'];$i++){
                        if($DATA[$i]['dbID'] == $did && $DATA[$i]['Department'] == $department && $DATA[$i]['Alias'] == $alias  && $DATA[$i]['Note'] == $note ){
                            $check_dim = 0;
                            break;
                        }
                    }
                    if($check_dim){
                        $sql = "INSERT INTO `dim-department` (ID,`dbID`,Department,Alias,Note) 
                        VALUES ('','$did','$department','$alias','$note')";  
    
                        $id_d = addinsertData($sql);
                        // echo $id_d;
                        $data_t =  getDIMDate();
                        $id_t = $data_t[1]['ID'];
                        // echo $id_t;

                        // echo $id_t[1]['ID'];
                        $loglogin = $_SESSION[md5('LOG_LOGIN')];
                        $loglogin_id = $loglogin[1]['ID'];
                        echo   "<script>
                    console.log($loglogin_id );
                    </script>";
                        $sql = "INSERT INTO `log-department` (ID,DIMdeptID,LOGloginID,StartT,StartID) 
                        VALUES ('','$id_d','$loglogin_id','$time','$id_t')";

                        $did = addinsertData($sql);
                    }
                    
                
                    header("location:DepartmentList.php");


 
            break;
        
        case 'delete' ;
            $did = $_POST['did'];
            // echo $did;
            $sql = "DELETE FROM `db-user` WHERE `DID`='".$did."'";  
            delete($sql);
            $sql = "DELETE FROM `db-department` WHERE `DID`='".$did."'";  
            delete($sql);
            break;
            
        case 'update' :

            $did = $_POST['e_did'];
            $department = trim($_POST['e_department']);
            $alias = trim($_POST['e_alias']);
            $note = trim($_POST['e_note']);
            echo "$did";
                $sql=   "UPDATE `db-department` 
                        SET Department='$department', Alias='$alias', Note='$note'
                        WHERE DID='$did' ";

                $re = updateData($sql);
                header("location:DepartmentList.php");
            break;

           
    }
    
   
    
}
function select_dimDepartment(){
    $sql = "SELECT * FROM `dim-department`";

   $DATA = selectData($sql);
   return $DATA;

}

?>