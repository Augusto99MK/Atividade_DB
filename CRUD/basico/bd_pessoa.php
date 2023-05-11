<?php
include "conectaBD.php";

// Recebendo dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    // Obtendo a conexão com o banco de dados
    $con = conectarBancoDeDados();

    // Inserindo os dados na tabela pessoa
    $query = "INSERT INTO pessoa (nome, email) VALUES ('$nome', '$email')";
    $result = mysqli_query($con, $query);

    // Verificar se a inserção foi bem-sucedida
    if ($result) {
        // Redirecionar de volta para create.php com um parâmetro de sucesso
        header("Location: criar_pessoa.php?success=1");
        exit();
    } else {
        echo "Erro ao criar pessoa: " . mysqli_error($con);
    }

    // Fechar conexão com o banco de dados
    mysqli_close($con);
}
