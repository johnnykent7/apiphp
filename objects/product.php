<?php
class Product{

    private $conn;
    private $table_name='products';

    public $id;
    public $name;
    public $color;
    public $size;

    public function __construct($db){
        $this->conn = $db;
    }

    function read(){

        $query = "SELECT * from products";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }
    function create(){

        $query = "INSERT INTO " . $this->table_name . " SET name=:name, color=:color, size=:size";

        $stmt = $this->conn->prepare($query);

        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->color=htmlspecialchars(strip_tags($this->color));
        $this->size=htmlspecialchars(strip_tags($this->size));
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":color", $this->color);
        $stmt->bindParam(":size", $this->size);

        if($stmt->execute()){
            return true;
        }

        return false;

    }

    function delete(){

        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $stmt = $this->conn->prepare($query);

        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->id);

        if($stmt->execute()){
            return true;
        }

        return false;
    }
}
?>
