let idF; // value data in fertilizer and fer condition
let startF;
let endF;
let nameF;
let iconF;
let usageF;
let conditionF;
let unitF;
let aF;
let bF;
let orderF;
let aliasF;

let dataF; // data fertilizer

let mountYearChecked = false;
let abCheck = false; // IF true, input show one column 

let a2; // value a in graph
let b2; // value b in graph
let check_IU = false
let check_II = false

$(document).ready(function(){

loadDataF() // init load page

$(document).on('click','.editF',function(){ // set data in edit modal 
    let index = $(this).attr('index');
    console.log('edit')
    setValue(index);
    $("input[name='id']").val(idF);
    $("input[name='name']").val(nameF);
    $("input[name='alias']").val(aliasF);
    $("#img-update").attr('src',`../../icon/fertilizer/${idF}/${iconF}`);
    $('#addCondition').empty();

    let j = 0;
    console.log("numcon :"+Object.keys(conditionF).length); // fetch data condition
    if(Object.keys(conditionF).length > 0){
        for(i in conditionF){
            if(j>0){
                $('#addCondition').append(`
            <input type="text" class="form-control conditionInput" name="condition[]" style="margin-top:15px;" id="">
            <button type="button"  class="btn btn-danger btn-removeCondition" style="justify-self : flex-end; margin-left:15px; margin-top:15px;">x</button>
            `)
            }
            else{
                $('#addCondition').append(`
            
            <input type="text" class="form-control conditionInput" name="condition[]" id="">
            <button type="button" id="btn-addCondition" class="btn btn-success" style="justify-self : flex-end;margin-left:15px;">+</button>
    
                `)
            }
        
            $(".conditionInput:last").val(conditionF[i].Condition);
            j++;
        }
    }
    else{
        $('#addCondition').append(`
            
        <input type="text" class="form-control conditionInput" name="condition[]" id="">
        <button type="button" id="btn-addCondition" class="btn btn-success" style="justify-self : flex-end;margin-left:15px;">+</button>
            `)
    }

    if(startF == '0101' && endF == '3112'){ // set start end
        console.log('set4');
        $("#exampleRadios4").prop('checked', true);
        mountYearChecked = false;
        $("#add-mount-year").empty()
    }
    else{
        $("#exampleRadios5").prop('checked', true);
        inputMountYear();
       
    }
    $("input[name='start']").val(startF);
    $("input[name='end']").val(endF);
    $(`#exampleRadios${usageF}`).prop('checked', true);

    if(usageF == 3){
        abCheck = false;
        inputAb();
    }
    else{
        
        abCheck = true;
        inputAb();
    }

    if(unitF==1)
    $(`#exampleRadios6`).prop('checked', true);
    else
    $(`#exampleRadios7`).prop('checked', true);
    $("input[name='a']").val(aF);
    $("input[name='b']").val(bF);
    console.log('succes')
})

$(document).on('click','.editSubmit',function(){ // submit to update
    $('.editSubmit').attr('type','submit')
    let name = $("input[name='name']");
    let alias = $("input[name='alias']");
    let a = $("input[name='a']");
    let b = $("input[name='b']");
    let start = $("input[name='start']");
    let end = $("input[name='end']");
    let dataNull = [name,alias,a,b]
    if(start != undefined ){
        dataNull.push[start,end]
    }
    let dataNegative = [a,b]
    // alert('ss')
    if(!checkNull(dataNull)) return;
    if(isNaN(a.val())){
        a[0].setCustomValidity('ต้องใส่ตัวเลขเท่านั้น');
        return;
    }
    if(isNaN(b.val())){
        b[0].setCustomValidity('ต้องใส่ตัวเลขเท่านั้น');
        return;
    }
    if(!checkNegative(dataNegative)) return;
    if(!checkSameName(name,idF)) return;
    if(!checkSameAlias(alias,idF)) return;
    // if(!checkSameName(alias,idF)) return;
    // event.preventDefault();
    // $('#edit').attr("data-dismiss","modal")
    // $('#edit').modal('hide')
    
    
    let form = new FormData($('.modal-update')[0]);
    if(check_IU)
    form.append('imagebase64', $('#img-update').attr('src'))
    // $('.modal').hide();
    // $('.modal-backdrop').hide()
    $.ajax({    // update data
        type: "POST",
        data: form,
        url: "dbF.php",
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        
        success: function(result) {
            alert(result)
          loadDataF();
        //   $('.modal').show();
        //   $('.modal-backdrop').show()
        }
        });
        console.log("update");
        

})
$(document).on('click','.insertSubmit',function(e){ // insert submit
    console.log('sss');
    // e.preventdefault()
    let name = $("input[name='name_insert']");
    // let name = $(this).parent().prev().children().children().children().children().first().next()
    let alias = $("input[name='alias_insert']");
    let icon = $("#pic-logo");
    // console.log("name = "+name)

    let dataNull = [name,alias]
    // console.log('sssssssssssssssss');
    if(!checkNull(dataNull)) return;
    // console.log('pppp');
    if(!checkSameName(name,-1)) return;
    if(!checkSameAlias(alias,-1)) return;
    // console.log('bb');
    // // if(!checkSameName(alias,-1)) return;
  
    // console.log('insert');
    let form = new FormData($('#form-insert')[0]);
    if(check_II)
    form.append('imagebase64', $('#img-insert').attr('src'))
    insertF(form); // insert data
})
function loadDataF(){ // load all data in database and fetch data on wep page
    $('.bodyF').empty();
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: "dbF.php",
        data: {
          request:'select'
        },
        async:false,
        success: function(result) {
        dataF = result;

       
        // alert(data)
        let text = '';
        if(Object.keys(dataF).length>0){
            let j = 0;
            for(i in dataF){
                j++;
                let icon = `<img src="../../icon/fertilizer/${dataF[i].FID}/${dataF[i].Icon}" id="pic-Fertilizer" class="" style="border-radius: 150px;width:200px;"; >`;
                if(dataF[i].Icon == null){
                    icon = `<img src="https://via.placeholder.com/150x200.png" id="pic-Fertilizer" class="" width="150px" height="200px" >`;
                }
                text += `
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" id="card1" >
                <h6 class="m-0 font-weight-bold text-white">${dataF[i].Name}</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle editF" index=${i}   id="FID${dataF[i].FID}">
                        <i class="fas fa-cog fa-lg mr-3"  style="color:#FDFEFE"></i>
                    </a>
                    <a class="dropdown-toggle editF" index=${i}   id="FID${dataF[i].FID}" data-toggle="modal" data-target="#edit" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-trash-alt" style="color:#FDFEFE"></i>
                    </a>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body shadow" id="card1-detail">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <br>
                        <center>
                        <div class="upload-btn-wrapper">
                            ${icon}
                            
                        </div>
                            
                            <br>
                            <br>
        
                            <h5>${dataF[i].Name}</h5>
                        </center>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <h4> เงื่อนไข </h4>
                        <div>
                        `
                        loadCondition(dataF[i].FID);
                        if(Object.keys(conditionF).length>0){
                            for(k in conditionF){
                                text += `
                                <h5>${conditionF[k].Order}. ${conditionF[k].Condition}</h5>
                                `
                            }    
                        }
                        else{
                            text += `<h5>ไม่มีเงื่อนไข</h5>`
                        }
                        
                        text+=`
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="card shadow mb-4" >                
                            <div class="card-body">
                            <div class="">
                                <canvas id="lineChart${i}" height="200" width="400" ></canvas>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br>
                `
            }
            console.log("a " +dataF[i].EQ1+"b" +dataF[i].EQ2)
            $('.bodyF').append(text);
            $('.amount-fer').html(`${j} ชนิด`)
            for(i in dataF){
                let unit;
                if(dataF[i].Unit==1) unit = 'กก./ต้น'
                else unit = 'กก./ต้น/ไร่'
                a2 = dataF[i].EQ1
                b2 = dataF[i].EQ2
                console.log("b"+b2);
                new Chart(document.getElementById("lineChart"+i).getContext("2d"), getChartJs2('line',unit));
            }}
           
            
        }
        });
  
      }
      function getChartJs2(type,unit) { // set graph in wep page
        if (type === 'line') {
            config = {
                type: 'line',
                data: {
                    labels: [1, 2, 3, 4, 5, 6,7],
                    datasets: [{
                        label: "y = 2 * อายุ",
                        data: [(a2*1) + b2*1, (a2*2) + b2*1,  (a2*3) + b2*1, (a2*4) + b2*1, (a2*5) + b2*1,(a2*6) + b2*1,(a2*7) + b2*1],
                        borderColor: 'rgba(0, 188, 212, 0.75)',
                        backgroundColor: 'rgba(0, 188, 212, 0.3)',
                        pointBorderColor: 'rgba(0, 188, 212, 0)',
                        pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                        pointBorderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    legend: false,
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'อายุ (ปี)'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: unit
                            }
                        }]
                    }
                }
            }
        }
        console.log("b"+b2);
        return config;
    }
 
function insertF(data){ // function insert data
    $.ajax({
        type: "POST",
        data: data,
        url: "dbF.php",
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        
        success: function(result) {
            alert(result);
          loadDataF();
        }
        });
}
function deleteF(id){ // function delete is not working
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
            loadDataF();
      }
    };
    xhttp.open("POST", "dbF.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`id=${id}`);
}
function setValue(i){ // function set value when click edit modal
    console.log('setvalue');
      idF = dataF[i].FID;  
      startF = dataF[i].Start;
      endF = dataF[i].End;
      nameF = dataF[i].Name;
      usageF = dataF[i].Usage;
      unitF = dataF[i].Unit;
      aF = dataF[i].EQ1;
      bF = dataF[i].EQ2;
      iconF = dataF[i].Icon;
      aliasF = dataF[i].Alias;
    //   conditionF = "";
      loadCondition(idF)

        
}
function changeIcon(input){ // change icon in form
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#icon')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
$(document).on('change','#exampleRadios1',function(){ // set check usage
    abCheck = true;
    inputAb();
})
$(document).on('change','#exampleRadios2',function(){ // set check usage
    abCheck = true;
    inputAb();
})
$(document).on('change','#exampleRadios3',function(){ // set check usage
    abCheck = false;
    inputAb();
})
function inputAb(){ // set input x y
    $('.graph').empty()
    if(abCheck){
        $('.graph').append(`<div class="form-inline"  >
        <label  for="" style="margin-right:10px;">a</label>
        <input type="text" class="form-control" style="width:100px; margin-right:10px;" name="a" id="" 
        required=""  min='0'  oninput="setCustomValidity('')">
    </div>
    <div class="form-inline">
        <label for="" style="margin-right:10px;">b</label>
        <input type="text" class="form-control" style="width:100px;" name="b" id=""
        required=""  min='0'   oninput="setCustomValidity('')">
    </div>`);
    }
    else{
        $('.graph').append(`<div class="form-inline">
        <label  for="" style="margin-right:10px;">a</label>
        <input type="text" class="form-control" style="width:100px; margin-right:10px;" name="a" id=""
        required=""  min='0'   oninput="setCustomValidity('')">
    </div>`);
    }
    $("input[name='a']").val(aF);
    $("input[name='b']").val(bF);
}
$(document).on('change','#exampleRadios5',function(){ // set check start end
    inputMountYear();

})
$(document).on('change','#exampleRadios4',function(){ // set check start end
    mountYearChecked = false;
    $("#add-mount-year").empty()
})
$(document).on('click','#btn-addCondition',function(){ // more condition
    $('#addCondition').append(`
        <input type="text" class="form-control" name="condition[]" style="margin-top:15px;" id="">
        <button type="button" class="btn btn-danger btn-removeCondition" style="justify-self : flex-end; margin-left:15px; margin-top:15px;">x</button>
    `)
})
$(document).on('click','.btn-removeCondition',function(){ // delete condition
    $(this).prev().remove();
    $(this).remove();
})
function inputMountYear(){ // set input start end
    
    let radio =  $("#add-mount-year");
        if(!mountYearChecked){
            radio.append(`
            <div class="form-group">
                <div class="form-inline">
                    <label for="" style="margin-right:10px;" class="col-2">ตั้งแต่</label>
                    <input type="text" class="form-control col-6" id="alternate1" disabled/>
                    <div class="UI">
                        <button type="button" class="btn btn-warning ml-2">เลือกวันที่</button>
                        <input type="text" class="form-control ml-2" style="width:100px; margin-right:10px;" name="start" id="" value=${startF}>
                    </div>              
                </div>
            </div>
            <div class="form-group mt-2">
                <div class="form-inline">
                    <label for="" style="margin-right:10px;" class="col-2 mr-2">ถึง</label>
                    <input type="text" class="form-control col-6" id="alternate2" disabled/>
                    <div class="UI">
                        <button type="button" class="btn btn-warning ml-2">เลือกวันที่</button>
                        <input type="text" class="form-control ml-2 " style="width:100px;" name="end" id="" value=${endF}>
                    </div>
                </div>
            </div>
            `)
        }
        mountYearChecked = true;
        setDate()
        $( "input[name='start']" ).datepicker( $.datepicker.regional[ "fr" ] );
        $( "input[name='start']" ).datepicker( "option", "dateFormat", "ddmm" );
        $( "input[name='end']" ).datepicker( "option", "dateFormat", "ddmm" );
        $( "input[name='start']" ).datepicker( "option", "maxDate",endF );
        $( "input[name='end']" ).datepicker( "option", "minDate",startF );
        $( "input[name='start']" ).datepicker( "setDate", startF );
        $( "input[name='end']" ).datepicker( "setDate", endF );
        
     
}
function loadCondition(FID){ // load condition from database
    conditionF =  "";
    $.ajax({
        type: "POST",
        dataType: 'json',
        
        data: {
            request:'selectCondition',
            id:FID,
        },
        async:false,
        url: "dbF.php",
        success: function(result) {
        conditionF  =  result;
        // alert("sss")
        }
        });
} 

    
 function setDate(){ // set form date data
    var dateFormat = "ddmm"
    from = $( "input[name='start']" )
      .datepicker({
        altField: "#alternate1",
        altFormat: "DD, d MM",
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        regional:'th'
      })
      .on( "change", function() {
        to.datepicker( "option", "minDate", getDate( this ) );
      }),
    to = $( "input[name='end']" ).datepicker({
        altField: "#alternate2",
       altFormat: "DD, d MM",
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1
    })
    .on( "change", function() {
      from.datepicker( "option", "maxDate", getDate( this ) );
    });
    function getDate( element ) {
        var date;
        try {
          date = $.datepicker.parseDate( dateFormat, element.value );
        } catch( error ) {
          date = null;
        }
   
        return date;
      }
 }
 function checkSameName(name,id){ // check same name
  
        for(i in dataF){
            console.log(dataF[i].Name);
            if(name.val().trim() == dataF[i].Name && dataF[i].FID != id){
                name[0].setCustomValidity('ชื่อนี้ซ้ำ');
                return false;
            }
            else{
                name[0].setCustomValidity('');
            }
        }
    
  
    
    return true;

 } 
 function checkSameAlias(name,id){ // check same Alias
  
    for(i in dataF){
        console.log(dataF[i].Alias);
        if(name.val().trim() == dataF[i].Alias && dataF[i].FID != id){
            name[0].setCustomValidity('ชื่อนี้ซ้ำ');
            return false;
        }
        else{
            name[0].setCustomValidity('');
        }
    }



return true;

}
 function checkNull(selecter){  // check name null
    
    for( i in selecter){
       if(selecter[i].val() == ''){
        console.log('key')
        selecter[i][0].setCustomValidity('กรุณากรอกข้อมูล');
        return false;
        }else  selecter[i][0].setCustomValidity(''); 
    }
    
    return true;
 }
 function checkNegative(selecter){ // check negative 
    for( i in selecter){
    if(selecter[i].val() < 0){
        selecter[i][0].setCustomValidity('ค่าต้องไม่ติดลบ');
        return false;
    }
    else  selecter[i][0].setCustomValidity('');
}
    return true;
}
let $uploadCrop;
let re,
    rawImg,
    imageId;
let item_output;
function readFile(input) {
    if (input.files && input.files[0]) {
     var reader = new FileReader();
       reader.onload = function (e) {
           $('#cropImagePop').addClass('show');
           console.log("lllllllll")
           rawImg = e.target.result;
           check_II = true;
        loadIm();
       }
       reader.readAsDataURL(input.files[0]);
   }
   else {
    //    swal("Sorry - you're browser doesn't support the FileReader API");
   }
}
$('.divCrop').hide()
$('.buttonCrop').hide()
function loadIm(){
    $('.divName').hide()
    $('.divHolder').hide()
    $('.divCrop').show()
    $('.buttonCrop').show()
    $('.buttonSubmit').hide()
    // $('.UI').append(`<div id="upload-demo" class="center-block"></div>`)
    $uploadCrop = $('#upload-demo').croppie({
            viewport: {
                width: 200,
                height: 200,
                type:'circle'
            },
            enforceBoundary: false,
            enableExif: true
        });
    $uploadCrop.croppie('bind', {
        url: rawImg
    }).then(function(){
        console.log('jQuery bind complete');
    });
    $('.item-img').val('');
    
}
$(document).on('change','.item-img', function () { 

    readFile(this);
    
});
$(document).on('click','#cropImageBtn', function (ev) {
   
    $('#upload-demo').croppie('result',
    {type:'canvas',size:'viewport'})
    .then(function(r) { 
        $('.buttonSubmit').show()
        $('.divName').show()
        $('.buttonCrop').hide()
         $('.divHolder').show()
        $('#img-insert').attr('src', r);
        $('.divCrop').hide()
     });
     $('#upload-demo').croppie('destroy')
   
});
$(document).on('click','#cancelCrop',function(){
    $('#upload-demo').croppie('destroy')
    $('.divName').show()
    $('.divHolder').show()
    $('.divCrop').hide()
    $('.buttonCrop').hide()
    $('.buttonSubmit').show()
    // $('#img-insert').attr('src', "https://via.placeholder.com/200x200.png");
})
$('.divCU').hide()
$('.divBCU').hide()
let IMG;
let UC;
function IU(){
    
    $('.divU').hide()
    $('.divBU').hide()
    $('.divCU').show()
    $('.divBCU').show()
    // $('.UI').append(`<div id="upload-demo" class="center-block"></div>`)
    UC = $('#upload-demo2').croppie({
            viewport: {
                width: 200,
                height: 200,
                type:'circle'
            },
            enforceBoundary: false,
            enableExif: true
        });
    UC.croppie('bind', {
        url: IMG
    }).then(function(){
        console.log('jQuery bind complete');
    });
    $('#iconF').val('');
}
$(document).on('change','#iconF', function () { 
    
    let input = this
    
    if (input.files && input.files[0]) {
        var reader = new FileReader();
          reader.onload = function (e) {
              IMG = e.target.result;
              IU()
              check_IU = true;
          }
          reader.readAsDataURL(input.files[0]);
      }
      else {
       //    swal("Sorry - you're browser doesn't support the FileReader API");
      }
    
});
$(document).on('click','#cropImageBtn2', function (ev) {
    
    $('#upload-demo2').croppie('result',
    {type:'canvas',size:'viewport'})
    .then(function(r) { 
    $('.divU').show()
    $('.divBU').show()
    $('.divCU').hide()
    $('.divBCU').hide()
        $('#img-update').attr('src', r);
     });
     $('#upload-demo2').croppie('destroy')
   
});
$(document).on('click','#cancelCrop2',function(){
    $('#upload-demo2').croppie('destroy')
    $('.divU').show()
    $('.divBU').show()
    $('.divCU').hide()
    $('.divBCU').hide()
})
})