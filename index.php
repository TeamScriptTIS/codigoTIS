<?php
    $titulo = "Sistema de Apoyo a la Empresa TIS";
    include('conexion/verificar_gestion.php');
    session_start();
    if(isset($_SESSION['nombre_usuario'])){
        $home = "";
        switch  ($_SESSION['tipo']){
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
        header("Location: ".$home);
    }	
    include('header.php');
    
?>
    <div>
        <ul class="breadcrumb">
            <li>
                    <a href="index.php">Inicio</a>
            </li>
        </ul>
    </div>
    <center><h3>Bienvenidos al Sistema de Apoyo a la Empresa TIS</h3></center>
    <div class="row-fluid">
    <div class="box span12">
			<div class="box-header well">
				<h2><i class="icon-bullhorn"></i> Avisos: Gesti&oacute;n <?php echo $nombre_gestion; ?></h2>
			</div>
			<div class="box-content alerts">		
			<?php
				if ($gestion_valida) {
					include('conexion/noticias.php');
				}else{
                 	echo "<div align=\"center\">
                    <h4><i class=\"icon-info-sign\"></i>
                    	No existe ning&uacute;n aviso para esta gesti&oacute;n.</h4>
                  	</div>";
                 }
              ?>
			</div>
		</div>
	</div>
<?php include('footer.php'); ?>
