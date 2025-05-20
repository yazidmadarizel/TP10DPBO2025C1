<?php
require_once 'model/MenuItem.php';
require_once 'model/MenuCategory.php';

class MenuItemViewModel {
    private $menuItem;
    private $menuCategory;

    public function __construct() {
        $this->menuItem = new MenuItem();
        $this->menuCategory = new MenuCategory();
    }

    // Data binding untuk daftar menu item
    public function getMenuItemList() {
        return $this->menuItem->getAll();
    }

    // Data binding untuk detail menu item berdasarkan ID
    public function getMenuItemById($id) {
        return $this->menuItem->getById($id);
    }

    // Data binding untuk daftar menu item berdasarkan kategori
    public function getMenuItemsByCategory($category_id) {
        return $this->menuItem->getByCategory($category_id);
    }

    // Data binding untuk daftar kategori (diperlukan pada form)
    public function getCategories() {
        return $this->menuCategory->getAll();
    }

    // Proses tambah menu item baru
    public function addMenuItem($name, $description, $price, $category_id, $is_available) {
        return $this->menuItem->create($name, $description, $price, $category_id, $is_available);
    }

    // Proses update menu item
    public function updateMenuItem($id, $name, $description, $price, $category_id, $is_available) {
        return $this->menuItem->update($id, $name, $description, $price, $category_id, $is_available);
    }

    // Proses hapus menu item
    public function deleteMenuItem($id) {
        return $this->menuItem->delete($id);
    }
}
?>