<?php

class Hotels
{
    private $conn;
    private $table_name = "hotels";

    public $id;
    public $name;
    public $address;
    public $phone;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //read data
    function read()
    {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }
}
