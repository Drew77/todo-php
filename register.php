<?php

    // configuration
    require("config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        if (isset($_SESSION["user"])){
            redirect("/todo");
        }
        else {
            render("register_form.php", ["title" => "Create Account"]);
        }
        
        
        
    }
    
    else if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if ($_POST["username"] === ''){ // if username is empty
            render("register_form.php", ["title" => "Create Account", "error" => "You must supply a Username!"]);
        }
        else if ($_POST["password"] === ""){ // password is empty
            render("register_form.php", ["title" => "Create Account", "error" => "You must supply a Password!"]);
        }
        else if ($_POST["password"] !== $_POST["confirmation"]){ // password and confirmation not the same
            render("register_form.php", ["title" => "Create Account", "error" => "Your Passwords must match!"]);
        }
        $username = mysqli_real_escape_string($db, $_POST["username"]);
        $q = "SELECT * FROM `users` WHERE `username` = '$username'" ; 
        if ( $db->query($q)->num_rows == 1){  // if username is taken
            render("register_form.php", ["title" => "Create Account", "error" => "Your Username is taken!"]);
        }
        else{ // add user, create session id and redirect to /todo
            mysqli_query($db, "INSERT IGNORE INTO users (username, hash) VALUES('" . $username . "','". password_hash($_POST["password"], PASSWORD_DEFAULT). "')");
            $results = mysqli_query($db, $q);
            $row = mysqli_fetch_array($results);
            $_SESSION["id"] = $row["id"];
            redirect('/todo');
            
        }
            
            

        
        
    }


?>
