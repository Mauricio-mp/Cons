<?php 

function fecha($dia,$mes,$anio)
{
switch ($mes){ 
case 1: 
{ 
$numd = "ENERO"; 
break; 
} 
case 2: 
{	
$numd = "FEBRERO"; 
break; 
} 
case 3: 
{ 
$numd = "MARZO "; 
break; 
} 
case 4: 
{ 
$numd = "ABRIL"; 
break; 
} 
case 5: 
{ 
$numd = "MAYO"; 
break; 
} 
case 6: 
{ 
$numd = "JUNIO"; 
break; 
} 
case 7: 
{ 
$numd = "JULIO"; 
break; 
} 
case 8: 
{ 
$numd = "AGOSTO"; 
break; 
} 
case 9: 
{ 
$numd = "SEPTIEMBRE"; 
break; 
} 
case 10: 
{ 
$numd = "ACTUBRE"; 
break; 
} 
case 11: 
{ 
$numd = "NOVIEMBRE"; 
break; 
} 
case 12: 
{ 
$numd = "DICIEMBRE"; 
break; 
} 
}

return $dia." DE ".$numd." DEL ".$anio;
} 
function fecha1($dia,$mes,$anio)
{
switch ($mes){ 
case 1: 
{ 
$numd = "ENERO"; 
break; 
} 
case 2: 
{	
$numd = "FEBRERO"; 
break; 
} 
case 3: 
{ 
$numd = "MARZO "; 
break; 
} 
case 4: 
{ 
$numd = "ABRIL"; 
break; 
} 
case 5: 
{ 
$numd = "MAYO"; 
break; 
} 
case 6: 
{ 
$numd = "JUNIO"; 
break; 
} 
case 7: 
{ 
$numd = "JULIO"; 
break; 
} 
case 8: 
{ 
$numd = "AGOSTO"; 
break; 
} 
case 9: 
{ 
$numd = "SEPTIEMBRE"; 
break; 
} 
case 10: 
{ 
$numd = "ACTUBRE"; 
break; 
} 
case 11: 
{ 
$numd = "NOVIEMBRE"; 
break; 
} 
case 12: 
{ 
$numd = "DICIEMBRE"; 
break; 
} 
}
if ($dia==1) {
	return "EL ".$dia." DEl MES DE ".$numd." DEL ".$anio;
}else{
	return "LOS ".$dia." DIAS DEL MES DE ".$numd." DEL ".$anio;
}

} 
//echo fecha('24','06','1994'); 


?>