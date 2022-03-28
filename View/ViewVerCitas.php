<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
            <th>Fecha</th>
            <th>Hora</th>
            <th>Agendada</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->id; ?></td>
            <td><?php echo $r->names; ?></td>
            <td><?php echo $r->subject; ?></td>
            <td><?php echo $r->date; ?></td>
            <td><?php echo $r->time; ?></td>
            <td><?php echo $r->scheduled; ?></td>
            
          
            <td>
                <i class="glyphicon glyphicon-edit"><a href="?c=Persona&a=Crud&id=<?php echo $r->id; ?>"> Editar</a></i>
            </td>
            <td>
            <button type="button" data-bs-id="<?php echo $r->id; $r->names; ?><?php echo $r->names; ?>" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
            Eliminar
            </button>
              
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to delete next register?
        <h6 id="campId">id:,<br></br></h6>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger">
        <a href="?c=Persona&a=Eliminar&id=" id="data-bs-action" onclick="return alert('Registro Eliminado')"> Eliminar</a>
        </button>
      </div>    
    </div>
  </div>
</div>


<script>
    var deleteModal = document.getElementById('deleteModal')
    var camp = document.getElementById('data-bs-action')
    var campId = document.getElementById('campId')
    deleteModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var id = button.getAttribute('data-bs-id')
  var action=camp.getAttribute('href')
  var actions=campId.getAttribute('h6')

console.log(id)
console.log(action)

camp.setAttribute("href", action+id)
showid=`id:${id}`
campId.innerText=showid
             
  
})
</script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
