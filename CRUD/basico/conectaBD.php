<?php function conectarBancoDeDados()
{
    $con = mysqli_connect("localhost", "root", "", "atividadedb");

    // Verificar se houve erro na conexão
    if (mysqli_connect_errno()) {
        echo "Falha ao conectar ao banco de dados: " . mysqli_connect_error();
        exit();
    }

    return $con;
}
