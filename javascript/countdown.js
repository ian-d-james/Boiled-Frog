// Set the date to the climate clock's date to hit a 1.5 degree increase - updated on December 5, 2018
var countDownDate = new Date("Dec 1, 2034").getTime();

// Update the count down every 1 second
var timer = setInterval(function() {

// Get today's date and time
var now = new Date().getTime();

// Get time remaining
var distance = countDownDate - now;
 
if (distance >= 0) {

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var mins = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var secs = Math.floor((distance % (1000 * 60)) / 1000);
     
    var years = 0;
    if (days > 365) {
        years = Math.floor(days / 365);
        days = days % 365;
    }

    // Output the result in an element with id="timer"

    document.getElementById("timer-years1").innerHTML = years +
    "<span class='label'>Year(s)</span>";
    document.getElementById("timer-days1").innerHTML = days +
    "<span class='label'>Day(s)</span>";
    document.getElementById("timer-hours1").innerHTML = ("0"+hours).slice(-2) +
    "<span class='label'>Hr(s)</span>";
    document.getElementById("timer-mins1").innerHTML = ("0"+mins).slice(-2) +
    "<span class='label'>Min(s)</span>";
    document.getElementById("timer-secs1").innerHTML = ("0"+secs).slice(-2) +
    "<span class='label'>Sec(s)</span>";

    document.getElementById("timer-years2").innerHTML = years +
    "<span class='label'>Year(s)</span>";
    document.getElementById("timer-days2").innerHTML = days +
    "<span class='label'>Day(s)</span>";
    document.getElementById("timer-hours2").innerHTML = ("0"+hours).slice(-2) +
    "<span class='label'>Hr(s)</span>";
    document.getElementById("timer-mins2").innerHTML = ("0"+mins).slice(-2) +
    "<span class='label'>Min(s)</span>";
    document.getElementById("timer-secs2").innerHTML = ("0"+secs).slice(-2) +
    "<span class='label'>Sec(s)</span>";

    document.getElementById("timer-years3").innerHTML = years +
    "<span class='label'>Year(s)</span>";
    document.getElementById("timer-days3").innerHTML = days +
    "<span class='label'>Day(s)</span>";
    document.getElementById("timer-hours3").innerHTML = ("0"+hours).slice(-2) +
    "<span class='label'>Hr(s)</span>";
    document.getElementById("timer-mins3").innerHTML = ("0"+mins).slice(-2) +
    "<span class='label'>Min(s)</span>";
    document.getElementById("timer-secs3").innerHTML = ("0"+secs).slice(-2) +
    "<span class='label'>Sec(s)</span>";

    document.getElementById("timer-years4").innerHTML = years +
    "<span class='label'>Year(s)</span>";
    document.getElementById("timer-days4").innerHTML = days +
    "<span class='label'>Day(s)</span>";
    document.getElementById("timer-hours4").innerHTML = ("0"+hours).slice(-2) +
    "<span class='label'>Hr(s)</span>";
    document.getElementById("timer-mins4").innerHTML = ("0"+mins).slice(-2) +
    "<span class='label'>Min(s)</span>";
    document.getElementById("timer-secs4").innerHTML = ("0"+secs).slice(-2) +
    "<span class='label'>Sec(s)</span>";

    document.getElementById("timer-years5").innerHTML = years +
    "<span class='label'>Year(s)</span>";
    document.getElementById("timer-days5").innerHTML = days +
    "<span class='label'>Day(s)</span>";
    document.getElementById("timer-hours5").innerHTML = ("0"+hours).slice(-2) +
    "<span class='label'>Hr(s)</span>";
    document.getElementById("timer-mins5").innerHTML = ("0"+mins).slice(-2) +
    "<span class='label'>Min(s)</span>";
    document.getElementById("timer-secs5").innerHTML = ("0"+secs).slice(-2) +
    "<span class='label'>Sec(s)</span>";

    document.getElementById("timer-years6").innerHTML = years +
    "<span class='label'>Year(s)</span>";
    document.getElementById("timer-days6").innerHTML = days +
    "<span class='label'>Day(s)</span>";
    document.getElementById("timer-hours6").innerHTML = ("0"+hours).slice(-2) +
    "<span class='label'>Hr(s)</span>";
    document.getElementById("timer-mins6").innerHTML = ("0"+mins).slice(-2) +
    "<span class='label'>Min(s)</span>";
    document.getElementById("timer-secs6").innerHTML = ("0"+secs).slice(-2) +
    "<span class='label'>Sec(s)</span>";

} else {

    clearInterval(x);
    document.getElementById("timer").innerHTML = "Countdown is over!";
}

}, 1000);