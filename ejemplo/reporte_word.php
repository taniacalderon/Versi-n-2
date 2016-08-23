<?php
header ("content-type: application/vnd.ms-word");
header ("content-diposition: attachment; filename=../ejemplo/reporte_word.docx");

         $conexion=mysql_connect("localhost","root","");
         mysql_select_db("proyecto",$conexion);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>lista de usuario</title>
</head>

<body>

<table width="100%"  border="1" cellspacing="0"  celpadding="0">
<tr>
<td colspan="6" bgcolor="#33CCFF"><center><strong>REPORTE DE LA TABLA DE USUARIOS</strong></center></td>
</tr>
<tr bgcolor="#CCFF33">
<td><strong>id_cliente</strong></td>
<td><strong>nombre</strong></td>
<td><strong>password</strong></td>
<td><strong>N_documento</strong></td>
<td><strong>telefono</strong></td>
<td><strong>direccion</strong></td>
<td><strong>correo</strong></td>
</tr>
<?php
$sql=mysql_query("select id_cliente,nombre,password,N_documento,telefono,direccion,correo  from  tasnego");
while($res=mysql_fetch_array($sql))
{
	
$id_cliente=$_post["id_cliente"];
$nombre=$_post["nombre"];
$password=$_post["password"];
$N_documento=$_post["N_documento"];
$telefono=$_post["telefono"];
$direccion=$_post["direccion"];
$correo=$_post["correo"];




?>
<tr>
<td><?php echo $id_cliente ?></td>
<td><?php echo $nombre ?></td>
<td><?php echo $password ?></td>
<td><?php echo $N_documento ?></td>
<td><?php echo $telefono ?></td>
<td><?php echo $direccion ?></td>
<td><?php echo $correo ?></td>
</tr>
<?php
}
?>

</body>
</html>
