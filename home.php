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

          <a class="navbar-brand" href="#"><img src="/img/LOGO Parqueo.CO.jpeg" alt="" style="width: 50px;"></a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <?php require_once("vista/menuhome.php")?>

        </div>
    </nav>

    <div class="contenedor_uno">

      <div class="contenedor_dos">

        <div class="cuadro_uno">
          <form action="action_page" method="post">
            <label for="fname">Ingresa el destino</label>
            <input class="form-control" type="text" id="destino" name="destino" placeholder="Villavicencio">
          </form>
        </div>

        <div class="cuadro_dos">
          <form action="action_page" method="post">
            <label for="fname">Ida</label>
            <input class="form-control" type="text" id="origen" name="origen" placeholder="01/01/2023">
            <label for="lname">Vuelta</label>
            <input class="form-control" type="text" id="destino" name="destino" placeholder="01/01/2023">
          </form>
        </div>

        <div class="cuadro_tres">
          <form action="action_page" method="post">
            <label for="fname">Hora llegada</label>
            <input class="form-control" type="text" id="origen" name="origen" placeholder="11:15 AM">
            <label for="lname">Hola salida</label>
            <input class="form-control" type="text" id="destino" name="destino" placeholder="13:15 PM">
          </form>
        </div>

        <div class="cuadro_cuatro">
          <input class="btn btn-success" type="submit" value="Buscar" style="background-color: #FF3D00">
        </div>

      </div>

    </div>

    <div class="contenedor_tres">

    <?PHP 
	    require_once("vista/menuhome.php");
            $pg = isset($_GET["pg"]) ? $_GET["pg"]:NULL;
            if(!$pg) 
                require_once("home.php");
          
            if($pg=="101") 
                require_once("vista/vusu.php");

            if($pg=="102") 
                require_once("vista/vperfil.php");

            if($pg=="103") 
                require_once("vista/vreservas.php"); 
            if($pg=="104") 
                require_once("vista/vfavoritos.php"); 
            if($pg=="105") 
                require_once("vista/vconf.php"); 
            if($pg=="106") 
                require_once("vista/vdom.php"); 
            if($pg=="107") 
                require_once("vista/vval.php"); 
            if($pg=="108") 
                require_once("vista/vval.php");

            if($pg=="150") 
                require_once("vista/vsalir.php"); 
            ?>

    </div>

    <footer class="text-center text-lg-start bg-light text-muted">

      <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">

        <div class="me-5 d-none d-lg-block">
          <span style="color: black;">Siguenos en nuestras redes sociales:</span>
        </div>


        <div>
          <a href="" class="me-4 text-reset">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" style="color: rgb(48, 48, 48);" class="bi bi-facebook" viewBox="0 0 16 16">
              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
            </svg>
          </a>
          <a href="" class="me-4 text-reset">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" style="color: rgb(48, 48, 48);" class="bi bi-instagram" viewBox="0 0 16 16">
              <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
            </svg>
          </a>
          <a href="" class="me-4 text-reset">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" style="color: rgb(48, 48, 48);" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
              <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
            </svg>
          </a>
        </div>

        
      </section>


      <section class="pie_pagina">
        <div class="container text-center text-md-start mt-5">

          <div class="row mt-3">
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

              <h6 class="text-uppercase fw-bold mb-4">
                <i class="fas fa-gem me-3"></i>Parqueo.CO
              </h6>
              <p style="color: black;">
                Somos una empresa dedicada a la busqueda de parqueaderos en ciudades de Colombia
              </p>

            </div>


            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

              <h6 class="text-uppercase fw-bold mb-4">
                Mi Cuenta
              </h6>
              <p style="color: black;">
                <a href="#!" class="text-reset">Mi perfil</a>
              </p>
              <p style="color: black;">
                <a href="#!" class="text-reset">Historial <br> de parqueaderos</a>
              </p>

            </div>


            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

              <h6 class="text-uppercase fw-bold mb-4">
                Descuentos
              </h6>
              <p style="color: black;">
                <a href="#!" class="text-reset">Codigo promocional</a>
              </p>
              <p style="color: black;">
                <a href="#!" class="text-reset">20% de Descuentos</a>
              </p>

            </div>


            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

              <h6 class="text-uppercase fw-bold mb-4">Contactanos</h6>

              <p style="color: black;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
              </svg></i> +57 234-567-88</p>
              <p style="color: black;">
                <a href="#!" class="text-reset"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                  <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                </svg> Quejas y Reclamos</a>
            </p>
            </div>

          </div>
        </div>
      </section>

      <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2023 Copyright:
        <a class="text-reset fw-bold" href="#!">Parqueo.CO.com</a>
      </div>

    </footer>

  </div> 

  <script src="js/bootstrap.bundle.min.js"></script>
    

</body>
</html>