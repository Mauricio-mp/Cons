<?php 



function solo_letras($cadena){

$permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZñÑ. "; 
for ($i=0; $i<strlen($cadena); $i++){ 
if (strpos($permitidos, substr($cadena,$i,1))===false){ 
//no es válido; 
return "1"; 
} 
}  
//si estoy aqui es que todos los caracteres son validos 
return "2"; 
} 

function validarEntero($valor){
  foreach ($valor as $caso_prueba) {
    if (ctype_digit($caso_prueba)) {
        echo "La cadena $caso_prueba consiste completamente de dígitos.\n";
    } else {
        echo "La cadena $caso_prueba no consiste completamente de dígitos.\n";
    }
}
}
 ?>