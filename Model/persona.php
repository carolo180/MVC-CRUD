<?php
class Citas
{
	private $pdo;
    public $id;
    public $names;
    public $subject;
    public $datetime;
    public $time;
   

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Conexion::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM Citas");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

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
	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE Citas SET       
						names          = ?, 
						subject        = ?,
                        datetime        = ?
					
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->names, 
                        $data->subject,
                        $data->datetime,
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
		$sql = "INSERT INTO `Citas` (names,subject,datetime) 
		        VALUES (?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->names,
                    $data->subject,
					$data->datetime,
				                 
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

}
?>
