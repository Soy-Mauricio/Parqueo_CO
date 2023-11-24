<?php 
//1.2. Incluimos nuestra conexión y modelo 
	include ("modelo/conexion.php");
	include ("modelo/musu.php");

		//Incluimos nuetro metodo de paginacion
		require_once('modelo/mpagina.php');
		//Facilidad a la hora de direccionar paginación en la que visualizaremos el resultado.(Filtro)
		$pg = 101;
		//variable . $arc
		$arc = "home.php";


	//1.3. Instanciamos el modelo a variable php
	$musu = new musu();

	//Declaracion de variable filtro php que nos servira para paginar
	$filtro = isset ($_GET['filtro']) ? $_GET['filtro']:NULL;

	//1.3.1. Creamos las Variables PHP para capturar los datos del Formulario
	// isset() es una función de PHP que devuelve true si la variable o elemento del arreglo existe y tiene un valor distinto de null.
	$id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario']:NULL;
	if (!$id_usuario)
		$id_usuario = isset($_GET['id_usuario']) ? $_GET['id_usuario']:NULL;

	$nombre_usuario = isset($_POST['nombre_usuario']) ? $_POST['nombre_usuario']:NULL; //cada una de estas sentencias ayudan a saber si existe una entrada con la variable distinta de NULL, y usa el operador ternario para que si se cumple ejecute lo de la derecha sino salte después de los :
	$apellido_usuario = isset($_POST['apellido_usuario']) ? $_POST['apellido_usuario']:NULL;
	$correo_electronico = isset($_POST['correo_electronico']) ? $_POST['correo_electronico']:NULL;
	$telefono_usuario = isset($_POST['telefono_usuario']) ? $_POST['telefono_usuario']:NULL;
	$contrasena = isset($_POST['contrasena']) ? $_POST['contrasena']:NULL;
	
	
	
	//1.3.1.1. Encriptamos Contraseña
	$contra = sha1(md5($contrasena));
	$contrasena = $contra;
	$id_perfil = isset($_POST['id_perfil']) ? $_POST['id_perfil']:NULL;

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
		if($id_usuario AND $nombre_usuario AND $apellido_usuario AND $correo_electronico AND $telefono_usuario AND $contrasena AND $id_perfil){
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

	//Paginación 
	$bo = '';
	//Variable numero de registros a mostrar
	$nreg = 2;
	//Crea un objeto [pa] que se instanciara la clase [mpagina.php]
	$pa = new mpagina();
	$preg = $pa->mpagin($nreg);
	
	//Variable de cant_num_registros
	$conp = $musu->selcount($filtro);

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
							$txt .= 'Correo';
						$txt .= '</th>';
						//2da Cabecera normal (<td>)
						$txt .= '<td>';
							$txt .= '<input required class="form-control" type="email" name="correo_electronico" maxlength="50" value="';
						if ($id_usuario)
						$txt .= $result1[0]["correo_electronico"];
						$txt .= '"/>';
						$txt .= '</td>';
					//4ta Fila Cierres
					$txt .= '</tr>';
          
					//5ta Filas (<tr>)
					$txt .= '<tr>';
						//1ra Cabeceras Negrita (<th>)
						$txt .= '<th align="left">';
							$txt .= 'Telefono:';
						$txt .= '</th>';
						//2da Cabecera normal (<td>)
						$txt .= '<td>';
							$txt .= '<input required class="form-control" type="text" name="telefono_usuario" maxlength="50" value="';
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
							$txt .= 'Contraseña';
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
							$txt .= '<option value="'.$f['pefid'].'" ';
							if($id_usuario){
							if($f['pefid'] and $f['pefid']==$result1[0]["id_perfil"])
								$txt .="SELECTED";
							$txt .= ' >'.$f['perfnom'].'</option>';
						}
						$txt .= "SELECTED";
							$txt .= '>' .$f['perfnom']. '</option>';
						}
						$txt .= '</select>';
					$txt .= '</td>';
					//7ta Fila Cierretr
					$txt .= '</tr>';

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
	function tabla_mostrar($conp, $nreg, $pg, $bo,$filtro, $arc){
		$musu = new musu();

		$pa = new mpagina();
		$txt = '';
		// Creamos el cuadro de buscar  (filtros-Busquedas)
		$txt .= '<table class= "table">';
			//Una fila
			$txt .= "<tr>";
				$txt .= "<td>";
					//1ra columna - Formulario buscar
					$txt .= "<form name='forfil' method='GET' action='".$arc."'>";
						$txt .= "<input type='hidden' name='pg' value='".$pg."'/>";
						//Campo de texto para escribir el dato a buscar
						$txt .= "Buscar:<input type ='text' name='filtro' value='".$filtro."' placeholder='Nombre del usuario' onChage='this.form.submit();'/>";
					$txt .="</form>";
				$txt .= "</td>";
				//2da Columna control de paginación
				$txt .= "<td align='right';>";
					$bo = "<input type='hidden' name='filtro' value='".$filtro."'/>";
					//Llamamos el metodo de contar la cantidad de paginas
					$txt .= $pa->spag($conp, $nreg, $pg, $bo, $arc);
					//Llamar los datos para completar la paginación
					$result = $musu->sel_usu($filtro,$pa->rvalini(),$pa->rvalfin());
				$txt .= "</td>";
			//Cierre Fila
			$txt .="</tr>";
		$txt .="</table>";

		if($result){
		$txt .= '<div class="table-responsive-md">';
			$txt .= '<table class="table" width="100%" cellspacing="0px" align="center">';
				//Inicio de la (Cabecera_Tb)			
				$txt .= '<tr>';
					$txt .= '<th>';
						$txt .= 'Id';
					$txt .= '</th>';
					$txt .= '<th>';
						$txt .= 'Nombre(s)';
					$txt .= '</th>';
					$txt .= '<th>';
						$txt .= 'Apellido(s)';
					$txt .= '</th>';
					$txt .= '<th>';
						$txt .= 'Correo';
					$txt .= '</th>';
					$txt .= '<th>';
						$txt .= 'Telefono';
					$txt .= '</th>';
					$txt .= '<th>';
						$txt .= 'Contraseña';
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
						Actualizar</a></td>';
					//ICONOS-Eliminar (Boton)
					$txt .= '<td align="center"><a href="home.php?pg=101&del='.$f["id_usuario"].'">
						Eliminar</a></td>';
				//Cierre ROW - Datos de la tabla
				$txt .= '</tr>';
				}
			$txt .= '</table>';
		$txt .= '</div>';
		}

		else{
			$txt .='<div>';
			$txt .='<h3>No existen datos registrados en la base de datos</h3>';
			$txt .='</div>';
		}

		echo $txt;
		
	}

?>