<?php
define('FPDF_FONTPATH','fpdf/font/');
require_once('fpdf/fpdf.php');
class PDF extends FPDF
{
function tabla($tasnego,$datos)
{
$this->tasnego ($tasnego) ;
$this->datos($datos);
}
function tasnego($tasnego)
{
//Cabecera
$this->SetFont('Arial','B',15);

foreach($tasnego as $columna) {
$this->Cell(40,7,$columna ,1, 0 , ' C ' ) ;
}
$this->Ln();
}
function datos($datos)
{
//Datos
$this->SetFont('Arial','',12);
foreach ($datos as $dato) {
foreach ($dato as $columna) {
$this->Cell(40,7,$columna,1,0,' C ');
}
$this->Ln () ;
}
}
}
$pdf = new PDF () ;
$pdf->AddPage () ;
$tasnego = array("nombre","password","N_documento","telefono","direccion","correo");
$datos = array(array("administrador ","123","2147483647","321564987","trans 21#14a 03","tacalndn@gmail.com"),
array("yesica", "1" , "1006809015", "5257272","cra 39 este #43-39","ymromero51@misena.edu.co") ,
array("tania","12345","990106116941","3203670154","calle 4#15-12","tacalderon1@misena.edu.co")) ;
$pdf->tabla($tasnego,$datos);
$pdf->Output () ;

?>