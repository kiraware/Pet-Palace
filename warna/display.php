<?php
require 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operation</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .container {
            text-align: center;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Warna</h2>
        <button class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4"><a href="user.php">Add Warna</a></button>
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Nama</th>
                    <th class="py-2 px-4 border-b">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT id, nama FROM `warna`";
                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $nama = $row['nama'];

                        echo '<tr>';
                        echo "<td class=\"py-2 px-4 border-b\">$id</td>";
                        echo "<td class=\"py-2 px-4 border-b\">$nama</td>";
                        echo '<td class="py-2 px-4 border-b">';
                        echo '<button class="bg-yellow-500 text-white px-2 py-1 rounded-md mr-2"><a href="update.php?id='.$id.'">Update</a></button>';
                        echo '<button class="bg-red-500 text-white px-2 py-1 rounded-md"><a href="delete.php?id='.$id.'">Delete</a></button>';
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
