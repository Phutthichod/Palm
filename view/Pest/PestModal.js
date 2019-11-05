var imageModal =
`
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header header-modal">
                <h4 class="modal-title">รูปภาพศัตรูพืช</h4>
            </div>
            <div class="modal-body" id="imageModalBody">
                <div class="container">
                    <div class="row margin-gal">
                        <a href="picture/defaultPest/01.jpg" class="col-xl-3 col-3">
                            <img src="../../picture/defaultPest/01.jpg" class="img-gal">
                        </a>
                        <a href="picture/defaultPest/02.jpg" class="col-xl-3 col-3">
                            <img src="../../picture/defaultPest/02.jpg" class="img-gal">
                        </a>
                        <a href="picture/defaultPest/03.jpg" class="col-xl-3 col-3">
                            <img src="../../picture/defaultPest/03.jpg" class="img-gal">
                        </a>
                        <a href="picture/defaultPest/04.jpg" class="col-xl-3 col-3">
                            <img src="../../picture/defaultPest/04.jpg" class="img-gal">
                        </a>
                    </div>
                    <div class="row margin-gal">
                        <a href="picture/defaultPest/05.jpg" class="col-xl-3 col-3">
                            <img src="../../picture/defaultPest/05.jpg" class="img-gal">
                        </a>
                        <a href="picture/defaultPest/06.jpg" class="col-xl-3 col-3">
                            <img src="../../picture/defaultPest/06.jpg" class="img-gal">
                        </a>
                        <a href="picture/defaultPest/07.jpg" class="col-xl-3 col-3">
                            <img src="../../picture/defaultPest/07.jpg" class="img-gal">
                        </a>
                        <a href="picture/defaultPest/08.jpg" class="col-xl-3 col-3">
                            <img src="../../picture/defaultPest/08.jpg" class="img-gal">
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>

`;

var noteModal =
`
<div class="modal fade" id="noteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header header-modal">
                <h4 class="modal-title">ข้อมูลสำคัญของศัตรูพืช</h4>
            </div>
            <div class="modal-body" id="noteModalBody">
                <span>ข้อมูล</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>

`;

var infoModal =
`
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header header-modal">
                <h4 class="modal-title">ข้อมูลลักษณะทั่วไปของศัตรูพืช</h4>
            </div>
            <div class="modal-body" id="infoModalBody">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: center;">
                        <div style="text-align: center;">
                            <img class="img-radius" src="../../picture/default.jpg" />
                        </div>
                        <hr>
                        <h4>ชื่อ : แมลง 1</h4>
                        <h4>ชื่อทางการ : แมลงเต่าทอง</h4>
                        <button type="button" id="btn_edit" class="test btn btn-warning btn-sm form-control mt-3" value="0">แก้ไขข้อมูล</button>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <h4>ลักษณะ</h4>
                        <textarea rows="10" cols="40" style="margin-bottom:20px; max-width: 270px;" readonly>ข้อมูลลักษณะ</textarea>

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
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <h4>อันตราย</h4>
                        <textarea rows="10" cols="40" style="margin-bottom:20px; max-width: 270px;" readonly>ข้อมูลอันตราย</textarea>
                        
                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
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
                            <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>

`;

var infoModal0 =
`
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: center;">
    <div style="text-align: center;">
        <img class="img-radius" src="../../picture/default.jpg" />
    </div>
    <hr>
    <h4>ชื่อ : แมลง 1</h4>
    <h4>ชื่อทางการ : แมลงเต่าทอง</h4>
    <button type="button" id="btn_edit" class="test btn btn-warning btn-sm form-control mt-3" value="0">แก้ไขข้อมูล</button>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
    <h4>ลักษณะ</h4>
    <textarea rows="10" cols="40" style="margin-bottom:20px; max-width: 270px;" readonly>ข้อมูลลักษณะ</textarea>

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
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
    <h4>อันตราย</h4>
    <textarea rows="10" cols="40" style="margin-bottom:20px; max-width: 270px;" readonly>ข้อมูลอันตราย</textarea>
    
    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
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
        <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
</div>

`;

var infoModal1 =
`
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: center;">
    <div style="text-align: center;">
        <img class="img-radius" src="../../picture/default.jpg" />
    </div>
    <hr>
    <div class="row mb-4">
        <div class="col-xl-3 col-12 text-right">
            <span>ชื่อ</span>
        </div>
        <div class="col-xl-9 col-12">
            <input type="text" class="form-control" id="rank" value="แมลง 1">
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-xl-3 col-12 text-right">
            <span>ชื่อทางการ</span>
        </div>
        <div class="col-xl-9 col-12">
            <input type="text" class="form-control" id="rank" value="แมลงเต่าทอง">
        </div>
    </div>
    <button type="button" id="btn_edit" class="test btn btn-warning btn-sm form-control mt-3" value="1">ยืนยัน</button>
    <button type="button" id="btn_cancel" class="test btn btn-light btn-sm form-control mt-3" value="1">ยกเลิก</button>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
    <h4>ลักษณะ</h4>
    <textarea rows="10" cols="40" style="margin-bottom:20px; max-width: 270px; border:1px solid #c4c4c4">ข้อมูลลักษณะ</textarea>
    <img src="../../picture/default-photo.png" id="image_upload" style="margin-left: 10%; width:200px; cursor:pointer"/>
    <input type="file" id="file_upload" style="display:none;" />
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
    <h4>อันตราย</h4>
    <textarea rows="10" cols="40" style="margin-bottom:20px; max-width: 270px; border:1px solid #c4c4c4">ข้อมูลอันตราย</textarea>
    <img src="../../picture/default-photo.png" style="margin-left: 10%; width:200px; cursor:pointer"/>
    <input type="file" style="display:none;" />
</div>
</div>

`;