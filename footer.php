<?php
    if(!isset($titulo)){
        header('Location: index.php');
    }

    if(!isset($no_visible_elements) || !$no_visible_elements){ ?>
            <!-- content ends  final del conenido-->
                    </div>
                    <?php 
                            include('nav_derecha.php');
                    ?>	
    <?php } ?>
    </div><!--/fluid-row-->
        <?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
    <hr>
    
    <footer>
            <p class="pull-left">&copy; <a href="#" target="_blank">Derechos Reservados </a> <?php echo date('Y') ?></p>
            <p class="pull-right">Powered by: <a href="mailto:teamscript.comp@gmail.com">Team Script S.R.L</a></p>
    </footer>
    <?php } ?>

</div><!--/.fluid-container-->

<!-- external javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- jQuery -->
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/script.js"></script>
<!-- jQuery UI -->
<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
<!-- transition / effect library -->
<script src="js/bootstrap-transition.js"></script>
<!-- alert enhancer library -->
<script src="js/bootstrap-alert.js"></script>
<!-- modal / dialog library -->
<script src="js/bootstrap-modal.js"></script>
<!-- custom dropdown library -->
<script src="js/bootstrap-dropdown.js"></script>
<!-- scrolspy library -->
<script src="js/bootstrap-scrollspy.js"></script>
<!-- library for creating tabs -->
<script src="js/bootstrap-tab.js"></script>
<!-- library for advanced tooltip -->
<script src="js/bootstrap-tooltip.js"></script>
<!-- popover effect library -->
<script src="js/bootstrap-popover.js"></script>
<!-- button enhancer library -->
<script src="js/bootstrap-button.js"></script>
<!-- accordion library (optional, not used in demo) -->
<script src="js/bootstrap-collapse.js"></script>
<!-- carousel slideshow library (optional, not used in demo) -->
<script src="js/bootstrap-carousel.js"></script>
<!-- autocomplete library -->
<script src="js/bootstrap-typeahead.js"></script>
<!-- tour library -->
<script src="js/bootstrap-tour.js"></script>
<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calander plugin -->
<script src='js/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='js/jquery.dataTables.min.js'></script>
<!-- validation plugin -->	
<script src="js/jquery.validate.js"></script>
<!-- VALIDACION DE LOS CAMPOS DE INGRESO DE DATOS-->
<script src="js/validacion_de_campos.js"></script>
<!-- chart libraries start -->
<script src="js/excanvas.js"></script>
<script src="js/jquery.flot.min.js"></script>
<script src="js/jquery.flot.pie.min.js"></script>
<script src="js/jquery.flot.stack.js"></script>
<script src="js/jquery.flot.resize.min.js"></script>
<!-- subir archivo -->
<script src="js/jquery.uploadify.min.js" type="text/javascript"></script>
<!-- select or dropdown enhancer -->
<script src="js/jquery.chosen.min.js"></script>
<!-- checkbox, radio, and file input styler -->
<script src="js/jquery.uniform.min.js"></script>
<!-- plugin for gallery image view -->
<script src="js/jquery.colorbox.min.js"></script>
<!-- rich text editor library -->
<script src="js/jquery.cleditor.min.js"></script>
<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>
<!-- file manager library -->
<script src="js/jquery.elfinder.min.js"></script>
<!-- star rating plugin -->
<script src="js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/charisma.js"></script>
<script src="js/noticias.js"></script>
<?php
      //include('conexion/verificar_gestion.php');
      if ($gestion_valida && (strcmp($titulo,"Sistema de Apoyo a la Empresa TIS")==0)) {
           $consulta = "SELECT COUNT(*) as numero
                        FROM documento_consultor
                        WHERE  documento_jefe= '1' AND gestion=$id_gestion";
           $resultado = mysql_query($consulta);
           $res = mysql_fetch_array( $resultado);
           $num=  $res['numero'];
           if($res['numero']>3){
                                   ?>
            <script language="JavaScript" type="text/javascript">
					    var nume='<?php  echo $num;  ?>'
						 setTamAviso( 130 );
						 setNumAvisos( nume );
						 timerID = setTimeout("moverAvisos()", 1000);
					    </script>
         <?php
            }
        }
        /*if ($gestion_valida && (strcmp($titulo,"Notificaciones Grupo Empresa")==0)) {
           $consulta = "SELECT COUNT(*) as numero
                 		FROM notificacion
                	 	WHERE usuario_destino = '$usuario' OR usuario_destino=1";
           $resultado = mysql_query($consulta);
           $res = mysql_fetch_array( $resultado);
           $num=  $res['numero'];
           if($res['numero']>3){
                                   ?>
            <script language="JavaScript" type="text/javascript">
					    var nume='<?php  echo $num;  ?>'

						 setTamAviso( 130 );
						 setNumAvisos( nume );
						 timerID = setTimeout("moverAvisos()", 1000);
					    </script>
         <?php
            }
        }*/
 ?>
    <!-- Inicio Calendario de tareas -->
<script type="text/javascript" src="js/colorpicker/colorpicker.js"></script>
<script type="text/javascript" src="js/jquery-qtip-1.0.0-rc3140944/jquery.qtip-1.0.js"></script>
<script type="text/javascript" src="js/lib/jshashtable-2.1.js"></script>
<script type="text/javascript" src="js/frontierCalendar/jquery-frontier-cal-1.3.2.min.js"></script>
<!--<script type="text/javascript" src="js/manipulacion.js"></script> -->
<?php
    if(strcmp($titulo,"Planificar Tareas Grupo Empresa")==0){
        include ('jsr/calendarfooter.php');
    }
 // include ('jsr/calendariofooter.php');
?>
<!--  fin Calendario de tareas -->
    </body>
</html>