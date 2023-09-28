$(function(){

    tabla = null
    listarServicio()
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
                dataSet.push([item.codigo, item.nombre, item.descripcion, item.categoria, item.tipoServicio, botonAcciones]);
                
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
})