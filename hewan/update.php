<?php
require '../connect.php';

$id = $_GET['hewanId'];

$sql = "SELECT id, nama FROM `hewan` WHERE id='$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$nama = $row['nama'];

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];

    $sql = "UPDATE `hewan` SET id='$id', nama='$nama' WHERE id='$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo 'Updated Successfully';
        // echo 'Data inserted successfully';
        header('location:index.php');
    } else {
        echo 'Data inserted failed';
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Palace - Hewan - Update</title>
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
        <h1>Edit Data</h1>
        <div class="container">
            <form method="post">
                <fieldset>
                    <legend>Edit Data Hewan</legend>
                    <p>
                        <label for="nama">Nama:</label>
                        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Hewan" value=<?php echo $nama; ?>>
                    </p>
                </fieldset>
                <button type="submit" name="submit">Update Data</button>
            </form>
</body>

</html>