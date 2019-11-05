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


<style>
  #card-detail {
    color: white;
    background-color: #F44336;
  }

  input[type=checkbox] {
    background-color: #F44336;
    color: #F44336;
  }

  #calendar {
    max-width: 850px;
    margin: 0 auto;
    background-color: white;
    color: black;
  }
</style>


<div class="container">
  <div class="row">

    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
      <div class="card mb-4">
        <div class="card-header" id="card-detail">
          กิจกรรม
        </div>
        <div class="card-body">

          <input type="checkbox" name="vehicle1" class="checkmark" value="Bike"> ทั้งหมด <br>
          <input type="checkbox" name="vehicle1" class="checkmark1" value="Bike"> ให้ปุ๋ย<br>
          <input type="checkbox" name="vehicle1" class="checkmark2" value="Bike"> ให้น้ำ<br>
          <input type="checkbox" name="vehicle1" class="checkmark3" value="Bike"> ล้างคอขวด<br>
          <input type="checkbox" name="vehicle1" class="checkmark4" value="Bike"> จำกัดศัตรูพืช<br>
          <input type="checkbox" name="vehicle1" class="checkmark5" value="Bike"> กิจกรรมอื่นๆ<br>



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


<?php include_once("../layout/LayoutFooter.php"); ?>

<script src='../Calendar/packages/core/main.js'></script>
<script src='../Calendar/packages/interaction/main.js'></script>
<script src='../Calendar/packages/daygrid/main.js'></script>
<script src='../Calendar/packages/timegrid/main.js'></script>
<script src='../Calendar/packages/list/main.js'></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      defaultDate: '2019-08-12',
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      editable: true,
      events: [{
          title: 'Business Lunch',
          start: '2019-08-03T13:00:00',
          constraint: 'businessHours'
        },
        {
          title: 'Meeting',
          start: '2019-08-13T11:00:00',
          constraint: 'availableForMeeting', // defined below
          color: '#257e4a'
        },
        {
          title: 'Conference',
          start: '2019-08-18',
          end: '2019-08-20'
        },
        {
          title: 'Party',
          start: '2019-08-29T20:00:00'
        },

        // areas where "Meeting" must be dropped
        {
          groupId: 'availableForMeeting',
          start: '2019-08-11T10:00:00',
          end: '2019-08-11T16:00:00',
          rendering: 'background'
        },
        {
          groupId: 'availableForMeeting',
          start: '2019-08-13T10:00:00',
          end: '2019-08-13T16:00:00',
          rendering: 'background'
        },

        // red areas where no events can be dropped
        {
          start: '2019-08-24',
          end: '2019-08-28',
          overlap: false,
          rendering: 'background',
          color: '#ff9f89'
        },
        {
          start: '2019-08-06',
          end: '2019-08-08',
          overlap: false,
          rendering: 'background',
          color: '#ff9f89'
        }
      ]
    });

    calendar.render();
  });
</script>