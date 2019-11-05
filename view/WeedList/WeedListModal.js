var addModal =
    `<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
<form method="post" id="formAdd" name = "formAdd" action="add_Weed.php"
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header header-modal">
                <h4 class="modal-title" id="largeModalLabel" style="color:white">เพิ่มวัชพืช</h4>
            </div>
            <div class="modal-body">
                <div class='row clearfix'>
                    <div class='col-lg-3 col-md-3 col-sm-3 col-xs-6 form-control-label text-right'>
                        <label>ชื่อ : </label>
                    </div>
                    <div class='col-lg-8 col-md-8 col-sm-9 col-xs-6'>
                        <div class='form-group'>
                            <div class='form-line'>
                                <input type='text' id='name' name='tilename' class='form-control'  >
                            </div>
                        </div>
                    </div>
                </div>

                <div class='row clearfix'>
                    <div class='col-lg-3 col-md-3 col-sm-3 col-xs-6 form-control-label text-right'>
                        <label>ชื่อทางการ : </label>
                    </div>
                    <div class='col-lg-8 col-md-8 col-sm-9 col-xs-6'>
                        <div class='form-group'>
                            <div class='form-line'>
                            <input type='text' id='office-name' name='officename' class='form-control'  >
                            </div>
                        </div>
                    </div>
                </div>

                <div class='row clearfix'>
                    <div class='col-lg-3 col-md-3 col-sm-3 col-xs-6 form-control-label text-right'>
                        <label>ลักษณะ : </label>
                    </div>
                    <div class='col-lg-8 col-md-8 col-sm-9 col-xs-6'>
                        <div class='form-group'>
                            <div class='form-line'>
                                <textarea type="text" rows="2" class="form-control mb-2" name="style" id="style" placeholder="ลักษณะ" ></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='row clearfix'>
                    <div class='col-lg-3 col-md-3 col-sm-3 col-xs-6 form-control-label text-right'>
                        <label>อันตราย : </label>
                    </div>
                    <div class='col-lg-8 col-md-8 col-sm-9 col-xs-6'>
                        <div class='form-group'>
                            <div class='form-line'>
                                <textarea type="text" rows="2" class="form-control mb-2"  id="style-danger" name='styleDanger' placeholder="อันตราย" ></textarea>

                            </div>
                        </div>
                    </div>
                </div>

                <form action="./DBfiles/dbUploadImageInsect.php" method="post" enctype="multipart/form-data">

                    <div class='row clearfix'>
                        <div class='col-lg-3 col-md-3 col-sm-3 col-xs-6 form-control-label text-right'>
                            <label>รูปแมลง : </label>
                        </div>
                        <div class='col-lg-8 col-md-8 col-sm-9 col-xs-6'>
                            <div class='form-group'>
                                
                                <input type="file" id="lcon" name="lcon" >
                                
                            </div>
                        </div>
                    </div>

                    <div class='row clearfix'>
                        <div class='col-lg-3 col-md-3 col-sm-3 col-xs-6 form-control-label text-right'>
                            <label>รูปลักษณะ : </label>
                        </div>
                        <div class='col-lg-8 col-md-8 col-sm-9 col-xs-6'>
                            <div class='form-group'>
                                
                                <input type="file" id="pic-style" name="pic-style[]" multiple>
                                
                            </div>
                        </div>
                    </div>

                    <div class='row clearfix'>
                        <div class='col-lg-3 col-md-3 col-sm-3  col-xs-6 form-control-label text-right'>
                            <label>รูปลักษณะการทำลาย : </label>
                        </div>
                        <div class='col-lg-8 col-md-8 col-sm-9 col-xs-6'>
                            <div class='form-group'>
                                
                                <input type="file" id="pic-dan" name="pic-dan[]" multiple>
                                
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="hidden_id" name="hidden_id" />
                    <input type="hidden" id="hidden_type" name="hidden_type" value="insect" />
                    <button type="submit" class="btn btn-success waves-effect" id="btn_submit" style="display:none;">ADD</button>
                </form>

            </div>
            <div class="modal-footer">
            <button type="submit" name="addweed" class="btn btn-success waves-effect" id="add-data">ยืนยัน</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
        </form>
    </div>
</div>
`;