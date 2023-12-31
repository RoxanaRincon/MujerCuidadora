<!DOCTYPE html>
<html lang="es">
<head>
     <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/r-2.5.0/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.6/r-2.5.0/datatables.min.js"></script>


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/r-2.5.0/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.6/r-2.5.0/datatables.min.js"></script>


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>


    <link rel='stylesheet' type='text/css' media='screen' href='css/mapa2.css'>
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    
</head>
<body id="body-pd">
    <header style="position:relative; height:60px" class="header" id="header">
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
                            <a class="nav-link" href="../vista/login.php">Salir</a>
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
    <br>
    <center>
        <h1 style="font-weight: bold; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">ESTAS SON NUESTRAS MANZANAS</h1>
    </center>

    <!-- Contenido principal -->
    <div class="main-content-fluid">



<div id="map"></div>

    

    

<br><br>
<div class="row">
            <div class="col-md-4">
                <h3>Mapa Manzana Antonio Nariño</h3>
                <img class="scale-with-grid" src="https://manzanasdelcuidado.gov.co/wp-content/uploads/2023/08/map-manz-anton_.svg" alt="Mapa Manzana Antonio Nariño" width="" height="">
            </div>
            <div class="col-md-4">
                <h3>Manzana Teusaquillo</h3>
                <img class="scale-with-grid" src="https://manzanasdelcuidado.gov.co/wp-content/uploads/2023/07/map-manz-teu_.svg" alt="Mapa Manzana Teusaquillo" width="" height="">
            </div>
            <div class="col-md-4">
                <h3>Manzana Puente Aranda</h3>
                <img class="scale-with-grid" src="https://manzanasdelcuidado.gov.co/wp-content/uploads/2023/07/map-manz-pua_.svg" alt="Mapa Manzana Puente Aranda" width="" height="">
            </div>
            <div class="col-md-4">
                <h3>Manzana Suba - Fontanar del Rio</h3>
                <img class="scale-with-grid" src="https://manzanasdelcuidado.gov.co/wp-content/uploads/2023/07/map-manz-su_.svg" alt="Mapa Manzana Suba - Fontanar del Rio" width="" height="">
            </div>
            <div class="col-md-4">
                <h3>Manzana Fontibón</h3>
                <img class="scale-with-grid" src="https://manzanasdelcuidado.gov.co/wp-content/uploads/2023/07/map-manz-fo_.svg" alt="Mapa Manzana Fontibón" width="" height="">
            </div>
            <div class="col-md-4">
                <h3>Manzana Chapinero</h3>
                <img class="scale-with-grid" src="https://manzanasdelcuidado.gov.co/wp-content/uploads/2023/07/map-manz-cha_.svg" alt="Mapa Manzana Chapinero" width="" height="">
            </div>
        </div>
      
    
    </div>

    <div>
        <footer class="new_footer_area bg_color">
            <div class="new_footer_top">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-3 col-md-6">
                            <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                                <h3 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; letter-spacing: 0.05em;" class="f-title f_600 t_color f_size_18">Para las mujeres
                                    y personas
                                    cuidadoras</h3>
                                <ul class="list-unstyled f_list">
                                    <li><a href="#">Educacion flexible para terminar primaria y bachillerato</a></li>
                                    <li><a href="#">Taller educacion socio-ocupacional</a></li>
                                    <li><a href="#">Cursos en alianza con el SENA</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                                <h3 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; letter-spacing: 0.05em;" class="f-title f_600 t_color f_size_18">Para quienes
                                    requieren cuidado
                                    o apoyo</h3>
                                <ul class="list-unstyled f_list">
                                    <li><a href="#">Refuerzo</a></li>
                                    <li><a href="#">El arte de cuidarte</a></li>
                                    <li><a href="#">Dupla de recreacion</a></li>
                                    <li><a href="#">Taleres y muestras de danza</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                                <h3 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; letter-spacing: 0.05em;" class="f-title f_600 t_color f_size_18">Para las familias
                                    y la ciudadanía
                                    en general</h3>
                                <ul class="list-unstyled f_list">
                                    <li><a href="#">Taller ¡A cuidar se aprende!</a></li>
                                    <li><a href="#">Taller ¡Cuidemos a los que nos cuidan!</a></li>
                                    <li><a href="#">Sala de lectura</a></li>
                            </div>
                        </div>                        
                        <div class="col-lg-3 col-md-6">
                            <div class="f_widget social-widget pl_70 wow fadeInLeft" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                                <h3 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; letter-spacing: 0.05em;" class="f-title f_600 t_color f_size_18">Conocenos En!</h3>
                                <div class="f_social_icon">
                                    <a href="https://www.facebook.com/secredistmujer/" class="fab fa-facebook"><img src="./imagenes/facebook.png" alt=""></a>
                                    <a href="https://www.instagram.com/sdmujerbogota/" class="fab fa-twitter"><img src="./imagenes/instagram.png" alt=""></a>
                                    <a href="https://www.youtube.com/@SDMujer" class="fab fa-linkedin"><img src="./imagenes/youtube.png" alt=""></a>
                                    <a href="https://www.tiktok.com/@secredistmujer" class="fab fa-pinterest"><img src="./imagenes/tik-tok.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer_bg">
                    <div class="footer_bg_one"></div>
                    <div class="footer_bg_two"></div>
                </div>
            </div>
            <div class="footer_bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-7">
                            <p class="mb-0 f_400">© 2023 Manzanas del cuidado  -Todos los derechos reservados.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="js/mapa.js"></script>
</body>
</html>


