<?php
include 'conexao.php'; // Incluindo o arquivo de conexão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Exemplo de uso da conexão
    if ($conn) {
        // Obtenha os dados do formulário
        $id_cliente = $_POST['id_cliente'];
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $data_nascimento = $_POST['data_nascimento'];

        // Preparar a consulta SQL
        $sql = "INSERT INTO cliente (id_cliente, nome, endereco, telefone, email, data_nascimento) VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $id_cliente, $nome, $endereco, $telefone, $email, $data_nascimento);

        // Executar a consulta
        if ($stmt->execute()) {
            echo "Cliente adicionado com sucesso!";
        } else {
            echo "Erro ao adicionar cliente: " . $stmt->error;
        }

        // Fechar a conexão
        $stmt->close();
        $conn->close();
    } else {
        echo "Erro na conexão: " . $conn->connect_error;
    }
}
?>
