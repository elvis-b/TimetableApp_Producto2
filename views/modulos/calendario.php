<?php require "Model/config.php"; ?>
<div class="container">

      <!-- Nuevo evento -->
      <?php if (isset($_GET["action"]) && ($_GET["action"]=="nuevo")):
      $evento = new calendario();
      $evento -> nuevo($db_connect);?>
      
      <!-- Eliminar evento -->
      <?php elseif (isset($_GET["action"]) && ($_GET["action"]=="eliminar")):
      $evento = new calendario();
      $evento -> eliminar($db_connect);?>

      <!-- Listado de eventos -->
      <?php else: ?>
    


    <header class="page-header">
  <div class="pull-right form-inline">
    <div class="btn-group">
      <button class="btn btn-primary" data-calendar-nav="prev">Anterior</button>
      <button class="btn btn-default" data-calendar-nav="today">Hoy</button>
      <button class="btn btn-primary" data-calendar-nav="next">Siguiente</button>
    </div>

    <div class="btn-group">
      <button class="btn btn-warning" data-calendar-view="year">Año</button>
      <button class="btn btn-warning active" data-calendar-view="month">Mes</button>
      <button class="btn btn-warning" data-calendar-view="week">Semana</button>
      <button class="btn btn-warning" data-calendar-view="day">Día</button>
    </div>
  </div>
  <h3></h3>
</header>

<?php if (isset($_GET["nuevo"]) AND ($_GET["nuevo"]=="ok")): ?>
<div class="alert alert-success alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

  <p><span class="glyphicon glyphicon-info-sign"></span> El evento ha sido creado con éxito.</p>
</div>
<?php endif; ?>

<?php if (isset($_GET["eliminar"]) && ($_GET["eliminar"]=="ok")): ?>
<div class="alert alert-success alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

  <p><span class="glyphicon glyphicon-info-sign"></span> El evento ha sido eliminado con éxito.</p>
</div>
<?php endif; ?>

<div class="row">
  <div class="col-xm-12 col-md-8">
    <div id="calendar"></div>
  </div>

  <div class="col-xm-12 col-md-4">
    <?php include "views/modulos/calendario/nuevo.php"; ?>
  </div>
</div>

<div class="modal fade" id="events-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Evento</h3>
      </div>
      <div class="modal-body" style="height: 400px">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


      <?php endif; ?>


<script type="text/javascript" src="<?php echo $url; ?>components/underscore/underscore-min.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>components/jstimezonedetect/jstz.min.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>components/bootstrap-calendar/js/language/es-ES.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>components/bootstrap-calendar/js/calendar.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>components/bootstrap-calendar/js/app.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>components/moment/moment.min.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>components/moment/locale/es.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>components/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>  

<script>
  $('#datetimepicker1').datetimepicker({
    format: 'DD/MM/YYYY HH:mm',
    ignoreReadonly: true,
    minDate: moment(),
    showClear: true
  });

  $('#datetimepicker2').datetimepicker({
    format: 'DD/MM/YYYY HH:mm',
    ignoreReadonly: true,
    minDate: moment(),
    showClear: true
  });  
</script>
    
</div>