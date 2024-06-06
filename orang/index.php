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

<body>
    <header>
        <!-- Navigation Bar -->
        <nav class="bg-gray-800 p-4">
            <div class="mx-auto flex justify-between items-center">
                <!-- Logo -->
                <a href="/" class="text-white text-xl font-bold">Pet Palace</a>
                <!-- Navigation Links -->
                <div class="flex space-x-4">
                    <a href="../orang/index.php" class="text-white">Orang</a>
                    <a href="../hewan/index.php" class="text-white">Hewan</a>
                    <a href="../warna/index.php" class="text-white">Warna</a>
                    <a href="../peliharaan/index.php" class="text-white">Peliharaan</a>
                </div>
            </div>
        </nav>
    </header>

    <div id="test">
        <h1>Tabel Data Orang</h1>
        <a href="orang.php">Tambah Data</a>
        <br />
        <div class="table">
            <table>
                <tr style="background-color: rgb(220, 57, 57);">
                    <th>ID</th>
                    <th>Nama</th>
                    <th>No Telpon</th>
                    <th>Alamat</th>
                    <th>Operations</th>
                </tr>
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

                            echo '<tr>';
                            echo "<th scope=\"row\">$id</th>";
                            echo "<td>$nama</td>";
                            echo "<td>$no_telp</td>";
                            echo "<td>$alamat</td>";

                            echo '<td>
                            <button><a href="update.php?orangId=' . $id . '">Edit</a></button>
                            <button><a href="delete.php?orangId=' . $id . '" onclick="return confirm(\'Apakah kamu yakin ingin menghapus item ini?\');">Delete</a></button>
                            </td>' .
                                '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>