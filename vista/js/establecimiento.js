$(function(){

    tabla = null
    listarEstablecimiento()
    function listarEstablecimiento(){
        var objData = new FormData();
        objData.append("listarEstablecimiento", "ok");
        $.ajax({
            url: "../controlador/establecimientoControlador.php",
            type: "post",
            dataType: "json",
            data: objData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function (respuesta) {
            console.log(respuesta);
            dataSet = [];
            var botonAcciones = '';
            respuesta.forEach(listarEstablecimientos);
            function listarEstablecimientos(item,index){
                botonAcciones = '<button id="btn_editEstablecimiento" type="button" class="btn btn-danger" idEstablecimiento="'+item.idEstablecimiento+'" codigo = "'+item.codigo+'" nombre = "'+item.nombre+'" responsable = "'+item.responsable+'" direccion = "'+item.direccion+'"> <i class="bi bi-pencil-square"></i></button>';
                botonAcciones += '<button id="btn_eliEstablecimiento" type="button" class="btn btn-primary" idEstablecimiento="'+item.idEstablecimiento+'"><i  class="bi bi-trash3"></i></button>';
                dataSet.push([item.codigo, item.nombre, item.responsable, item.direccion, botonAcciones]);
                
            }
            actualizarTabla(dataSet);
        })
    }

    function actualizarTabla(dataSet) {
        if (tabla != null) {
            $("#tablaEstablecimiento").dataTable().fnDestroy();
        }

        tabla = $("#tablaEstablecimiento").DataTable({
            data: dataSet
        })
        tabla = true;
    }

    $("#guardarEstablecimiento").on("click", function(){
        var codigo = $("#Codigo").val()
        var nombre = $("#Nombre").val()
        var responsable = $("#Responsable").val()
        var direccion = $("#Direccion").val()
        var objData = new FormData()
        objData.append("guardarCodigo",codigo)
        objData.append("guardarNombre",nombre)
        objData.append("guardarResponsable",responsable)
        objData.append("guardarDireccion",direccion)

        $.ajax({
            url: "../controlador/establecimientoControlador.php",
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