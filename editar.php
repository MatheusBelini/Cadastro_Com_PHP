<?php
include 'db.php';

if (isset($_GET['cpf'])) {
    $cpf = $_GET['cpf'];
//     if (isset($_GET['cpf'])) {...}: Esta linha verifica se existe um parâmetro cpf na URL (por exemplo, editar.php?cpf=12345678901).
//      Se o CPF estiver presente, o código dentro do bloco será executado.
// $cpf = $_GET['cpf'];: Aqui, você armazena o valor do CPF obtido da URL na variável $cpf.
    $sql = "SELECT * FROM pessoas WHERE CPF='$cpf'";
    $result = $conn->query($sql);
    $pessoa = $result->fetch_assoc();

//     $sql = "SELECT * FROM pessoas WHERE CPF='$cpf'";: Esta linha constrói uma consulta SQL que seleciona todos os campos da tabela pessoas 
//     onde o CPF corresponde ao valor fornecido.
// $result = $conn->query($sql);: Aqui, a consulta SQL é executada usando a conexão com o banco de dados. O resultado da consulta é 
// armazenado na variável $result.
// $pessoa = $result->fetch_assoc();: A função fetch_assoc() recupera a próxima linha do resultado como um array associativo.
//  Assim, todos os dados da pessoa correspondente ao CPF são armazenados na variável $pessoa.
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pessoa</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box; /* Para garantir que o padding não afete a largura total */
        }

        button {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #4cae4c; /* Tom mais escuro ao passar o mouse */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #5bc0de;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1; /* Destacar a linha ao passar o mouse */
        }

        .actions a {
            text-decoration: none;
            color: #337ab7; /* Cor do link */
        }

        .actions a:hover {
            text-decoration: underline; /* Sublinhado ao passar o mouse */
        }

        .no-records {
            text-align: center;
            color: #999;
            font-style: italic;
        }
    </style>
<body>
    <h1>Editar Pessoa</h1>
    <form action="atualizar.php" method="POST">
        <input type="hidden" name="cpf" value="<?php echo $pessoa['CPF']; ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $pessoa['Nome']; ?>" required><br>

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" id="endereco" value="<?php echo $pessoa['Endereco']; ?>" required><br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone" value="<?php echo $pessoa['Telefone']; ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $pessoa['Email']; ?>" required><br>

        <label for="idade">Idade:</label>
        <input type="number" name="idade" id="idade" value="<?php echo $pessoa['Idade']; ?>" required><br>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
