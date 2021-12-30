

/*=============================================
AGREGAR CURSO
=============================================*/



$(".guardarCurso").click(function() {


    /*=============================================
    PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
    =============================================*/


    if ($(".nombre").val() != "" != "" && $(".descripcion").val() != "" && $(".inicio").val() != "") {
        
           
       agregarCursos();
          
       
    } else {
        swal({
            title: "Llenar todos los campos obligatorios ",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
        return;
    }
})

function agregarCursos() {

    /*=============================================
    ALMACENAMOS TODOS LOS CAMPOS DE PRODUCTO
    =============================================*/

    var nombre = $(".nombre").val();
    var inicio= $(".inicio").val();
    var descripcion = $(".descripcion").val();
    var final = $(".final").val();
  
    var datos = new FormData();

    datos.append("name", nombre);
    datos.append("descripcion", descripcion);
    datos.append("inicio", inicio);
    datos.append("final", final);


    $.ajax({
        url: "ajax/cursos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

            //alert(respuesta);
            // console.log("respuesta", respuesta);
            if (respuesta == "ok") {
                swal({
                    type: "success",
                    title: "El Curso se ha sido guardado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result) {
                    if (result.value) {
                        window.location = "aliados";
                    }
                })
            }
        }
    })
}

/*=============================================
EDITAR CURSO
=============================================*/
$('.divCursos').on("click", ".btnEditarCurso", function() {

  
    var idAliado = $(this).attr("idCurso");
    var datos = new FormData();
    datos.append("idCurso", idCurso);


    $.ajax({
        url: "ajax/cursos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) { 
     
        
            $("#modalEditarCurso .idCurso").val(respuesta["id_courses"]);
            $("#modalEditarCurso .nombreEditar").val(respuesta["name"]);
            $("#modalEditarCurso .descripcionEditar").val(respuesta["descripcion"]);
            $("#modalEditarCurso .inicioEditar").val(respuesta["date_start"]);
            $("#modalEditarCurso .finalEditar").val(respuesta["date_end"]);


            $("#btnEditarCursos").click(function() {
             
                editarMiCursos();           
            
            });

           
        }
    })
})

function editarMiCursos() {

  
    var id = $("#modalEditarCurso .idCurso").val();
    var nombre = $("#modalEditarCurso .nombreEditar").val();
    var descripcion = $("#modalEditarCurso .descripcionEditar").val();
    var inicio = $("#modalEditarCurso .inicioEditar").val();
    var final = $("#modalEditarCurso .finalEditar").val();
    

    var datos = new FormData();

    datos.append("id", id);
    datos.append("nameEditar", nombre);
    datos.append("descripcionEditar",descripcion);
    datos.append("inicioEditar", inicio);
    datos.append("finalEditar", final);

    $.ajax({
        url: "ajax/cursos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

            alert(respuesta);

           
            if (respuesta == "ok") {
                swal({
                    type: "success",
                    title: "El Curso ha sido cambiado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result) {
                    if (result.value) {
                       
                        window.location = "vistaCursos";
                    }
                })
            }
        }
    })
}

/*=============================================
ELIMINAR CURSOS
=============================================*/

$('.divCursos').on("click", ".btnEliminarCurso", function() {
	
    var idCurso = $(this).attr("idCurso");
  
    swal({
        title: '¿Está seguro de borrar el aliado?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Cursos!'
    }).then(function(result) {
        if (result.value) {
            window.location = "index.php?ruta=vistaCursos&idCurso=" + idCurso;
        }
    })
})