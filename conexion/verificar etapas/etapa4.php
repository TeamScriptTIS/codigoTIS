<?php 
$consulta_4 = "SELECT activo, fecha_inicio, fecha_fin
			   from fase_convocatoria
			   WHERE tipo_fase_convocatoria=4 AND gestion=$id_gestion";
$query_4 = mysql_query($consulta_4,$conn)or die("Could not execute the select query 7.");
$res_4   = mysql_fetch_assoc($query_4);
$act_4   = $res_4['activo'];
$act_4_espera = false;
$act_ini_4    = $res_4['fecha_inicio'];
$act_fin_4    = $res_4['fecha_fin'];
$fecha_ini_4  = strtotime($act_ini_4);
$fecha_fin_4  = strtotime($act_fin_4);

if ($act_4 == 1) {//si se ha activado la actividad 4
	if ($fecha_actual <= $fecha_fin_4) {//si la fecha actual es menor o igual a la fecha fin
		if ($fecha_actual < $fecha_ini_4) {
			$act_4_espera = true;
		}else{
			$act_4        = 1;
			$act_4_espera = false;
		}
	}else{//si es mayor ya se tiene que desactivar
		$consulta_sql="UPDATE fase_convocatoria
		   			   set activo = 0
		   			   WHERE gestion = $id_gestion AND tipo_fase_convocatoria = 4";
		$consulta = mysql_query($consulta_sql,$conn)
		or die("Could not execute the select query 8.");
		$act_4 = 0;
		$act_4_espera = false;
	}
}

 ?>