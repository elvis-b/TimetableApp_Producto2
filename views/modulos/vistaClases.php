
   


<?php $url = Ruta::ctrRuta();  ?>

       <!-- Begin page content -->
<div class="container" >
 
  <div class="container-fluid">
    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarClases">   
          Agregar Clases
    </button>
    <br>
    <div class="row form-group product-chooser">
         <br>

         <?php

              $item = null;
              $valor = null;

              $clases= ControladorClases::ctrMostrarClases1($item, $valor);

               foreach ($clases as $key => $value){


    
                echo  '<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 divClases" id="divClases">
                  <div class="product-chooser-item selected">
                    <img src="views/dist/img/clases.png" class="img-rounded col-xs-3 col-sm-3 col-md-7 col-lg-7" alt="Mobile and Desktop">
                          <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
                      <h3 class="title">'.$value["name"].'</h3>
                      <span class="description">'.$value["color"].'</span>
                        <br>
                        <div class="container">
                         <button class="btn btn-warning btnEditarClases" idClases="' . $value["id_class"] . '" data-toggle="modal" data-target="#modalEditarClases"><i class="fa fa-file la-3x"></i>
                           </button>
                       
                        <button class="btn btn-danger btnEliminarClases" idClases="' . $value["id_class"] . '"><i class="fa fa-times la-3x"></i>
                        </button>
                        </div>
                    </div>
                    <div class="clear"></div>
                  </div>
                </div>';
                }

      ?>
      
      
    </div>
  </div>
</div>


    
 

<!--=====================================
MODAL AGREGAR CLASES
======================================-->

<div id="modalAgregarClases" class="modal fade" role="dialog">
  
   <div class="modal-dialog">
     
     <div class="modal-content">
       
       <form  method="POST"   > 
         
         <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#C6C0BF; color:white; text-align: center;" >
             <button type="button" class="close" data-dismiss="modal">&times;</button>
              <center><h4 class="modal-title">Agregar Clases</h4></center>
  
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!--=====================================
            ENTRADA PARA EL TÍTULO
            ======================================-->

            <div class="form-group">
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-product"></i>Nombre</span> 

                  <input type="text" class="form-control input-lg validarProducto nombre" name="nombre" id="nombr" placeholder="Ingresar Nombre de la Clases">

                </div>

            </div>

   

         
          <div class="form-group">

              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-product"></i>Color</span> 

                  <input type="text" class="form-control input-lg color" name= "color"  placeholder="Ingresar color">

                </div>

            </div>



           <!--=====================================
            AGREGAR CURSOS
            ======================================-->

            <div class="form-group">
                
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <select class="form-control input-lg SelectCurso">
                  
                    <option value="">Selecionar cursos</option>

                    <?php

                    $item = null;
                    $valor = null;

                    $categorias = ControladorCursos::ctrMostrarCursos1($item, $valor);

                    foreach ($categorias as $key => $value) {
                      
                      echo '<option value="'.$value["id_course"].'">'.$value["name"].'</option>';
                    }

                    ?>

                  </select>

                </div>

            </div>

             <!--=====================================
            AGREGAR CURSOS
            ======================================-->

            <div class="form-group">
                
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <select class="form-control input-lg SelectTeacher" id="SelectTeacher">
                  
                    <option value="">Selecionar teacher</option>

                    <?php

                    $item = null;
                    $valor = null;

                    $teacher = ControladorProfesores::ctrMostrarProfesor1($item, $valor);

                    foreach ($teacher as $key => $value) {
                      
                      echo '<option value="'.$value["id"].'">'.$value["name"].'</option>';
                    }

                    ?>

                  </select>

                </div>

            </div>


             <!--=====================================
            AGREGAR SCHELUDE
            ======================================-->

            <div class="form-group">
                
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <select class="form-control input-lg SelectSchedule">
                  
                    <option value="">Selecionar Schedule</option>

                    <?php

                    $item = null;
                    $valor = null;

                    $schedule = ControladorSchedule::ctrMostrarSchedule1($item, $valor);

                    foreach ($schedule as $key => $value) {
                      
                      echo '<option value="'.$value["id_schedule"].'">'.$value["day"].'</option>';
                    }

                    ?>

                  </select>

                </div>

            </div>

          </div>
    
            

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
  
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary guardarClases">Guardar Clase</button>

        </div>


       </form> 

     </div>

   </div>


</div>




<?php

 $eliminarClases = new ControladorClases();
 $eliminarClases -> ctrEliminarClases();

?>

