<?php
session_start();
require_once('conexion.php');

$user=isset($_POST["user"])?$_POST["user"]:NULL;
$pass=isset($_POST["pass"])?$_POST["pass"]:NULL;
insper($user,$pass);

function insper($user,$pass){
    if($user && $pass){
        //Encriptamos el campo ($pass en $pp)
        $pp = sha1(md5($pass));
        // Llamamos nuestro procedimiento almacenado
        // $sql = "CALL valida_usu(:user,:pass);";
        $sql = "SELECT id_usuario, nombre_usuario, apellido_usuario, id_perfil FROM usuario WHERE correo_electronico=:user AND contrasena=:pass;";
    $modelo=new conexion();
    $conexion=$modelo->get_conexion();
    $result=$conexion->prepare($sql);
    //Enviamos los parámetros de nuestra consulta
    $result->bindparam(':user',$user);
    $result->bindparam(':pass',$pp);
    if($result)
        //Ejecutamos la consulta
        $result->execute();
    while($f=$result->fetch()){
            $res[]=$f;
    }
    $res= isset($res) ? $res:NULL;
    $coutR = is_countable($res);
        if($coutR==1){
            //Capturamos en variables de sesión los datos de nuestro usuario
                $_SESSION["id_usuario"] = $res[0]['id_usuario'];
                $_SESSION["nombre"] = $res[0]['nombre_usuario'];
                $_SESSION["apellido"] = $res[0]['apellido_usuario'];
                $_SESSION["id_perfil"] = $res[0]['id_perfil'];
            //Variable de seguridad (MSeguridad.php)
                $_SESSION["autentificado"] = '¿*-?¡--@';
            //Autorizamos el ingreso a (home.php=Mod_Admin)(HTML-JS)
                echo "<script type='text/javascript'>window.location='../home.php';</script>";	
        }
        else{
            //NO se Autorizara el ingreso a (home.php=Mod_Admin)
                session_destroy();
                echo "<script type='text/javascript'>window.location='../iniciarsesion.php?errorusuario=si';</script>";
        }
    }
}	

?>