<?php
require_once 'model/Order.php';
require_once 'model/MenuItem.php';

class OrderViewModel {
    private $order;
    private $menuItem;

    public function __construct() {
        $this->order = new Order();
        $this->menuItem = new MenuItem();
    }

    // Data binding untuk daftar pesanan
    public function getOrderList() {
        return $this->order->getAll();
    }

    // Data binding untuk detail pesanan berdasarkan ID
    public function getOrderById($id) {
        return $this->order->getById($id);
    }

    // Data binding untuk daftar menu item (diperlukan pada form)
    public function getMenuItems() {
        return $this->menuItem->getAll();
    }

    // Proses tambah pesanan baru
    public function addOrder($customer_name, $table_number, $menu_item_id, $quantity, $status) {
        return $this->order->create($customer_name, $table_number, $menu_item_id, $quantity, $status);
    }

    // Proses update pesanan
    public function updateOrder($id, $customer_name, $table_number, $menu_item_id, $quantity, $status) {
        return $this->order->update($id, $customer_name, $table_number, $menu_item_id, $quantity, $status);
    }

    // Proses update status pesanan
    public function updateOrderStatus($id, $status) {
        return $this->order->updateStatus($id, $status);
    }

    // Proses hapus pesanan
    public function deleteOrder($id) {
        return $this->order->delete($id);
    }
}
?>