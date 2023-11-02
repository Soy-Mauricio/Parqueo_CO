<?php 
  require_once('modelo/mseguridad.php');
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <title>Parqueo.CO</title>
</head>
<body>
    
  <div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">

          <a class="navbar-brand" href="home.php"><img src="/img/LOGO Parqueo.CO.jpeg" alt="" style="width: 50px;"></a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <?php require_once("vista/menuhome.php")?>

        </div>
    </nav>


    <?PHP 
	    require_once("home.php");
            $pg = isset($_GET["pg"]) ? $_GET["pg"]:NULL;
            if(!$pg) 
                require_once("vista/contenidohome.php");

            if($pg=="101") 
                require_once("vista/vusu.php");

            if($pg=="102") 
            require_once("vista/vperfil.php");

            if($pg=="103") 
            require_once("vista/vreservas.php");

            if($pg=="104") 
            require_once("vista/vfavoritos.php");

            if($pg=="150") 
            require_once("vista/vsalir.php");

            ?>
  </div> 

  <script src="js/bootstrap.bundle.min.js"></script>
    

</body>
</html>