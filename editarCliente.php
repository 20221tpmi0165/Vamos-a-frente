<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM cliente WHERE id_cliente=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $cliente = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];

    $sql = "UPDATE cliente SET nome=?, endereco=?, telefone=?, email=?, data_nascimento=? WHERE id_cliente=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $nome, $endereco, $telefone, $email, $data_nascimento, $id);

    if ($stmt->execute()) {
        echo "Cliente atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar cliente: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!-- Formulário para editar o cliente -->
<form method="POST" action="atualizar.php">
    <input type="hidden" name="id" value="<?php echo $cliente['id_cliente']; ?>">
    <input type="text" name="nome" value="<?php echo $cliente['nome']; ?>" required>
    <input type="text" name="endereco" value="<?php echo $cliente['endereco']; ?>" required>
    <input type="text" name="telefone" value="<?php echo $cliente['telefone']; ?>" required>
    <input type="email" name="email" value="<?php echo $cliente['email']; ?>" required>
    <input type="date" name="data_nascimento" value="<?php echo $cliente['data_nascimento']; ?>" required>
    <input type="submit" value="Atualizar Cliente">
</form>
