<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Custom fonts for this template-->
    <link href="../../lib/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <link href="../../css/customize.css" rel="stylesheet">

    <link href="../../lib/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Range Slider Css -->
    <link href="../../lib/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" />
    <link href="../../lib/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet" />

    <link href='../../lib/calendar/css/fullcalendar.css' rel='stylesheet' />
    <link href='../../lib/calendar/css/fullcalendar.print.css' rel='stylesheet' media='print' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">

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
                                        <h3>เปลี่ยนรหัสผ่าน</h3>
                                    </center>
                                    <br>
                                    <div class="form-label-group">
                                        <label for="inputPassword">รหัสผ่านใหม่</label>

                                        <div class="col-12">
                                            <input class="form-control" type="password" name="password1" id="password1" placeholder="Password" required>
                                            <i class="fa fa-eye-slash eye-setting" id="hide1"></i>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="form-label-group">
                                        <label for="inputPassword">ยืนยันรหัสผ่าน</label>

                                        <div class="col-12">
                                            <input class="form-control" type="password" name="password2" id="password2" placeholder="Password" required>
                                            <i class="fa fa-eye-slash eye-setting" id="hide2"></i>
                                        </div>

                                    </div>
                                    <br />
                                    <br />
                                    <button class="btn btn-danger btn-md" style="float:right;margin-left:10px" onclick="back()">ยกเลิก</button>
                                    <button class="btn btn-success btn-md" style="float:right;" type="submit">ยืนยัน</button>
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

<script src="../../lib/jquery/jquery.min.js">
</script>
<script src="../../lib/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../../lib/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../js/sb-admin-2.min.js"></script>

<script src="../../lib/datatables/jquery.dataTables.min.js"></script>
<script src="../../lib/datatables/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    var h1 = document.getElementById('hide1');
    h1.addEventListener('click', show_hide1);
    var h2 = document.getElementById('hide2');
    h2.addEventListener('click', show_hide2);

    function show_hide1() {
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

    function show_hide2() {
        console.log("5555");
        h1.classList.toggle('active');
        if ($('#password2').attr("type") == "password") {
            $('#password2').attr('type', 'text');
            $('#hide2').removeClass("fa-eye-slash");
            $('#hide2').addClass("fa-eye");
        } else if ($('#password2').attr("type") == "text") {
            $('#password2').attr('type', 'password');
            $('#hide2').addClass("fa-eye-slash");
            $('#hide2').removeClass("fa-eye");
        }
    }

    function back() {
        window.location = '../../index.php'

    }
    $(document).ready(function() {
        $('#pass_edit').click(function() {

            $("#ChangeModal").modal();


        });
        $('.save').click(function() {
            var user = document.getElementById("username2").value;
            changepassword(user);
        });

        function changepassword(username2) {
            console.log(username2);
            $.ajax({
                type: "POST",

                data: {
                    username: username2
                },
                url: "view/ChangePassword/manage.php",
                async: false,

                success: function(result) {
                    alert(result);
                    $(".changepass").empty();
                    $(".changepass").append(result);
                }
            });
        }

    });
</script>