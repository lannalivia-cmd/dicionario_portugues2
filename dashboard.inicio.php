<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início - Login</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #e0f2f1; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .login-card { background: white; border-radius: 15px; width: 100%; max-width: 400px; }
        .btn-entrar { background-color: #00acc1; color: white; width: 100%; border: none; padding: 10px; border-radius: 5px; }
        .btn-entrar:hover { background-color: #00838f; color: white; }
    </style>
</head>
<body>

    <div class="login-card p-4 shadow-lg">
        <div class="text-center mb-4">
            <h3 class="mt-2">Dicionário escolar</h3>
            <p class="text-muted small">Aprender mais, para formar bem!</p>
        </div>

        <form id="loginForm" action="materias.php" method="POST">
            
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" class="form-control" id="senha" required>
            </div>

            <div class="mb-3">
                <select name="tipo" class="form-select" id="tipo" required>
                    <option value="" selected disabled>Selecione uma opção</option>
                    <option value="1">Sou aluno</option>
                    <option value="2">Sou professor</option>
                </select>
            </div>

            <button type="submit" class="btn-entrar">Entrar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            // Removi o e.preventDefault() para que ele permita o redirecionamento
            const btn = this.querySelector('button');
            btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Entrando...';
            
            // O navegador agora vai seguir o "action" do form e ir para materias.php
        });
    </script>
</body>
</html>