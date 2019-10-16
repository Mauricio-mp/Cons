<?php 

header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=Reporte1.xls');

	include('../crearConexionGECOMP.php');
	//$query=mssql_query("SELECT * FROM CONSTANCIA_GENERADA");


$opcion=$_GET['x'];
$fechaminima=$_GET['fecha1'];
$fechamaxima=$_GET['fecha2'];




 ?>

  <table id="myexample" class="display nowrap dataTable dtr-inline" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
      <thead class="bg-gray">
        <tr role="row">
            <th style="text-align: center">Tipo de Constancia</th>
            <th style="text-align: center">Codigo de Empleado</th>
            <th style="text-align: center">Estado de Entrega</th>
            <th style="text-align: center">Codigo Generado</th>
            <th style="text-align: center">Sueldo</th>
            <th style="text-align: center">Estado</th>
            <th style="text-align: center">Dirigida a:</th>
            <th style="text-align: center">Observacion</th>
            <th style="text-align: center">Fecha de Creacion</th>
            <th style="text-align: center">Usuario de Creacion</th>
            <th style="text-align: center">Fecha de Modificacion</th>
            <th style="text-align: center">Usuario de Modificacion</th>
            <th style="text-align: center">Usuario de Entrega</th>
            <th style="text-align: center">Fecha de Entrega</th>
            <th style="text-align: center">Comentario de entrega</th>
            

            
         </tr>
      </thead>
      
      <tbody>
 
          <?php 
  


          
          $consultar=mssql_query("SELECT * FROM CONSTANCIA_GENERADA WHERE Fecha_Creacion between ' $fechaminima' and '$fechamaxima' AND Tipo_Constancia='$opcion'");
          while ($fila=mssql_fetch_array($consultar)) {
            $fila['Tipo_Constancia'];
            if ($fila['Tipo_Constancia']=="1") {
              $fila['Tipo_Constancia']="Constancia de trabajo Sin deducciones";
            }
            if ($fila['Tipo_Constancia']=="2") {
              $fila['Tipo_Constancia']="Constancia de trabajo con deducciones normal";
            }
            if ($fila['Tipo_Constancia']=="3") {
              $fila['Tipo_Constancia']="Constancia de Trabajo con Deducciones con Plus";
            }
            if ($fila['Tipo_Constancia']=="4") {
              $fila['Tipo_Constancia']="Constancia de Trabajo con Deducciones sin Plus";
            }
            if ($fila['Tipo_Constancia']=="5") {
              $fila['Tipo_Constancia']="Constancia para Bono de 13AVO";
            }
            if ($fila['Tipo_Constancia']=="6") {
              $fila['Tipo_Constancia']="Constancia para Bono de 14AVO";
            }
            if ($fila['Tipo_Constancia']=="7") {
              $fila['Tipo_Constancia']="Constancia para Bono de Vacaciones";
            }
            if ($fila['Tipo_Constancia']=="8") {
              $fila['Tipo_Constancia']="Constancia para Universidades";
            }
            if ($fila['Tipo_Constancia']=="9") {
              $fila['Tipo_Constancia']="Constancia para Embajadas/Consulados";
            }
            if ($fila['Tipo_Constancia']=="10") {
              $fila['Tipo_Constancia']="Constancia para T.S.C.";
            }
            if ($fila['Tipo_Constancia']=="11") {
              $fila['Tipo_Constancia']="Constancia de Cancelados";
            }

            if (empty($fila['Fecha_Modificacion'])) {
              $fila['Fecha_Modificacion']="No hay Modificaciones";
            }

            if (empty($fila['Usuario_Modifcacion'])) {
              $fila['Usuario_Modifcacion']="No hay Modificaciones";
            }

            if (empty($fila['Observacion'])) {
              $fila['Observacion']="No hay Observaciones";
            }

            if ($fila['Estado']=="1") {
              $fila['Estado']="ACTIVO";
              $Color="rgba(245, 252, 251,0.8)";


            }
            if ($fila['Estado']=="0") {
              $fila['Estado']="INACTIVO";
              $Color="rgba(243, 105, 61,0.8)";
              
            }

            $fecha=date("Y/m/d", strtotime($fila['Fecha_Creacion']));

            if ($fila['Estado_Entrega']==1) {
              $fila['Estado_Entrega']="Pendiente";
            }else{
              $fila['Estado_Entrega']="Entregado";
            }

            if ( $fila['Fecha_Entrega']=='') {
              $fila['Fecha_Entrega']="No hay fecha de entrega";
            }else{
              $fila['Fecha_Entrega']=date('d/m/Y', strtotime($fila['Fecha_Entrega']));
            }

            if ( $fila['Usuario_Entrega']=='') {
              $fila['Usuario_Entrega']="No hay Usuario de entrega";
            }
            if ( $fila['Comentario_Entrega']=='') {
              $fila['Comentario_Entrega']="Sin comentario de entrega";
            }

             $bono=$fila['Id_Constancia_Dirigida'];

            $optenerNombre=mssql_query("SELECT NOMBRE_COOPERATIVA FROM COOPERATIVAS WHERE Id_Cooperativa='$bono'");
            if ($Datos=mssql_fetch_array($optenerNombre)) {
              $fila['Id_Constancia_Dirigida']=$Datos['NOMBRE_COOPERATIVA'];
            }
            if ($fila['Id_Constancia_Dirigida']=='') {
               $fila['Id_Constancia_Dirigida']="Constancia sin dirigir ";
            }
            
  
           ?>
           <tr>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Tipo_Constancia'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Codigo_Empleado'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Estado_Entrega'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['cPeriodo'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['sueldo'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Estado'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Id_Constancia_Dirigida'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo utf8_encode($fila['Observacion']);?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fecha;?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Usuario_Creacion'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Fecha_Modificacion'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Usuario_Modifcacion'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Usuario_Entrega'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Fecha_Entrega'];?></td>
             <td style="text-align: center; background-color:<?php echo $Color?>"><?php echo $fila['Comentario_Entrega'];?></td>

             

           </tr>

           <?php 
         }
       
           ?>
     </tbody>
   </table>