<?php
include 'conexao.php'; // Incluindo o arquivo de conexão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente = $_POST['id_cliente'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];

    // Preparar a consulta SQL
    $sql = "UPDATE cliente SET nome = ?, endereco = ?, telefone = ?, e_mail = ?, data_nascimento = ? WHERE id_cliente = ?";
    $stmt = $conn->prepare($sql);
    
    // Execute the statement with the parameters
    if ($stmt->execute([$nome, $endereco, $telefone, $email, $data_nascimento, $id_cliente])) {
        echo "Cliente atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar cliente: " . $stmt->errorInfo()[2]; // Usando errorInfo() para obter detalhes do erro
    }

    // Fechar a conexão (não é necessário)
    // $conn->close(); // Remova esta linha
}
?>
