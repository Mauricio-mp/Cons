<?php 
$idFirma=$_GET['firma'];
$numeroEmpleado=$_GET['numero'];
$opcion=$_GET['opcion'];
$contador=0;
$conca=$_GET['ido'];

//require('../fpdf/fpdf.php');
require('../fpdf/WriteTag.php');
require('ConversionSueldo.php');
require('ConversionFecha.php');
include('../crearConexionVam.php'); 
include('ConversionLetras.php');
$mostrarDatos=mssql_query("SELECT * FROM prempy  WHERE cempno='$numeroEmpleado'");
if ($row=mssql_fetch_array($mostrarDatos)) {
    $DESC=$row['cfedid'];
    $codigoPuesto=$row['cjobtitle'];
    $codigoAsignado=$row['cdeptno'];
    $opnetersueldo=$row['nmonthpay'];
    $nombre=trim($row['cfname']);
    $apellido=trim($row['clname']);
    //echo "<script>alert('".$DESC."');</script>";

   $dia1 = date("d", strtotime($row['dhire']));
   $mes1 = date("m", strtotime($row['dhire']));
   $anio1 = date("Y", strtotime($row['dhire']));

   $dia2 = date("d", strtotime($row['dcntrct']));
   $mes2 = date("m", strtotime($row['dcntrct']));
   $anio2 = date("Y", strtotime($row['dcntrct']));
 
   $fechaContrato=fecha($dia1,$mes1,$anio1); 
   $fechaAcuerdo=fecha($dia2,$mes2,$anio2); 

  if ($row['dhire']==$row['dcntrct']) {
    $msg="HA LABORADO POR ACURDO EN ESTA INSTITUCION DESDE EL ".$fechaContrato.", ";
  }
  if ($row['dhire']>$row['dcntrct']) {
    $msg="HA LABORADO POR CONTRATO EN ESTA INSTITUCION DESDE EL ".$fechaContrato." Y POR ACUERDO DESDE EL ".$fechaAcuerdo.",";
  }
$var=convertir($opnetersueldo); //$opnetersueldo
$formato=number_format($opnetersueldo,2);


$mostrarDesc=mssql_query("SELECT * FROM hrjobs WHERE cJobTitlNO='$codigoPuesto'");
if ($ejecutar=mssql_fetch_array($mostrarDesc)) {
    $desempenio=titleCase(utf8_encode($ejecutar['cDesc']));

    // $ConvertirDesen=strtolower($desempenio);
    // $desempenio=ucwords($ConvertirDesen);
}
$mostrarDesc=mssql_query("SELECT * FROM prdept WHERE cdeptno='$codigoAsignado'");
if ($asignado=mssql_fetch_array($mostrarDesc)) {
    $asignacion=titleCase(utf8_encode($asignado['cdeptname']));
    // $ConvertiAsignacion=strtolower($asignacion);
    // $asignacion=ucwords($ConvertiAsignacion);
}


    
}
$dia=date("d");
$mes=date("m");
$anio=date("Y");
$DateNum= Optenerfecha($mes,$anio);
$fechaActual=fecha1($dia,$mes,$anio); 


$dia_actual=convertir2($dia); 
$mes_actual= fecha2($mes);
$anio_actual=convertir2($anio); 

include('../crearConexionGECOMP.php');
$mostrarDato=mssql_query("SELECT * FROM FIRMA_CONSTANCIAS WHERE Id_FIRMA='$idFirma'");
if ($firma=mssql_fetch_array($mostrarDato)) {
  $nombreFirma=$firma['NOMBRE_EMPLEADO'];
  $convertirFirma=strtoupper($nombreFirma);
  $nombreFirma=ucwords($convertirFirma);
  $puestoFirma=$firma['PUESTO_EMPLEADO'];
}



class PDF extends PDF_WriteTag
{
// Page header
function Header()
{

    
    // Logo
    $this->Image('../img/9.png',70,6,75);
    // Arial bold 15
     $this->SetFont('Times','B',14);
    //$this->SetTextColor(194,8,8);
    //$this->Cell(45,0,'Prueba',0,0,'C');
    // Move to the right
     $this->SetFont('Times','B',14);
     $this->SetTextColor(0,0,0);
    $this->Ln(30);
   // $this->Cell(72);
    // Title

    //$this->Cell(45,0,'CONSTANCIA',0,0,'C');
    // Line break
    //$this->Ln(20);
}

// Page footer
function Footer()
{
     global $conca;
      // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->SetLineWidth(0);
    //$this->Line(20,280,190,280);
    $this->Cell(0,0,'Edificio Lomas Plaza II, Lomas del guijaro, Avenida Republica Dominicana, Tegucigalpa M.D.C, Honduras C.A.',0,0,'C');
    $this->Ln();
    $this->Cell(0,10,'apartado postal No, 3730, Tel:(504)2221-3099, FAX:(504)2221-5667',0,0,'C');
    $this->Ln();
    $this->SetTextColor(0,0,0);
     $this->Cell(185,0,$conca.'/'.'G.E.C.O.M.P.',0,0,'R');
}

}

// Instanciation of inherited class


$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('arial','',13);
$pdf->SetLeftMargin(18); #Establecemos los márgenes izquierda: 
$pdf->SetRightMargin(18); #Establecemos los márgenes Derecha: 

// Stylesheet
$pdf->SetStyle("p","arial","",13,"0,0,0",0);
$pdf->SetStyle("h1","arial","N",12,"0,0,0",0);
$pdf->SetStyle("a","arial","BU",12,"0,0,0");
$pdf->SetStyle("pers","arial","I",0,"0,0,0");
$pdf->SetStyle("place","arial","U",0,"0,0,0");
$pdf->SetStyle("vb","arial","B",12,"0,0,0");
$pdf->SetStyle("negrta","arial","B",13,"0,0,0");




// Text   ñ  í   ó   ú
$txt=utf8_encode($nombre)." ".utf8_encode($apellido);
$ConvertirNombre=strtoupper($txt);
$txt="<vb>".ucwords($ConvertirNombre)."</vb>";
$Descripcion="<vb>".utf8_encode('Descripción')."</vb>";
$monto="<vb>".utf8_encode('Monto')."</vb>";
$nombresFirma="<vb>".utf8_encode($nombreFirma)."</vb>";

$texto = "El (la) suscrito ".utf8_encode($puestoFirma)." del Ministerio Público hace constar que el (la) Señor (a): ".$txt." ha laborado en esta institución desde el ".$fechaContrato." y por acuerdo desde el ".$fechaAcuerdo.", actualmente se desempeña como: \t".trim($desempenio)."\t"." asignado a: ".trim($asignacion).", devengando un sueldo mensual de: \t".ucfirst($var)."\t"." (L. ".$formato."). con el siguiente detalle:";

$pdf->Ln(3);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(172,0,'CONSTANCIA',0,0,'C');
$pdf->Cell(10,10,'',0,1,'C'); 

 

$texto2="La presente se extiende a petición de parte interasada, en la ciudad de Tegucigalpa, Municipio Central, a los ".$dia_actual." días del mes de ".$mes_actual." del ".trim($anio_actual).".";


$pdf->WriteTag(0,7,utf8_decode("<p>".$texto."</p>"),0,"J",0,0);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(175,5,'INGRESOS',0,1,'C'); 
$pdf->SetFont('Arial','',12);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,5,'Ingresos Permanentes',0,1,'L'); 
$pdf->SetFont('Arial','',12);

//Consulta para Ingresos Permanentes
 $cont=0;
 $positivo1="";
    $sumadorDeduccionesPermanentes=0;
    include('../crearConexionVam.php');
    $sql=mssql_query("SELECT * FROM prmisc WHERE cempno = '$numeroEmpleado' and cpayno='$opcion' and cpaycode !='IHSS' and cpaycode!='INJUPEMP'");
    while($optenerDatos= mssql_fetch_array($sql)){
      $codigoVam=$optenerDatos['cpaycode'];
include('../crearConexionGECOMP.php');
$verconsulta=mssql_query("SELECT * FROM  DEDUCCION_INGRESO WHERE CODIGO_INGRESO='$codigoVam' and PERMANENTE='1'");
while($verconsulta1=mssql_fetch_array($verconsulta)){
  $contador=$contador+1;
 // $monto1=$optenerDatos['nothtax'];
  $monto=$optenerDatos['nothtax'];
  if ($contador==1) {
    $monto1="L. ".number_format($monto,2);
    
  }else{
    $monto=$optenerDatos['nothtax'];
    $monto1=number_format($monto,2);
  }


    $IngresoPermanente=titleCase($verconsulta1['DESCRIPCION']);
  


  
  $cont=$cont+$monto;
  $pdf->Ln(3);
$pdf->Cell(30,5,utf8_encode(trim($IngresoPermanente)),0,1,'L'); 
$pdf->Cell(100,-5,$monto1,0,1,'R'); 
$pdf->Ln(8);


}
}
//fin de Consulta Ingresos Permanentes
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,5,'Ingresos Temporales',0,1,'L'); 
$pdf->SetFont('Arial','',12);

 include('../crearConexionVam.php');
    $ConsultaTemporal=mssql_query("SELECT * FROM prmisc WHERE cempno = '$numeroEmpleado' and cpayno='$opcion' and cpaycode !='IHSS' and cpaycode!='INJUPEMP'");
    while($optenerDatosTempral= mssql_fetch_array($ConsultaTemporal)){
      $CodigoDatoVam=$optenerDatosTempral['cpaycode'];
include('../crearConexionGECOMP.php');
$ConsultaGECOMP=mssql_query("SELECT * FROM  DEDUCCION_INGRESO WHERE CODIGO_INGRESO='$CodigoDatoVam' and TEMPORAL=1");
while($verconsulta=mssql_fetch_array($ConsultaGECOMP)){
  $IngresoTemporal=titleCase($verconsulta['DESCRIPCION']);

  $monto2=$optenerDatosTempral['nothtax'];
  $cont=$cont+$monto2;
  $pdf->Ln(3);
$pdf->Cell(30,5,utf8_encode(trim($IngresoTemporal)) ,0,1,'L'); 
$pdf->Cell(100,-5,number_format($monto2,2),0,1,'R'); 
$pdf->Ln(8);

}
}
$pdf->SetFont('Arial','B',12);
$pdf->Ln(3);
$pdf->Cell(30,5,'Total Ingresos',0,1,'L'); 
$pdf->Cell(175,-5,"L. ".number_format($cont,2),0,1,'R'); 
$pdf->Ln(8);
$pdf->SetFont('Arial','',12);

$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(175,5,'DEDUCCIONES',0,1,'C'); 
$pdf->SetFont('Arial','',12);

$pdf->Ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,5,'Deducciones Permanentes',0,1,'L'); 
$pdf->SetFont('Arial','',12);

include('../crearConexionVam.php');
$verdeducciones=mssql_query("SELECT * FROM prmisc WHERE cempno = '$numeroEmpleado' and cpayno='$opcion' and cpaycode ='INJUPEMP'");
while($verDatos=mssql_fetch_array($verdeducciones)){
  

  $ConvertirDeduccionPer=strtolower($verDatos['cref']);
  $verDatos['cref']=titleCase($ConvertirDeduccionPer);


$positivo1=$verDatos['nothntax']*-1;
$sumadorDeduccionesPermanentes= $sumadorDeduccionesPermanentes+$positivo1;

$pdf->Ln(3);
$pdf->Cell(30,5,$verDatos['cref'] ,0,1,'L'); 
$pdf->Cell(100,-5,"L. ".number_format($positivo1,2),0,1,'R'); 
$pdf->Ln(8);

}
include('../crearConexionVam.php');
      $verdeduccionesIHSS=mssql_query("SELECT * FROM prmisc WHERE cempno = '$numeroEmpleado' and cpayno='$opcion' and cpaycode ='IHSS'");
      while($verDatosIHSS=mssql_fetch_array($verdeduccionesIHSS)){


       // $ConvertirDeduccionPer1=strtolower($verDatosIHSS['cref']);
      //  $verDatosIHSS['cref']=ucwords($ConvertirDeduccionPer1);


         $positivo2=$verDatosIHSS['nothntax']*-1;
        $sumadorDeduccionesPermanentes= $sumadorDeduccionesPermanentes+$positivo2;

        if ($positivo1=="") {
          $positivo2="L. ".number_format($positivo2,2);
        }else{
          $positivo2=number_format($positivo2,2);
        }

$pdf->Ln(3);
$pdf->Cell(30,5,$verDatosIHSS['cref'],0,1,'L'); 
$pdf->Cell(100,-5,$positivo2,0,1,'R'); 
$pdf->Ln(8);
      
}

 include('../crearConexionVam.php');
    $Permanentes=mssql_query("SELECT * FROM prmisd WHERE cempno = '$numeroEmpleado ' and cpayno='$opcion'");
    while($OptenerDatosPer= mssql_fetch_array($Permanentes)){
      $CodigoVam=$OptenerDatosPer['cdedcode'];

include('../crearConexionGECOMP.php');
$VerConsultaPermanentes=mssql_query("SELECT * FROM  DEDUCCION_DEDUCCIONES WHERE CODIGO_DEDUCCION='$CodigoVam' and PERMANENTE=1");
while($verconsulta3=mssql_fetch_array($VerConsultaPermanentes)){
  $DeduccionesPermanentes=titleCase($verconsulta3['DESCRIPCION']);
 


  $monto=$OptenerDatosPer['ndedamt'];
  
  $sumadorDeduccionesPermanentes=$sumadorDeduccionesPermanentes+$monto;
  $pdf->Ln(3);
$pdf->Cell(30,5,$DeduccionesPermanentes,0,1,'L'); 
$pdf->Cell(100,-5,number_format($monto,2),0,1,'R'); 
$pdf->Ln(8);

}
}
$pdf->SetFont('Arial','B',12);
$pdf->Ln(3);
//$pdf->WriteTag(0,5,utf8_decode('Total Deducciones Permanentes'),0,"J",0,0);
$pdf->Cell(30,5,'Total Deducciones Permanentes',0,1,'L'); 
$pdf->Cell(175,-5,"L.".number_format($sumadorDeduccionesPermanentes,2),0,1,'R'); 
$pdf->SetFont('Arial','',12);

$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,5,'Deducciones Temporales',0,1,'L'); 
$pdf->SetFont('Arial','',12);




 
    $sumadorDeduccionesTemporales=0;
    include('../crearConexionVam.php');
    $PermanentesVam=mssql_query("SELECT * FROM prmisd WHERE cempno = '$numeroEmpleado' and cpayno='$opcion'");
    while($OptenerTeporalVam= mssql_fetch_array($PermanentesVam)){
      $DatosVam=$OptenerTeporalVam['cdedcode'];

include('../crearConexionGECOMP.php');
$VaerDeduccionesTemporales=mssql_query("SELECT * FROM  DEDUCCION_DEDUCCIONES WHERE CODIGO_DEDUCCION='$DatosVam' and TEMPORAL=1");
while($verconsulta4=mssql_fetch_array($VaerDeduccionesTemporales)){
  $DeduccionesTemporales=$verconsulta4['DESCRIPCION'];

  $ConvertirDeduccionesTemp=strtolower($DeduccionesTemporales);
  $DeduccionesTemporales=ucwords($ConvertirDeduccionesTemp);


  $MOntoTempral=$OptenerTeporalVam['ndedamt'];
  
  $sumadorDeduccionesTemporales=$sumadorDeduccionesTemporales+$MOntoTempral;

  $pdf->Ln(3);
$pdf->Cell(30,5,$DeduccionesTemporales,0,1,'L'); 
$pdf->Cell(100,-5,number_format($MOntoTempral,2),0,1,'R'); 
$pdf->Ln(8);
  }
}


$pdf->SetFont('Arial','B',12);
$pdf->Ln(3);
$pdf->Cell(30,5,'Total Deducciones Temporales',0,1,'L'); 
$pdf->Cell(175,-5,"L. ".number_format($sumadorDeduccionesTemporales,2),0,1,'R'); 
$pdf->SetFont('Arial','',12);

$Total_Deduccines=$sumadorDeduccionesPermanentes+ $sumadorDeduccionesTemporales;

$pdf->SetFont('Arial','B',12);
$pdf->Ln(10);
$pdf->Cell(30,5,'Total Deducciones ',0,1,'L'); 
$pdf->Cell(175,-5,"L. ".number_format($Total_Deduccines,2),0,1,'R'); 
$pdf->SetFont('Arial','',12);

$Total_neto=$cont-$Total_Deduccines;

$pdf->SetFont('Arial','B',12);
$pdf->Ln(10);
$pdf->Cell(30,5,'Total Neto ',0,1,'L'); 
$pdf->Cell(175,-5,"L. ".number_format($Total_neto,2),0,1,'R'); 
$pdf->SetFont('Arial','',12);



$pdf->Ln(15);
$pdf->WriteTag(0,7,utf8_decode("<p>".$texto2."</p>"),0,"J",0,0);




$pdf->Cell(10,20,'',0,1,'C'); 
//$texto1="PARA LOS FINES QUE AL INTERESADO LE CONVENGA SE LE EXTIENDE LA PRESENTE EN LA CIUDAD DE TEGUCIGALPA, MUNICIPIO DEL DISTRITO CENTRAL A ".$fechaActual."";
$pdf->WriteTag(0,5,utf8_decode($texto1),0,"J",0,0);

 
$pdf->Cell(0,0,'',1,1,'C'); 
//$pdf->Cell(172,5,'',0,1,'C');
//$pdf->Cell(10,3,'',0,1,'C');
$pdf->WriteTag(0,7,utf8_decode($nombresFirma),0,"C",0,0);
$pdf->Cell(10,0,'',0,1,'C');
$pdf->Cell(172,5,$puestoFirma,0,1,'C');

// Signature


 

//$pdf->line(40, 10, 80, 10);
//$pdf->InsertText("\n\n"); 

$pdf->Output();
?>
