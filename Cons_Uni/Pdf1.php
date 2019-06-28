<?php 
$idFirma=$_GET['x'];
$numeroEmpleado=$_GET['proce'];

//require('../fpdf/fpdf.php');
require('../fpdf/WriteHTML.php');
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
//$var=convertir($opnetersueldo);
//$formato=number_format($opnetersueldo,2);


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
$fechaActual=fecha1($dia,$mes,$anio); 

include('../crearConexionGECOMP.php');
$mostrarDato=mssql_query("SELECT * FROM FIRMA_CONSTANCIAS WHERE Id_FIRMA='$idFirma'");
if ($firma=mssql_fetch_array($mostrarDato)) {
  $nombreFirma=$firma['NOMBRE_EMPLEADO'];
  $puestoFirma=$firma['PUESTO_EMPLEADO'];
}


class PDF extends PDF_HTML
{
// Page header
function Header()
{
    // Logo
    $this->Image('../img/9.png',10,6,75);
    // Arial bold 15
    $this->SetFont('Times','B',14);
    // Move to the right
    $this->Ln(25);
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
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);
$pdf->AddPage();

$pdf->SetFont('Arial','B',14);
$pdf->SetMargins(50,15,25);
$html = // Text
$txt=" 
<p>Il <vb>était</vb> une fois <pers>une petite fille</pers> de <place>village</place>, 
la plus jolie qu'on <vb>eût su voir</vb>: <pers>sa mère</pers> en <vb>était</vb> 
folle, et <pers>sa mère grand</pers> plus folle encore. Cette <pers>bonne femme</pers> 
lui <vb>fit faire</vb> un petit chaperon rouge, qui lui <vb>seyait</vb> si bien 
que par tout on <vb>l'appelait</vb> <pers>le petit Chaperon rouge</pers>.</p> 

<p>Un jour <pers>sa mère</pers> <vb>ayant cuit</vb> et <vb>fait</vb> des galettes, 
<vb>lui dit</vb>: « <vb>Va voir</vb> comment <vb>se porte</vb> <pers>la mère-grand</pers>; 
car on <vb>m'a dit</vb> qu'elle <vb>était</vb> malade: <vb>porte-lui</vb> une 
galette et ce petit pot de beurre. »</p>

<p>Un jour <pers>sa mère</pers> <vb>ayant cuit</vb> et <vb>fait</vb> des galettes, 
<vb>lui dit</vb>: « <vb>Va voir</vb> comment <vb>se porte</vb> <pers>la mère-grand</pers>; 
car on <vb>m'a dit</vb> qu'elle <vb>était</vb> malade: <vb>porte-lui</vb> une 
galette et ce petit pot de beurre. »</p>

<p>Un jour <pers>sa mère</pers> <vb>ayant cuit</vb> et <vb>fait</vb> des galettes, 
<vb>lui dit</vb>: « <vb>Va voir</vb> comment <vb>se porte</vb> <pers>la mère-grand</pers>; 
car on <vb>m'a dit</vb> qu'elle <vb>était</vb> malade: <vb>porte-lui</vb> une 
galette et ce petit pot de beurre. »</p>

<p>Un jour <pers>sa mère</pers> <vb>ayant cuit</vb> et <vb>fait</vb> des galettes, 
<vb>lui dit</vb>: « <vb>Va voir</vb> comment <vb>se porte</vb> <pers>la mère-grand</pers>; 
car on <vb>m'a dit</vb> qu'elle <vb>était</vb> malade: <vb>porte-lui</vb> une 
galette et ce petit pot de beurre. »</p>
 
<p><pers>Le petit Chaperon rouge</pers> <vb>partit</vb> aussitôt pour <vb>aller</vb> 
chez <pers>sa mère-grand</pers>, qui <vb>demeurait</vb> dans <place>un autre village</place>. 
En passant dans <place>un bois</place>, elle <vb>rencontra</vb> compère <pers>le 
Loup</pers>, qui <vb>eut bien envie</vb> de <vb>la manger</vb>; mais il <vb>n'osa</vb> 
à cause de quelques <pers>bûcherons</pers> qui <vb>étaient</vb> dans 
<place>la forêt</place>.</p>
";

//$pdf->WriteHTML($txt);
 $pdf->MultiCell(190,10,$pdf->WriteHTML($txt),0,0,'J');


//$pdf->line(40, 10, 80, 10);
//$pdf->InsertText("\n\n"); 

$pdf->Output();
?>