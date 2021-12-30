 <?php $url = Ruta::ctrRuta();  ?>
<br>
<br>
<br>

  <!-- Menu lateral Admin -->

<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
    
    <ul class="nav nav-pills nav-stacked" style="border-right:1px solid black">
        <!--<li class="nav-header"></li>-->
       
        <?php if($_SESSION["tipo"]=="ADMIN"){  ?>
        <li><a href="vistaCursos"><i class="fa fa-tags"></i> Cursos</a></li>
        <li><a href="vistaClases"><i class="fa fa-history"></i> Clases</a></li>  
        <li><a href="vistaProfesores"><i class="fa fa-lock"></i> Profesores</a></li>
        <li><a href="calendario"><i class="fa fa-dashboard"></i>Calendario Admin</a></li>
      <?php }else{
           echo '<li><a href="calendariouser"><i class="fa fa-dashboard"></i>Calendario</a></li>
             <li><a href="vistaCursos"><i class="fa fa-tags"></i> Cursos</a></li>';
      } ?>
      <li><a href="logout"><i class="fa fa-close"></i>Salir</a></li>

    </ul>
</div><!-- /span-3 -->


<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
    <!-- Right -->
     <div class="col-md-2">
      <a href="#"><strong><span class="fa fa-dashboard"></span> Inicio</strong></a>
     </div>
     <div class="col-md-8">
        <h5><?php echo "Bienvenido Usuario " . $_SESSION["tipo"];?></h5>

      </div>
    

   
    <hr>
   
