<?php 
		//1.2. Crea Clase(POO) que se llamara tal cual el archivo
class musu{
		//1.3. métodos/Funciones
		public function ins_usu($id_usuario,$nombre_usuario, $apellido_usuario, $correo_electronico, $telefono_usuario, $contrasena, $id_perfil){

		//Instanciar la clase/(objeto) conexion en variable $modelo 
		$modelo = new conexion();

	 	//variable $modelo le heredo la funcion de mi clase 
	 	$conexion = $modelo->get_conexion();
		

	 	//Llamado de mi PROCEDURE almacenado y envio parametros
	 	$sql = "CALL insert_usu(:idusunew, :nombrenew, :apellidonew, :correonew, :telnew, :contrasenanew, NULL, NULL, NULL, :idperfilnew)";

	 	//Creo variable $result para alistar la consulta con parametros
	 	$result = $conexion->prepare($sql);

	 	//Reemplazo los parámetros (PRECEDURE) por los recibidos desde el Controlador(función)
	 	$result->bindParam(':idusunew',$id_usuario);
	 	$result->bindParam(':nombrenew',$nombre_usuario);
	 	$result->bindParam(':apellidonew',$apellido_usuario);
	 	$result->bindParam(':correonew',$correo_electronico);
	 	$result->bindParam(':telnew',$telefono_usuario);
	 	$result->bindParam(':contrasenanew',$contrasena);
    	$result->bindParam(':idperfilnew',$id_perfil);

		
	 	//Valido si la variable $result(Esta Vacia)
	 	if(!$result)
	  		echo "<script>alert('ERROR al insertar Usuario');</script>";
	 	else
	  	$result->execute();
	  		echo "<script>alert('Usuario registrado correctamente...');</script>";
		}

	
	//1.3.2. Crear función CONSULTA ()
	public function sel_usu($filtro,$rvini,$rvfin){
		$resultado = null;
		$modelo = new conexion();
		$conexion = $modelo->get_conexion(); 
		$sql = 'SELECT * FROM usuario';
		if($filtro){
			$filtro = '%' .$filtro. '%';
			$sql .= ' WHERE nombre_usuario LIKE :filtro';
		}
		$sql .= ' LIMIT '.$rvini.', '.$rvfin.';';
		$result = $conexion->prepare($sql);
		if($filtro){
			$result->bindParam(':filtro', $filtro);
		}
		$result->execute();
		
		while($f=$result->fetch()){
			$resultado[]=$f;
		}
		return $resultado;
	}


	//1.3.3. Crear Funciona ACTUALIZAR()
	public function upd_usu($id_usuario,$nombre_usuario, $apellido_usuario, $correo_electronico, $telefono_usuario, $contrasena, $id_perfil){
		$modelo = new conexion();
		$conexion = $modelo->get_conexion(); 
		$sql = "UPDATE usuario SET id_usuario=:idusunew,  nombre_usuario=:nombrenew, apellido_usuario=:apellidonew, correo_electronico=:correonew, telefono_usuario=:telnew,
		contrasena=:contrasenanew, id_perfil=:idperfilnew WHERE id_usuario=:idusunew";
		
		$result = $conexion->prepare($sql);
		
		$result->bindParam(':idusunew',$id_usuario);
	 	$result->bindParam(':nombrenew',$nombre_usuario);
	 	$result->bindParam(':apellidonew',$apellido_usuario);
	 	$result->bindParam(':correonew',$correo_electronico);
	 	$result->bindParam(':telnew',$telefono_usuario);
	 	$result->bindParam(':contrasenanew',$contrasena);
    	$result->bindParam(':idperfilnew',$id_perfil);

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
		$sql = "DELETE FROM usuario WHERE id_usuario=:idusunew;";
		$result = $conexion->prepare($sql);
		$result->bindParam(':idusunew',$id_usuario);

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
		$sql = "SELECT pefid, perfnom FROM perfil;";
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
		$sql = "SELECT id_usuario, nombre_usuario, apellido_usuario, correo_electronico, telefono_usuario, contrasena, id_perfil FROM usuario WHERE id_usuario=:idusunew;";
		$result = $conexion->prepare($sql);
		$result->bindParam(':idusunew', $id_usuario);
		$result->execute();
		while ($f1=$result->fetch()){
			$resultado1[]=$f1;
		}
		return $resultado1;
	}
	//... Crear función para conocer total_registro de la tabla
	public function selcount($filtro){
		$sql = 'SELECT COUNT(id_usuario) AS Npe FROM usuario';
		if($filtro){
			$filtro = '%'.$filtro.'%';
			$sql .= ' WHERE nombre_usuario LIKE "'.$filtro.'";';
		}
		//Echo sql;
		return $sql;
	}
	//...
}
?>