<?php 
session_start();
require "../../dbConnect.php";
require "../../set-log-login.php";
$request = $_POST['request'];
// mkdir("path/to/my/dir", 0700);

switch($request){
    case 'select': //--------------------------case select ------------------------------
        $sql = "SELECT * FROM `db-fertilizer`";
        
        print_r(json_encode(select($sql)));
        break;
    case 'p':

        $Con = $_POST['condition'];
        $numCon = 0;
        $Condition = array();
        foreach($Con as $i=>$val){
            if($val != ''){
                $numCon++;
                $Condition[] = $val;
            }
        }
        $FID = $_POST['id'];
        $dataCondition = selectData(" SELECT * FROM `db-fercondition` WHERE `FID` = $FID");
        echo $numCon."=".$dataCondition[0]['numrow'];
        break;
    case 'update': //--------------------------case update ------------------------------
        $Name = $_POST['name'];
        $Alias = $_POST['alias'];
        $Unit = $_POST['exampleRadios3'];
        $Usage = $_POST['exampleRadios1'];
        $FID = $_POST['id'];
        
        // ------------------------------- check data to update
        $isIcon = false;
        $isCondition = false;
        $isData = true;

        $t=time();
        $sql = '';
        $Start = '';
        $End =  '';
        // ------------------------------------ CONDITION DATA ---------------------------------
        if(isset($_POST['start'])&&$_POST['exampleRadios2']==2){
            $Start = $_POST['start'];
            $End = $_POST['end'];
        }
        else{
            $Start = '0101';
            $End = '3112';
        }
        $EQ1 = $_POST['a'];
        $EQ2 = "";
        if($Usage == 3){
            $EQ2  = 0;
        }
        else{
            $EQ2 = $_POST['b']; 
        }
        // ------------------------------------ update db-fertilizer` ---------------------------------
        
        $sql_insert = '';
        
        if(!isset($_POST['imagebase64'])){
            $sql_insert = "UPDATE `db-fertilizer` 
            SET `Start` = '$Start', `End`= '$End', `Name` = '$Name',`Alias` = '$Alias', `Usage` = $Usage,
            `EQ1` = $EQ1, `EQ2` = $EQ2 ,`Unit` = $Unit
            WHERE `FID` = $FID;";
        }
        else{
           
            $sql_insert = "UPDATE `db-fertilizer` 
            SET `Start` = '$Start', `End`= '$End', `Name` = '$Name',`Alias` = '$Alias', `Usage` = $Usage,
            `EQ1` = $EQ1, `EQ2` = $EQ2 ,`Unit` = $Unit 
            WHERE `FID` = $FID;";
           
            $isIcon = true;
            // insertLogIcon(); //-------------insert log icon ------------------
        }

        
        $sql = "SELECT * FROM `db-fertilizer` WHERE `FID` = $FID";
        $dataSelect = select($sql);
        $dataAll = $dataSelect[1];
        
        if($dataAll['Start'] == $Start && $dataAll['End'] == $End && $dataAll['Alias'] == $Alias && $dataAll['Name'] == $Name && $dataAll['Usage'] == $Usage && $dataAll['EQ1'] == $EQ1
        && $dataAll['EQ2'] == $EQ2 && $dataAll['Unit'] == $Unit){
            $isData = false;
        }
        else{
           updateData($sql_insert); 
        }
        

        // $sql_del = "DELETE FROM `db-fercondition` WHERE `FID` = $FID;";
        // deletedata($sql_del);
        // $Condition = $_POST['condition'];
        // $size = 1;
            
        //     foreach($Condition as $i=>$val){
        //         if($val != ''){
        //             $sql_insert = "INSERT INTO `db-fercondition` (`FID`,`Order`,`Condition`) VALUES ($FID,$size,'$val');";
        //             addinsertData($sql_insert);
        //             // insertLogCon($Condition[$i],$DIMID);
        //             $size++;
        //         }
        //     }
        
        // ------------------------------------ insert log ---------------------------------
        $ID_OLD = select("SELECT * FROM `DIM-Fertilizer` WHERE `dbID` = $FID ORDER BY `ID` DESC LIMIT 1");
        $IDInsert = $ID_OLD[1]['ID'];
        if($isData == true){
        $StartDD = intval(str_split($dataAll['Start'],2)[0]);
        $StartMM = intval(str_split($dataAll['Start'],2)[1]);
        $EndDD = intval(str_split($dataAll['End'],2)[0]);
        $EndMM = intval(str_split($dataAll['End'],2)[1]);
        
        $data = ['FID'=>$FID,'Name'=>$Name,'Alias'=>$Alias,'Unit'=>['Unit'],'Usage'=>$dataAll['Usage'],'EQ1'=>$dataAll['EQ1'],
        'EQ2'=>$dataAll['EQ2'], 'StartDD' => $StartDD,'StartMM' => $StartMM,'EndDD' => $EndDD,
        'EndMM' => $EndMM];
        // print_r($data);

      
        // $ID_OLD = select("SELECT * FROM `DIM-Fertilizer` WHERE `dbID` = $FID");
        updateLog($ID_OLD[1]['ID']);
        $IDInsert = insertLog($data);
        }
         // ------------------------------------ update db fer condition` ---------------------------------
        $Con = $_POST['condition'];
        $numCon = 0;
        $Condition = array();
        foreach($Con as $i=>$val){
            if($val != ''){
                $numCon++;
                $Condition[] = $val;
            }
        }
        $dataCondition = selectData(" SELECT * FROM `db-fercondition` WHERE `FID` = $FID");
        if(sizeof($Condition)>0){
           if($dataCondition[0]['numrow']>0){
            if($dataCondition[0]['numrow'] == $numCon){
                foreach($dataCondition as $i => $val){
                    if($dataCondition[$i]['Condition'] != $Condition[$i]){
                        $isCondition = true;
                        // break;
                    }
                }
                if($ID_OLD[1]['ID']!=$IDInsert){
                    $IDCon = $ID_OLD[1]['ID'];
                    updateLogCon($ID_OLD[1]['ID']);
                    $size = 1;
                    foreach($Condition as $i=>$val){
                        insertLogCon($Condition[$i],$IDInsert,$size);
                        $size++;
                    }
                }
            }
            else{
                 $sql_del = "DELETE FROM `db-fercondition` WHERE `FID` = $FID;";
                deletedata($sql_del);
                $size = 1;
                updateLogCon($ID_OLD[1]['ID']);
                foreach($Condition as $i=>$val){
                    if($val != ''){
                        $sql_insert = "INSERT INTO `db-fercondition` (`FID`,`Order`,`Condition`) VALUES ($FID,$size,'$val');";
                        addinsertData($sql_insert);
                        insertLogCon($Condition[$i],$IDInsert,$size);
                        $size++;
                    }
                }
                
            }
        } 
        else{
            $size = 1;
            foreach($Condition as $i=>$val){
                        if($val != ''){
                            $sql_insert = "INSERT INTO `db-fercondition` (`FID`,`Order`,`Condition`) VALUES ($FID,$size,'$val');";
                            addinsertData($sql_insert);
                            insertLogCon($Condition[$i],$IDInsert,$size);
                            // insertLogCon($Condition[$i],$DIMID);
                            $size++;
                        }
                    }
        }
        }
        else{
            $sql_del = "DELETE FROM `db-fercondition` WHERE `FID` = $FID;";
            deletedata($sql_del);
            updateLogCon($ID_OLD[1]['ID']);
        }
        // ---------------------------------------update Icon ----------------------------------
        if($isIcon){
            $data = $_POST['imagebase64'];
            $img_array = explode(';',$data);
            $img_array2 = explode(",",$img_array[1]);
            $data = base64_decode($img_array2[1]);
            $Icon = time().'.png';
            $sql = "UPDATE `db-fertilizer` SET  `Icon` = '$Icon' WHERE `FID` = $FID;";
            updateData($sql);
            mkdir("../../icon/fertilizer/$FID");

            file_put_contents("../../icon/fertilizer/$FID/$Icon",$data);
            // if(move_uploaded_file($_FILES["icon"]["tmp_name"],"../../icon/fertilizer/$FID/$Icon"))
            // {
            
            // }
            
            $dataIcon = [];
            $StartT = time();
            $StartID = getDIMDate()[1]['ID'];
            $path = "icon/fertilizer/$FID/$Icon";
            $dataIcon = ['Path' =>  $path,'Type' => 2,'FileName' => $dataAll['Icon']];
            $dataIcon['StartT'] = $StartT;
            $dataIcon['LOGloginID'] =  $_SESSION[md5('LOG_LOGIN')][1]['ID'];;
            $dataIcon['StartID'] = $StartID; 
            $dataIcon['DIMIconID'] = $IDInsert;
            updateLogIcon($ID_OLD[1]['ID']);
            insertLogIcon($dataIcon);
        }
        else{
            if($ID_OLD[1]['ID']!=$IDInsert){
                $StartT = time();
                $StartID = getDIMDate()[1]['ID'];
                $IDICON = $ID_OLD[1]['ID'];
                $sql = "SELECT * FROM `LOG-Icon` WHERE `DIMIconID` = '$IDICON' ORDER BY `ID` DESC LIMIT 1";
                echo $sql;
                $data = select($sql);
                echo $data;
                // echo $data;
                $dataIcon = [];
                $dataIcon['Path'] = $data[1]['Path'];
                $dataIcon['Type'] = 2;
                $dataIcon['FileName'] = $data[1]['FileName'];
                $dataIcon['StartT'] = $StartT;
                $dataIcon['LOGloginID'] =  $_SESSION[md5('LOG_LOGIN')][1]['ID'];
                $dataIcon['StartID'] = $StartID; 
                $dataIcon['DIMIconID'] = $IDInsert;
                // echo $dataIcon;
                updateLogIcon($ID_OLD[1]['ID']);
                insertLogIcon($dataIcon);
            }
        }
        
        break;
    case 'insert2':
        if(isset($_POST['imagebase64'])){
            $data = $_POST['imagebase64'];
            $img_array = explode(';',$data);
            $img_array2 = explode(",",$img_array[1]);
            $data = base64_decode($img_array2[1]);

            $imgName = time().'.png';

            file_put_contents('upload/'.$imgName,$data);
            $img_file = addslashes(file_get_contents('upload/'.$imgName));
            echo( base64_encode($img_file));
        }
        print_r($_POST);    
        break;
    case 'insert':
        $Name =  $_POST['name_insert'];
        $Alias = $_POST['alias_insert'];
        // $t=time();
      //  $file = $_FILES['icon_insert']['name'];
        // $type = end(explode(".", "$file"));
      //  $Icon = "$t.$type";
       
        
        
       
       
        if(isset($_POST['imagebase64'])){
            $data = $_POST['imagebase64'];
            $img_array = explode(';',$data);
            $img_array2 = explode(",",$img_array[1]);
            $data = base64_decode($img_array2[1]);
            


           
            $Icon = time().'.png';
            $sql = "INSERT INTO `db-fertilizer` (`Name`,`Alias`,`Icon`) VALUES ('$Name','$Alias','$Icon');";
            $insertData = addinsertData($sql);
            $sql = "SELECT `FID` FROM `db-fertilizer` ORDER BY `FID` DESC LIMIT 1";
            $id = selectDataOne($sql)['FID'];
            mkdir("../../icon/fertilizer/$id");

            file_put_contents("../../icon/fertilizer/$id/$Icon",$data);
        }
       
       
        // ------------------------------------ insert log ---------------------------------
        $id = selectDataOne($sql)['FID'];
        $sql = "SELECT * FROM `db-fertilizer` WHERE `FID` = $id";
        $dataSelect = select($sql);
        $dataAll = $dataSelect[1];
        $StartDD = intval(str_split($dataAll['Start'],2)[0]);
        $StartMM = intval(str_split($dataAll['Start'],2)[1]);
        $EndDD = intval(str_split($dataAll['End'],2)[0]);
        $EndMM = intval(str_split($dataAll['End'],2)[1]);
        
        $data = ['FID'=>$id,'Name'=>$Name,'Alias'=>$Alias,'Unit'=>['Unit'],'Usage'=>$dataAll['Usage'],'EQ1'=>$dataAll['EQ1'],
        'EQ2'=>$dataAll['EQ2'], 'StartDD' => $StartDD,'StartMM' => $StartMM,'EndDD' => $EndDD,
        'EndMM' => $EndMM];
        // $path = "icon/fertilizer/$id/$Icon";
        // $dataIcon = ['Icon' => $dataAll['EQ2'],'Path' =>  $path,'DIMIconID'=>$id,'Type' => 2,'FileName' => $dataAll['Icon']];

        // $path = "icon/fertilizer/$id/$Icon";
        // $dataIcon = ['Path' =>  $path,'Type' => 2,'FileName' => $dataAll['Icon']];
        insertLog($data);
        break;
    case 'selectCondition':
        $id = $_POST['id'];
        $sql = "SELECT * FROM `db-fercondition` WHERE `FID` = $id";
        
        print_r(json_encode(select($sql)));
        break;
        case 'delete': //--------------------------case delete ------------------------------
}
function insertLog($data){
    $FID = $data['FID'];
    $Name = $data['Name'];
    $Alias = $data['Alias'];
    $StartT = time();
    $StartDD = $data['StartDD'];
    $StartMM = $data['StartMM'];
    $EndDD = $data['EndDD'];
    $EndMM = $data['EndMM'];
    $Usage = $data['Usage'];
    $EQ1 = $data['EQ1'];
    $EQ2 = $data['EQ2'];
    $Unit = $data['Unit'];
    $DIMfertID = '';
    $LOGloginID = $_SESSION[md5('LOG_LOGIN')][1]['ID'];
    $StartID = getDIMDate()[1]['ID'];
    // if(sizeof($dataIcon)>0){
    //     $dataIcon['StartT'] = $StartT;
    //     $dataIcon['LOGloginID'] = 5;
    //     $dataIcon['StartID'] = $StartID; 
    // }
   
    $sql = "SELECT * FROM `DIM-Fertilizer` WHERE `dbID` = $FID   ORDER BY `ID` DESC LIMIT 1";
    $DIMfertID = selectData($sql)[1]['ID'];
    // echo $DIMfertID;
    $checkDIM = selectData($sql)[0]['numrow'];
    if($checkDIM>0){

        $checkDIM = selectData($sql);
        $DIMName = $checkDIM[1]['Name'];
        $DIMAlias = $checkDIM[1]['Alias'];
        if( $DIMName == $Name && $DIMAlias == $Alias){

        }
        else{
            $sqlDIM_Fertilizer = "INSERT INTO `DIM-Fertilizer` (`dbID`,`Name`,`Alias`) VALUE ($FID,'$Name','$Alias')";
            $DIMfertID = addinsertData($sqlDIM_Fertilizer);
            echo $sqlDIM_Fertilizer;
        }

    }else{
    $sqlDIM_Fertilizer = "INSERT INTO `DIM-Fertilizer` (`dbID`,`Name`,`Alias`) VALUE ($FID,'$Name','$Alias')";
    $DIMfertID = addinsertData($sqlDIM_Fertilizer);
    // echo $sqlDIM_Fertilizer;
    }

    $sqlLog_Fertilizer = "INSERT INTO `log-fertilizer` (`LOGloginID`,`StartT`,`StartID`,`DIMfertID`,`StartDD`,`StartMM`,`EndDD`
    ,`EndMM`,`Usage`,`EQ1`,`EQ2`) 
    VALUES ($LOGloginID,$StartT,$StartID,$DIMfertID,$StartDD,$StartMM,$EndDD,$EndMM,$Usage,$EQ1,$EQ2);";
    echo $sqlLog_Fertilizer;
    addinsertData($sqlLog_Fertilizer);
    return $DIMfertID;
}
function insertLogIcon($data){
    $LOGloginID = $_SESSION[md5('LOG_LOGIN')][1]['ID'];
    $StartT = $data['StartT'];
    $StartID = $data['StartID'];
    $DIMIconID = $data['DIMIconID'];
    $Type = $data['Type'];
    $FileName = $data['FileName'];
    $Path = $data['Path'];
    $sql = "INSERT INTO `LOG-Icon` (`LOGloginID`,`StartT`,`StartID`,`DIMIconID`,`Type`,`FileName`,`Path`)
    VALUES ($LOGloginID,$StartT,$StartID,$DIMIconID,$Type,'$FileName','$Path');";
    addinsertData($sql);
    echo $sql;
}
function insertLogIcon2($data){
    $LOGloginID = $_SESSION[md5('LOG_LOGIN')][1]['ID'];
    $StartT = $data['StartT'];
    $StartID = $data['StartID'];
    $DIMIconID = $data['DIMIconID'];
    $Type = $data['Type'];
    $FileName = $data['FileName'];
    $Path = $data['Path'];
    $sql = "INSERT INTO `LOG-Icon` (`LOGloginID`,`StartT`,`StartID`,`DIMIconID`,`Type`,`FileName`,`Path`)
    VALUES ($LOGloginID,$StartT,$StartID,$DIMIconID,$Type,'$FileName','$Path');";
    addinsertData($sql);
    echo $sql;
}
function updateLogIcon($ID){
    $EndID = getDIMDate()[1]['ID'];
    $t = time();
    $sql = "UPDATE `LOG-Icon` 
    SET `EndT`= $t ,`EndID` = $EndID
    WHERE `DIMIconID` = $ID AND `EndID` IS NULL;";
    updateData($sql);
}
function insertLogCon($item,$id,$Order){
    $StartID = getDIMDate()[1]['ID'];
    // $StartID = 1;
    $LOGloginID = $_SESSION[md5('LOG_LOGIN')][1]['ID'];
    $t = time();
    $sqlLog_FerCondition = "INSERT INTO `log-fercondition` (`LOGloginID`,`StartT`,`StartID`,`DIMfertID`,`Order`,`Condition`)
    VALUES ($LOGloginID,$t,$StartID,$id,$Order,'$item');";
    // addinsertData($sqlLog_FerCondition);
    echo addinsertData($sqlLog_FerCondition);
}

function updateLog($ID){
    $EndID = getDIMDate()[1]['ID'];
    $t = time();
    $sql = "UPDATE `log-fertilizer` 
    SET `EndT`= $t ,`EndID` = $EndID
    WHERE `DIMfertID` = $ID AND `EndID` IS NULL;";
    updateData($sql);
}
function updateLogCon($ID){
    $EndID = getDIMDate()[1]['ID'];
    $t = time();
    $sql = "UPDATE `log-ferCondition` 
    SET `EndT`= $t ,`EndID` = $EndID
    WHERE `DIMfertID` = $ID AND `EndID` IS NULL;";
    updateData($sql);

}
?>