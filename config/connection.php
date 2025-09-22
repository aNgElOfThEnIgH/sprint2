<?php

$servername = "localhost";
$username = "root";
$password = "Senai@118";
$dbname = "empresa_x";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}
?>