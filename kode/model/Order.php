<?php
require_once 'config/Database.php';

class Order {
    private $conn;
    private $table = '`order`'; 

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT o.*, m.name as menu_name, m.price 
                FROM " . $this->table . " o
                JOIN menu_item m ON o.menu_item_id = m.id
                ORDER BY o.order_time DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT o.*, m.name as menu_name, m.price 
                FROM " . $this->table . " o
                JOIN menu_item m ON o.menu_item_id = m.id
                WHERE o.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($customer_name, $table_number, $menu_item_id, $quantity, $status) {
        $query = "INSERT INTO " . $this->table . " (customer_name, table_number, menu_item_id, quantity, status) 
                VALUES (:customer_name, :table_number, :menu_item_id, :quantity, :status)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':customer_name', $customer_name);
        $stmt->bindParam(':table_number', $table_number);
        $stmt->bindParam(':menu_item_id', $menu_item_id);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':status', $status);
        return $stmt->execute();
    }

    public function update($id, $customer_name, $table_number, $menu_item_id, $quantity, $status) {
        $query = "UPDATE " . $this->table . " 
                SET customer_name = :customer_name, table_number = :table_number, 
                    menu_item_id = :menu_item_id, quantity = :quantity, status = :status
                WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':customer_name', $customer_name);
        $stmt->bindParam(':table_number', $table_number);
        $stmt->bindParam(':menu_item_id', $menu_item_id);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function updateStatus($id, $status) {
        $query = "UPDATE " . $this->table . " SET status = :status WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':status', $status);
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