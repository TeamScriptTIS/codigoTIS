<?php 
$consulta_6="SELECT activo, fecha_inicio, fecha_fin
							from fase_convocatoria
			WHERE tipo_fase_convocatoria=6 AND gestion=$id_gestion";
$query_6 = mysql_query($consulta_6,$conn)
	or die("Could not execute the select query 11.");
$res_6 = mysql_fetch_assoc($query_6);
$act_6=$res_6['activo'];
$act_6_espera=false;
$act_ini_6=$res_6['fecha_inicio'];
$act_fin_6=$res_6['fecha_fin'];
$fecha_ini_6=strtotime($act_ini_6);
$fecha_fin_6=strtotime($act_fin_6);
if ($act_6==1) {//si se ha activado la actividad 1
	if ($fecha_actual<=$fecha_fin_6) {//si la fecha actual es menor o igual a la fecha fin
		if ($fecha_actual<$fecha_ini_6) {
			$act_6_espera=true;
		}
		else{
			$act_6=1;
			$act_6_espera=false;
		}
	}else{//si es mayor ya se tiene que desactivar
		$consulta_sql="UPDATE fase_convocatoria
		   			   set activo=0
		   			   WHERE gestion=$id_gestion AND tipo_fase_convocatoria=6";
		$consulta = mysql_query($consulta_sql,$conn)
		or die("Could not execute the select query 12.");
		$act_6=0;
		$act_6_espera=false;
	}
}
 ?>