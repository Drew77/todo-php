<?php   
    // configuration
    require("config.php"); 
    
    if (isset($_POST["event"])){
        $event = mysqli_real_escape_string($db, $_POST["event"]);
        $description = mysqli_real_escape_string($db, $_POST["description"]);
        mysqli_query($db, "INSERT INTO events (event, date, user_id, description) VALUES('" . $_POST["event"] . "','".$_POST["date"]."','".$_SESSION["id"] . "','$description')");
    }
    
    
    // create array of events
    $events = [];
    $q = "SELECT * FROM events where user_id = " . $_SESSION['id'];
    $results = mysqli_query($db, $q);
    while ($event = mysqli_fetch_array($results)){
        array_push($events,$event);
    }
    $html = "";
    $n = 0;
    foreach($events as $event){
        $html .= "<li class='".$event["strike"]. "' data-num='". $n. "'> <p class='events'><i class='fa fa-check' aria-hidden='true'></i>". $event["event"]. "</p><p class='dates'>". $event["date"]. "</p</li>";  
        $n++;
    }
    
    $response = [];
    array_push($response, $html);
    array_push($response, $events);
    echo json_encode($response);
    
    ?>