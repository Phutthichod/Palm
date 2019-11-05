   <!-- modal add -->
   <div class="modal fade" id="insert" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <!-- header-------------------------------------------------- -->
                <div class="modal-header header-modal"> 
                    <h4 class="modal-title" id="largeModalLabel" style="color:white">เพิ่มปุ๋ย</h4>
                </div>
                <!-- start body----------------------------------------- -->
                <div class="modal-body">
                    <!-- start form----------------------------------------- -->
                    <form action="#" method="post" enctype="multipart/form-data" id="form-insert" >
                        <div class='row clearfix'>
                            <div class='col-lg-3 col-md-3 col-sm-3 col-xs-6 form-control-label text-right'>
                                <label>ชื่อปุ๋ย<span class="text-danger"> *</span></label>
                            </div>
                            <div class='col-lg-8 col-md-8 col-sm-9 col-xs-6'>
                                <div class='form-group'>
                                    <div class='form-line'>
                                        <input  id='name' name='name_insert' 
                                        class='form-control'  required=""
                                    oninput="setCustomValidity(' ')">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='row clearfix'>
                            <div class='col-lg-3 col-md-3 col-sm-3 col-xs-6 form-control-label text-right'>
                                <label>ชื่อย่อปุ๋ย<span class="text-danger"> *</span></label>
                            </div>
                            <div class='col-lg-8 col-md-8 col-sm-9 col-xs-6'>
                                <div class='form-group'>
                                    <div class='form-line'>
                                        <input type='text' id='alias' name='alias_insert' 
                                        class='form-control'  required=""
                                        oninput="setCustomValidity(' ')">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='row clearfix'>
                            <div class='col-lg-3 col-md-3 col-sm-3 col-xs-6 form-control-label text-right'>
                                <label>รูปปุ๋ย<span class="text-danger"> *</span></label>
                            </div>
                            <div class='col-lg-8 col-md-8 col-sm-9 col-xs-6'>
                                <div class='form-group'>
                                    
                                    <input type="file" id="pic-logo" name="icon_insert" 
                                    accept=".jpg,.png" required=""
                                    >
                                    
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="hidden_id" name="request" value="insert" />
                </div>
                <!-- end  body---------------------------------------------- -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect insertSubmit" id="add-data" >ยืนยัน</button>
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal" >ยกเลิก</button>
                </div>
                    </form>
                    <!-- end form---------------------------------------- -->
            </div> 
            <!-- end content -->
        </div>
        <!-- end dialog -->
    </div>
    <!-- end fade -->