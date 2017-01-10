<?php   
    // configuration
    require("config.php"); 
    
    mysqli_query($db, "DELETE FROM events WHERE id = ".$_POST["id"]);
    
    
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