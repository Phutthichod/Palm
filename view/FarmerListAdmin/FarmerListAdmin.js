var idPro = 0 ;
let listAm ;

// $("#amphure").html('');
// $("#amphure").html('<option value=1  >test</option>');



function changeProvince(data, ob)
{
    var strAm = "";
    console.log("dddddd");
    //console.log(data);
    let arrAm = [];
    let index =0;
    let id = $('#province').val()
    // console.log(data[0]['province_id'])
    for(let i =0 ; i< data.length; i++)
    {
        if(data[i]['province_id'] == id)
        {
            arrAm.push(data[i]);
        }
    }
    // $('.list-amphure').empty('')

    for (let i = 0;  i< arrAm.length; i++) {
        if(i==0)
        {
                strAm=strAm+`<option value=${arrAm[i]['name_th']} selected >${arrAm[i]['name_th'] }</option>`;  
        }
        else {
            strAm=strAm+`<option value=${arrAm[i]['name_th']}  >${arrAm[i]['name_th'] }</option>`;  

        }
                
    }
    //console.log(strAm)
    // let str = `<div class='row clearfix'>
    //                 <div class='col-lg-3 col-md-3 col-sm-3 col-xs-6 form-control-label'>
    //                     <label>อำเภอ</label>
    //                 </div>
    //                 <div class='col-lg-8 col-md-8 col-sm-9 col-xs-6'>

    //                             <select class='form-control show-tick' id='amphure' name='amphure'>`
    //                             +   strAm  +`</select>
    //                 </div>
    //             </div>`;
    //console.log(arrAm)
    // $('.list-amphure').html(str)


}
// $('#province').change(function(){
//     var idPro = $(this).val() ;
//     console.log(idPro)
//     console.log(idPro+1)
//     console.log("efs");
//     var url = "DBfiles/dbManageSearchForXML.php";
//         var data1 = "menu=searchAmphure";
//         var data2 = "id="+idPro;        
//         var hr = new XMLHttpRequest();
//         hr.open( "POST", url, true );
//         hr.setRequestHeader( "Content-type", "application/x-www-form-urlencoded");
//             hr.send( data1+"&"+data2 );
//             hr.onreadystatechange = function() {
//                 if(hr.readyState == 4 && hr.status == 200) 
//                 {
//                     var js = JSON.parse(hr.response);
//                     listAm = js ;
//                     console.log(listAm.length);
                
//                     let strAm = "";
//                     for (let i = 0;  i< listAm.length; i++) {
//                         if(i==0)
//                         {
//                              strAm=strAm+`<option value=${i} selected >${listAm[i]["name_th"]}</option>`;  
//                         }
//                         else {
//                             strAm=strAm+`<option value=${i}  >${listAm[i]["name_th"]}</option>`;  

//                         }
                             
//                     }
//                     console.log(strAm)
//                     let str = `<div class='row clearfix'>
//                                     <div class='col-lg-3 col-md-3 col-sm-3 col-xs-6 form-control-label'>
//                                         <label>อำเภอ</label>
//                                     </div>
//                                     <div class='col-lg-8 col-md-8 col-sm-9 col-xs-6'>

//                                                 <select class='form-control show-tick' id='amphure' name='amphure'>`
//                                                 +   strAm  +`</select>
//                                     </div>
//                                 </div>`;

//                     $('.list-amphure').html('');

//                     $('.list-amphure').html(str)




//             }}
    

    

    
// })


$("#farmer-add").click(function(){
    console.log("sssss")
    let modal =  ` 
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header col-white bg-red" >
                                        <h4 class="modal-title" id="largeModalLabel">เพิ่มเกษตรกร</h4>
                                    </div>
                                    <div class="modal-body">

                                        <div class='row clearfix'>
                                            <div class='col-lg-3 col-md-3 col-sm-3 col-xs-6 form-control-label'>
                                                <label>รูปโปรไฟล์ : </label>
                                            </div>
                                            <div class='col-lg-8 col-md-8 col-sm-9 col-xs-6'>
                                                <div class='form-group'>
                                                    <form action="./DBfiles/dbUploadImageFarmer.php" method="post" enctype="multipart/form-data">
                                                        <input type="file" id="pic-logo" name="pic-logo" >
                                                        <input type="hidden" id="hidden_id" name="hidden_id" />
                                                        <button type="submit" class="btn btn-success waves-effect" id="btn_submit" style="display:none;">ADD</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class='row clearfix'>
                                            <div class='col-lg-3 col-md-3 col-sm-3 col-xs-6 form-control-label'>
                                                <label>หมายเลขบัตรประชาชน : </label>
                                            </div>
                                            <div class='col-lg-8 col-md-8 col-sm-9 col-xs-6'>
                                                <div class='form-group'>
                                                    <div class='form-line'>
                                                        <input type='text' id='idcard' name='tilename' class='form-control'  >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class='row clearfix'>
                                            <div class='col-lg-3 col-md-3 col-sm-3 col-xs-6 form-control-label'>
                                                <label>ชื่อ : </label>
                                            </div>
                                            <div class='col-lg-8 col-md-8 col-sm-9 col-xs-6'>
                                                <div class='form-group'>
                                                    <div class='form-line'>
                                                        <input type='text' id='fname' name='tilename' class='form-control'  >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class='row clearfix'>
                                            <div class='col-lg-3 col-md-3 col-sm-3 col-xs-6 form-control-label'>
                                                <label>นามสกุล : </label>
                                            </div>
                                            <div class='col-lg-8 col-md-8 col-sm-9 col-xs-6'>
                                                <div class='form-group'>
                                                    <div class='form-line'>
                                                        <input type='text' id='lname' name='tilename' class='form-control'  >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class='row clearfix'>
                                            <div class='col-lg-3 col-md-3 col-sm-3 col-xs-6 form-control-label'>
                                                <label>อำเภอ : </label>
                                            </div>
                                            <div class='col-lg-8 col-md-8 col-sm-9 col-xs-6'>
                                                <div class='form-group'>
                                                    <div class='form-line'>
                                                        <input type='text' id='amphoe' name='tilename' class='form-control'  >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class='row clearfix'>
                                            <div class='col-lg-3 col-md-3 col-sm-3 col-xs-6 form-control-label'>
                                                <label>จังหวัด : </label>
                                            </div>
                                            <div class='col-lg-8 col-md-8 col-sm-9 col-xs-6'>
                                                <div class='form-group'>
                                                    <div class='form-line'>
                                                        <input type='text' id='province' name='tilename' class='form-control'  >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success waves-effect" id="add-data">ADD</button>
                                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
    $('#modal-add').append(modal);
    $('#addModal').modal('show');

    $('#add-data').click(function(){
       
        let fname =$('#fname').val();
        let lname=$('#lname').val();
        let phone=$('#phone').val();
        let province=$('#province').val();
        let amphoe=$('#amphoe').val();
        let idcard=$('#idcard').val();
       
        var url = "DBfiles/dbFarmerForXML.php";
        var data1 = "menu=insert";     
        var datalen = "fname="+fname+"&lname="+lname+"&phone="+phone+"&province="+province+"&amphoe="+amphoe+"&idcard="+idcard;
        var hr = new XMLHttpRequest();
        hr.open( "POST", url, true );
        hr.setRequestHeader( "Content-type", "application/x-www-form-urlencoded");
            hr.send( data1+"&"+datalen );
            hr.onreadystatechange = function() {
                if(hr.readyState == 4 && hr.status == 200) 
                {
                    var newId = hr.responseText.trim();
                    $("#hidden_id").val(newId);
                    $("#btn_submit").click();

                }
            }
      
    })



})

