<?php

require_once 'conexion.php';

if($_POST){
    try {
        $stmt = $pdo->prepare('
            UPDATE books SET
            title=:title,
            author=:author,
            description=:description
            WHERE id=:id
        ');

        $stmt->execute([
            ':id' => $_POST['id'],
            ':title' => $_POST['title'],
            ':author' => $_POST['author'],
            ':description' => $_POST['description'],
        ]);

        $pdo = null;
        $stmt = null;

    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() ."<br/>";
        die();
    }
    header("Location: show.php?id={$_POST['id']}");
}else{
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
}

include 'views/edit.php';
