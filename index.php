<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login com SOAP</title>
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/signin.css" rel="stylesheet">
    <script src="assets/ie-emulation-modes-warning.js"></script>

  </head>

  <body>

    <?php 
      if(isset($_GET['msg'])){
        echo '
          <div class="alert alert-info" style="position: absolute; top: 0; width: 100%; text-align: center">
            <strong>Retorno:</strong> '.$_GET['msg'].'
          </div>
        ';
      }
    ?>

    <div class="container">

      <form class="form-signin" method="POST" action="client.php">
        <h2 class="form-signin-heading">SOAP Login</h2>
        <label for="inputEmail" class="sr-only">Usuário</label>
        <input type="text" name="user" id="inputEmail" class="form-control" placeholder="Digitar teste" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Digitar 123" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Logar</button>
      </form>

    </div>
    <script src="assets/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
