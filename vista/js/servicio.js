$(function () {
    tabla = null;
    listarServicio();
    listarCategorias();
    listarTipoServicio();

    function listarServicio() {
        var objData = new FormData();
        objData.append("listarServicios", "ok");
        $.ajax({
            url: "../controlador/servicioControlador.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function (respuesta) {
            dataSet = [];
            var botonAcciones = '';
            respuesta.forEach(listarServicios);

            function listarServicios(item, index) {
                botonAcciones = '<button class="btn btn-danger btn-eliminar" data-id="' + item.idServicio + '"><i class="bi bi-trash3"></i></button>';
                botonAcciones += '<button class="btn btn-primary btn-editar" data-id="' + item.idServicio + '" data-codigo="' + item.codigo + '" data-nombre="' + item.nombre + '" data-descripcion="' + item.descripcion + '" data-idCategoria="' + item.idCategoria + '" data-idTipoServicio="' + item.idTipoServicio + '"><i class="bi bi-pencil-square"></i></button>';
                dataSet.push([item.codigo, item.nombre, item.descripcion, item.idCategoria, item.IdTipoServicio, botonAcciones]);
            }

            actualizarTabla(dataSet);

            // Agregar manejadores de eventos a los botones "Editar" y "Eliminar"
            $('#tablaServicios').on('click', '.btn-eliminar', function () {
                var servicioId = $(this).data('id');
                eliminarServicio(servicioId);
            });

            $('#tablaServicios').on('click', '.btn-editar', function () {
                var servicioId = $(this).data('id');
                var codigo = $(this).data('codigo');
                var nombre = $(this).data('nombre');
                var descripcion = $(this).data('descripcion');
                var idCategoria = $(this).data('idCategoria');
                var idTipoServicio = $(this).data('idTipoServicio');
                editarServicio(servicioId, codigo, nombre, descripcion, idCategoria, idTipoServicio);
            });
        });
    }

    function actualizarTabla(dataSet) {
        if (tabla != null) {
            $("#tablaServicios").dataTable().fnDestroy();
        }

        tabla = $("#tablaServicios").DataTable({
            data: dataSet
        });
        tabla = true;
    }

    function listarCategorias() {
        var objData = new FormData();
        objData.append("listarCategorias", "ok");
        $.ajax({
            url: "../controlador/servicioControlador.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function (respuesta) {
            opciones = '';
            respuesta.forEach(listarSelectCategorias);

            function listarSelectCategorias(item, index) {
                opciones += '<option value="' + item.idCategoria + '">' + item.categoria + '</option>';
            }

            opciones = '';
            respuesta.forEach(listarCategoriasOpciones);

            function listarCategoriasOpciones(item, index) {
                opciones += '<option value="' + item.idCategoria + '">' + item.nombre + '</option>';
            }

            $("#sltCategoria").html(opciones);
        });
    }

    function listarTipoServicio() {
        var objData = new FormData();
        objData.append("listarTipoServicio", "ok");
        $.ajax({
            url: "../controlador/servicioControlador.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function (respuesta) {
            opciones = '';
            respuesta.forEach(listarSelectTipoServicio);

            function listarSelectTipoServicio(item, index) {
                opciones += '<option value="' + item.idTipoUsuario + '">' + item.nombre + '</option>';
            }

            $("#sltTipoServicio").html(opciones);
        });
    }

    $("#guardarServicio").on("click", function () {
        var codigo = $("#Codigo").val();
        var nombre = $("#Nombre").val();
        var descripcion = $("#Descripcion").val();
        var categoria = $("#sltCategoria").val();
        var tipoServicio = $("#sltTipoServicio").val();

        var objData = new FormData();
        objData.append("guardarCodigo", codigo);
        objData.append("guardarNombre", nombre);
        objData.append("guardarDescripcion", descripcion);
        objData.append("guardarCategoria", categoria);
        objData.append("guardarTipoServicio", tipoServicio);

        $.ajax({
            url: "../controlador/servicioControlador.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function (respuesta) {
            alert("Registro cargado con éxito");
            $("#servicioModal").modal('hide'); // Cierra el modal después de agregar
            listarServicio(); // Actualiza la lista después de agregar
        });
    });

    function eliminarServicio(servicioId) {
        if (confirm('¿Estás seguro de que deseas eliminar este servicio?')) {
            var objData = new FormData();
            objData.append('eliminarServicio', 'ok');
            objData.append('idServicio', servicioId);

            $.ajax({
                url: '../controlador/servicioControlador.php',
                type: 'post',
                dataType: 'json',
                data: objData,
                cache: false,
                contentType: false,
                processData: false
            }).done(function (respuesta) {
                if (respuesta.success) {
                    alert('Servicio eliminado con éxito');
                    listarServicio(); // Actualiza la lista después de eliminar
                } else {
                    alert('Error al eliminar el servicio');
                }
            });
        }
    }

    function editarServicio(servicioId, codigo, nombre, descripcion, idCategoria, idTipoServicio) {
        $("#ServicioID").val(servicioId);
        $("#Codigo").val(codigo);
        $("#Nombre").val(nombre);
        $("#Descripcion").val(descripcion);
        $("#sltCategoria").val(idCategoria);
        $("#sltTipoServicio").val(idTipoServicio);

        // Abre el modal de edición
        $("#servicioModal").modal('show');

        // Agregar manejador de evento para cerrar el modal de edición
        $("#servicioModal").on("hidden.bs.modal", function () {
            $("#ServicioID").val("0"); // Reinicia el valor del ID del servicio
            $("#servicioForm")[0].reset(); // Limpia el formulario
        });
    }
});
