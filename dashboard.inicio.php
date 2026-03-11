<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="login-card p-4 shadow-lg">
        <div class="text-center mb-4">
            <i class="bi bi-lightning-charge-fill" ></i>
            <h3 class="mt-2">Dicionário escolar</h3>
            <p class="text-muted small">Aprender mais, para formar bem!</p>
        </div>
  <form>
   
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Senha</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    
</form>
   
    </style>
       <div class="mb-3 select-box">
<select class="form-select">
<option selected>Selecione uma opção</option>
<option value="1">Sou aluno</option>
<option value="2">Sou professor</option>
</select>
</div>
<button type="button-1" class="btn btn-outline-info">Entrar</button>
<script src="assets/js/login.js">
 
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script >
document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Impede a página de recarregar

    // Pegamos os dados do formulário
    const formData = new FormData(this);

    // Fazemos a chamada para a sua API PHP
    fetch('caminho/para/seu/arquivo_login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json()) // Converte a resposta para JSON
    .then(data => {
        if (data.success) {
            alert(data.message);
            // Redireciona conforme o tipo de usuário
            if (document.getElementById('tipo').value === 'aluno') {
                window.location.href = 'painel_aluno.php';
            } else {
                window.location.href = 'painel_professor.php';
            }
        } else {
            // Exibe o erro (ex: "Preencha todos os campos" ou "Senha incorreta")
            alert('Erro: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Erro na requisição:', error);
        alert('Ocorreu um erro ao tentar entrar.');
    });
});
</script>
</html>