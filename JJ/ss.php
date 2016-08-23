<?php
			
session_start();
class sesion
{
	public $USUARIO;
	}

ini_set('display_errors','off');
ini_set ('display_startup_errors', 'off');
error_reporting(0);



$usuario=$_POST["USUARIO"];
$CLAVE=$_POST["CLAVE"];
$_SESSION["usuario"]=$usuario;

if(!isset($_SESSION["usuario"]) )
{


$_SESSION["usuario"]="invitado";
echo "el usuario actual es no esta registrado: ";
echo $_SESSION["usuario"];

}
else
{
$usuario=$_SESSION["usuario"];
echo "el usuario actual es : ".$_SESSION["usuario"];
echo $_SESSION[""];

}
if($_SESSION["usuario"]==="")
{
echo "Invitado";
} 

echo "<br>";
echo "<br>";
echo "<br>";

function conectarse ()
{
	if (! ($link=mysql_connect("localhost","root")))
	  {
		 echo "error conectando a la base de datos.";
		 exit(); 
		  }
		  if (!mysql_select_db("sesion",$link))
		  {
			 echo "error selecionado la base de datos.";
			 exit(); 
			  
			  }
			  return $link;

}

$con = conectarse ();
$query ="SELECT * FROM datos WHERE USUARIO ='".$usuario."' AND CLAVE = '".$CLAVE."' ";
$q = mysql_query($query,$con);
try{
	
	if(mysql_result ($q,0))
	{$result = mysql_result ($q,0);
	 echo "<h3>BIENVENID@ ... GRACIAS POR INGRESAR<h3>".$usuario;
	 }
	 else 
	     echo "<H3>usuario no esta en la base de datos<H3>";
	}
	catch (Exception $error)
{}
mysql_close($con);




?>
<html>
<body>
<p>&nbsp;</p>
<a href="sesion2.html"><p><img src="images.jpg" law="center" width="99" height="101" alt="law" action="POST"/></p></a>

</body>
</html>

