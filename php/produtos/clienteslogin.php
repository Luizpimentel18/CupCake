<?php
session_start();
if(empty($_SESSION)){
    print "<script>location.href='../loginpage.php';</script>";
}


// Conexão com o banco de dados
include '../configlogin.php';


// Consulta para obter todos os produtos
$query = "SELECT * FROM produtos";
$result = mysqli_query($conn, $query);

    // Verifique se o botão "Sair" foi clicado
    if (isset($_POST['sair'])) {
        // Destrua a sessão
        session_destroy();

        // Redirecione para a página de login ou outra página desejada
        header("Location: ../loginpage.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Produtos para Clientes</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style_clients.css">
    <style>
        body {
            background-color: white;
            background-image: url(../../imagens/cup3.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed
        }
        .mensagem {
            font-weight: bold;
            color: #ff0000;
            text-align: center;
            font-size: 1.5em;
        }

        form {
            text-align: center;
            color: brown;
        }

    </style>
</head>
<body>
    <h1>Produtos Disponíveis</h1>

    <?php
    // Verifique se a variável de sessão "name" está definida
    if (isset($_SESSION["name"])) {
        // Use a classe "mensagem" para aplicar o estilo
        echo '<p class="mensagem">Olá, ' . $_SESSION["name"] . '</p>';
    } else {
        echo '<p class="mensagem">Usuário não autenticado</p>';
    }
?>

    <h3>Veja nossos produtos e entre em contato pelo whatsapp (12) 9 8888-8888 para fazer o seu pedido!</h3>

    <div class="container clearfix">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='product'>";
            echo "<img src='../uploads/{$row['capa']}' alt='Capa'>";
            echo "<h3>{$row['nome']}</h3>";
            echo "<p>Valor: R$ {$row['valor']}</p>";
            echo "</div>";
        }
        ?>
    </div>

    
    <form method="post">
        <input type="submit" name="sair" value="Sair">
    </form>
    <h4>Estamos trabalhando para que a compra seja feita pelo site!</h4>
</body>
</html>
