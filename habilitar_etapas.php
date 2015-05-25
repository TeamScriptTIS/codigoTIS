<?php 
	 function habilitar_etapa($envioDatos, $ini, $fin, $newsletter){
		if (isset($envioDatos)) {
			$error = false;
			if (isset($ini) && isset($fin) && isset($newsletter)) {
				$actividad_1 = "checked";
				$inicio      = $ini;
				$fin         = $fin;
			
				$ini_dia  = substr($inicio, 8);
				$ini_mes  = substr($inicio, 5,2);
				$ini_year = substr($inicio, 0,4);

				$fin_dia  = substr($fin, 8);
				$fin_mes  = substr($fin, 5,2);
				$fin_year = substr($fin, 0,4);

				if(@checkdate($ini_mes, $ini_dia, $ini_year)){
					if (@checkdate($fin_mes, $fin_dia, $fin_year)) {
						if($inicio>=$fecha){//corecto
							if ($fin>=$inicio) {//corecto sobreescribir base de datos
								if (strtotime($fin)<=$fecha_fin) {
									$consulta_sql="UPDATE fase_convocatoria
											set fecha_inicio='$inicio' , fecha_fin='$fin', activo=1
											WHERE gestion=$id_gestion AND tipo_fase_convocatoria=2";
									$consulta = mysql_query($consulta_sql,$conn)
									or die(mysql_error());
									header('Location:planificacion.php#registro');
								}
								else{
									$error = true;
									$error_fecha_fin = "La gesti&oacute;n termina la fecha ".$fin_gestion;
								}
							}
							else{
								$error = true;
								$error_fecha_fin = "La fecha de finalizaci&oacute;n no debe ser menor que la fecha de inicio";
							}
						}
						else{
							$error = true;
							$error_fecha_ini = "La fecha de inicio no debe ser menor a la fecha presente";
						}
					}
					else{
						$error = true;
						$error_fecha_fin = "La fecha de finalizacion no es v&aacute;lida";
					}
				}else{
					$error = true;
					$error_fecha_ini = "La fecha de inicio no es v&aacute;lida";
				}
			}else{
				if (!isset($_POST['newsletter'])) {
					$consulta_sql="UPDATE fase_convocatoria
								   set activo=0
								   WHERE gestion=$id_gestion AND tipo_fase_convocatoria=2";
					$consulta = mysql_query($consulta_sql,$conn)
					or die("Could not execute the select query.");
					header('Location:planificacion.php#registro');
				}
			}
		}
		$res = array('error' => $error, 'errorFechaIni' => $error_fecha_ini, 'errorFechaFin'=> $error_fecha_fin);
		return $res;
	}
 ?>