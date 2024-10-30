<?php
include 'conexao.php'; // Incluindo o arquivo de conexão

if (isset($_GET['id_cliente'])) {
    $id_cliente = $_GET['id_cliente'];

    // Buscar os dados do cliente
    $sql = "SELECT * FROM cliente WHERE id_cliente = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $id_cliente); // Usando bindParam para PDO
    $stmt->execute();
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC); // Usando fetch do PDO

    if ($cliente) {
        // Formulário de edição
        ?>
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id_cliente" value="<?php echo htmlspecialchars($cliente['id_cliente']); ?>">
            Nome: <input type="text" name="nome" value="<?php echo htmlspecialchars($cliente['nome']); ?>"><br>
            Endereço: <input type="text" name="endereco" value="<?php echo htmlspecialchars($cliente['endereco']); ?>"><br>
            Telefone: <input type="text" name="telefone" value="<?php echo htmlspecialchars($cliente['telefone']); ?>"><br>
            Email: <input type="text" name="email" value="<?php echo htmlspecialchars($cliente['email']); ?>"><br>
            Data de Nascimento: <input type="date" name="data_nascimento" value="<?php echo htmlspecialchars($cliente['data_nascimento']); ?>"><br>
            <input type="submit" value="Atualizar">
        </form>
        <?php
    } else {
        echo "Cliente não encontrado.";
    }
} else {
    echo "ID do cliente não fornecido.";
}

// A conexão com PDO será fechada automaticamente ao final do script
?>
