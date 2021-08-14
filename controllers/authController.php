<?php
require_once('../models/authModel.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST["action"])) {
		$action = $_POST["action"];
    if( $action == 'register' ) {
      $message  = "";
      $code     = "";
      $username = $_POST["username"];
      $password = $_POST["password"];
      $hashPass = password_hash($password,PASSWORD_DEFAULT); 
      $name     = $_POST["name"];
      $email    = $_POST["email"];
      if( $username == "" || $password == "" || $name == "" || $email == "" ) {
        $message = "Complete todos los campos";
        $code    = 0;
      }
      else {
        $newUser = new AuthModel($username, $hashPass, $name, $email);
        $result = $newUser->registerUser();

        if( $result == 1 ) {
          $message = "Registro Completado.";
          $code    = 1;
        }
        
        else if ( $result == 2 ){
          $message = "Ocurrio un error inesperado, intente nuevamente. ";
          $code    = 2;
        }
        else if ( $result == 3 ){
          $message = "El usuario ingresado ya exite.";
          $code    = 3;
        }
        else {
          $message = "El correo ingresado ya exite.";
          $code    = 4;
        }
      }
      echo json_encode([ 'message' => $message, 'code' => $code ]);
    }
    if( $action == 'login' ) {
      $message  = "";
      $code     = "";
      $username = $_POST["username"];
      $password = $_POST["password"];
      $loginUser = new AuthModel();
      $auth = $loginUser->login($username, $password);
      if( $auth == 1 ) {
        $message = "Usuario inactivo.";
        $code    = 1;
      }
      
      else if ( $auth == 2 ){
        $message = "Crendenciales correctas, redireccionando...";
        $code    = 2;
      }
      else if ( $auth == 3 ){
        $message = "Contraseña incorrecta.";
        $code    = 3;
      }
      else {
        $message = "EL usuario ingresado no existe.";
        $code    = 4;
      }
      echo json_encode([ 'message' => $message, 'code' => $code ]);
    }
  }
}



?>