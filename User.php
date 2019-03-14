<?php
include 'classes/dbSearch.php';
session_start();

class User {
    private $db;

    public function __construct() {
        $obj = New DB();
        $this->db = $obj->pdo;
    }
   public function Login($username, $password) {
       if(!empty($username) && !empty($password)) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username =? AND password =?");
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $password);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $_SESSION['username'] = $_POST['username'];   //funkar inte att skapa Session
            header("location:login_success.php");
        }
        else {
            echo 'incorrect!';
        }
       }
       else {
           echo 'Please enter username and pass';
       }
   }
}

?>