<?php

class Hotel
{
    private $conn;
    private $table_name = "hotels";

    public int $id;
    public string $name;
    public string $address;
    public string $phone;
    public string $description;
    public string $imagePath1;
    public string $imagePath2;
    public string $imagePath3;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $stmt = $this->conn->prepare($query);

        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->id);

        if($stmt->execute()){
            return true;
        }

        return false;
    }

    public function update()
    {
        $query = "UPDATE 
                    " . $this->table_name . " 
                    SET 
                        name = :name, 
                        address = :address, 
                        phone = :phone, 
                        description = :description 
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($query);

        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->description=htmlspecialchars(strip_tags($this->description));

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':description', $this->description);

        if ($stmt->execute()) {
            return true;
        }

        return false;
     }

    //read data
    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    //read only one record
    public function readOne()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            http_response_code(404);
            die('&nbsp; 404 not found!');
        }

        $this->name = $row['name'];
        $this->address = $row['address'];
        $this->phone = $row['phone'];
        $this->description = $row['description'];
        $this->imagePath1 = $row['imagePath1'];
        $this->imagePath2 = $row['imagePath2'];
        $this->imagePath3 = $row['imagePath3'];
    }
}
