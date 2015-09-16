var dayNow = new Date();
var dayDestination = new Date(dayNow.getFullYear(), dayNow.getMonth(), dayNow.getDate()+2); 
console.log(dayDestination);

var datediff = dayDestination.getTime() - dayNow.getTime();

var offset = Math.floor(datediff/1000);
function timer() {
    var days        = Math.floor(offset/24/60/60);
    var hoursLeft   = Math.floor((offset) - (days*24*60*60));
    var hours       = Math.floor(hoursLeft/60/60);
    var minutesLeft = Math.floor((hoursLeft) - (hours*60*60));
    var minutes     = Math.floor(minutesLeft/60);
    var seconds = offset % 60;
    if (seconds < 10) {
        seconds = "0" + seconds;
    }
    document.getElementById('countdown').innerHTML ="Còn " + days + " days " + hours + " hours " + minutes + " minutes " + seconds + " seconds";
    if (offset === 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "";
    } else {
        offset--;
        if (offset < 10){
            var element = document.getElementById('countdown');
            element.style.color = 'red';
            setTimeout(function(){
                element.style.display = 'none';
            }, 500);
            setTimeout(function(){
                element.style.display = 'block';
            }, 1000);
        }
    }
}
var countdownTimer = setInterval('timer()', 1000);  
