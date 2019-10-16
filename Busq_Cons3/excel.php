<?php 

header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=Reporte3.xls');

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

       $consultarConstancia9=mssql_query("SELECT count(*) AS cons10 FROM CONSTANCIA_GENERADA   WHERE Tipo_Constancia=5 AND Fecha_Creacion between ' $fechaminima' and '$fechaMaxima'");
      $optenerCons9 = mssql_fetch_array($consultarConstancia9);
      $cons10 = $optenerCons9['cons10'];

      //Constancia Para 13: cons10

        $consultarConstancia9=mssql_query("SELECT count(*) AS cons11 FROM CONSTANCIA_GENERADA   WHERE Tipo_Constancia=6 AND Fecha_Creacion between ' $fechaminima' and '$fechaMaxima'");
      $optenerCons9 = mssql_fetch_array($consultarConstancia9);
      $cons11 = $optenerCons9['cons11'];

       //Constancia Para 14: cons11

        $consultarConstancia9=mssql_query("SELECT count(*) AS cons12 FROM CONSTANCIA_GENERADA   WHERE Tipo_Constancia=8 AND Fecha_Creacion between ' $fechaminima' and '$fechaMaxima'");
      $optenerCons9 = mssql_fetch_array($consultarConstancia9);
      $cons12 = $optenerCons9['cons12'];

      //Constancia Para Universidades: cons12

        $consultarConstancia9=mssql_query("SELECT count(*) AS cons13 FROM CONSTANCIA_GENERADA   WHERE Tipo_Constancia=10 AND Fecha_Creacion between ' $fechaminima' and '$fechaMaxima'");
      $optenerCons9 = mssql_fetch_array($consultarConstancia9);
      $cons13 = $optenerCons9['cons13'];
      //Constancia Para TSC: cons13

        $consultarConstancia9=mssql_query("SELECT count(*) AS cons14 FROM CONSTANCIA_GENERADA   WHERE Tipo_Constancia=11 AND Fecha_Creacion between ' $fechaminima' and '$fechaMaxima'");
      $optenerCons9 = mssql_fetch_array($consultarConstancia9);
      $cons14 = $optenerCons9['cons14'];

      //Constancia Para Cancelados: cons14

      //z




       //constsncias de Trabajo sin deducciones


     
      $suma= $cons1+$cons2+$cons7+$cons9+$cons10+$cons11+$cons12+$cons13+$cons14;
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
             <td >Constancia de 13AVO</td>
             <td><?php echo $cons10;?></td>
           </tr>
           <tr>
             <td >Constancia de 14AVO</td>
             <td><?php echo $cons11;?></td>

           </tr>
             <tr>

             <td >Constancia de Universidades</td>
             <td><?php echo $cons12;?></td>
           </tr>
            <tr>

             <td >Constancia del Tribunal Superior de Cuentas</td>
             <td><?php echo $cons13;?></td>
           </tr>
            <tr>

             <td >Constancia de Cancelados</td>
             <td><?php echo $cons14;?></td>
           </tr>


            <tr>



             <td>Total Constancias</td>
             <td><?php echo $cons;?></td>

           </tr>

       </tbody>

      </table>

