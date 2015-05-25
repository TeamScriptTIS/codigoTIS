<?php 
$consulta_5 = "SELECT activo, fecha_inicio, fecha_fin
			   from fase_convocatoria
			   WHERE tipo_fase_convocatoria=5 AND gestion=$id_gestion";
$query_5 = mysql_query($consulta_5,$conn) or die("Could not execute the select query 9.");
$res_5   = mysql_fetch_assoc($query_5);
$act_5   = $res_5['activo'];
$act_5_espera = false;
$act_ini_5    = $res_5['fecha_inicio'];
$act_fin_5    = $res_5['fecha_fin'];
$fecha_ini_5  = strtotime($act_ini_5);
$fecha_fin_5  = strtotime($act_fin_5);

if ($act_5==1) {//si se ha activado la actividad 5
	if ($fecha_actual<=$fecha_fin_5) {//si la fecha actual es menor o igual a la fecha fin
		if ($fecha_actual<$fecha_ini_5) {
			$act_5_espera=true;
		}
		else{
			$act_5=1;
			$act_5_espera=false;
		}
	}else{//si es mayor ya se tiene que desactivar
		$consulta_sql="UPDATE fase_convocatoria
		   			   set activo=0
		   			   WHERE gestion=$id_gestion AND tipo_fase_convocatoria=5";
		$consulta = mysql_query($consulta_sql,$conn)
		or die("Could not execute the select query 10.");
		$act_5=0;
		$act_5_espera=false;
	}
}

 ?>