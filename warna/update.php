<?php
require '../connect.php';


$id = $nama = $tanggal = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];

    $stmt = $con->prepare("UPDATE `warna` SET id=?, nama=?, tanggal=? WHERE id=?");
    $stmt->bind_param("isi", $id, $nama, $tanggal, $id);


    if ($stmt->execute()) {

        header('location:index.php');
        exit;
    } else {
        echo 'Update Failed';
        die(mysqli_error($con));
    }
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $stmt = $con->prepare("SELECT id, nama, tanggal FROM `warna` WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $nama = $row['nama'];
        $tanggal = $row['tanggal'];
    } else {
        echo "ID tidak ditemukan.";
        exit;
    }
} else {
    echo "ID tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Palace - Warna - Update</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Update Warna</h2>
        <form method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="id">
                    ID
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="id" name="id" type="text" placeholder="ID" value="<?php echo $id; ?>" readonly>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                    Nama
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama" name="nama" type="text" placeholder="Nama" value="<?php echo $nama; ?>">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal">
                    Tanggal
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tanggal" name="tanggal" type="text" placeholder="tanggal" value="<?php echo $tanggal; ?>">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="submit">
                    Update
                </button>
            </div>
        </form>
    </div>
</body>

</html>