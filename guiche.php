<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Chamamento de Senha - Guichê</title>
    <style>
        button {
            font-size: 20px;
            padding: 15px 30px;
        }
    </style>
</head>
<body>

    <h1>Guichê - Chamar Próxima Senha</h1>
    <button onclick="chamarSenha()">Chamar Próxima Senha</button>

    <h2 id="senhaChamada"></h2>

    <script>
        function chamarSenha() {
            fetch('chamar_senha.php')
                .then(response => response.json())
                .then(data => {
                    if (data.senha && data.guiche) {
                        document.getElementById('senhaChamada').innerText = `Senha ${data.senha} - Guichê ${data.guiche}`;
                        // Falar a senha e o guichê
                        falarTexto(`Senha ${data.senha}, por favor dirija-se ao guichê ${data.guiche}`);
                    } else {
                        document.getElementById('senhaChamada').innerText = "Nenhuma senha a ser chamada.";
                    }
                })
                .catch(error => console.error('Erro ao chamar a senha:', error));
        }

        function falarTexto(texto) {
            const synth = window.speechSynthesis;
            const utterance = new SpeechSynthesisUtterance(texto);
            utterance.lang = 'pt-BR';  // Define o idioma como português do Brasil
            synth.speak(utterance);
        }
    </script>

</body>
</html>
