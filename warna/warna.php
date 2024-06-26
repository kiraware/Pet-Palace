<?php
require '../connect.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];

    $sql = "INSERT INTO `warna` (id, nama, tanggal) VALUES('$id', '$nama', '$tanggal')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location:index.php');
    } else {
        echo 'Data insertion failed';
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Palace - Warna - Tambah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col items-center bg-gray-100 py-8">

    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Tambah Warna</h2>
        <form method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
                <input type="text" name="nama" id="nama" placeholder="Nama Warna" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="tanggal" class="block text-gray-700 text-sm font-bold mb-2">Tanggal:</label>
                <input type="text" name="tanggal" id="tanggal" placeholder="Masukkan Tanggal" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
        </form>
    </div>
</body>

</html>