<?php 

function fecha($dia,$mes,$anio)
{
switch ($mes){ 
case 1: 
{ 
$numd = "Enero"; 
break; 
} 
case 2: 
{	
$numd = "Febrero"; 
break; 
} 
case 3: 
{ 
$numd = "Marzo "; 
break; 
} 
case 4: 
{ 
$numd = "Abril"; 
break; 
} 
case 5: 
{ 
$numd = "Mayo"; 
break; 
} 
case 6: 
{ 
$numd = "Junio"; 
break; 
} 
case 7: 
{ 
$numd = "Julio"; 
break; 
} 
case 8: 
{ 
$numd = "Agosto"; 
break; 
} 
case 9: 
{ 
$numd = "Septiembre"; 
break; 
} 
case 10: 
{ 
$numd = "Octubre"; 
break; 
} 
case 11: 
{ 
$numd = "Noviembre"; 
break; 
} 
case 12: 
{ 
$numd = "Diciembre"; 
break; 
} 
}

return $dia." de ".$numd." del ".$anio;
} 



function fecha1($dia,$mes,$anio)
{
switch ($mes){ 
case 1: 
{ 
$numd = "Enero"; 
break; 
} 
case 2: 
{	
$numd = "Febrero"; 
break; 
} 
case 3: 
{ 
$numd = "Marzo "; 
break; 
} 
case 4: 
{ 
$numd = "Abril"; 
break; 
} 
case 5: 
{ 
$numd = "Mayo"; 
break; 
} 
case 6: 
{ 
$numd = "Junio"; 
break; 
} 
case 7: 
{ 
$numd = "Julio"; 
break; 
} 
case 8: 
{ 
$numd = "Agosto"; 
break; 
} 
case 9: 
{ 
$numd = "Septiembre"; 
break; 
} 
case 10: 
{ 
$numd = "Octubre"; 
break; 
} 
case 11: 
{ 
$numd = "Noviembre"; 
break; 
} 
case 12: 
{ 
$numd = "Diciembre"; 
break; 
} 
}
if ($dia==1) {
	return "".$dia." del mes de ".$numd." del ".$anio;
}else{
	return "los ".$dia." dias del mes de ".$numd." del ".$anio;
}

} 





function fecha2($dia,$mes,$anio)
{
switch ($mes){ 
case 1: 
{ 
$numd = "Enero"; 
break; 
} 
case 2: 
{	
$numd = "Febrero"; 
break; 
} 
case 3: 
{ 
$numd = "Marzo "; 
break; 
} 
case 4: 
{ 
$numd = "Abril"; 
break; 
} 
case 5: 
{ 
$numd = "Mayo"; 
break; 
} 
case 6: 
{ 
$numd = "Junio"; 
break; 
} 
case 7: 
{ 
$numd = "Julio"; 
break; 
} 
case 8: 
{ 
$numd = "Agosto"; 
break; 
} 
case 9: 
{ 
$numd = "Septiembre"; 
break; 
} 
case 10: 
{ 
$numd = "Octubre"; 
break; 
} 
case 11: 
{ 
$numd = "Noviembre"; 
break; 
} 
case 12: 
{ 
$numd = "Diciembre"; 
break; 
} 
}
if ($dia==1) {
		$dialetra=convertir($dia);
$anioletra=convertir($anio);
	return "el ".$dialetra." dia del mes de ".$numd." del ".$anioletra;
}else{

	$dialetra=convertir($dia);
$anioletra=convertir($anio);

	return "a los ".$dialetra." dias del mes de ".$numd." del ".$anioletra;
}

} 


//echo fecha('24','06','1994'); 


?>