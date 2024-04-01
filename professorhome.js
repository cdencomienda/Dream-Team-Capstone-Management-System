function notifProf(){
    window.location.assign("NotificationProf.html")
}
function openClassPage(){
  window.location.assign("CourseCreate.html")
}
function archiveProf(){
  window.location.assign("ProfessorHome.html")
} 

document.addEventListener('DOMContentLoaded', function () {
  const editProfileBtn = document.querySelector('.editprofileBtn');
  const logoutBtn = document.querySelector('.logoutBtn');

  editProfileBtn.addEventListener('click', function (event) {
    // Prevent default behavior of anchor tag
    event.preventDefault();
    // Execute your edit profile function or redirect to the edit profile page
    // Example:
    // window.location.assign("EditProfilePage.html");
  }); 
});

function logOUT(){
  window.location.assign("LoginSignup.html")
}

const tap = document.querySelector('.profile');
tap.addEventListener('click', function () {
  const toggleMenu = document.querySelector('.menu');
  toggleMenu.classList.toggle('active');
});