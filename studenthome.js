const tap = document.querySelector('.profile');
  tap.addEventListener('click', function(){
       const toggleMenu = document.querySelector('.menu');
  toggleMenu.classList.toggle('active');
});

function notifAuth(){
    window.location.assign("NotificationPage.html")
  } 
  function openClassPage(){
    window.location.assign("CourseCreate.html")
  }
  function archive(){
    window.location.assign("HomePage.html")
  }