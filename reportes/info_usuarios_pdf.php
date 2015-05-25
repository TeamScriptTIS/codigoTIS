<?php
    include '../conexion/conexion.php';
    session_start();
    define('FPDF_FONTPATH', 'font/');
    require('../lib/fpdf_js.php');

    class PDF_AutoPrint extends PDF_Javascript{
       function AutoPrint($dialog=false){
            $param=($dialog ? 'true' : 'false');
            $script="print($param);";
            $this->IncludeJS($script);
        }
        
        function Header(){	    
            $this->Image('../img/umss.png',13,10,25);
            $this->SetFont('Arial','B',20);
            $this->SetTextColor(90,90,90);
            $this->Cell(80);
            $this->Cell(18,9,utf8_decode("Sistema de Apoyo a la Empresa TIS"),0,0,'C');
            $this->Image('../img/fcyt.jpg',172,10,25);
            $this->Ln(20);   
        }
                
        function Footer(){
            $this->SetY(-25);
            $this->SetFont('Arial','I',8);
            $this->SetTextColor(90,90,90);
            $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'',0,0,'R');
            $this->Ln();
            $this->Cell(0,10,utf8_decode('Universidad Mayor de San Simón'),0,0,'L');
        }    
    }
    
    $pdf = new PDF_AutoPrint();
    $pdf->Open();
    $pdf->SetMargins(15,18);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times', '', 12);
    $ID = $_SESSION['id'];
    if(isset($_SESSION['nombre_usuario'])){
        if($_SESSION['tipo']==5||$_SESSION['tipo']==4){
            cont_archivo_est($_SESSION['tipo'],$ID, $pdf, $conn);
        }else{
            cont_archivo_jefes($_SESSION['tipo'], $pdf, $conn);
        }
        $pdf->AutoPrint(true);
        $pdf->Output();
    }
    
    function cont_archivo_est($i, $ID, $pdf, $conn){
        $cargo="";
        switch ($i) {
            case (5) :
                $cargo="INTEGRANTE";
               break;
            case (4) :
                $cargo="JEFE DE GRUPO EMPRESA";
                break;
        }
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(0,10,utf8_decode("Información de Usuario: ".$cargo.""),0,0,'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial','B',15);
        $pdf->Ln(5);
        $pdf->Cell(0,10,utf8_decode("Grupo Empresa :"),0,0,'L');

        $cabecerasG = array("Nombre Largo :", "Nombre Corto :","Abreviatura :",  "Consultor TIS asignado :","Habilitado :");
        $cabecerasI = array("Nombre de Usuario :","Nombre :", "Apellido :", "Telefono :", "Codigo SIS", "Correo Electronico :", "Habilitado :", "Carrera :", "Rol(es) :");

        $consulta_1="SELECT id_usuario, nombre, apellido, telefono, codigo_sis, nombre_carrera, usuario.nombre_usuario, email,habilitado, grupo_empresa 
                    FROM integrante, usuario, carrera 
                    WHERE integrante.usuario="."$ID"." AND  usuario.id_usuario=integrante.usuario AND carrera=carrera.id_carrera";
        $consulta_int = mysql_query($consulta_1,$conn)or die("Could not execute the select query.");
        $resultado_int = mysql_fetch_assoc($consulta_int);

        $grupo_empresa = (int) $resultado_int['grupo_empresa'];
        $consulta_2 = "SELECT nombre_largo, nombre_corto, abreviatura, nombre, apellido, u.habilitado
                        FROM grupo_empresa g,sociedad s, usuario u
                        WHERE g.id_grupo_empresa=$grupo_empresa AND g.sociedad=s.id_sociedad AND g.consultor_tis=u.id_usuario";
        $consulta_grupo = mysql_query($consulta_2,$conn)or die("Could not execute the select query.");
        $resultado_grupo = mysql_fetch_assoc($consulta_grupo);

        $pdf->SetFillColor(255,255,0);
        $pdf->SetTextColor(90,90,90);
        $pdf->SetDrawColor(49,126,172);

        $pdf->Ln(15);
        $pdf->Cell(90,7,$cabecerasG[0],1,0,'C');
        $pdf->Cell(90,7,$resultado_grupo['nombre_largo'],1,0,'C');
        $pdf->Ln();
        $pdf->Cell(90,7,$cabecerasG[1],1,0,'C');
        $pdf->Cell(90,7,$resultado_grupo['nombre_corto'],1,0,'C');
        $pdf->Ln();
        $pdf->Cell(90,7,$cabecerasG[2],1,0,'C');
        $pdf->Cell(90,7,$resultado_grupo['abreviatura'],1,0,'C');
        $pdf->Ln();
        $pdf->Cell(90,7,$cabecerasG[3],1,0,'C');
        $pdf->Cell(90,7,$resultado_grupo['nombre']." ".$resultado_grupo['apellido'],1,0,'C');
        $pdf->Ln();
        $pdf->Cell(90,7,$cabecerasG[4],1,0,'C');
        if($resultado_grupo['habilitado']==1){$cad='Si';}else{$cad='No';}
        $pdf->Cell(90,7,$cad,1,0,'C');
        $pdf->Ln(15);

        $pdf->SetFont('Arial','B',15);

        $pdf->Cell(0,10,"Datos del Integrante :",0,0,'L');
        $pdf->Ln(15);
        $pdf->Cell(90,7,$cabecerasI[0],1,0,'C');
        $pdf->Cell(90,7,$resultado_int['nombre_usuario'],1,0,'C');
        $pdf->Ln();
        $pdf->Cell(90,7,$cabecerasI[1],1,0,'C');
        $pdf->Cell(90,7,$resultado_int['nombre'],1,0,'C');
        $pdf->Ln();
        $pdf->Cell(90,7,$cabecerasI[2],1,0,'C');
        $pdf->Cell(90,7,$resultado_int['apellido'],1,0,'C');
        $pdf->Ln();
        $pdf->Cell(90,7,$cabecerasI[3],1,0,'C');
        $pdf->Cell(90,7,$resultado_int['telefono'],1,0,'C');
        $pdf->Ln();
        $pdf->Cell(90,7,$cabecerasI[4],1,0,'C');
        $pdf->Cell(90,7,$resultado_int['codigo_sis'],1,0,'C');
        $pdf->Ln();
        $pdf->Cell(90,7,$cabecerasI[5],1,0,'C');
        $pdf->Cell(90,7,utf8_decode($resultado_int['email']),1,0,'C');
        $pdf->Ln();
        $pdf->Cell(90,7,$cabecerasI[6],1,0,'C');
        if($resultado_int['habilitado']==1){$resultado_int['habilitado']="Si";}else{$resultado_int['habilitado']="No";}
        $pdf->Cell(90,7,$resultado_int['habilitado'],1,0,'C');
        $pdf->Ln();
        $pdf->Cell(90,7,$cabecerasI[7],1,0,'C');
        $pdf->Cell(90,7,utf8_decode($resultado_int['nombre_carrera']),1,0,'C');
        $pdf->Ln();
        $pdf->Cell(90,7,$cabecerasI[8],1,0,'C');
        $consulta_rol = "SELECT id_rol,nombre
                        FROM rol_integrante,rol
                        WHERE rol_integrante.integrante=".$resultado_int['id_usuario']." AND rol_integrante.rol=rol.id_rol";
        $resultado_rol = mysql_query($consulta_rol);
        $r='';
        while($row_roles = mysql_fetch_array($resultado_rol)) {
                $r=$r.$row_roles['nombre']." ,";
        }
        $r=substr($r, 0, strlen($r)-2);
        $r.'.';
        $pdf->Cell(90,7,$r,1,0,'C');                
    }   
        
    function cont_archivo_jefes($i, $pdf, $conn){
        switch  ($_SESSION['tipo']){
            case (3) :
                $cargo="CONSULTOR TIS";
                break;
            case (2) :
                $cargo="JEFE CONSULTOR TIS";
                break;
            case (1):        
                $cargo="ADMINISTRADOR";
                break;
        }
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(0,10,utf8_decode("Información de Usuario: ".$cargo.""),0,0,'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial','B',10);
        $pdf->Ln(10);
        $consulta_usuario = mysql_query("SELECT nombre_usuario,nombre,apellido,telefono,email,habilitado
                                        FROM usuario u
                                        WHERE tipo_usuario=".$i."",$conn)or die("Could not execute the select query.");
        $resultado = mysql_fetch_assoc($consulta_usuario);
        $cabeceras = array("Nombre de Usuario :","Nombre :", "Apellido :", "Telefono :", "E-Mail :", "Habilitado :");

        $pdf->SetFillColor(255,255,0);
        $pdf->SetTextColor(90,90,90);
        $pdf->SetDrawColor(49,126,172);
        if($resultado['habilitado']==1){
            $resultado['habilitado']="Si";
        }else{
            $resultado['habilitado']="No";
        }
        $i=0;
        foreach ($resultado as $val) {
            $pdf->Cell(30);
            $pdf->Cell(60,7,$cabeceras[$i],1,0,'C');
            $pdf->Cell(60,7,$val,1,0,'C');
            $pdf->Ln();
            $i++;
        }
    }