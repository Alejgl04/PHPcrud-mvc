<?php
  require_once('../config/db-connect.php');
  class AuthModel {

    public $id;
    public $username;
    public $password;
    public $name;
    public $email;
    private $dbConnection;

    public function __construct( $username = null, $password = null, $name = null, $email = null) {
      $this->username = $username;
      $this->password = $password;
      $this->name     = $name;
      $this->email    = $email;
      $this->dbConnection = dbConnect::connection();

    }

    public function __destruct(){

    }

    public function login( $username, $password ) {
      $query = $this->dbConnection->prepare("SELECT username FROM users WHERE username = :username");
      $query->bindParam(':username', $username);
      $query->execute();
      $num = $query->rowCount();
      if ( $num > 0 ) {
        $checkLogin = $this->dbConnection->prepare("SELECT * FROM users WHERE username = :username");
        $checkLogin->bindParam(':username', $username);
        $checkLogin->execute();
        $user = $checkLogin->fetch(PDO::FETCH_ASSOC);
        
        $checkPassword = password_verify($password,$user['password']);
        if($checkPassword) {
          if ($user['status']==2) {
            return 1;
          }
          else{
            if (session_status() === PHP_SESSION_NONE) {
              session_start();
              $_SESSION['auth'] = "token";  
              $_SESSION['id'] = $user['id'];
              $_SESSION['username'] = $user['username'];
              $_SESSION['email'] = $user['email'];
              $_SESSION['status'] = $user['status'];
            }
            return 2;
          }
        }
        else{
          return 3;
        }
      }
      else {
        return 4;
      }
      $this->dbConnection = null;

    }

    public function registerUser(){

      $userExist = $this->verifyUsername();
      if($userExist == true){
        return 3;
      }

      $emailExist = $this->verifyEmail();
      if($emailExist == true){
        return 4;
      }

      $sql = $this->dbConnection->prepare("INSERT INTO users (username, password, name, email) VALUES (:username, :password, :name, :email)");
      $sql->bindParam(':username', $this->username);
      $sql->bindParam(':password', $this->password);
      $sql->bindParam(':name', $this->name);
      $sql->bindParam(':email', $this->email);
      $sql->execute();
      $this->dbConnection = null;
      if($sql){
        return 1;
      }
      else{
        return 2;
      }
    }

    private function verifyUsername(){
      $query = $this->dbConnection->prepare("SELECT username FROM users WHERE username = :username");
      $query->bindParam(':username', $this->username);
      $query->execute();
      if ( $query->fetchColumn() > 0 ) {
        return true;
      }
      else {
        return false;
      }
      $this->dbConnection = null;
    }

    private function verifyEmail(){
      $query = $this->dbConnection->prepare("SELECT email FROM users WHERE email = :email");
      $query->bindParam(':email', $this->email);
      $query->execute();
      if ( $query->fetchColumn() > 0 ) {
        return true;
      }
      else {
        return false;
      }
      $this->dbConnection = null;
    }

  }
?>