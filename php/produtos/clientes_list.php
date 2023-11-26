<?php
session_start();
if(empty($_SESSION)){
    print "<script>location.href='../loginadmin.php';</script>";
}

// Verifica se o usuário está autenticado
//if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
//    header('Location: index.php');
//    exit();
//}

// Conexão com o banco de dados
include '../configlogin.php';

// Consulta para obter todos os clientes
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style_clients_list.css">
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
    <h1>Lista de Clientes</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <a href="admin_home.php">Voltar para a página inicial do Administrador</a>
</body>
</html>
