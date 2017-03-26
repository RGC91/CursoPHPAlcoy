<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <title>Listado de libros</title>
</head>
<body>
<h1>Listado de libros</h1>
<ul>
<?php  foreach($books as $book): ?>
 <li><a href=""><?= $book->getTitle() ;?></a></li>
<?php endforeach ?>
</ul>
</body>
</html>