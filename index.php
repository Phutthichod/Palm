<?php

//header("location:.././view/index/index.php");
$error = 0;
$username = "";
$password = "";

if (isset($_GET['error'])) {
    $error = $_GET['error'];
}
if (isset($_COOKIE['username']) and isset($_COOKIE['password'])) {
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Custom fonts for this template-->
    <link href="./lib/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <link href="./css/customize.css" rel="stylesheet">

    <link href="./lib/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Range Slider Css -->
    <link href="./lib/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" />
    <link href="./lib/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet" />

    <link href='./lib/calendar/css/fullcalendar.css' rel='stylesheet' />
    <link href='./lib/calendar/css/fullcalendar.print.css' rel='stylesheet' media='print' />

</head>
<style>
    body {
        background-color: #E91E63 !important;
    }

    .card-signin {
        background-color: white;
    }

    #login-header {
        color: white;
    }

    .card-signin {
        align: center;
    }

    .login-small {
        float: center;
    }
</style>

<body>

    <div style="float:center;">

        <form id="sign_in" method="POST" action="sign-in-verify.php">
            <br>
            <br>
            <br>
            <br>

            <div class="container">
                <div class="row">

                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div id="login-header">
                            <h5 class="text-center">ระบบบริหารจัดการแปลงปลูกปาล์มน้ำมัน </h5>
                            <h6 class="text-center login-small">© KU ศูนย์เทคโนโลยีชีวภาพเกษตร</h6>
                        </div>

                        <div class="card card-signin my-1">

                            <div class="card-body">
                                <form class="form-signin" method="POST" action='sign-in-verify.php'>
                                    <center>
                                        <h6>ล็อกอินเข้าสู่ระบบ</h6>
                                    </center>
                                    <br>
                                    <div class="form-label-group">
                                        <label for="inputEmail">ชื่อผู้ใช้</label>
                                        <div class="col-12">
                                            <input type="text" name="username" id="username" class="form-control" placeholder="username" value="<?php echo $username ?>" required autofocus>
                                        </div>


                                    </div>
                                    <br>
                                    <div class="form-label-group">
                                        <label for="inputPassword">รหัสผ่าน</label>

                                        <div class="col-12">
                                            <input class="form-control" type="password" name="password1" id="password1" placeholder="Password" value="<?php echo $password ?>" required>
                                            <i class="fa fa-eye-slash eye-setting" id="hide1"></i>
                                        </div>

                                    </div>
                                    <br>
                                    <?php
                                    if ($error == 1) {
                                        echo "
                                        <div class='form-label-group'>
                                            <label style='color:red'>ไม่มีชื่อผู้ใช้นี้อยู่ในระบบ</label>
                                        </div> ";
                                    } else if ($error == 2) {
                                        echo "
                                        <div class='form-label-group'>
                                            <label style='color:red'>username หรือ Password ไม่ถูกต้อง </label>
                                        </div> ";
                                    } else if ($error == 3) {
                                        echo "
                                        <div class='form-label-group'>
                                            <label style='color:red'>บัญชีของคุณถูก Block โปรดติดต่อผู้ดูแลระบบ</label>
                                        </div> ";
                                    }
                                    ?>

                                    <div class="custom-control custom-checkbox mb-1">
                                        <input type="checkbox" class="custom-control-input" id="remember" name="remember" <?php if (isset($_COOKIE['username']) and isset($_COOKIE['password'])) {
                                                                                                                                echo " checked ";
                                                                                                                            } ?>>
                                        <label class="custom-control-label" for="remember">บันทึกบัญชีผู้ใช้</label>
                                        <button class="btn btn-success btn-md" style="float:right;" type="submit">ล็อกอิน</button>


                                    </div>



                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>


</body>

</html>
<script src="lib/jquery/jquery.min.js"></script>
<script type="text/javascript">
    var h1 = document.getElementById('hide1');
    h1.addEventListener('click', show_hide);

    function show_hide() {
        console.log("5555");
        h1.classList.toggle('active');
        if ($('#password1').attr("type") == "password") {
            $('#password1').attr('type', 'text');
            $('#hide1').removeClass("fa-eye-slash");
            $('#hide1').addClass("fa-eye");
        } else if ($('#password1').attr("type") == "text") {
            $('#password1').attr('type', 'password');
            $('#hide1').addClass("fa-eye-slash");
            $('#hide1').removeClass("fa-eye");
        }
    }
</script>