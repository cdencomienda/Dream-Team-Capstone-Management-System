document.addEventListener('profile', function () {
    const editProfileBtn = document.querySelector('.editprofileBtn');
    const logoutBtn = document.querySelector('.logoutBtn');
  
    editProfileBtn.addEventListener('click', function (event) { 
      event.preventDefault(); 
    }); 
  });



  function openArchive(){
    window.location.assign("Adminusers.html")
  }

  function logOUT(){
    window.location.assign("LoginSignup.php")
  }



  document.getElementById('editProfileBtn').addEventListener('click', function() {
    var overlay = document.getElementById("editProfileOverlay");
    overlay.style.display = "block";
  });
  
  function closeEditform(){
    document.getElementById('editProfileOverlay').style.display = 'none';
    document.getElementById('menuBtn').style.display = 'none';
    location.reload();
  }
  function Back(){
    document.getElementById('menuBtn').style.display = 'none';
  }
  
  window.onclick = function(event) {
    var overlay = document.getElementById("editProfileOverlay");
    if (event.target == overlay) {
        overlay.style.display = "none";
    }
  }
  
  const profile = document.querySelector('.profile');
  const editprofileBtn = document.querySelector('.editprofileBtn');
  
  profile.addEventListener('click', function () {
    const toggleMenu = document.querySelector('.menu');
    toggleMenu.classList.toggle('active');
  });
  