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
      <div class="row card-box">
        <div>
          <form id="registerForm" class="col s12" autocomplete="off" method="POST">
            <h5>Ingresar información</h5>
            <div class="row">
              <div class="input-field col s6">
                <input id="username" type="text" class="validate" name="username">
                <label for="username">Usuario</label>
                <span class="errors"></span>
              </div>
              <div class="input-field col s6">
                <input id="password" type="password" class="validate" name="password">
                <label for="password">Contraseña</label>
                <span class="errors"></span>

              </div>
              <div class="input-field col s6">
                <input id="name" type="text" class="validate" name="name">
                <label for="name">Nombre</label>
                <span class="errors"></span>

              </div>
              <div class="input-field col s6">
                <input id="email" type="email" class="validate" name="email">
                <label for="email">Correo</label>
                <span class="errors"></span>

              </div>
            </div>
            <input type="hidden" id="action" name="action" value="register">
            <button class="btn waves-effect waves-light" type="button" onclick="saveUser();">
              Enviar
            </button>
            <div id="progress" class="showLoader">
              <div class="progress">
                  <div class="indeterminate"></div>
              </div>
            </div>
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