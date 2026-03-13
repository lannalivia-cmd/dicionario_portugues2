<?php
// 1. Inclui a conexão (Garanta que o config.php NÃO tenha HTML, apenas <?php)
include('config.php');

// 2. Avisa o navegador/Postman que o retorno é JSON
header('Content-Type: application/json');

// 3. Pega os dados enviados
$senha = $_POST['password'] ?? '';
$tipo  = $_POST['tipo'] ?? '';

// ... Sua lógica de verificação no banco aqui ...

if ($senha == "123" ) { // Exemplo simples
    echo json_encode([
        "success" => true, 
        "message" => "Login realizado com sucesso!"
    ]);
} else {
    echo json_encode([
        "success" => false, 
        "message" => "Senha incorreta."
    ]);
}
exit; // Essencial para não renderizar mais nada depois do JSON
?>