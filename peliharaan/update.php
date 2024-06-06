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

$id = $_GET['peliharaanId'];

$sql = "SELECT p.id, p.id_orang, p.id_hewan, p.id_warna, o.nama AS nama_orang, h.nama AS nama_hewan, w.nama AS nama_warna
    FROM peliharaan p
    LEFT JOIN orang o
    ON p.id_orang = o.id
    LEFT JOIN hewan h
    ON p.id_hewan = h.id
    LEFT JOIN warna w
    ON p.id_warna = w.id
    WHERE p.id=$id;";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$id_orang = $row['id_orang'];
$id_hewan = $row['id_hewan'];
$id_warna = $row['id_warna'];
$nama_orang = $row['nama_orang'];
$nama_hewan = $row['nama_hewan'];
$nama_warna = $row['nama_warna'];

if (isset($_POST['submit'])) {
    $id_orang = $_POST['id_orang'];
    $id_hewan = $_POST['id_hewan'];
    $id_warna = $_POST['id_warna'];

    $sql = "UPDATE `peliharaan` SET id='$id', id_orang='$id_orang', id_hewan='$id_hewan', id_warna='$id_warna' WHERE id='$id'";
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
    <title>Pet Palace - peliharaan - Update</title>
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
                    <legend>Edit Data peliharaan</legend>
                    <p class="flex flex-col gap-2">
                        <label for="id_orang" class="font-bold text-xl text-white">Orang</label>
                        <select name="id_orang" id="id_orang" required>
                            <option disabled selected>Pilih Orang</option>
                            <?php while ($row = mysqli_fetch_assoc($result_orang)) { ?>
                                <option value="<?php echo $row['id']; ?>" <?php if ($id_orang == $row['id']) {
                                                                                echo 'selected';
                                                                            } ?>><?php echo $row['nama']; ?></option>
                            <?php } ?>
                        </select>
                    </p>
                    <p class="flex flex-col gap-2">
                        <label for="id_hewan" class="font-bold text-xl text-white">Hewan</label>
                        <select name="id_hewan" id="id_hewan" required>
                            <option disabled selected>Pilih Hewan</option>
                            <?php while ($row = mysqli_fetch_assoc($result_hewan)) { ?>
                                <option value="<?php echo $row['id']; ?>" <?php if ($id_hewan == $row['id']) {
                                                                                echo 'selected';
                                                                            } ?>><?php echo $row['nama']; ?></option>
                            <?php } ?>
                        </select>
                    </p>
                    <p class="flex flex-col gap-2">
                        <label for="id_warna" class="font-bold text-xl text-white">Warna</label>
                        <select name="id_warna" id="id_warna" required>
                            <option disabled selected>Pilih Warna</option>
                            <?php while ($row = mysqli_fetch_assoc($result_warna)) { ?>
                                <option value="<?php echo $row['id']; ?>" <?php if ($id_warna == $row['id']) {
                                                                                echo 'selected';
                                                                            } ?>><?php echo $row['nama']; ?></option>
                            <?php } ?>
                        </select>
                    </p>
                </fieldset>
                <button type="submit" name="submit">Update Data</button>
            </form>
</body>

</html>