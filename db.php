<?php
$servername = "localhost"; // aqui colocamos o nome do servidor
$username = "root"; // aqui colocamos o nome do usuario
$password = ""; // aqui colocamos a senha
$dbname = "meu_banco"; //e aqui colocamos o nome do seu banco de dados que foi criado no mysql

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);
//pra gente criar a coneccao a gente cria uma variavel chamada $conn
// Esta variável armazena o objeto de conexão com o banco de dados. A função new mysqli() é usada para criar uma nova
// conexão ao banco de dados MySQL. Esta função aceita quatro parâmetros: o nome do servidor, o nome de usuario a senha e o nome
// do banco de dados

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
//nessa parte a gente ve se ouve algum erro na coneccao com o banco de dados, a propriedade connect_erro contem uma decricao do erro e uma mensagem que vai ser exibida e o 
//($conn->connect_error) e para detalhar o erro
?>
