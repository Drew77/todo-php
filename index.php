<?php
    // configuration
    require("config.php"); 
    $events = [];
    if (isset($_SESSION["id"])){
        $q = "SELECT * FROM events where user_id = " . $_SESSION['id'];
        $results = mysqli_query($db, $q);
        while ($event = mysqli_fetch_array($results)){
            array_push($events,$event);
        }
    }
    
    if (!isset($_SESSION["id"])){
        redirect("register.php");
    }
    
    // display users details
    else if ($_SERVER["REQUEST_METHOD"] == "GET") {
        render("index.php", ["title" => "todo!", "events" => $events]);
        
    }
