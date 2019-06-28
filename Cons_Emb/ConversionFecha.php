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
$numd = "OCTUBRE"; 
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

return $dia."\t DE \t".$numd."\t DEL \t".$anio;
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
$numd = "OCTUBRE"; 
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
	return "EL\t".$dia."\tDEl MES DE\t".$numd."\tDEL\t".$anio;
}else{
	return "LOS \t".$dia." \tDIAS DEL MES DE \t".$numd." \tDEL \t".$anio;
}


} 



function fecha2($dia,$mes,$anio)
{
switch ($mes){ 
case 1: 
{ 
$numd = "enero"; 
break; 
} 
case 2: 
{	
$numd = "febrero"; 
break; 
} 
case 3: 
{ 
$numd = "marzo"; 
break; 
} 
case 4: 
{ 
$numd = "abril"; 
break; 
} 
case 5: 
{ 
$numd = "mayo"; 
break; 
} 
case 6: 
{ 
$numd = "junio"; 
break; 
} 
case 7: 
{ 
$numd = "julio"; 
break; 
} 
case 8: 
{ 
$numd = "agosto"; 
break; 
} 
case 9: 
{ 
$numd = "septiembre"; 
break; 
} 
case 10: 
{ 
$numd = "octubre"; 
break; 
} 
case 11: 
{ 
$numd = "noviembre"; 
break; 
} 
case 12: 
{ 
$numd = "diciembre"; 
break; 
} 
}
if ($dia==1) {
	return "".$dia." dias de ".$numd." del ".$anio;
}
else{
	return "".$dia." dias de ".$numd." del ".$anio;
}
}


//echo fecha('24','06','1994'); 
?>