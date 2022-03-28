<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Computación</title>
        
        <meta charset="utf-8" />
        
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="assets/js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	</head>
    <body>
        
    <div class="container">
<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->id : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Persona">Personas</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->id : 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=Persona&a=Guardar" method="post" enctype="multipart/form-data" id="for_reset">
     
<input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
    
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
        <input type="date" name="date" value="<?php echo $alm->date; ?>" class="form-control" placeholder="Ingrese fecha y hora" data-validacion-tipo="requerido|min:3" />
    </div>
    <div class="form-group">
        <label>Time appointment</label>
        <input type="time" name="time" value="<?php echo $alm->time; ?>" class="form-control" placeholder="Ingrese fecha y hora" data-validacion-tipo="requerido|min:3" />
    </div>
       
    <hr />
  
    <div class="text-right">
        <button type="submit" class="btn btn-success">Guardar</button>
        <input type="button"class="btn btn-success" value="Reset" onclick="window.location.href='?c=Persona&a=Crud'">
    </div>
 </form>
 <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        config={
            minDate: "today",
            maxDate: new Date().fp_incr(14) // 14 days from now
        }
        flatpickr("input[type=date]", config)
        config2={
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            minTime: "9:00",
            maxTime: "16:00"
        }
        flatpickr("input[type=time]", config2)
    </script>
   
    <script src="assets/js/bootstrap.min.js"></script>
      
    </body>
</html>
