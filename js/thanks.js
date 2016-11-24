//java script for calculator
//when a send button is pressed
//this function creates a pop up informing
// the user that they have sent the message
//then redirects them
console.log("Javascript is running");

'use strict';

$("#booked").click( function() {
    alert("You have successfully booked, thank you for using our app.");
    var count = 1;
    setInterval(function(){
        count--;
        if (count == 0) {
            window.location = './index.php'; 
        }
    },1000);
});



