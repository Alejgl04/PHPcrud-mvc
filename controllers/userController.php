<?php
require_once('../models/userModel.php');

if($_SERVER["REQUEST_METHOD"] == "GET") {
	if(isset($_GET["action"])) {
    $action = $_GET["action"];
    $users = new UserModel();
    $code  = "";
    $message = "";
    if( $action == 'getManyUsers' ) {
      $data  = "";
      $result = $users->getManyUsers();
      if(!empty($result)){
        $code = 1;
        $data = $result;
      }
      else {
        $code = 1;
        $data = "";
      }
      echo json_encode([ 'data' => $data, 'code' => $code ]);
    }
    if($action == 'delete'){
      $result = $users->deleteUser($_GET['id']);
      if ($result==true) {
        $code = 1;
        $message = "Usuario Eliminado";
      }
      else {
        $code = 2;
        $message = "No se pudo eliminar el usuario, intente nuevament";
      }
      echo json_encode([ 'message' => $message, 'code' => $code ]);

    }
  }
}



?>