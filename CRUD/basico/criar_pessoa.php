<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Criar Pessoa</title>
</head>

<body>
    <h1>Criar Pessoa</h1>
    <form method="POST" action="bd_pessoa.php">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome"><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>
        <input type="submit" value="Salvar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["success"])) {
        echo "<p>Cadastro realizado com sucesso!</p>";
    }
    ?>

</body>

</html>