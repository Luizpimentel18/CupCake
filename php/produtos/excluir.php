<?php
// Conexão com o banco de dados
include '../configlogin.php';

// Excluir produto
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM produtos WHERE id = $id";
    mysqli_query($conn, $query);
}

header("Location: index.php");
?>
