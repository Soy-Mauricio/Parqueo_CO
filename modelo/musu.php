<?php 
	//1.2. Crea Clase(POO) que se llamara tal cual el archivo
class musu{
	//1.3. métodos/Funciones
		public function ins_usu($id_usuario, $nombre_usuario, $apellido_usuario, $correo_electronico, $telefono_usuario, $contrasena, $id_perfil){
		//Instanciar la clase/(objeto) conexion en variable $modelo
	 	$modelo = new conexion();
	 	//variable $modelo le heredo la funcion de mi clase
	 	$conexion = $modelo->get_conexion();
	 	//Llamado de mi PROCEDURE almacenado y envio parametros
	 	$sql = "CALL insert_usu(:id_usuarionew, :nombreusuarionew, :apellidousuarionew, :correonew, :telefonousuarionew, :contrasenanew, :id_perfilnew);";
	 	//Creo variable $result para alistar la consulta con parametros
	 	$result = $conexion->prepare($sql);
	 	//Reemplazo los parámetros (PRECEDURE) por los recibidos desde el Controlador(función)
	 	$result->bindParam(':id_usuarionew',$id_usuario);
	 	$result->bindParam(':nombreusuarionew',$nombre_usuario);
	 	$result->bindParam(':apellidousuarionew',$apellido_usuario);
		 $result->bindParam(':correonew',$correo_electronico);
	 	$result->bindParam(':telefonousuarionew',$telefono_usuario);
	 	$result->bindParam(':contrasenanew',$contrasena);
	 	$result->bindParam(':id_perfilnew',$id_perfil);
	 	//Valido si la variable $result(Esta Vacia)
	 	if(!$result)
	  		echo "<script>alert('ERROR al insertar Usuario');</script>";
	 	else
	  	$result->execute();
	  		echo "<script>alert('Usuario registrado correctamente...');</script>";
	}
	//1.3.2. Crear función CONSULTA ()
	public function sel_usu(){
		$resultado = null;
		$modelo = new conexion();
		$conexion = $modelo->get_conexion(); 
		$sql = "SELECT * FROM usuario;";
		$result = $conexion->prepare($sql);
		$result->execute();
		
		while($f=$result->fetch()){
			$resultado[]=$f;
		}
		return $resultado;
	}
	//1.3.3. Crear Funciona ACTUALIZAR()
	public function upd_usu($id_usuario, $nombre_usuario, $apellido_usuario, $correo_electronico, $telefono_usuario, $contrasena, $id_perfil){
		$modelo = new conexion();
		$conexion = $modelo->get_conexion(); 
		$sql = "UPDATE usuario SET nombre_usuario=:nombre_usuario, apellido_usuario=:apellido_usuario, correo_electronico=:correo_electronico, telefono_usuario=:telefono_usuario, contrasena=:contrasena, id_perfil=:id_perfil WHERE id_usuario=:id_usuario;";
		$result = $conexion->prepare($sql);
		$result->bindParam(':nombre_usuario',$nombre_usuario);
		$result->bindParam(':apellido_usuario',$apellido_usuario);
		$result->bindParam(':correo_electronico',$correo_electronico);
		$result->bindParam(':telefono_usuario',$telefono_usuario);
		$result->bindParam(':contrasena',$contrasena);
		$result->bindParam(':foto_usuario',$foto_usuario);
		$result->bindParam(':id_perfil',$id_perfil);

		if(!$result)
			echo "<script>alert('Error al actualizar');</script>";
		else
			$result->execute();
			echo "<script>alert('Usuario Actualizado');</script>";
	}
	//1.3.4. Crear Funciona ELIMINAR()
	public function del_usu($id_usuario){
		$modelo = new conexion();
		$conexion = $modelo->get_conexion(); 
		$sql = "DELETE FROM usuario WHERE id_usuario=:id_usuario;";
		$result = $conexion->prepare($sql);
		$result->bindParam(':id_usuario',$id_usuario);

		if(!$result)
			echo "<script>alert('Error al ELIMINAR');</script>";
		else
			$result->execute();
			echo "<script>alert('Usuario Eliminado');</script>";
	}
	//1.3.5. Crear Funciones Adicioanles (Ej: Carga de datos en campo del formulario (Tb_perfiles))
	//1.3.5.1. Crear función CARGA_DATOS [COMBOBOX]
	public function list_Perfil(){
		$resultado = null;
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$sql = "SELECT perfid, perfnom	FROM perfil;";
		$result = $conexion->prepare($sql);
		$result->execute();
		while($f=$result->fetch()){
			$resultado[]=$f;
		}
		return $resultado;
	}
	//1.3.5.2. Crear Funcion Cargar datos de un usuario al formulario para (Actualizar)
	public function sel_usu_act($id_usuario){
		$resultado1 = NULL;
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$sql = "SELECT id_usuario, nombre_usuario, apellido_usuario, correo_electronico, telefono_usuario, contrasena, id_perfil FROM usuario WHERE id_usuario=:id_usuario;";
		$result = $conexion->prepare($sql);
		$result->bindParam(':id_usuario',$id_usuario);
		$result->execute();
		while ($f1=$result->fetch()){
			$resultado1[]=$f1;
		}
		return $resultado1;
	}
	//...

}
?>