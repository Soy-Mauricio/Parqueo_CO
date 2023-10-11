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
                    <div class="card bg-dark text-white" style="border-radius: 1rem; height: 820px">
                        <div class="card-body p-5 text-center">
            
                            <div class="mb-md-5 mt-md-4 pb-5">
                
                                <h2 class="fw-bold mb-2 text-uppercase">Registrate</h2>
                                <p class="text-white-50 mb-5">Por favor ingresa tus datos!</p>
                
                                <div class="form-outline form-white mb-4">
                                <input type="email" id="typeEmailX" name="user" placeholder="Nombres" class="form-control form-control-lg" />
                                </div>
                
                                <div class="form-outline form-white mb-4">
                                <input type="text" id="typeTextX" name="pass" placeholder="Apellidos" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline form-white mb-4">
                                <input type="text" id="typeTextX" name="pass" placeholder="Correo Electronico" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline form-white mb-4">
                                <input type="text" id="typeTextX" name="pass" placeholder="Teléfono" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline form-white mb-4">
                                <input type="password" id="typePasswordX" name="pass" placeholder="Contraseña" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline form-white mb-4">
                                <input type="password" id="typePasswordX" name="pass" placeholder="Confirma Contraseña" class="form-control form-control-lg" />
                                </div>

                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Registrate</button>
                

                            </div>
                
                            <div>
                                <p class="mb-0">¿Ya tienes cuenta? <a href="/iniciarsesion.php" class="text-white-50 fw-bold">Inicia Sesión</a></p>
                            </div>
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>