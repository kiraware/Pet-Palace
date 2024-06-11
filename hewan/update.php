<?php
require '../connect.php';

$id = $_GET['hewanId'];

$sql = "SELECT id, nama, jenis FROM `hewan` WHERE id='$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$nama = $row['nama'];
$jenis = $row['jenis'];

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];

    $sql = "UPDATE `hewan` SET nama='$nama', jenis='$jenis' WHERE id='$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location:index.php');
    } else {
        echo 'Data update failed';
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
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col items-center bg-gray-300 dark:bg-gray-900 py-16">
    <div class="max-w-2xl w-full bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
        <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-white mb-8">Edit Data Hewan</h2>
        <form method="post" class="flex flex-col gap-6">
            <div class="flex flex-col gap-2">
                <label for="nama" class="font-bold text-lg text-gray-700 dark:text-gray-200">Nama:</label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Hewan" value="<?php echo $nama; ?>" required class="text-base font-normal rounded-lg px-4 py-2 border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-teal-500">
            </div>
            <div class="flex flex-col gap-2">
                <label for="jenis" class="font-bold text-lg text-gray-700 dark:text-gray-200">Jenis:</label>
                <input type="text" name="jenis" id="jenis" placeholder="Masukkan Jenis" value="<?php echo $jenis; ?>" required class="text-base font-normal rounded-lg px-4 py-2 border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-teal-500">
            </div>
            <button type="submit" name="submit" class="bg-teal-500 hover:bg-teal-600 text-white font-semibold rounded-lg px-8 py-2 mt-4">Update Data</button>
        </form>
    </div>
</body>

</html>
