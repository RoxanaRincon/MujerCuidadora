<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENA - Control de Competencias</title>
    <!-- Enlaces CDN de Bootstrap, jQuery y Boxicons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <script src="js/mapa.js"></script>
    
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
            <a class="navbar-brand" href="#">
            <img src="https://manzanasdelcuidado.gov.co/wp-content/uploads/2023/09/logo-manz-AntNar_.svg" alt="Manzanas del Cuidado" width="100" height="100">          
        </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="../vista/manzanas.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Manzanas del cuidado
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../vista/mujercuidadora.php"> Mujer cuidadora </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../vista/manzanas.php">Mnazanas de cuidado</a>
                        </div>
                </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Servicios
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../vista/establecimiento.php">Gestionar Establecimientos</a>
                        <a class="dropdown-item" href="../vista/propuesta.php">Radicar Propuesta de asistencia</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../vista/municipios.php">Gestionar Municipios</a>
                        <a class="dropdown-item" href="../vista/servicios.php">Gestionar Servicios</a>
                        </div>
                        
                    </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../vista/contacto.php">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="header_img"> <img src="https://manzanasdelcuidado.gov.co/wp-content/uploads/2023/06/logo-simbolo-mc_.svg" alt=""> </div>
   
   
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">BBBootstrap</span> </a>
                <div class="nav_list"> 
                    <a href="#" class="nav_link active"> 
                        <i class='bx bx-grid-alt nav_icon'></i>
                         <span class="nav_name">Parametricas</span> </a> 
                         <a href="#" class="nav_link"> 
                            <i class='bx bx-user nav_icon'></i>
                          <span class="nav_name">Usuarios</span> </a> 
                                    <a href="../vista/usuario.php" class="nav_link"> 
                                        <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
                                        <span class="nav_name">Reportes</span> </a> 
                                            <a href="../vista/municipios.php" class="nav_link"> 
                                            <i class='bx bx-map nav_icon'></i>
                                            <span class="nav_name">Ubicación</span>
                                        </a>
                                    </div>
            </div> <a href="#" class="nav_link"> 
                <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!-- Contenido principal -->
    <div class="main-content">
        <div class="container">
        <div class="row mt-4">
                <div class="col-md-6 offset-md-3">
                    <h2></h2>
                    <form id="formularioAgregarMunicipio">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="localidad">Localidad:</label>
                            <input type="text" class="form-control" id="localidad" required>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección:</label>
                            <input type="text" class="form-control" id="direccion" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Agregar Municipio</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Pie de página -->
    <footer class="footer text-center">
        <div class="container">
            © 2023 SENA
        </div>
    </footer>
    <script src="js/main.js"></script>

    
</body>
</html>


