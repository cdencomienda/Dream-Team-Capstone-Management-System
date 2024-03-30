var x = document.getElementById("notification");
var y = document.getElementById("teams");
var z = document.getElementById("schedule");
var w = document.getElementById("capstone");

function notifAuth(){
    window.location.assign("NotificationPage.html")
}
function openClassPage(){
  window.location.assign("CourseCreate.html")
}
function archive(){
  window.location.assign("HomePage.html")
}
function notification(){
    w.style.visibility = "visible";
    x.style.left = "-488px";
    y.style.left = "212px";
    z.style.left = "110px";
}

const tap = document.querySelector('.profile');
  tap.addEventListener('click', function(){
       const toggleMenu = document.querySelector('.menu');
  toggleMenu.classList.toggle('active');
});

