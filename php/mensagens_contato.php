<?php
session_start();

// Verifica se o usuário está autenticado
if(empty($_SESSION)){
    print "<script>location.href='loginadmin.php';</script>";
}

// Conexão com o banco de dados
include 'configlogin.php';

// Consulta para obter todas as mensagens de contato
$query = "SELECT * FROM mensagens_contato";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Mensagens de Contato</title>
    <link rel="stylesheet" type="text/css" href="./produtos/style.css">
    <link rel="stylesheet" type="text/css" href="style_mensagens_contato.css">
    <style>
        body {
            background-color: white;
            background-image: url(../imagens/cup3.jpg);
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
    <h1>Mensagens de Contato</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Mensagem</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['mensagem']}</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <a href="./produtos/admin_home.php">Voltar para a página inicial do Administrador</a>

</body>
</html>
