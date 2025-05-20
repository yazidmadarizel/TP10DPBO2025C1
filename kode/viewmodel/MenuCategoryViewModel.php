<?php
require_once 'model/MenuCategory.php';

class MenuCategoryViewModel {
    private $menuCategory;

    public function __construct() {
        $this->menuCategory = new MenuCategory();
    }

    // Data binding untuk daftar kategori
    public function getCategoryList() {
        return $this->menuCategory->getAll();
    }

    // Data binding untuk detail kategori berdasarkan ID
    public function getCategoryById($id) {
        return $this->menuCategory->getById($id);
    }

    // Proses tambah kategori baru
    public function addCategory($name, $description) {
        return $this->menuCategory->create($name, $description);
    }

    // Proses update kategori
    public function updateCategory($id, $name, $description) {
        return $this->menuCategory->update($id, $name, $description);
    }

    // Proses hapus kategori
    public function deleteCategory($id) {
        return $this->menuCategory->delete($id);
    }
}
?>