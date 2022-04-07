<?php

class Hotels
{
    private $conn;
    private $table_name = "hotels";

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
