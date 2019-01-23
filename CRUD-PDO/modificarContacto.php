<?php 
require 'conexion.php';
$pdo= new db();
try
{

	 $usuario =$_GET['usuario'];
	 $datosContacto= $pdo->mysql->prepare("select * from usuario where usuario=:usuario");
	 $datosContacto->bindParam(":usuario", $usuario, PDO::PARAM_STR);
	 $datosContacto->execute();
	 $contacto=$datosContacto->fetch();

}
catch(PDOException $e)
{
	print_r($e->getMessage());
}


 ?>

<div class="formulario">
				
				<form id="form_dos" action="actualizarContacto.php" class="form-dos desaparecer" method="post" >
					<h1>CREA UNA CUENTA</h1>
					<!--nombre-->
					<span class="error" id="error-nombre"></span>
					<div class="input-container">
						<input id="nombreR" class="input" type="text" name="nombre" placeholder="Nombre" value="<?php echo $contacto['nombre']; ?>" onblur="soloTexto(this);" onkeyup="soloTexto(this);">
						<i class="fas fa-user-tag fa-lg fa-fw"></i>
					</div>
					<!--fin nombre-->

					<!--apellido-->
					<span class="error" id="error-apellido"></span>
					<div class="input-container">
						<input id="apellidoR" class="input" type="text" name="apellido" placeholder="Apellido" value="<?php echo $contacto['apellido']; ?>" onblur="soloTexto(this);" onkeyup="soloTexto(this);">
						<i class="far fa-surprise fa-lg fa-fw"></i>
					</div>
					<!--fin apellido-->

					<!--usuario-->
					<span class="error" id="error-usuario"></span>
					<div class="input-container">
						<input id="usuarioR" class="input" type="text" name="usuario" placeholder="Usuario" value="<?php echo $usuario; ?>" onblur="alfaNumerico(this);" onkeyup="alfaNumerico(this);">
						<i class="fas fa-user fa-lg fa-fw"></i>
					</div>
					<!--fin usuario-->

					<!--email-->
					<span class="error" id="error-email"></span>
					<div class="input-container">
						<input id="emailR" class="input" type="email" name="email" placeholder="Email" value="<?php echo $contacto['email']; ?>"  onblur="revisarEmail(this);" onkeyup="revisarEmail(this);" >
						<i class="fas fa-envelope fa-lg fa-fw"></i>
					</div>
					<!--fin email-->

					<!--contraseña-->
					<span class="error" id="error-contrasena"></span>
					<div class="input-container">
						<input id="contrasenaR" class="input" type="text" name="contrasena" placeholder="Contraseña" value="<?php echo $contacto['contrasena']; ?>" onblur="alfaNumerico(this);" onkeyup="alfaNumerico(this);">
						<i class="fas fa-key fa-lg fa-fw"></i>
					</div>
					<!--contraseña-->

					<div class="btn">
						<input id="modificar" class="" type="submit" value="REGISTRARME">
					</div>
					
				</form>
			</div>
			<!--fin formulario registrarse-->
