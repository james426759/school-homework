<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>機車簡易故障排除網</title>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="KYMCO.css">
  </head>
  <body class="bg">
    <!-- 連接資料庫 -->
      <?php
      $dbms='mysql';     //数据库类型
      $host='localhost'; //数据库主机名
      $dbName='celke';    //使用的数据库
      $user='root';      //数据库连接用户名
      $pass='root';          //对应的密码
      $dsn="$dbms:host=$host;dbname=$dbName";

      try {
          $dbh = new PDO($dsn, $user, $pass); //初始化一个PDO对象
          //echo "连接成功<br/>";
          //你还可以进行一次搜索操作
          /*foreach ($dbh->query('SELECT * from FOO') as $row) {
              print_r($row); //你可以用 echo($GLOBAL); 来看到这些值
          }
          
          $dbh = null;*/

      } catch (PDOException $e) {
          die ("Error!: " . $e->getMessage() . "<br/>");
      }
      //默认这个不是长连接，如果需要数据库长连接，需要最后加一个参数：array(PDO::ATTR_PERSISTENT => true) 变成这样：
      $db = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT => true));

        $sql = "SELECT * FROM search WHERE article LIKE '%'";
        $result = $db->query($sql);
      ?> 
    <!-- 連接資料庫 -->

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
            <a class="navbar-brand" href="/scooter/">機車簡易故障排除網</a>
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
          </div>
        </div>
      </nav>      
    <!--主選單結束-->

    <br>
    <!--項目開始-->
     <div class="container">
      <?php  
        foreach ($result as $row) {
            // print $row['id'] . "\t";
            // print $row['article'] . "\t";
            // print $row['content'] . "\n";
          echo '
          <div class="row">
            <div class="col-xs-12 ">
              <div class="thumbnail" style="background-color:rgba(255%,255%,255%,0.8);">
                <img alt="" src="'.$row['photo'].'" />
                <div class="caption">
                  <h3 align="center">'.$row['article'].'</h3>
                  <br>
                  <p align="center"><a href="/scooter/txt1.php?id='.$row['id'].'" class="btn btn-primary" role="button">繼續閱讀</a>
                </div>
              </div>
             </div>
          </div>
          ';
        }
      ?>  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>

<!-- <div class="col-xs-12 col-sm-2"> </div> -->