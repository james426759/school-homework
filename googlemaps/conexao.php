<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "root";
	$dbname = "celke";
	
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	/* if(!$conn){
			echo "連線失敗";
		}
		else{
			echo "成功";
		}
	*/
	$sql =("SET NAMES 'UTF8'");
	mysqli_query($conn,$sql);
	

?>