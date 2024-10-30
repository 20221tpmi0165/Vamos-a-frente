<?php

$host = 'localhost';
$port = '3306'; // Porta padrão para MySQL
$user = 'root';
$password = 'usbw';
$dbname = 'orcamento_construcao';
try {
    // Conexão usando PDO para MySQL
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão bem-sucedida!";
} catch(PDOException $e) {
    echo "Falha na conexão: " . $e->getMessage();
}
?>
