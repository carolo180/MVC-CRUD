<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <title>Table</title>
</head>
<body>
<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Persona&a=Crud">Agregar Persona</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th >Id</th>
            <th>Nombre</th>
            <th>Tema</th>
            <th>FEcha y hora de la cita</th>
            <th>Agendada</th>
          
        
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->id; ?></td>
            <td><?php echo $r->names; ?></td>
            <td><?php echo $r->subject; ?></td>
            <td><?php echo $r->datetime; ?></td>
            <td><?php echo $r->scheduled; ?></td>
            
          
            <td>
                <i class="glyphicon glyphicon-edit"><a href="?c=Persona&a=Crud&id=<?php echo $r->id; ?>"> Editar</a></i>
            </td>
            <td>
                <i class="glyphicon glyphicon-remove"><a href="?c=Persona&a=Eliminar&id=<?php echo $r->id; ?>"> Eliminar</a></i>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</body>
</html>
