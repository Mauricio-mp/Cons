<?php 
$idFirma=$_GET['x'];
$numeroEmpleado=$_GET['proce'];
   $aniomostrar=$_GET['y'];
    $mesmostrar=$_GET['z'];
        if ($mesmostrar == "JUNIO") {
            $leyenda="decimo cuarto mes ".strtolower($fechaAcuerdo)."";
                }
                    if ($mesmostrar == "DICIEMBRE") {
            $leyenda="decimo tercer mes ".strtolower($fechaAcuerdo)."";
                }


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

$fechaAactual=  date("Y-m-d");
 $fechaAcuerdo_anioactual= $dia."-".$mes."-".$anio1;
   
   //$DateNum= Optenerfecha($mes,$anio);
$fechacon=date("Y-m-d", strtotime($row['dhire']));
  $fechaac=date("Y-m-d", strtotime($row['dcntrct']));
//inicio de validaciones importantes


if ($fechacon == $fechaac) {
$msg="ha laborado por acuerdo en esta institucion a partir del ".strtolower($fechaAcuerdo)."";
   }
 if ($fechacon<$fechaac) {
    $msg="ha laborado por contrato en esta institucion a partir de ".strtolower($fechaContrato)." y por acuerdo desde el ".strtolower($fechaAcuerdo)."";
  }


$var=convertir($opnetersueldo);
$formato=number_format($opnetersueldo,2);





$vac = "VAC";
$trece = "13AVO";
$catorce = "14AVO";
//verificar si tiene embargos
$mensaje_embargos=" ";
$mostrarDatos1=mssql_query("select ctrsno FROM prtrst where cempno='$numeroEmpleado' and ctrsno = (select max(ctrsno) FROM prtrst where cempno='$numeroEmpleado' and cpayno not like ('%$vac%') and cpayno not like ('%$trece%') and cpayno not like ('%$catorce%'))");
if ($row1=mssql_fetch_array($mostrarDatos1)) {
                   $dato = $row1['ctrsno'];

             $mostrarDatos2=mssql_query("SELECT sum(ndedamt) as embargo FROM prmisd where cempno='$numeroEmpleado' and ctrsno='$dato' and cdedcode=970");
                if ($row2=mssql_fetch_array($mostrarDatos2)) {
                        //se encontro deduccion con el codigo de embargo
                          $dato1 = $row2['embargo'];

                            if (is_null($dato1)) {
                              
                          $mensaje_embargos="No tiene comprometido su bono de ".$leyenda.", el cual se pagara el mes de ".strtolower($mesmostrar)." del año ".$aniomostrar.".";
                               }else{

                         $embargo_letras=convertir($dato1);
                        

                          $mensaje_embargos="Tiene comprometido su bono de ".$leyenda." en ".strtolower($embargo_letras).", el cual se pagara el mes de ".strtolower($mesmostrar)." del año ".$aniomostrar.".";
                               }
                      }else{
                          
                          $mensaje_embargos="No tiene comprometido su bono de ".$leyenda.", el cual se pagara el mes de ".strtolower($mesmostrar)." del año ".$aniomostrar.".";
                        }


} else{
                 $mesletras=fecha3($mesmostrar);
                           $mensaje_embargos="No tiene comprometido su bono de ".$leyenda.", el cual se pagara el mes de ".strtolower($mesmostrar)." del año ".$aniomostrar.".";

  }








$mostrarDesc=mssql_query("SELECT * FROM hrjobs WHERE cJobTitlNO='$codigoPuesto'");
if ($ejecutar=mssql_fetch_array($mostrarDesc)) {
    $desempenio=trim($ejecutar['cDesc']);
}
$mostrarDesc=mssql_query("SELECT * FROM prdept WHERE cdeptno='$codigoAsignado'");
if ($asignado=mssql_fetch_array($mostrarDesc)) {
    $asignacion=trim($asignado['cdeptname']);
}

include('../cerraConexionVam.php');
    
}
$dia=date("d");
$mes=date("m");
$anio=date("Y");
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
   // $this->SetLineWidth(0);
   // $this->Line(20,280,190,280);
    $this->Cell(0,0,'Edificio Lomas Plaza II, Lomas del guijaro, Avenida Republica Dominicana, Tegucigalpa D.M.C, Honduras C.A 1',0,0,'C');
    $this->Ln();
    $this->Cell(0,10,'apartado postal No, 3730, Tel:(504)2221-3099, FAX:(504)2221-5667',0,0,'C');
}

}

// Instanciation of inherited class


$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',13);
$pdf->SetLeftMargin(21); #Establecemos los márgenes izquierda: 
$pdf->SetRightMargin(21); #Establecemos los márgenes Derecha: 


// Stylesheet
$pdf->SetStyle("p","Arial","",12,"0,0,0",0);
$pdf->SetStyle("h1","arial","N",12,"0,0,0",0);
$pdf->SetStyle("a","arial","BU",12,"0,0,0");
$pdf->SetStyle("pers","arial","I",0,"0,0,0");
$pdf->SetStyle("place","arial","U",0,"0,0,0");
$pdf->SetStyle("vb","arial","B",0,"0,0,0");



$pdf->Ln(3);

// Text
$txt="<vb>".ucwords(strtolower(utf8_encode($nombre)))." ".ucwords(strtolower(utf8_encode($apellido)))."</vb>";


$texto = "<p>El(la) suscrito(a), ".utf8_encode($puestoFirma)." del Ministerio Publico hace constar que ".$txt.", ".$msg.", actualmente se desempeña como ".ucwords(strtolower(utf8_encode($desempenio))).""." asignado a ".ucwords(strtolower(utf8_encode($asignacion))).", devengando un sueldo mensual de ".ucfirst(strtolower($var)).""." (L. ".$formato.").</p>";



$pdf->WriteTag(0,7,utf8_decode($texto),0,"J",0,0);


$pdf->Cell(10,10,'',0,1,'C'); 

$texto1="Constancia que se expide a peticion de parte interesada, en la Ciudad de Tegucigalpa, Municipio del Distrito Central a ".strtolower($fechaActual).".";

$pdf->WriteTag(0,7,utf8_decode($mensaje_embargos),0,"J",0,0);
$pdf->Cell(10,10,'',0,1,'C'); 
$pdf->WriteTag(0,7,utf8_decode($texto1),0,"J",0,0);

$pdf->line();  
$pdf->Cell(10,50,'',0,1,'C'); 
$pdf->Cell(172,5,'________________________________________________',0,1,'C');
$pdf->Cell(10,4,'',0,1,'C');
$pdf->Cell(172,7,ucwords(strtolower(utf8_encode($nombreFirma))),0,1,'C');
$pdf->Cell(10,2,'',0,1,'C');
$pdf->Cell(172,5,$puestoFirma,0,1,'C');

// Signature


 

//$pdf->line(40, 10, 80, 10);
//$pdf->InsertText("\n\n"); 

$pdf->Output();
?>