<?php
    /**
     * Trying to connect
     * HOST = 'localhost'
     * USER = 'root'
     * PASSWORD = ''
     * DATABASE = 'crudoperation'
     * */
    $con = new mysqli('localhost', 'root', '', 'crudoperation');

    // Checking connection
    if (!$con) {
        // Connection Failed
        die(mysqli_error($con));
    }
?>