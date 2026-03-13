<?php

session_start();
require_once '../config/database.php';

header('Content-Type: application/json');

// if (!isset($_SESSION['user_id'])) {
//     echo json_encode(["success" => false, "message" => "Acesso negado."]);
//     exit;
// }
$method = $_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':
        $sql = "SELECT nome_palavra, descricao_palavra, categoria_palavra FROM palavras";
    $result = $conn -> query($sql);
    $blocos = [];


if ($result){
    while($row = $result->fetch_assoc()){
        $blocos[]=$row;
    }
}
echo json_encode(["success" => true, "data" => $blocos]);
break;
//criar

case 'POST':
    $data = json_decode(file_get_contents("php://input"));
    if(!isset($data->nome)|| !isset($data->descricao)){
        echo json_encode(["success" => false, "message" => "Dados incompletos. Informe nome e descrição."]);
        exit;
    }
    $nome = $conn->real_escape_string(trim($data->nome));
    $descricao = $conn->real_escape_string(trim($data->descricao));
    $categoria = $conn->real_escape_string(trim($data->categoria));

    $sql = "INSERT INTO palavras (nome_palavra,descricao_palavra, categoria_palavra) VALUES ('$nome', '$descricao', '$categoria')";
    if($conn->query($sql)=== TRUE){
        echo json_encode(["success" => true, "message" => "Palavra adicionada com sucesso!", "id_palavra" => $conn->insert_id]);
    } else {
        echo json_encode(["success"=> false, "message" => "Erro ao adicionar palavra " . $conn->error]);
    }
    break;
}


?>