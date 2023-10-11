<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">

        <a class="navbar-brand" href="/index.php"><img src="/img/LOGO Parqueo.CO.jpeg" alt="" style="width: 50px;">Parqueo.CO</a>
    </div>
</nav>


<form action="modelo/valida.php" method="POST">

    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
            
                            <div class="mb-md-5 mt-md-4 pb-5">
                
                                <h2 class="fw-bold mb-2 text-uppercase">Iniciar Sesión</h2>
                                <p class="text-white-50 mb-5">Por favor ingresa tu usuario y contraseña!</p>
                
                                <div class="form-outline form-white mb-4">
                                <input type="email" id="typeEmailX" name="user" placeholder="Correo electronico" class="form-control form-control-lg" />
                                </div>
                
                                <div class="form-outline form-white mb-4">
                                <input type="password" id="typePasswordX" name="pass" placeholder="Contraseña" class="form-control form-control-lg" />
                                </div>
                
                                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">¿Has olvidado la contraseña?</a></p>

                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Iniciar</button>
                
                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                <a href="#!" class="text-white"><svg style="color: rgb(204, 204, 204);" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                    <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                                </svg></a>
                                </div>

                                <?php
                                //Capturamos la variable php(URL-GET) – errorusuario que viene de nuestro archivo [valida.php]
                                $erroru = isset($_GET["errorusuario"]) ? $_GET["errorusuario"]:NULL;
                                if($erroru=="si"){ ?>
                                <label for="recordar" class="form-check-label">Usuario o contraseña incorrectos...</label>
                                <?php } ?>

                            </div>
                
                            <div>
                                <p class="mb-0">¿Aún no tienes cuenta? <a href="/registrate.php" class="text-white-50 fw-bold">Resgistrate</a></p>
                            </div>
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>