<?php
session_start();
if(empty($_SESSION)){
    print "<script>location.href='../loginadmin.php';</script>";
}
// Conexão com o banco de dados
include '../configlogin.php';

// Processar o formulário de inserção
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $data = $_POST['data'];

    // Manipulação da imagem
    $capa = $_FILES['capa']['name'];
    $capa_temp = $_FILES['capa']['tmp_name'];
    move_uploaded_file($capa_temp, "../uploads/$capa");

    // Inserção no banco de dados
    $query = "INSERT INTO produtos (capa, nome, valor, data) VALUES ('$capa', '$nome', '$valor', '$data')";
    mysqli_query($conn, $query);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Inserir Produto</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style_admin.css">
    <style>
        body {
            background-color: white;
            background-image: url(../../imagens/cup3.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed
        }
    </style>
</head>
<body>
<h3>
    <?php
        // Verifique se a variável de sessão "name" está definida
        if (isset($_SESSION["name"])) {
            // Use a classe "mensagem" para aplicar o estilo
            echo '<p class="mensagem"> ' . $_SESSION["name"] . '</p>';
        } else {
            echo '<p class="mensagem">Usuário não autenticado</p>';
        }
    ?></h3>
    <h1>Inserir Produto</h1>

    <!-- Formulário para inserir produto -->
    <form action="inserir.php" method="post" enctype="multipart/form-data">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="valor">Valor:</label>
        <input type="text" name="valor" required><br>

        <label for="data">Data:</label>
        <input type="date" name="data" required><br>

        <label for="capa">Imagem:</label>
        <input type="file" name="capa" accept="image/*" required><br>

        <input type="submit" value="Inserir Produto">
    </form>

    <a href="index.php">Voltar para a Lista de Produtos</a>
</body>
</html>
