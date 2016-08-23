<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte_Personal_usuarios.xls");


		$conexion=mysql_connect("localhost","root","");
		mysql_select_db("proyecto",$conexion);		


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LISTA DE USUARIOS</title>
</head>
<body>
<table width="100%" border="2" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="6" bgcolor="skyblue"><CENTER><strong>REPORTE DE LA TABLA USUARIOS</strong></CENTER></td>
  </tr>
  <tr bgcolor="blue">
    <td bgcolor="#009933"><strong>id_cliente</strong></td>
    <td><strong>nombre</strong></td>
    <td><strong>password</strong></td>
    <td><strong>N_documento</strong></td>
    <td><strong>telefono</strong></td>
    <td><strong>direccion</strong></td>
    <td><strong>correo</strong></td>
  </tr>
  
<?PHP
		
$sql=mysql_query("select id_cliente,nombre,password,N_documento,telefono,direccion,correo from tasnego");
while($res=mysql_fetch_array($sql)){		

	$id_cliente=$res["id_cliente"];
	$nombre=$res["nombre"];
	$password=$res["password"];
	$N_documento=$res["N_documento"];
	$telefono=$res["telefono"];
	$direccion=$res["direccion"];	
	$correo=$res["correo"];				

?>  
 <tr>
	<td><?php echo $id_cliente; ?></td>
	<td><?php echo $nombre; ?></td>
	<td><?php echo $password; ?></td>
	<td><?php echo $N_documento; ?></td>
	<td><?php echo $telefono; ?></td>
	<td><?php echo $direccion; ?></td>        
    <td><?php echo $correo; ?></td>                 
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>