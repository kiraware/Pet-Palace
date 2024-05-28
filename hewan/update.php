<?php
    require 'connect.php';

    $id = $_GET['hewanId'];

    $sql = "SELECT id, name FROM `hewan` WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];

        $sql = "UPDATE `hewan` SET id='$id', name='$name' WHERE id='$id'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo 'Updated Successfully';
            // echo 'Data inserted successfully';
            header('location:display.php');
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
    <title>CRUD Operation</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script src="main.js"></script>
</head>

<body>
    <div id="test">
	<h1>Edit Data</h1>
	<div class="container">
    <form method="post">
        <fieldset>
        <legend>Edit Data Hewan</legend>
            <p>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" placeholder="name" value=<?php echo $name;?>>
            </p>
        </fieldset>
        <button type="submit" name="submit">Update Data</button>
    </form>
</body>

</html>