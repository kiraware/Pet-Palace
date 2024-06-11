<?php
require '../connect.php'; // Ensure this file exists and the path is correct
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Palace - Orang</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script src="main.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <header>
        <!-- Navigation Bar -->
        <nav class="bg-gray-800 p-4">
            <div class="container mx-auto flex justify-between items-center">
                <!-- Logo -->
                <a href="/" class="text-white text-2xl font-bold">Pet Palace</a>
                <!-- Navigation Links -->
                <div class="flex space-x-4">
                    <a href="../home/index.php" class="text-white hover:text-gray-400">Home</a>
                    <a href="../orang/index.php" class="text-white hover:text-gray-400">Orang</a>
                    <a href="../hewan/index.php" class="text-white hover:text-gray-400">Hewan</a>
                    <a href="../warna/index.php" class="text-white hover:text-gray-400">Warna</a>
                    <a href="../peliharaan/index.php" class="text-white hover:text-gray-400">Peliharaan</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mx-auto my-8 p-4 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold mb-4">Tabel Data Orang</h1>
        <a href="orang.php" class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Tambah Data</a>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr class="bg-red-500 text-white">
                        <th class="w-1/12 py-2">ID</th>
                        <th class="w-3/12 py-2">Nama</th>
                        <th class="w-3/12 py-2">No Telpon</th>
                        <th class="w-3/12 py-2">Alamat</th>
                        <th class="w-2/12 py-2">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT id, nama, no_telp, alamat FROM `orang`";
                    $result = mysqli_query($con, $sql);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $nama = $row['nama'];
                            $no_telp = $row['no_telp'];
                            $alamat = $row['alamat'];

                            echo '<tr class="bg-gray-100 border-b border-gray-200">';
                            echo "<td class='py-2 px-4 text-center'>$id</td>";
                            echo "<td class='py-2 px-4'>$nama</td>";
                            echo "<td class='py-2 px-4'>$no_telp</td>";
                            echo "<td class='py-2 px-4'>$alamat</td>";
                            echo '<td class="py-2 px-4 text-center">
                            <a href="update.php?orangId=' . $id . '" class="text-blue-500 hover:text-blue-700 mx-2">Edit</a>
                            <a href="delete.php?orangId=' . $id . '" onclick="return confirm(\'Apakah kamu yakin ingin menghapus item ini?\');" class="text-red-500 hover:text-red-700 mx-2">Delete</a>
                            </td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
