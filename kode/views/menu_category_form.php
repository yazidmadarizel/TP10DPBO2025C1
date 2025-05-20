<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">Daftar Kategori Menu</h2>
<a href="index.php?entity=menu_category&action=add" class="bg-yellow-600 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-yellow-700">Tambah Kategori</a>
<table class="w-full border bg-white rounded-lg overflow-hidden">
    <tr class="bg-yellow-100">
        <th class="border p-2">Nama Kategori</th>
        <th class="border p-2">Deskripsi</th>
        <th class="border p-2">Aksi</th>
    </tr>
    <?php foreach ($categoryList as $category): ?>
    <tr class="hover:bg-yellow-50">
        <td class="border p-2"><?php echo $category['name']; ?></td>
        <td class="border p-2"><?php echo $category['description']; ?></td>
        <td class="border p-2">
            <a href="index.php?entity=menu_category&action=edit&id=<?php echo $category['id']; ?>" class="text-blue-500 hover:underline">Edit</a>
            <a href="index.php?entity=menu_category&action=delete&id=<?php echo $category['id']; ?>" class="text-red-500 ml-2 hover:underline" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>