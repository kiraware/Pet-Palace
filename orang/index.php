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
</head>
<body>
    <div id="test">
        <h1>Tabel Data Orang</h1>
        <a href="orang.php">Tambah Data</a>
        <br/>
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
                            <button><a href="update.php?orangId='.$id.'">Edit</a></button>
                            <button><a href="delete.php?orangId='.$id.'">Delete</a></button>
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
