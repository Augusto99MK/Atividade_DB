<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CRUD Pessoa</title>
</head>

<body>
    <h1>CRUD Pessoa</h1>
    <a href="criar_pessoa.php">Criar nova pessoa</a>
    <table>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php
        include "bd_pessoa.php";
        // Conexão com o banco de dados
        $con = conectarBancoDeDados();

        // Query para selecionar todos os registros da tabela Pessoa
        $query = "SELECT * FROM pessoa";
        $result = mysqli_query($con, $query);

        // Loop pelos registros e exibição na tabela
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["id_pessoa"] . "</td>";
            echo "<td>" . $row["nome"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>";
            echo "<a href='atualizar_pessoa.php?id_pessoa=" . $row["id_pessoa"] . "'>Atualizar</a> ";
            echo "<a href='delete.php?id_pessoa=" . $row["id_pessoa"] . "'>Deletar</a>";
            echo "</td>";
            echo "</tr>";
        }

        // Fechar conexão com o banco de dados
        mysqli_close($con);
        ?>
    </table>
</body>

</html>