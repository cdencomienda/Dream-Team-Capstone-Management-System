 
document.addEventListener('click', e =>{
    const isflsDropdowButton = e.target.matches("[data-Members-button]")
    if(!ismDropdownButton && e.target.closest('[data-mDropdown]') != null)
    return
    
    let currentmDropdown
    if(ismDropdownButton){
        currentmDropdown = e.target.closest('[data-mDropdown]')
        currentmDropdown.classList.toggle('active')
    }
    
    document.querySelectorAll("[data-mDropdown].active").forEach(flsDropdown => {
        if (mDropdown === currentmDropdown) return
        mDropdown.classList.remove("active")
    });
    }) 
 
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
 
const tap = document.querySelector('.profile', 'melonbtn', 'editprofileBtn');
tap.addEventListener('click', function () {
  const toggleMenu = document.querySelector('.menu', '.settingMelon', );
  toggleMenu.classList.toggle('active', 'melonActivate');
}); 

function toggleCourseCreation() { 
  var container = document.querySelector('.containerCreatecourse');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
}

  
function createcourse() { 
  console.log("createcourse() function called."); // Add this line for debugging
  const courseName = document.querySelector('.inputTerm[name="courseName"]').value;
  document.getElementById('courseNameDisplay').textContent = courseName;

  // Clear input field
  document.querySelector('.inputTerm[name="courseName"]').value = ''; 
}

function dropdownMelon() {
  var container = document.querySelector('.dropdown-content');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
}


function creategroup() { 
  var container = document.querySelector('.creategroupContainer');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
}
 
// PANG CREATE NG GROUP UNDER COURSE CREATE

function createGROUP() {
  // Get input values
  var groupName = document.querySelector('.inputgroupName').value;
  var studentName = document.querySelector('.inputName[name="studentName"]').value;
  var panelName = document.querySelector('.inputName[name="panelName"]').value;
  var advisorName = document.querySelector('.inputName[name="advisorName"]').value;

  // Create a new div element for the group
  var newGroupDiv = document.createElement('div');
  newGroupDiv.className = 'groupDiv';

  // Create a new button element inside the group div
  var newButton = document.createElement('button');
  newButton.type = 'button';
  newButton.className = 'groupButton';
  newButton.textContent = groupName + ' Group'; // You can customize the button text here

  // Append the button to the group div
  newGroupDiv.appendChild(newButton);

  // Append the group div to the coursesDropdown section
  var coursesDropdown = document.getElementById('coursesDropdown');
  coursesDropdown.appendChild(newGroupDiv);
}

function newGroupCreated() {
  var container = document.querySelector('.GroupContainer');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
    
}
 
// for class dropdown 
const dropdownsClass = document.querySelectorAll('.classListDropdown');

dropdownsClass.forEach(dropdown => {
    const listClass = dropdown.querySelector('.listClass');
    const coursesListed = dropdown.querySelector('.coursesListed');
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


document.addEventListener('DOMContentLoaded', function() {
  var dropdownBtns = document.querySelectorAll('.dropdownbtn');

  dropdownBtns.forEach(function(btn) {
      btn.addEventListener('click', function() {
          var allDropdowns = document.querySelectorAll('.dropdown-content');
          allDropdowns.forEach(function(dropdown) {
              dropdown.style.display = 'none';
          }); 
      });
  });
});

function AddMembers() { 
  var container = document.querySelector('.addmember');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
}

function setrequirements() { 
  var container = document.querySelector('.setrequirements');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
}

function rubric() { 
  var container = document.querySelector('.rubriccontainer');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
}

function viewMembers() { 
  var container = document.querySelector('.viewgroup'); 
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none'; 
 
}
function filesbtn() {
    const dropdown = document.querySelector('[data-flsDropdown]');
    dropdown.classList.toggle('active');
}
// js fucntion of group submission members requ files 
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
  function showDefaultBody() {
    document.getElementById("defaultBody").style.display = "block";
    document.getElementById("submissionFrame").style.display = "none";
  
}

function submissionBtnAuth() {
    document.getElementById("defaultBody").style.display = "none";
    document.getElementById("submissionFrame").style.display = "flex";

}


function clsViewGrp(){
  var container = document.querySelector('.viewgroup');
  container.style.display = 'none';
}
  
    // RUBRIC JS PUTANIGGA MO IAN
    document.addEventListener("DOMContentLoaded", function (){
      const customSelects = document.querySelectorAll(".custom-select");
      
      function updateSelectedOptions(customSelect) {
    const selectedOptions = Array.from(customSelect.querySelectorAll(".option.active")).filter(option => option !== customSelect.querySelector(".option.all-tags")).map(function(option) {
        return {
            value: option.getAttribute("data-value"),
            text: option.textContent.trim()
        };
    });

    const selectedValues = selectedOptions.map(function(option) {
        return option.value;
    });

    customSelect.querySelector(".tags_input").value = selectedValues.join(', ');

    let tagsHTML = "";

    if(selectedOptions.length === 0) {
        tagsHTML = '<span class="placeholder">Select the tags</span>';
    } else {
        selectedOptions.forEach(function(option) {
            tagsHTML += `<span class="tag">${option.text}<span class="remove-tag" data-value="${option.value}">&times;</span></span>`;
        });
    }
    customSelect.querySelector(".selected-options").innerHTML = tagsHTML;
}

  
      customSelects.forEach(function(customSelect) {
          const searchInput = customSelect.querySelector(".search-tag");
          const optionsContainer = customSelect.querySelector(".options");
          const noResultMessage = customSelect.querySelector(".no-result-message");
          const options = customSelect.querySelectorAll(".option");
          const allTagsoption = customSelect.querySelector(".option.all-tags");
          const clearButton = customSelect.querySelector(".clear");
  
          allTagsoption.addEventListener("click", function() {
              const isActive = allTagsoption.classList.contains("active");
  
              options.forEach(function(option) {
                  if(option !== allTagsoption) {
                      option.classList.toggle("active", !isActive);
                  }
              });
              updateSelectedOptions(customSelect);
          });
  
          clearButton.addEventListener("click", function() {
              searchInput.value = "";
              options.forEach(function(option) {
                  option.style.display = "block";
              });
              noResultMessage.style.display = "none";
          });
          
          searchInput.addEventListener("input", function() {
              const searchTerm = searchInput.value.toLowerCase();
  
              options.forEach(function(option) {
                  const optionText = option.textContent.trim().toLowerCase();
                  const shouldShow = optionText.includes(searchTerm);
                  option.style.display = shouldShow ? "block" : "none";
              });
  
              const anyOptionsMatch = Array.from(options).some(option => option.style.display === "block");
              noResultMessage.style.display = anyOptionsMatch ? "none" : "block";
  
              if(searchTerm) {
                  optionsContainer.classList.add("option-search-active");
              } else {
                  optionsContainer.classList.remove("option-search-active");
              } 
          });
  
      });
  
      customSelects.forEach(function(customSelect) {
          const options = customSelect.querySelectorAll(".option");
          options.forEach(function(option) {
              option.addEventListener("click", function(event) {
                  option.classList.toggle("active");
                  updateSelectedOptions(customSelect);
              });
          });
      });
  
      document.addEventListener("click", function(event) {
          const removeTag = event.target.closest(".remove-tag");
          if(removeTag) {
              const customSelect = removeTag.closest(".custom-select");
              const valueToRemove = removeTag.getAttribute("data-value");
              const optionToRemove = customSelect.querySelector(".option[data-value='"+valueToRemove+"']");
              optionToRemove.classList.remove("active");
  
              const otherSelectedOptions = customSelect.querySelectorAll(".option.active:not(.all-tags)");
              const allTagsoption = customSelect.querySelector(".option.all-tags");
  
              if(otherSelectedOptions.length === 0) {
                  allTagsoption.classList.remove("active");
              }
              updateSelectedOptions(customSelect);
          }
      });
  
      const selectBoxes = document.querySelectorAll(".select-box");
      selectBoxes.forEach(function(selectBox) {
          selectBox.addEventListener("click", function(event) {
              if(!event.target.closest(".tag")) {
                  selectBox.parentNode.classList.toggle("open");
              }
          });
      });
  
      function resetCustomSelects() {
          customSelects.forEach(function(customSelect) {
              customSelect.querySelectorAll(".option.active").forEach(function(option) {
                  option.classList.remove("active");
              });
              customSelect.querySelector(".option.all-tags").classList.remove("active");
              updateSelectedOptions(customSelect);
          });
      }
      updateSelectedOptions(customSelects[0]);
      const submitButton = document.querySelector(".btn_submit");
      submitButton.addEventListener("click", function() {
          let valid = true;
  
          customSelects.forEach(function(customSelect) {
              const selectedOptions = customSelect.querySelectorAll(".option.active");
  
              if(selectedOptions.length === 0) {
                  const tagErrorMsg = customSelect.querySelector(".tag_error_msg");
                  tagErrorMsg.textContent = "This field is required";
                  tagErrorMsg.style.display = "block";
                  valid = false;
              } else {
                  const tagErrorMsg = customSelect.querySelector(".tag_error_msg");
                  tagErrorMsg.textContent = "";
                  tagErrorMsg.style.display = "none";
              }
          });
  
          if(valid) {
              let tags = document.querySelector(".tags_input").value;
              alert(tags);
              resetCustomSelects();
              return;
          }
      });
  });
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

