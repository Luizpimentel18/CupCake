<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="../css/signup.css" />
  <title>Singup</title>
</head>

<body>
  <div class="container">
    <div class="card">
      <h1>Cadastrar</h1>

      <form method="post" action="cadastro.php">

      <div id="msgError"></div>
      <div id="msgSuccess"></div>

      <div class="label-float">
        <input type="text" name="name" id="name" placeholder=" " required />
        <label id="labelname" for="name">Nome</label>
      </div>


      <div class="label-float">
        <input type="text" name="email" id="email" placeholder=" " required />
        <label id="labelemail" for="email">E-mail</label>
      </div>

      <div class="label-float">
        <input type="password" name="password" id="password" placeholder=" " required />
        <label id="labelpassword" for="password">Senha</label>
        <i id="verpassword" class="fa fa-eye" aria-hidden="true"></i>
      </div>

      <div class="label-float">
        <input type="password" name="confirmpassword" id="confirmpassword" placeholder=" " required />
        <label id="labelconfirmpassword" for="confirmpassword">Confirmar Senha</label>
        <i id="verconfirmpassword" class="fa fa-eye" aria-hidden="true"></i>
      </div>

      <div class="justify-center">
        <button onclick="cadastrar()">Cadastrar</button>
      </form>
      </div>
      <p>
        Voltar para página de
        <a href="loginpage.php">
          login.
        </a>
      </p>
    </div>
  </div>
</body>

</html>