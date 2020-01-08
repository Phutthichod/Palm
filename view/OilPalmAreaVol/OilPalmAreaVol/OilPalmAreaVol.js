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

function delfunction(_fid) {
  swal({
          title: "คุณต้องการลบข้อมูลนี้ใช่หรือไม่",
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
  
                  title: "ลบข้อมูลสำเร็จ",
                  type: "success",
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "ตกลง",
                  closeOnConfirm: false,
  
              }, function(isConfirm) {
                  if (isConfirm) {
                      delete_1(_fid)
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
            window.location.href = 'OilPalmAreaVol.php';
            //  alert(this.responseText);
        }
    };
    xhttp.open("POST", "manage.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`fid=${_fid}&request=delete`);
    
    }

$("#palmvolsilder").ionRangeSlider({
    type: "double",
    grid: true,
    from: 1,
    to: 5,
    values: [0, 10, 100, 1000, 10000, 100000, 1000000]
});