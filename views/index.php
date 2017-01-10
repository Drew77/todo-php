    <div class="todos">
    <div class="dothis">Do This</div><div class="dodate">By</div>
    <ul class="list">
<?php 
    if (count($events) > 0) { 
    $n = 0;?>
<?php        foreach($events as $event){
            echo "<li class='".$event["strike"]. "' data-num='". $n. "'> <p class='events'><i class='fa fa-check' aria-hidden='true'></i>". $event["event"]. "</p><p class='dates'>". $event["date"]. "</p</li>"; 
            $n++;
        }
    echo "</div>";
    }
    ?>
        </ul>

<button class="showform">Add Todo</button>
<div class ="event-details">
    
</div>

<div class="overlay hidden"></div>
<div class="modal hidden" data-id="">
    <div class="modal-header">
        <h3 class="title"></h3>
        <h4 class="date"></h3>
    </div>  
        <p class="description"></p>
    <button class="remove-event">Delete Event</button>
 
</div>
<div class="addevent">
    <form class="eventform"  action = "index.php" method = "POST">
        <input type="text" name="event" placeholder="title"/>
        <input type="date" name="date"/>
        <textarea class="description" name="description">description</textarea>
        <input class="submitevent" type="submit" value="Submit">
    </form>
</div>