<?php
    require 'connect.php';

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];

        $sql = "INSERT INTO `hewan` (name) VALUES('$name')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            header('location:display.php');
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
    <title>CRUD Operation</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col items-center bg-gray-300 dark:bg-gray-900 py-16">
    <form method="post" class="flex flex-col items-center px-8 py-6 shadow-lg rounded-lg gap-6 bg-gray-400 dark:bg-gray-700">
        <legend class="text-3xl font-bold text-white">Tambah Data Hewan Baru</legend>
        <fieldset class="flex flex-col gap-2 w-full">
            <p class="flex flex-col gap-2">
                <label for="name" class="font-bold text-xl text-white">Name</label>
                <input type="text" name="name" id="name" placeholder="Masukkan Nama Hewan" required class="text-base font-normal rounded-lg px-4 py-2">
            </p>
        </fieldset>
        <button type="submit" name="submit" class="bg-teal-500 rounded-lg px-8 py-2 font-semibold text-base text-white w-full sm:w-auto self-end">Submit</button>
    </form>
</body>

</html>
