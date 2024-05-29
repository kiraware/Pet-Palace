<?php
    require '../connect.php';

    $id = $_GET['orangId'];

    $sql = "SELECT id, nama, no_telp, alamat FROM `orang` WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    $nama = $row['nama'];
    $no_telp = $row['no_telp'];
    $alamat = $row['alamat'];

    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $no_telp = $_POST['no_telp'];
        $alamat = $_POST['alamat'];

        $sql = "UPDATE `orang` SET id='$id', nama='$nama', no_telp='$no_telp', alamat='$alamat' WHERE id='$id'";
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
    <title>Pet Palace - Orang - Update</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script src="main.js"></script>
</head>

<body>
    <div id="test">
	<h1>Edit Data</h1>
	<div class="container">
    <form method="post">
        <fieldset>
        <legend>Edit Data Orang</legend>
            <p>
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Orang" value=<?php echo $nama;?>>
            </p>
            <p>
                <label for="no_telp">No Telpon:</label>
                <input type="text" name="no_telp" id="no_telp" placeholder="Masukkan No Telpon" value=<?php echo $no_telp;?>>
            </p>
            <p>
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat" value=<?php echo $alamat;?>>
            </p>
        </fieldset>
        <button type="submit" name="submit">Update Data</button>
    </form>
</body>

</html>