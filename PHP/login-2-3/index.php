<?php

session_start();
//echo password_hash("mi_clave", PASSWORD_DEFAULT);
function validateForm(){
    $errors = [];
    if(strlen(trim($_POST['username'])) < 6){
        $errors[] = 'El nombre de usuario debe tener, al menos, 6 caracteres.';
    }
    if(strlen(trim($_POST['password'])) < 6){
        $errors[] = 'La clave de usuario debe tener, al menos, 6 caracteres.';
    }
    return $errors;
}
function tryLogin($user, $password){
    $register_username = 'mi_nombre';
    $register_password = '$2y$10$QaDIm4FjK/5g2MYk3RMXq.4up1tTODevadJd9uvueQ5DuKiZsgkYe';
    if ($user === $register_username && password_verify($password, $register_password)){
        $_SESSION['username'] = $user;        
    }
    
}
if (!empty($_POST)){
    $errors = validateForm();
    if(empty($errors)){
        tryLogin($_POST['username'], $_POST['password']);
    }
}
// if (true === $userIsRegister){
//     include 'welcome.php';
// } else {
//     if (!empty($_POST)){
//         $errors[] = 'Nombre de usuario o clave
//         incorrecta';
//     }
//     include 'form.php';
// }

if (!empty($_SESSION['username'])){
    include 'welcome.php';
} else {
    if (!empty($_POST)){
        $errors[] = 'Nombre de usuario o clave
        incorrecta';
    }
    include 'form.php';
}