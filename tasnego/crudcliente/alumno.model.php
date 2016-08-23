<?php

class AlumnoModel
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=proyecto', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
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

            $stm = $this->pdo->prepare("SELECT * FROM  tasnego");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Alumno();

                $alm->__SET('id_cliente', $r->id_cliente);
                $alm->__SET('nombre', $r->nombre);
                $alm->__SET('password', $r->password);
                $alm->__SET('N_documento', $r->N_documento);
                $alm->__SET('telefono', $r->telefono);
 			    $alm->__SET('direccion', $r->direccion);
				$alm->__SET('correo', $r->correo);

                $result[] = $alm;
            }

            return $result;	
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($id_cliente)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM tasnego WHERE id_cliente = ?");
                      

            $stm->execute(array($id_cliente));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new Alumno();

                $alm->__SET('id_cliente', $r->id_cliente);
                $alm->__SET('nombre', $r->nombre);
                $alm->__SET('password', $r->password);
                $alm->__SET('N_documento', $r->N_documento);
                $alm->__SET('telefono', $r->telefono);
 			    $alm->__SET('direccion', $r->direccion);

            return $alm;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($id_cliente)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM tasnego WHERE id_cliente = ?");                      

            $stm->execute(array($id_cliente));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(Alumno $data)
    {
        try 
        {
            $sql = "UPDATE tasnego SET 
                        nombre    	        = ?, 
                        password     		    = ?,
                        N_documento     	= ?,
						telefono    	= ?, 
                        direccion  = ?,
						correo  = ?
                   WHERE id_cliente = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('nombre'), 
                    $data->__GET('password'), 
                    $data->__GET('N_documento'),
					$data->__GET('telefono'),
                    $data->__GET('direccion'),
					$data->__GET('correo'),
                    $data->__GET('id_cliente')
                    )
                );
        } 
		catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Alumno $data)
    {
        try 
        {
        $sql = "INSERT INTO tasnego (id_cliente, nombre,password,N_documento,telefono,direccion,correo) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('id_cliente'), 
				$data->__GET('nombre'), 
                $data->__GET('password'), 
		        $data->__GET('N_documento'),
				$data->__GET('telefono'),
                $data->__GET('direccion'),
				$data->__GET('correo')
                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>