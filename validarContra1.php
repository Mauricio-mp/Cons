<?php
$psw2= $_POST['psw2'];
$psw3= $_POST['psw3'];

if (strlen($psw2) <=8) {
	
	echo "<strong><p style='color: #008000; opacity: 0.7'>La Nueva contraseña debe ser mayor a 8 Caracteres <br></br></p></strong>";
}

if ($psw2==$psw3) {
	echo "<strong>las Contraseña son correctas</strong>";
}else{
	echo "<strong><p style='color: #008000; opacity: 0.7'>Las Contraseñas deben Coincidir</p></strong>";
}


  ?>