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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    


</head>
<body style="background: #DAD8DE;">

<div id="login-container">
        <!-- Aquí colocamos el formulario de inicio de sesión y registro -->
        <div id="ingresoMol" class="row">
            <div class="col-md-6">
                <div id="boxIngreso" class="box" >
                    <span class="liner"></span>
                    <form id="formLogin">
                        <h2>INICIAR SESION</h2>
                        <center>
                            <img style="width:100px" src="./imagenes/logoMAnzana.png" alt="">
                        </center>
                        
                        <div class="inputBox">
                            <span>Usuario:</span>
                            <input id="correoidfrm"  name="correoFrm"  type="email" required="required">
                        </div>
                        <div class="inputBox">
                            <span>Contraseña:</span>
                            <input id="contrasenaidfrm" name="contrasenaFrm"  type="password" required="required">
                        </div>
                        <div class="buttons">
                            <input id="ingresar" type="submit" value="INGRESAR">
                            <input id="registro" type="button" value="REGISTRAR">
                            
                        </div>
                        <a  href="../vista/recuperar.php" >¿Olvidaste tu contraseña?</a>
                    </form>

            
                </div>
           </div>
           <div class="col-md-6">
            <img style="margin-left:170px; margin-top:40px" src="./imagenes/imagenLogin.jpg" alt="">
           </div>
     </div>
    
    
    <div id= "registroMol" style="display:none" class="row">
        <div class="col-md-6">
                <div id="boxRegistro" class="boxRegistro" style="display: none;">
            <span class="liner"></span>
            <form id="formRegistro">
            <h2>REGISTRARME</h2>
            <div class="inputBox">
                <span>Email:</span>
                <input id="correoregistroid" name="guardarCorreo" type="email" required="required">
            </div>
            <div class="inputBox">
                <span>Contraseña:</span>
                <input id="contrasenaregistroid" name="guardarContrasena" type="password" required="required">
            </div>

            <!-- Agregar campos de selección para preguntas de seguridad -->
            <div class="inputBox">
                <span>Pregunta de seguridad 1:</span>
                <select style="background-color: transparent; border-color:black;" class="form-select" id="preguntaSeguridad1" name="preguntaSeguridad1" required="required">
                <option value="¿Cuál es tu comida favorita?">¿Cuál es tu comida favorita?</option>
                    <option value="¿Cuál es el nombre de tu mejor amigo de la infancia?">¿Cuál es el nombre de tu mejor amigo de la infancia?</option>
                    <option value="¿Cuál es tu hobby favorito?">¿Cuál es tu hobby favorito?</option>
                    <option value="¿En qué lugar de vacaciones te sentiste más feliz?">¿En qué lugar de vacaciones te sentiste más feliz?</option>
                    <!-- Agrega más opciones según tus necesidades -->
                </select>
            </div>
            <div class="inputBox">
                <span>Respuesta 1:</span>
                <input id="respuestaSeguridad1" name="respuestaSeguridad1" type="text" required="required">
            </div>

            <div class="inputBox">
                <span>Pregunta de seguridad 2:</span>
                <select class="form-select" style="background-color: transparent; border-color:black;" id="preguntaSeguridad2" name="preguntaSeguridad2" required="required">
                    <option value="¿Cuál es tu comida favorita?">¿Cuál es tu comida favorita?</option>
                    <option value="¿Cuál es el nombre de tu mejor amigo de la infancia?">¿Cuál es el nombre de tu mejor amigo de la infancia?</option>
                    <option value="¿Cuál es tu hobby favorito?">¿Cuál es tu hobby favorito?</option>
                    <option value="¿En qué lugar de vacaciones te sentiste más feliz?">¿En qué lugar de vacaciones te sentiste más feliz?</option>
                    <!-- Agrega más opciones según tus necesidades -->
                </select>
            </div>
            <div class="inputBox">
                <span>Respuesta 2:</span>
                <input id="respuestaSeguridad2" name="respuestaSeguridad2" type="text" required="required">
            </div>

            <div class="buttons">
                <input id="registrar" type="submit" value="REGISTRARME">
                <input id="ingresarlogin" type="button" value="INGRESAR">
            </div>
            </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="col-md-6">
                <img style="margin-left:170px; margin-top:100px" src="./imagenes/imagenLogin.jpg" alt="">
            </div>
        </div>
    </div>
    

   
 </div>
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <script src="js/login.js"></script>
    <script src="js/usuario2.js"></script>
    

</body>
</html>