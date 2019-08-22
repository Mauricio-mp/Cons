<?php 
$idFirma=$_GET['firma'];
$numeroEmpleado=$_GET['numero'];
$opcion=$_GET['opcion'];
$contador=1;

//require('../fpdf/fpdf.php');
require('../fpdf/WriteTag.php');
require('ConversionSueldo.php');
require('ConversionFecha.php');
include('../crearConexionVam.php'); 
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
    $msg="HA LABORADO POR ACURDO EN ESTA INSTITUCION A PARTIR DEL ".$fechaContrato.", ";
  }
  if ($row['dhire']>$row['dcntrct']) {
    $msg="HA LABORADO POR CONTRATO EN ESTA INSTITUCION APARTIR DE ".$fechaContrato." Y POR ACUERDO DESDE EL ".$fechaAcuerdo.",";
  }
$var=convertir($opnetersueldo);
$formato=number_format($opnetersueldo,2);


$mostrarDesc=mssql_query("SELECT * FROM hrjobs WHERE cJobTitlNO='$codigoPuesto'");
if ($ejecutar=mssql_fetch_array($mostrarDesc)) {
    $desempenio=trim($ejecutar['cDesc']);
    $ConvertirDesen=strtolower($desempenio);
    $desempenio=ucwords($ConvertirDesen);
}
$mostrarDesc=mssql_query("SELECT * FROM prdept WHERE cdeptno='$codigoAsignado'");
if ($asignado=mssql_fetch_array($mostrarDesc)) {
    $asignacion=trim($asignado['cdeptname']);
    $ConvertiAsignacion=strtolower($asignacion);
    $asignacion=ucwords($ConvertiAsignacion);
}


    
}
$dia=date("d");
$mes=date("m");
$anio=date("Y");
$DateNum= Optenerfecha($mes,$anio);
$fechaActual=fecha1($dia,$mes,$anio); 

include('../crearConexionGECOMP.php');
$mostrarDato=mssql_query("SELECT * FROM FIRMA_CONSTANCIAS WHERE Id_FIRMA='$idFirma'");
if ($firma=mssql_fetch_array($mostrarDato)) {
  $nombreFirma=$firma['NOMBRE_EMPLEADO'];
  $convertirFirma=strtolower($nombreFirma);
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
    // Move to the right
    $this->Ln(40);
    $this->Cell(72);
    // Title

    $this->Cell(45,0,'CONSTANCIA',0,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
      // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->SetLineWidth(0);
    $this->Line(20,280,190,280);
    $this->Cell(0,0,'Edificio Lomas Plaza II, Lomas del guijaro, Avenida Republica Dominicana, Tegucigalpa D.M.C, Honduras C.A 1',0,0,'C');
    $this->Ln();
    $this->Cell(0,10,'apartado postal No, 3730, Tel:(504)2221-3099, FAX:(504)2221-5667',0,0,'C');
}

}

// Instanciation of inherited class


$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',13);
$pdf->SetLeftMargin(18); #Establecemos los márgenes izquierda: 
$pdf->SetRightMargin(18); #Establecemos los márgenes Derecha: 


// Stylesheet
$pdf->SetStyle("p","Arial","",12,"0,0,0",0);
$pdf->SetStyle("h1","arial","N",12,"0,0,0",0);
$pdf->SetStyle("a","arial","BU",12,"0,0,0");
$pdf->SetStyle("pers","arial","I",0,"0,0,0");
$pdf->SetStyle("place","arial","U",0,"0,0,0");
$pdf->SetStyle("vb","arial","B",12,"0,0,0");
$pdf->SetStyle("Negritas","arial","B",14,"0,0,0");



$pdf->Ln(5);

// Text   ñ  í   ó   ú
$txt=utf8_encode($nombre)." ".utf8_encode($apellido);
$ConvertirNombre=strtolower($txt);
$txt="<vb>".ucwords('jose andres gomez maradiaga')."</vb>";
$Descripcion="<vb>".utf8_encode('Descripción')."</vb>";
$monto="<vb>".utf8_encode('Monto')."</vb>";

$texto = "El (la) suscrito ".utf8_encode($puestoFirma)." del Ministerio Público hace constar que ".$txt." ha laborado en esta institución a partir del ".$fechaContrato." y por acuerdo el ".$fechaAcuerdo.", actualmente se desempeña como: \t".trim($desempenio)."\t"." asignado a: ".utf8_encode($asignacion).", devengando un sueldo mensual de: \t".ucfirst($var)."\t"." (L. ".$formato."). Teniendo:";


 

$texto2="Constancia que se expide a petición de parte interesada, en la ciudad de Tegucigalpa, Municipio Central, a ".$fechaActual."";

$pdf->WriteTag(0,7,utf8_decode($texto),0,"J",0,0);
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
  $contador=$contador++;
 // $monto1=$optenerDatos['nothtax'];
  $monto=$optenerDatos['nothtax'];
  if ($contador==1) {
    $monto1="L. ".number_format($monto,2);
    
  }else{
    $monto=$optenerDatos['nothtax'];
    $monto1=number_format($monto,2);
  }


    $IngresoPermanente=$verconsulta1['DESCRIPCION'];
  $ConvertirIngresoPer=strtolower($IngresoPermanente);
  $IngresoPermanente=ucwords($ConvertirIngresoPer);


  
  $cont=$cont+$monto;
  $pdf->Ln(3);
$pdf->Cell(30,5,$IngresoPermanente,0,1,'L'); 
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
  $IngresoTemporal=$verconsulta['DESCRIPCION'];

  $ConvertirIngresoTem=strtolower($IngresoTemporal);
  $IngresoTemporal=ucwords($ConvertirIngresoTem);


  $monto2=$optenerDatosTempral['nothtax'];
  $cont=$cont+$monto2;
  $pdf->Ln(3);
$pdf->Cell(30,5,$IngresoTemporal,0,1,'L'); 
$pdf->Cell(100,-5,number_format($monto2,2),0,1,'R'); 
$pdf->Ln(8);

}
}
$pdf->SetFont('Arial','B',12);
$pdf->Ln(3);
$pdf->Cell(30,5,'Total Ingresos',0,1,'L'); 
$pdf->Cell(175,-5,number_format($cont,2),0,1,'R'); 
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
  $verDatos['cref']=ucwords($ConvertirDeduccionPer);


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
  $DeduccionesPermanentes=$verconsulta3['DESCRIPCION'];
 
      $ConvertirDeduccionPer2=strtolower($DeduccionesPermanentes);
      $DeduccionesPermanentes=ucwords($ConvertirDeduccionPer2);

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
$pdf->Cell(175,-5,number_format($sumadorDeduccionesTemporales,2),0,1,'R'); 
$pdf->SetFont('Arial','',12);

$Total_Deduccines=$sumadorDeduccionesPermanentes+ $sumadorDeduccionesTemporales;

$pdf->SetFont('Arial','B',12);
$pdf->Ln(10);
$pdf->Cell(30,5,'Total Deducciones ',0,1,'L'); 
$pdf->Cell(175,-5,number_format($Total_Deduccines,2),0,1,'R'); 
$pdf->SetFont('Arial','',12);

$Total_neto=$cont-$Total_Deduccines;

$pdf->SetFont('Arial','B',12);
$pdf->Ln(10);
$pdf->Cell(30,5,'Total Neto ',0,1,'L'); 
$pdf->Cell(175,-5,number_format($Total_neto,2),0,1,'R'); 
$pdf->SetFont('Arial','',12);



$pdf->Ln(15);
$pdf->WriteTag(0,7,utf8_decode($texto2),0,"J",0,0);




$pdf->Cell(10,20,'',0,1,'C'); 
//$texto1="PARA LOS FINES QUE AL INTERESADO LE CONVENGA SE LE EXTIENDE LA PRESENTE EN LA CIUDAD DE TEGUCIGALPA, MUNICIPIO DEL DISTRITO CENTRAL A ".$fechaActual."";
$pdf->WriteTag(0,5,utf8_decode($texto1),0,"J",0,0);

$pdf->line();  
$pdf->Cell(10,50,'',0,1,'C'); 
$pdf->Cell(172,5,'________________________________________________',0,1,'C');
$pdf->Cell(10,3,'',0,1,'C');
$pdf->Cell(172,5,$nombreFirma,0,1,'C');
$pdf->Cell(10,0,'',0,1,'C');
$pdf->Cell(172,5,$puestoFirma,0,1,'C');

// Signature


 

//$pdf->line(40, 10, 80, 10);
//$pdf->InsertText("\n\n"); 

$pdf->Output();
?>