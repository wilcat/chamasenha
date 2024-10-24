<?php
// Conexão com o banco de dados
$pdo = new PDO('mysql:host=localhost;dbname=sistema_senhas', 'root', '');

// Consultar a última senha chamada
$stmt = $pdo->prepare("SELECT numero, guiche FROM senhas ORDER BY id DESC LIMIT 1");
$stmt->execute();
$senhaAtual = $stmt->fetch(PDO::FETCH_ASSOC);

if ($senhaAtual) {
    // Retornar a senha e guichê em formato JSON
    echo json_encode([
        'senha' => $senhaAtual['numero'],
        'guiche' => $senhaAtual['guiche'] ?? 1  // O guichê pode ser fixo ou dinâmico
    ]);
} else {
    echo json_encode(['senha' => null, 'guiche' => null]);
}
?>
