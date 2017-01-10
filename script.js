$( document ).ready(function() {
    var events;
    $.ajax({
          url: 'list.php',
          type: 'post',
          data: [],
          success: function(data, status) {
             data = JSON.parse(data);  
             events = data[1]; 
          },
          error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
          }
        }); // end ajax call
    // show form to add new event
    $('.showform').on('click', function(){
        $('.addevent').fadeIn(300);
    });
    
    // clear description input on focus
    $(".description").on('focus', function(){
        $(this).html("");
    });
    $('.list').on('click', 'li', function(){
        var n = $(this).attr('data-num');;
        $('.overlay').toggleClass('hidden');
        $('.modal').toggleClass('hidden');
        $('.modal .title').html(events[n]["event"]);
        $('.modal .date').html(events[n]["date"]);
        $('.modal p').html(events[n]["description"]);
        $('.modal').attr('data-id', events[n]["id"]);
        
    });
    
    $('ul').on('click','i',function(event){
        event.stopPropagation();
        var li = $(this).closest('li');
        var id = events[li.attr('data-num')]["id"];
        var state = li.hasClass('strike');
        var values = {'id' : id, 'state' : state};
        
        $.ajax({
          url: 'strike.php',
          type: 'post',
          data: values,
          success: function(data, status) {
             data = JSON.parse(data); 
             events = data[1]; 
             $('.list').html(data[0]);
             console.log(data);
          },
          error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
          }
        }); // end ajax call
    })
    
    $('.remove-event').on('click',function(){
        var id = $('.modal').attr('data-id'); 
        var values = {'id' : id};
        $.ajax({
          url: 'remove.php',
          type: 'post',
          data: values,
          success: function(data, status) {
             data = JSON.parse(data); 
             events = data[1]; 
             console.log(events);
             $('.list').html(data[0]);
          },
          error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
          }
        }); // end ajax call
        $('.overlay').toggleClass('hidden');
        $('.modal').toggleClass('hidden');
    });

    
    $('.overlay').on('click', function(){
        $(this).toggleClass('hidden');
        $('.modal').toggleClass('hidden');
    });
    
    // update list
    $('.submitevent').on('click', function(e){
        e.preventDefault();
        var values = $('.eventform').serialize();
        $('.addevent').fadeOut(300);
        $('.eventform')[0].reset();
        $.ajax({
          url: 'list.php',
          type: 'post',
          data: values,
          success: function(data, status) {
             data = JSON.parse(data); 
             events = data[1]; 
             $('.list').html(data[0]);
             
              
          },
          error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
          }
        }); // end ajax call
        
            // display event details and activate overlay

    
});



});

