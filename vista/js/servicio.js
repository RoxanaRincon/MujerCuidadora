$(function(){

    tabla = null
    listarServicio();
    listarCategorias();
    listarTipoServicio();
    function listarServicio(){
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
            function listarServicios(item,index){
                botonAcciones = '<button id="btn_editServicio" type="button" class="btn btn-danger" idServicio="'+item.idServicio+'" codigo = "'+item.codigo+'" nombre = "'+item.nombre+'" descripcion = "'+item.descripcion+'" idCategoria = "'+item.idCategoria+'" idTipoServicio = "'+item.idTipoServicio+'"><i  class="bi bi-trash3"></i></button>';
                botonAcciones += '<button id="btn_eliServicio" type="button" class="btn btn-primary" idServicio="'+item.idServicio+'"><i class="bi bi-pencil-square"></i></button>';
                dataSet.push([item.codigo, item.nombre, item.descripcion, item.idCategoria, item.IdTipoServicio, botonAcciones]);
                
            }
            actualizarTabla(dataSet);
        })
    }

    function actualizarTabla(dataSet) {
        if (tabla != null) {
            $("#tablaServicios").dataTable().fnDestroy();
        }

        tabla = $("#tablaServicios").DataTable({
            data: dataSet
        })
        tabla = true;
    }
    
    function listarCategorias(){
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
            function listarSelectCategorias(item,index){
                opciones += '<option value="' + item.idCategoria + '">' + item.categoria + '</option>';

            }
            // console.log(respuesta)
            opciones = '';
            respuesta.forEach(listarCategoriasOpciones);
             // se ajusta nombre
            function listarCategoriasOpciones(item,index){
                opciones += '<option value="' + item.idCategoria + '">' + item.nombre + '</option>';
            }

            $("#sltCategoria").html(opciones);
        })
    }


    function listarTipoServicio(){
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
            function listarSelectTipoServicio(item,index){
                opciones += '<option value="' + item.idTipoUsuario + '">' + item.nombre + '</option>';

            }
            $("#sltTipoServicio").html(opciones);
        })
    }

    $("#guardarServicio").on("click", function(){
        var codigo = $("#codigo").val();
        var nombre = $("#nombre").val();
        var descripcion = $("#descripcion").val();
        var idCategoria = $("#sltCategoria").val();
        var idTipoServicio = $("#sltTipoServicio").val();

        var objData = new FormData();
        objData.append("guardarCodigo", codigo);
        objData.append("guardarNombre", nombre);
        objData.append("guardarDescripcion", descripcion);
        objData.append("guardarIdCategoria", idCategoria);
        objData.append("guardarIdTipoServicio", idTipoServicio);

        $.ajax({
            url: "../controlador/servicioControlador.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function (respuesta) {
            console.log(respuesta)
        })
        
    })
})