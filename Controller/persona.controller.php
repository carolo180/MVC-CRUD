<?php
require_once 'Model/persona.php';

class PersonaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Persona();
    }
    
    public function Index(){
        require_once 'View/ViewVerCitas.php';
        
    }
    public function Crud(){
        $alm = new Persona();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->getting($_REQUEST['id']);
        }
           
        require_once 'View/persona-editar.php';
      
    }

    public function Guardar(){
        $alm = new Persona();
     
        $alm->names = $_REQUEST['names'];
        $alm->subject = $_REQUEST['subject'];
        $alm->datetime = $_REQUEST['datetime'];
     
        // SI ID PERSONA ES MAYOR QUE CERO (0) INDICA QUE ES UNA ACTUALIZACIÓN DE ESA TUPLA EN LA TABLA PERSONA, SINO SIGNIFICA QUE ES UN NUEVO REGISTRO
        $alm->id > 0 
        ? $this->model->Actualizar($alm)
        : $this->model->Registrar($alm);

       //EL CÓDIGO ANTERIOR ES EQUIVALENTE A UTILIZAR CONDICIONALES IF, TAL COMO SE MUESTRA EN EL COMENTARIO A CONTINUACIÓN:

        /*if ($alm->idpersona > 0 ) {
            $this->model->Actualizar($alm);
        }
        else{
           $this->model->Registrar($alm); 
        }*/
        
        header('Location: index.php');
    }
    public function Eliminar(){
        $this->model->EliminarInModel($_REQUEST['id']);
        header('Location: index.php');
    }
}
