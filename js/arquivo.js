document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Impede o recarregamento da página

    const btn = this.querySelector('button');
    const originalBtnText = btn.innerHTML;
    
    // 1. Feedback Visual: Botão de "Carregando"
    btn.disabled = true;
    btn.innerHTML = `
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        Validando acesso...
    `;

    // 2. Coleta dos dados do formulário
    const formData = new FormData(this);
    const tipoUsuario = document.getElementById('tipo').value;

    // 3. Chamada para a API PHP
    // Substitua 'api/login.php' pelo caminho real do seu arquivo
    fetch('api/login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) throw new Error('Erro na rede ou servidor');
        return response.json();
    })
    .then(data => {
        if (data.success) {
            // Sucesso! Redireciona conforme o perfil selecionado
            alert('Bem-vindo ao Dicionário Escolar!');
            
            if (tipoUsuario === 'aluno') {
                window.location.href = 'painel_aluno.php';
            } else {
                window.location.href = 'painel_professor.php';
            }
        } else {
            // Erro retornado pelo PHP (ex: senha errada)
            alert('Atenção: ' + data.message);
            resetButton(btn, originalBtnText);
        }
    })
    .catch(error => {
        console.error('Erro crítico:', error);
        alert('Ops! Ocorreu um erro técnico. Tente novamente mais tarde.');
        resetButton(btn, originalBtnText);
    });
});

// Função auxiliar para destravar o botão se algo der errado
function resetButton(btn, text) {
    btn.disabled = false;
    btn.innerHTML = text;
}