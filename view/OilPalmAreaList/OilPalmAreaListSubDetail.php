
<?php 
    session_start();
    
    $idUT = $_SESSION[md5('typeid')];
    $CurrentMenu = "OilPalmAreaList";
?>


<?php include_once("../layout/LayoutHeader.php"); ?>

<div class="container">
    <div class="row">
        <div class="col-xl-12 col-12 mb-4">
            <div class="card">
                <div class="card-header card-bg">
                    <div class="row">
                        <div class="col-12">
                            <span class="link-active">รายละเอียดแปลงปลูก</span>
                            <span style="float:right;">
                                <i class="fas fa-bookmark"></i>
                                <a class="link-path" href="#">หน้าแรก</a>
                                <span> > </span>
                                <a class="link-path" href="#">รายชื่อสวนปาล์มน้ำมัน</a>
                                <span> > </span>
                                <a class="link-path" href="#">รายละเอียดสวนปาล์มน้ำมัน</a>
                                <span> > </span>
                                <a class="link-path link-active" href="#">รายละเอียดแปลงปลูก</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-xl-6 col-12">
            <div class="card">
                <div class="card-body" id="for_card">
                    <div class="row">
                        <img class="img-radius" src="../../picture/palm1.jpg" />
                    </div>
                    <div class="row mt-1 justify-content-center">
                        <div class="col-xl-3 col-3 text-right">
                            <span>ชื่อสวน : </span>
                        </div>
                        <div class="col-xl-3 col-3">
                            <span> ไลอ้อนฟาร์ม</span>
                        </div>
                    </div>
                    <div class="row mt-1 justify-content-center">
                        <div class="col-xl-3 col-3 text-right">
                            <span>ชื่อแปลง : </span>
                        </div>
                        <div class="col-xl-3 col-3">
                            <span> ไลอ้อนแปลง 1</span>
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
    <div class="row">
        <div class="col-xl-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-xl-2 col-2">
                            <span>ที่อยู่ : </span>
                        </div>
                        <div class="col-xl-10 col-10">
                            <span>69/30 หมู่ 8 ต.บางจาก อ.พระประะแดง จ.สมุทรปราการ 10130</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-2 col-2">
                            <span>พื้นที่แปลงปลูก : </span>
                        </div>
                        <div class="col-xl-10 col-10">
                            <span>5 ไร่ 2 งาน 50 วา</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 mb-3">
                            <button type="button" id="btn_edit_subdetail1" style="float:right;" class="btn btn-warning btn-sm">แก้ไขข้อมูลแปลง</button>
                        </div>
                        <div class="col-xl-6 col-12">
                            <div id="map_area_detail" style="width:auto; height:400px;"></div>
                        </div>
                        <div class="col-xl-6 col-12">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="" src="../../picture/defaultPalm.jpg" >
                                    </div>
                                    <div class="carousel-item">
                                        <img class="" src="../../picture/defaultPalm.jpg" >
                                    </div>
                                    <div class="carousel-item">
                                        <img class="" src="../../picture/defaultPalm.jpg" >
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-xl-12 col-12">
            <div class="card">
                <div class="card-header card-bg">
                    <h4>1630 ต้น อายุ 2 ปี 1 เดือน 2 วัน</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6 col-12">
                            <div class="row mb-3">
                                <div class="col-xl-2 col-2">
                                    <span>ปลูก : </span>
                                </div>
                                <div class="col-xl-5 col-5">
                                    <span> 10 เมษายน 2562</span>
                                </div>
                                <div class="col-xl-5 col-5">
                                    <span>2000 ต้น</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-xl-2 col-2">
                                    <span>ซ่อม 1 : </span>
                                </div>
                                <div class="col-xl-5 col-5">
                                    <span> 12 เมษายน 2562</span>
                                </div>
                                <div class="col-xl-5 col-5">
                                    <span>150 ต้น</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-xl-2 col-2">
                                    <span>ซ่อม 2 : </span>
                                </div>
                                <div class="col-xl-5 col-5">
                                    <span> 13 เมษายน 2562</span>
                                </div>
                                <div class="col-xl-5 col-5">
                                    <span>90 ต้น</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-xl-2 col-2">
                                    <span>ตาย : </span>
                                </div>
                                <div class="col-xl-5 col-5">
                                    <span> 15 เมษายน 2562</span>
                                </div>
                                <div class="col-xl-5 col-5">
                                    <span>-200 ต้น</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-12">
                            <div class="row">
                                <div class="col-8">
                                    <canvas id="plantPie"></canvas>
                                </div>
                                <div class="col-4">
                                    <div class="row mt-2">
                                        <div class="col-3 mt-1">
                                            <div style="width: 30px; height: 15px; background-color: #00ce68; "></div>
                                        </div>
                                        <div class="col-9">
                                            <span style="">ปลูก 50 %</span>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-3 mt-1">
                                            <div style="width: 30px; height: 15px; background-color: #f6c23e; "></div>
                                        </div>
                                        <div class="col-9">
                                            <span style="">ซ่อม 40 %</span>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-3 mt-1">
                                            <div style="width: 30px; height: 15px; background-color: #e74a3b; "></div>
                                        </div>
                                        <div class="col-9">
                                            <span style="">ตาย 10 %</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4 mb-4">
        <div class="col-xl-12 col-12">
            <div class="card">
                <div class="card-header card-bg">
                    <div class="row">
                        <div class="col-6">
                            <a href="OilPalmAreaVolDetail.php" style="text-decoration: none;"><h4>ผลผลิต</h4></a>
                        </div>  
                        <div class="col-6">
                            <select id="year" class="form-control" style="width:20%; float:right;">
                                <option>2562</option>
                                <option selected>2561</option>
                                <option>2560</option>
                            </select>
                        </div>  
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-6 col-12">
                            <canvas id="productYear" style="height:250px;"></canvas>
                        </div>
                        <div class="col-xl-6 col-12">
                            <canvas id="productMonth" style="height:250px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4 mb-4">
        <div class="col-xl-12 col-12">
            <div class="card">
                <div class="card-header card-bg">
                    <h4>ปริมาณการใส่ปุ๋ย</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <div class="row">
                                <div class="col-4">
                                    <canvas id="ferYear1" style="height:250px;"></canvas>
                                </div>
                                <div class="col-4">
                                    <canvas id="ferYear2" style="height:250px;"></canvas>
                                </div>
                                <div class="col-4">
                                    <canvas id="ferYear3" style="height:250px;"></canvas>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 text-center">
                                    <span style="margin-left: 17%;">โดโลไมท์</span>
                                </div>
                                <div class="col-4 text-center">
                                    <span style="margin-left: 17%;">ปุ๋ยสร้างต้น</span>
                                </div>
                                <div class="col-4 text-center">
                                    <span style="margin-left: 17%;">ปุ๋ยผลผลิต</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editSubDetailModal1" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header header-modal">
                    <h4 class="modal-title">แก้ไขข้อมูลแปลงปลูก</h4>
                </div>
                <div class="modal-body" id="addModalBody">
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>ชื่อสวน</span>
                        </div>
                        <div class="col-xl-8 col-12">
                            <input type="text" class="form-control" id="rank" value="ไลอ้อนฟาร์ม">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>ชื่อแปลง</span>
                        </div>
                        <div class="col-xl-8 col-12">
                            <input type="text" class="form-control" id="rank" value="ไลอ้อนแปลง 1">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>ที่อยู่</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <input type="text" class="form-control" id="rank">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>จังหวัด</span>
                        </div>
                        <div class="col-xl-9 col-12">
                        <select class="form-control" id="province" name="province">
                            <option selected="" disabled="">เลือกจังหวัด</option>
                            <?php 
                                require 'data.php';
                                $province = loadProvince();
                                foreach ($province as $province) {
                                echo "<option id='".$province['AD1ID']."' value='".$province['AD1ID']."'>".$province['Province']."</option>";
                                }
                           ?>
		                </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>อำเภอ</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <select id="distrinct" name="distrinct" class="form-control">
                                <option selected="" disabled="">เลือกอำเภอ</option>
                                       
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>ตำบล</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <select id="subdistrinct" name="subdistrinct" class="form-control">
                                <option selected="" disabled="">เลือกตำบล</option>
                                       
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-3 col-12 text-right">
                            <span>พื้นที่</span>
                        </div>
                        <div class="col-xl-9 col-12">
                            <div class="row">
                                <div class="col-3">
                                    <input type="number" class="form-control" id="lastname" value="5">
                                </div>
                                <div class="col-3 mt-1">
                                    <span>ไร่</span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-3">
                                    <input type="number" class="form-control" id="lastname" value="2">
                                </div>
                                <div class="col-3 mt-1">
                                    <span>งาน</span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-3">
                                    <input type="number" class="form-control" id="lastname" value="50">
                                </div>
                                <div class="col-3 mt-1">
                                    <span>วา</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">ยืนยัน</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("../layout/LayoutFooter.php"); ?>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwVxLnsuNM9mJUqDFkj6r7FSxVcQCh4ic&callback=map_create_subdetail" async defer></script>
<script src="OilPalmAreaList.js"></script>
<script src="OilPalmAreaListModal.js"></script>
<script src="OilPalmAreaListModal.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			$("#province").change(function(){
				var aid = $("#province").val();
				$.ajax({
					url: 'data.php',
					method: 'post',
					data: 'aid=' + aid
				}).done(function(distrinct){
					console.log(distrinct);
					distrinct = JSON.parse(distrinct);
					$('#distrinct').empty();
					distrinct.forEach(function(a){
                        $('#distrinct').append('<option value='+ a.AD2ID +'>' + a.Distrinct + '</option>')
                        //<option id='".$province['AD1ID']."' value='".$province['AD1ID']."'>".$province['Province']."</option>
					})
				})
            })

        })
        $(document).ready(function(){
            $("#distrinct").change(function(){
				var did = $("#distrinct").val();
				$.ajax({
					url: 'data.php',
					method: 'post',
					data: 'did=' + did
				}).done(function(subdistrinct){
					console.log(subdistrinct);
					subdistrinct = JSON.parse(subdistrinct);
					$('#subdistrinct').empty();
					subdistrinct.forEach(function(a){
						$('#subdistrinct').append('<option value='+ a.AD3ID +'>' + a.subDistrinct + '</option>')
					})
				})
            })
            
        })
        
</script>

<script>

    $("#card_height").css('height', $("#for_card").css('height'));

    $("#btn_add_subgarden").click(function () {
        $("body").append(addSubGardenModal);
        $("#addSubGardenModal").modal('show');
    });

    $("#btn_edit_subdetail1").click(function () {
        $("body").append(editSubDetailModal);
        $("#editSubDetailModal1").modal('show');
    });

    $("#btn_info").click(function () {
        console.log("testefe");
    });

    $("#btn_delete").click(function () {
        swal({
            title: "ยืนยันการลบข้อมูล",
            icon: "warning",
            buttons:  ["ยกเลิก", "ยืนยัน"],
        });
    });

    var chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
        display: true,
        position: 'top',
        labels: {
        boxWidth: 50,
        fontColor: 'black'
        }
    },
    };

    var speedData = {
    labels: ["ปลูก", "ซ่อม", "ตาย"],
    datasets: [{
        label: "Demo Data 1",
        data: [50,40,10],
        backgroundColor: ["#00ce68", "#f6c23e", "#e74a3b"]
    }]
    };

    var ctx = $("#plantPie");
    var plantPie = new Chart(ctx, {
        type: 'pie',
        data: speedData,
        options: chartOptions
    });


var chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      display: false,
      position: 'top',
      labels: {
        boxWidth: 80,
        fontColor: 'black'
      }
    },
    scales: {
      yAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'ผลผลิต (ก.ก.)'
        },
        gridLines: {
            display:true
        }
      }],
      xAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'รายปี'
        },
        gridLines: {
            display:false
        }
      }],
    }
  };

  var speedData = {
    labels: ["2560", "2561", "2562"],
    datasets: [
    {
      label: "Demo Data 1",
      data: [100, 50, 25],
      backgroundColor: '#00ce68'
    }]
  };

    var ctx = $("#productYear");
    var plantPie = new Chart(ctx, {
        type: 'bar',
        data: speedData,
        options: chartOptions
    });

    var chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      display: true,
      position: 'top',
      labels: {
        boxWidth: 80,
        fontColor: 'black'
      }
    },
    scales: {
      yAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'ผลผลิต (ก.ก.)'
        },
        gridLines: {
            display:true
        }
      }],
      xAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'รายเดือน'
        },
        gridLines: {
            display:false
        }
      }],
    }
  };

  var speedData = {
    labels: ["ม.ค.", "ก.พ.", "มี.ค.", 
            "เม.ย", "พ.ค.", "มิ.ย.",
            "ก.ค.", "ส.ค.", "ก.ย.",
            "ต.ค.", "พ.ย.", "ธ.ค."],
    datasets: [{
      label: "ปี 2561",
      data: [100, 50, 25,
            90, 40, 25,
            60, 60, 30,
            80, 40, 70],
      backgroundColor: '#05acd3'
    }]
  };

    var ctx = $("#productMonth");
    var plantPie = new Chart(ctx, {
        type: 'bar',
        data: speedData,
        options: chartOptions
    });



    //Fer section

    var chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      display: false,
      position: 'top',
      labels: {
        boxWidth: 80,
        fontColor: 'black'
      }
    },
    scales: {
      yAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'ปริมาณปุ๋ย (ก.ก.)'
        },
        gridLines: {
            display:true
        },
        ticks: {
            min: 0,
            max: 100,
            beginAtZero: true,
            stepSize: 20
        }
      }],
      xAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'รายปี'
        },
        gridLines: {
            display:false
        }
      }],
    }
  };

  var speedData = {
    labels: ["2560", "2561", "2562"],
    datasets: [
    {
        label: 'Line Dataset',
        data: [90, 90, 90],
        type: 'line',
        backgroundColor: 'transparent',
        borderColor: 'black'
    },
    {
      label: "Demo Data 1",
      data: [70, 50, 60],
      backgroundColor: '#05acd3'
    }]
  };

    var ctx = $("#ferYear1");
    var plantPie = new Chart(ctx, {
        type: 'bar',
        data: speedData,
        options: chartOptions
    });


    
    var chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      display: false,
      position: 'top',
      labels: {
        boxWidth: 80,
        fontColor: 'black'
      }
    },
    scales: {
      yAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'ปริมาณปุ๋ย (ก.ก.)'
        },
        gridLines: {
            display:true
        },
        ticks: {
            min: 0,
            max: 100,
            beginAtZero: true,
            stepSize: 20
        }
      }],
      xAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'รายปี'
        },
        gridLines: {
            display:false
        }
      }],
    }
  };

  var speedData = {
    labels: ["2560", "2561", "2562"],
    datasets: [
    {
        label: 'Line Dataset',
        data: [90, 90, 90],
        type: 'line',
        backgroundColor: 'transparent',
        borderColor: 'black'
    },
    {
      label: "Demo Data 1",
      data: [100, 90, 90],
      backgroundColor: '#00ce68'
    }]
  };

    var ctx = $("#ferYear2");
    var plantPie = new Chart(ctx, {
        type: 'bar',
        data: speedData,
        options: chartOptions
    });


    
    var chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      display: false,
      position: 'top',
      labels: {
        boxWidth: 80,
        fontColor: 'black'
      }
    },
    scales: {
      yAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'ปริมาณปุ๋ย (ก.ก.)'
        },
        gridLines: {
            display:true
        },
        ticks: {
            min: 0,
            max: 100,
            beginAtZero: true,
            stepSize: 20
        }
      }],
      xAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'รายปี'
        },
        gridLines: {
            display:false
        }
      }],
    }
  };

  var speedData = {
    labels: ["2560", "2561", "2562"],
    datasets: [
    {
        label: 'Line Dataset',
        data: [90, 90, 90],
        type: 'line',
        backgroundColor: 'transparent',
        borderColor: 'black'
    },
    {
      label: "Demo Data 1",
      data: [80, 40, 60],
      backgroundColor: '#f6c23e'
    }]
  };

    var ctx = $("#ferYear3");
    var plantPie = new Chart(ctx, {
        type: 'bar',
        data: speedData,
        options: chartOptions
    });



</script>