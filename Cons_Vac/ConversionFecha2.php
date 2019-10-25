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
	return "LOS ".$dia." DIAS DEL MES DE ".$numd." DEL ".$anio;
}else{
	return "LOS ".$dia." DIAS DEL MES DE ".$numd." DEL ".$anio;
}

} 


function fecha3($mes)
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
$numd = "Marzo"; 
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

return $numd;
} 




//echo fecha('24','06','1994'); 


?>