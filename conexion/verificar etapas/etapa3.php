<?php 
$consulta_3 = "SELECT activo, fecha_inicio, fecha_fin
			   from fase_convocatoria
			   WHERE tipo_fase_convocatoria=3 AND gestion=$id_gestion";
$query_3 = mysql_query($consulta_3,$conn) or die ("Could not execute the select query 5.");
$res_3   = mysql_fetch_assoc($query_3);
$act_3   = $res_3['activo'];
$act_3_espera = false;
$act_ini_3    = $res_3['fecha_inicio'];
$act_fin_3    = $res_3['fecha_fin'];

$fecha_ini_3  = strtotime($act_ini_3);
$fecha_fin_3  = strtotime($act_fin_3);

if ($act_3 == 1) {//si se ha activado la actividad 1
	if ($fecha_actual <= $fecha_fin_3) {//si la fecha actual es menor o igual a la fecha fin
		if ($fecha_actual < $fecha_ini_3) {
			$act_3_espera = true;
		}else{
			$act_3        = 1;
			$act_3_espera = false;
		}
	}else{//si es mayor ya se tiene que desactivar
		$consulta_sql="UPDATE fase_convocatoria
		   			   set activo = 0
		   			   WHERE gestion = $id_gestion AND tipo_fase_convocatoria = 3";
		$consulta = mysql_query($consulta_sql,$conn) or die("Could not execute the select query 6.");
		$act_3 = 0;
		$act_3_espera = false;
	}
}
?>