<?php
error_reporting(0);
session_start();

if($_SESSION['auth'] !== 'token') {
  header('Location: ../auth/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Usuarios | Inicio</title>
  <?php include '../components/header.php'; ?>

</head>
<body onload="getManyUser();">
  <?php include '../components/nav.php'; ?>
  <div id="main">
    <div class="container">
     <h5>Bienvenido: <?= strtoupper($_SESSION['username'])?> </h5>
      <div class="row mt-2">
        <div class="col s12">
          <div id="loadUsers">
            
          </div>
          <div id="loader" class="centered display">    
            <div class="progress">
              <div class="indeterminate"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include '../components/footer.php'; ?>
<script src="../../public/js/users.js"></script>
</body>
</html>