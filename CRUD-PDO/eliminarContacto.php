<?php 

if ($_GET) {
	try
	{
		require 'conexion.php';


		$pdo = new db();
		$pdo->mysql->beginTransaction();
		$usuario=$_GET["usuario"];

		$pst= $pdo->mysql->prepare("delete from usuario where usuario=:usuario");
		$pst->bindParam(":usuario", $usuario, PDO::PARAM_STR);
		$pst->execute();
		$pdo->mysql->commit();
		header("Location:index.php");


	}
	catch(PDOException $ex)
	{
		echo "el contacto no puede ser eliminado";
		$pdo->mysql->rollback();
	}
}

 ?>