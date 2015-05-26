<?php
    include('conexion.php');
    session_start();		
    $bitacora = mysql_query("CALL iniciar_sesion(".$_SESSION['id'].")",$conn)or die("Error no se pudo realizar cambios.");          

    $num    = $_POST["count"];
    $bb=true;
    $counta = 0;
    while($counta < $num){
        $a =  $_POST["a".$counta]; //ide usus
        $c =  0;                   //habilitado ?
        if($_POST["c".$counta])
            $c = 1;
            $idUsuarios = mysql_query("SELECT id_usuario 
                                FROM usuario, integrante 
                                WHERE usuario=id_usuario and grupo_empresa=(SELECT id_grupo_empresa 
                                                                FROM integrante, usuario, grupo_empresa 
                                                                WHERE usuario=id_usuario and grupo_empresa=id_grupo_empresa and usuario=4")or die("l");
            foreach ($idUsuarios as $v) {
                $sql    = "UPDATE usuario SET habilitado='$c' WHERE id_usuario ='$v'";
                $result = mysql_query($sql);
            }

        if ($result==true){
            $bb=$bb && true;
        }else{
            $bb=$bb && false;
        }
        $counta++;     
    }
    
    $_SESSION['exito'] = $bb;
    header("Location:../administrar_grupo_empresa.php");
