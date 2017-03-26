<?php

require_once 'conexion.php';

try {
    $stmt = $pdo->prepare('SELECT * from books');
    $stmt->execute();
    $books = $stmt->fetchAll();

    $pdo = null;
    $stmt = null;
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

include 'views/index.php';