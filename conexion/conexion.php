<?php
	$conn = mysql_connect("localhost","root","") or die("Error en conexion");
	mysql_select_db("tis_munisoft", $conn) or die("Error en base de datos");
	mysql_query("SET NAMES 'utf8'");
?>
