<?php
    require '../connect.php';

    if (isset($_GET['peliharaanId'])) {
        $id = $_GET['peliharaanId'];

        $sql = "DELETE FROM `peliharaan` WHERE id=$id";
        $result = mysqli_query($con, $sql);

        if ($result) {
            // echo 'Deleted Successfully';
            header('location:index.php');
        } else {
            die(mysqli_error($con));
        }
    }
?>