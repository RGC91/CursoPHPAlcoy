<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <title><? $pageTitle= $piso->getDireccion()?></title>
</head>

<body>
	<h1>Dirección:  <?= $piso->getDireccion() ?></h1>
	<h2>Precio:  <?= $piso->getPrecio() ?>€ </h2>
	<h3>Ciudad:   <?= $piso->getCiudad() ?></h3>
    <ul><p>Descripcion:</p>
    <li><?= $piso->getDescripcion() ?></li>
    </ul>

	<a target="" href="http://localhost/Pisos/piso/index">Volver a inicio</a>
</body>
</html>