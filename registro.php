<?php

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$correo = isset($_POST['correo']) ? $_POST['correo'] : '';
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';

try {

    $conexion = new PDO("mysql:host=localhost;port=3306;dbname=mtb", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $pdo = $conexion->prepare('INSERT INTO `candidatos`(`id`, `nombre`, `correo`, `telefono`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')');
    $pdo->bindParam(1, $nombre);
    $pdo->bindParam(2, $correo);
    $pdo->bindParam(3, $telefono);
    $pdo->execute() or die(print($pdo->errorInfo()));

    echo json_encode('true');

} catch(PDOException $error) {
    echo $error->getMessage();
    die();
}