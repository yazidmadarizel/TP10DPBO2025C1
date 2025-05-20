<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">Daftar Menu</h2>
<a href="index.php?entity=menu_item&action=add" class="bg-yellow-600 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-yellow-700">Tambah Menu</a>
<table class="w-full border bg-white rounded-lg overflow-hidden">
    <tr class="bg-yellow-100">
        <th class="border p-2">Nama Menu</th>
        <th class="border p-2">Deskripsi</th>
        <th class="border p-2">Harga</th>
        <th class="border p-2">Kategori</th>
        <th class="border p-2">Status</th>
        <th class="border p-2">Aksi</th>
    </tr>
    <?php foreach ($menuItemList as $item): ?>
    <tr class="hover:bg-yellow-50">
        <td class="border p-2"><?php echo $item['name']; ?></td>
        <td class="border p-2"><?php echo $item['description']; ?></td>
        <td class="border p-2">Rp <?php echo number_format($item['price'], 0, ',', '.'); ?></td>
        <td class="border p-2"><?php echo $item['category_name']; ?></td>
        <td class="border p-2">
            <span class="px-2 py-1 rounded-full text-xs <?php echo $item['is_available'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                <?php echo $item['is_available'] ? 'Tersedia' : 'Tidak Tersedia'; ?>
            </span>
        </td>
        <td class="border p-2">
            <a href="index.php?entity=menu_item&action=edit&id=<?php echo $item['id']; ?>" class="text-blue-500 hover:underline">Edit</a>
            <a href="index.php?entity=menu_item&action=delete&id=<?php echo $item['id']; ?>" class="text-red-500 ml-2 hover:underline" onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?');">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>