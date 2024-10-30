<?php
include 'conexao.php'; // Incluindo o arquivo de conexão

$sql = "SELECT * FROM cliente";
$stmt = $conn->prepare($sql); // Prepara a consulta
$stmt->execute(); // Executa a consulta

// Verifica se há clientes
if ($stmt->rowCount() > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nome</th><th>Endereço</th><th>Telefone</th><th>Email</th><th>Data de Nascimento</th><th>Ações</th></tr>";
    
    // Busca os resultados
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>" . htmlspecialchars($row["id_cliente"]) . "</td>
                <td>" . htmlspecialchars($row["nome"]) . "</td>
                <td>" . htmlspecialchars($row["endereco"]) . "</td>
                <td>" . htmlspecialchars($row["telefone"]) . "</td>
                <td>" . htmlspecialchars($row["e_mail"]) . "</td>
                <td>" . htmlspecialchars($row["data_nascimento"]) . "</td>
                <td>
                    <a href='editar.php?id_cliente=" . htmlspecialchars($row["id_cliente"]) . "'>Editar</a>
                    <a href='deletar.php?id_cliente=" . htmlspecialchars($row["id_cliente"]) . "' onclick='return confirm(\"Você tem certeza que deseja excluir este cliente?\");'>Excluir</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum cliente encontrado.";
}

// A conexão com PDO será fechada automaticamente ao final do script
?>
