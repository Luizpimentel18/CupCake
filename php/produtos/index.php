<?php
session_start();
if(empty($_SESSION)){
    print "<script>location.href='../loginadmin.php';</script>";
}
// Conexão com o banco de dados
include '../configlogin.php';

// Consulta para obter todos os produtos
$query = "SELECT * FROM produtos";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciamento de Produtos</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style_index.css">
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
    <h1>Produtos</h1>

    <!-- Tabela para listar produtos -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Data</th>
            <th>Ações</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td><img src='../uploads/{$row['capa']}' alt='Capa' width='50'></td>";
            echo "<td>{$row['nome']}</td>";
            echo "<td>{$row['valor']}</td>";
            echo "<td>{$row['data']}</td>";
            echo "<td>
                    <a href='editar.php?id={$row['id']}'>Editar</a> |
                    <a href='excluir.php?id={$row['id']}'>Excluir</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>

    <a href="inserir.php">Inserir Produto</a>
    <br>
    <a href="admin_home.php">Voltar para a página inicial do Administrador</a>
</body>
</html>
