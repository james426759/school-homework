<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>地圖</title>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- <script src="https://maps.google.com/maps/api/js?sensor=false"></script> -->
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="map.css">
  </head>
  <body class="bg">

    <!--主選單開始-->
      <nav class="navbar navbar-default">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">機車簡易故障排除網</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">廠牌<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="/scooter/KYMCO.php">KYMCO 光陽機車</a></li>
                </ul>
              </li>
              <li><a href="/scooter/maps.php">地圖</a></li>
              <li><a href="/scooter/QA.php">Q&A</a></li>
              <li><a href="/scooter/call.php">聯絡我們</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>      
    <!--主選單結束-->

    <div class="container" align="center">
      <!-- <iframe width="300" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src=/scooter/googlemaps/result.php></iframe> -->
      <div id="map"></div>
    <br>
    <img alt="" src="/scooter/img/mapdata.png" />  
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-6">
          <table id="table1" value='aaa' class="rwd-table">
            <thead>
              <tr>
                <th>店名：</th>
                <th>地址：</th>
                <th>電話：</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td data-th="店名"></td>
                <td data-th="地址"></td>
                <td data-th="電話"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="googlemaps/map.js"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA33r-qzPuLCGi30IH2B0i8Jm5vwPmlYxw&callback=initMap&language=zh-TW">
    </script>
  </body>
</html>
