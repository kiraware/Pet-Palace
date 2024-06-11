<?php
require '../connect.php'; // Ensure this file exists and the path is correct
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Palace - Peliharaan</title>
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
        <h1 class="text-3xl font-bold mb-4">Tabel Data Peliharaan</h1>
        <a href="peliharaan.php" class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Tambah Data</a>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-red-500 text-white">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Orang</th>
                        <th class="py-3 px-6 text-left">Hewan</th>
                        <th class="py-3 px-6 text-left">Warna</th>
                        <th class="py-3 px-6 text-center">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT p.id, o.nama AS nama_orang, h.nama AS nama_hewan, w.nama AS nama_warna
                    FROM peliharaan p
                    LEFT JOIN orang o ON p.id_orang = o.id
                    LEFT JOIN hewan h ON p.id_hewan = h.id
                    LEFT JOIN warna w ON p.id_warna = w.id;";
                    $result = mysqli_query($con, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $nama_orang = $row['nama_orang'];
                            $nama_hewan = $row['nama_hewan'];
                            $nama_warna = $row['nama_warna'];

                            echo '<tr class="bg-gray-100 border-b border-gray-200">';
                            echo "<td class='py-4 px-6'>$id</td>";
                            echo "<td class='py-4 px-6'>$nama_orang</td>";
                            echo "<td class='py-4 px-6'>$nama_hewan</td>";
                            echo "<td class='py-4 px-6'>$nama_warna</td>";
                            echo '<td class="py-4 px-6 text-center">
                            <a href="update.php?peliharaanId=' . $id . '" class="text-blue-500 hover:text-blue-700 mx-2">Edit</a>
                            <a href="delete.php?peliharaanId=' . $id . '" onclick="return confirm(\'Apakah kamu yakin ingin menghapus item ini?\');" class="text-red-500 hover:text-red-700 mx-2">Delete</a>
                            </td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5" class="py-4 px-6 text-center text-gray-500">Tidak ada data ditemukan.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
