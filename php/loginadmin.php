
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="../css/signin.css" />
  <title>Singin</title>
</head>
<section class="Home">
  <div class="extras">
    <h1 class="Home"></h1>
  </div>

  <body>
    <div class="container">
      <div class="card">
        <h1>Entrar</h1>

        <div id="msgError"></div>

        <div class="label-float">
          <form action="loginadm.php" method="post">
            Nome: <input type="text" name="name" required><br>

            Senha: <input type="password" name="password" required><br>


            <div class="justify-center">
            <button onclick="entrar()">Entrar</button>
            </div>

            </form> 

        </div>



        <div class="justify-center">
          <hr />
        </div>


        <p>
          Voltar para página
          <a href="../index.html">
            inicial.<br>
          </a>


      </div>
    </div>

  </body>

</html>