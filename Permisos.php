<?php
session_start();
ob_start();

include('crearConexionGECOMP.php');
function Verificar_Permisos ($usuario, $idpermiso) {
                                $resultado = 0;
                              $valor=$usuario;
                              $permiso=$idpermiso;

                                    $consulta= mssql_query("SELECT Id_Rol FROM SEIngreso_Login WHERE CodEmpleado = '$valor'");
                                    while($ejecutar = mssql_fetch_array($consulta)){
                                    $id=$ejecutar['Id_Rol'];
                                        
                                    $consulta1= mssql_query("SELECT * FROM SERoles_Permisos WHERE Id_Rol = '$id' and Id_Permiso = '$permiso'");
                                    while($ejecutar1 = mssql_fetch_array($consulta1)){
                                                                        $resultado = 1;
                                                                       }
                                    }

                                    return $resultado;

                }

    


?>
