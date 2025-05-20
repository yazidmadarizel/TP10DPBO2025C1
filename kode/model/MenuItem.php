<?php
require_once 'config/Database.php';

class MenuItem {
    private $conn;
    private $table = 'menu_item';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT m.*, c.name as category_name 
                FROM " . $this->table . " m
                JOIN menu_category c ON m.category_id = c.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT m.*, c.name as category_name 
                FROM " . $this->table . " m
                JOIN menu_category c ON m.category_id = c.id
                WHERE m.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByCategory($category_id) {
        $query = "SELECT m.*, c.name as category_name 
                FROM " . $this->table . " m
                JOIN menu_category c ON m.category_id = c.id
                WHERE m.category_id = :category_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $description, $price, $category_id, $is_available) {
        $query = "INSERT INTO " . $this->table . " (name, description, price, category_id, is_available) 
                VALUES (:name, :description, :price, :category_id, :is_available)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':is_available', $is_available);
        return $stmt->execute();
    }

    public function update($id, $name, $description, $price, $category_id, $is_available) {
        $query = "UPDATE " . $this->table . " 
                SET name = :name, description = :description, price = :price, 
                    category_id = :category_id, is_available = :is_available 
                WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':is_available', $is_available);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>