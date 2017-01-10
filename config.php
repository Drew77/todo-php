<?php

    /**
     * config.php
     * Configures app.
     */

    // display errors, warnings, and notices
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    // requirements
    require("helpers.php");
    require("connect.php");
    

    // enable sessions
    session_start();
    
    // set user global variable
    
    if (isset($_SESSION['id'])){
            $q = "SELECT * FROM users WHERE id = '". $_SESSION["id"] ."'" ;
            $results = mysqli_query($db, $q);
            $row = mysqli_fetch_array($results);
            $_SESSION["user"] = $row;
    }



?>
