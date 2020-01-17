<?php
session_start();

$idUT = $_SESSION[md5('typeid')];
$CurrentMenu = "Calendar";
?>

<?php include_once("../layout/LayoutHeader.php"); ?>

<link href='../Calendar/packages/core/main.css' rel='stylesheet' />
<link href='../Calendar/packages/daygrid/main.css' rel='stylesheet' />
<link href='../Calendar/packages/timegrid/main.css' rel='stylesheet' />
<link href='../Calendar/packages/list/main.css' rel='stylesheet' />

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
  #card-detail {
    color: white;
    background-color: #E91E63;
  }

  input[type=checkbox] {
    background-color: #F44336;
    color: #F44336;
  }

  #calendar {
    max-width: 950px;
    margin: 0 auto;
    background-color: white;
    color: black;
  }
</style>


<div class="container">
  <div class="row">

    <div class="col-lg-2 col-md-2 col-sm-12 col-xl-3 row justify-content-center">
      <div class="card">
        <div class="card-header" id="card-detail">
          ค้นหา
        </div>
        <div class="card-body" id="check">
          <form id='checkform'>
              <div class="row mb-2">
                <div class="col-12">
                  <span>ปี</span>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-12">
                  <select id="year" class="form-control selectpicker" data-live-search="true" title="กรุณาเลือกปี">
                  </select>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-12">
                  <span>จังหวัด</span>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-12">
                  <select id="province" class="form-control selectpicker" data-live-search="true" title="กรุณาเลือกจังหวัด">
                    <option value="" hidden>กรุณาเลือกจังหวัด</option>
                    <option value=0>ทั้งหมด</option>
                  </select>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-12">
                  <span>อำเภอ</span>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-12">
                  <select id="distrinct" class="form-control selectpicker" data-live-search="true" title="กรุณาเลือกอำเภอ">
                    <option value="" hidden>กรุณาเลือกอำเภอ</option>
                  </select>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-12">
                  <span>ชื่อเกษตรกร</span>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-12">
                  <input type="text" class="form-control" id="farmer">
                </div>
              </div>
            <div class="row mb-2">
              <div class="col-12">
                <span style="text-decoration:underline;">กิจกรรม</span>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
              <input type="checkbox" name="check" id='check' class="checkmark" value="เก็บเกี่ยว"> เก็บเกี่ยว<br>
                <input type="checkbox" name="check" id='check' class="checkmark" value="ให้ปุ๋ย"> ให้ปุ๋ย<br>
                <input type="checkbox" name="check" id='check' class="checkmark" value="ให้น้ำ"> ให้น้ำ<br>
                <input type="checkbox" name="check" id='check' class="checkmark" value="ขาดน้ำ"> ขาดน้ำ<br>
                <input type="checkbox" name="check" id='check' class="checkmark" value="ล้างคอขวด"> ล้างคอขวด<br>
                <input type="checkbox" name="check" id='check' class="checkmark" value="พบศัตรูพืช"> พบศัตรูพืช<br>
              </div>
            </div>
            
            <div class="row">
              <button type="button" id="search" class="btn" style="background-color:#E91E63; color:white;margin:auto; height:40px;width:90px;">ค้นหา <i class="fas fa-search"></i> </button>
            </div>
          </form>
        </div>
      </div>

    </div>
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
      <div class="card">
        <div class="card-body">
          <div id='calendar'></div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div class="grid-inline">
          <p class="title-calendar">หัวข้อ :</p>
            <p id='title' class="content-modal"></p>
            <p class="title-calendar">ชื่อเกษตรกร :</p>
            <p id='name-farmer' class="content-modal"></p>
            <p class="title-calendar">ชื่อสวน :</p>
            <p id='name-farm' class="content-modal"></p>
            <p class="title-calendar">ชื่อแปลง :</p>
            <p id='name-subfarm' class="content-modal"></p>
            <p class="title-calendar">ที่อยู่แปลง :</p>
            <p id='address-farm' class="content-modal"></p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php include_once("../layout/LayoutFooter.php"); ?>

<script src='../Calendar/packages/core/main.js'></script>
<script src='../Calendar/packages/interaction/main.js'></script>
<script src='../Calendar/packages/daygrid/main.js'></script>
<script src='../Calendar/packages/timegrid/main.js'></script>
<script src='../Calendar/packages/list/main.js'></script>

<script src='../Calendar/packages/bootstrap/main.js'></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
let calendar
function setCalendar(id){
  let date = new Date();
    date.setMonth(date.getMonth() - 1);
    let day = date.getDay();
    let month = date.getMonth();
    console.log(month)
    let year = date.getFullYear();
    var calendarEl = document.getElementById(id);
     calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: ['interaction', 'dayGrid', 'timeGrid', 'list','bootstrap'],
      themeSystem: 'bootstrap',
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth',
      },eventClick: function(info) {
        $('#title').html(info.event.title)
        $('#address-farm').html(info.event.extendedProps.address)
        $('#exampleModal').modal('show')

    // change the border color just for fun
    // info.el.style.borderColor = 'red';
  },

      buttonText: {
        today: 'วันนี้',
        month: 'เดือน',
        week: 'สัปดาห์',
        day: 'วัน',
        list: 'รายการ',
        
      },
     

      locale: 'th',
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      editable: false,
      eventOverlap: true,
      /*eventSources:
      [
        "activity.php",
         "load.php"
      ]*/
      events: [
   
  ],
      // events: "./activity.php",
      timeZone: 'local',
      defaultDate: `${year}-${month+1}-01` 
    })
        calendar.render();
    console.log('render');
    }
    

setCalendar('calendar')

$("#search").click(function() {
    calendar.destroy();
    var activity = [];
    $('.checkmark').each(function() {
      if ($(this).is(":checked")) {
        activity.push($(this).val());
      }
    });
    setCalendar("calendar")

    // calendar.getEvents().remove();
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: "testAjax.php",
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        
        success: function(result) {
          alert(result)
          calendar.addEventSource( 
            result
            )
            
        }
        });
  
    

});
    

    /*function load(data)
    {
      var sql = data;
      $.ajax({
      url: './load.php',
      type: 'POST',
     
      data: {
        activity : sql
      },
      success: function(data) {
        alert(data);
      },
    });
      

    }*/



</script>