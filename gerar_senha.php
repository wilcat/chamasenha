<?php
// Conexão com o banco de dados
$pdo = new PDO('mysql:host=localhost;dbname=sistema_senhas', 'root', '');

// Serviço selecionado
$servico = $_POST['servico'];

// Gerar nova senha
$stmt = $pdo->prepare("INSERT INTO senhas (numero, servico) VALUES ((SELECT IFNULL(MAX(numero), 0) + 1 FROM senhas), ?)");
$stmt->execute([$servico]);

// Obter a senha gerada
$senhaId = $pdo->lastInsertId();
$stmt = $pdo->prepare("SELECT numero FROM senhas WHERE id = ?");
$stmt->execute([$senhaId]);
$senha = $stmt->fetchColumn();

echo "Senha gerada: $servico $senha";
?>
