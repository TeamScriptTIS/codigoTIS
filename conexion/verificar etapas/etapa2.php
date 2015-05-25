<?php 
$consulta_2 = "SELECT activo, fecha_inicio, fecha_fin
			   	from fase_convocatoria
	        	WHERE tipo_fase_convocatoria = 2 AND gestion = $id_gestion";
$query_2 = mysql_query($consulta_2,$conn) or die("Could not execute the select query 3.");
$res_2   = mysql_fetch_assoc($query_2);
$act_2   = $res_2['activo'];
$act_2_espera = false;
$act_ini_2    = $res_2['fecha_inicio'];
$act_fin_2    = $res_2['fecha_fin'];
$fecha_ini_2  = strtotime($act_ini_2);
$fecha_fin_2  = strtotime($act_fin_2);

if ($act_2 ==1 ) {//si se ha activado la actividad 1
	if ($fecha_actual <= $fecha_fin_2) {//si la fecha actual es menor o igual a la fecha fin
		if ($fecha_actual < $fecha_ini_2) {
			$act_2_espera = true;
		}else{
			$act_2        = 1;
			$act_2_espera = false;
		}
	}else{//si es mayor ya se tiene que desactivar
		$consulta_sql="UPDATE fase_convocatoria
		   			   set activo = 0
		   			   WHERE gestion = $id_gestion AND tipo_fase_convocatoria = 2";
		$consulta = mysql_query($consulta_sql,$conn)
		or die("Could not execute the select query 4.");
		$act_2=0;
		$act_2_espera=false;
	}
}
 ?>