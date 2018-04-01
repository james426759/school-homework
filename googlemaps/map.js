var customLabel = {
        // restaurant: {
        //   label: 'F'
        // },
        bar: {
          label: 'F'
        },
        local: {
          label: 'Ｌ'
          
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

            downloadUrl('googlemaps/resultado.php', function(data) {
              console.log('data : '+data);
              var xml = data.responseXML;
              var markers = xml.documentElement.getElementsByTagName('marker');
              Array.prototype.forEach.call(markers, function(markerElem) {
                var name = markerElem.getAttribute('name');
                var address = markerElem.getAttribute('address');
                var type = markerElem.getAttribute('type');
                var phone = markerElem.getAttribute('phone');
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

                

                // infowincontent.appendChild(document.createElement('br'));
                // var tel = document.createElement('phone');
                // tel.textContent = phone
                // infowincontent.appendChild(tel);

                var icon = customLabel[type] || {};
                var marker = new google.maps.Marker({
                  map: map,
                  position: point,
                  label: icon.label
                });
                //表格
                marker.addListener('click', function() {
                  console.log('label : '+marker.label);
                  infoWindow.setContent(infowincontent);
                  infoWindow.open(map, marker);
                  console.log('name:'+name+' address:'+address+' phone:' +phone);
                  // console.log($('#td1').text());
                  $('#table1 tbody tr').each(function(){
                    $(this).find('td:eq(0)').html(name);
                    $(this).find('td:eq(1)').html(address);
                    $(this).find('td:eq(2)').html(phone);
                    // console.log('hello');
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

              var localcation = document.createElement('div');
              var lstr = document.createElement('strong');
              lstr.textContent = '目前位置';
              localcation.appendChild(lstr);

              marker.addListener('click', function() {
                console.log('label : '+marker.label);
                infoWindow.setContent(localcation);
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