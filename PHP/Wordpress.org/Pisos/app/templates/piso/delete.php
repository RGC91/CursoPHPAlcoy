<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <title>STOCK</title>
</head>

<body>
	<p><?php echo ($message); ?><p>
	<h1>Relación de Inmuebles</h1>
<ul>
	<?php  foreach($pisos as $piso): ?>
 	<li><p><?= $piso->getDireccion() ;?></p></li>
	<?php endforeach ?>
</ul>
<a target="" href="http://localhost/Pisos/piso/index">Volver a inicio</a>

</body>
</html>