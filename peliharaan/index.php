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
        <h1>Tabel Data Peliharaan</h1>
        <a href="peliharaan.php">Tambah Data</a>
        <br />
        <div class="table">
            <table>
                <tr style="background-color: rgb(220, 57, 57);">
                    <th>ID</th>
                    <th>Orang</th>
                    <th>Hewan</th>
                    <th>Warna</th>
                    <th>Operations</th>
                </tr>
                <tbody>
                    <?php
                    $sql = "SELECT p.id, o.nama AS nama_orang, h.nama AS nama_hewan, w.nama AS nama_warna
                    FROM peliharaan p
                    LEFT JOIN orang o
                    ON p.id_orang = o.id
                    LEFT JOIN hewan h
                    ON p.id_hewan = h.id
                    LEFT JOIN warna w
                    ON p.id_warna = w.id;";
                    $result = mysqli_query($con, $sql);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $nama_orang = $row['nama_orang'];
                            $nama_hewan = $row['nama_hewan'];
                            $nama_warna = $row['nama_warna'];

                            echo '<tr>';
                            echo "<th scope=\"row\">$id</th>";
                            echo "<td>$nama_orang</td>";
                            echo "<td>$nama_hewan</td>";
                            echo "<td>$nama_warna</td>";

                            echo '<td>
                            <button><a href="update.php?peliharaanId=' . $id . '">Edit</a></button>
                            <button><a href="delete.php?peliharaanId=' . $id . '" onclick="return confirm(\'Apakah kamu yakin ingin menghapus item ini?\');">Delete</a></button>
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