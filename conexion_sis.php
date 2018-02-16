<?php
	$serverName="JR4\SQLEXPRESS";
	$connectionInfo= array("Database"=>"prueba_usuarios");
	$con= sqlsrv_connect($serverName,$connectionInfo);

	if($con){
		echo "conexion exitosa";
	}else{
		echo "fallo en la conexion";
	}
?>