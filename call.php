<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Q&A</title>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="QA.css" >
  </head>
  
  <body class="bg">
  <!--連接資料庫開始 -->
  <?php
    $url = "localhost";
    $user = "root";
    $pw = "root";
    $link = mysqli_connect($url,$user,$pw,'celke');

    if(!$link){
      echo "連線失敗";
    }
    else{
      echo "";
    }
    $sql ="SET NAME UTF8";
    mysqli_query($link,$sql);

    if(isset( $_POST['insert'] )){
      $sql1 = "insert into message (art,mail,text) values ('".$_POST['art']."','".$_POST['ma']."','".$_POST['contant']."')";
      mysqli_query($link,$sql1);
    }

    // if(isset( $_POST['delete'] )){
    //   $del_no = key($_POST['delete']);
    //   $sql = "delete from message where no=".$del_no;
    //   mysqli_query($link,$sql);
    // }
    
  ?>
  <!--連接資料庫結束 -->

    <!--主選單開始-->
      <nav class=" navbar navbar-default">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/scooter/index.php">機車簡易故障排除網</a>
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
              <li><a href="/scooter/maps.php ">地圖</a></li>
              <li><a href="/scooter/QA.php">Q&A</a></li>
              <li><a href="#">聯絡我們</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>      
    <!--主選單結束-->
        <div class="container">
          <div class="row">
            <div class="col-xs-12 ">
              <div class="thumbnail" style="background-color:rgba(255%,255%,255%,0.8);">
                <div class="caption" >
                  <form method="post">
                    <div class="form-group"  >
                      <h1 align="center">聯絡我們</h1>
                      <!-- <div class="col-xs-6 col-sm-10 box"> -->
                        <input type="text" class="form-control" placeholder="請輸入標題" name="art">
                        <input type="text" class="form-control" placeholder="請輸入E-Mail" name="ma">
                        <textarea class="form-control" name="contant" placeholder="請輸入留言內容" cols="30" rows="10"></textarea>

                      <!-- </div> -->
                     <!--  <div class="col-xs-4 col-sm-2 box1"> -->
                        <button type="submit" class="btn btn-default" name="insert" >送出</button>
                      <!-- </div> -->
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </body>
</html>