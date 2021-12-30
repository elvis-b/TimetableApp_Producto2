 
  <?php  
   
    
    
  ?>
        <!-- Begin page content -->
    <div class="container" style="margin-top:50px">

        <div class="col-md-3 col-lg-3">
        </div>

        <div class="col-md-6 col-lg-6">
        
        <center><h1>REGISTRO DE USUARIOS</h1></center>

        <form method="POST">


        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input name="username" type="text" class="form-control" id="username" aria-describedby="nombre" maxlength="20" required="yes">
         
        </div>
        <div class="mb-3">
          <label for="pass" class="form-label ">Password</label>
          <input name="password" type="password" class="form-control password" id="pass" required="yes">
        </div>
        <div class="mb-3">
          <label for="passConfirm" class="form-label passConfirm">Repetir Password</label>
          <input name="passConfirm" type="password" class="form-control passConfirm" id="passConfirm" required="yes">
        </div>


        <div class="mb-3">
          <label for="name" class="form-label">Nombre</label>
          <input name="nombre" type="text" class="form-control" id="name" aria-describedby="name" maxlength="20" required="yes">
         
        </div>
       
               <div class="mb-3">
          <label for="surname" class="form-label">Apellido</label>
          <input name="surname" type="text" class="form-control" id="surname" aria-describedby="surname" maxlength="20" required="yes">
         
        </div>
       
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input name="email" type="email" class="form-control" id="email" aria-describedby="email" maxlength="20" required="yes">
         
        </div>

        <div class="mb-3">
                
          <label class="input-group-text">Seleccionar Tipo Usuario</label>
          <select class="form-control input-lg seleccionarTipo"  name="tipouser" id="tipouser">
            <option value="ESTUDIANTE">Estudiante</option>
            <option value="PROFESOR">Profesor</option>
            <option value="ADMIN">Admin</option>
          </select>
        </div>
        <br>
        
        <div class="mb-3">
          <label for="tlf" class="form-label tlf">Teléfono</label>
          <input name="tlf" type="text" class="form-control tlf" id="tlf" aria-describedby="name" maxlength="20" required="yes">         
        </div>
        
        <div class="mb-3">
          <label for="nif" class="form-label nif">NIF</label>
          <input name="nif" type="text" class="form-control nif" id="nif" aria-describedby="name" maxlength="20" required="yes">         
        </div>
        <br>

         <?php

            $registro = new ControladorUsuarios();
            $registro -> ctrRegistroUsuario();

          ?>
       
        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="reset" class="btn btn-primary">Borrar</button>
    
    </form>
</div>
        
        <?php  

     

             if(isset($_SESSION['admin1'])){
                 
                    echo "<br><br><h1>".$_SESSION['admin1']."</h1>";
            
                }
                if(isset($_SESSION['error_register'])){
                    echo "<h2>Error:";
                    echo var_dump($_SESSION['error_register']);
                    echo "</h2>";
                }
            ?>
</div>


