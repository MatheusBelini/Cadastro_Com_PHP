<?php
include 'db.php';
//isso tem que ter em todas as paginas para ligar com o banco

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //sta linha verifica se a requisição recebida é do tipo POST. 
    // Isso é importante porque este código deve ser executado apenas quando o 
    // formulário de cadastro é enviado. Se o formulário foi enviado corretamente,
    //  o código dentro deste bloco será executado se nao nao sera executado
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];
    // aqui voce captura os dados enviados e coloca eles dentro de uma variavel 
    // post e usado para enviar dados do servidor de um cadastro

    $sql = "UPDATE pessoas SET Nome='$nome', Endereco='$endereco', Telefone='$telefone', Email='$email', Idade=$idade WHERE CPF='$cpf'";
    // nessa linha voce adiciona a variavel sql o resultado da informacoes

    if ($conn->query($sql) === TRUE) {
        // Esta linha executa a consulta SQL armazenada em $sql usando o método query() da conexão $conn. Se a execução for
        //  bem-sucedida e um novo registro for criado, a condição será verdadeira
        echo "Registro atualizado com sucesso.";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
header("Location: index.php");
exit();
// aqui e para fechar a coneccao e para voltar para a pagina do index
?>
