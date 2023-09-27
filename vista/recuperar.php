<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Agrega tus enlaces CSS aquí -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/r-2.5.0/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.6/r-2.5.0/datatables.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/mapa.css'>
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    


</head>
<body>
   <div id="map-container">
        <!-- Aquí colocamos el mapa -->
        <div id="map">


</div>

    </div>

    <div id="login-container">
    <!-- Aquí colocamos el formulario de inicio de sesión y registro -->
    <div id="boxIngreso" class="box" >
        <span class="liner"></span>
        <form id="formLogin">
            <h1>RECUPERAR CONTRASEÑA </h1>
            
            <div class="inputBox">
                <span>Usuario:</span>
                <input id="correoidfrm"  name="correoFrm"  type="email" required="required">
            </div>
            <div class="buttons">
                <button id="correo" type="submit" disabled class="btn btn-primary">
                    <span class="bi bi-envelope" ></span> ENVIAR CORREO
                </button>
                <button id="preguntas" type="button" class="btn btn-secondary">
                    <span class="bi bi-question"></span> PREGUNTAS DE SEGURIDAD
                </button>
            </div>
            <div class="alert alert-danger" role="alert">
                <strong>Atención:</strong> Sistema de correos temporalmente inactivo, por favor utilice la opción "preguntas de seguridad".
            </div>
    </div>
</div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <script src="js/login.js"></script>
    <script src="js/usuario.js"></script>
    <script src="js/mapa.js"></script>

</body>
</html>