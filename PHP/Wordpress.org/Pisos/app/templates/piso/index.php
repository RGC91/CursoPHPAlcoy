<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">

 <title>STOCK</title>

</head>

<body>
<h1>Relación de inmuebles por su dirección</h1>
<table>
        <tr>
            <td colspan="1" style="text-align: center;">Pisos</td>
            <td colspan="2" style="text-align: center;">Opciones</td>

        </tr>
<?php  foreach($pisos as $piso): ?>
 	<tr>
        <td>
            <p><a href="http://localhost/Pisos/piso/show/<?php echo($piso->getId());?>"><?= $piso->getDireccion() ;?></a></p>
        </td>
        <td>
   		    <p><a href="http://localhost/Pisos/piso/update/<?php echo($piso->getId());?>">Editar</a></p>
        </td>
        <td>
            <p><a href="http://localhost/Pisos/piso/delete/<?php echo($piso->getId());?>">Borrar</a></p>
        </td>
    </tr>
<?php endforeach ?>
</table>
<br>
<a target="_blank" href="http://localhost/Pisos/piso/create">Añadir un Inmueble</a>
</body>
</html>