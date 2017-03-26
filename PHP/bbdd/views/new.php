<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir libro</title>
     <style type="text/css">
    table,tr,td,thead{
    border: 2px solid silver;
    }
</style>
</head>
<body>

<p>
    <a href="index.php">Mis libros</a>
    - Añadir libro
</p>

<form method="POST">
    <label for="title">Título</label>
    <input type="text" name="title" required
        value="" >

    <label for="author">Autor</label>
    <input type="text" name="author"
        value="">

    <label for="description">Description</label>
    <input type="text" name="description"
    value="">

    <input type="submit" value="Crear libro">
</form>


</body>
</html>