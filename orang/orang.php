<?php
require '../connect.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO `orang` (nama, no_telp, alamat) VALUES('$nama','$no_telp','$alamat')";
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Palace - Orang - Tambah</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col items-center bg-gray-300 dark:bg-gray-900 py-16">
    <div class="max-w-2xl w-full bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
        <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-white mb-8">Tambah Data Orang Baru</h2>
        <form method="post" class="flex flex-col gap-6">
            <div class="flex flex-col gap-2">
                <label for="nama" class="font-bold text-lg text-gray-700 dark:text-gray-200">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Orang" required class="text-base font-normal rounded-lg px-4 py-2 border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-teal-500">
            </div>
            <div class="flex flex-col gap-2">
                <label for="no_telp" class="font-bold text-lg text-gray-700 dark:text-gray-200">No Telpon</label>
                <input type="text" name="no_telp" id="no_telp" placeholder="Masukkan No Telpon" required class="text-base font-normal rounded-lg px-4 py-2 border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-teal-500">
            </div>
            <div class="flex flex-col gap-2">
                <label for="alamat" class="font-bold text-lg text-gray-700 dark:text-gray-200">Alamat</label>
                <input type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat" required class="text-base font-normal rounded-lg px-4 py-2 border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-teal-500">
            </div>
            <button type="submit" name="submit" class="bg-teal-500 hover:bg-teal-600 text-white font-semibold rounded-lg px-8 py-2 mt-4">Submit</button>
        </form>
    </div>
</body>

</html>
