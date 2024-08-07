document.addEventListener('DOMContentLoaded', function() {
    const dropdownsClass = document.querySelectorAll('.classListDropdown');

    dropdownsClass.forEach(dropdown => {
        const listClass = dropdown.querySelector('.listClass');
        const menuCourses = dropdown.querySelector('.menuCourses');
        const options = dropdown.querySelectorAll('.menuCourses > .term');
        const selectedClass = dropdown.querySelector('.selectedClass');

        listClass.addEventListener('click', () => {
            menuCourses.classList.toggle('menuCourses-open');
        });

        options.forEach(option => {
            option.addEventListener('click', () => {
                // Update the selected class text
                selectedClass.innerText = option.innerText;

                // Hide all course details
                document.querySelectorAll('.coursesDetails').forEach(detail => {
                    detail.style.display = 'none';
                });

                // Show the selected term's courses
                const term = option.getAttribute('data-term');
                const coursesDetail = document.getElementById(term);
                if (coursesDetail) {
                    coursesDetail.style.display = 'block';
                }

                // Hide the main menuCourses
                menuCourses.classList.remove('menuCourses-open');
            });
        });
    });

    function dropdownMelon(button) {
        const container = button.parentNode.querySelector('.dropdown-content');
        container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
    }

    const dropdownBtns = document.querySelectorAll('.dropdownbtn');

    dropdownBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const allDropdowns = document.querySelectorAll('.dropdown-content');
            allDropdowns.forEach(dropdown => {
                dropdown.style.display = 'none';
            });
        });
    });

    // Your other functions like AddMembers, setrequirements, rubric, rubric_preview, etc.
    function AddMembers() { 
        var container = document.querySelector('.addmember');
        container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
    }

    function setrequirements() { 
        var container = document.querySelector('.setrequirements');
        container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
    }

    function rubric() { 
        var container = document.querySelector('.defense-main');
        container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
    }

    function rubric_preview() { 
        var container = document.querySelector('.rubriccontainer');
        container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
    }
});



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
    var container = document.querySelector('.defaultBody'); 
    container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
} 
function newGroupCreated() {
    document.getElementById("rubriccontainer").style.display = "none";
    var container = document.querySelector('.StudentDefault');
    container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
}

function submissionBtnAuth() {
    document.getElementById("defaultBody").style.display = "none";
    document.getElementById("submissionFrame").style.display = "flex";
}

 
function rubric_preview() {
    document.getElementById("StudentDefault").style.display = "none";
 
    var container = document.querySelector('.rubriccontainer');

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
function openModal1(filePath) {
    var modal = document.getElementById('fileModal');
    var iframe = document.getElementById('fileFrame');
    iframe.src = filePath;
    modal.style.display = "block";
}

function closeModal() {
    var modal = document.getElementById('fileModal');
    modal.style.display = "none";
}

// Close the modal when the user clicks outside of the modal
window.onclick = function(event) {
    var modal = document.getElementById('fileModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Optional: Close the modal when the user presses the "Esc" key
document.addEventListener('keydown', function(event) {
    if (event.key === "Escape") {
        var modal = document.getElementById('fileModal');
        modal.style.display = "none";
    }
});
