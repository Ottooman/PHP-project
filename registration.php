<?php
include_once 'classes/dbSearch.php';
session_start();
class Registration {
    private $db;
    public function __construct() {
        $obj = New DB();
        $this->db = $obj->pdo;
    }

    public function Registration($username, $password) {
        if(!empty($username) && !empty($password)) {
            $stmt = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $stmt = $this->db->prepare("SELECT * FROM users WHERE username =? AND password =?");
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $password);
            $stmt->execute();
            if($stmt->rowCount() == 0) {
                $query = $this->db->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
                $query->execute(array(':username' => $username,':password' => $password));
                header("location:inl_upp.php");
            }

            if($stmt->rowCount() > 0) {
                echo 'd finns redan';
            }
            

            
    }

}  
}

    
