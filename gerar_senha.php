<?php
// Conexão com o banco de dados
try {
    $pdo = new PDO('mysql:host=localhost;dbname=sistema_senhas', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

// Verifica se o serviço foi enviado
if (isset($_POST['servico'])) {
    $servico = $_POST['servico'];

    // Obter o próximo número de senha
    $stmt = $pdo->prepare("SELECT IFNULL(MAX(numero), 0) + 1 AS proxima_senha FROM senhas");
    $stmt->execute();
    $proximaSenha = $stmt->fetchColumn();

    // Inserir a nova senha no banco de dados
    $stmt = $pdo->prepare("INSERT INTO senhas (numero, servico) VALUES (?, ?)");
    $stmt->execute([$proximaSenha, $servico]);

    // Retornar a nova senha gerada
    echo $servico . ' ' . $proximaSenha;
} else {
    echo "Erro: Nenhum serviço selecionado.";
}
?>
