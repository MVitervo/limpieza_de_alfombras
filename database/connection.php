<?php

// header('Content-Type: application/json');

/*
$host = "TESTSERVER\SQLEXPRESS";
$dbname = "materiales_dev";
$username = "sa";
$password = "03210O9I";
*/

$host = "VITERVO\SQLEXPRESS";
$dbname = "LimpiezaAlfombras";
// $username = ""; // cuando no es necesario un usuario ni la contraseña entonces esto no es necesario
// $password = "";

/*
$host = "TESTSERVER\SQLEXPRESS";
$dbname = "materiales_dev";
$username = "sa"; // cuando no es necesario un usuario ni la contraseña entonces esto no es necesario
$password = "03210O9I";
*/


/*
mysql
$host = "localhost";
$db   = "materiales_dev";
$user = "sa";      // usuario por defecto en XAMPP
$pass = "03210O9I";          // contraseña vacía por defecto
$port = 3307;
$charset = "utf8mb4";
*/

/*
mysql
$host = "localhost";
$db   = "LimpiezaAlfombra";
$user = "root";      // usuario por defecto en XAMPP
$pass = "";          // contraseña vacía por defecto
$port = 3306;
$charset = "utf8mb4";
*/

// $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
$dsn = "sqlsrv:Server=$host;Database=$dbname";

try {
    // $conn = new PDO($dsn, $username, $password); // trabajo
    $conn = new PDO($dsn, null, null); // local
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    return $conn;
} catch (PDOException $e) {
    throw new Exception(
        'Error de conexión a la base de datos: ' . $e->getMessage()
    );
}

?>