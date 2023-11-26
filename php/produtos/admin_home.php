<?php
session_start();
if(empty($_SESSION)){
    print "<script>location.href='../loginadmin.php';</script>";
}

include "../configlogin.php";
// Verifica se o usuário está autenticado
//if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
//    header('Location: login.php');
//    exit();
//}
    // Verifique se o botão "Sair" foi clicado
    if (isset($_POST['sair'])) {
        // Destrua a sessão
        session_destroy();

        // Redirecione para a página de login ou outra página desejada
        header("Location: ../loginadmin.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página Inicial do Administrador</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style_admin_home.css">
    
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
    <h1>
    <?php
        // Verifique se a variável de sessão "name" está definida
        if (isset($_SESSION["name"])) {
            // Use a classe "mensagem" para aplicar o estilo
            echo '<p class="mensagem">Olá, bem-vindo, ' . $_SESSION["name"] . '</p>';
        } else {
            echo '<p class="mensagem">Usuário não autenticado</p>';
        }
    ?></h1>

    <nav>
        <ul>
            <li><a href="index.php">Produtos</a></li>
            <li><a href="clientes_list.php">Lista de Clientes</a></li>
            <li><a href="../mensagens_contato.php">Mensagens de contato</a></li> <!-- Link fictício 1 -->
            <li><a href="#">Link 2</a></li> <!-- Link fictício 2 -->
            <br>
            <form method="post">
                <input type="submit" name="sair" value="Sair">
            </form>
        </ul>
    </nav>

    <!-- Conteúdo adicional da página inicial -->

</body>
</html>
