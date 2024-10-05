<?php
include 'db.php';

if (isset($_GET['cpf'])) {
    $cpf = $_GET['cpf'];
// if (isset($_GET['cpf'])) {...}: Esta linha verifica se existe um parâmetro cpf na URL 
// (por exemplo, excluir.php?cpf=12345678901). Se o CPF estiver presente, o código dentro do bloco será executado.
// $cpf = $_GET['cpf'];: Aqui, você armazena o valor do CPF obtido da URL na variável $cpf.

    $sql = "DELETE FROM pessoas WHERE CPF='$cpf'";
// $sql = "DELETE FROM pessoas WHERE CPF='$cpf'";: Esta linha constrói uma consulta SQL que irá excluir o registro da tabela pessoas
//  onde o CPF corresponde ao valor fornecido. O comando DELETE FROM é usado para remover registros de uma tabela.

    if ($conn->query($sql) === TRUE) {
        // if ($conn->query($sql) === TRUE): Esta linha executa a consulta SQL armazenada em $sql usando o método query() da conexão $conn.
        //  Se a execução for bem-sucedida e o registro for excluído, a condição será verdadeira.
        echo "Registro excluído com sucesso.";
    } else {
        echo "Erro: " . $conn->error;
        // se por acaso der um erro ele vai colocar o motivo do erro dentro da $conn para ser mais facil identificar
    }
}

$conn->close();
header("Location: index.php");
// aqui e para fechar a coneccao e para voltar para a pagina do index
exit();
?>
