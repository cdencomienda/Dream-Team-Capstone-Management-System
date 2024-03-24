var x = document.getElementById("notification");
var y = document.getElementById("teams");
var z = document.getElementById("schedule");
var w = document.getElementById("capstone");

function notifAuth(){
    window.location.assign("NotificationPage.html")
}

function notification(){
    w.style.visibility = "visible";
    x.style.left = "-488px";
    y.style.left = "212px";
    z.style.left = "110px";
}