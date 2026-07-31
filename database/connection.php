<?php

header('Content-Type: application/json');
/*
$host = "TESTSERVER\SQLEXPRESS";
$dbname = "materiales_dev";
$username = "sa";
$password = "03210O9I";
*/
/*
$host = "localhost";
$db   = "LimpiezaAlfombra";
$user = "root";      // usuario por defecto en XAMPP
$pass = "";          // contraseña vacía por defecto
$port = 3307;
$charset = "utf8mb4";
*/
$host = "localhost";
$db   = "LimpiezaAlfombra";
$user = "root";      // usuario por defecto en XAMPP
$pass = "";          // contraseña vacía por defecto
$port = 3306;
$charset = "utf8mb4";

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

try {
    $conn = new PDO($dsn, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Error de conexión a la base de datos',
        'detalle' => $e->getMessage() // útil mientras desarrollas
    ]);
    exit;
}

?>