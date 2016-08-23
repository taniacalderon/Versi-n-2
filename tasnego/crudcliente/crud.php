
<?php




require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

$alm = new Alumno();
$model = new AlumnoModel();



if(isset($_REQUEST['tipo']))
{

    //switch($_REQUEST['action'])
	switch($_REQUEST['tipo'])
	//switch($tipo)
    {
        case 'actualizar':
            $alm->__SET('id_cliente',                   $_REQUEST['id_cliente']);
            $alm->__SET('nombre',      		        $_REQUEST['nombre']);
            $alm->__SET('password',       			    $_REQUEST['password']);
            $alm->__SET('N_documento',            $_REQUEST['N_documento']);
			$alm->__SET('telefono',           $_REQUEST['telefono']);
            $alm->__SET('direccion',       $_REQUEST['direccion']);
			$alm->__SET('correo',       $_REQUEST['correo']);

            $model->Actualizar($alm);
            //header('Location: index.html');
            header('Location: index.php');
            
			break;

        case 'registrar':
            // se añadio
			$alm->__SET('id_cliente',          			$_REQUEST['id_cliente']);
			$alm->__SET('nombre',         		    $_REQUEST['nombre']);
            $alm->__SET('password',       		        $_REQUEST['password']);
            $alm->__SET('N_documento',            $_REQUEST['N_documento']);
			$alm->__SET('telefono',           $_REQUEST['telefono']);
			$alm->__SET('direccion',       $_REQUEST['direccion']);
			$alm->__SET('correo',       $_REQUEST['correo']);

            $model->Registrar($alm);
            echo "Guardo el Registro Exitosamente";
			
			

			//header('Location: index.html');
            //header('Location: index.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id_cliente']);
			echo "Elimino el Registro Exitosamente";

           // header('Location: index.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['id_cliente']);
            break;
    }
}

?>
<style type="text/css">
body {
	background-image: url(../../imagenes%20de%20fondo/fondoperpetua2.gif);
}
</style>


       <marquee WIDTH=70% HEIGHT=40 BEHAVIOR=alternate> <div class=" navbar-header">
            <a href="../indice.html" class="navbar-brand"><FONT FACE="arial" COLOR="993393" SIZE="5">Pagina Anterior </FONT></a></div></marque>

