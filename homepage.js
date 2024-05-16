var x = document.getElementById("notification");
var y = document.getElementById("teams");
var z = document.getElementById("schedule");
var w = document.getElementById("capstone");

function studentnotifAuth(){
    window.location.assign("NotificationPage.php")
}
function studentClass(){
  window.location.assign("StudentCourse.php")
}
function Studentarchive(){
  window.location.assign("HomePage.php")
} 
function StudentSchedule(){ 
  window.location.assign("DefenseSchedule.php")
} 
function StudentCapstone(){ 
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
  window.location.assign("LoginSignup.php")
}

const tap = document.querySelector('.profile');
tap.addEventListener('click', function () {
  const toggleMenu = document.querySelector('.menu');
  toggleMenu.classList.toggle('active');
});
document.addEventListener('profile', function () {
  const editProfileBtn = document.querySelector('.editprofileBtn');
  const logoutBtn = document.querySelector('.logoutBtn');

  editProfileBtn.addEventListener('click', function (event) { 
    event.preventDefault(); 
  }); 
});

document.getElementById('editProfileBtn').addEventListener('click', function() {
  var overlay = document.getElementById("editProfileOverlay");
  overlay.style.display = "block";
});
 
function closeEditform(){
  document.getElementById('editProfileOverlay').style.display = 'none';
  document.getElementById('menuBtn').style.display = 'block'; // Show the menuBtn element
}
