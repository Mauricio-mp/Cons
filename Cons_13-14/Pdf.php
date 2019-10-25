<?php 
$idFirma=$_GET['x'];
$numeroEmpleado=$_GET['proce'];
$aniomostrar=$_GET['y'];
$mesmostrar=$_GET['z'];
$conca=$_GET['ido'];

        if ($mesmostrar == "JUNIO") {
            $leyenda="decimo cuarto mes".strtolower($fechaAcuerdo)."";
                }
                    if ($mesmostrar == "DICIEMBRE") {
            $leyenda="decimo tercer mes".strtolower($fechaAcuerdo)."";
                }


//require('../fpdf/fpdf.php');
require('../fpdf/WriteTag.php');
require('ConversionSueldo.php');
require('ConversionFecha.php');
include('ConversionLetras.php');


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
    $nombreCompleto=$Nombre." ".$Apellido;
  $cambiarLetra=strtolower($nombreCompleto);

  $nombreCompleto=ucwords($cambiarLetra);



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
$msg="ha laborado por acuerdo en esta institución  desde el ".strtolower($fechaAcuerdo)."";
   }
 if ($fechacon<$fechaac) {
    $msg="ha laborado por contrato en esta institución  desde el ".strtolower($fechaContrato)." y por acuerdo desde el ".strtolower($fechaAcuerdo)."";
  }








$vac = "VAC";
$trece = "13AVO";
$catorce = "14AVO";
//verificar si tiene embargos
$mensaje_embargos=" ";
$mostrarDatos1=mssql_query("select ctrsno FROM prtrst where cempno='$numeroEmpleado' and ctrsno = (select max(ctrsno) FROM prtrst where cempno='$numeroEmpleado' and cpayno not like ('%$vac%') and cpayno not like ('%$trece%') and cpayno not like ('%$catorce%'))");
if ($row1=mssql_fetch_array($mostrarDatos1)) {
                   $dato = $row1['ctrsno'];

             $mostrarDatos2=mssql_query("SELECT sum(ndedamt) as embargo FROM prmisd where cempno='$numeroEmpleado' and ctrsno='$dato' and cdedcode=1025");
                if ($row2=mssql_fetch_array($mostrarDatos2)) {
                        //se encontro deduccion con el codigo de embargo
                          $dato1 = $row2['embargo'];

                            if (is_null($dato1)) {
                              
                          $mensaje_embargos="No tiene comprometido su bono de ".$leyenda.", el cual se pagará el mes de ".strtolower($mesmostrar)." del año ".$aniomostrar.".";
                               }else{
                                  $opnetersueldo=($opnetersueldo-$dato1);
                         $embargo_letras=convertir($dato1);
                        

                          $mensaje_embargos="No tiene comprometido su bono de ".$leyenda.", el cual se pagará el mes de ".strtolower($mesmostrar)." del año ".$aniomostrar.".";
                               }
                      }else{
                          
                          $mensaje_embargos="No tiene comprometido su bono de ".$leyenda.", el cual se pagará el mes de ".strtolower($mesmostrar)." del año ".$aniomostrar.".";
                        }


} else{
                 $mesletras=fecha3($mesmostrar);
                           $mensaje_embargos="No tiene comprometido su bono de ".$leyenda.", el cual se pagará el mes de ".strtolower($mesmostrar)." del año ".$aniomostrar.".";

  }




$var=convertir($opnetersueldo);
$formato=number_format($opnetersueldo,2);



$mostrarDesc=mssql_query("SELECT * FROM hrjobs WHERE cJobTitlNO='$codigoPuesto'");
if ($ejecutar=mssql_fetch_array($mostrarDesc)) {
    $desempenio=titleCase(utf8_encode( $ejecutar['cDesc']));
}
$mostrarDesc=mssql_query("SELECT * FROM prdept WHERE cdeptno='$codigoAsignado'");
if ($asignado=mssql_fetch_array($mostrarDesc)) {
    $asignacion=titleCase(utf8_encode($asignado['cdeptname']));
}

include('../cerraConexionVam.php');
    
}
$dia=date("d");
$mes=date("m");
$anio=date("Y");
$fechaActual=fecha2($dia,$mes,$anio); 

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
   // $this->SetTextColor(194,8,8);
    //$this->Cell(45,0,'Prueba',0,0,'C');
    // Move to the right
     $this->SetFont('Times','B',14);
     $this->SetTextColor(0,0,0);
    $this->Ln(40);
    $this->Cell(72);
    // Title

   
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
    $this->Cell(0,0,'Edificio Lomas Plaza II, Lomas del guijaro, Avenida Republica Dominicana, Tegucigalpa D.M.C, Honduras C.A 1',0,0,'C');
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
$pdf->SetFont('Arial','',13);
$pdf->SetLeftMargin(21); #Establecemos los márgenes izquierda: 
$pdf->SetRightMargin(21); #Establecemos los márgenes Derecha: 


// Stylesheet
$pdf->SetStyle("p","Arial","",13,"0,0,0",0);
$pdf->SetStyle("h1","arial","N",12,"0,0,0",0);
$pdf->SetStyle("a","arial","BU",12,"0,0,0");
$pdf->SetStyle("pers","arial","I",0,"0,0,0");
$pdf->SetStyle("place","arial","U",0,"0,0,0");
$pdf->SetStyle("vb","arial","B",0,"0,0,0");
$pdf->SetStyle("negrta","arial","B",13,"0,0,0");


$pdf->Ln(3);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(172,0,'CONSTANCIA',0,0,'C');
$pdf->Cell(10,10,'',0,1,'C'); 
// Text
$txt="<vb>".strtoupper(utf8_encode($nombre))." ".strtoupper(utf8_encode($apellido))."</vb>";


$texto = "<p>El(la) suscrito(a), ".utf8_encode($puestoFirma)." del Ministerio Público hace constar que ".$txt.", ".$msg.", actualmente se desempeña como: ".trim($desempenio).""." asignado a: ".trim($asignacion).", devengando un sueldo mensual de: ".ucfirst(strtolower($var)).""." (L. ".$formato.").</p>";



$pdf->WriteTag(0,7,utf8_decode("<p>".$texto."</p>"),0,"J",0,0);


$pdf->Cell(0,0,'',0,1,'C'); 

$texto1=" <p>La presente se extiende a petición de parte interesada, en la Ciudad de Tegucigalpa, Municipio del Distrito Central, ".trim(strtolower($fechaActual))  .".
</p>";

$pdf->WriteTag(0,7,utf8_decode("<p>".$mensaje_embargos."</p>"),0,"J",0,0);
$pdf->Cell(10,10,'',0,1,'C'); 
$pdf->WriteTag(0,7,utf8_decode($texto1),0,"J",0,0);




$pdf->line();  
$pdf->Cell(10,18,'',0,1,'C'); 
//$pdf->Cell(172,5,'',0,1,'C');
//$pdf->Cell(10,3,'',0,1,'C');
$pdf->WriteTag(0,2,"<negrta>".strtoupper(utf8_encode($nombreFirma))."</negrta>",0,'C',0,0);
$pdf->Cell(20,3,'',0,1,'C');
$pdf->WriteTag(0,2,"<negrta>".$puestoFirma."</negrta>",0,'C',0,0);

// Signature


 

//$pdf->line(40, 10, 80, 10);
//$pdf->InsertText("\n\n"); 

$pdf->Output();
?>