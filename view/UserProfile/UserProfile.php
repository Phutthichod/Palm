<?php 
    session_start();
    
    $idUT = $_SESSION[md5('typeid')];
    $CurrentMenu = "UserProfile";

    include_once("../layout/LayoutHeader.php");
    include_once("../../dbConnect.php");

    $USER = $_SESSION[md5('user')];
    $id_u=$USER[1]['UID'];
    $did = $USER[1]['DID'];
    $etid = $USER[1]['ETID'];

    // echo $did;
    $sql = "SELECT * FROM `db-department` WHERE DID = $did ";
    $DEPARTMENT = selectData($sql);

    $sql1 = "SELECT * FROM `db-emailtype` WHERE ETID = $etid ";
    $EMIALTYPE= selectData($sql1);
 


    // echo $department;

?>


<div class="container">
    <div class="row">
        <div class="col-xl-12 col-12 mb-4">
            <div class="card">
                <div class="card-header card-bg">
                    บัญชีผู้ใช้
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-12 mb-4">
            <div class="row">
                <div class="col-xl-12 col-12">
                    <div class="card">
                        <div class="card-header card-bg">
                            รูปโปรไฟล์
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <img class="img-radius img-profile" src="../../picture/default.jpg" />
                            </div>
                            <div class="row mt-3">
                                <div class="col-xl-12 col-12">
                                    <input type="file" id="input_upload" style="display:none" />
                                    <button type="button" id="btn_upload" class="btn btn-primary btn-sm form-control mb-3">เปลี่ยนรูปโปรไฟล์</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-12">
                                    <button type="button" id="btn_info" class="btn btn-warning btn-sm  form-control mb-3 btn_edit"
                                    uid="<?php echo $USER[1]['UID']; ?>" title="<?php echo $USER[1]['Title']; ?>"
                                    username= "<?php echo $USER[1]['UserName']; ?>" fname="<?php echo $USER[1]['FirstName']; ?>" 
                                    lname = "<?php echo $USER[1]['LastName']; ?>" mail="<?php echo $USER[1]['EMAIL']; ?>"
                                    type_email="<?php echo $USER[1]['ETID']; ?>" department="<?php echo $USER[1]['DID']; ?>"
                                    admin = "<?php echo $USER[1]['IsAdmin']; ?>" research = "<?php echo $USER[1]['IsResearch']; ?>" 
                                    operator = "<?php echo $USER[1]['IsOperator']; ?>" farmer = "<?php echo $USER[1]['IsFarmer']; ?>">
                                    เปลี่ยนข้อมูลบัญชี</button>
                                </div>
                                <div class="col-xl-6 col-12">
                                    <button type="button" id="btn_pass" class="btn btn-success btn-sm pass_edit form-control"
                                    uid="<?php echo $USER[1]['UID']; ?>"  username= "<?php echo $USER[1]['UserName']; ?>" pass="<?php echo $USER[1]['PWD']; ?>">เปลี่ยนรหัสผ่าน</button>
                                </div>       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row mt-3">
                <div class="col-xl-12 col-12">
                    <div class="card">
                        <div class="card-header card-bg">
                            ตำแหน่งสวนปาล์ม
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 col-12 mb-2">
                                    <div id="map_area" style="width:auto; height:200px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="col-xl-8 col-12 mb-4">
            <div class="card">
                <div class="card-header card-bg">
                    รายละเอียดบัญชี
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>คำนำหน้า</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="title" value=<?php
                            if($USER[1]['Title'] ==1){
                                echo "นาย";
                            }else if($USER[1]['Title'] ==2){
                                echo "นาง";
                            }else{
                                echo "นางสาว";
                            }
                            ?> disabled>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>ชื่อ</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="firstname" value=<?php echo $USER[1]['FirstName']; ?> disabled>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>นามสกุล</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="lastname" value=<?php echo $USER[1]['LastName'] ?> disabled>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>อีเมล์</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="mail" value="<?php echo $USER[1]['EMAIL']?>@<?php echo $EMIALTYPE[1]['Type']?>" disabled>
                        </div>
                    </div>
                    <!-- <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>เบอร์โทรศัพท์</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="mail" value="0866221212" disabled>
                        </div>
                    </div> -->
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>ชื่อบัญชี</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="username" value=<?php echo $USER[1]['UserName'] ?> disabled>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>หน่วยงาน</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="department" value=<?php echo $DEPARTMENT[1]['Department']; ?> disabled> 
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                            <span>สิทธิการเข้าใช้งาน<span class="text-danger"> *</span></span>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="admin" name="admin"  value="option1" disabled
                                <?php if($USER[1]['IsAdmin'] == 1) echo "checked"; ?>>
                                <label class="form-check-label" for="inlineCheckbox1">ผู้ดูแลระบบ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="research" name="research" value="option2" disabled
                                <?php if($USER[1]['IsResearch'] == 1) echo "checked"; ?>>
                                <label class="form-check-label" for="inlineCheckbox2">นักวิจัย</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="operator" name="operator" value="option3" disabled
                                <?php if($USER[1]['IsOperator'] == 1) echo "checked"; ?>>
                                <label class="form-check-label" for="inlineCheckbox3">พนักงานทั่วไป</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="farmer" name="farmer" value="option4" disabled
                                <?php if($USER[1]['IsFarmer'] == 1) echo "checked"; ?>>
                                <label class="form-check-label" for="inlineCheckbox4">เกษตรกร</label>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("../layout/LayoutFooter.php"); ?>
<?php include_once("UserProfileModal.php"); ?>

<!-- <script src="UserProfile.js"></script> -->
<script>
// console.log("file");
$( document ).ready(function() {
    // console.log("uu");
    let dataU;
    let pwd_md5 = 5;
        pullData();
    function pullData(){
            var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    dataU = JSON.parse(this.responseText);
                    console.log(dataU);               
                };
                }
                xhttp.open("POST", "manage.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send(`request=select`);
       }
    $("#btn_info").click(function () {
        $("#editModal").modal();
        var uid = $(this).attr('uid');
        console.log("this");
        // alert(uid);
        //set all false
        document.getElementById("e_admin").checked = false;
        document.getElementById("e_research").checked = false;
        document.getElementById("e_operator").checked = false;
        document.getElementById("e_farmer").checked = false;

        var title = $(this).attr('title');
        var fname = $(this).attr('fname');
        var lname = $(this).attr('lname');
        var username = $(this).attr('username');
        var mail = $(this).attr('mail');
        var type = $(this).attr('type_email');
        var department = $(this).attr('department');
        var admin = $(this).attr('admin');
        var research = $(this).attr('research');
        var operator = $(this).attr('operator');
        var farmer = $(this).attr('farmer');
        
        $('#uid').val(uid);
        $('#e_fname').val(fname);
        $('#e_lname').val(lname);
        $('#e_username').val(username);
        $('#e_username1').val(username);
        $('#e_mail').val(mail);

        // alert(admin);
        document.getElementById("e_title").value = title;
        document.getElementById("e_type").value = type;
        document.getElementById("e_department").value = department;
        if(admin == 1){
            // alert("admin");
            document.getElementById("e_admin").checked = true;
        }
        if(research == 1){
            document.getElementById("e_research").checked = true;
        }
        if(operator == 1){
            document.getElementById("e_operator").checked = true;
        }
        if(farmer == 1){
            document.getElementById("e_farmer").checked = true;
        }
    });
    $('.pass_edit').click(function(){
        $("#passModal").modal();
        var uid = $(this).attr('uid');
        var username = $(this).attr('username');
        var pass_old = $(this).attr('pass');
        // console.log(pass_old);
        $('#pass_uid').val(uid);
        $('#pass_username').val(username);
        $('#pass_old').val(pass_old);
        console.log(uid);
        console.log(username);
    });
    // ------------------------------------------ edit password ------------------------------------------
    $('#edit_pass').click(function(){
        let old_pwd = $("input[name = 'old_pwd']");
        let pwd = $("input[name = 'e_pwd']");
        let pwd1 = $("input[name = 'e_pwd1']");
        let uid = $("input[name = 'pass_uid']");
        let username = $("input[name = 'pass_username']");
        let pass_old = $("input[name = 'pass_old']");
        
        let data = [old_pwd,pwd,pwd1];
  
        call(old_pwd,uid,username);
        if(!check_blankPass(data)) return;
        if(!check_oldPass(old_pwd,pass_old)) return;
        if(!check_pass(pwd,pwd1)) return;
        
    })
    function check_pass(pwd,pwd1){
        if(pwd.val().trim() != pwd1.val().trim()){
            pwd1[0].setCustomValidity('รหัสผ่านไม่ตรงกัน');
            return false;
        }
        else{
            pwd1[0].setCustomValidity('');
            return true;
        }
    }
    function check_blankPass(selecter){
        for(i in selecter){
            // console.log(selecter[i].val());
            if(selecter[i].val() == ''){
                //  console.log("if");
                selecter[i][0].setCustomValidity('กรุณากรอกข้อมูล');
                return false;
            }else{
                // console.log("else");
                selecter[i][0].setCustomValidity('');
            }            
        }
        return true;
    }
    function call(old_pwd,uid,username){
        var pwd = uid.val()+username.val()+(old_pwd.val());
        makemd5(pwd);
    }
    function check_oldPass(old_pwd,pass_old){
            // console.log(pwd_md5.trim());
            // console.log(pass_old.val().trim());
            
                    if(pwd_md5.trim() != (pass_old.val().trim())){
                        // console.log("password duplicate");
                        old_pwd[0].setCustomValidity('รหัสผ่านไม่ถูกต้อง');
                        return false;
                    }
                    else{
                        old_pwd[0].setCustomValidity('');
                    }
                    return true;           
        
    }
    function makemd5(pwd){
        $.ajax({    // update data
            type: "POST",
            data: {pwd: pwd,request:'md5'},
            url: "manage.php",
            async: false,
            
            success: function(result) {
                pwd_md5 = result;
                // console.log(pwd_md5); 
            }
            });
    }
     // ------------------------------------------ edit data ------------------------------------------
     $('#edit').click(function(){
        let title = $("select[name = 'e_title']");
        let fname = $("input[name = 'e_fname']");
        let lname = $("input[name = 'e_lname']");
        let username = $("input[name = 'e_username1']");
        let mail = $("input[name = 'e_mail']");
        let uid = $("input[name = 'uid']");
        
        let data = [fname,lname,username,mail];
  
        if(!check_blank(data)) return;
        if(!check_editName(title,fname,lname,uid)) return;
        // if(!check_editUser(username,uid)) return;
        if(!check_mail(mail)) return;
        if(!check_checkboxEdit()) return;
        
    })
    function check_checkboxEdit(){
        console.log("check box");
        if(document.formEdit.e_admin.checked == false && document.formEdit.e_research.checked == false 
            && document.formEdit.e_operator.checked == false && document.formEdit.e_farmer.checked == false)
        {
            $('#error').removeAttr('hidden');
            document.getElementById("edit").setAttribute("type","button");
            return false;
        }else{
            document.getElementById("edit").setAttribute("type","submit");
        }	
        
        return true;
    }
    function check_mail(mail){

        let email=/^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)?$/i;
        if(!mail.val().match(email)){
            mail[0].setCustomValidity('กรอกอีเมลล์ไม่ถูกต้อง');
            return false;
        }else{
            mail[0].setCustomValidity('');
        }
        return true;
    }
    function check_blank(selecter){
        for(i in selecter){
            // console.log(selecter[i].val());
            if(selecter[i].val().trim() == ''){
                //  console.log("if");
                selecter[i][0].setCustomValidity('กรุณากรอกข้อมูล');
                return false;
            }else{
                // console.log("else");
                selecter[i][0].setCustomValidity('');
            }            
        }
        return true;
    }
    function check_editName(title,fname,lname,uid){
        for(i in dataU){
            console.log(dataU[i].Title);
            console.log(title.val());
            if(title.val() == dataU[i].Title && fname.val().trim() == dataU[i].FirstName && lname.val().trim() == dataU[i].LastName && dataU[i].UID != uid.val()){
                fname[0].setCustomValidity('ชื่อ-นามสกุลซ้ำ');
                return false;
            }
            else{
                fname[0].setCustomValidity('');
            }
        }
   
        return true;
    }
    // function check_editUser(name,uid){
    //     for(i in dataU){
    //         if(name.val().trim() == dataU[i].UserName && dataU[i].UID != uid.val()){
    //             name[0].setCustomValidity('ชื่อผู้ใช้งานซ้ำ');
    //             return false;
    //         }
    //         else{
    //             name[0].setCustomValidity('');
    //         }
    //     }
   
    //     return true;
    // }
 
    $("#btn_upload").click(function () {
        $("#input_upload").click();
    });

});
</script>

