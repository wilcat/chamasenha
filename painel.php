<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Painel de Chamamento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        h1 {
            font-size: 60px;
        }
        h2 {
            font-size: 40px;
        }
        .guiche {
            color: red;
        }
    </style>
</head>
<body>

    <h1>Senha Atual: <span id="senhaAtual"></span></h1>
    <h2>Guichê: <span id="guicheAtual" class="guiche"></span></h2>

    <script>
        // Função para buscar a senha mais recente chamada
        function atualizarPainel() {
            fetch('obter_senha_chamada.php')
                .then(response => response.json())
                .then(data => {
                    if (data.senha && data.guiche) {
                        document.getElementById('senhaAtual').innerText = data.senha;
                        document.getElementById('guicheAtual').innerText = data.guiche;
                    }
                })
                .catch(error => console.error('Erro ao buscar a senha:', error));
        }

        // Atualizar o painel a cada 10 segundos
        setInterval(atualizarPainel, 10000);

        // Atualizar imediatamente ao carregar a página
        atualizarPainel();
    </script>

</body>
</html>
