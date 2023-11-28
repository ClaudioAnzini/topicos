<?php
$hostname = 'database.hythelis.com';  
$username = 'topicos'; 
$password = 'Senha123@';
$database = 'topicos'; 

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

echo "<script>console.log('Conexão bem-sucedida!')</script>";

?>
