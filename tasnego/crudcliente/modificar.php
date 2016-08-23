<?php
require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

// Logica
$alm = new Alumno();
$model = new AlumnoModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('id_cliente',            	 	 $_REQUEST['id_cliente']);
            $alm->__SET('nombre',         			 $_REQUEST['nombre']);
            $alm->__SET('password',        				 $_REQUEST['password']);
			$alm->__SET('N_documento',             $_REQUEST['N_documento']);
            $alm->__SET('telefono',            $_REQUEST['telefono']);
            $alm->__SET('direccion',		 $_REQUEST['direccion']);
			$alm->__SET('correo',		 $_REQUEST['correo']);

            $model->Actualizar($alm);
            header('Location: modificar.php');
            break;

        case 'registrar':
            $alm->__SET('id_cliente',            	 	 $_REQUEST['id_cliente']);
            $alm->__SET('nombre',         			 $_REQUEST['nombre']);
            $alm->__SET('password',        				 $_REQUEST['password']);
			$alm->__SET('N_documento',             $_REQUEST['N_documento']);
            $alm->__SET('telefono',            $_REQUEST['telefono']);
            $alm->__SET('direccion',		 $_REQUEST['direccion']);
			$alm->__SET('correo',		 $_REQUEST['correo']);

            $model->Registrar($alm);
            header('Location: index.html');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id_cliente']);
            header('Location: index.html');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['id_cliente']);
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Anexsoft</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        <style type="text/css">
        body {
	background-image: url(../../imagenes%20de%20fondo/fondoperpetua2.gif);
}
        </style>
    <meta charset="utf-8">
    </head>
    <body >

        <div class="pure-g">
            <div class="pure-u-1-12">
                
                <form action="?action=<?php echo $alm->id_cliente > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
                    <input type="hidden" name="id_cliente" value="<?php echo $alm->__GET('id_cliente'); ?>" />
                    
                    <table >
                        <tr>
                            <th >nombre</th>
                            <td><input type="text" name="nombre" value="<?php echo $alm->__GET('nombre'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >password</th>
                            <td><input type="text" name="password" value="<?php echo $alm->__GET('password'); ?>"  /></td>
                        </tr>
						<tr>
                            <th >N_documento</th>
                            <td><input type="text" name="N_documento" value="<?php echo $alm->__GET('N_documento'); ?>"  /></td>
                        </tr>
						<tr>
                            <th >telefono</th>
                            <td><input type="text" name="telefono" value="<?php echo $alm->__GET('telefono'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >direccion</th>
                            <td><input type="text" name="direccion" value="<?php echo $alm->__GET('direccion'); ?>"  /></td>
                        </tr>
                        <tr>
						<tr>
                            <th >correo</th>
                            <td><input type="text" name="correo" value="<?php echo $alm->__GET('correo'); ?>"  /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>

                <table class="pure-table pure-table-horizontal">
                <table class="tabs" data-min="0" data-max="2">
    <td>
                    <thead>
                        <tr>
                            <th >nombre</th>
                            <th >password</th>
                            <th >N_documento</th>
                            <th >telefono</th>
							<th >direccion</th>
							<th >correo</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    </td>
                    <?php foreach($model->Listar() as $r): ?>
                    
                        <tr>
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            <td><?php echo $r->__GET('password'); ?></td>
                            <td><?php echo $r->__GET('N_documento'); ?></td>
							<td><?php echo $r->__GET('telefono'); ?></td>
                            <td><?php echo $r->__GET('direccion'); ?></td>
							<td><?php echo $r->__GET('correo'); ?></td>
                            <td>
                                <a href="?action=editar&id_cliente=<?php echo $r->id_cliente; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&id_cliente=<?php echo $r->id_cliente; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                   
                </table>     
              </div>
              </div>
            
<a href="index.html"> pagina anterior</a></p>
    </body>
</html>



