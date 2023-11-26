<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $mensagem = htmlspecialchars($_POST["mensagem"]);

    // Configurações de e-mail
    $destinatario = "Cup@email.com"; 
    $assunto = "Nova mensagem de contato - CupMania";

    // Constrói a mensagem de e-mail
    $corpoMensagem = "Nome: $name\n";
    $corpoMensagem .= "E-mail: $email\n\n";
    $corpoMensagem .= "Mensagem:\n$mensagem";

    // Envia o e-mail
    //$enviado = mail($destinatario, $assunto, $corpoMensagem);

    // Insere a mensagem no banco de dados
    include 'configlogin.php';

    $query = "INSERT INTO mensagens_contato (name, email, mensagem) VALUES ('$name', '$email', '$mensagem')";
    $inserido = mysqli_query($conn, $query);

    if ($inserido) {
        // Mensagem de sucesso
        print "<script>alert('Mensagem enviada com sucesso!');</script>";
        print "<script>location.href='../html/contatos.html';</script>";
    } else {
        // Mensagem de erro
        print "<script>alert('Ocorreu um erro ao enviar a mensagem. Por favor, tente novamente.');</script>";
        //echo "Ocorreu um erro ao enviar a mensagem. Por favor, tente novamente.";
    }
} else {
    // Redireciona para a página de contato se o formulário não foi enviado
    header("Location: ../html/contatos.html");
    exit();
}
?>
