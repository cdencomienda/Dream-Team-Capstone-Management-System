let button = document.getElementById("read");

button.addEventListener('click',() => {
  document.querySelectorAll('.single-box').forEach(e => {
    e.classList.remove('unseen');
  });
  document.querySelectorAll('.dot').forEach(e => {
    e.classList.remove('dot');
  });
  document.getElementById('num').innerText = '0';
})

function notifAuth(){
    window.location.assign("NotificationPage.html")
} 
function openClassPage(){
    window.location.assign("CourseCreate.html")
}
function archive(){
    window.location.assign("HomePage.html")
}