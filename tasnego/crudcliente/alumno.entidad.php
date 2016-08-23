<?php
class Alumno
{
    private $id_cliente;
    private $nombre;
    private $password;
    private $N_documento;
    private $telefono;
	private $direccion;
	private $correo;

	
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>
