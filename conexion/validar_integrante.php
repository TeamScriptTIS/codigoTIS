<?php
    include('conexion.php');
    session_start();
    $bitacora = mysql_query("CALL iniciar_sesion(".$_SESSION['id'].")",$conn)
    or die("Error no se pudo realizar cambios.");
    $u=$_POST["grupo"];
    $c ="SELECT count(*) as numer
        from integrante i, usuario u, carrera c
        where grupo_empresa='$u' and  u.id_usuario=i.usuario AND i.carrera=c.id_carrera";
    $r = mysql_query($c);
    $res = mysql_fetch_array($r);
    $num =  $res['numer'];
    $counta=0;
    $exito=true;
    while($counta < $num){
        $a=$_POST["a".$counta];
        $b=0;
        if($_POST["b".$counta]){
            $b=1;                     
        }
         $sql = "UPDATE usuario
                SET habilitado='$b'
                WHERE id_usuario = '$a'";
         $result = mysql_query($sql);      
//         if(!$result){
//             $exito=$exito && false;
//         }else{
//             $exito=$exito && true;
//         }
        $counta++;
    }
    
    
//    echo '<script>
//    if("$exito" == true){
//        alert("La modificacion se ejecuto con exito");
//    }else{
//        alert("La modificacion no se produjo con exito");
//    }
//</script>';
    header("Location:../administrar_integrante.php");          
?>


    