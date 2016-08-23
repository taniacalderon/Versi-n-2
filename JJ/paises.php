<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<?php
$paises = array(0=>'México','Venezuela','Colombia','Belice','Guatemala',
                 'Perú','Brasil','Panamá');
$tbHtml = "<table>
             <header>
                <tr>
                  <th>ID</th>
                  <th>País</th>
                </tr>
            </header>";
 
foreach($paises as $indice=>$valor)
  $tbHtml .= "<tr><td>$indice</td><td>$valor</td></tr>";
$tbHtml .= "</html>";
 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=paises.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $tbHtml;
?>
<body>
</body>
</html>