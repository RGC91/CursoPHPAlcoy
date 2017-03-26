<?php

require_once 'conexion.php';

try {
    $stmt = $pdo->prepare('
        SELECT * from books
        WHERE id=:id
    ');

    $stmt->execute([
        ':id' => $_GET['id']
    ]);
    $book = $stmt->fetch();

    $pdo = null;
    $stmt = null;

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() ."<br/>";
    die();
}

if($book){
    include 'views/show.php';
}else{
    echo 'Libro no encontrado';
}
