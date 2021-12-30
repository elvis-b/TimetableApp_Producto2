
/*=============================================
MÉTODO TIPO USER
=============================================*/

$(".seleccionarTipo").change(function() {
    var tipouser = $(this).val();

    if(tipouser == "ADMIN") {
        $(".nif").hide();
        $(".tlf").hide();    
    } else {
        $(".nif").show();
        $(".tlf").show();    
    } 

})

/*=============================================
REVISAR PASSWORD
=============================================*/
$(".passConfirm").change(function() { 
    var passConfirm = $(this).val();
    var password = $("#pass").val();
    if(passConfirm==password){

        
    }else{
    	 $(".passConfirm").parent().after('<div class="alert alert-warning">Porfavor password tienen que ser iguales..! No considen </div>');

    }
  
})



/*=============================================
REVISAR SI EL CORREO DEL PRODUCTO YA EXISTE
=============================================*/
$(".email").change(function() {
    $(".alert").remove();
    var email = $(this).val();
    var datos = new FormData();
    datos.append("email", email);
    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
           // alert(respuesta);
            if (respuesta.length == false) {
                $(".email").parent().after('<div class="alert alert-warning">Este correo electronico ya existe en la base de datos</div>');
                $(".email").val("");
            }

        }
    })
})
  
