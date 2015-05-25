<?php 
$consulta_1 = "SELECT activo, fecha_inicio, fecha_fin
			from fase_convocatoria
			WHERE tipo_fase_convocatoria = 1 AND gestion = $id_gestion";
$query_1 = mysql_query($consulta_1,$conn) or die("Could not execute the select query 1.");
$res_1        = mysql_fetch_assoc($query_1);
$act_1        = $res_1['activo'];
$act_1_espera = false;
$act_ini_1    = $res_1['fecha_inicio'];
$act_fin_1    = $res_1['fecha_fin'];

$fecha_ini_1  = strtotime($act_ini_1);
$fecha_fin_1  = strtotime($act_fin_1);

if ($act_1 == 1) {//si se ha activado la actividad 1
	if ($fecha_actual <= $fecha_fin_1) {//si la fecha actual es menor o igual a la fecha fin
		if ($fecha_actual < $fecha_ini_1) {
			$act_1_espera = true;
		}else{
			$act_1        = 1;
			$act_1_espera = false;
		}
	}else{//si es mayor ya se tiene que desactivar
		$consulta_sql = "UPDATE fase_convocatoria set activo=0
		   			     WHERE gestion = $id_gestion AND tipo_fase_convocatoria = 1";
		$consulta = mysql_query($consulta_sql,$conn) or die(mysql_error());
		$act_1        = 0;
		$act_1_espera = false;
	}
} 
 ?>