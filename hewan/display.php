<?php
    require 'connect.php'; // Ensure this file exists and the path is correct
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operation</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script src="main.js"></script>
</head>
<body>
    <div id="test">
        <h1>Tabel Data Hewan</h1>
        <center><a href="hewan.php"><font size="15" color=" rgb(68, 57, 57);">Tambah Data</font></a></center>
        <br/>
        <div class="table">
            <table border=1>
                <tr style="background-color: rgb(220, 57, 57);">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Operations</th>
                </tr>
                <tbody>
                <?php
                    $sql = "SELECT id, name FROM `hewan`";
                    $result = mysqli_query($con, $sql);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['name'];

                            echo '<tr>';
                            echo "<th scope=\"row\">$id</th>";
                            echo "<td>$name</td>";

                            echo '<td>
                            <button><a href="update.php?hewanId='.$id.'">Edit</a></button>
                            <button><a href="delete.php?hewanId='.$id.'">Delete</a></button>
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
