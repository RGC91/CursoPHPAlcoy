<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar: <?=$book['title']?></title>
     <style type="text/css">
    table,tr,td,thead{
    border: 2px solid silver;
    }
</style>
</head>
<body>

<p>
    <a href="index.php">Mis libros</a>
    - Editar libro
</p>

<form method="POST">
    <input type="hidden" name="id"
        value="<?=$book['id'] ?>">

    <label for="title">Título</label>
    <input type="text" name="title" required
        value="<?=$book['title'] ?>">

    <label for="author">Autor</label>
    <input type="text" name="author"
        value="<?=$book['author'] ?>">

    <label for="description">Description</label>
    <input type="text" name="description"
        value="<?= $book['description'] ?>">

    <input type="submit" value="Editar libro">
</form>

</body>
</html>