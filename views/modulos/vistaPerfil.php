 <?php 
 
    $url = Ruta::ctrRuta();  
    
    
    $ingreso = new ControladorUsuarios();
    $consulta = $ingreso ->ctrMostrarUsuario("username",$_SESSION["username"]);
    

    
 ?>
            <!-- Begin page content -->
        <div class="container" style="margin-top:50px">
        <h1>DATOS DEL USUARIO <?php echo $_SESSION["username"]?> </h1>
        <form method="POST">
            <div class="mb-3">
              <label for="nombre" class="form-label">Username </label>
              <input name="username" placeholder="<?php echo $consulta["username"]?>" type="text" class="form-control IngNombre" id="nombre" aria-describedby="nombre" maxlength="20">  
            </div>
            <div class="mb-3">
              <label for="pass" class="form-label ">Password</label>
              <input name="password" type="password" class="form-control Ingpassword" id="pass">
            </div>
             <div class="mb-3">
                <label for="passConfirm" class="form-label passConfirm">Repetir Password</label>
                <input name="passConfirm" type="password" class="form-control passConfirm" id="passConfirm">
            </div>
            
             <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input name="email" type="email" placeholder="<?php echo $consulta["email"]?>" class="form-control" id="email" aria-describedby="email" maxlength="50">
         
        </div> 
            
            <div class="mb-3">    
            </div>
            <?php
                if(! empty($_POST) ){
                    $registro = new ControladorUsuarios();
                    $registro ->ctrActualizarPerfil();
                }
            ?>
            <br>
            <div class="mb-3" style="margin-top:5px">    
            <button type="submit" class="btn btn-primary">Modificar Perfil</button>
            <button type="reset" class="btn btn-warning">Borrar</button>
            </div>
        </form>

