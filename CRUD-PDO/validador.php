<?php 
function validarEmail($email)
{
	$exp="/^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$/";

	if ($email=(preg_match($exp,$email))) {
		return true;
	}



	
}

//echo validarEmail($email);

/*$emailInvalido=validarEmail($email);
if (!$emailInvalido) {
	echo "el email es invalido";

}
else
{
	echo "email valido";
}*/
 ?>
