<?php

if ($_POST){
    require_once 'conexion.php';

    try {
        $stmt = $pdo->prepare('
            INSERT INTO books
            (title, author, description)
            VALUES
            (:title, :author, :description)
        ');

        var_dump($pdo);

        $stmt->execute([
            ':title' => $_POST['title'],
            ':author' => $_POST['author'],
            ':description' => $_POST['description']
        ]);

        $id = $pdo->lastInsertId();

        $pdo = null;
        $stmt = null;
        
        header("Location: show.php?id=$id");
        
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() ."<br/>";
        die();
    }

}

include 'views/new.php';