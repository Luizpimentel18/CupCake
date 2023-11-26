<?php
session_start();
if(empty($_SESSION)){
    print "<script>location.href='../loginadmin.php';</script>";
}
// Conexão com o banco de dados
include '../configlogin.php';

// Obter dados do produto a ser editado
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM produtos WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $produto = mysqli_fetch_assoc($result);
} else {
    header("Location: index.php");
}

// Processar o formulário de edição
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $data = $_POST['data'];

    // Atualização no banco de dados
    $query = "UPDATE produtos SET nome='$nome', valor='$valor', data='$data' WHERE id=$id";
    mysqli_query($conn, $query);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
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
<?php
        // Verifique se a variável de sessão "name" está definida
        if (isset($_SESSION["name"])) {
            // Use a classe "mensagem" para aplicar o estilo
            echo '<p class="mensagem"> ' . $_SESSION["name"] . '</p>';
        } else {
            echo '<p class="mensagem">Usuário não autenticado</p>';
        }
    ?></h3>
    <h1>Editar Produto</h1>

    <!-- Formulário para editar produto -->
    <form action="editar.php?id=<?php echo $id; ?>" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required><br>

        <label for="valor">Valor:</label>
        <input type="text" name="valor" value="<?php echo $produto['valor']; ?>" required><br>

        <label for="data">Data:</label>
        <input type="date" name="data" value="<?php echo $produto['data']; ?>" required><br>

        <input type="submit" value="Salvar Alterações">
    </form>

    <a href="index.php">Voltar para a Lista de Produtos</a>
</body>
</html>
