//let modalAdd = 
$( document ).ready(function() {
    let dataU;
    let pwd_md5 = 5;
    pullData();
    $('#addUser').click(function(){
        $("#addModal").modal();    
            
    });
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

    $('.btn_edit').click(function(){
        $("#editModal").modal();
        var uid = $(this).attr('uid');
        
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
    // ------------------------------------------ insert data ------------------------------------------
    $('#save').click(function(){
        let title = $("select[name = 'title']");
        let fname = $("input[name = 'fname']");
        let lname = $("input[name = 'lname']");
        let username = $("input[name = 'username']");
        let pwd = $("input[name = 'pwd']");
        let pwd1 = $("input[name = 'pwd1']");
        let mail = $("input[name = 'mail']");
        let admin = $("input[name = 'admin']");
        let research = $("input[name = 'research']");
        let operator = $("input[name = 'operator']");
        let farmer = $("input[name = 'farmer']");
        let error = $("input[name = 'error']");
        // let admin = $('#admin').val() ;
        // let research = $('#research').val();
        // let operator =$('#operator').val();
        // let farmer = $('#farmer').val();

        // console.log(admin);
        
        let data = [fname,lname,username,pwd,pwd1,mail];
  
        // if(!check_checkbox()) return;
        if(!check_blank(data)) return;
        if(!check_name(title,fname,lname)) return;
        if(!check_user(username)) return;
        if(!check_long(username)) return;
        if(!check_userName(username)) return;
        if(!check_pass(pwd,pwd1)) return;
        if(!check_mail(mail)) return;
        if(!check_checkbox(admin,research,operator,farmer,error)) return;
        
            
    })
    
    function check_long(username){
        console.log("check long");
        if(username.val().length<5 || username.val().length>25 ){
            username[0].setCustomValidity('ความยาว 5 - 25 ตัวอักษรเท่านั้น');
                return false;
        }else{
            username[0].setCustomValidity('');
        }
        return true;
    }
    function check_checkbox(){
        console.log("check box");
        if(document.formAdd.admin.checked == false && document.formAdd.research.checked == false 
            && document.formAdd.operator.checked == false && document.formAdd.farmer.checked == false)
        {
            $('#error').removeAttr('hidden');
            document.getElementById("save").setAttribute("type","button");
            return false;
        }else{
            document.getElementById("save").setAttribute("type","submit");
        }	
        
        return true;
    }
    // function check_checkbox(admin,research,operator,farmer,error){
    //     console.log("check box");
    //     if(document.formAdd.admin.checked == false && document.formAdd.research.checked == false 
    //         && document.formAdd.operator.checked == false && document.formAdd.farmer.checked == false)
    //     {
    //         error[0].setCustomValidity('กรุณาเลือกสิทธิ์การเข้าใช้งาน');
    //         return false;
    //     }else{
    //         error[0].setCustomValidity('');
    //         document.formAdd.error.checked = true;
    //     }
        
    //     return true;
    // }
    function check_userName(username){
        console.log("check userName");
        let en= /^[a-zA-Z0-9]+$/; 
        if(!username.val().match(en)){
            console.log("ต้องเป็นภาษาอังกฤษ หรือ ตัวเลขเท่านั้น");
            username[0].setCustomValidity('ต้องเป็นภาษาอังกฤษ หรือ ตัวเลขเท่านั้น');
                return false;
        }else{
            username[0].setCustomValidity('');
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
    function check_name(title,fname,lname){
        for(i in dataU){
            console.log(dataU[i].Title);
            console.log(title.val());
            if(title.val() == dataU[i].Title && fname.val().trim() == dataU[i].FirstName && lname.val().trim() == dataU[i].LastName){
                fname[0].setCustomValidity('ชื่อ-นามสกุลซ้ำ');
                return false;
            }
            else{
                fname[0].setCustomValidity('');
            }
        }
   
        return true;
    }
    function check_user(name){
        for(i in dataU){
            if(name.val().trim() == dataU[i].UserName){
                name[0].setCustomValidity('ชื่อผู้ใช้งานซ้ำ');
                return false;
            }
            else{
                name[0].setCustomValidity('');
            }
        }
   
        return true;
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
        if(!check_editUser(username,uid)) return;
        if(!check_mail(mail)) return;
        if(!check_checkboxEdit()) return;
        
    })
    function check_checkboxEdit(){
        console.log("check box");
        if(document.formEdit.e_admin.checked == false && document.formEdit.e_research.checked == false 
            && document.formEdit.e_operator.checked == false && document.formEdit.e_farmer.checked == false)
        {
            console.log("well box");
            $('#error').removeAttr('hidden');
            document.getElementById("edit").setAttribute("type","button");
            return false;
        }else{
            document.getElementById("edit").setAttribute("type","submit");
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
    function check_editUser(name,uid){
        for(i in dataU){
            if(name.val().trim() == dataU[i].UserName && dataU[i].UID != uid.val()){
                name[0].setCustomValidity('ชื่อผู้ใช้งานซ้ำ');
                return false;
            }
            else{
                name[0].setCustomValidity('');
            }
        }
   
        return true;
    }
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
 

});

    // ------------------------------------------ unblock ------------------------------------------
function unblock(_username,_uid) {

    swal({
            title: "คุณต้องการปลดบล็อค",
            text: `${_username} หรือไม่ ?`,
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            cancelButtonClass: "btn-secondary",
            confirmButtonText: "ยืนยัน",
            cancelButtonText: "ยกเลิก",
            closeOnConfirm: false,
            closeOnCancel: function() {
                $('[data-toggle=tooltip]').tooltip({
                    boundary: 'window',
                    trigger: 'hover'
                });
                return true;
            }
        },
        function(isConfirm) {
            if (isConfirm) {
                unblock_1(_uid)
                set_unblock(_uid)
            } else {
    
            }
        });
    
    }
    function unblock_1(_uid) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            window.location.href = 'OtherUsersList.php';
            // alert(this.responseText);
        }
    };
    xhttp.open("POST", "manage.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`uid=${_uid}&request=block&val=0`);
    
    }
    function set_unblock(_uid){
        // $(_uid).attr("class","btn btn-success btn-sm")
        document.getElementById(_uid).style.backgroundColor = "red";
    }
    // ------------------------------------------ block ------------------------------------------
function block(_username,_uid) {

    swal({
            title: "คุณต้องการบล็อค",
            text: `${_username} หรือไม่ ?`,
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            cancelButtonClass: "btn-secondary",
            confirmButtonText: "ยืนยัน",
            cancelButtonText: "ยกเลิก",
            closeOnConfirm: false,
            closeOnCancel: function() {
                $('[data-toggle=tooltip]').tooltip({
                    boundary: 'window',
                    trigger: 'hover'
                });
                return true;
            }
        },
        function(isConfirm) {
            if (isConfirm) {
                block_1(_uid)
                set_block(_uid)
            } else {
    
            }
        });
    
    }
    function block_1(_uid) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            window.location.href = 'OtherUsersList.php';
            // alert(this.responseText);
        }
    };
    xhttp.open("POST", "manage.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`uid=${_uid}&request=block&val=1`);
    
    }
    function set_block(_uid){
        // $(_uid).attr("class","btn btn-danger btn-sm")
        document.getElementById(_uid).style.backgroundColor = "red";
    }
    // ------------------------------------------ delete data ------------------------------------------
function delfunction(_username,_uid) {

    swal({
            title: "คุณต้องการลบ",
            text: `${_username} หรือไม่ ?`,
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            cancelButtonClass: "btn-secondary",
            confirmButtonText: "ยืนยัน",
            cancelButtonText: "ยกเลิก",
            closeOnConfirm: false,
            closeOnCancel: function() {
                $('[data-toggle=tooltip]').tooltip({
                    boundary: 'window',
                    trigger: 'hover'
                });
                return true;
            }
        },
        function(isConfirm) {
            if (isConfirm) {
    
                swal({
    
                    title: "ลบข้อมูลสำเร็จ",
                    type: "success",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "ตกลง",
                    closeOnConfirm: false,
    
                }, function(isConfirm) {
                    if (isConfirm) {
                        delete_1(_uid)
                    }
    
                });
            } else {
    
            }
        });
    
    }
    function delete_1(_uid) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            window.location.href = 'OtherUsersList.php';
            // alert(this.responseText);
        }
    };
    xhttp.open("POST", "manage.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`uid=${_uid}&request=delete`);
    
    }