<?php
require '../connect.php'; // Ensure this file exists and the path is correct
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Palace - Hewan</title>
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
                <a href="/" class="text-white text-xl font-bold">Pet Palace</a>
                <!-- Navigation Links -->
                <div class="flex space-x-4">
                    <a href="../home/index.php" class="text-white">Home</a>
                    <a href="../orang/index.php" class="text-white">Orang</a>
                    <a href="../hewan/index.php" class="text-white">Hewan</a>
                    <a href="../warna/index.php" class="text-white">Warna</a>
                    <a href="../peliharaan/index.php" class="text-white">Peliharaan</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mx-auto my-8 p-4 bg-white shadow-md rounded">
        <h1 class="text-2xl font-bold mb-4 text-center text-gray-800">Tabel Data Hewan</h1>
        <center>
            <a href="hewan.php" class="inline-block text-xl text-gray-700 font-semibold mb-4 hover:text-gray-900">
                Tambah Data
            </a>
        </center>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border">
                <thead class="bg-red-500 text-white">
                    <tr>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-center">ID</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Nama</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Jenis</th>
                        <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Operations</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php
                    $sql = "SELECT id, nama, jenis FROM `hewan`";
                    $result = mysqli_query($con, $sql);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $nama = $row['nama'];
                            $jenis = $row['jenis'];

                            echo '<tr class="border-b">';
                            echo "<td class='py-3 px-4 text-center'>$id</td>";
                            echo "<td class='py-3 px-4 text-center'>$nama</td>";
                            echo "<td class='py-3 px-4 text-center'>$jenis</td>";
                            echo '<td class="py-3 px-4 text-center">
                                    <a href="update.php?hewanId=' . $id . '" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700">Edit</a>
                                    <a href="delete.php?hewanId=' . $id . '" onclick="return confirm(\'Apakah kamu yakin ingin menghapus item ini?\');" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700">Delete</a>
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
