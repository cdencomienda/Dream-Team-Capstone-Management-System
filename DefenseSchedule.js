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

profile.addEventListener('click', function () {
  const toggleMenu = document.querySelector('.menu');
  toggleMenu.classList.toggle('active');
});

function logOUT(){
  window.location.assign("LoginSignup.php")
}

 
 
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
  function capstoneProf(){
    window.location.assign("Capstone.php")
  }
  function scheduleProf(){
    window.location.assign("Defenseschedule.php")
  }
  function advisoryProf(){
    window.location.assign("advisory.php")
  }
  function createDefenseContainer() {
    // Gather input values
    const schedTitle = document.getElementById('schedTitle').value;
    const time = document.getElementById('time').value;
    const date = document.getElementById('date').value;
    const groupName = document.getElementById('GroupName').value;

    // Check if a schedule with the same time, group name, or title already exists
    const existingSchedules = document.querySelectorAll('.DefenseScheduleCont');
    for (let i = 0; i < existingSchedules.length; i++) {
        const existingDetails = existingSchedules[i].querySelector('.SchedDetails').innerHTML;
        const existingTitle = existingSchedules[i].querySelector('.SchedTitle h2').innerText;

        if (existingDetails.includes(`time: ${time}`)) {
            alert('A schedule with the same time already exists. Please choose a different time.');
            return;
        }

        if (existingDetails.includes(`group name: ${groupName}`)) {
            alert('A schedule with the same group name already exists. Please choose a different group name.');
            return;
        }

        if (existingTitle === schedTitle) {
            alert('A schedule with the same title already exists. Please choose a different title.');
            return;
        }
    }

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
    // defenseContainer.scrollIntoView({ behavior: 'smooth' });
}

 
