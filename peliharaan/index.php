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
</head>
<body>
    <div id="test">
        <h1>Tabel Data Peliharaan</h1>
        <a href="peliharaan.php">Tambah Data</a>
        <br/>
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
                            <button><a href="update.php?peliharaanId='.$id.'">Edit</a></button>
                            <button><a href="delete.php?peliharaanId='.$id.'">Delete</a></button>
                            </td>'.
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
