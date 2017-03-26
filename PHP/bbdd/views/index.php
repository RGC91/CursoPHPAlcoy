<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis libros</title>
     <style type="text/css">
    table,tr,td,thead{
    border: 2px solid silver;
    }
</style>
</head>
<body>
<h1>Mis libros</h1>

<table>
    <tr>
        <th>Título</th>
        <th>Autor</th>
        <th>Acciones</th>
    </tr>
<?php foreach ($books as $book): ?>
    <tr>
        <td>
            <a href='show.php?id=<?= $book['id']; ?>'>
                <?= $book['title'] ?>
            </a>
        </td>
        <td>
            <?= $book['author'] ?>
        </td>
        <td>
            <a href='edit.php?id=<?= $book['id']; ?>'>
                Editar
            </a>
        </td>
    </tr>
<?php endforeach ?>
</table>

<p>
    <a href='new.php'>
        Añadir nuevo libro
    </a>
</p>

</body>
</html>