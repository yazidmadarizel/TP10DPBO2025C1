<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">Daftar Pesanan</h2>
<a href="index.php?entity=order&action=add" class="bg-yellow-600 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-yellow-700">Tambah Pesanan</a>
<table class="w-full border bg-white rounded-lg overflow-hidden">
    <tr class="bg-yellow-100">
        <th class="border p-2">No Pesanan</th>
        <th class="border p-2">Pelanggan</th>
        <th class="border p-2">No Meja</th>
        <th class="border p-2">Menu</th>
        <th class="border p-2">Jumlah</th>
        <th class="border p-2">Total</th>
        <th class="border p-2">Waktu Pesan</th>
        <th class="border p-2">Status</th>
        <th class="border p-2">Aksi</th>
    </tr>
    <?php foreach ($orderList as $order): ?>
    <tr class="hover:bg-yellow-50">
        <td class="border p-2">#<?php echo $order['id']; ?></td>
        <td class="border p-2"><?php echo $order['customer_name']; ?></td>
        <td class="border p-2"><?php echo $order['table_number']; ?></td>
        <td class="border p-2"><?php echo $order['menu_name']; ?></td>
        <td class="border p-2 text-center"><?php echo $order['quantity']; ?></td>
        <td class="border p-2">Rp <?php echo number_format($order['price'] * $order['quantity'], 0, ',', '.'); ?></td>
        <td class="border p-2"><?php echo date('d/m/Y H:i', strtotime($order['order_time'])); ?></td>
        <td class="border p-2">
            <?php 
                $statusClass = '';
                switch ($order['status']) {
                    case 'pending':
                        $statusClass = 'bg-yellow-100 text-yellow-800';
                        $statusText = 'Menunggu';
                        break;
                    case 'preparing':
                        $statusClass = 'bg-blue-100 text-blue-800';
                        $statusText = 'Diproses';
                        break;
                    case 'served':
                        $statusClass = 'bg-green-100 text-green-800';
                        $statusText = 'Disajikan';
                        break;
                    case 'paid':
                        $statusClass = 'bg-purple-100 text-purple-800';
                        $statusText = 'Dibayar';
                        break;
                }
            ?>
            <span class="px-2 py-1 rounded-full text-xs <?php echo $statusClass; ?>">
                <?php echo $statusText; ?>
            </span>
        </td>
        <td class="border p-2">
            <a href="index.php?entity=order&action=edit&id=<?php echo $order['id']; ?>" class="text-blue-500 hover:underline">Edit</a>
            <a href="index.php?entity=order&action=delete&id=<?php echo $order['id']; ?>" class="text-red-500 ml-2 hover:underline" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?');">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>