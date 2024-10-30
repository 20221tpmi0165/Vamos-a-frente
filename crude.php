<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <!-- Link para seu arquivo CSS -->
    <title>Adicionar Cliente</title>
</head>
<body>
    <form method="POST" action="criar.php">
        <label for="id_cliente">ID do Cliente:</label>
        <input type="text" name="id_cliente" required><br>
        
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>
        
        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" required><br>
        
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" required><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        
        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" required><br>
        
        <button type="submit">Adicionar Cliente</button>
    </form>
</body>
</html>
