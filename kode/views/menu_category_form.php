<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($category) ? 'Edit Kategori Menu' : 'Tambah Kategori Menu'; ?></h2>
<form action="index.php?entity=menu_category&action=<?php echo isset($category) ? 'update&id=' . $category['id'] : 'save'; ?>" method="POST" class="space-y-4 bg-white p-6 rounded-lg shadow-md max-w-lg">
    <div>
        <label class="block text-sm font-medium text-gray-700">Nama Kategori:</label>
        <input type="text" name="name" value="<?php echo isset($category) ? $category['name'] : ''; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-500 focus:ring-opacity-50" required>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Deskripsi:</label>
        <textarea name="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-500 focus:ring-opacity-50" rows="3"><?php echo isset($category) ? $category['description'] : ''; ?></textarea>
    </div>
    <div class="flex justify-between">
        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Simpan</button>
        <a href="index.php?entity=menu_category" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
    </div>
</form>

<?php
require_once 'views/template/footer.php';
?>
