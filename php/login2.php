<?php
    session_start();

  if(empty($_POST) or (empty($_POST["name"]) or (empty($_POST["email"]) or (empty($_POST["password"]))))){
    print "<script>location.href='loginpage.php';</script>";
  }

    include "configlogin.php";

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];


    $sql = "SELECT * FROM users WHERE name = '{$name}' AND email = '{$email}' AND password = '".md5($password)."'";

    $res = $conn->query($sql) or die($conn->error);

    $row = $res->fetch_object();
    
    $qtd = $res->num_rows;

    if($qtd > 0){
      $_SESSION["name"] = $name;
      $_SESSION["email"] = $email;
      //$_SESSION["tipo"] = $row->tipo;
      print "<script>location.href='./produtos/clienteslogin.php';</script>";
    }else{
      print "<script>alert('Usuário e/ou senha incorreto(s)');</script>";
      print "<script>location.href='loginpage.php';</script>";
    }

?>

