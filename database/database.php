<?php

  class DB{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    public function __construct(){
        $this->host     = 'localhost';
        $this->db       = 'PostIt';
        $this->user     = 'root';
        $this->password = "rootpasswordgiven";
        $this->charset  = 'utf8';
    }
    public function connect(){

        try{

            $connection = "mysql:host=". $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => true,
            ];
            // $pdo = new PDO($connection, $this->user, $this->password, $options);
            $pdo = new PDO($connection, $this->user, $this->password);

            return $pdo;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }
  }

?>
