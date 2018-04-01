<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>留言板</title>
</head>
<body>
	<?php
		$url = "localhost";
		$user = "root";
		$pw = "root";
		$link = mysqli_connect($url,$user,$pw,'celke');

		
		

		if (!$link) {
			echo "連線失敗";
		} else {
			echo "留言板";
		}
		$sql ="SET NAME UTF8";
		mysqli_query($link,$sql);

		if (isset($_POST['insert'])) {
			$sql = "insert into message (text) values ('".$_POST['contant']."')";
			mysqli_query($link,$sql);
		}
		if (isset($_POST['delete'])) {
			$del_no = key($_POST['delete']);
			$sql = "delete from message where no=".$del_no;
			mysqli_query($link,$sql);
		}
		if (isset($_POST['edit'])) {
		   $sql = "updata message set text = '$TEXT'";
		   echo " test:　" . $TEXT;
		   $result = mysqli_query($link,$sql);
		}
	?>


	<form method="post">
		

		新增留言:
		<textarea name="contant" col="30" row="3"></textarea>
		<input type="submit" name="insert" value="新增">
		<table border="1">
			<tr>
				<th>功能</th>
				<th>內容</th>
			</tr>

		<?php
			$sql = "select no,text from message";
			$result = mysqli_query($link,$sql);
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td><input type='submit' name='edit[".$row['no']."]'  value='編輯'>
						  <input type='submit' name='delete[".$row['no']."]' value='刪除'></td>";
				echo "<td>".$row['text']."</td>";
				echo "</tr>";
			}
			

		?>
		</table>
	</form>
</body>
</html>
