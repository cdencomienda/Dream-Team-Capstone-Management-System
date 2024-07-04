 


document.addEventListener('click', e =>{
    const isflsDropdowButton = e.target.matches("[data-flsDropdown-button]")
    if(!isflsDropdowButton && e.target.closest('[data-flsDropdown]') != null)
    return
    
    let currentflsDropdown
    if(isflsDropdowButton){
        currentflsDropdown = e.target.closest('[data-flsDropdown]')
        currentflsDropdown.classList.toggle('active')
    }
    
    document.querySelectorAll("[data-flsDropdown].active").forEach(flsDropdown => {
        if (flsDropdown === currentflsDropdown) return
        flsDropdown.classList.remove("active")
    });
    }) 



// Add an event listener to the "Members" button
document.querySelector('.Members-Btn').addEventListener('click', fetchGroupMembers);


function studentnotifAuth(){
    window.location.assign("NotificationPage.php")
}
function studentClass(){
window.location.assign("StudentCourse.php")
}
function archive(){
window.location.assign("HomePage.php")
} 
function StudentSchedule(){ 
    window.location.assign("studentSchedule.php")
  } 
  
function showDefaultBody() {
    document.getElementById("defaultBody").style.display = "block";
    document.getElementById("submissionFrame").style.display = "none";
  
}

function submissionBtnAuth() {
    document.getElementById("defaultBody").style.display = "none";
    document.getElementById("submissionFrame").style.display = "flex";

}

function newGroupCreated() {
    var container = document.querySelector('.student');
    container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
  }
 
 // viewfiles  

 function openModal(filePath) {
    document.getElementById('fileFrame').src = filePath;
    document.getElementById('fileModal').style.display = "block";
}
function closeModal() {
    document.getElementById('fileFrame').src = "";
    document.getElementById('fileModal').style.display = "none";
}

// Close the modal when the user clicks anywhere outside of the modal content
window.onclick = function(event) {
    var modal = document.getElementById('fileModal');
    if (event.target == modal) {
        closeModal();
    }
}

function showModal() {
  document.getElementById('rubricModal').style.display = "block";
}

function closeModal() {
  document.getElementById('rubricModal').style.display = "none";
}

// Close the modal if the user clicks outside of it
window.onclick = function(event) {
  var modal = document.getElementById('rubricModal');
  if (event.target == modal) {
      modal.style.display = "none";
  }
}

function toggleDocuReqLogs() {
  const popup = document.getElementById('DocuReqrmntLogs');
  const isDisplayed = popup.style.display === 'block';

  // Close any other open popups
  const popups = document.getElementsByClassName('fileLogsPopup');
  for (let i = 0; i < popups.length; i++) {
      popups[i].style.display = 'none';
  }

  // Toggle the current popup
  popup.style.display = isDisplayed ? 'none' : 'block';

  if (!isDisplayed) {
      popup.innerHTML = `
          <h4>Document Requirement Logs</h4>
          <div class="logItem" id="logItem1" onclick="openModal('requirement%20_repository/docu-logs/docu-test1.pdf')">
              <img src="https://via.placeholder.com/24" alt="file icon">
              <div class="fileName">docu-test1.pdf</div>
          </div>

      `;
  }
}

// docu/adv logs

function toggleAdvReqLogs() {
  const popup = document.getElementById('AdvReqrmntLogs');
  const isDisplayed = popup.style.display === 'block';

  // Close any other open popups
  const popups = document.getElementsByClassName('fileLogsPopup');
  for (let i = 0; i < popups.length; i++) {
      popups[i].style.display = 'none';
  }

  // Toggle the current popup
  popup.style.display = isDisplayed ? 'none' : 'block';

  if (!isDisplayed) {
      popup.innerHTML = `
          <h4>Advisor's Recommendations Sheet</h4>
          <div class="logItem" onclick="openModal('requirement%20_repository/adv-logs/adv-test1.pdf')">
              <img src="https://via.placeholder.com/24" alt="file icon">
              <div class="fileName">adv-test1.pdf</div>
              <div class="fileVersion">version 3.0</div>
          </div>
          <div class="logItem" onclick="openModal('requirement%20_repository/adv-logs/adv-test2.pdf')">
              <img src="https://via.placeholder.com/24" alt="file icon">
              <div class="fileName">adv-test2.pdf</div>
              <div class="fileVersion">version 2.0</div>
          </div>
          <div class="logItem" onclick="openModal('requirement%20_repository/adv-logs/adv-test3.pdf')">
              <img src="https://via.placeholder.com/24" alt="file icon">
              <div class="fileName">adv-test3.pdf</div>
              <div class="fileVersion">version 1.0</div>
          </div>
           <div class="logItem" onclick="openModal('requirement%20_repository/adv-logs/adv-test3.pdf')">
              <img src="https://via.placeholder.com/24" alt="file icon">
              <div class="fileName">adv-test3.pdf</div>
              <div class="fileVersion">version 1.0</div>
          </div>
           <div class="logItem" onclick="openModal('requirement%20_repository/adv-logs/adv-test3.pdf')">
              <img src="https://via.placeholder.com/24" alt="file icon">
              <div class="fileName">adv-test3.pdf</div>
              <div class="fileVersion">version 1.0</div>
          </div>
           <div class="logItem" onclick="openModal('requirement%20_repository/adv-logs/adv-test3.pdf')">
              <img src="https://via.placeholder.com/24" alt="file icon">
              <div class="fileName">adv-test3.pdf</div>
              <div class="fileVersion">version 1.0</div>
          </div>
      `;
  }
}

function openModal(filePath) {
  document.getElementById('fileFrame').src = filePath;
  document.getElementById('fileModal').style.display = "block";
}

odal = document.getElementById('fileModal');
  if (event.target == modal) {
      closeModal();
  }
function closeModal() {
  document.getElementById('fileFrame').src = "";
  document.getElementById('fileModal').style.display = "none";
}

// Close the modal when the user clicks anywhere outside of the modal content
window.onclick = function(event) {
  var m
  // Close the popup if clicked outside
  if (!event.target.matches('.DocuReqLogs, .AdvLogs, .fa-ellipsis')) {
      const popups = document.getElementsByClassName('fileLogsPopup');
      for (let i = 0; i < popups.length; i++) {
          popups[i].style.display = 'none';
      }
  }
}

   

document.getElementById('input-file').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const attachedFileContainer = document.querySelector('.Attached-FileCont');
        
        // Create a new div element to display the file name
        const fileDiv = document.createElement('div');
        fileDiv.className = 'attached-file';
        fileDiv.textContent = file.name;
        
        // Append the new div to the attached files container
        attachedFileContainer.appendChild(fileDiv);
    }
});
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


  function showStudentDefault() {
    const studentDefault = document.getElementById('StudentDefault');
    studentDefault.style.display = studentDefault.style.display === 'block' ? 'none' : 'block';
}