<?php 

header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=usuarios.xls');

	include('../crearConexionGECOMP.php');
  include('ConversionFecha.php');
	//$query=mssql_query("SELECT * FROM CONSTANCIA_GENERADA");



$fechaminima=$_GET['fecha1'];
$fechaMaxima=$_GET['fecha2'];

  $dia1 = date("d", strtotime($fechaminima));
      $mes1 = date("m", strtotime($fechaminima));
      $year1 = date("Y", strtotime($fechaminima));


      $dia2 = date("d", strtotime($fechaMaxima));
      $mes2 = date("m", strtotime($fechaMaxima));
      $year2 = date("Y", strtotime($fechaMaxima));

      $fecha1=fecha($dia1,$mes1,$year1);
      $fecha2=fecha($dia2,$mes2,$year2);
      echo "<h3>"."Resultados desde el ".$fecha1." hasta el ".$fecha2."</h3>";
      
      //constsncias de Trabajo sin deducciones
        $consultarConstancia1=mssql_query("SELECT count(*) AS cons1 FROM CONSTANCIA_GENERADA   WHERE Tipo_Constancia=1 AND Fecha_Creacion between ' $fechaminima' and '$fechaMaxima'");

      $optenerCons1 = mssql_fetch_array($consultarConstancia1);
      $cons1 = $optenerCons1['cons1'];
     // echo "Constancia de trabajo Sin deducciones:"." ".$cons1;

       //constsncias de Trabajo sin deducciones
        $consultarConstancia2=mssql_query("SELECT count(*) AS cons2 FROM CONSTANCIA_GENERADA   WHERE Tipo_Constancia=2 AND Fecha_Creacion between ' $fechaminima' and '$fechaMaxima'");
      $optenerCons2 = mssql_fetch_array($consultarConstancia2);
      $cons2 = $optenerCons2['cons2'];
      //echo "Constancia de trabajo Con deducciones Normal:"." ".$cons2;

       //constsncias de Trabajo sin deducciones
        $consultarConstancia7=mssql_query("SELECT count(*) AS cons7 FROM CONSTANCIA_GENERADA   WHERE Tipo_Constancia=7 AND Fecha_Creacion between ' $fechaminima' and '$fechaMaxima'");
      $optenerCons7 = mssql_fetch_array($consultarConstancia7);
      $cons7 = $optenerCons7['cons7'];
     // echo "Constancia para Bono de Vacaciones:"." ".$cons7;

       //constsncias de Trabajo sin deducciones
        $consultarConstancia9=mssql_query("SELECT count(*) AS cons9 FROM CONSTANCIA_GENERADA   WHERE Tipo_Constancia=9 AND Fecha_Creacion between ' $fechaminima' and '$fechaMaxima'");
      $optenerCons9 = mssql_fetch_array($consultarConstancia9);
      $cons9 = $optenerCons9['cons9'];
      //echo "Constancia para Embajadas/Consulados:"." ".$cons9;

       //constsncias de Trabajo sin deducciones


     
      $suma= $cons1+$cons2+$cons7+$cons9;
      $cons = $suma;


 ?>

 
      <table style="width: 100%" class="table table-striped">
        <thead class="thead-dark">
        <tr role="row">
            <th style="text-align: center">DETALLE DE CONSTANCIAS</th>


         </tr>
      </thead>
       <tbody>
         <tr>


            <td>Constancia de trabajo Sin deducciones</td>
            <td><?php echo $cons1;?></td>


           </tr>
            <tr>



             <td >Constancia de trabajo Con deducciones Normal</td>
             <td><?php echo $cons2;?></td>


           </tr>
            <tr>



             <td >Constancia para Bono de Vacaciones</td>
             <td><?php echo $cons7;?></td>


           </tr>
            <tr>



             <td >Constancia para Embajadas/Consulados</td>
             <td><?php echo $cons9;?></td>

           </tr>
            <tr>



             <td>Total Constancias</td>
             <td><?php echo $cons;?></td>

           </tr>
       </tbody>

      </table>

