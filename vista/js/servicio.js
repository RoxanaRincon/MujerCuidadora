$(function () {
    tabla = null;
    var servicioID = 0; 
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
                botonAcciones += '<button class="btn btn-primary btn-editar" data-id="' + item.idServicio + '" data-codigo="' + item.codigo + '" data-nombre="' + item.nombre + '" data-descripcion="' + item.descripcion + '" data-idCategoria="' + item.nombreCategoria + '" data-idTipoServicio="' + item.nombreTipoServicio + '"><i class="bi bi-pencil-square"></i></button>';
                dataSet.push([item.codigo, item.nombre, item.descripcion, item.nombreCategoria, item.nombreTipoServicio, botonAcciones]);
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
    
        if (servicioID !== 0) {
            // En modo de edición, agrega el ID del servicio y el indicador para actualizar
            objData.append("editarServicio", "ok");
            objData.append("servicioID", servicioID);
        } else {
            // En modo de agregar, agrega el indicador para guardar un nuevo servicio
            objData.append("guardarCodigo", codigo);
            objData.append("guardarNombre", nombre);
            objData.append("guardarDescripcion", descripcion);
            objData.append("guardarCategoria", categoria);
            objData.append("guardarTipoServicio", tipoServicio);
        }

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
        servicioID = servicioId; // Almacenar el ID del servicio que se está editando

        // Establecer los valores de los campos del formulario con los datos del servicio
        $("#ServicioID").val(servicioId);
        $("#Codigo").val(codigo);
        $("#Nombre").val(nombre);
        $("#Descripcion").val(descripcion);
        $("#sltCategoria").val(idCategoria);
        $("#sltTipoServicio").val(idTipoServicio);

        // Cambiar el título del modal
        $("#servicioModalLabel").text("Editar Servicio");

        // Abre el modal de edición
        $("#servicioModal").modal('show');
    }

    $("#guardarServicio").on("click", function () {
        var codigo = $("#Codigo").val();
        var nombre = $("#Nombre").val();
        var descripcion = $("#Descripcion").val();
        var categoria = $("#sltCategoria").val();
        var tipoServicio = $("#sltTipoServicio").val();

        var objData = new FormData();
        objData.append("codigo", codigo);
        objData.append("nombre", nombre);
        objData.append("descripcion", descripcion);
        objData.append("categoria", categoria);
        objData.append("tipoServicio", tipoServicio);

        if (servicioID !== 0) {
            // En modo de edición, agrega el ID del servicio
            objData.append("editarServicio", "ok");
            objData.append("servicioID", servicioID);
        } else {
            // En modo de agregar, agrega el indicador para guardar un nuevo servicio
            objData.append("guardarCodigo", codigo);
            objData.append("guardarNombre", nombre);
            objData.append("guardarDescripcion", descripcion);
            objData.append("guardarCategoria", categoria);
            objData.append("guardarTipoServicio", tipoServicio);
        }

        $.ajax({
            url: "../controlador/servicioControlador.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                if (respuesta.success) {
                    alert("Servicio actualizado o agregado con éxito");
                    $("#servicioModal").modal('hide'); // Cierra el modal después de editar o agregar
                    listarServicio(); // Actualiza la lista después de editar o agregar
                } else {
                    alert("Error al actualizar o agregar el servicio");
                }
                // Reiniciar el servicioID después de editar o agregar
                servicioID = 0;
            },
            error: function (error) {
                console.error("Error al editar o agregar el servicio: ", error);
                servicioID = 0; // Asegúrate de restablecer servicioID en caso de error
            }
        });
    });
});
