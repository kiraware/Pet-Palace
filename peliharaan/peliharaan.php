<?php
require '../connect.php';

// Mendapatkan data orang dari database
$sql_orang = "SELECT id, nama FROM orang";
$result_orang = mysqli_query($con, $sql_orang);

// Mendapatkan data hewan dari database
$sql_hewan = "SELECT id, nama FROM hewan";
$result_hewan = mysqli_query($con, $sql_hewan);

// Mendapatkan data warna dari database
$sql_warna = "SELECT id, nama FROM warna";
$result_warna = mysqli_query($con, $sql_warna);

if (isset($_POST['submit'])) {
    $id_orang = $_POST['id_orang'];
    $id_hewan = $_POST['id_hewan'];
    $id_warna = $_POST['id_warna'];

    $sql = "INSERT INTO `peliharaan` (id_orang, id_hewan, id_warna) VALUES('$id_orang','$id_hewan','$id_warna')";
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
    <title>Pet Palace - Peliharaan - Tambah</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col items-center bg-gray-300 dark:bg-gray-900 py-16">

    <form method="post" class="flex flex-col items-center px-8 py-6 shadow-lg rounded-lg gap-6 bg-gray-400 dark:bg-gray-700">
        <legend class="text-3xl font-bold text-white">Tambah Data Peliharaan Baru</legend>
        <fieldset class="flex flex-col gap-2 w-full">
            <p class="flex flex-col gap-2">
                <label for="id_orang" class="font-bold text-xl text-white">Orang</label>
                <select name="id_orang" id="id_orang" required>
                    <option disabled selected>Pilih Orang</option>
                    <?php while ($row = mysqli_fetch_assoc($result_orang)) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
                    <?php } ?>
                </select>
            </p>
            <p class="flex flex-col gap-2">
                <label for="id_hewan" class="font-bold text-xl text-white">Hewan</label>
                <select name="id_hewan" id="id_hewan" required>
                    <option disabled selected>Pilih Hewan</option>
                    <?php while ($row = mysqli_fetch_assoc($result_hewan)) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
                    <?php } ?>
                </select>
            </p>
            <p class="flex flex-col gap-2">
                <label for="id_warna" class="font-bold text-xl text-white">Warna</label>
                <select name="id_warna" id="id_warna" required>
                    <option disabled selected>Pilih Warna</option>
                    <?php while ($row = mysqli_fetch_assoc($result_warna)) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
                    <?php } ?>
                </select>
            </p>
        </fieldset>
        <button type="submit" name="submit" class="bg-teal-500 rounded-lg px-8 py-2 font-semibold text-base text-white w-full sm:w-auto self-end">Submit</button>
    </form>
</body>

</html>