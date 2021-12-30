
 <?php $url = Ruta::ctrRuta();  ?>

       <!-- Begin page content -->
    <div class="container" >
 
    <div class="container">
    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCurso">   
          Agregar Cursos
    </button>
    <div class="row form-group product-chooser">

        <h1> Curso en los que estas matriculado </h1>
         <?php

              $item = null;
              $valor = null;

              $cursos = ControladorCursos::ctrMostrarCursos1($item, $valor);

               foreach ($cursos as $key => $value){


    
                echo  '<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 divCursos" id="divCursos">
                  <div class="product-chooser-item selected">
                    <img src="views/dist/img/courses.png" class="img-rounded col-xs-3 col-sm-3 col-md-7 col-lg-7" alt="Mobile and Desktop">
                          <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
                      <h3 class="title">'.$value["name"].'</h3>
                      <span class="description">'.$value["description"].'</span>
                        <br>
                        <div class="container">
                           <button class="btn btn-warning btnEditarCurso" idCurso="' . $value["id_course"] . '" data-toggle="modal" data-target="#modalEditarCurso"><i class="fa fa-file la-3x"></i>
                           </button>
                       
                        <button class="btn btn-danger btnEliminarCurso" idCurso="' . $value["id_course"] . '"><i class="fa fa-times la-3x"></i>
                        </button>
                        </div>
                    </div>
                    <div class="clear"></div>
                  </div>
                </div>';
                }

      ?>
      
      
    </div>

    
 

<!--=====================================
MODAL AGREGAR CURSO
======================================-->

<div id="modalAgregarCurso" class="modal fade" role="dialog">
  
   <div class="modal-dialog">
     
     <div class="modal-content">
       
       <form method="POST"> 
         
         <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#C6C0BF; color:white; text-align: center;" >
             <button type="button" class="close" data-dismiss="modal">&times;</button>
              <center><h4 class="modal-title">Agregar Cursos</h4></center>
  
        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="card-body">

            <!--=====================================
            ENTRADA PARA EL TÍTULO
            ======================================-->

            <div class="form-group">
              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-product"></i>Nombre</span> 

                  <input type="text" class="form-control input-lg validarProducto nombre" name="name" id="name" placeholder="Ingresar Nombre Curso">

                </div>

            </div>

          <div class="form-group">
              <div class="input-group mb-2">
                <span class="input-group-addon">Descripcion</span> 
                <textarea id="descripcion" name="descripcion" class="md-textarea form-control descripcion" placeholder="Ingrese Descripción del curso" rows="3"></textarea>
                <label for="form10"></label>
              </div>
          </div>
          <br>

         
          <div class="form-group">

              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-product"></i>Inicio</span> 

                  <input type="datetime-local" class="form-control input-lg inicio" name= "inicio"  placeholder="Ingresar título producto">

                </div>

            </div>

             <div class="form-group">

              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-product"></i>Final</span> 

                  <input type="datetime-local" class="form-control input-lg final" name="final" placeholder="Ingresar título producto">

                </div>

            </div>
        </div>

        <?php
              $registro = new ControladorCursos();
              $registro -> ctrCrearCurso();
        ?>    


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
  
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>


          <button type="submit" class="btn btn-primary guardarCurso">Guardar Clase</button>

        </div>

       </form> 

     </div>

   </div>


</div>




<!--=====================================
MODAL EDITAR CURSO
======================================-->

<div id="modalEditarCurso" class="modal fade" role="dialog">
  
   <div class="modal-dialog">
     
     <div class="modal-content">
       
       <!-- <form role="form" method="post" enctype="multipart/form-data"> -->
         
         <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#C6C0BF; color:white; text-align: center;" >
             <button type="button" class="close" data-dismiss="modal">&times;</button>
              <center><h4 class="modal-title">Editar Cursos</h4></center>
  
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

                  <input type="text" class="form-control input-lg validarCurso nombreEditar" name="name" placeholder="Ingresar Nombre Curso">

                </div>

            </div>

                 <input type="hidden" class="idCurso" id="idCurso" >

          <div class="form-group">
              <div class="input-group mb-2">
                <span class="input-group-addon">Descripcion</span> 
                <textarea id="descripcion" name="descripcion" class="md-textarea form-control descripcionEditar" placeholder="Ingrese Descripción del curso" name="descripcion" rows="3"></textarea>
                <label for="form10"></label>
              </div>
          </div>
          <br>

         
          <div class="form-group">

              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-product"></i>Inicio</span> 

                  <input type="datetime-local" class="form-control input-lg inicioEditar" name="inicio" placeholder="Ingresar título producto">

                </div>

            </div>

             <div class="form-group">

              
                <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-product"></i>Final</span> 

                  <input type="datetime-local" class="form-control input-lg finalEditar" name="final" placeholder="Ingresar título producto">

                </div>

            </div>

        </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
  
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary EditarCurso">Guardar </button>

        </div>

       <!-- </form> -->

     </div>

   </div>

</div>


<?php

 $eliminarCurso = new ControladorCursos();
 $eliminarCurso -> ctrEliminarCurso();

?>
