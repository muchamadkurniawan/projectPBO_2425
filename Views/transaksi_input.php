<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Baru</title>
<!--    <link href="./Views/output.css" rel="stylesheet">-->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Main container -->
    <div class="flex">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Form Transaksi -->
            <h2 class="text-2xl font-bold mb-4">Transaksi Baru</h2>
            <form action="MainEntryPoint.php?modul=transaksi&fitur=add" method="POST" id="transaksiForm">
                <div class="mb-4">
                    <label for="customer" class="block text-gray-700">Customer</label>
                    <select id="customer" name="customer" class="mt-1 p-2 border border-gray-300 rounded w-1/3" required>
                        <option value="" disabled selected>Pilih Customer</option>
                        <?php
                        // Ambil data customer dari database atau array
                        // Contoh data customer
//                        $customers = ['John Doe', 'Jane Smith', 'Robert Brown'];
//                        print_r($customers);
                        if (!empty($customers)) {
                            foreach ($customers as $customer) {
                                echo "<option value='$customer->name'>$customer->name</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <h3 class="text-xl font-semibold mb-2">Detail Barang</h3>
                <div id="barangContainer">
                    <!-- Template Barang -->
                    <div class="barang-item mb-4">
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label for="barang[]" class="block text-gray-700">Barang</label>
                                <select name="barang[]" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
                                    <option value="" disabled selected>Pilih Barang</option>
                                    <?php
//                                    $barangList = [
//                                        ['id' => 1, 'name' => 'Barang A', 'harga' => 50000],
//                                        ['id' => 2, 'name' => 'Barang B', 'harga' => 75000],
//                                        ['id' => 3, 'name' => 'Barang C', 'harga' => 120000],
//                                    ];
                                    foreach ($barangs as $barang) {
                                        echo "<option value='{$barang->idBarang}'>{$barang->nameBarang} - Rp{$barang->hargaBarang}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div>
                                <label for="jumlah[]" class="block text-gray-700">Jumlah</label>
                                <input type="number" name="jumlah[]" class="mt-1 p-2 border border-gray-300 rounded w-full" min="1" required>
                            </div>
                            <div>
                                <button type="button" class="mt-6 bg-red-500 text-white p-2 rounded remove-item">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" id="addBarangBtn" class="bg-blue-500 text-white p-2 rounded mt-2">Tambah Barang</button>
                <div class="mt-6">
                    <button type="submit" class="bg-green-500 text-white p-2 rounded">Simpan Transaksi</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // JavaScript untuk menambah dan menghapus item barang
        document.getElementById('addBarangBtn').addEventListener('click', function() {
            const barangContainer = document.getElementById('barangContainer');
            const newBarang = document.querySelector('.barang-item').cloneNode(true);
            newBarang.querySelector('select[name="barang[]"]').value = '';
            newBarang.querySelector('input[name="jumlah[]"]').value = '';
            barangContainer.appendChild(newBarang);
        });

        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-item')) {
                if (document.querySelectorAll('.barang-item').length > 1) {
                    event.target.closest('.barang-item').remove();
                } else {
                    alert('Minimal satu barang harus ada dalam transaksi.');
                }
            }
        });
    </script>
</body>
</html>
