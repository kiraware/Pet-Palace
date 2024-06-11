<?php
require '../connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Palace - Warna</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .container {
            text-align: center;
        }
    </style>
</head>

<body class="bg-gray-100">
    <header>
        <!-- Navigation Bar -->
        <nav class="bg-gray-800 p-4">
            <div class="mx-auto flex justify-between items-center">
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

    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Warna</h2>
        <button class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4"><a href="warna.php">Add Warna</a></button>
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Nama</th>
                    <th class="py-2 px-4 border-b">Tanggal</th>
                    <th class="py-2 px-4 border-b">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT id, nama, tanggal FROM `warna`";
                $result = mysqli_query($con, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $nama = $row['nama'];
                        $tanggal = $row['tanggal'];

                        echo '<tr>';
                        echo "<td class=\"py-2 px-4 border-b\">$id</td>";
                        echo "<td class=\"py-2 px-4 border-b\">$nama</td>";
                        echo "<td class=\"py-2 px-4 border-b\">$tanggal</td>";
                        echo '<td class="py-2 px-4 border-b">';
                        echo '<button class="bg-yellow-500 text-white px-2 py-1 rounded-md mr-2"><a href="update.php?id=' . $id . '">Update</a></button>';
                        echo '<button class="bg-red-500 text-white px-2 py-1 rounded-md"><a href="delete.php?id=' . $id . '" onclick="return confirm(\'Apakah kamu yakin ingin menghapus item ini?\');">Delete</a></button>';
                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo "<tr><td colspan='3'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>