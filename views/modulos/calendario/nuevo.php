
<form  role="form" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="start">Fecha de inicio</label>
    <div class="input-group date" id="datetimepicker1">
      <input type="text" name="start" class="form-control" readonly /><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
  </div>

  <div class="form-group">
    <label for="end">Fecha de finalización</label>
    <div class="input-group date" id="datetimepicker2">
      <input type="text" name="end" class="form-control" readonly /><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
  </div>

 

  <div class="form-group">
    <label for="title">Nombre</label>
    <input type="text" name="title" class="form-control" placeholder="Introduce un Nombre curso" autocomplete="off" required>
  </div>

  <div class="form-group">
    <label for="body">Descripción</label>
    <textarea name="body" class="form-control" required></textarea>
  </div>


    

  <div class="form-group">
    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-calendar"></span> Nuevo evento</button>
  </div>

 
</form>

