<?php

$host = "TESTSERVER\SQLEXPRESS";
$dbname = "materiales_dev";
$username = "sa";
$password = "03210O9I";

try {
    $connection = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $username,
        $password
    );

    // Configurar PDO para mostrar errores
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Conexión exitosa"; // Solo para pruebas
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

?>