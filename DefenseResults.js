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

    function showStats(courseId) {
      document.querySelectorAll('.stats-container').forEach(function(div) {
          div.classList.remove('active');
      });
      document.getElementById(courseId).classList.add('active');
      document.getElementById('stats-modal').style.display = 'block';
  }

  function closeModal() {
      document.getElementById('stats-modal').style.display = 'none';
  }

  function updateStats() {
      var year = document.getElementById('academic-year').value;
      var activeDiv = document.querySelector('.stats-container.active');
      var stats = getStats(activeDiv.id.replace('-stats', ''), year);
      updateModalContent(stats);
  }

  function getStats(courseId, year) {
      // This function should return stats based on courseId and year
      // Here, we are using dummy data
      const dummyStats = {
          'DATAMGT': {
              '2023-2026': { pass: 5, conditionalPass: 70, repeat: 20, passingRate: 75 },
              '2022-2025': { pass: 10, conditionalPass: 60, repeat: 30, passingRate: 70 },
          },
          'SOFTDES': {
              '2023-2026': { pass: 10, conditionalPass: 60, repeat: 30, passingRate: 70 },
              '2022-2025': { pass: 15, conditionalPass: 50, repeat: 35, passingRate: 65 },
          },
          // Add stats for other courses and years
      };
      return dummyStats[courseId][year];
  }

  function updateModalContent(stats) {
      document.getElementById('pass').innerText = stats.pass + '%';
      document.getElementById('conditional-pass').innerText = stats.conditionalPass + '%';
      document.getElementById('repeat').innerText = stats.repeat + '%';
      document.getElementById('passing-rate').innerText = stats.passingRate + '%';
  }
  $(document).ready(function(){
    // Function to animate bars based on percentage values
    function animateBars() {
        $('.bar').each(function() {
            var percentage = $(this).data('percentage');
            $(this).animate({
                height: percentage
            }, 1000);
        });
    }
    
    // Call the function when the document is ready
    animateBars();
}); 