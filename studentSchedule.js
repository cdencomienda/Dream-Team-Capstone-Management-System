// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("addScheduleBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closeM")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


function newGroupCreated() {
  var container = document.querySelector('.GroupContainer');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
}   

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
    window.location.assign("homepage.php")
  }
  function notifProf(){
    window.location.assign("NotificationPage.php")
  }
  function openClassPage(){
    window.location.assign("StudentCourse.php")
  } 
  function logOUT(){
    window.location.assign("LoginSignup.php")
  }
  function scheduleProf(){
    window.location.assign("studentSchedule.php")
  }
  document.getElementById('editProfileBtn').addEventListener('click', function() {
    var overlay = document.getElementById("editProfileOverlay");
    overlay.style.display = "block";
  });
  
   
function createDefenseContainer() {
  // Gather input values
  const schedTitle = document.getElementById('schedTitle').value;
  const time = document.getElementById('time').value;
  const date = document.getElementById('date').value;
  
  const groupName = document.getElementById('GroupName').value;
  // Create new defense schedule container
  const defenseContainer = document.createElement('div');
  defenseContainer.classList.add('DefenseScheduleCont');
  defenseContainer.innerHTML = `
      <div class="SchedTitle">
          <h2>${schedTitle}</h2>
      </div>
      <div class="SchedDetails">
          time: ${time}<br>
          date: ${date}<br>
          group name: ${groupName}<br>
      </div>
      <div class="DocumentStatus">
          Status: ?????
      </div>
  `;

  // Check if a new row needs to be created
  let lastRow = document.querySelector('.ScheduleRow:last-child');
  if (!lastRow || lastRow.children.length === 4) {
      lastRow = document.createElement('div');
      lastRow.classList.add('ScheduleRow');
      document.getElementById('scheduleContainer').appendChild(lastRow);
  }

  // Append the new container to the last row
  lastRow.appendChild(defenseContainer);

  // Scroll to the bottom to show the newly added row
  
}   
 
