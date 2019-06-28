<?php 
$idFirma=$_GET['firma'];
$numeroEmpleado=$_GET['numero'];
$opcion=$_GET['opcion'];

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
}
$mostrarDesc=mssql_query("SELECT * FROM prdept WHERE cdeptno='$codigoAsignado'");
if ($asignado=mssql_fetch_array($mostrarDesc)) {
    $asignacion=trim($asignado['cdeptname']);
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
  $puestoFirma=$firma['PUESTO_EMPLEADO'];
}



class PDF extends PDF_WriteTag
{
  

// Page header
function Header()
{
    // Logo
    $this->Image('../img/9.png',10,6,75);
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
$pdf->SetFont('Arial','',10);
$pdf->SetLeftMargin(18); #Establecemos los márgenes izquierda: 
$pdf->SetRightMargin(18); #Establecemos los márgenes Derecha: 


// Stylesheet
$pdf->SetStyle("p","Arial","",10,"0,0,0",0);
$pdf->SetStyle("h1","arial","N",10,"0,0,0",0);
$pdf->SetStyle("a","arial","BU",10,"0,0,0");
$pdf->SetStyle("pers","arial","I",0,"0,0,0");
$pdf->SetStyle("place","arial","U",0,"0,0,0");
$pdf->SetStyle("vb","arial","B",0,"0,0,0");



$pdf->Ln(5);

// Text
$txt="<vb>".utf8_encode($nombre)." ".utf8_encode($apellido)."</vb>";
$Descripcion="<vb>".utf8_encode('Descripción')."</vb>";
$monto="<vb>".utf8_encode('Monto')."</vb>";

$texto = "EL(A) SUSCRITO ".utf8_encode($puestoFirma)." DEL MINISTERIO PUBLICO HACE CONSTAR QUE ".$txt." HA LABORADO POR CONTRATO EN ESTA INSTITUCION A PARTIR DEL ".$fechaContrato." Y POR ACUERDO DESDE EL ".$fechaAcuerdo.", ACTUALMENTE SE DESEMPEÑA COMO: \t".trim($desempenio)."\t"." ASIGNADO A: ".utf8_encode($asignacion).", DEVENGANDO UN SUELDO MENSUAL DE: \t".$var."\t"." (".$formato.").";


  include('../crearConexionVam.php'); 
  $suma1=0;
  $suma2=0;
          $optenerTotal=mssql_query("SELECT * FROM prmisc WHERE cempno ='$numeroEmpleado' and cpayno='JUNIO/2018' and cpaycode !='100'");
          while($consultar=mssql_fetch_array($optenerTotal)){
            $consultar['nothntax']=$consultar['nothntax'] *-1;
            $suma1=$suma1+$consultar['nothntax'];
              }

         $optenerTotal1=mssql_query("SELECT * FROM prmisd WHERE cempno='$numeroEmpleado' AND cpayno='JUNIO/2018'");
         while($row=mssql_fetch_array($optenerTotal1)){
           
           $Cant_dedu = $row['ndedamt'];
           
           $suma2=$suma2+$Cant_dedu;
           //$cantida=$Cant_dedu;
          //$formato=number_format($cantida,2);
          
          //echo $Cant_dedu;
            
         } 
         $total=$suma1+$suma2;
         $sumaTotal=convertir($total);
         $formatoTotal=number_format($total,2);
         $totalNeto=$opnetersueldo-$total;
         $formatoNeto=number_format($totalNeto,2);

$texto1="<p>TOTAL DE DEDUCCIONES: PLANILLA DE SUELDOS DE ".$DateNum." FUE DE ".$sumaTotal." ($formatoTotal). TOTAL NETO: $formatoNeto, DISTRIBUIDAS DE ELA SIGUIENTE FORMA: </p>";

$pdf->WriteTag(0,5,utf8_decode($texto),0,"J",0,0);
$pdf->Ln(5);
$pdf->WriteTag(0,5,utf8_decode($texto1),0,"J",0,0);
$pdf->Ln(5);
$pdf->Ln(5);


$pdf->Cell(90,0,utf8_decode('Descripción'),0,1,'C'); 
$pdf->Cell(170,0,'',0,1,'C'); 
$pdf->Cell(270,0,'Monto',0,1,'C'); 
$pdf->Ln(5);
$pdf->Ln(5);
$consulta=mssql_query("SELECT * FROM prmisc WHERE cempno ='$numeroEmpleado' and cpayno='JUNIO/2018' and cpaycode !='100'");
          while($fila=mssql_fetch_array($consulta)){
            $fila['nothntax']=$fila['nothntax'] *-1;
            $fila['cref'];
             $formato1=number_format($fila['nothntax'],2);

            $pdf->Cell(140,0,$fila['cref'],0,1,'L'); 
            $pdf->Cell(170,0,'',0,1,'C'); 
            $pdf->Cell(270,0,"L. ".$formato1,0,1,'C'); 
            $pdf->Ln(5);
            

          }

           $consultarDeduccion=mssql_query("SELECT * FROM prmisd WHERE cempno='$numeroEmpleado' AND cpayno='JUNIO/2018'");
         while($consultarDeduccion1=mssql_fetch_array($consultarDeduccion)){
           $Cod_dedu = $consultarDeduccion1['cdesc'];
           $Cant_dedu = $consultarDeduccion1['ndedamt'];
          $formato=number_format($Cant_dedu,2);
          $pdf->Cell(140,0,$Cod_dedu,0,1,'L'); 
            $pdf->Cell(170,0,'',0,1,'C'); 
            $pdf->Cell(270,0,"L. ".$formato,0,1,'C'); 
            $pdf->Ln(5);
           
            
         }   

           

//$pdf->Cell(170,0,'dww2',0,1,'C'); 
//$pdf->Cell(270,0,'dww3',0,1,'C'); 



$pdf->Cell(10,20,'',0,1,'C'); 
$texto1="PARA LOS FINES QUE AL INTERESADO LE CONVENGA SE LE EXTIENDE LA PRESENTE EN LA CIUDAD DE TEGUCIGALPA, MUNICIPIO DEL DISTRITO CENTRAL A ".$fechaActual."";
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