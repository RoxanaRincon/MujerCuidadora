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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
   
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <!-- <script src="js/mapa.js"></script> -->
    
</head>
<body id="body-pd">
    <header style="position: relative; height:60px" class="header" id="header">
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
                        <a class="dropdown-item" href="../vista/manzanas.php">Manzanas de cuidado</a>
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
                         <a href="../vista/usuario.php" class="nav_link"> 
                            <i class='bx bx-user nav_icon'></i>
                          <span class="nav_name">Usuarios</span> </a> 
                                    <a href="../vista/usuario.php" class="nav_link"> 
                                        <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
                                        <span class="nav_name">Reportes</span> </a> 
                                            <a href="../vista/manzanas.php" class="nav_link"> 
                                            <i class='bx bx-map nav_icon'></i>
                                            <span class="nav_name">Ubicación</span>
                                        </a>
                                    </div>
            </div> <a href="#" class="nav_link"> 
                <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!-- Contenido principal -->
    <div class="main-content-fluid">
        <div class="container">
        <h1 class="text-center">Gestión de Servicios</h1>
        <!-- Botón para agregar un nuevo servicio -->
        <button type="button" data-toggle="modal" data-target="#servicioModal" class="btn btn-primary mb-3" id="agregarServicio">Agregar Servicio</button>

        <!-- Tabla para mostrar la lista de servicios -->
        <table id="tablaServicios" class="table table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Tipo Categoria</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí puedes cargar dinámicamente la lista de servicios desde la base de datos utilizando AJAX -->
                <!-- Cada servicio se mostrará como una fila en la tabla -->
            </tbody>
        </table>
    </div>

    

    <!-- Modal para agregar/editar servicio -->
    <div class="modal fade" id="servicioModal" tabindex="-1" role="dialog" aria-labelledby="servicioModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="servicioModalLabel">Agregar Servicio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para agregar/editar servicio -->
                    <form id="servicioForm">
                        <input type="hidden" id="ServicioID" name="ServicioID" value="0">
                        <div class="form-group">
                            <label for="Codigo">Código:</label>
                            <input  style="background-color: transparent; border-color:black;" type="text" class="form-control" id="Codigo" name="Codigo" required>
                        </div>
                        <div class="form-group">
                            <label for="Nombre">Nombre:</label>
                            <input style="background-color: transparent; border-color:black;" type="text" class="form-control" id="Nombre" name="Nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="Descripcion">Descripción:</label>
                            <textarea style="background-color: transparent; border-color:black;" class="form-control" id="Descripcion" name="Descripcion"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Descripcion">Categoria:</label>
                            <select style="background-color: transparent; border-color:black;" class="form-select" name="sltCategoria" id="sltCategoria">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Descripcion">Tipo Servicio:</label>
                            <select style="background-color: transparent; border-color:black;" class="form-select" name="sltTipoServicio" id="sltTipoServicio">>
                                
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarServicio">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    
    </div>
    <script src="./js/servicio.js"></script>
    <script src="./js/main.js"></script>

    
</body>
</html>


