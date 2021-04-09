<?php
$link = 'mysql:host=localhost;dbame=entrenamiento';
$usuario = 'israel';
$password = 'password';

try{
    $pdo = new PDO($link, $usuario, $password);
    echo 'conectado a la base<br>';

}catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>