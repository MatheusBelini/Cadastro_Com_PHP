<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoas</title>
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
</head>
<body>
    <h1>Cadastro de Pessoas</h1>
    <form action="salvar.php" method="POST">
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" maxlength="11" required>

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" id="endereco" required>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="idade">Idade:</label>
        <input type="number" name="idade" id="idade" required>

        <button type="submit">Salvar</button>
    </form>

    <h2>Lista de Pessoas</h2>
    <table border="1">
        <tr>
            <th>CPF</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Idade</th>
            <th>Ações</th>
        </tr>
        <?php
        include 'db.php';

        $sql = "SELECT * FROM pessoas";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['CPF']}</td>
                        <td>{$row['Nome']}</td>
                        <td>{$row['Endereco']}</td>
                        <td>{$row['Telefone']}</td>
                        <td>{$row['Email']}</td>
                        <td>{$row['Idade']}</td>
                        <td class='actions'>
                            <a href='editar.php?cpf={$row['CPF']}'>Editar</a> |
                            <a href='excluir.php?cpf={$row['CPF']}'>Excluir</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7' class='no-records'>Nenhum registro encontrado.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
