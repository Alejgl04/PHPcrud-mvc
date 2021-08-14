<?php
  require_once('../config/db-connect.php');
  class UserModel {

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

    public function getUserName() {
      return $this->username;
    }

    public function deleteUser($id=NULL){
			if(!empty($id)){
				$query  = $this->dbConnection->prepare("DELETE FROM users WHERE id= {$id}");
        $query->execute();
        if( $query ){
          return true;
        }
        else {
          return false;
        }
			}else{
				return false;
			}
		}

    public function getManyUsers() {
      $users = array();
      $query = $this->dbConnection->prepare("SELECT * FROM users");
      $query->execute();
      $numrows = $query->rowCount();
      if($numrows>0){
        while ($row = $query->fetch( PDO::FETCH_ASSOC )) {
          $users[] = $row;
        }
      }
      else {
        $users[] = [];
      }
      return $users;
      $this->dbConnection = null;

    }

  }
?>