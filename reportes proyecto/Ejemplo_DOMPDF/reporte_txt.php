<?php

		

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=Reporte_Personal_usuarios*.txt");


		$conexion=mysql_connect("localhost","root","");
		mysql_select_db("proyecto",$conexion);	


?>

		