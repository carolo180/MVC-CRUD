<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->id : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Persona">Personas</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->id : 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=Persona&a=Guardar" method="post" enctype="multipart/form-data">
     

    
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="names" value="<?php echo $alm->names; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
    </div>
    <div class="form-group">
        <label>Subject</label>
        <input type="text" name="subject" value="<?php echo $alm->subject; ?>" class="form-control" placeholder="Ingrese su tema" data-validacion-tipo="requerido|min:3" />
    </div>
    <div class="form-group">
        <label>Date appointment</label>
        <input type="datetime-local" name="datetime" value="<?php echo $alm->datetime; ?>" class="form-control" placeholder="Ingrese fecha y hora" data-validacion-tipo="requerido|min:3" />
    </div>
       
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
    <script>
    config=
    {
        enableTime:true,
        noCalendar:true,
        dateFormat:"H:1",
        time_24hr:true
    }
    flatpickr("input[type=datetime-local]", config)
</script>
</form>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

