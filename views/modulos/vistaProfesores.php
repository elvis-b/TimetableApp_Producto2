 <div class="card-body">

        <div class="table-responsive">

          
          <table class="table table-bordered table-striped dt-responsive tablaPerfiles" width="100%">
           
            <thead>
             
             <tr>
               
               <th style="width:10px">#</th>
               <th>Nombre</th>
               <th>Email</th>
               <th>Username</th>
              <th>Img</th>
               <th>Telefono</th>
               <th>nif</th>
               <!--<th>Acciones</th>-->

             </tr> 

            </thead>

            <tbody>

              <?php

              $item = null;
              $valor = null;

              $profesores = ControladorProfesores::ctrMostrarProfesor1($item, $valor);

               foreach ($profesores as $key => $value){

                   echo ' <tr>
                            <td>'.($key+1).'</td>
                            <td>'.$value["name"]." ".$value["surname"].'</td>
                            <td>'.$value["email"].'</td>
                            <td>'.$value["username"].'</td>';

                        
                              echo '<td><img src="views/dist/img/profesor.png" class="img-thumbnail" width="40px"></td>';

                          


                           echo '<td>'.$value["telephone"].'</td>
                                <td>'.$value["nif"].'</td>
                           <!--<td>


                            <div class="btn-group">
                                
                              <button class="btn btn-warning btnEditarPerfil" idPerfil="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarPerfil"><i class="fa fa-file"></i></button>

                              <button class="btn btn-danger btnEliminarPerfil" idPerfil="'.$value["id"].'"><i class="fa fa-times"></i></button>

                            </div>  

                          </td>-->

                        </tr>';            
               }


              ?>

            </tbody>

          </table>