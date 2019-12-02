<?php
require_once("../../dbConnect.php");
require_once("../../set-log-login.php");
session_start(); 
connectDB();
// echo $_POST['did'];
//   echo "come";
//  echo $_POST['request'];

if(isset($_POST['request'])){
    $request = $_POST['request'];
    $sql ='';

    switch($request){
        // case 'test' :
        //     echo "test";
        //     break;
        case 'photo' :
            if(isset($_POST['imagebase64'])){
                $uid = $_POST['p_uid'];
                // echo $uid;

                $data = $_POST['imagebase64'];
                // echo $data;
                $img_array = explode(';',$data);
                $img_array2 = explode(",",$img_array[1]);
                $data = base64_decode($img_array2[1]);

                // print_r ($img_array);
                // print_r ($img_array2);
                // print_r ($data);

                $Icon = time().'.png';

                $sql=   "UPDATE `db-user` SET Icon='$Icon'
                WHERE `UID`='$uid' ";
    
                $re = updateData($sql);
                if(!file_exists("../../icon/user/$uid")){
                        mkdir("../../icon/user/$uid");
                }
               
                file_put_contents("../../icon/user/$uid/$Icon",$data);

                $sql = "SELECT * FROM `db-user` WHERE `UID` = $uid ";
                $USER = selectData($sql);
                $_SESSION[md5('user')] = selectData($sql);

                header("location:UserProfile.php");
            }
            break;
        case 'select' :
            $sql = "SELECT * FROM `db-user`";

            print_r(json_encode(select($sql)));
            break;
        case 'insert' :
            $admin = 0;
            $research = 0;
            $operator = 0;
            $farmer = 0;

            echo "now";
            if(isset($_POST['admin'])){
                $admin = 1;
                echo $_POST['admin'];
            }
            if(isset($_POST['research'])){
                $research = 1;
                echo $_POST['research'];
            }
            if(isset($_POST['operator'])){
                $operator = 1;
                echo $_POST['operator'];
            }
            if(isset($_POST['farmer'])){
                $farmer = 1;
                echo $_POST['farmer'];
            }
            $title = trim($_POST['title']);
            $fname = trim($_POST['fname']);
            // echo $fname;
            $lname = trim($_POST['lname']);
            $username = trim($_POST['username']);
            $pwd = trim($_POST['pwd']);
           
            $mail = trim($_POST['mail']);  
            $id_type = trim($_POST['type']);
            $id_department = trim($_POST['department']);

            $sql = "INSERT INTO `db-user` (`UID`,Title,FirstName,LastName,UserName,PWD,Icon,EMAIL,ETID,DID,IsAdmin,IsResearch,IsOperator,IsFarmer,IsBlock) 
             VALUES ('','$title','$fname','$lname','$username','null','default.jpg','$mail','$id_type','$id_department','$admin','$research','$operator','$farmer','0')";

            $uid = addinsertData($sql);
   
            $username_up = strtoupper($username);
            $pwd_md5 = md5($uid.$username_up.$pwd);
            
            $sql=   "UPDATE `db-user` SET PWD='$pwd_md5'
            WHERE `UID`='$uid' ";

            $re = updateData($sql);
           
            if($title == 1){
                $title_show = "นาย";
            }else if($title == 2){
                $title_show = "นาง";
            }else{
                $title_show = "นางสาว";
            }

            $fullname = $title_show." ".$fname." ".$lname;

            $sql = "INSERT INTO `dim-user` (ID,`dbID`,`Type`,Title,FullName,Alias) 
                    VALUES ('','$uid','U','$title','$fullname','$fname')";

            $id_u=addinsertData($sql);

            $time = time();
                $data_t =  getDIMDate();
            $id_t = $data_t[1]['ID'];
                $loglogin = $_SESSION[md5('LOG_LOGIN')];
            $loglogin_id = $loglogin[1]['ID'];
            
            $sql = "INSERT INTO `log-password` (ID,DIMuserID,LOGloginID,StartT,StartID,PWD) 
                        VALUES ('','$id_u','$loglogin_id','$time','$id_t','$pwd_md5')";
            $did = addinsertData($sql);

            $dimd_id = get_DIMd($id_department);
            

            $sql = "INSERT INTO `log-user` (ID,DIMuserID,DIMdeptID,LOGloginID,StartT,StartID,IsAdmin,IsResearch,IsOperator,IsFarmer,IsBlock) 
                        VALUES ('','$id_u','$dimd_id','$loglogin_id','$time','$id_t','$admin','$research','$operator','$farmer','0')";
            $did = addinsertData($sql);

            $sql = "SELECT * FROM  `db-emailtype` WHERE ETID='$id_type'";
            $DATA = selectData($sql);
            $type= $DATA[1]['Type'];
            $fullemail = $mail.'@'.$type;

            $sql = "INSERT INTO `log-email` (ID,DIMuserID,LOGloginID,StartT,StartID,dbETID,FullEmail,`Type`) 
                        VALUES ('','$id_u','$loglogin_id','$time','$id_t','$id_type','$fullemail','$type')";
            $did = addinsertData($sql);
            
            header("location:UserProfile.php");
            
            break;
        
        case 'delete' ;
            $uid = $_POST['uid'];
            $get_idDim = getDIMu($uid);

            $time = time();
                $data_t =  getDIMDate();
            $id_t = $data_t[1]['ID'];

            $sql="UPDATE `log-user` 
            SET EndT='$time', EndID='$id_t'
            WHERE DIMuserID='$get_idDim' AND EndT IS NULL ";
            $o_did = updateData($sql);

            $sql="UPDATE `log-email` 
            SET EndT='$time', EndID='$id_t'
            WHERE DIMuserID='$get_idDim' AND EndT IS NULL ";
            $o_did = updateData($sql);

            $sql="UPDATE `log-password` 
            SET EndT='$time', EndID='$id_t'
            WHERE DIMuserID='$get_idDim' AND EndT IS NULL ";
            $o_did = updateData($sql);

            $sql = "DELETE FROM `db-user` WHERE `UID`='".$uid."'";  
            delete($sql);


            break;

        case 'block' ;
            $val = $_POST['val'];
            $uid = $_POST['uid'];

            $get_idDim = getDIMu($uid);

            $time = time();
                $data_t =  getDIMDate();
            $id_t = $data_t[1]['ID'];
                $loglogin = $_SESSION[md5('LOG_LOGIN')];
            $loglogin_id = $loglogin[1]['ID'];

            $sql = "SELECT * FROM `log-user`  WHERE DIMuserID='$get_idDim' AND EndT IS NULL ";
            $DATA = selectData($sql);
            $id_old = $DATA[1]['ID'];

            $id_dim = $DATA[1]['DIMuserID'];
            $dimd_id = $DATA[1]['DIMdeptID'];
            $admin = $DATA[1]['IsAdmin'];
            $research = $DATA[1]['IsResearch'];
            $operator = $DATA[1]['IsOperator'];
            $farmer = $DATA[1]['IsFarmer'];

            $sql = "INSERT INTO `log-user` (ID,DIMuserID,DIMdeptID,LOGloginID,StartT,StartID,IsAdmin,IsResearch,IsOperator,IsFarmer,IsBlock) 
                    VALUES ('','$id_dim','$dimd_id','$loglogin_id','$time','$id_t','$admin','$research','$operator','$farmer','$val')";
            $did = addinsertData($sql);
         
                        
            $sql="UPDATE `log-user` 
                SET EndT='$time', EndID='$id_t'
                WHERE ID='$id_old'";
            $o_did = updateData($sql);
                       
            $sql=   "UPDATE `db-user` SET IsBlock=$val
                WHERE `UID`='$uid' ";
            $re = updateData($sql);

            break;
        case 'md5' ;
            $pwd = $_POST['pwd'];
            $pwd_md5 = md5($pwd);
            echo $pwd_md5;

            break;
        case 'changePass' ;
            
            $pwd = trim($_POST['e_pwd']);
            $uid = $_POST['pass_uid'];
            $username = $_POST['pass_username'];
            $o_pwd = trim($_POST['pass_old']);

            // echo   "<script>
            //         console.log('$o_pwd');
            //         </script>";
            $DATA = getUser($uid);
            $title = $DATA[1]['Title'];
            $fname = $DATA[1]['FirstName'];
            $lname = $DATA[1]['LastName'];


            $DIM_user = getDIM($uid,$title,$fname,$lname);
            $id_dim = $DIM_user[1]['ID'];
            $username_up = strtoupper($username);
            
            $DATA = getUser($uid);
            $pwd_DATA = $DATA[1]['PWD'];
            $pwd_md5 = md5($uid.$username_up.$pwd);

           
            
            if($o_pwd == $pwd_md5){
                
                header("location:UserProfile.php");
            }else{

            
            $time = time();
                $data_t =  getDIMDate();
            $id_t = $data_t[1]['ID'];
                $loglogin = $_SESSION[md5('LOG_LOGIN')];
            $loglogin_id = $loglogin[1]['ID'];
            
            $sql="UPDATE `log-password` 
                            SET EndT='$time', EndID='$id_t'
                            WHERE DIMuserID='$id_dim' AND EndT IS NULL ";
             $o_did = updateData($sql);

           
            $sql = "INSERT INTO `log-password` (DIMuserID,LOGloginID,StartT,StartID,PWD) 
            VALUES ('$id_dim','$loglogin_id','$time','$id_t','$pwd_md5')";

            $did = addinsertData($sql);

             $sql=   "UPDATE `db-user` 
                        SET PWD='$pwd_md5'
                        WHERE `UID`='$uid' ";

                $re = updateData($sql);

                $sql = "SELECT * FROM `db-user` WHERE `UID` = $uid ";
                $USER = selectData($sql);
                $_SESSION[md5('user')] = selectData($sql);

                header("location:UserProfile.php");
            
            }
            break;
        case 'update' :
            $uid = $_POST['uid'];
                // echo $uid;
            $admin = 0;
            $research = 0;
            $operator = 0;
            $farmer = 0;
        
            if(isset($_POST['e_admin'])){
                $admin = 1;
            }
            if(isset($_POST['e_research'])){
                $research = 1;
            }
            if(isset($_POST['e_operator'])){
                $operator = 1;
            }
            if(isset($_POST['e_farmer'])){
                $farmer = 1;
            }
            $title = trim($_POST['e_title']);
            $fname = trim($_POST['e_fname']);
            $lname = trim($_POST['e_lname']);
            $username = trim($_POST['e_username1']);
            $mail = trim($_POST['e_mail']);
            $id_type = trim($_POST['e_type']);
            $id_department = trim($_POST['e_department']);
                $get_User = getUser($uid);
                $o_mail = $get_User[1]['EMAIL'];
                $o_etid = $get_User[1]['ETID'];

                $o_title = $get_User[1]['Title'];
                $o_fname = $get_User[1]['FirstName'];
                $o_lname = $get_User[1]['LastName'];
                $o_username = $get_User[1]['UserName'];
                $o_idd = $get_User[1]['ETID'];
                $o_admin = $get_User[1]['IsAdmin'];
                $o_research = $get_User[1]['IsResearch'];
                $o_operator = $get_User[1]['IsOperator'];
                $o_farmer = $get_User[1]['IsFarmer'];
                
                echo $o_title." ";
                echo $o_fname." ";
                echo $o_lname." ";
                echo $o_username." ";
                echo $o_idd." ";
                echo $o_admin." ";
                echo $o_research." ";
                echo $o_operator." ";
                echo $o_farmer." ";




                $get_idDim = getDIMu($uid);     //get ID_DIM_user before update for update log-user  

                $sql=   "UPDATE `db-user` 
                        SET Title='$title', FirstName='$fname', LastName='$lname',UserName='$username', EMAIL='$mail', ETID='$id_type',
                        DID='$id_department', IsAdmin='$admin', IsResearch='$research',IsOperator='$operator', IsFarmer='$farmer'
                        WHERE `UID`='$uid' ";

                $re = updateData($sql);
                

                $DATA =  select_dimUser();  //get DIM_user for check ADD duplicate dim-user
                
                if($title == 1){
                    $title_show = "นาย";
                }else if($title == 2){
                    $title_show = "นาง";
                }else{
                    $title_show = "นางสาว";
                }
    
                $fullname = $title_show." ".$fname." ".$lname;
                $i = 1;
                $check_dim = 1;
            
                for($i = 1;$i <= $DATA[0]['numrow'];$i++){
                    if($DATA[$i]['dbID'] == $uid && $DATA[$i]['Title'] == $title && $DATA[$i]['FullName'] == $fullname  && $DATA[$i]['Alias'] == $fname ){
                        $check_dim = 0;
                        $id_data = $DATA[$i]['FullName'] ;
                        break;
                    }
                }
               if($check_dim == 1){
                        // header("location:test.php");
                        echo   "<script>
                            console.log('ไม่ซ้ำ');
                            </script>";
//    --------------------------------------------------- update dim-user ---------------------------------------------------
                        $sql = "INSERT INTO `dim-user` (ID,`dbID`,`Type`,Title,FullName,Alias) 
                        VALUES ('','$uid','U','$title','$fullname','$fname')";

                        $id_dim = addinsertData($sql);
                                    
//    ------------------------------------------------ update and Add log-login ---------------------------------------------------                       
                        $sh = $_SESSION[md5('user')];
                        $row = $sh[0]['numrow'];
                        UpdateLogLogin();
                        NewLogLogin();

               }else{
                        $id_dim=$get_idDim;
                        echo   "<script>
                        console.log('ซ้ำ');
                        </script>";
                        // header("location:UserProfile.php");
               }
//    --------------------------------------------------- get for log -------------------------------------------------------
                $time = time();
                $data_t =  getDIMDate();
                $id_t = $data_t[1]['ID'];
                $loglogin = $_SESSION[md5('LOG_LOGIN')];
                $loglogin_id = $loglogin[1]['ID'];


                if($o_title == $title && $o_fname == $fname && $o_lname == $lname && $o_username == $username &&
                $o_idd == $id_department && $o_admin == $admin && $o_research == $research && $o_operator == $operator 
                && $o_farmer == $farmer){

                
                }else{
//    --------------------------------------------------- update log-user ---------------------------------------------------
                    $sql="UPDATE `log-user` 
                            SET EndT='$time', EndID='$id_t'
                            WHERE DIMuserID='$get_idDim' AND EndT IS NULL ";
                $o_did = updateData($sql);

//    --------------------------------------------------- insert log-user ---------------------------------------------------

                $dimd_id = get_DIMd($id_department);  //get ID_DIM_department for Add log-user

                $sql = "INSERT INTO `log-user` (ID,DIMuserID,DIMdeptID,LOGloginID,StartT,StartID,IsAdmin,IsResearch,IsOperator,IsFarmer,IsBlock) 
                            VALUES ('','$id_dim','$dimd_id','$loglogin_id','$time','$id_t','$admin','$research','$operator','$farmer','0')";
                $did = addinsertData($sql);
                }
                

                $sql = "SELECT * FROM  `db-emailtype` WHERE ETID='$id_type'";
                $DATA = selectData($sql);
                $type= $DATA[1]['Type'];
                $fullemail = $mail.'@'.$type;

                echo $o_mail." ".$mail."--";
                echo $o_etid." ".$id_type;
                if($o_mail == $mail && $o_etid == $id_type ){

                }else{

                $sql="UPDATE `log-email` 
                            SET EndT='$time', EndID='$id_t'
                            WHERE DIMuserID='$id_dim' AND EndT IS NULL ";
                $o_did = updateData($sql);

                $sql = "INSERT INTO `log-email` (ID,DIMuserID,LOGloginID,StartT,StartID,dbETID,FullEmail,`Type`) 
                            VALUES ('','$id_dim','$loglogin_id','$time','$id_t','$id_type','$fullemail','$type')";
                $did = addinsertData($sql);
                }

                $sql = "SELECT * FROM `db-user` WHERE `UID` = $uid ";
                $USER = selectData($sql);
                $_SESSION[md5('user')] = selectData($sql);
                
                   header("location:UserProfile.php");
                
               
            break;

            // }
    }

    
}
function getDIMu($uid){
    $sql = "SELECT * FROM `db-user` WHERE `UID`='$uid'";
    $DATA = selectData($sql);
    
    $title = $DATA[1]['Title'];
    if($title == 1){
        $fullname = "นาย ";
    }else if($title == 2){
        $fullname = "นาง ";
    }else{
        $fullname = "นางสาว ";
    }
    $fname = $DATA[1]['FirstName'];
    $lname = $DATA[1]['LastName'];
    $fullname = $fullname.$fname." ".$lname;

    $sql = "SELECT * FROM `dim-user` WHERE `dbID`='$uid' AND Title='$title' AND FullName='$fullname' AND Alias='$fname'";

    $DATA = selectData($sql);
    $IDdim_user = $DATA[1]['ID'];
    return $IDdim_user;

}
function get_DIMd($id_department){
    $sql = "SELECT * FROM `db-department` WHERE `DID`='$id_department'";
    $DATA = selectData($sql);
    $department = $DATA[1]['Department'];
    $alias = $DATA[1]['Alias'];
    $note = $DATA[1]['Note'];

    // echo $department;

    $sql = "SELECT * FROM `dim-department` WHERE `Department`='$department' AND Alias='$alias' AND Note='$note'";
    $DATA = selectData($sql);
    $dimd_id = $DATA[1]['ID'];

   return $dimd_id;
}
function getDIM($uid,$title,$fname,$lname){
    if($title == 1){
        $fullname = "นาย ";
    }else if($title == 2){
        $fullname = "นาง ";
    }else{
        $fullname = "นางสาว ";
    }
    $fullname = $fullname.$fname." ".$lname;
    $sql = "SELECT * FROM `dim-user` WHERE `dbID`='$uid' AND Title='$title' AND FullName='$fullname' AND Alias='$fname'";

   $DATA = selectData($sql);
   return $DATA;
}
function select_dimUser(){
    $sql = "SELECT * FROM `dim-user`";

   $DATA = selectData($sql);
   return $DATA;

}
function getUser($uid){
    $sql = "SELECT * FROM `db-user` WHERE `UID`='$uid'";

   $DATA = selectData($sql);
   return $DATA;
}

?>