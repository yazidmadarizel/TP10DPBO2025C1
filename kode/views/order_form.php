<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($order) ? 'Edit Pesanan' : 'Tambah Pesanan'; ?></h2>
<form action="index.php?entity=order&action=<?php echo isset($order) ? 'update&id=' . $order['id'] : 'save'; ?>" method="POST" class="space-y-4 bg-white p-6 rounded-lg shadow-md max-w-lg">
    <div>
        <label class="block text-sm font-medium text-gray-700">Nama Pelanggan:</label>
        <input type="text" name="customer_name" value="<?php echo isset($order) ? $order['customer_name'] : ''; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-500 focus:ring-opacity-50" required>
    </div>
    
    <div>
        <label class="block text-sm font-medium text-gray-700">Nomor Meja:</label>
        <input type="number" name="table_number" value="<?php echo isset($order) ? $order['table_number'] : ''; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-500 focus:ring-opacity-50" required min="1">
    </div>
    
    <div>
        <label class="block text-sm font-medium text-gray-700">Menu:</label>
        <select name="menu_item_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-500 focus:ring-opacity-50" required>
            <?php foreach ($menuItems as $item): ?>
            <option value="<?php echo $item['id']; ?>" <?php echo isset($order) && $order['menu_item_id'] == $item['id'] ? 'selected' : ''; ?>>
                <?php echo $item['name']; ?> - Rp <?php echo number_format($item['price'], 0, ',', '.'); ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div>
        <label class="block text-sm font-medium text-gray-700">Jumlah:</label>
        <input type="number" name="quantity" value="<?php echo isset($order) ? $order['quantity'] : '1'; ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-500 focus:ring-opacity-50" required min="1">
    </div>
    
    <div>
        <label class="block text-sm font-medium text-gray-700">Status:</label>
        <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-500 focus:ring-opacity-50" required>
            <option value="pending" <?php echo isset($order) && $order['status'] == 'pending' ? 'selected' : ''; ?>>Menunggu</option>
            <option value="preparing" <?php echo isset($order) && $order['status'] == 'preparing' ? 'selected' : ''; ?>>Diproses</option>
            <option value="served" <?php echo isset($order) && $order['status'] == 'served' ? 'selected' : ''; ?>>Disajikan</option>
            <option value="paid" <?php echo isset($order) && $order['status'] == 'paid' ? 'selected' : ''; ?>>Dibayar</option>
        </select>
    </div>
    
    <div class="flex justify-between">
        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Simpan</button>
        <a href="index.php?entity=order" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
    </div>
</form>

<?php
require_once 'views/template/footer.php';
?>