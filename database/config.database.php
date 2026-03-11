<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "dicionario_escolar";

$conn = new mysqli($host, $user, $password, $db);

if($conn->connect_error){
    die("Erro de conexão");
}

?>