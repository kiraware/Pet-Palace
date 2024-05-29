<?php
    require '../connect.php';

    if (isset($_GET['orangId'])) {
        $id = $_GET['orangId'];

        $sql = "DELETE FROM `orang` WHERE id=$id";
        $result = mysqli_query($con, $sql);

        if ($result) {
            // echo 'Deleted Successfully';
            header('location:index.php');
        } else {
            die(mysqli_error($con));
        }
    }
?>