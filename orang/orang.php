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
    <form method="post" class="flex flex-col items-center px-8 py-6 shadow-lg rounded-lg gap-6 bg-gray-400 dark:bg-gray-700">
        <legend class="text-3xl font-bold text-white">Tambah Data Orang Baru</legend>
        <fieldset class="flex flex-col gap-2 w-full">
            <p class="flex flex-col gap-2">
                <label for="nama" class="font-bold text-xl text-white">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Orang" required class="text-base font-normal rounded-lg px-4 py-2">
            </p>
            <p class="flex flex-col gap-2">
                <label for="no_telp" class="font-bold text-xl text-white">No Telpon</label>
                <input type="text" name="no_telp" id="no_telp" placeholder="Masukkan No Telpon" required class="text-base font-normal rounded-lg px-4 py-2">
            </p>
            <p class="flex flex-col gap-2">
                <label for="alamat" class="font-bold text-xl text-white">Alamat</label>
                <input type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat" required class="text-base font-normal rounded-lg px-4 py-2">
            </p>
        </fieldset>
        <button type="submit" name="submit" class="bg-teal-500 rounded-lg px-8 py-2 font-semibold text-base text-white w-full sm:w-auto self-end">Submit</button>
    </form>
</body>

</html>
