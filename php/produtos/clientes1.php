<?php
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
    </style>
</head>
<body>
    <h1>Produtos Disponíveis</h1>

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

    <a href="../loginpage.php">Voltar para página inicial.</a>
</body>
</html>
