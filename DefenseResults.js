// left section action js 
function Users(){
    window.location.assign("Adminuser.php")
  }
  function openArchive(){
    window.location.assign("AdminHome.php")
  } 
  function logOUT(){
    window.location.assign("LoginSignup.php")
  } 
  function notifAuth(){
    window.location.assign("AdminNotifications.php")
  }
  function openClassPage(){
    window.location.assign("AdminCourseCreate.php")
  } 
  function logOUT(){
    window.location.assign("LoginSignup.php")
  }
  function Schedule(){
    window.location.assign("AdminDefenseschedule.php")
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
  
    
    function openArchive(){
      window.location.assign("ProfessorHome.php")
    }
    function notifProf(){
      window.location.assign("ProfNotificationPage.php")
    }
    function openClassPage(){
      window.location.assign("CourseCreate.php")
    } 
    function logOUT(){
      window.location.assign("LoginSignup.php")
    }
    function scheduleProf(){
      window.location.assign("Defenseschedule.php")
    }
    document.getElementById('editProfileBtn').addEventListener('click', function() {
      var overlay = document.getElementById("editProfileOverlay");
      overlay.style.display = "block";
    });