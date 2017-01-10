<?php

    // configuration
    require("config.php"); 

    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        $_SESSION["user"] = null;
        $_SESSION["id"] = null;
        redirect("/todo");
    }
        
        
?>