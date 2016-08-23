

 <?php session_start() ?>
<?php if(isset($_SESSION['nombre']))
{
?>
<style type="text/css">
body {
	background-image: url(../imagenes%20de%20fondo/fondoperpetua2.gif);
	background-repeat: repeat;
}
</style>


 <H3><h1>BIENVENID@    <H3> <?php echo $_SESSION['nombre'] ?></h1>
<?php 
}else{
 header("Location: index.php");
}

?>
	<html>
	<a href="../tasnego/tiendatasnego.html">
	<h1>Observe los productos	</h1>
	</a>