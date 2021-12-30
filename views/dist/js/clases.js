
/*=============================================
AGREGAR CLASES
=============================================*/


$(".guardarClases").click(function() {


    /*=============================================
    PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
    =============================================*/


    if ($(".nombre").val() != "" != "" && $(".color").val() != "") {
        
           
       agregarClases();
          
       
    } else {
        swal({
            title: "Llenar todos los campos obligatorios ",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
        return;
    }
})

function agregarClases() {

    /*=============================================
    ALMACENAMOS TODOS LOS CAMPOS DE CLASES
    =============================================*/

    var nombre = $(".nombre").val();
    var descripcion = $(".descripcion").val();
    var color = $(".color").val();
    var id_cursos = $(".SelectCurso").val();
    var id_teacher = $(".SelectTeacher").val();
    var id_schedule = $(".SelectSchedule").val();
    
    alert(id_teacher);
  
    var datos = new FormData();

    datos.append("name", nombre);
    datos.append("descripcion", descripcion);
    datos.append("color", color);
    datos.append("id_course", id_cursos);
    datos.append("id_teacher", id_teacher);
    datos.append("id_schedule", id_schedule);

    $.ajax({
        url: "ajax/clases.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

         
            // console.log("respuesta", respuesta);
            if (respuesta == "ok") {
                swal({
                    type: "success",
                    title: "El Clases se ha sido guardado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result) {
                    if (result.value) {
                        window.location = "vistaClases";
                    }
                })
            }else{ swal({
                    type: "error",
                    title: "El Error no se ha sido guardado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result) {
                    if (result.value) {
                        window.location = "vistaClases";
                    }
                })}
        }
    })
}

/*=============================================
EDITAR CURSO
=============================================*/
$('.divClases').on("click", ".btnEditarClases", function() {

  
    var idAliado = $(this).attr("idClases");
    var datos = new FormData();
    datos.append("idClases", idCurso);


    $.ajax({
        url: "ajax/clases.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) { 
     
        
            $("#modalEditarClases .idCurso").val(respuesta["id_courses"]);
            $("#modalEditarClases .nombreEditar").val(respuesta["name"]);
            $("#modalEditarClases .colorEditar").val(respuesta["descripcion"]);
            $("#modalEditarClases .idCurso").val(respuesta["id_course"]);
            $("#modalEditarClases .idTeacher").val(respuesta["id_teacher"]);
            $("#modalEditarClases .idSchedule").val(respuesta["id_schedule"]);


            $("#btnEditarClases").click(function() {
             
                editarMiClases();           
            
            });

           
        }
    })
})

function editarMiClases() {

  
    var id = $("#modalEditarClses .idClases").val();
    var nombre = $("#modalEditarClases .nombreEditar").val();
    var descripcion = $("#modalEditarClases .descripcionEditar").val();
    var color = $("#modalEditarClases .colorEditar").val();
    var id_curso = $("#modalEditarClases .idCursoEditar").val();
    var id_teacher = $("#modalEditarClases .idTeacherEditar").val();
    var id_schedule = $("#modalEditarClases .idScheduleEditar").val();
    

    var datos = new FormData();

    datos.append("id", id);
    datos.append("nameEditar", nombre);
    datos.append("descripcionEditar",descripcion);
    datos.append("colorEditar", color);
    datos.append("idCurso", id_curso);
    datos.append("idTeacher", id_teacher);
    datos.append("idSchedule", id_schedule);

    $.ajax({
        url: "ajax/clases.ajax.php",
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
                    title: "El Clases ha sido cambiado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result) {
                    if (result.value) {
                       
                        window.location = "vistaClases";
                    }
                })
            }
        }
    })
}

/*=============================================
ELIMINAR CLASES
=============================================*/

$('.divClases').on("click", ".btnEliminarClases", function() {
	
    var idClases = $(this).attr("idClases");
  
    swal({
        title: '¿Está seguro de borrar el aliado?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Clases!'
    }).then(function(result) {
        if (result.value) {
            window.location = "index.php?ruta=vistaClases&idClases=" + idClases;
        }
    })
})