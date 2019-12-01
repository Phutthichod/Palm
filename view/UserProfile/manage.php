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
            $pwd = $_POST['pwd'];
           
            $mail = trim($_POST['mail']);  
            $id_type = trim($_POST['type']);
            $id_department = trim($_POST['department']);

           // if($department != "" && $alias != ""){
            $sql = "INSERT INTO `db-user` (`UID`,Title,FirstName,LastName,UserName,PWD,Icon,EMAIL,ETID,DID,IsAdmin,IsResearch,IsOperator,IsFarmer,IsBlock) 
             VALUES ('','$title','$fname','$lname','$username','null','default.jpg','$mail','$id_type','$id_department','$admin','$research','$operator','$farmer','0')";

            $uid = addinsertData($sql);
   
            //}
            $pwd_md5 = md5($uid.$username.$pwd);
            
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

            addinsertData($sql);

            header("location:OtherUsersList.php");
            
            break;
        
        case 'delete' ;
            $uid = $_POST['uid'];
            $sql = "DELETE FROM `db-user` WHERE `UID`='".$uid."'";  
            delete($sql);

            break;

        case 'block' ;
            $val = $_POST['val'];
            $uid = $_POST['uid'];
            
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
                        echo "ch pass";
                        // echo   "<script>
                        //         console.log('$o_pwd');
                        //         </script>";
                        $title = $_POST['p_title'];
                        $fname = $_POST['p_fname'];
                        $lname = $_POST['p_lname'];

                        // echo " gg ";
                        // echo "$title";
                        // echo ($fname);
                        $DIM_user = getDIM($uid,$title,$fname,$lname);
                        $id_dim = $DIM_user[1]['ID'];
                        print_r ($id_dim);
                        $username_up = strtoupper($username);
                        
                        $DATA = getUser($uid);
                        $pwd_DATA = $DATA[1]['PWD'];
                        $pwd_md5 = md5($uid.$username_up.$pwd);
                        
                        if($o_pwd == $pwd_md5){
                            
                            header("location:UserProfile.php");
                        }else{

                            // echo "no dup";
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
                            header("location:UserProfile.php");
                        
                        }
                                

            break;
        case 'update' :
            $uid = $_POST['uid'];
                // echo $uid;
                 echo   "<script>
                    console.log($uid);
                    </script>";
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
            // echo $admin." ".$research." ";
            $title = trim($_POST['e_title']);
            // echo "title = ".$title." ";
            $fname = trim($_POST['e_fname']);
            // echo "fname = ".$fname." ";
            $lname = trim($_POST['e_lname']);
            // echo "lname = ".$lname." ";
            $username = trim($_POST['e_username1']);
            // echo "username = ".$username." ";
            $mail = trim($_POST['e_mail']);
            // echo "mail = ".$mail." ";
            $id_type = trim($_POST['e_type']);
            // echo "id_type = ".$id_type." ";
            $id_department = trim($_POST['e_department']);
            // echo "id_department = ".$id_department;
            // if($department != "" && $alias != ""){
          
                $sql=   "UPDATE `db-user` 
                        SET Title='$title', FirstName='$fname', LastName='$lname',UserName='$username', EMAIL='$mail', ETID='$id_type',
                        DID='$id_department', IsAdmin='$admin', IsResearch='$research',IsOperator='$operator', IsFarmer='$farmer'
                        WHERE `UID`='$uid' ";

                $re = updateData($sql);
                
                $DATA =  select_dimUser();

                
                //  print_r($DATA);
                // echo   "<script>
                //     console.log($DATA);
                //     </script>";
                echo $DATA[1]['Alias'];
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
            
                    echo   "<script>
                    console.log('this');
                    </script>";
                for($i = 1;$i <= $DATA[0]['numrow'];$i++){
                    if($DATA[$i]['dbID'] == $uid && $DATA[$i]['Title'] == $title && $DATA[$i]['FullName'] == $fullname  && $DATA[$i]['Alias'] == $fname ){
                        $check_dim = 0;
                        $id_data = $DATA[$i]['FullName'] ;
                        break;
                    }
                }
                // echo   "<script>
                //     console.log('$uid,$title,$fullname,$fname,$i,$id_data');
                //     </script>";
               if($check_dim == 1){
                // header("location:test.php");
                echo   "<script>
                    console.log('ไม่ซ้ำ');
                    </script>";
                    
                // echo $uid;
                // echo $title;
                // echo $fullname;
                // echo $fname;
                $sql = "INSERT INTO `dim-user` (ID,`dbID`,`Type`,Title,FullName,Alias) 
                VALUES ('','$uid','U','$title','$fullname','$fname')";

                $id_dim = addinsertData($sql);
                // $DATA = select_dimUser();
                               
                $sh = $_SESSION[md5('user')];
                $row = $sh[0]['numrow'];
                echo   "<script>
                    console.log('$row');
                    </script>";
                UpdateLogLogin();
                NewLogLogin();

               }else{
                echo   "<script>
                console.log('ซ้ำ');
                </script>";
                // header("location:OtherUsersList.php");
               }
                
               $sql = "SELECT * FROM `db-user` WHERE `UID` = $uid ";
               $USER = selectData($sql);
            //    echo   "<script>
            //         console.log($USER[1]['UserName']);
            //         </script>";
            //         print_r($USER);
                $_SESSION[md5('user')] = selectData($sql);
               header("location:UserProfile.php");
                
               
            break;
            

            // }
    }

    
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