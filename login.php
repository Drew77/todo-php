<?php

    // configuration
    require("config.php"); 
    
    // if user gets to page while logged in
    
    if (isset($_SESSION["id"])){
        redirect("/todo");
    }
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("login.php", ["title" => "Log In"]);
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST"){
         if ($_POST["username"] === ''){ // if username is empty
            render("login.php", ["title" => "Login", "error" => "You must supply a Username!"]);
        }
        else if ($_POST["password"] === ""){ // password is empty
            render("login.php", ["title" => "Login", "error" => "You must supply a Password!"]);
        }
        else {
            $q = "SELECT * FROM users WHERE username = '". $_POST["username"] ."'" ;
            $results = mysqli_query($db, $q);
            $user = mysqli_fetch_array($results);
            if (!password_verify($_POST["password"], $user["hash"])){
                render("login.php", ["title" => "Login", "error" => "Incorrect login"]);
            }
            else {
                $_SESSION["id"] = $user["id"];
                redirect("/todo");
            }
            
        }
    }

?>
