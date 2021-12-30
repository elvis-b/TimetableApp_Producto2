<?php
    $url = Ruta::ctrRuta();

   if(isset($_SESSION["nombre"]))
   {
       // El usuario ya esta logeado
       echo "<h1> Ya estas logeado como " . $_SESSION["nombre"] ." Tipo de cuenta " . $_SESSION["tipo"]. "</h1>";
   } else {
       ?>
       
        <!-- Begin page content -->
        <div class="container" style="margin-top:50px">
        <h1>LOGIN DE USUARIOS</h1>
        <form method="POST">
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input name="username" type="text" class="form-control IngNombre" id="nombre" aria-describedby="nombre" maxlength="20" required="yes">  
            </div>
            <div class="mb-3">
              <label for="pass" class="form-label ">Password</label>
              <input name="password" type="password" class="form-control Ingpassword" id="pass" required="yes">
            </div>
            <div class="mb-3">    
            </div>
            <?php
                $ingreso = new ControladorUsuarios();
                $ingreso -> ctrIngresoUsuario();
            ?>
            <br>
            <div class="mb-3" style="margin-top:5px">    
            <button type="submit" class="btn btn-primary">Enviar</button>
            <button type="reset" class="btn btn-warning">Borrar</button>
            </div>
        </form>

      <?php  
    
        if(isset($_SESSION['error_ingreso'])){

                        echo '<br><br><div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error!</strong> '.$_SESSION['error_ingreso'].'
                      </div>';
                    }
                ?>





    </div>
    <br>
    <br>
    <br>
    <br>

      <?php
   }
       
?>     
  


