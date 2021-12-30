
        <!-- Begin page content -->
    <div class="container" style="margin-top:50px">

        <div class="col-md-3 col-lg-3">
        </div>

        <div class="col-md-6 col-lg-6">

        <center><h1>Eliminar Curso</h1></center>

        <form method="POST">

          <div class="mb-3">
            <p>Estás seguro que quieres eliminar el curso?</p>

        </div>


         <?php

          $eliminarCurso = new ControladorCursos();
          $eliminarCurso -> ctrEliminarCurso();

         ?>

        <button type="submit" class="btn btn-primary">Elminar</button>
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


