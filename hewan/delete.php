<?php
    require '../connect.php';

    if (isset($_GET['hewanId'])) {
        $id = $_GET['hewanId'];

        $sql = "DELETE FROM `hewan` WHERE id=$id";
        $result = mysqli_query($con, $sql);

        if ($result) {
            // echo 'Deleted Successfully';
            header('location:display.php');
        } else {
            die(mysqli_error($con));
        }
    }
?>