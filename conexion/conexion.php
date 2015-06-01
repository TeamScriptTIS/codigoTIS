<?php
	$conn = mysql_connect("localhost","root","Aac1989@") or die("Error en conexion");
	mysql_select_db("tis_teamscript", $conn) or die("Error en base de datos");
	mysql_query("SET NAMES 'utf8'");
?>
