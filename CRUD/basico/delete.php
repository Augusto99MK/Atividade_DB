<?php
include "conectaBD.php";

// Verificar se o ID da pessoa foi fornecido via parâmetro GET
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id_pessoa"])) {
    $idPessoa = $_GET["id_pessoa"];

    // Obtendo a conexão com o banco de dados
    $con = conectarBancoDeDados();

    // Excluindo a pessoa da tabela Pessoa
    $query = "DELETE FROM pessoa WHERE id_pessoa='$idPessoa'";
    $result = mysqli_query($con, $query);

    // Verificar se a exclusão foi bem-sucedida
    if ($result) {
        echo "Pessoa excluída com sucesso!";
    } else {
        echo "Erro ao excluir pessoa: " . mysqli_error($con);
    }

    // Fechar conexão com o banco de dados
    mysqli_close($con);
} else {
    echo "ID da pessoa não fornecido.";
}
