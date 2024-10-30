<?php
include 'conexao.php'; // Incluindo o arquivo de conexão

if (isset($_GET['id_cliente'])) {
    $id_cliente = $_GET['id_cliente'];

    // Preparar a consulta SQL
    $sql = "DELETE FROM cliente WHERE id_cliente = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_cliente);

    // Executar a consulta
    if ($stmt->execute()) {
        echo "Cliente excluído com sucesso!";
    } else {
        echo "Erro ao excluir cliente: " . $stmt->error;
    }

    // Fechar a conexão
    $stmt->close();
    $conn->close();
} else {
    echo "ID do cliente não fornecido.";
}
?>
