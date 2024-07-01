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
  window.location.assign("studentSchedule.php")
} 
function StudentCapstone(){ 
} 
 

 // edit profile js 

document.addEventListener('DOMContentLoaded', (event) => {
  const profilePic = document.getElementById('profilePic');
  const menu = document.getElementById('menuBtn');
  const editProfileBtn = document.getElementById('editProfileBtn');
  const overlay = document.getElementById('editProfileOverlay');

  profilePic.addEventListener('click', () => {
      menu.classList.toggle('show');
  });

  document.addEventListener('click', (event) => {
      if (!profilePic.contains(event.target) && !menu.contains(event.target)) {
          menu.classList.remove('show');
      }
  });
  profile.addEventListener('click', function () {
    const toggleMenu = document.querySelector('.menu');
    toggleMenu.classList.toggle('active');
  });
   
  const tap = document.querySelector('.profile', 'melonbtn', 'editprofileBtn');
  tap.addEventListener('click', function () {
    const toggleMenu = document.querySelector('.menu', '.settingMelon', );
    toggleMenu.classList.toggle('active', 'melonActivate');
  }); 

  editProfileBtn.addEventListener('click', () => {
      overlay.classList.add('show');
      menu.classList.remove('show');
  });

  function closeEditform() {
      overlay.classList.remove('show');
  }

  window.onclick = function(event) {
      if (event.target == overlay) {
          overlay.classList.remove('show');
      }
  }

  // Attach closeEditform function to the global scope
  window.closeEditform = closeEditform;
}); 

function Back(){
  document.getElementById('menuBtn').style.display = 'none';
}

function logOUT(){
  window.location.assign("LoginSignup.php")
}
 