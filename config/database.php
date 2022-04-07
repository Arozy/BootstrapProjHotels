<?php

class Database
{
    private $host = "localhost";
    private $db_name = "btphotels_db";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            http_response_code(500);

            $array = array(
                "message" => "Database connection error!",
                //"details" => $exception->getMessage()
            );

            echo json_encode($array);
            exit;
        }

        return $this->conn;
    }
}