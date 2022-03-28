<?php
class Citas
{
	private $pdo;
    public $id;
    public $names;
    public $subject;
    public $date;
    public $time;
   
    //metodo obligatorio, realiza el manejo de excepciones
	public function __CONSTRUCT()
	{
		try
		{   //a conexion le ejecuta el metodo startup y lo instancia en pdo 
			$this->pdo = Conexion::StartUp();     
		}
		catch(Exception $e)
		{  //si no, se maneja una excepcion y se guarda en $e
			//mata el proceso y muestra un mensaje
			die($e->getMessage());
		}
	}
  //hace la consulta a la base de datos y los enlista en la tabla
	public function Listar()
	{
		try
		{   //se define la variable result y se le especifica q sera de tipo array
			$result = array();
           //invoca la consulta y trae los datos
			$stm = $this->pdo->prepare("SELECT * FROM Citas");
			//la ejecuta
			$stm->execute();
             //PDO es una clase general q maneja todas las operaciones a la base de datos
			//fetchall convierte el arreglo en uno asociativo para mostrar los indices organizados
			 return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
       //metodo que busca y pinta los datos por el id del registro
    	public function getting($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM Citas WHERE id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	 //metodo que elimina los datos por el id del registro
    public function EliminarInModel($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM Citas WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	 //metodo que actualiza los datos por el id del registro
	public function Actualizar($data)
	{
		try 
		{ 
	//el signo de interrogacion hace referencia a una variable (lo q el reciba alli es lo q va acargar)
			$sql = "UPDATE Citas SET       
						names          = ?, 
						subject        = ?,
                        date        = ?,
						time        = ?
					
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
		//$data es el arrego que manipula y organiza los datos qu estan entrando como parametro 
				    array(
						$data->names, 
                        $data->subject,
                        $data->date,
						$data->time,
						$data->id
						
					)
				);
				
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    public function Registrar($data)
	{
		try 
		{
		$sql = "INSERT INTO `Citas` (names,subject,date,time) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->names,
                    $data->subject,
					$data->date,
					$data->time,
				                 
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

}
?>
