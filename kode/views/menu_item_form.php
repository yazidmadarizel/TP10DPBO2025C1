<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($menuItem) ? 'Edit Menu' : 'Tambah Menu'; ?></h2>
<form action="index.php?entity=menu_item&action=<?php echo isset($menuItem) ? 'update&id=' . $menuItem['id'] : 'save'; ?>" method="POST" class="space-y-4 bg-white p-6 rounded-lg shadow-md max-w-lg">
    <div>
        <label class="block text-sm font-medium text-gray-700">Nama Menu:</label>
        <input type="text" name="name" value="<?php echo isset($menuItem) ? $menuItem['name'] : ''; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-500 focus:ring-opacity-50" required>
    </div>
    
    <div>
        <label class="block text-sm font-medium text-gray-700">Deskripsi:</label>
        <textarea name="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-500 focus:ring-opacity-50" rows="3"><?php echo isset($menuItem) ? $menuItem['description'] : ''; ?></textarea>
    </div>
    
    <div>
        <label class="block text-sm font-medium text-gray-700">Harga (Rp):</label>
        <input type="number" name="price" value="<?php echo isset($menuItem) ? $menuItem['price'] : ''; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-500 focus:ring-opacity-50" required min="0" step="1000">
    </div>
    
    <div>
        <label class="block text-sm font-medium text-gray-700">Kategori:</label>
        <select name="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-500 focus:ring-opacity-50" required>
            <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category['id']; ?>" <?php echo isset($menuItem) && $menuItem['category_id'] == $category['id'] ? 'selected' : ''; ?>><?php echo $category['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div>
        <label class="block text-sm font-medium text-gray-700">Status:</label>
        <div class="mt-2">
            <label class="inline-flex items-center">
                <input type="radio" name="is_available" value="1" class="focus:ring-yellow-500 h-4 w-4 text-yellow-600 border-gray-300" <?php echo !isset($menuItem) || $menuItem['is_available'] == 1 ? 'checked' : ''; ?>>
                <span class="ml-2">Tersedia</span>
            </label>
            <label class="inline-flex items-center ml-6">
                <input type="radio" name="is_available" value="0" class="focus:ring-yellow-500 h-4 w-4 text-yellow-600 border-gray-300" <?php echo isset($menuItem) && $menuItem['is_available'] == 0 ? 'checked' : ''; ?>>
                <span class="ml-2">Tidak Tersedia</span>
            </label>
        </div>
    </div>
    
    <div class="flex justify-between">
        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Simpan</button>
        <a href="index.php?entity=menu_item" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
    </div>
</form>

<?php
require_once 'views/template/footer.php';
?>