<?php
  session_start();

  if(empty($_POST) or (empty($_POST["name"]) or (empty($_POST["password"])))){
    print "<script>location.href='loginadmin.php';</script>";
  }

    include "configlogin.php";

        $name = $_POST['name'];
        $password = $_POST['password'];


    $sql = "SELECT * FROM administrador WHERE name = '{$name}' AND password = '".md5($password)."'";

    $res = $conn->query($sql) or die($conn->error);

    $row = $res->fetch_object();
    
    $qtd = $res->num_rows;

    if($qtd > 0){
      $_SESSION["name"] = $name;

      print "<script>location.href='./produtos/admin_home.php';</script>";
    }else{
      print "<script>alert('Usuário e/ou senha incorreto(s)');</script>";
      print "<script>location.href='loginadmin.php';</script>";
    }

?>

