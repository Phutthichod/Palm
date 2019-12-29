<?php
ini_set('display_errors', 1);

if (isset($_POST['cancel'])) {
    echo ' <div class="modal-header header-modal">
                <h4 class="modal-title" style="color:white">ตั้ง Password ใหม่</h4>
            </div>
            <div class="modal-body" id="ChangeModalBody">
                <div class="container">
                    <div class="row mb-4" style="margin-left: 10px">
                        <label for="inputEmail">ชื่อผู้ใช้</label>
                        <div class="col-12">
                            <input type="text" name="username2" id="username2" class="form-control" placeholder="username" required autofocus>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" name="save" id="save" value="insert" class="btn btn-success save">ยืนยัน</button>
                <button type="button" class="btn btn-danger cancel"  id="a_cancel"  data-dismiss="modal">ยกเลิก</button>
            </div>';
} else if (isset($_POST['username'])) {
    include_once("../../dbConnect.php");
    $username = $_POST['username'];
    $sql = "SELECT * FROM `db-user` INNER JOIN `db-emailtype` ON `db-user`.`ETID`=`db-emailtype`.`ETID` WHERE `UserName` = '" . $username . "'";
    $DATA = selectData($sql);

    if ($DATA[0]['numrow'] == 0) {
        echo ' <div class="modal-header header-modal">
        <h4 class="modal-title" style="color:white">ตั้ง Password ใหม่</h4>
        </div>
        <div class="modal-body" id="ChangeModalBody">
        <div class="container">
        
            <div class="row mb-4" style="margin-left: 10px">
                <label for="inputEmail">ชื่อผู้ใช้</label>
                <div class="col-12">
                    <input type="text" name="username2" id="username2" class="form-control" placeholder="username" required autofocus>
                </div>
                <div style="color:red;margin-top: 20px">ไม่พบผู้ใช้นี้ในระบบ</div>
            </div>
        </div>
        
        </div>
        <div class="modal-footer">
        <button type="button" name="save" id="save" value="insert" class="btn btn-success save">ยืนยัน</button>
        <button type="button" class="btn btn-danger cancel"  id="a_cancel" data-dismiss="modal">ยกเลิก</button>
        </div>';
    } else {
        $Email = $DATA[1]['EMAIL'] . '@' . $DATA[1]['Type'];
        echo '   <div class="modal-header header-modal">
        <h4 class="modal-title" style="color:white">ตั้ง Password ใหม่</h4>
        </div>
        <div class="modal-body" id="ChangeModalBody">
        <div class="container">
        
            <div class="row mb-4" style="margin-left: 10px">
               
                <div class="col-12">
                   ระบบได้ทำการส่ง link ไปยัง <br/>Email :' . $Email . '<br/>
                    กรุณาทำการเปลี่ยนรหัสภายใน 5 นาที
                </div>
              
            </div>
        </div>
        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger cancel"  id="a_cancel " data-dismiss="modal">ปิด</button>
        </div>';

        /*$strTo = $Email;
        $strSubject = "เปลี่ยน Password ระบบบริหารจัดการแปลงปลูกปาล์มน้ำมัน";
        $strHeader = "From: IT Support";
        $strMessage = "เรียน คุณ " . $DATA[1]['FirstName'] . " " . $DATA[1]['LastName'] . "การเปลี่ยนรหัสผ่าน";
        $flgSend = @mail($strTo, $strSubject, $strMessage, $strHeader);  // @ = No Show Error //
        if ($flgSend) {
            echo "<script>alert('pass')</script>";
        } else {
            echo "<script>alert('not pass')</script>";
        }*/
        require("PHPMailer/PHPMailerAutoload.php");
        $mail = new PHPMailer();
        $mail->IsHTML(true);
        $mail->IsSMTP();
        $mail->SMTPAuth = true; // enable SMTP authentication
        $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
        $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
        $mail->Port = 465; // set the SMTP port for the GMAIL server
        $mail->Username = "sopon0369@gmail.com"; // GMAIL username
        $mail->Password = "toyai0369"; // GMAIL password
        $mail->From = "webmaster@thaicreate.com"; // "name@yourdomain.com";
        //$mail->AddReplyTo = "support@thaicreate.com"; // Reply
        $mail->FromName = "Mr.Weerachai Nukitram";  // set from Name
        $mail->Subject = "Test sending mail.";
        $mail->Body = "My Body & <b>My Description</b>";

        $mail->AddAddress("sopon0714@gotmail.com", "Mr.sopon"); // to Address

        // $mail->AddAttachment("thaicreate/myfile.zip");
        //$mail->AddAttachment("thaicreate/myfile2.zip");

        //$mail->AddCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC
        //$mail->AddBCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC

        $mail->set('X-Priority', '1'); //Priority 1 = High, 3 = Normal, 5 = low


        if ($mail->Send()) {
            echo "<script>alert('pass')</script>";
        } else {
            echo "<script>alert('not pass')</script>";
        }
    }
} else {
    header("location:../../index.php");
}
