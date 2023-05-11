<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Atualizar Pessoa</title>
</head>

<body>
    <h1>Atualizar Pessoa</h1>

    <?php
    include "conectaBD.php";

    // Verificar se o ID da pessoa foi fornecido via parâmetro GET
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id_pessoa"])) {
        $idPessoa = $_GET["id_pessoa"];

        // Obtendo a conexão com o banco de dados
        $con = conectarBancoDeDados();

        // Consultando os dados da pessoa com base no ID
        $query = "SELECT * FROM pessoa WHERE id_pessoa='$idPessoa'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $nome = $row["nome"];
            $email = $row["email"];

            // Exibindo o formulário preenchido com os dados existentes
            echo "<form method='POST' action='bd_atualiza_pessoa.php'>";
            echo "<input type='hidden' name='id_pessoa' value='$idPessoa'>";
            echo "<label for='nome'>Nome:</label>";
            echo "<input type='text' id='nome' name='nome' value='$nome'><br>";
            echo "<label for='email'>Email:</label>";
            echo "<input type='email' id='email' name='email' value='$email'><br>";
            echo "<input type='submit' value='Salvar'>";
            echo "</form>";
        } else {
            echo "Pessoa não encontrada.";
        }

        // Fechar conexão com o banco de dados
        mysqli_close($con);
    } else {
        echo "ID da pessoa não fornecido.";
    }
    ?>

</body>

</html>