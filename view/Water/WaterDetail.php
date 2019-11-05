<?php
session_start();
$idUT = $_SESSION[md5('typeid')];
$CurrentMenu = "Water";
$type = $_GET['type'];
?>


<?php include_once("../layout/LayoutHeader.php"); ?>


<div class="container">

    <!------------ Start Head ------------>
    <div class="row">
        <div class="col-xl-12 col-12 mb-4">
            <div class="card">
                <div class="card-header card-bg">
                    <div class="row">
                        <div class="col-12">
                            <span class="link-active">รายละเอียดการให้น้ำ</span>
                            <span style="float:right;">
                                <i class="fas fa-bookmark"></i>
                                <a class="link-path" href="#">หน้าแรก</a>
                                <span> > </span>
                                <a class="link-path" href="#">การให้น้ำ</a>
                                <span> > </span>
                                <a class="link-path link-active" href="#">รายละเอียดการให้น้ำ</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!------------ Start Card ------------>
    <div class="row mb-3">
        <div class="col-xl-6 col-12">
            <div class="card">
                <div class="card-body" id="for_card">
                    <div class="row">
                        <img class="img-radius" width="250px" src="../../picture/palm1.jpg" />
                    </div>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-xl-3 col-3 text-right">
                            <span>ชื่อสวน : </span>
                        </div>
                        <div class="col-xl-3 col-3">
                            <span> ไลอ้อนฟาร์ม</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-12">
            <div class="card">
                <div class="card-body" id="card_height">
                    <div class="row">
                        <img class="img-radius" src="../../picture/default.jpg" />
                    </div>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-xl-3 col-3 text-right">
                            <span>เกษตรกร : </span>
                        </div>
                        <div class="col-xl-4 col-3">
                            <span> บรรยาวัชร มาวัชระ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!------------ Start Calender ------------>
    <div class="row mt-3">
        <div class="col-xl-12 col-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">ปฏิทินข้อมูล</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">ตารางข้อมูล</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent" style="margin-top:20px;">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <?php
                            $calStr = "";

                            if ($type == "1") {
                                $calStr = "
                                    <div class='row'>
                                        <div class='col-12 mb-3'>
                                            <h4>ปฏิทินข้อมูล - ช่วงเวลาที่ฝนตก</h4>
                                            <div id='calendarRain' style='        
                                                margin: 0 auto;
                                                width: 100%;
                                                background-color: #FFFFFF;'>
                                            </div>
                                        </div>
                                        <div class='col-12'>
                                            <h4>ปฏิทินข้อมูล - ช่วงเวลาที่ฝนทิ้งช่วง</h4>
                                            <div id='calendarNonRain' style='        
                                                margin: 0 auto;
                                                width: 100%;
                                                background-color: #FFFFFF;'>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                            } else {
                                $calStr = "
                                    <div class='row'>
                                        <div id='calendar' style='        
                                            margin: 0 auto;
                                            width: 100%;
                                            background-color: #FFFFFF;'>
                                        </div>
                                    </div>
                                    ";
                            }

                            echo $calStr;
                            ?>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row mb-2">
                                <div class="col-xl-3 col-12">
                                    <button type="button" id="btn_comfirm" class="btn btn-outline-success btn-sm"><i class="fas fa-file-excel"></i> Excel</button>
                                    <button type="button" id="btn_comfirm" class="btn btn-outline-danger btn-sm"><i class="fas fa-file-pdf"></i> PDF</button>
                                </div>
                            </div>
                            <?php
                            $tableStr = "";

                            if ($type == "1") {
                                $tableStr = "
                                    <div class='table-responsive'>
                                        <table class='table table-bordered table-striped table-hover table-data' width='100%'>
                                            <thead>
                                                <tr>
                                                    <th>ชื่อแปลง</th>
                                                    <th>ช่วงเวลาฝนเริ่มตก</th>
                                                    <th>ช่วงเวลาฝนหยุดตก</th>
                                                    <th>ระยะเวลาฝนตก</th>
                                                    <th>ปริมาณฝน (ลบ.ม.)</th>
                                                    <th>วันที่</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>ชื่อแปลง</th>
                                                    <th>ช่วงเวลาฝนเริ่มตก</th>
                                                    <th>ช่วงเวลาฝนหยุดตก</th>
                                                    <th>ระยะเวลาฝนตก</th>
                                                    <th>ปริมาณฝน (ลบ.ม.)</th>
                                                    <th>วันที่</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <tr>
                                                    <td>ไลอ้อน 1</td>
                                                    <td>19/06/2019 16:00</td>
                                                    <td>19/06/2019 18:00</td>
                                                    <td>2 ชั่วโมง</td>
                                                    <td>200</td>
                                                    <td>19/05/1996</td>
                                                </tr>
                                                <tr>
                                                    <td>ไลอ้อน 1</td>
                                                    <td>19/06/2019 16:00</td>
                                                    <td>19/06/2019 18:00</td>
                                                    <td>2 ชั่วโมง</td>
                                                    <td>200</td>
                                                    <td>19/05/1996</td>
                                                </tr>
                                                <tr>
                                                    <td>ไลอ้อน 1</td>
                                                    <td>19/06/2019 16:00</td>
                                                    <td>19/06/2019 18:00</td>
                                                    <td>2 ชั่วโมง</td>
                                                    <td>200</td>
                                                    <td>19/05/1996</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>";
                            } else if ($type == "2") {
                                $tableStr = "
                                    <div class='table-responsive'>
                                        <table class='table table-bordered table-striped table-hover table-data' width='100%'>
                                            <thead>
                                                <tr>
                                                    <th>ชื่อแปลง</th>
                                                    <th>เวลาให้น้ำ</th>
                                                    <th>เวลาหยุดให้น้ำ</th>
                                                    <th>ระยะเวลาให้น้ำ (นาที)</th>
                                                    <th>วันที่</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>ชื่อแปลง</th>
                                                    <th>เวลาให้น้ำ</th>
                                                    <th>เวลาหยุดให้น้ำ</th>
                                                    <th>ระยะเวลาให้น้ำ (นาที)</th>
                                                    <th>วันที่</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <tr>
                                                    <td>ไลอ้อน 1</td>
                                                    <td>16:00</td>
                                                    <td>18:00</td>
                                                    <td>120</td>
                                                    <td>19/05/1996</td>
                                                </tr>
                                                <tr>
                                                    <td>ไลอ้อน 2</td>
                                                    <td>16:00</td>
                                                    <td>18:00</td>
                                                    <td>120</td>
                                                    <td>19/05/1996</td>
                                                </tr>
                                                <tr>
                                                    <td>ไลอ้อน 3</td>
                                                    <td>16:00</td>
                                                    <td>18:00</td>
                                                    <td>120</td>
                                                    <td>19/05/1996</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>";
                            } else if ($type == "3") {
                                $tableStr = "
                                    <div class='table-responsive'>
                                        <table class='table table-bordered table-striped table-hover table-data' width='100%'>
                                            <thead>
                                                <tr>
                                                    <th>ชื่อแปลง</th>
                                                    <th>จำนวนรถ</th>
                                                    <th>วันที่</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>ชื่อแปลง</th>
                                                    <th>จำนวนรถ</th>
                                                    <th>วันที่</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <tr>
                                                    <td>ไลอ้อน 1</td>
                                                    <td>120</td>
                                                    <td>19/05/1996</td>
                                                </tr>
                                                <tr>
                                                    <td>ไลอ้อน 2</td>
                                                    <td>120</td>
                                                    <td>19/05/1996</td>
                                                </tr>
                                                <tr>
                                                    <td>ไลอ้อน 3</td>
                                                    <td>120</td>
                                                    <td>19/05/1996</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>";
                            }

                            echo $tableStr;

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<?php include_once("../layout/LayoutFooter.php"); ?>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwVxLnsuNM9mJUqDFkj6r7FSxVcQCh4ic&callback=map_create" async defer></script>
<script src="Water.js"></script>
<script src="WaterModal.js"></script>

<script>
    $("#card_height").css('height', $("#for_card").css('height'));

    let type = "<?php echo $type; ?>"

    console.log(type);

    let event = [];
    let eventN = [];

    if (type == "1") {
        event = getByOne();
        eventN = getByOneHalf();
    } else if (type == "2") {
        event = getByTwo();
    } else if (type == "3") {
        event = getByThree();
    }

    if (type == "1") {
        var calendarRain = $('#calendarRain').fullCalendar({
            header: {
                left: 'title',
                center: 'agendaDay,agendaWeek,month',
                right: 'prev,next today'
            },
            firstDay: 0, //  1(Monday) this can be changed to 0(Sunday) for the USA system
            selectable: true,
            defaultView: 'month',

            axisFormat: 'h:mm',
            columnFormat: {
                month: 'ddd', // Mon
                week: 'ddd d', // Mon 7
                day: 'dddd M/d', // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM yyyy', // September 2009
                week: "MMMM yyyy", // September 2009
                day: 'MMMM yyyy' // Tuesday, Sep 8, 2009
            },
            allDaySlot: false,
            selectHelper: true,

            events: event,

            eventClick: function(info) {

                let getModal;

                if (type == "1") {
                    getModal = RainModalTemp("ไลอ้อน 2", "19/06/2019 16:00", "19/06/2019 18:00", "2ชั่วโมง", "200", "19/06/1996");

                    $("body").append(getModal);
                    $("#RainModal").modal('show');
                }

            }
        });

        var calendarNonRain = $('#calendarNonRain').fullCalendar({
            header: {
                left: 'title',
                center: 'agendaDay,agendaWeek,month',
                right: 'prev,next today'
            },
            firstDay: 0, //  1(Monday) this can be changed to 0(Sunday) for the USA system
            selectable: true,
            defaultView: 'month',

            axisFormat: 'h:mm',
            columnFormat: {
                month: 'ddd', // Mon
                week: 'ddd d', // Mon 7
                day: 'dddd M/d', // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM yyyy', // September 2009
                week: "MMMM yyyy", // September 2009
                day: 'MMMM yyyy' // Tuesday, Sep 8, 2009
            },
            allDaySlot: false,
            selectHelper: true,

            events: eventN,

            eventClick: function(info) {

                let getModal;

                if (type == "1") {
                    getModal = NonRainModalTemp("ไลอ้อน 2", "19/06/2019 16:00", "19/06/2019 18:00");

                    $("body").append(getModal);
                    $("#RainModal").modal('show');
                }

            }
        });

    } else {
        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'title',
                center: 'agendaDay,agendaWeek,month',
                right: 'prev,next today'
            },
            firstDay: 0, //  1(Monday) this can be changed to 0(Sunday) for the USA system
            selectable: true,
            defaultView: 'month',

            axisFormat: 'h:mm',
            columnFormat: {
                month: 'ddd', // Mon
                week: 'ddd d', // Mon 7
                day: 'dddd M/d', // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM yyyy', // September 2009
                week: "MMMM yyyy", // September 2009
                day: 'MMMM yyyy' // Tuesday, Sep 8, 2009
            },
            allDaySlot: false,
            selectHelper: true,

            events: event,

            eventClick: function(info) {

                let getModal;

                if (type == "2") {
                    getModal = SystemModalTemp("ไลอ้อน 2", "16:00", "18:00", "200", "19/06/1996");

                    $("body").append(getModal);
                    $("#SystemModal").modal('show');
                } else if (type == "3") {
                    getModal = ManualModalTemp("ไลอ้อน 2", "20", "19/06/1996");

                    $("body").append(getModal);
                    $("#ManualModal").modal('show');
                }

            }
        });
    }
</script>