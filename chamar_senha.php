<?php
// Conexão com o banco de dados
$pdo = new PDO('mysql:host=localhost;dbname=sistema_senhas', 'root', '');

// Buscar a próxima senha
$stmt = $pdo->prepare("SELECT * FROM senhas WHERE status = 'esperando' ORDER BY id ASC LIMIT 1");
$stmt->execute();
$senha = $stmt->fetch();

if ($senha) {
    // Associar senha a um guichê
    $guiche = $_POST['guiche'];
    $stmt = $pdo->prepare("UPDATE senhas SET status = 'atendido', guiche = ? WHERE id = ?");
    $stmt->execute([$guiche, $senha['id']]);

    echo json_encode(['senha' => $senha['numero'], 'guiche' => $guiche]);
} else {
    echo "Nenhuma senha na fila.";
}
?>
