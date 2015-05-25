<?php
	date_default_timezone_set("America/La_Paz");
	include('conexion.php');
	/*----------DEFINICION DE VARIABLES CONTROL-----------------*/
	$gestion_valida = false;
	$nombre_gestion = "no definida";
	$id_gestion     = -1;
	$gestion_espera = false;
	
	$act_1 = 0;
	$act_2 = 0;
	$act_3 = 0;
	$act_4 = 0;
	$act_5 = 0;
	$act_6 = 0;
	$act_7 = 0;

	$date = date("Y-m-d");
	$hora = date("H:i:s");

	/*---------FIN DEFINICION DE VARIABLES--------------*/

	$consulta_sql = "SELECT id_gestion, gestion,fecha_ini_gestion,fecha_fin_gestion
				     from gestion_empresa_tis
				     WHERE gestion_activa=1 AND gestion!='Permanente'";

	$consulta  = mysql_query($consulta_sql,$conn)or die("Could not execute the select query.");
	$resultado = mysql_fetch_assoc($consulta);

	if (!empty($resultado['id_gestion'])){ 
		/*--------------------------VERIFICAR FECHAS DE GESTION------------------------*/
		$fin_gestion  = $resultado['fecha_fin_gestion'];
		$ini_gestion  = $resultado['fecha_ini_gestion'];
		$id_gestion   = (int)$resultado['id_gestion'];
		$fecha_actual = strtotime($date);
		$fecha_fin    = strtotime($fin_gestion);
		$fecha_ini    = strtotime($ini_gestion);
		if ($fecha_actual <= $fecha_fin) {
			if ($fecha_actual < $fecha_ini) {
				$id_gestion     = -1;
				$nombre_gestion = "inicia el ".$ini_gestion;
				$gestion_valida = false;
				$gestion_espera = true;
			}else{
				$nombre_gestion = $resultado['gestion'];
				$gestion_valida = true;
				$gestion_espera = false;

/*------------------------------ACTIVIDAD 1------------------------------*/

/*------------------------------ACTIVIDAD 2------------------------------*/

/*---------------------------------ACTIVIDAD 3-------------------------------------*/


/*--------------------------------ACTIVIDAD 4----------------------------*/

/*-----------------------------ACTIVIDAD 5-----------------------------------*/

/*------------------------------------ACTIVIDAD 6---------------------------------*/

/*------------------------ACTIVIDAD 7-----------------------------------*/

/*----------------------------FIN COMPROBACIONES Y ACTUALIZACIONES--------------------*/
			}
		}else{
			$cerrar_gestion="UPDATE gestion_empresa_tis
							set gestion_activa=0
							WHERE id_gestion=$id_gestion";
			$consulta_cerrar = mysql_query($cerrar_gestion,$conn)
			or die("Could not execute the select query 15.");
			$id_gestion=-1;
			$nombre_gestion="no definida";
			$gestion_valida=false;
			$gestion_espera=false;
		}
		/*-------------------------FIN VERIFICAR FECHAS DE GESTION---------------------*/
	}
?>