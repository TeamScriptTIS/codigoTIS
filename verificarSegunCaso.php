<?php  

	if(isset($_SESSION['nombre_usuario'])){
		$home = "";
		switch ($_SESSION['tipo']){
			 	case (5) :
                        $home="home_integrante.php";
                        break; 
	            case (4) :
	                	$home="home_grupo.php";
	                    break;
	            case (3) :
	                	$home="home_consultor.php";
	                    break;
	            case (2) :
	                	$home="home_consultor_jefe.php";
	                    break;
	            case (1) :
	                    $home="home_admin.php";
	                    break;                                                             		
	          }   
		header("Location: ../".$home);
	}
	
?>