<?php

    require_once "configlogin2.php"; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $md5_password = md5($password);
        //$hashed_password = password_hash($password, PASSWORD_DEFAULT);


        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";

        $stmt = $conn->prepare($sql);
        
        $stmt->bind_param("sss", $name, $email, $md5_password);//, $hashed_password); 

        if ($stmt->execute()) {
            header("Location: loginpage.php");
            exit();
            //echo "Cadastrado com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $coon->error;
        }

        $stmt->close();


    }
    $conn->close();