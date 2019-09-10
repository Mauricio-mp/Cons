<?php 

function unidad($numuero){ 
switch ($numuero) 
{ 
case 9: 
{ 
$numu = "nueve"; 
break; 
} 
case 8: 
{ 
$numu = "ocho"; 
break; 
} 
case 7: 
{ 
$numu = "siete"; 
break; 
}	
case 6: 
{ 
$numu = "seis"; 
break; 
}	
case 5: 
{ 
$numu = "cinco"; 
break; 
}	
case 4: 
{ 
$numu = "cuatro"; 
break; 
}	
case 3: 
{ 
$numu = "tres"; 
break; 
}	
case 2: 
{ 
$numu = "dos"; 
break; 
}	
case 1: 
{ 
$numu = "uno"; 
break; 
}	
case 0: 
{ 
$numu = ""; 
break; 
}	
} 
return $numu;	
} 

function decena($numdero){ 

if ($numdero >= 90 && $numdero <= 99) 
{ 
$numd = "Noventa "; 
if ($numdero > 90) 
$numd = $numd."y ".(unidad($numdero - 90)); 
} 
else if ($numdero >= 80 && $numdero <= 89) 
{ 
$numd = "Ochenta "; 
if ($numdero > 80) 
$numd = $numd."y ".(unidad($numdero - 80)); 
} 
else if ($numdero >= 70 && $numdero <= 79) 
{ 
$numd = "Setenta "; 
if ($numdero > 70) 
$numd = $numd."y ".(unidad($numdero - 70)); 
} 
else if ($numdero >= 60 && $numdero <= 69) 
{ 
$numd = "Sesenta "; 
if ($numdero > 60) 
$numd = $numd."y ".(unidad($numdero - 60)); 
} 
else if ($numdero >= 50 && $numdero <= 59) 
{ 
$numd = "Cincuenta "; 
if ($numdero > 50) 
$numd = $numd."y ".(unidad($numdero - 50)); 
} 
else if ($numdero >= 40 && $numdero <= 49) 
{ 
$numd = "Cuarenta "; 
if ($numdero > 40) 
$numd = $numd."y ".(unidad($numdero - 40)); 
} 
else if ($numdero >= 30 && $numdero <= 39) 
{ 
$numd = "Treinta "; 
if ($numdero > 30) 
$numd = $numd."y ".(unidad($numdero - 30)); 
} 
else if ($numdero >= 20 && $numdero <= 29) 
{ 
if ($numdero == 20) 
$numd = "Veinte "; 
else 
$numd = "Veinti".(unidad($numdero - 20)); 
} 
else if ($numdero >= 10 && $numdero <= 19) 
{ 
switch ($numdero){ 
case 10: 
{ 
$numd = "Diez "; 
break; 
} 
case 11: 
{	
$numd = "Once "; 
break; 
} 
case 12: 
{ 
$numd = "Doce "; 
break; 
} 
case 13: 
{ 
$numd = "Trece "; 
break; 
} 
case 14: 
{ 
$numd = "Catorce "; 
break; 
} 
case 15: 
{ 
$numd = "Quince "; 
break; 
} 
case 16: 
{ 
$numd = "Dieciseis "; 
break; 
} 
case 17: 
{ 
$numd = "Diecisiete "; 
break; 
} 
case 18: 
{ 
$numd = "Dieciocho "; 
break; 
} 
case 19: 
{ 
$numd = "Diecinueve "; 
break; 
} 
}	
} 
else 
$numd = unidad($numdero); 
return $numd; 
} 

function centena($numc){ 
if ($numc >= 100) 
{ 
if ($numc >= 900 && $numc <= 999) 
{ 
$numce = "Novecientos "; 
if ($numc > 900) 
$numce = $numce.(decena($numc - 900)); 
} 
else if ($numc >= 800 && $numc <= 899) 
{ 
$numce = "Ochocientos "; 
if ($numc > 800) 
$numce = $numce.(decena($numc - 800)); 
} 
else if ($numc >= 700 && $numc <= 799) 
{ 
$numce = "Setesientos "; 
if ($numc > 700) 
$numce = $numce.(decena($numc - 700)); 
} 
else if ($numc >= 600 && $numc <= 699) 
{ 
$numce = "Seiscientos "; 
if ($numc > 600) 
$numce = $numce.(decena($numc - 600)); 
} 
else if ($numc >= 500 && $numc <= 599) 
{ 
$numce = "Quinientos "; 
if ($numc > 500) 
$numce = $numce.(decena($numc - 500)); 
} 
else if ($numc >= 400 && $numc <= 499) 
{ 
$numce = "Cuatrocientos "; 
if ($numc > 400) 
$numce = $numce.(decena($numc - 400)); 
} 
else if ($numc >= 300 && $numc <= 399) 
{ 
$numce = "Trescientos "; 
if ($numc > 300) 
$numce = $numce.(decena($numc - 300)); 
} 
else if ($numc >= 200 && $numc <= 299) 
{ 
$numce = "Doscientos "; 
if ($numc > 200) 
$numce = $numce.(decena($numc - 200)); 
} 
else if ($numc >= 100 && $numc <= 199) 
{ 
if ($numc == 100) 
$numce = "Cien "; 
else 
$numce = "Ciento ".(decena($numc - 100)); 
} 
} 
else 
$numce = decena($numc); 

return $numce;	
} 

function miles($nummero){ 
if ($nummero >= 1000 && $nummero < 2000){ 
$numm = "MIL ".(centena($nummero%1000)); 
} 
if ($nummero >= 2000 && $nummero <10000){ 
$numm = unidad(Floor($nummero/1000))." MIL ".(centena($nummero%1000)); 
} 
if ($nummero < 1000) 
$numm = centena($nummero); 

return $numm; 
} 

function decmiles($numdmero){ 
if ($numdmero == 10000) 
$numde = "Diez mil"; 
if ($numdmero > 10000 && $numdmero <20000){ 
$numde = decena(Floor($numdmero/1000))."mil ".(centena($numdmero%1000));	
} 
if ($numdmero >= 20000 && $numdmero <100000){ 
$numde = decena(Floor($numdmero/1000))." mil ".(miles($numdmero%1000));	
}	
if ($numdmero < 10000) 
$numde = miles($numdmero); 

return $numde; 
}	

function cienmiles($numcmero){ 
if ($numcmero == 100000) 
$num_letracm = "Cien mil"; 
if ($numcmero >= 100000 && $numcmero <1000000){ 
$num_letracm = centena(Floor($numcmero/1000))." mil ".(centena($numcmero%1000));	
} 
if ($numcmero < 100000) 
$num_letracm = decmiles($numcmero); 
return $num_letracm; 
}	

function millon($nummiero){ 
if ($nummiero >= 1000000 && $nummiero <2000000){ 
$num_letramm = "UN MILLON ".(cienmiles($nummiero%1000000)); 
} 
if ($nummiero >= 2000000 && $nummiero <10000000){ 
$num_letramm = unidad(Floor($nummiero/1000000))." millones ".(cienmiles($nummiero%1000000)); 
} 
if ($nummiero < 1000000) 
$num_letramm = cienmiles($nummiero); 

return $num_letramm; 
}	

function decmillon($numerodm){ 
if ($numerodm == 10000000) 
$num_letradmm = "Diez millones"; 
if ($numerodm > 10000000 && $numerodm <20000000){ 
$num_letradmm = decena(Floor($numerodm/1000000))." millones ".(cienmiles($numerodm%1000000));	
} 
if ($numerodm >= 20000000 && $numerodm <100000000){ 
$num_letradmm = decena(Floor($numerodm/1000000))." millones ".(millon($numerodm%1000000));	
} 
if ($numerodm < 10000000) 
$num_letradmm = millon($numerodm); 

return $num_letradmm; 
} 

function cienmillon($numcmeros){ 
if ($numcmeros == 100000000) 
$num_letracms = "Cien millones"; 
if ($numcmeros >= 100000000 && $numcmeros <1000000000){ 
$num_letracms = centena(Floor($numcmeros/1000000))." millones ".(millon($numcmeros%1000000));	
} 
if ($numcmeros < 100000000) 
$num_letracms = decmillon($numcmeros); 
return $num_letracms; 
}	

function milmillon($nummierod){ 
if ($nummierod >= 1000000000 && $nummierod <2000000000){ 
$num_letrammd = "mil ".(cienmillon($nummierod%1000000000)); 
} 
if ($nummierod >= 2000000000 && $nummierod <10000000000){ 
$num_letrammd = unidad(Floor($nummierod/1000000000))." mil ".(cienmillon($nummierod%1000000000)); 
} 
if ($nummierod < 1000000000) 
$num_letrammd = cienmillon($nummierod); 

return $num_letrammd; 
}	


function convertir($numero){ 
$num = str_replace(",","",$numero); 
$num = number_format($num,2,'.',''); 
$cents = substr($num,strlen($num)-2,strlen($num)-1); 
$num = (int)$num; 

$numf = milmillon($num); 
$cen=milmillon($cents); 

if ($cen=='') {
	return $numf;
}else{
	return $numf." con ".$cen." centavos";
}

} 




function convertir1($numero){ 
$num = str_replace(",","",$numero); 
$num = number_format($num,2,'.',''); 
$cents = substr($num,strlen($num)-2,strlen($num)-1); 
$num = (int)$num; 

$numf = milmillon($num); 
$cen=milmillon($cents); 

if ($cen=='') {
	return $numf;
}else{
	return $numf;
}

} 



?> 