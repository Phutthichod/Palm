function map_create()
{
    var startLatLng = new google.maps.LatLng(13.736717, 100.523186);
    
    var map = new google.maps.Map(document.getElementById('map_area'), {
        // center: { lat: 13.7244416, lng: 100.3529157 },
        center:  startLatLng ,
        zoom: 8,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    map.markers = [];
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(13.736717, 100.523186),
        map: map,
        title:"test"
    });
    map.markers.push(marker);
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(13.814029, 100.037292),
        map: map,
        title:"test"
    });
    map.markers.push(marker);
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(13.361143, 100.984673),
        map: map,
        title:"test"
    });
    map.markers.push(marker);

    var citymap = {
        chicago: {
          center: {lat: 13.736717, lng: 100.523186},
          population: 90000,
          color: '#e74a3b'
        },
        newyork: {
          center: {lat: 13.814029, lng: 100.037292},
          population: 90000,
          color: '#f6c23e'
        },
        losangeles: {
          center: {lat: 13.361143, lng: 100.984673},
          population: 90000,
          color: '#1cc88a'
        },
      };

    for (var city in citymap) {
        // Add the circle for this city to the map.
        var cityCircle = new google.maps.Circle({
          strokeColor: citymap[city].color,
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: citymap[city].color,
          map: map,
          center: citymap[city].center,
          radius: Math.sqrt(citymap[city].population) * 100
        });
      }


}

$("#palmvolsilder").ionRangeSlider({
    type: "double",
    grid: true,
    from: 1,
    to: 5,
    values: [0, 10, 100, 1000, 10000, 100000, 1000000]
});


$(document).on('click','.delete',function(){
  delfunction($(this).attr('data-fid'),$(this).attr('data-alias'))
})
function delfunction(_fid,_alias) {
  // alert(_did);
  swal({
          title: "คุณต้องการลบ",
          text: `แปลง ${_alias} หรือไม่ ?`,
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          cancelButtonClass: "btn-secondary",
          confirmButtonText: "ยืนยัน",
          cancelButtonText: "ยกเลิก",
          closeOnConfirm: false,
          closeOnCancel: function() {
              $('[data-toggle=tooltip]').tooltip({
                  boundary: 'window',
                  trigger: 'hover'
              });
              return true;
          }
      },
      function(isConfirm) {
          if (isConfirm) {
              swal({
                  console: "Delete",
                  title: "ลบข้อมูลสำเร็จ",
                  type: "success",
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "ตกลง",
                  closeOnConfirm: false,
              }, function(isConfirm) {
                  if (isConfirm) {
                      console.log("delete");
                      delete_1(_fid);
                  }
              });
          } else {
  
          }
      });
  }
  function delete_1(_fid) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log("delete_1");
        window.location.href = 'OilPalmAreaVolDetail.php';
        // alert(this.responseText);
      }
  };
  xhttp.open("POST", "manage.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(`request=update&fid=${_fid}`);
  
  }

  function loadYear() {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            $("#card-productPerYear").append(text);

        }
    };
    xhttp.open("POST", "./getProductPerYear.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`year=${_year}`);
}
  function f1(result){
    let text = ''
    for(i in result){
      text += `<tr>
                  <td>${result[i].alias}</td>
                  <td>${result[i].modifyday}-${result[i].modifymonth}-${result[i].modifyyear}</td>
                  <td>${result[i].weight}</td>
                  <td>${result[i].price}</td>
                  <td>${result[i].totalprice}</td>
                  <td style="text-align:center;">
                    <button type="button" class="btn btn-info btn-sm" onclick="$('#imageModal').modal('show')"><i class="fas fa-images"></i></button>
                    <button type="button" class="btn btn-danger btn-sm delete" data-fid="${result[i].ID}"  data-alias = ${result[i].alias}" ><i class="far fa-trash-alt"></i></button>
                  </td>
                </tr>`
    }
    $('#table').html(text)
  }

  function f2(result){
  
    let year = parseInt(result[0].modifyyear)
    let weight = 0
    let price = 0
    for(i in result){
      weight = parseInt(weight) + parseInt(result[i].weight)
      price = parseInt(price) + parseInt(result[i].totalprice)
    }
    // text += weight 
    $('#sumyear').html(year)
    $('#sumweight').html(weight)
    $('#sumprice').html(price)
  }

  function f3(result){
    $('.productMonth').html(` <canvas id="productMonth" style="height:200px;"></canvas>`)
    let year = undefined;
    let data = [0,0,0,0,0,0,0,0,0,0,0,0]
    let text = ''
    for(let i = 0 ; i < 12 ; i++){
      if(result[i] != undefined){
        data[parseInt(result[i].modifymonth)-1] += parseInt(result[i].weight)
        if(year == undefined)
           year = (result[i].modifyyear)
      }
      // if(result[i]!=undefined){
      //   data.push(result[i].modifymonth)
      //  if(year!=undefined)
      //     year = (result[i].modifyyear)-1
      // }
      // else data.push(0)
    }
      $('#productMonth').html(text)
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
    
          label: "ปี "+year,
          data:data,
          backgroundColor: '#05acd3'
        }]
      };
    
        var ctx = $("#productMonth");
        var plantPie = new Chart(ctx, {
            type: 'bar',
            data: speedData,
            options: chartOptions
        });
    

  }

  $(document).ready(function () {
    var d = new Date();
    var n = d.getFullYear()+543;
    loadChart(n-1)
    function loadChart(year){
      $.ajax({
        type: "POST",
        datatype: 'json',
        url: "manage.php",
        data: {
          year:year,
          // year:2562,
          request:'getYear'
        },
        async: false,
        success: function (result) {
          // let a = "{a:'p'}"
          // a = JSON.parse(a)
          console.log(result)
          result = JSON.parse(result)
            
            f1(result)
            f2(result)
            f3(result)
          // alert(result[0].ID)
        }
      })
    }
    $(document).on('change', '#productPerYear', function () {
     loadChart( $(this).val())
    });
    
    $('.btn_image').click(function(){
      $("body").append(imageModal);
        $("#imageModal").modal('show');
    });

    $("#btn_add_product").click(function () {
      $("body").append(addProductModal);
      $("#addProductModal").modal();
    });

    function pullData(){
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          dataD = JSON.parse(this.responseText);
           console.log(dataD);  
         
      };
      }
      xhttp.open("POST", "manage.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send(`request=select`);
    }

    $('#save').click(function(){
      // console.log("save");
      let FarmID = $("input[name = 'SubFarmID']");
      let weight = $("input[name = 'weight']");
      let UnitPrice = $("input[name = 'UnitPrice']");
      let data = [FarmID,weight,UnitPrice];

      if(!checkEmpty(data)) return;
      if(!checkMinus(data)) return;
      if(!checkDupicate(data)) return;
      if(!checkSameChar(weight)) return;
      if(!checkSameChar(UnitPrice)) return;

    }) 

    function checkMinus(selecter)
    {
      for( i in selecter){
        if(selecter[i].val() < 0){
            selecter[i][0].setCustomValidity('ค่าต้องไม่ติดลบ');
            return false;
        }
        else  selecter[i][0].setCustomValidity('');
      }
        return true;
    }
    function checkFuture(selecter,thisyear)
    {
      for( i in selecter){
        if(selecter[i].val() > thisyear){
            selecter[i][0].setCustomValidity('ไม่สามารถบันทึกข้อมูลในอนาคต');
            return false;
        }
        else  selecter[i][0].setCustomValidity('');
      }
        return true;
    }
    function checkDupicate(data)
    {
      for(i in dataD){
        if(checkName(name) && checkYear(name) && checkPrice(name) && checkWeight(name)){
            name[0].setCustomValidity('ข้อมูลซ้ำ');
            return false;
        }
        else{
            name[0].setCustomValidity('');
        }
    }

    return true;
    }
    function checkEmpty(selecter)
    {
      for(i in selecter){
        if(selecter[i].val().trim() == ''){
            selecter[i][0].setCustomValidity('กรุณากรอกข้อมูล');
            return false;
        }else{
            selecter[i][0].setCustomValidity('');
        }            
    }
    return true;
    }
    function checkSameChar(selecter)
    {
      for(i in selecter){
        if(selecter[i].val){
          selecter[i][0].setCustomValidity('อักษรพิเศษซ้ำ');
          return false;
        }else{
          selecter[i][0].setCustomValidity('');
        } 
      }
    }

    function checkName(name)
    {
      for(i in dataD){
        console.log(dataD[i].Name);
        if(name.val().trim() == dataD[i].DIMsubFID ){
            name[0].setCustomValidity('');
            return false;
        }
        else{
            name[0].setCustomValidity('');
        }
      }
      return true;
    }
    function checkYear(name)
    {
      for(i in dataD){
        console.log(dataD[i].Name);
        if(name.val().trim() == dataD[i].Modify ){
            name[0].setCustomValidity('');
            return false;
        }
        else{
            name[0].setCustomValidity('');
        }
      }
      return true;
    }
    function checkPrice(name)
    {
      for(i in dataD){
        console.log(dataD[i].Name);
        if(name.val().trim() == dataD[i].UnitPrice ){
            name[0].setCustomValidity('');
            return false;
        }
        else{
            name[0].setCustomValidity('');
        }
      }
      return true;
    }
    function checkWeight(name)
    {
      for(i in dataD){
        console.log(dataD[i].Name);
        if(name.val().trim() == dataD[i].Weight ){
            name[0].setCustomValidity('');
            return false;
        }
        else{
            name[0].setCustomValidity('');
        }
      }
      return true;
    }

    
  });
