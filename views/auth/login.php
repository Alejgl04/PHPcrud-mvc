<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>App | Registro</title>
  <?php include '../components/header.php'; ?>
</head>
<body>
  <?php include '../components/nav.php'; ?>
  <div id="main">
    
    <div class="container">
      <div class="row">
        <div>
          <form id="loginForm" class="col s6 offset-s3 card-box" autocomplete="off" method="POST">
            <h5 class="text-center">Ingresa tus credenciales</h5>
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input id="username" type="text" class="validate" name="username">
                <label for="username">Usuario</label>
                <span class="errors"></span>
              </div>
              <div class="input-field col s12">
                <i class="material-icons prefix">lock</i>
                <input id="password" type="password" class="validate" name="password">
                <label for="password">Contraseña</label>
                <span class="errors"></span>
              </div>
            </div>
            <input type="hidden" id="action" name="action" value="login">
            <button class="btn waves-effect waves-light" type="button" onclick="login();">
              Enviar
            </button>
            <br>
            <div id="progress" class="showLoader">
              <div class="progress">
                  <div class="indeterminate"></div>
              </div>
            </div>
            <br>
            <div id="message"></div>
          </form>
        </div>
      </div>
    </div>
    <?php include '../components/footer.php'; ?>
    <script src="../../public/js/auth.js"></script>
  </div>
</body>
</html>