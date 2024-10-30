<?php
echo include 'conexao.php'; // Inclui a conexão com o banco

// Consulta para selecionar todos os clientes
$sql = "SELECT id_cliente, nome, endereco, telefone, e_mail, data_nascimento FROM cliente";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Clientes Cadastrados</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Data de Nascimento</th>
            <th>Ações</th>
        </tr>
        <?php if ($result->rowCount() > 0): ?> <!-- Alterado para rowCount() -->
            <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?> <!-- Usando fetch() do PDO -->
                <tr>
                    <td><?php echo $row['id_cliente']; ?></td>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo $row['endereco']; ?></td>
                    <td><?php echo $row['telefone']; ?></td>
                    <td><?php echo $row['e_mail']; ?></td> <!-- Corrigido para e_mail -->
                    <td><?php echo $row['data_nascimento']; ?></td>
                    <td>
                        <a href="atualizar.php?id=<?php echo $row['id_cliente']; ?>">Editar</a> |
                        <a href="excluir.php?id=<?php echo $row['id_cliente']; ?>">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="7">Nenhum cliente cadastrado.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>

<!-- Removido o método close() -->
