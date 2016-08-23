<?php

		require_once("dompdf/dompdf_config.inc.php");
		$conexion=mysql_connect("localhost","root","");
		mysql_select_db("proyecto",$conexion);


$codigoHTML='

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="6" bgcolor="blue"><CENTER><strong>REPORTE DE LA TABLA USUARIOS</strong></CENTER></td>
  </tr>
  <tr bgcolor="red">
    <td><strong>id_cliente</strong></td>
    <td><strong>nombre</strong></td>
    <td><strong>password</strong></td>
    <td><strong>N_documento</strong></td>
    <td><strong>telefono</strong></td>
    <td><strong>direccion</strong></td>
	<td><strong>correo</strong></td>
  </tr>';
  


$sql=mysql_query("select * from tasnego");
while($res=mysql_fetch_array($sql)){
$codigoHTML.='	
	<tr>
		<td>'.$res['id_cliente'].'</td>
		<td>'.$res['nombre'].'</td>
		<td>'.$res['password'].'</td>
		<td>'.$res['N_documento'].'</td>
		<td>'.$res['telefono'].'</td>
		<td>'.$res['direccion'].'</td>	
		<td>'.$res['correo'].'</td>			
	</tr>';
	
}
$codigoHTML.='
</table>
</body>
</html>';
$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Reporte_tabla_usuarios.pdf");
?>