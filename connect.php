<?php
    /**
     * Trying to connect
     * HOST = 'localhost'
     * USER = 'root'
     * PASSWORD = ''
     * DATABASE = 'pet_palace'
     * */
    $con = new mysqli('localhost', 'root', '', 'pet_palace');

    // Checking connection
    if (!$con) {
        // Connection Failed
        die(mysqli_error($con));
    }
?>