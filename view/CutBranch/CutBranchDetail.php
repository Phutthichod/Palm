
<?php 
    session_start();
    
    $idUT = $_SESSION[md5('typeid')];
    $CurrentMenu = "CutBranch";
?>


<?php include_once("../layout/LayoutHeader.php"); ?>

<style>
    .export-button {
        background: white;
        margin-right: 7px;
        margin-bottom: 10px;
    }

    font {
        font-family: 'Kanit';
        font-weight: normal;
    }
</style>


<div class="container">
    <div class="row">
        <div class="col-xl-12 col-12 mb-4">
            <div class="card">
                <div class="card-header card-bg">
                    <div class="row">
                        <div class="col-12">
                            <span class="link-active">รายละเอียดการล้างคอขวด</span>
                            <span style="float:right;">
                                <i class="fas fa-bookmark"></i>
                                <a class="link-path" href="#">หน้าแรก</a>
                                <span> > </span>
                                <a class="link-path" href="#">ล้างคอขวด</a>
                                <span> > </span>
                                <a class="link-path link-active" href="#">รายละเอียดการล้างคอขวด</a>
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
                <div class="card-body">
                    <div class="row">
                        <img class="img-radius" src="../../picture/default.jpg" />
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
                <div class="card-body">
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
                            <div class="row">
                                <div id='calendar' style="        
                                    margin: 0 auto;
                                    width: 100%;
                                    background-color: #FFFFFF;">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <!-- <div class="row mb-2">
                                <div class="col-xl-3 col-12">
                                    <button type="button" id="btn_comfirm" class="btn btn-outline-success btn-sm"><i class="fas fa-file-excel"></i> Excel</button>
                                    <button type="button" id="btn_comfirm" class="btn btn-outline-danger btn-sm"><i class="fas fa-file-pdf"></i> PDF</button>
                                </div>
                            </div> -->
                            <div class="table-responsive">
                                <table id="example"class="table table-bordered table-striped table-hover table-data" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ชื่อแปลง</th>
                                            <th>วันที่</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ชื่อแปลง</th>
                                            <th>วันที่</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>ไลอ้อน 1</td>
                                            <td>19/05/1996</td>
                                            <td style="text-align:center;">
                                                <button type="button" id="btn_image" class="btn btn-success btn-sm"><i class="far fa-images"></i></button>
                                                <button type="button" id="btn_delete" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ไลอ้อน 2</td>
                                            <td>19/05/1996</td>
                                            <td style="text-align:center;">
                                                <button type="button" id="btn_image" class="btn btn-success btn-sm"><i class="far fa-images"></i></button>
                                                <button type="button" id="btn_delete" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ไลอ้อน 3</td>
                                            <td>19/05/1996</td>
                                            <td style="text-align:center;">
                                                <button type="button" id="btn_image" class="btn btn-success btn-sm"><i class="far fa-images"></i></button>
                                                <button type="button" id="btn_delete" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<?php include_once("./import_Js.php"); ?>

</body>

</html>



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwVxLnsuNM9mJUqDFkj6r7FSxVcQCh4ic&callback=map_create" async defer></script>
<script src="CutBranchJS/CutBranch.js"></script>
<script src="CutBranchJS/CutBranchModal.js"></script>

<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.colVis.min.js"></script> -->

<!-- <script src="CutBranchJS/vfs_fonts.js"></script> --> -->

<script>
    let event = getByEvent();

var calendar =  $('#calendar').fullCalendar({
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
        month: 'ddd',    // Mon
        week: 'ddd d', // Mon 7
        day: 'dddd M/d',  // Monday 9/7
        agendaDay: 'dddd d'
    },
    titleFormat: {
        month: 'MMMM yyyy', // September 2009
        week: "MMMM yyyy", // September 2009
        day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
    },
    allDaySlot: false,
    selectHelper: true,
    
    events: event,
    
    eventClick: function(info) {
        
        let getModal;

        getModal = SubImageModalTemp("ไลอ้อน 2");

        $("body").append(getModal);
        $("#CutImageModal").modal('show');

    }
});

     $("#btn_image").click(function () {
        console.log("testdffe");
        $("body").append(imageModal);
        $("#imageModal").modal('show');
    });

    pdfMake.fonts = {
        THSarabun: {
            normal: 'THSarabun.ttf',
            bold: 'THSarabun-Bold.ttf',
            italics: 'THSarabun-Italic.ttf',
            bolditalics: 'THSarabun-BoldItalic.ttf'
        }
    }

    $(document).ready(function() {
        $('#example').DataTable({
            dom: '<"row"<"col-sm-12"B>>' +
                '<"row"<"col-sm-6"l><"col-sm-6"f>>' +
                '<"row"<"col-sm-12"tr>>' +
                '<"row"<"col-sm-5"i><"col-sm-7"p>>',
            buttons: [{
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel"> <font> Excel</font> </i>',
                    className: 'btn btn-outline-success btn-sm export-button'
                },
                {
                    extend: 'pdf',
                    text: '<i class="fas fa-file-pdf"> <font> PDF</font> </i>',
                    className: 'btn btn-outline-danger btn-sm export-button',
                    pageSize: 'A4',
                    customize: function(doc) {
                        doc.defaultStyle = {
                            font: 'THSarabun',
                            fontSize: 16
                        };
                    }
                }
            ]
        });
    });


    

    $("#btn_sub_image").click(function () {

        let getModal;

        getModal = SubImageModalTemp("ไลอ้อน 2");

        $("body").append(getModal);
        $("#CutImageModal").modal('show');
    });

</script>