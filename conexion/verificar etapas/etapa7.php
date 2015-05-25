<?php 
$consulta_7="SELECT activo, fecha_inicio, fecha_fin
			from fase_convocatoria
			WHERE tipo_fase_convocatoria=7 AND gestion=$id_gestion";
$query_7 = mysql_query($consulta_7,$conn)
	or die("Could not execute the select query 13.");
$res_7 = mysql_fetch_assoc($query_7);
$act_7=$res_7['activo'];
$act_7_espera=false;
$act_ini_7=$res_7['fecha_inicio'];
$act_fin_7=$res_7['fecha_fin'];
$fecha_ini_7=strtotime($act_ini_7);
$fecha_fin_7=strtotime($act_fin_7);
if ($act_7==1) {//si se ha activado la actividad 7
	if ($fecha_actual<=$fecha_fin_7) {//si la fecha actual es menor o igual a la fecha fin
		if ($fecha_actual<$fecha_ini_7) {
			$act_7_espera=true;
		}
		else{
			$act_7=1;
			$act_7_espera=false;
		}
	}else{//si es mayor ya se tiene que desactivar
		$consulta_sql="UPDATE fase_convocatoria
		   			   set activo=0
		   			   WHERE gestion=$id_gestion AND tipo_fase_convocatoria=7";
		$consulta = mysql_query($consulta_sql,$conn)
		or die("Could not execute the select query 14.");
		$act_7=0;
		$act_7_espera=false;
	}
}
 ?>