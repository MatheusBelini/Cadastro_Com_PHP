<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //  Esta linha verifica se a requisição recebida é do tipo POST. 
    //  Isso é importante porque este código deve ser executado apenas quando o 
    //  formulário de cadastro é enviado. Se o formulário foi enviado corretamente, o código dentro deste bloco será executado.
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];
    // Aqui, você está capturando os dados enviados pelo formulário (através do método POST)
    //  e armazenando-os em variáveis PHP. Cada variável corresponde a um campo do formulário:

    $sql = "INSERT INTO pessoas (CPF, Nome, Endereco, Telefone, Email, Idade) VALUES ('$cpf', '$nome', '$endereco', '$telefone', '$email', $idade)";
    // $sql = "INSERT INTO pessoas (...";: Esta linha constrói a consulta SQL para inserir um novo registro 
    // na tabela pessoas. O comando INSERT INTO é usado para adicionar novos dados:
    // (CPF, Nome, Endereco, Telefone, Email, Idade): Especifica as colunas na tabela onde os dados serão inseridos.
    // VALUES (...): Os valores a serem inseridos nas colunas correspondentes, que são retirados das variáveis capturadas do formulário.
    if ($conn->query($sql) === TRUE) {
        // Esta linha executa a consulta SQL armazenada em $sql usando o método query() da conexão $conn. Se a execução for bem-sucedida e um novo
        //  registro for criado, a condição será verdadeira.
        echo "Novo registro criado com sucesso.";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
//     } else {...}: Se ocorrer um erro na execução da consulta (por exemplo, se já existir um registro com o mesmo CPF), o
//      bloco else será executado.
// echo "Erro: " . $sql . "<br>" . $conn->error;: Aqui, uma mensagem de erro é exibida, mostrando a consulta SQL que
//  falhou e detalhando o erro ($conn->error), o que pode ser útil para depuração.
}

// $conn->close(); fechando o sistema
header("Location: index.php");
exit();
// voltando para o inicio
?>
