
 
<?php 
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=Reporte1.xls');
	include('../crearConexionGECOMP.php');
	

$datos=$_GET['x'];
$ppp=json_decode($datos);
$mensaje=$_GET['mensaje'];

$fechaminima=$_GET['inicio'];
$fechamaxima=$_GET['final'];
$cons=$_GET['cons'];
function dirigida($id){
$optenerNombre=mssql_query("SELECT NOMBRE_COOPERATIVA FROM COOPERATIVAS WHERE Id_Cooperativa='$id'");
 if ($Datos=mssql_fetch_array($optenerNombre)) {
              $nombre=$Datos['NOMBRE_COOPERATIVA'];
            }
  

  return $nombre;
}



$nombre=$ppp[0];
$sueldo=$ppp[1];
$apellido=$ppp[2];
$fecha_mod=$ppp[3];
$codigo=$ppp[4];
$dirigida=$ppp[5];
$creacion=$ppp[6];
$estado=$ppp[7];
$modificacion=$ppp[8];
$obervacion=$ppp[9];
$entrega=$ppp[10];


if ($nombre=="") {
  $nombre=0;
}
if ($sueldo=="") {
  $sueldo=0;
}
if ($apellido=="") {
  $apellido=0;
}
if ($fecha_mod=="") {
  $fecha_mod=0;
}
if ($codigo=="") {
  $codigo=0;
}
if ($dirigida=="") {
  $dirigida=0;
}
if ($creacion=="") {
  $creacion=0;
}
if ($estado=="") {
  $estado=0;
}
if ($modificacion=="") {
  $modificacion=0;
}
if ($obervacion=="") {
  $obervacion=0;
}
if ($entrega=="") {
  $entrega=0;
}



 ?>
 <h1 style="text-align: center"><?php echo $mensaje; ?></h1>
  <table id="table" class="display nowrap dataTable dtr-inline" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
      <thead class="bg-gray">
        <tr role="row">
           <td style="text-align: center"><?php echo $nombre ?></td>
<td style="text-align: center"><?php echo $sueldo ?></td>
<td style="text-align: center"><?php echo $apellido ?></td>
<td style="text-align: center"><?php echo $fecha_mod ?></td>
<td style="text-align: center"><?php echo $codigo ?></td>
<td style="text-align: center"><?php echo $dirigida ?></td>
<td style="text-align: center"><?php echo $creacion ?></td>
<td style="text-align: center"><?php echo $estado ?></td>
<td style="text-align: center"><?php echo $modificacion ?></td>
<td style="text-align: center"><?php echo $obervacion ?></td>
<td style="text-align: center"><?php echo $entrega ?></td>
            

            
         </tr>
         <?php
    include('../crearConexionGECOMP.php');
    if ($opcion=='') {
      $query=mssql_query("SELECT $nombre,$sueldo,$apellido,$fecha_mod,$codigo,$dirigida,$creacion,$estado,$modificacion,$obervacion,$entrega FROM CONSTANCIA_GENERADA WHERE Fecha_Creacion between '$fechaminima' and '$fechamaxima' AND cPeriodo like '$cons%' "); 
    while($fila=mssql_fetch_array($query)){

      if ($ppp[0]=='Estado_Entrega') {
        if ($fila[0]==1) {
    $fila[0]="Pendiente";
  }else{
    $fila[0]='Entregado';
  }
      }

      if ($ppp[1]=='Estado_Entrega') {
        if ($fila[1]==1) {
    $fila[1]="Pendiente";
  }else{
    $fila[1]='Entregado';
  }
      }

      if ($ppp[2]=='Estado_Entrega') {
        if ($fila[2]==1) {
    $fila[2]="Pendiente";
  }else{
    $fila[2]='Entregado';
  }
      }

      if ($ppp[3]=='Estado_Entrega') {
        if ($fila[3]==1) {
    $fila[3]="Pendiente";
  }else{
    $fila[3]='Entregado';
  }
      }

      if ($ppp[4]=='Estado_Entrega') {
        if ($fila[4]==1) {
    $fila[4]="Pendiente";
  }else{
    $fila[4]='Entregado';
  }
      }

      if ($ppp[5]=='Estado_Entrega') {
        if ($fila[5]==1) {
    $fila[5]="Pendiente";
  }else{
    $fila[5]='Entregado';
  }
      }

      if ($ppp[6]=='Estado_Entrega') {
        if ($fila[6]==1) {
    $fila[6]="Pendiente";
  }else{
    $fila[6]='Entregado';
  }
      }

      if ($ppp[7]=='Estado_Entrega') {
        if ($fila[7]==1) {
    $fila[7]="Pendiente";
  }else{
    $fila[7]='Entregado';
  }
      }

      if ($ppp[8]=='Estado_Entrega') {
        if ($fila[8]==1) {
    $fila[8]="Pendiente";
  }else{
    $fila[8]='Entregado';
  }
      }

      if ($ppp[9]=='Estado_Entrega') {
        if ($fila[9]==1) {
    $fila[9]="Pendiente";
  }else{
    $fila[9]='Entregado';
  }
      }

       if ($ppp[10]=='Estado_Entrega') {
        if ($fila[10]==1) {
    $fila[10]="Pendiente";
  }else{
    $fila[10]='Entregado';
  }
      }


      /////
      if ($ppp[0]=='Estado') {
        if ($fila[0]==1) {
    $fila[0]="Activo";
  }else{
    $fila[0]='Inactivo';
  }
      }
      if ($ppp[1]=='Estado') {
        if ($fila[1]==1) {
    $fila[1]="Activo";
  }else{
    $fila[1]='Inactivo';
  }
      }

      if ($ppp[2]=='Estado') {
        if ($fila[2]==1) {
    $fila[2]="Activo";
  }else{
    $fila[2]='Inactivo';
  }
      }

      if ($ppp[3]=='Estado') {
        if ($fila[3]==1) {
    $fila[3]="Activo";
  }else{
    $fila[3]='Inactivo';
  }
      }

      if ($ppp[4]=='Estado') {
        if ($fila[4]==1) {
    $fila[4]="Activo";
  }else{
    $fila[4]='Inactivo';
  }
      }

      if ($ppp[5]=='Estado') {
        if ($fila[5]==1) {
    $fila[5]="Activo";
  }else{
    $fila[5]='Inactivo';
  }
      }

      if ($ppp[6]=='Estado') {
        if ($fila[6]==1) {
    $fila[6]="Activo";
  }else{
    $fila[6]='Inactivo';
  }
      }

      if ($ppp[7]=='Estado') {
        if ($fila[7]==1) {
    $fila[7]="Activo";
  }else{
    $fila[7]='Inactivo';
  }
      }

      if ($ppp[8]=='Estado') {
        if ($fila[8]==1) {
    $fila[8]="Activo";
  }else{
    $fila[8]='Inactivo';
  }
      }

      if ($ppp[9]=='Estado') {
        if ($fila[9]==1) {
    $fila[9]="Activo";
  }else{
    $fila[9]='Inactivo';
  }
      }

      if ($ppp[10]=='Estado') {
        if ($fila[10]==1) {
    $fila[10]="Activo";
  }else{
    $fila[10]='Inactivo';
  }
      }
     
if ($ppp[1]=='Fecha_Creacion') {
  $fila[1]=date('d/m/Y',strtotime($fila[1]));
}
if ($ppp[2]=='Fecha_Creacion') {
  $fila[2]=date('d/m/Y',strtotime($fila[2]));
}
if ($ppp[3]=='Fecha_Creacion') {
  $fila[3]=date('d/m/Y',strtotime($fila[3]));
}
if ($ppp[4]=='Fecha_Creacion') {
  $fila[4]=date('d/m/Y',strtotime($fila[4]));
}
if ($ppp[5]=='Fecha_Creacion') {
  $fila[5]=date('d/m/Y',strtotime($fila[5]));
}
if ($ppp[6]=='Fecha_Creacion') {
  $fila[6]=date('d/m/Y',strtotime($fila[6]));
}
if ($ppp[7]=='Fecha_Creacion') {
  $fila[7]=date('d/m/Y',strtotime($fila[7]));
}
if ($ppp[8]=='Fecha_Creacion') {
  $fila[8]=date('d/m/Y',strtotime($fila[8]));
}
if ($ppp[9]=='Fecha_Creacion') {
  $fila[9]=date('d/m/Y',strtotime($fila[9]));
}
if ($ppp[10]=='Fecha_Creacion') {
  $fila[10]=date('d/m/Y',strtotime($fila[10]));
}
if ($ppp[0]=='Fecha_Creacion') {
  $fila[0]=date('d/m/Y',strtotime($fila[0]));
}
///
if ($ppp[1]=='Fecha_Modificacion') {
  if ($fila[1]=='') {
    $fila[1]="Sin Modificar";
  }else{
    $fila[1]=date('d/m/Y',strtotime($fila[1]));
  }
  
}
if ($ppp[2]=='Fecha_Modificacion') {
  if ($fila[1]=='') {
    $fila[2]="Sin Modificar";
  }else{
    $fila[2]=date('d/m/Y',strtotime($fila[2]));
  }
}
if ($ppp[3]=='Fecha_Modificacion') {
 if ($fila[3]=='') {
    $fila[3]="Sin Modificar";
  }else{
    $fila[3]=date('d/m/Y',strtotime($fila[3]));
  }
}
if ($ppp[4]=='Fecha_Modificacion') {
  if ($fila[4]=='') {
    $fila[4]="Sin Modificar";
  }else{
    $fila[4]=date('d/m/Y',strtotime($fila[4]));
  }
}
if ($ppp[5]=='Fecha_Modificacion') {
  if ($fila[5]=='') {
    $fila[5]="Sin Modificar";
  }else{
    $fila[5]=date('d/m/Y',strtotime($fila[5]));
  }
}
if ($ppp[6]=='Fecha_Modificacion') {
  if ($fila[6]=='') {
    $fila[6]="Sin Modificar";
  }else{
    $fila[6]=date('d/m/Y',strtotime($fila[6]));
  }
}
if ($ppp[7]=='Fecha_Modificacion') {
  if ($fila[7]=='') {
    $fila[7]="Sin Modificar";
  }else{
    $fila[7]=date('d/m/Y',strtotime($fila[7]));
  }
}
if ($ppp[8]=='Fecha_Modificacion') {
  if ($fila[8]=='') {
    $fila[8]="Sin Modificar";
  }else{
    $fila[8]=date('d/m/Y',strtotime($fila[8]));
  }
}
if ($ppp[9]=='Fecha_Modificacion') {
   if ($fila[9]=='') {
    $fila[9]="Sin Modificar";
  }else{
    $fila[9]=date('d/m/Y',strtotime($fila[9]));
  }
}
if ($ppp[10]=='Fecha_Modificacion') {
   if ($fila[10]=='') {
    $fila[10]="Sin Modificar";
  }else{
    $fila[10]=date('d/m/Y',strtotime($fila[10]));
  }
}
if ($ppp[0]=='Fecha_Modificacion') {
   if ($fila[0]=='') {
    $fila[0]="Sin Modificar";
  }else{
    $fila[0]=date('d/m/Y',strtotime($fila[0]));
  }
}
///


//
if ($ppp[1]=='Tipo_Constancia') {
   if ($fila[1]=="1") {
              $fila[1]="Constancia de trabajo Sin deducciones";
            }
            if ($fila[1]=="2") {
              $fila[1]="Constancia de trabajo con deducciones normal";
            }
            if ($fila[1]=="3") {
              $fila[1]="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila[1]=="4") {
              $fila[1]="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila[1]=="5") {
              $fila[1]="Constancia para Bono de 13AVO";
            }
            if ($fila[1]=="6") {
              $fila[1]="Constancia para Bono de 14AVO";
            }
            if ($fila[1]=="7") {
              $fila[1]="Constancia para Bono de Vacaciones";
            }
            if ($fila[1]=="8") {
              $fila[1]="Constancia para Universidades";
            }
            if ($fila[1]=="9") {
              $fila[1]="Constancia para Embajadas/Consulados";
            }
            if ($fila[1]=="10") {
              $fila[1]="Constancia para T.S.C.";
            }
            if ($fila[1]=="11") {
              $fila[1]="Constancia de Cancelados";
            }
}
if ($ppp[2]=='Tipo_Constancia') {
   if ($fila[2]=="1") {
              $fila[2]="Constancia de trabajo Sin deducciones";
            }
            if ($fila[2]=="2") {
              $fila[2]="Constancia de trabajo con deducciones normal";
            }
            if ($fila[2]=="3") {
              $fila[2]="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila[2]=="4") {
              $fila[2]="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila[2]=="5") {
              $fila[2]="Constancia para Bono de 13AVO";
            }
            if ($fila[2]=="6") {
              $fila[2]="Constancia para Bono de 14AVO";
            }
            if ($fila[2]=="7") {
              $fila[2]="Constancia para Bono de Vacaciones";
            }
            if ($fila[2]=="8") {
              $fila[2]="Constancia para Universidades";
            }
            if ($fila[2]=="9") {
              $fila[2]="Constancia para Embajadas/Consulados";
            }
            if ($fila[2]=="10") {
              $fila[2]="Constancia para T.S.C.";
            }
            if ($fila[2]=="11") {
              $fila[2]="Constancia de Cancelados";
            }
}
if ($ppp[3]=='Tipo_Constancia') {
   if ($fila[3]=="1") {
              $fila[3]="Constancia de trabajo Sin deducciones";
            }
            if ($fila[3]=="2") {
              $fila[3]="Constancia de trabajo con deducciones normal";
            }
            if ($fila[3]=="3") {
              $fila[3]="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila[3]=="4") {
              $fila[3]="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila[3]=="5") {
              $fila[3]="Constancia para Bono de 13AVO";
            }
            if ($fila[3]=="6") {
              $fila[3]="Constancia para Bono de 14AVO";
            }
            if ($fila[3]=="7") {
              $fila[3]="Constancia para Bono de Vacaciones";
            }
            if ($fila[3]=="8") {
              $fila[3]="Constancia para Universidades";
            }
            if ($fila[3]=="9") {
              $fila[3]="Constancia para Embajadas/Consulados";
            }
            if ($fila[3]=="10") {
              $fila[3]="Constancia para T.S.C.";
            }
            if ($fila[3]=="11") {
              $fila[3]="Constancia de Cancelados";
            }
}
if ($ppp[4]=='Tipo_Constancia') {
  if ($fila[4]=="1") {
              $fila[4]="Constancia de trabajo Sin deducciones";
            }
            if ($fila[4]=="2") {
              $fila[4]="Constancia de trabajo con deducciones normal";
            }
            if ($fila[4]=="3") {
              $fila[4]="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila[4]=="4") {
              $fila[4]="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila[4]=="5") {
              $fila[4]="Constancia para Bono de 13AVO";
            }
            if ($fila[4]=="6") {
              $fila[4]="Constancia para Bono de 14AVO";
            }
            if ($fila[4]=="7") {
              $fila[4]="Constancia para Bono de Vacaciones";
            }
            if ($fila[4]=="8") {
              $fila[4]="Constancia para Universidades";
            }
            if ($fila[4]=="9") {
              $fila[4]="Constancia para Embajadas/Consulados";
            }
            if ($fila[4]=="10") {
              $fila[4]="Constancia para T.S.C.";
            }
            if ($fila[4]=="11") {
              $fila[4]="Constancia de Cancelados";
            }
}
if ($ppp[5]=='Tipo_Constancia') {
    if ($fila[5]=="1") {
              $fila[5]="Constancia de trabajo Sin deducciones";
            }
            if ($fila[5]=="2") {
              $fila[5]="Constancia de trabajo con deducciones normal";
            }
            if ($fila[5]=="3") {
              $fila[5]="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila[5]=="4") {
              $fila[5]="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila[5]=="5") {
              $fila[5]="Constancia para Bono de 13AVO";
            }
            if ($fila[5]=="6") {
              $fila[5]="Constancia para Bono de 14AVO";
            }
            if ($fila[5]=="7") {
              $fila[5]="Constancia para Bono de Vacaciones";
            }
            if ($fila[5]=="8") {
              $fila[5]="Constancia para Universidades";
            }
            if ($fila[5]=="9") {
              $fila[5]="Constancia para Embajadas/Consulados";
            }
            if ($fila[5]=="10") {
              $fila[5]="Constancia para T.S.C.";
            }
            if ($fila[5]=="11") {
              $fila[5]="Constancia de Cancelados";
            }
}
if ($ppp[6]=='Tipo_Constancia') {
    if ($fila[6]=="1") {
              $fila[6]="Constancia de trabajo Sin deducciones";
            }
            if ($fila[6]=="2") {
              $fila[6]="Constancia de trabajo con deducciones normal";
            }
            if ($fila[6]=="3") {
              $fila[6]="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila[6]=="4") {
              $fila[6]="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila[6]=="5") {
              $fila[6]="Constancia para Bono de 13AVO";
            }
            if ($fila[6]=="6") {
              $fila[6]="Constancia para Bono de 14AVO";
            }
            if ($fila[6]=="7") {
              $fila[6]="Constancia para Bono de Vacaciones";
            }
            if ($fila[6]=="8") {
              $fila[6]="Constancia para Universidades";
            }
            if ($fila[6]=="9") {
              $fila[6]="Constancia para Embajadas/Consulados";
            }
            if ($fila[6]=="10") {
              $fila[6]="Constancia para T.S.C.";
            }
            if ($fila[6]=="11") {
              $fila[6]="Constancia de Cancelados";
            }
}
if ($ppp[7]=='Tipo_Constancia') {
    if ($fila[7]=="1") {
              $fila[7]="Constancia de trabajo Sin deducciones";
            }
            if ($fila[7]=="2") {
              $fila[7]="Constancia de trabajo con deducciones normal";
            }
            if ($fila[7]=="3") {
              $fila[7]="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila[7]=="4") {
              $fila[7]="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila[7]=="5") {
              $fila[7]="Constancia para Bono de 13AVO";
            }
            if ($fila[7]=="6") {
              $fila[7]="Constancia para Bono de 14AVO";
            }
            if ($fila[7]=="7") {
              $fila[7]="Constancia para Bono de Vacaciones";
            }
            if ($fila[7]=="8") {
              $fila[7]="Constancia para Universidades";
            }
            if ($fila[7]=="9") {
              $fila[7]="Constancia para Embajadas/Consulados";
            }
            if ($fila[7]=="10") {
              $fila[7]="Constancia para T.S.C.";
            }
            if ($fila[7]=="11") {
              $fila[7]="Constancia de Cancelados";
            }

}
if ($ppp[8]=='Tipo_Constancia') {
    if ($fila[8]=="1") {
              $fila[8]="Constancia de trabajo Sin deducciones";
            }
            if ($fila[8]=="2") {
              $fila[8]="Constancia de trabajo con deducciones normal";
            }
            if ($fila[8]=="3") {
              $fila[8]="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila[8]=="4") {
              $fila[8]="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila[8]=="5") {
              $fila[8]="Constancia para Bono de 13AVO";
            }
            if ($fila[8]=="6") {
              $fila[8]="Constancia para Bono de 14AVO";
            }
            if ($fila[8]=="7") {
              $fila[8]="Constancia para Bono de Vacaciones";
            }
            if ($fila[8]=="8") {
              $fila[8]="Constancia para Universidades";
            }
            if ($fila[8]=="9") {
              $fila[8]="Constancia para Embajadas/Consulados";
            }
            if ($fila[8]=="10") {
              $fila[8]="Constancia para T.S.C.";
            }
            if ($fila[8]=="11") {
              $fila[8]="Constancia de Cancelados";
            }
}
if ($ppp[9]=='Tipo_Constancia') {
  if ($fila[9]=="1") {
              $fila[9]="Constancia de trabajo Sin deducciones";
            }
            if ($fila[9]=="2") {
              $fila[9]="Constancia de trabajo con deducciones normal";
            }
            if ($fila[9]=="3") {
              $fila[9]="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila[9]=="4") {
              $fila[9]="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila[9]=="5") {
              $fila[9]="Constancia para Bono de 13AVO";
            }
            if ($fila[9]=="6") {
              $fila[9]="Constancia para Bono de 14AVO";
            }
            if ($fila[9]=="7") {
              $fila[9]="Constancia para Bono de Vacaciones";
            }
            if ($fila[9]=="8") {
              $fila[9]="Constancia para Universidades";
            }
            if ($fila[9]=="9") {
              $fila[9]="Constancia para Embajadas/Consulados";
            }
            if ($fila[9]=="10") {
              $fila[9]="Constancia para T.S.C.";
            }
            if ($fila[9]=="11") {
              $fila[9]="Constancia de Cancelados";
            }
}
if ($ppp[10]=='Tipo_Constancia') {
  if ($fila[10]=="1") {
              $fila[10]="Constancia de trabajo Sin deducciones";
            }
            if ($fila[10]=="2") {
              $fila[10]="Constancia de trabajo con deducciones normal";
            }
            if ($fila[10]=="3") {
              $fila[10]="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila[10]=="4") {
              $fila[10]="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila[10]=="5") {
              $fila[10]="Constancia para Bono de 13AVO";
            }
            if ($fila[10]=="6") {
              $fila[10]="Constancia para Bono de 14AVO";
            }
            if ($fila[10]=="7") {
              $fila[10]="Constancia para Bono de Vacaciones";
            }
            if ($fila[10]=="8") {
              $fila[10]="Constancia para Universidades";
            }
            if ($fila[10]=="9") {
              $fila[10]="Constancia para Embajadas/Consulados";
            }
            if ($fila[10]=="10") {
              $fila[10]="Constancia para T.S.C.";
            }
            if ($fila[10]=="11") {
              $fila[10]="Constancia de Cancelados";
            }
}
if ($ppp[0]=='Tipo_Constancia') {
  if ($fila[0]=="1") {
              $fila[0]="Constancia de trabajo Sin deducciones";
            }
            if ($fila[0]=="2") {
              $fila[0]="Constancia de trabajo con deducciones normal";
            }
            if ($fila[0]=="3") {
              $fila[0]="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila[0]=="4") {
              $fila[0]="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila[0]=='5') {
              $fila[0]="Constancia para Bono de 13AVO";
            }
            if ($fila[0]=="6") {
              $fila[0]="Constancia para Bono de 14AVO";
            }
            if ($fila[0]=="7") {
              $fila[0]="Constancia para Bono de Vacaciones";
            }
            if ($fila[0]=="8") {
              $fila[0]="Constancia para Universidades";
            }
            if ($fila[0]=="9") {
              $fila[0]="Constancia para Embajadas/Consulados";
            }
            if ($fila[0]=="10") {
              $fila[0]="Constancia para T.S.C.";
            }
            if ($fila[0]=="11") {
              $fila[0]="Constancia de Cancelados";
            }
}


      echo '<tr>
        <td style="text-align: center">'.$fila[0].'</td>
        <td style="text-align: center">'.$fila[1].'</td>
        <td style="text-align: center">'.$fila[2].'</td>
        <td style="text-align: center">'.$fila[3].'</td>
        <td style="text-align: center">'.$fila[4].'</td>
        <td style="text-align: center">'.$fila[5].'</td>
        <td style="text-align: center">'.$fila[6].'</td>
        <td style="text-align: center">'.$fila[7].'</td>
        <td style="text-align: center">'.$fila[8].'</td>
        <td style="text-align: center">'.$fila[9].'</td>
        <td style="text-align: center">'.$fila[10].'</td>

      </tr>';
    
    }
    }else{
      $query=mssql_query("SELECT $nombre,$sueldo,$apellido,$fecha_mod,$codigo,$dirigida,$creacion,$estado,$modificacion,$obervacion,$entrega FROM CONSTANCIA_GENERADA WHERE Fecha_Creacion between '$fechaminima' and '$fechamaxima' AND Tipo_Constancia='$opcion'"); 
    while($fila=mssql_fetch_array($query)){
if ($ppp[1]=='Estado_Entrega') {
        if ($fila[1]==1) {
          $fila[1]='sin Cambios';
        }
        if ($fila[0]==1) {
          $fila[0]='sin Cambios';
        }
         if ($fila[2]==1) {
          $fila[2]='sin Cambios';
        }
        if ($fila[3]==1) {
          $fila[3]='sin Cambios';
        }
        if ($fila[4]==1) {
          $fila[4]='sin Cambios';
        }
        if ($fila[5]==1) {
          $fila[5]='sin Cambios';
        }
        if ($fila[6]==1) {
          $fila[6]='sin Cambios';
        }
        if ($fila[7]==1) {
          $fila[7]='sin Cambios';
        }
        if ($fila[8]==1) {
          $fila[8]='sin Cambios';
        }
        if ($fila[9]==1) {
          $fila[9]='sin Cambios';
        }
        if ($fila[10]==1) {
          $fila[10]='sin Cambios';
        }

      }
       if ($ppp[0]=='Estado_Entrega') {
        if ($fila[1]==1) {
          $fila[1]='sin Cambios';
        }
        if ($fila[0]==1) {
          $fila[0]='sin Cambios';
        }
         if ($fila[2]==1) {
          $fila[2]='sin Cambios';
        }
        if ($fila[3]==1) {
          $fila[3]='sin Cambios';
        }
        if ($fila[4]==1) {
          $fila[4]='sin Cambios';
        }
        if ($fila[5]==1) {
          $fila[5]='sin Cambios';
        }
        if ($fila[6]==1) {
          $fila[6]='sin Cambios';
        }
        if ($fila[7]==1) {
          $fila[7]='sin Cambios';
        }
        if ($fila[8]==1) {
          $fila[8]='sin Cambios';
        }
        if ($fila[9]==1) {
          $fila[9]='sin Cambios';
        }
        if ($fila[10]==1) {
          $fila[10]='sin Cambios';
        }

      }
       if ($ppp[2]=='Estado_Entrega') {
        if ($fila[1]==1) {
          $fila[1]='sin Cambios';
        }
        if ($fila[0]==1) {
          $fila[0]='sin Cambios';
        }
         if ($fila[2]==1) {
          $fila[2]='sin Cambios';
        }
        if ($fila[3]==1) {
          $fila[3]='sin Cambios';
        }
        if ($fila[4]==1) {
          $fila[4]='sin Cambios';
        }
        if ($fila[5]==1) {
          $fila[5]='sin Cambios';
        }
        if ($fila[6]==1) {
          $fila[6]='sin Cambios';
        }
        if ($fila[7]==1) {
          $fila[7]='sin Cambios';
        }
        if ($fila[8]==1) {
          $fila[8]='sin Cambios';
        }
        if ($fila[9]==1) {
          $fila[9]='sin Cambios';
        }
        if ($fila[10]==1) {
          $fila[10]='sin Cambios';
        }

      }
       if ($ppp[3]=='Estado_Entrega') {
        if ($fila[1]==1) {
          $fila[1]='sin Cambios';
        }
        if ($fila[0]==1) {
          $fila[0]='sin Cambios';
        }
         if ($fila[2]==1) {
          $fila[2]='sin Cambios';
        }
        if ($fila[3]==1) {
          $fila[3]='sin Cambios';
        }
        if ($fila[4]==1) {
          $fila[4]='sin Cambios';
        }
        if ($fila[5]==1) {
          $fila[5]='sin Cambios';
        }
        if ($fila[6]==1) {
          $fila[6]='sin Cambios';
        }
        if ($fila[7]==1) {
          $fila[7]='sin Cambios';
        }
        if ($fila[8]==1) {
          $fila[8]='sin Cambios';
        }
        if ($fila[9]==1) {
          $fila[9]='sin Cambios';
        }
        if ($fila[10]==1) {
          $fila[10]='sin Cambios';
        }

      }
       if ($ppp[4]=='Estado_Entrega') {
        if ($fila[1]==1) {
          $fila[1]='sin Cambios';
        }
        if ($fila[0]==1) {
          $fila[0]='sin Cambios';
        }
         if ($fila[2]==1) {
          $fila[2]='sin Cambios';
        }
        if ($fila[3]==1) {
          $fila[3]='sin Cambios';
        }
        if ($fila[4]==1) {
          $fila[4]='sin Cambios';
        }
        if ($fila[5]==1) {
          $fila[5]='sin Cambios';
        }
        if ($fila[6]==1) {
          $fila[6]='sin Cambios';
        }
        if ($fila[7]==1) {
          $fila[7]='sin Cambios';
        }
        if ($fila[8]==1) {
          $fila[8]='sin Cambios';
        }
        if ($fila[9]==1) {
          $fila[9]='sin Cambios';
        }
        if ($fila[10]==1) {
          $fila[10]='sin Cambios';
        }

      }
       if ($ppp[5]=='Estado_Entrega') {
        if ($fila[1]==1) {
          $fila[1]='sin Cambios';
        }
        if ($fila[0]==1) {
          $fila[0]='sin Cambios';
        }
         if ($fila[2]==1) {
          $fila[2]='sin Cambios';
        }
        if ($fila[3]==1) {
          $fila[3]='sin Cambios';
        }
        if ($fila[4]==1) {
          $fila[4]='sin Cambios';
        }
        if ($fila[5]==1) {
          $fila[5]='sin Cambios';
        }
        if ($fila[6]==1) {
          $fila[6]='sin Cambios';
        }
        if ($fila[7]==1) {
          $fila[7]='sin Cambios';
        }
        if ($fila[8]==1) {
          $fila[8]='sin Cambios';
        }
        if ($fila[9]==1) {
          $fila[9]='sin Cambios';
        }
        if ($fila[10]==1) {
          $fila[10]='sin Cambios';
        }

      }
       if ($ppp[6]=='Estado_Entrega') {
        if ($fila[1]==1) {
          $fila[1]='sin Cambios';
        }
        if ($fila[0]==1) {
          $fila[0]='sin Cambios';
        }
         if ($fila[2]==1) {
          $fila[2]='sin Cambios';
        }
        if ($fila[3]==1) {
          $fila[3]='sin Cambios';
        }
        if ($fila[4]==1) {
          $fila[4]='sin Cambios';
        }
        if ($fila[5]==1) {
          $fila[5]='sin Cambios';
        }
        if ($fila[6]==1) {
          $fila[6]='sin Cambios';
        }
        if ($fila[7]==1) {
          $fila[7]='sin Cambios';
        }
        if ($fila[8]==1) {
          $fila[8]='sin Cambios';
        }
        if ($fila[9]==1) {
          $fila[9]='sin Cambios';
        }
        if ($fila[10]==1) {
          $fila[10]='sin Cambios';
        }

      }
       if ($ppp[7]=='Estado_Entrega') {
        if ($fila[1]==1) {
          $fila[1]='sin Cambios';
        }
        if ($fila[0]==1) {
          $fila[0]='sin Cambios';
        }
         if ($fila[2]==1) {
          $fila[2]='sin Cambios';
        }
        if ($fila[3]==1) {
          $fila[3]='sin Cambios';
        }
        if ($fila[4]==1) {
          $fila[4]='sin Cambios';
        }
        if ($fila[5]==1) {
          $fila[5]='sin Cambios';
        }
        if ($fila[6]==1) {
          $fila[6]='sin Cambios';
        }
        if ($fila[7]==1) {
          $fila[7]='sin Cambios';
        }
        if ($fila[8]==1) {
          $fila[8]='sin Cambios';
        }
        if ($fila[9]==1) {
          $fila[9]='sin Cambios';
        }
        if ($fila[10]==1) {
          $fila[10]='sin Cambios';
        }

      }
       if ($ppp[8]=='Estado_Entrega') {
        if ($fila[1]==1) {
          $fila[1]='sin Cambios';
        }
        if ($fila[0]==1) {
          $fila[0]='sin Cambios';
        }
         if ($fila[2]==1) {
          $fila[2]='sin Cambios';
        }
        if ($fila[3]==1) {
          $fila[3]='sin Cambios';
        }
        if ($fila[4]==1) {
          $fila[4]='sin Cambios';
        }
        if ($fila[5]==1) {
          $fila[5]='sin Cambios';
        }
        if ($fila[6]==1) {
          $fila[6]='sin Cambios';
        }
        if ($fila[7]==1) {
          $fila[7]='sin Cambios';
        }
        if ($fila[8]==1) {
          $fila[8]='sin Cambios';
        }
        if ($fila[9]==1) {
          $fila[9]='sin Cambios';
        }
        if ($fila[10]==1) {
          $fila[10]='sin Cambios';
        }
      }

      
       if ($ppp[9]=='Estado_Entrega') {
        if ($fila[1]==1) {
          $fila[1]='sin Cambios';
        }
        if ($fila[0]==1) {
          $fila[0]='sin Cambios';
        }
         if ($fila[2]==1) {
          $fila[2]='sin Cambios';
        }
        if ($fila[3]==1) {
          $fila[3]='sin Cambios';
        }
        if ($fila[4]==1) {
          $fila[4]='sin Cambios';
        }
        if ($fila[5]==1) {
          $fila[5]='sin Cambios';
        }
        if ($fila[6]==1) {
          $fila[6]='sin Cambios';
        }
        if ($fila[7]==1) {
          $fila[7]='sin Cambios';
        }
        if ($fila[8]==1) {
          $fila[8]='sin Cambios';
        }
        if ($fila[9]==1) {
          $fila[9]='sin Cambios';
        }
        if ($fila[10]==1) {
          $fila[10]='sin Cambios';
        }

      }
       if ($ppp[10]=='Estado_Entrega') {
        if ($fila[1]==1) {
          $fila[1]='sin Cambios';
        }
        if ($fila[0]==1) {
          $fila[0]='sin Cambios';
        }
         if ($fila[2]==1) {
          $fila[2]='sin Cambios';
        }
        if ($fila[3]==1) {
          $fila[3]='sin Cambios';
        }
        if ($fila[4]==1) {
          $fila[4]='sin Cambios';
        }
        if ($fila[5]==1) {
          $fila[5]='sin Cambios';
        }
        if ($fila[6]==1) {
          $fila[6]='sin Cambios';
        }
        if ($fila[7]==1) {
          $fila[7]='sin Cambios';
        }
        if ($fila[8]==1) {
          $fila[8]='sin Cambios';
        }
        if ($fila[9]==1) {
          $fila[9]='sin Cambios';
        }
        if ($fila[10]==1) {
          $fila[10]='sin Cambios';
        }

      }
if ($ppp[1]=='Fecha_Creacion') {
  $fila[1]=date('d/m/Y',strtotime($fila[1]));
}
if ($ppp[2]=='Fecha_Creacion') {
  $fila[2]=date('d/m/Y',strtotime($fila[2]));
}
if ($ppp[3]=='Fecha_Creacion') {
  $fila[3]=date('d/m/Y',strtotime($fila[3]));
}
if ($ppp[4]=='Fecha_Creacion') {
  $fila[4]=date('d/m/Y',strtotime($fila[4]));
}
if ($ppp[5]=='Fecha_Creacion') {
  $fila[5]=date('d/m/Y',strtotime($fila[5]));
}
if ($ppp[6]=='Fecha_Creacion') {
  $fila[6]=date('d/m/Y',strtotime($fila[6]));
}
if ($ppp[7]=='Fecha_Creacion') {
  $fila[7]=date('d/m/Y',strtotime($fila[7]));
}
if ($ppp[8]=='Fecha_Creacion') {
  $fila[8]=date('d/m/Y',strtotime($fila[8]));
}
if ($ppp[9]=='Fecha_Creacion') {
  $fila[9]=date('d/m/Y',strtotime($fila[9]));
}
if ($ppp[10]=='Fecha_Creacion') {
  $fila[10]=date('d/m/Y',strtotime($fila[10]));
}
if ($ppp[0]=='Fecha_Creacion') {
  $fila[0]=date('d/m/Y',strtotime($fila[0]));
}
///
if ($ppp[1]=='Fecha_Modificacion') {
  $fila[1]=date('d/m/Y',strtotime($fila[1]));
}
if ($ppp[2]=='Fecha_Modificacion') {
  $fila[2]=date('d/m/Y',strtotime($fila[2]));
}
if ($ppp[3]=='Fecha_Modificacion') {
  $fila[3]=date('d/m/Y',strtotime($fila[3]));
}
if ($ppp[4]=='Fecha_Modificacion') {
  $fila[4]=date('d/m/Y',strtotime($fila[4]));
}
if ($ppp[5]=='Fecha_Modificacion') {
  $fila[5]=date('d/m/Y',strtotime($fila[5]));
}
if ($ppp[6]=='Fecha_Modificacion') {
  $fila[6]=date('d/m/Y',strtotime($fila[6]));
}
if ($ppp[7]=='Fecha_Modificacion') {
  $fila[7]=date('d/m/Y',strtotime($fila[7]));
}
if ($ppp[8]=='Fecha_Modificacion') {
  $fila[8]=date('d/m/Y',strtotime($fila[8]));
}
if ($ppp[9]=='Fecha_Modificacion') {
  $fila[9]=date('d/m/Y',strtotime($fila[9]));
}
if ($ppp[10]=='Fecha_Modificacion') {
  $fila[10]=date('d/m/Y',strtotime($fila[10]));
}
if ($ppp[0]=='Fecha_Modificacion') {
  $fila[0]=date('d/m/Y',strtotime($fila[0]));
}
//
if ($ppp[1]=='Tipo_Constancia') {
   if ($fila[1]=="1") {
              $fila[1]="Constancia de trabajo Sin deducciones";
            }
            if ($fila[1]=="2") {
              $fila[1]="Constancia de trabajo con deducciones normal";
            }
            if ($fila[1]=="3") {
              $fila[1]="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila[1]=="4") {
              $fila[1]="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila[1]=="5") {
              $fila[1]="Constancia para Bono de 13AVO";
            }
            if ($fila[1]=="6") {
              $fila[1]="Constancia para Bono de 14AVO";
            }
            if ($fila[1]=="7") {
              $fila[1]="Constancia para Bono de Vacaciones";
            }
            if ($fila[1]=="8") {
              $fila[1]="Constancia para Universidades";
            }
            if ($fila[1]=="9") {
              $fila[1]="Constancia para Embajadas/Consulados";
            }
            if ($fila[1]=="10") {
              $fila[1]="Constancia para T.S.C.";
            }
            if ($fila[1]=="11") {
              $fila[1]="Constancia de Cancelados";
            }
}
if ($ppp[2]=='Tipo_Constancia') {
   if ($fila[2]=="1") {
              $fila[2]="Constancia de trabajo Sin deducciones";
            }
            if ($fila[2]=="2") {
              $fila[2]="Constancia de trabajo con deducciones normal";
            }
            if ($fila[2]=="3") {
              $fila[2]="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila[2]=="4") {
              $fila[2]="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila[2]=="5") {
              $fila[2]="Constancia para Bono de 13AVO";
            }
            if ($fila[2]=="6") {
              $fila[2]="Constancia para Bono de 14AVO";
            }
            if ($fila[2]=="7") {
              $fila[2]="Constancia para Bono de Vacaciones";
            }
            if ($fila[2]=="8") {
              $fila[2]="Constancia para Universidades";
            }
            if ($fila[2]=="9") {
              $fila[2]="Constancia para Embajadas/Consulados";
            }
            if ($fila[2]=="10") {
              $fila[2]="Constancia para T.S.C.";
            }
            if ($fila[2]=="11") {
              $fila[2]="Constancia de Cancelados";
            }
}
if ($ppp[3]=='Tipo_Constancia') {
   if ($fila[3]=="1") {
              $fila[3]="Constancia de trabajo Sin deducciones";
            }
            if ($fila[3]=="2") {
              $fila[3]="Constancia de trabajo con deducciones normal";
            }
            if ($fila[3]=="3") {
              $fila[3]="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila[3]=="4") {
              $fila[3]="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila[3]=="5") {
              $fila[3]="Constancia para Bono de 13AVO";
            }
            if ($fila[3]=="6") {
              $fila[3]="Constancia para Bono de 14AVO";
            }
            if ($fila[3]=="7") {
              $fila[3]="Constancia para Bono de Vacaciones";
            }
            if ($fila[3]=="8") {
              $fila[3]="Constancia para Universidades";
            }
            if ($fila[3]=="9") {
              $fila[3]="Constancia para Embajadas/Consulados";
            }
            if ($fila[3]=="10") {
              $fila[3]="Constancia para T.S.C.";
            }
            if ($fila[3]=="11") {
              $fila[3]="Constancia de Cancelados";
            }
}
if ($ppp[4]=='Tipo_Constancia') {
  if ($fila[4]=="1") {
              $fila[4]="Constancia de trabajo Sin deducciones";
            }
            if ($fila[4]=="2") {
              $fila[4]="Constancia de trabajo con deducciones normal";
            }
            if ($fila[4]=="3") {
              $fila[4]="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila[4]=="4") {
              $fila[4]="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila[4]=="5") {
              $fila[4]="Constancia para Bono de 13AVO";
            }
            if ($fila[4]=="6") {
              $fila[4]="Constancia para Bono de 14AVO";
            }
            if ($fila[4]=="7") {
              $fila[4]="Constancia para Bono de Vacaciones";
            }
            if ($fila[4]=="8") {
              $fila[4]="Constancia para Universidades";
            }
            if ($fila[4]=="9") {
              $fila[4]="Constancia para Embajadas/Consulados";
            }
            if ($fila[4]=="10") {
              $fila[4]="Constancia para T.S.C.";
            }
            if ($fila[4]=="11") {
              $fila[4]="Constancia de Cancelados";
            }
}
if ($ppp[5]=='Tipo_Constancia') {
    if ($fila[5]=="1") {
              $fila[5]="Constancia de trabajo Sin deducciones";
            }
            if ($fila[5]=="2") {
              $fila[5]="Constancia de trabajo con deducciones normal";
            }
            if ($fila[5]=="3") {
              $fila[5]="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila[5]=="4") {
              $fila[5]="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila[5]=="5") {
              $fila[5]="Constancia para Bono de 13AVO";
            }
            if ($fila[5]=="6") {
              $fila[5]="Constancia para Bono de 14AVO";
            }
            if ($fila[5]=="7") {
              $fila[5]="Constancia para Bono de Vacaciones";
            }
            if ($fila[5]=="8") {
              $fila[5]="Constancia para Universidades";
            }
            if ($fila[5]=="9") {
              $fila[5]="Constancia para Embajadas/Consulados";
            }
            if ($fila[5]=="10") {
              $fila[5]="Constancia para T.S.C.";
            }
            if ($fila[5]=="11") {
              $fila[5]="Constancia de Cancelados";
            }
}
if ($ppp[6]=='Tipo_Constancia') {
    if ($fila[6]=="1") {
              $fila[6]="Constancia de trabajo Sin deducciones";
            }
            if ($fila[6]=="2") {
              $fila[6]="Constancia de trabajo con deducciones normal";
            }
            if ($fila[6]=="3") {
              $fila[6]="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila[6]=="4") {
              $fila[6]="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila[6]=="5") {
              $fila[6]="Constancia para Bono de 13AVO";
            }
            if ($fila[6]=="6") {
              $fila[6]="Constancia para Bono de 14AVO";
            }
            if ($fila[6]=="7") {
              $fila[6]="Constancia para Bono de Vacaciones";
            }
            if ($fila[6]=="8") {
              $fila[6]="Constancia para Universidades";
            }
            if ($fila[6]=="9") {
              $fila[6]="Constancia para Embajadas/Consulados";
            }
            if ($fila[6]=="10") {
              $fila[6]="Constancia para T.S.C.";
            }
            if ($fila[6]=="11") {
              $fila[6]="Constancia de Cancelados";
            }
}
if ($ppp[7]=='Tipo_Constancia') {
    if ($fila[7]=="1") {
              $fila[7]="Constancia de trabajo Sin deducciones";
            }
            if ($fila[7]=="2") {
              $fila[7]="Constancia de trabajo con deducciones normal";
            }
            if ($fila[7]=="3") {
              $fila[7]="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila[7]=="4") {
              $fila[7]="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila[7]=="5") {
              $fila[7]="Constancia para Bono de 13AVO";
            }
            if ($fila[7]=="6") {
              $fila[7]="Constancia para Bono de 14AVO";
            }
            if ($fila[7]=="7") {
              $fila[7]="Constancia para Bono de Vacaciones";
            }
            if ($fila[7]=="8") {
              $fila[7]="Constancia para Universidades";
            }
            if ($fila[7]=="9") {
              $fila[7]="Constancia para Embajadas/Consulados";
            }
            if ($fila[7]=="10") {
              $fila[7]="Constancia para T.S.C.";
            }
            if ($fila[7]=="11") {
              $fila[7]="Constancia de Cancelados";
            }

}
if ($ppp[8]=='Tipo_Constancia') {
    if ($fila[8]=="1") {
              $fila[8]="Constancia de trabajo Sin deducciones";
            }
            if ($fila[8]=="2") {
              $fila[8]="Constancia de trabajo con deducciones normal";
            }
            if ($fila[8]=="3") {
              $fila[8]="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila[8]=="4") {
              $fila[8]="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila[8]=="5") {
              $fila[8]="Constancia para Bono de 13AVO";
            }
            if ($fila[8]=="6") {
              $fila[8]="Constancia para Bono de 14AVO";
            }
            if ($fila[8]=="7") {
              $fila[8]="Constancia para Bono de Vacaciones";
            }
            if ($fila[8]=="8") {
              $fila[8]="Constancia para Universidades";
            }
            if ($fila[8]=="9") {
              $fila[8]="Constancia para Embajadas/Consulados";
            }
            if ($fila[8]=="10") {
              $fila[8]="Constancia para T.S.C.";
            }
            if ($fila[8]=="11") {
              $fila[8]="Constancia de Cancelados";
            }
}
if ($ppp[9]=='Tipo_Constancia') {
  if ($fila[9]=="1") {
              $fila[9]="Constancia de trabajo Sin deducciones";
            }
            if ($fila[9]=="2") {
              $fila[9]="Constancia de trabajo con deducciones normal";
            }
            if ($fila[9]=="3") {
              $fila[9]="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila[9]=="4") {
              $fila[9]="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila[9]=="5") {
              $fila[9]="Constancia para Bono de 13AVO";
            }
            if ($fila[9]=="6") {
              $fila[9]="Constancia para Bono de 14AVO";
            }
            if ($fila[9]=="7") {
              $fila[9]="Constancia para Bono de Vacaciones";
            }
            if ($fila[9]=="8") {
              $fila[9]="Constancia para Universidades";
            }
            if ($fila[9]=="9") {
              $fila[9]="Constancia para Embajadas/Consulados";
            }
            if ($fila[9]=="10") {
              $fila[9]="Constancia para T.S.C.";
            }
            if ($fila[9]=="11") {
              $fila[9]="Constancia de Cancelados";
            }
}
if ($ppp[10]=='Tipo_Constancia') {
  if ($fila[10]=="1") {
              $fila[10]="Constancia de trabajo Sin deducciones";
            }
            if ($fila[10]=="2") {
              $fila[10]="Constancia de trabajo con deducciones normal";
            }
            if ($fila[10]=="3") {
              $fila[10]="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila[10]=="4") {
              $fila[10]="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila[10]=="5") {
              $fila[10]="Constancia para Bono de 13AVO";
            }
            if ($fila[10]=="6") {
              $fila[10]="Constancia para Bono de 14AVO";
            }
            if ($fila[10]=="7") {
              $fila[10]="Constancia para Bono de Vacaciones";
            }
            if ($fila[10]=="8") {
              $fila[10]="Constancia para Universidades";
            }
            if ($fila[10]=="9") {
              $fila[10]="Constancia para Embajadas/Consulados";
            }
            if ($fila[10]=="10") {
              $fila[10]="Constancia para T.S.C.";
            }
            if ($fila[10]=="11") {
              $fila[10]="Constancia de Cancelados";
            }
}
if ($ppp[0]=='Tipo_Constancia') {
  if ($fila[0]=="1") {
              $fila[0]="Constancia de trabajo Sin deducciones";
            }
            if ($fila[0]=="2") {
              $fila[0]="Constancia de trabajo con deducciones normal";
            }
            if ($fila[0]=="3") {
              $fila[0]="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila[0]=="4") {
              $fila[0]="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila[0]=='5') {
              $fila[0]="Constancia para Bono de 13AVO";
            }
            if ($fila[0]=="6") {
              $fila[0]="Constancia para Bono de 14AVO";
            }
            if ($fila[0]=="7") {
              $fila[0]="Constancia para Bono de Vacaciones";
            }
            if ($fila[0]=="8") {
              $fila[0]="Constancia para Universidades";
            }
            if ($fila[0]=="9") {
              $fila[0]="Constancia para Embajadas/Consulados";
            }
            if ($fila[0]=="10") {
              $fila[0]="Constancia para T.S.C.";
            }
            if ($fila[0]=="11") {
              $fila[0]="Constancia de Cancelados";
            }
}
      echo '<tr>
        <td style="text-align: center">'.$fila[0].'</td>
        <td style="text-align: center">'.$fila[1].'</td>
        <td style="text-align: center">'.$fila[2].'</td>
        <td style="text-align: center">'.$fila[3].'</td>
        <td style="text-align: center">'.$fila[4].'</td>
        <td style="text-align: center">'.$fila[5].'</td>
        <td style="text-align: center">'.$fila[6].'</td>
        <td style="text-align: center">'.$fila[7].'</td>
        <td style="text-align: center">'.$fila[8].'</td>
        <td style="text-align: center">'.$fila[9].'</td>
        <td style="text-align: center">'.$fila[10].'</td>

      </tr>';
    
    }
    }
    
    

    
     ?>
        
      
      

      
     </table>