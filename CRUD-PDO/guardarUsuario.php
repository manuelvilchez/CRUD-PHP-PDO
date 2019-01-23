<?php 
require 'conexion.php';
require 'validador.php';

$pdo= new db();

/*echo $nombre =$_POST['nombre'];
echo $apellido =$_POST['apellido'];
echo $usuario =$_POST['usuario'];
echo $email =$_POST['email'];
echo $contrasena =$_POST['contrasena'];*/

 $nombre =$_POST['nombre'];
 $apellido =$_POST['apellido'];
 $usuario =$_POST['usuario'];
 $email =$_POST['email'];
 $contrasena =$_POST['contrasena'];
$emailInvalido=validarEmail($email);

if (!$emailInvalido) {
	echo "el email es invalido";

}

else
{
	try
{
	$pdo->mysql->beginTransaction();
	$pst= $pdo->mysql->prepare("insert into usuario values(:nombre, :apellido, :usuario, :email,:contrasena)");
	$pst->bindParam(":nombre", $nombre, PDO::PARAM_STR);
	$pst->bindParam(":apellido", $apellido, PDO::PARAM_STR);
	$pst->bindParam(":usuario", $usuario, PDO::PARAM_STR);
	$pst->bindParam(":email", $email, PDO::PARAM_STR);
	$pst->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);

	$pst->execute();
	$pdo->mysql->commit();
	header("Location:index.php");
}
catch(PDOException $ex)
{
	$pdo->mysql->rollback();
	echo "el contacto no pudo ser guardado";
}
}

?>