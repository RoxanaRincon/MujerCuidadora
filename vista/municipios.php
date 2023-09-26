<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro y Listado de Municipios</title>
    <!-- Agregar el enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Registro y Listado de Municipios</h1>

        <!-- Formulario para agregar un nuevo municipio -->
        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <h2>Agregar Municipio</h2>
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

        <!-- Botón para listar municipios -->
        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <button id="listarMunicipiosBtn" class="btn btn-success btn-block">Listar Municipios</button>
            </div>
        </div>

        <!-- Lista de municipios -->
        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <h2>Listado de Municipios</h2>
                <ul id="listaMunicipios" class="list-group"></ul>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Agregar tu script de JavaScript para manejar la lógica -->
    <script src="js/municipios.js"></script>
</body>
</html>