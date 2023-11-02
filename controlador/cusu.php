<?php
	//1.2. Incluimos nuestra conexión y modelo 
    include("modelo/conexion.php");
    include("modelo/musu.php");
    

    //1.3. Instanciamos el modelo a variable php
	$musu = new musu();

    //1.3.1. Creamos las Variables PHP para capturar los datos del Formulario
	$id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario']:NULL;
	if (!$id_usuario)
	$id_usuario = isset($_GET['id_usuario']) ? $_GET['id_usuario']:NULL;
	$nombre_usuario = isset($_POST['nombre_usuario']) ? $_POST['nombre_usuario']:NULL;
	$apellido_usuario = isset($_POST['apellido_usuario']) ? $_POST['apellido_usuario']:NULL;
	$correo_electronico = isset($_GET['correo_electronico']) ? $_GET['correo_electronico']:NULL;
	$telefono_usuario = isset($_POST['telefono_usuario']) ? $_POST['telefono_usuario']:NULL;
	$contrasena = isset($_POST['contrasena']) ? $_POST['contrasena']:NULL;

    //1.3.1.1. Encriptamos Contraseña
	$contra = sha1(md5($contrasena));
	$contrasena = $contra;
	$foto_usuario = isset($_POST['id_perfil']) ? $_POST['id_perfil']:NULL;

	//1.3.2. Capturamos la acción (C-U-D) metodo - POST(Form)
	$opera = isset($_POST['operacion']) ? $_POST['operacion']:NULL;
	$del = isset($_POST['del']) ? $_POST['del']:NULL;
	//capturamos la accion (C-U-D) metodo - GET(URL)
	$del = isset($_GET['del']) ? $_GET['del']:NULL;
	$opera = isset($_POST['operacion']) ? $_POST['operacion']:NULL;

	//1.4. Validamos el tipo de operación (Accion (Evento_Vista))

    //1.4.1. Inserción
	if($opera=="Insertar"){
		//Validamos si la variables (PHP) estan llenas y las enviamos al nuestro objeto -> método(parámetros)
		if($id_usuario AND $nombre_usuario AND $apellido_usuario AND $correo_electronico AND $telefono_usuario AND $contrasena AND $id_perfil){
			$musu->ins_usu($id_usuario, $nombre_usuario, $apellido_usuario, $correo_electronico, $telefono_usuario, $contrasena, $id_perfil);
		}
		$id_usuario ="";
		$opera ="";	
		$del ="";
	}
	//1.4.2. Actualizar
	if($opera=="Actualizar"){
		//Validamos si la var(PHP) estan llenas y las enviamos al nuestro objeto -> metodo(parametros)
		if($id_usuario AND $nombre_usuario AND $apellido_usuario AND $correo_electronico  AND $telefono_usuario AND $contrasena AND $id_perfil){
			$musu->upd_usu($id_usuario, $nombre_usuario, $apellido_usuario, $correo_electronico, $telefono_usuario, $contrasena, $id_perfil);
		}	
		$id_usuario ="";
		$opera ="";
		$del ="";
	}
	//1.4.3. Eliminar
	if($del){		
		$musu->del_usu($del);
		$id_usuario ="";
		$opera ="";	
		$del ="";
	}

    /*1.5. Creamos la función de nuestra vista (HTML) que se cargara en (vtab.php)*/
	function form_registro($id_usuario){
		//Llamamos nuestra modelo (Objeto) e instacionamos 
	    $musu = new musu();
	    	//Listamos nuetros perfiles de nuestro Sistemas para seleccionarlos
			$result = $musu->list_Perfil();
			//Llamamos la consulta de cargar de datos de nuestro user a atualizar(Tabla)
			$result1 = $musu->sel_usu_act($id_usuario);

		// 1.5.1. Creamos nuestro Formulario, en tabla (Columnas y Filas)
		$txt = ''; 
		$txt .= '<div style="margin: auto;">';
			$txt .= '<form action="#" method="POST">';
				$txt .= '<table class="table-secondary">'; // Clase (table) para uso de Bootstrap (Responsibe) https://getbootstrap.com/docs/5.0/content/tables/
					//1raFilas (<tr>)
					$txt .= '<tr>';
						//1ra Cabeceras Negrita (<th>)
						$txt .= '<th align="left">';
							$txt .= 'Id:';
						$txt .= '</th>';
						//2da Cabecera normal (<td>)
						$txt .= '<td>';
							$txt .= '<input required class="form-control" type="number" name="id_usuario" max="999999999999" value="'.$id_usuario.'"/>';
						$txt .= '</td>';
					//1ra Fila Cierre
					$txt .= '</tr>';
					//2da Filas (<tr>)
					$txt .= '<tr>';
						//1ra Cabeceras Negrita (<th>)
						$txt .= '<th align="left">';
							$txt .= 'Nombre:';
						$txt .= '</th>';
						//2da Cabecera normal (<td>)
						$txt .= '<td>';
							$txt .= '<input required class="form-control" type="text" name="nombre_usuario" maxlength="50" value="';
						if ($id_usuario)
						$txt .= $result1[0]["nombre_usuario"];
						$txt .= '"/>';
						$txt .= '</td>';
					//2da Fila Cierre
					$txt .= '</tr>';
					//3ra Filas (<tr>)
					$txt .= '<tr>';
						//1ra Cabeceras Negrita (<th>)
						$txt .= '<th align="left">';
							$txt .= 'Apellido:';
						$txt .= '</th>';
						//2da Cabecera normal (<td>)
						$txt .= '<td>';
							$txt .= '<input required class="form-control" type="text" name="apellido_usuario" maxlength="50" value="';
						if ($id_usuario)
						$txt .= $result1[0]["apellido_usuario"];
						$txt .= '"/>';
						$txt .= '</td>';
					//3ra Fila Cierre
					$txt .= '</tr>';
					//4ta Filas (<tr>)
					$txt .= '<tr>';
						//1ra Cabeceras Negrita (<th>)
						$txt .= '<th align="left">';
							$txt .= 'E-mail:';
						$txt .= '</th>';
						//2da Cabecera normal (<td>)
						$txt .= '<td>';
							$txt .= '<input required class="form-control" type="email" name="correo_electronico" maxlength="50" value="';
						if ($id_usuario)
						$txt .= $result1[0]["correo_electronico"];
						$txt .= '"/>';
						$txt .= '</td>';
					//4ta Fila Cierre
					$txt .= '</tr>';
					//5ta Filas (<tr>)
					$txt .= '<tr>';
						//1ra Cabeceras Negrita (<th>)
						$txt .= '<th align="left">';
							$txt .= 'Tel:';
						$txt .= '</th>';
						//2da Cabecera normal (<td>)
						$txt .= '<td>';
							$txt .= '<input required class="form-control" type="number" name="telefono_usuario" maxlength="20" value="';
						if ($id_usuario)
						$txt .= $result1[0]["telefono_usuario"];
						$txt .= '"/>';
						$txt .= '</td>';
					//5ta Fila Cierre
					$txt .= '</tr>';
					//6ta Filas (<tr>)
					$txt .= '<tr>';
						//1ra Cabeceras Negrita (<th>)
						$txt .= '<th align="left">';
							$txt .= 'contraseña:';
						$txt .= '</th>';
						//2da Cabecera normal (<td>)
						$txt .= '<td>';
							$txt .= '<input required class="form-control" type="password" name="contrasena" maxlength="50" value="';
						if ($id_usuario)
						$txt .= $result1[0]["contrasena"];
						$txt .= '"/>';
						$txt .= '</td>';
					//6ta Fila Cierre
					$txt .= '</tr>';
					//7ta Fila Inicio (tr)
					$txt .= '<tr>';
					$txt .= '<th align="left">';
						$txt .= 'Perfil: ';
						//$txt .= $result[0]["id_perfil"];
					$txt .= '</th>';
					$txt .= '<td>';
						$txt .= '<select class="form-select" name="id_perfil">';
						foreach ($result as $f) {
							$txt .= '<option value="'.$f['perfid'].'" ';
							if($f['perfid'] and $f['perfid']==$result1[0]["id_perfil"])
								$txt .="SELECTED";
							$txt .= ' >'.$f['perfnom'].'</option>';
						}
						$txt .= '</select>';
					$txt .= '</td>';
					//7ta Fila Cierre

					//Insertamos el Boton Centrado
					$txt .= '<tr>';
					$txt .= '<th colspan="2" style="text-align: center;">';
						$txt .= '<input class="btn btn-success" type="submit" name="operacion" value="';
						if ($id_usuario)
							$txt .= 'Actualizar';
						else
							$txt .= 'Insertar';
					$txt .= '" />';
					//Cierre Boton
					$txt .= '</tr>';
				//Cierre Tabla	
				$txt .= '</table>';
			//Cierre Formulario	
			$txt .= '</form>';
		//Cierre Etiqueta DIV	
		$txt .= '</div>';
		//Imprimimos el Formulario(Vista)
		echo $txt;
	}

    /*1.6. Creamos la función de nuestra vista (HTML) Listar_Registro*/
	function tabla_mostrar(){
		$musu = new musu();
		$result = $musu->sel_usu();
		$txt = '';
		$txt .= '<div class="table-responsive-md">';
			$txt .= '<table class="table" width="100%" cellspacing="0px" align="center">';
				//Inicio de la (Cabecera_Tb)			
				$txt .= '<tr>';
					$txt .= '<th>';
						$txt .= 'ID';
					$txt .= '</th>';
					$txt .= '<th>';
						$txt .= 'Nombre(s)';
					$txt .= '</th>';
					$txt .= '<th>';
						$txt .= 'Apellido(s)';
					$txt .= '</th>';
					$txt .= '<th>';
						$txt .= 'E-mail';
					$txt .= '</th>';
					$txt .= '<th>';
					$txt .= 'Telefono';
				$txt .= '</th>';
					$txt .= '<th>';
						$txt .= 'Password';
					$txt .= '</th>';
					$txt .= '<th>';
						$txt .= 'Perfil';
					$txt .= '</th>';
					$txt .= '<th>Actualizar</th>';
					$txt .= '<th>Eliminar</th>';
				$txt .= '</tr>';
				//Cierre de la (Cabecera_Tb)
				foreach ($result as $f) {
				//Inicio ROW - Datos de la tabla
				$txt .= '<tr>';
					$txt .= '<td align="center">';	
						$txt .= $f["id_usuario"];
					$txt .= '</td>';
					$txt .= '<td align="center">';	
						$txt .= $f["nombre_usuario"];
					$txt .= '</td>';
					$txt .= '<td align="center">';	
						$txt .= $f["apellido_usuario"];
					$txt .= '</td>';
					$txt .= '<td align="center">';	
						$txt .= $f["correo_electronico"];
					$txt .= '</td>';
					$txt .= '<td align="center">';	
						$txt .= $f["telefono_usuario"];
					$txt .= '</td>';
					$txt .= '<td align="center">';	
						$txt .= $f["contrasena"];
					$txt .= '</td>';
					$txt .= '<td align="center">';	
						$txt .= $f["id_perfil"];
					$txt .= '</td>';
					//ICONOS-MOdificar (Boton)
					$txt .= '<td align="center"><a href="home.php?pg=101&id_usuario='.$f["id_usuario"].'">
						<img src="img/new.png" title="Actualizar"</a></td>';
					//ICONOS-Eliminar (Boton)
					$txt .= '<td align="center"><a href="../vista/vusu.php=&del='.$f["id_usuario"].'">
						<img src="img/trash.png" title="Eliminar"</a></td>';
				//Cierre ROW - Datos de la tabla
				$txt .= '</tr>';
				}
			$txt .= '</table>';
		$txt .= '</div>';
		echo $txt;
	}
?>