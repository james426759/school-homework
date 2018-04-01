<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Using MySQL and PHP with Google Maps</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
        
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>

  <body>
    <div id="map"></div>

    <script>
      var customLabel = {
        // restaurant: {
        //   label: 'F'
        // },
        bar: {
          label: 'F'
        },
        local: {
          label: 'L'
          
        }
      };

        function initMap() {
          // 瀏覽器支援 HTML5 定位方法
            if (navigator.geolocation) {
            // HTML5 定位抓取
                navigator.geolocation.getCurrentPosition(function (position) {
                    // mapServiceProvider(position.coords.latitude, position.coords.longitude);
                    console.log(position.coords);
                    console.log('alt: '+position.coords.latitude);
                    console.log('long : '+ position.coords.longitude);
                    var map = new google.maps.Map(document.getElementById('map'), {
                      center: new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
                      zoom: 11
                    });
                    var infoWindow = new google.maps.InfoWindow;


            // var local = new google.maps.LatLng(
            //   parseFloat(markerElem.getAttribute(position.coords.latitude)),
            //       parseFloat(markerElem.getAttribute(position.coords.longitude)));

            downloadUrl('resultado.php', function(data) {
              console.log('data : '+data);
              var xml = data.responseXML;
              var markers = xml.documentElement.getElementsByTagName('marker');
              Array.prototype.forEach.call(markers, function(markerElem) {
                var name = markerElem.getAttribute('name');
                var address = markerElem.getAttribute('address');
                var type = markerElem.getAttribute('type');
                var point = new google.maps.LatLng(
                    parseFloat(markerElem.getAttribute('lat')),
                    parseFloat(markerElem.getAttribute('lng')));

                var infowincontent = document.createElement('div');
                var strong = document.createElement('strong');
                strong.textContent = name
                infowincontent.appendChild(strong);
                infowincontent.appendChild(document.createElement('br'));

                var text = document.createElement('text');
                text.textContent = address
                infowincontent.appendChild(text);

                var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
 

                var icon = customLabel[type] || {};
                var marker = new google.maps.Marker({
                  map: map,
                  position: point,
                  icon:image
                  //label: icon.label
                });
                marker.addListener('click', function() {
                  infoWindow.setContent(infowincontent);
                  infoWindow.open(map, marker);
                  console.log('name:'+name+' address:'+address);
                  $('#table1 tbody tr').each(function(){
                    $(this).find('td:eq(1)').html(address);
                  });
                });
              });
            });

            var point2 = new google.maps.LatLng(
                    parseFloat(position.coords.latitude),
                    parseFloat(position.coords.longitude));


            var icon = customLabel['local'] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point2,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });

                },
                // function(error) {
                //     switch (error.code) {
                //         case error.TIMEOUT:
                //             alert('連線逾時');
                //         break;
                //         case error.POSITION_UNAVAILABLE:
                //             alert('無法取得定位');
                //         break;
                //         case error.PERMISSION_DENIED: // 拒絕
                //             alert('記得允許手機的定位功能喔!');
                //         break;
                //         case error.UNKNOWN_ERROR:
                //             alert('不明的錯誤，請稍候再試');
                //         break;
                //     }
                // }
                );  
            } else { // 不支援 HTML5 定位
              var map = new google.maps.Map(document.getElementById('map'), {
                center: new google.maps.LatLng(27.150052, 120.683968),
                zoom: 11
              });
                // // 若支援 Google Gears
                // if (window.google && google.gears) {
                //     try {
                //         // 嘗試以 Gears 取得定位
                //         var geo = google.gears.factory.create('beta.geolocation');
                //         geo.getCurrentPosition(successCallback, errorCallback, { enableHighAccuracy: true, gearsRequestAddress: true });
                //     } catch (e) {
                //         alert('定位失敗請稍候再試');
                //     }
                // } else {
                //     alert('記得允許手機的定位功能喔!');
                // }
            }

        // var map = new google.maps.Map(document.getElementById('map'), {
        //         center: new google.maps.LatLng(24.150052, 120.683968),
        //         zoom: 11
        //       });
        // var infoWindow = new google.maps.InfoWindow;

        //   // Change this depending on the name of your PHP or XML file
          // downloadUrl('resultado.php', function(data) {
          //   console.log('data : '+data);
          //   var xml = data.responseXML;
          //   var markers = xml.documentElement.getElementsByTagName('marker');
          //   Array.prototype.forEach.call(markers, function(markerElem) {
          //     var name = markerElem.getAttribute('name');
          //     var address = markerElem.getAttribute('address');
          //     var type = markerElem.getAttribute('type');
          //     var point = new google.maps.LatLng(
          //         parseFloat(markerElem.getAttribute('lat')),
          //         parseFloat(markerElem.getAttribute('lng')));

          //     var infowincontent = document.createElement('div');
          //     var strong = document.createElement('strong');
          //     strong.textContent = name
          //     infowincontent.appendChild(strong);
          //     infowincontent.appendChild(document.createElement('br'));

          //     var text = document.createElement('text');
          //     text.textContent = address
          //     infowincontent.appendChild(text);
          //     var icon = customLabel[type] || {};
          //     var marker = new google.maps.Marker({
          //       map: map,
          //       position: point,
          //       label: icon.label
          //     });
          //     marker.addListener('click', function() {
          //       infoWindow.setContent(infowincontent);
          //       infoWindow.open(map, marker);
          //     });
          //   });
          // });
        }

      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA33r-qzPuLCGi30IH2B0i8Jm5vwPmlYxw&callback=initMap&language=zh-TW">
    </script>
  </body>
</html>