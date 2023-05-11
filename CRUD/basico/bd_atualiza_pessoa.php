<?php
include "conectaBD.php";

// Recebendo dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idPessoa = $_POST["id_pessoa"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    // Obtendo a conexão com o banco de dados
    $con = conectarBancoDeDados();

    // Atualizando os dados na tabela pessoa
    $query = "UPDATE pessoa SET nome='$nome', email='$email' WHERE id_pessoa='$idPessoa'";
    $result = mysqli_query($con, $query);

    // Verificar se a atualização foi bem-sucedida
    if ($result) {
        // Redirecionar de volta para index.php com um parâmetro de sucesso
        header("Location: index.php?success=1");
        exit();
    } else {
        echo "Erro ao atualizar pessoa: " . mysqli_error($con);
    }

    // Fechar conexão com o banco de dados
    mysqli_close($con);
}
