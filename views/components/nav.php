<?php
session_start();
?>
<nav>
    <div class="nav-wrapper container">
      <a href="#" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <?php
         if (!$_SESSION){
          echo ' <li><a href="login.php">Ingresar</a></li>
                 <li><a href="register.php">Registrarse</a></li>';
         }
         else {
           echo '<li>
                  <a href="index.php">Inicio</a>
                </li>
                <li>
                  <a href="create.php">Usuarios</a>
                </li>
                <li>
                  <a href="#">'.strtoupper($_SESSION['username']).'</a>
                </li>
                <li>
                  <a href="../components/logout.php">Salir</a>
                </li>
               ';
         }
        ?>
      </ul>
    </div>
  </nav>