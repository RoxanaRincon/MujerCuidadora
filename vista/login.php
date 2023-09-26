<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Agrega tus enlaces CSS aquí -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
</head>
<body>
   <div id="map-container">
        <!-- Aquí colocamos el mapa -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d123634.55919989398!2d-74.08826283348147!3d4.631256259854253!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9bfd2da6cb29%3A0x239d635520a33914!2zQm9nb3TDoQ!5e0!3m2!1ses!2sco!4v1695739288986!5m2!1ses!2sco" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

<div id="login-container">
        <!-- Aquí colocamos el formulario de inicio de sesión y registro -->
    <div id="boxIngreso" class="box" >
        <span class="liner"></span>
        <form id="formLogin">
        <h1>MUJERES CUIDADORAS </h1>
            <h2>INICIAR SESION</h2>
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
        </form>
    </div>

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
            <div class="buttons">
                <input id="registrar" type="submit" value="REGISTRARME">
                <input id="ingresarlogin" type="button" value="INGRESAR">
            </div>
        </form>
    </div>
 </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <script src="js/login.js"></script>
    <script src="js/usuario.js"></script>
</body>
</html>