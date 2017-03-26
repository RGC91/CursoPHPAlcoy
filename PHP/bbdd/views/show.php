<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?=$book['title']?></title>
     <style type="text/css">
    table,tr,td,thead{
    border: 2px solid silver;
    }
</style>
</head>
<body>

<p>
    <a href="index.php">Mis libros</a>
    - Mostrar libro
</p>

<h1><?=$book['title']?></h1>
<h2><?=$book['author']?></h2>
<p><?=$book['description']?></p>

<p>
    <a href="edit.php?id=<?=$book['id']?>">
        Editar
    </a>
</p>

</body>
</html>