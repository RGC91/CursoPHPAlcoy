<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <title><? $pageTitle= $book->getTitle()?></title>
</head>
<body>
<h1><?= $book->getTitle() ?></h1>
<h2><?= $book->getAuthor() ?></h2>
<p><?= $book->getDescription() ?></p>
</body>
</html>