<?php
session_start();
require_once "../config/database.php";

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // É recomendável usar filter_input para maior segurança
    $senha = $_POST['senha'] ?? '';
    $tipo = $_POST['tipo'] ?? '';

    if (empty($senha) || empty($tipo)) {
        echo json_encode([
            "success" => false,
            "message" => "Preencha todos os campos"
        ]);
        exit;
    }

    // CORREÇÃO: Adicionados os "?" e o nome correto das colunas
    $sql = "SELECT id_user, nome_user, tipo_user FROM user WHERE senha_user = ? AND tipo_user = ?";
    
    $stmt = $conn->prepare($sql);
    
    // "ss" significa que estamos enviando duas strings
    $stmt->bind_param("ss", $senha, $tipo);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $dadosUsuario = $result->fetch_assoc();

        // Salva informações úteis na sessão
        $_SESSION['id_user'] = $dadosUsuario['id_user'];
        $_SESSION['tipo_user'] = $dadosUsuario['tipo_user'];

        echo json_encode([
            "success" => true,
            "message" => "Login realizado com sucesso!"
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Dados incorretos. Verifique a senha e o tipo de conta."
        ]);
    }
    $stmt->close();
}
?>