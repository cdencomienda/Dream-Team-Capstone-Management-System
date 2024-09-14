 
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
  function DefenseR(){
      window.location.assign("DefenseResults.php")
  }
  function advisoryProf(){
      window.location.assign("adminAdvisory.php")
  }
  function Capstone(){
      window.location.assign("adminCapstone.php")
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
// classlist dropdown 



// melon btn HIHI 
function hideAllContainers() {
    var containers = document.querySelectorAll('.addmember, .setrequirements, .rubriccontainer, .viewgroup');
    containers.forEach(function(container) {
      container.style.display = 'none';
    });
  }
  
  function AddMembers() { 
    var container = document.querySelector('.addmember');
    if (container.style.display === 'block') {
      container.style.display = 'none';
    } else {
      hideAllContainers();
      container.style.display = 'block';
    }
  }
  
  function setrequirements() { 
    var container = document.querySelector('.setrequirements');
    if (container.style.display === 'block') {
      container.style.display = 'none';
    } else {
      hideAllContainers();
      container.style.display = 'block';
    }
  }
  
  function rubric() { 
    var container = document.querySelector('.rubriccontainer');
    if (container.style.display === 'block') {
      container.style.display = 'none';
    } else {
      hideAllContainers();
      container.style.display = 'block';
    }
  }
  
  function viewMembers() { 
    var container = document.querySelector('.viewgroup');
    if (container.style.display === 'block') {
      container.style.display = 'none';
    } else {
      hideAllContainers();
      container.style.display = 'block';
    }
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


function createCommonElements(panelType, panelNumber) {
  // Create the panel div
  var panelDiv = document.createElement('div');
  panelDiv.classList.add(panelType);

  // Create the heading element
  var heading = document.createElement('h3');
  heading.textContent = '#' + panelNumber;

  // Create a line break element
  var lineBreak = document.createElement('br');

  // Append the heading and line break to the panel div
  panelDiv.appendChild(heading);
  panelDiv.appendChild(lineBreak);

  // Create the content div (for textarea and buttons)
  var contentDiv = document.createElement('div');
  contentDiv.classList.add(panelType + '-sent');

  // Create the textarea element
  var textArea = document.createElement('textarea');
  textArea.classList.add('comments-input');

  // Create the delete button
  var deleteButton = document.createElement('button');
  deleteButton.classList.add('delete-button');
  deleteButton.innerHTML = '<i class="fa-solid fa-trash-can"></i>';
  deleteButton.onclick = function() {
    if (confirm("Are you sure you want to delete this " + panelType + "?")) {
      panelDiv.remove();
      contentDiv.remove();
      // Update panel numbers
      updatePanelNumbers();
    }
  };

  // Append the textarea and delete button to the content div
  contentDiv.appendChild(textArea);
  contentDiv.appendChild(deleteButton);

  return {
    panelDiv: panelDiv,
    contentDiv: contentDiv
  };
}

function updatePanelNumbers() {
  var comments = document.querySelectorAll('.panel-comments');
  for (var i = 0; i < comments.length; i++) {
    comments[i].querySelector('h3').textContent = 'Comment #' + ((i / 2) + 1);
  }
  var revisions = document.querySelectorAll('.panel-revision');
  for (var i = 0; i < revisions.length; i++) {
    revisions[i].querySelector('h3').textContent = 'Revision #' + ((i / 2) + 1);
  }
  var requirements = document.querySelectorAll('.panel-requirement');
  for (var i = 0; i < requirements.length; i++) {
    requirements[i].querySelector('h3').textContent = 'Additional Requirement #' + ((i / 2) + 1);
  }
}


function addComment() {
  var commentsSection = document.getElementById('commentsSection');
  var panelNumber = (commentsSection.children.length / 2) + 1;
  var elements = createCommonElements('panel-comments', panelNumber);

  elements.panelDiv.querySelector('h3').textContent += ' Comments:';
  commentsSection.appendChild(elements.panelDiv);
  commentsSection.appendChild(elements.contentDiv);

  setTimeout(function() {
    commentsSection.scrollTo({ top: elements.panelDiv.offsetTop, behavior: 'smooth' });
  }, 10);
}

function addRevision() {
  var commentsSection = document.getElementById('commentsSection');
  var panelNumber = (commentsSection.children.length / 2) + 1;
  var elements = createCommonElements('panel-revision', panelNumber);

  elements.panelDiv.querySelector('h3').textContent += ' Revision:';
  commentsSection.appendChild(elements.panelDiv);
  commentsSection.appendChild(elements.contentDiv);

  setTimeout(function() {
    commentsSection.scrollTo({ top: elements.panelDiv.offsetTop, behavior: 'smooth' });
  }, 10);
}

function addRequirement() {
  var commentsSection = document.getElementById('commentsSection');
  var panelNumber = (commentsSection.children.length / 2) + 1;
  var elements = createCommonElements('panel-requirement', panelNumber);

  elements.panelDiv.querySelector('h3').textContent += ' Additional Requirement:';
  commentsSection.appendChild(elements.panelDiv);
  commentsSection.appendChild(elements.contentDiv);

  setTimeout(function() {
    commentsSection.scrollTo({ top: elements.panelDiv.offsetTop, behavior: 'smooth' });
  }, 10);
}


  // ClassListener
  
//   document.getElementById('scheduleContainer').addEventListener('click', function() {
//     var defenseMainElements = document.getElementsByClassName('defense-main');
//     var subelement = document.getElementsByClassName('MainScheduleCont');
//     for (var i = 0; i < defenseMainElements.length, subelement.length; i++) {
//         defenseMainElements[i].style.display = 'block';
//         subelement[i].style.display = 'none';
//     }
// });

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
function dropdownMelon() {
  var container = document.querySelector('.dropdown-content');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
}


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
  var container = document.querySelector('.defense-main');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
}

function rubric_preview() { 
  var container = document.querySelector('.rubriccontainer');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
}
// Helper function to hide all sections
function hideAllSections() {
  document.getElementById("rubric-summary").style.display = "none";
  document.getElementById("defaultBody").style.display = "none";
  document.getElementById("defense-main").style.display = "none";
  
  var defenseMainElements = document.getElementsByClassName('defense-main');
  for (var i = 0; i < defenseMainElements.length; i++) {
      defenseMainElements[i].style.display = 'none';
  }
}

// Function to show the default body
function showDefaultBody() {
  hideAllSections();
  document.getElementById("defaultBody").style.display = "block";
}

// Function to show the group defense rubrics
function groupDefenseRubrics() {
  hideAllSections();
  var defenseMainElements = document.getElementsByClassName('defense-main');
  for (var i = 0; i < defenseMainElements.length; i++) {
      defenseMainElements[i].style.display = 'block';
  }
}

// Function to show the grade summary
function gradeSummary() {
  hideAllSections();
  document.getElementById("rubric-summary").style.display = "block";
}



function getRandomScore() {
  return Math.floor(Math.random() * 8);
}

// Set a random score for each score span
// document.addEventListener('DOMContentLoaded', () => {
//   const scores = document.querySelectorAll('.score');
//   scores.forEach(score => {
//       score.textContent = getRandomScore();
//   });
// });

function viewMembers() { 
  var container = document.querySelector('.viewgroup'); 
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none'; 
 
}

function newGroupCreated() {
  var container = document.querySelector('.GroupContainer');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
    
}
function newGroupCreated2() {
  var container = document.querySelector('.GroupContainer');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
  var chairpanelCollection = document.querySelector('.commentsCollection')
  chairpanelCollection.style.display = (chairpanelCollection.style.display === 'none' || chairpanelCollection.style.display === '') ? 'block' : 'none';
  
}

// viewfiles  
function openModal(filePath) {
  document.getElementById('fileFrame').src = filePath;
  document.getElementById('fileModal').style.display = 'block';
}

function closeModal() {
  document.getElementById('fileModal').style.display = 'none';
  document.getElementById('fileFrame').src = ''; // Clear the iframe src
}
function filesbtn() {
  const dropdown = document.querySelector('[data-flsDropdown]');
  dropdown.classList.toggle('active');
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
        <h4>Document Requirement Logs</h4>
          <div class="logItem" id="logItem1" onclick="openModal('requirement%20_repository/docu-logs/docu-test1.pdf')">
              <img src="https://via.placeholder.com/24" alt="file icon">
              <div class="fileName">docu-test1.pdf</div>
          </div>
      `;
  }
}

//score description changing per score
const scoreDescriptions = {
  "B1": {
      7: "Excellent summary with no errors.",
      6: "Very good summary with minor errors.",
      5: "Good summary with some errors.",
      4: "Adequate summary with several errors.",
      3: "Fair summary with many errors.",
      2: "Poor summary with numerous errors.",
      1: "Very poor summary with major errors.",
      0: "No summary provided or completely incorrect."
  },
  "B2": {
      7: "Excellent presentation skills with perfect delivery.",
      6: "Very good presentation skills with minor issues.",
      5: "Good presentation skills with some issues.",
      4: "Adequate presentation skills with several issues.",
      3: "Fair presentation skills with many issues.",
      2: "Poor presentation skills with numerous issues.",
      1: "Very poor presentation skills with major issues.",
      0: "No presentation skills demonstrated or completely incorrect."
  },
  "B3": {
      7: "Outstanding oral communication with no errors.",
      6: "Very good oral communication with minor errors.",
      5: "Good oral communication with some errors.",
      4: "Adequate oral communication with several errors.",
      3: "Fair oral communication with many errors.",
      2: "Poor oral communication with numerous errors.",
      1: "Very poor oral communication with major errors.",
      0: "No oral communication provided or completely incorrect."
  }
};


// GRADE COMPUTING
document.addEventListener('DOMContentLoaded', (event) => {
  const scoreSelects = document.querySelectorAll('.score-select');

  scoreSelects.forEach(select => {
      select.addEventListener('change', function() {
          const selectedScore = this.value;
          const criteriaId = this.closest('tr').querySelector('.description strong').textContent.split('.')[0];
          const descriptionElement = this.closest('tr').querySelector('.grade_description');
          descriptionElement.textContent = scoreDescriptions[criteriaId][selectedScore] || 'Description not available for this score.';
      });
  });
});

function toggleRubricSummary(panelClass, arrowClass) {
  const panel = document.querySelector(`.${panelClass}`);
  const arrow = document.querySelector(`.${arrowClass}`);
  if (panel.classList.contains('expand')) {
    panel.classList.remove('expand');
    arrow.classList.remove('down');
    arrow.classList.add('right');
  } else {
    panel.classList.add('expand');
    arrow.classList.remove('right');
    arrow.classList.add('down');
  }
}
document.addEventListener('DOMContentLoaded', (event) => {
  // Get modal element
  var modal = document.getElementById("gradeModal");

  // Get open modal button
  var gradeSummaryButton = document.querySelector(".compute-button");

  // Get close button
  var closeButton = modal.querySelector(".close");

  // Get submit button
  var submitButton = document.getElementById("submitGrade");

  // Listen for open click
  gradeSummaryButton.addEventListener("click", computeGrades);

  // Listen for close click
  closeButton.addEventListener("click", closeModal);

  // Listen for outside click
  window.addEventListener("click", outsideClick);

  // Function to open modal
  function openModal() {
      modal.style.display = "block";
  }

  // Function to close modal
  function closeModal() {
      modal.style.display = "none";
  }

  // Function to close modal if outside click
  function outsideClick(e) {
      if (e.target == modal) {
          closeModal();
      }
  }

  // Function to calculate grades and display in modal
  function computeGrades() {
      openModal();
  }

  // Function to extract grades from HTML structure
  // function extractPanelGrades(selector) {
  //     var rows = document.querySelectorAll(selector);
  //     var grades = [];

  //     rows.forEach(function(row) {
  //         var gradeElement = row.querySelector(".score-column .score");
  //         var grade = gradeElement ? parseInt(gradeElement.textContent) : 0;
  //         grades.push(grade);
  //     });

  //     return grades;
  // }

  // Function to calculate average from an array of grades
  function calculateAverage(grades) {
      var totalGrade = grades.reduce(function(acc, grade) {
          return acc + grade;
      }, 0);

      var count = grades.length;

      return {
          totalGrade: totalGrade,
          count: count
      };
  }

  // Function to handle grade submission
  submitButton.addEventListener("click", function() {
      var verdict = document.getElementById("verdictDropdown").value;
      alert("Grades submitted with verdict: " + verdict);
      closeModal();
  });
});

let currentFeedbackType = '';

function addComment() {
    currentFeedbackType = 'Comment';
    addFeedback(currentFeedbackType);
}

function addRevision() {
    currentFeedbackType = 'Revision';
    addFeedback(currentFeedbackType);
}

function addRequirement() {
    currentFeedbackType = 'Additional Requirement';
    addFeedback(currentFeedbackType);
}

function addFeedback(type) {
    // Show the feedback input field
    const feedbackContainer = document.createElement('div');
    feedbackContainer.classList.add('feedback-input-container');
    
    const textarea = document.createElement('textarea');
    textarea.classList.add('feedback-input');
    textarea.placeholder = type + ": Enter your text here";

    const deleteButton = document.createElement('button');
    deleteButton.classList.add('delete-button');
    deleteButton.innerHTML = '<i class="fa-solid fa-trash"></i>';
    deleteButton.addEventListener('click', () => deleteFeedback(feedbackContainer));

    feedbackContainer.appendChild(textarea);
    feedbackContainer.appendChild(deleteButton);
    document.getElementById('commentsSection').appendChild(feedbackContainer);
}


function sendFeedback() {
    const feedbackContainers = document.querySelectorAll('.feedback-input-container');
    if (feedbackContainers.length > 0) {
        const commentSection = document.querySelector('.commentsCollection .comments-section');
        
        feedbackContainers.forEach(container => {
            const textarea = container.querySelector('textarea');
            const feedbackText = textarea.value;

            if (feedbackText.trim() !== '') {
                const feedbackContainer = document.createElement('div');
                feedbackContainer.classList.add('comment-sent');

                const feedbackTextArea = document.createElement('textarea');
                feedbackTextArea.classList.add('comments-input');
                feedbackTextArea.disabled = true;
                feedbackTextArea.value = feedbackText;

                const approveButton = document.createElement('button');
                approveButton.classList.add('approve-button');
                approveButton.innerHTML = '<i class="fa-solid fa-check"></i>';
                approveButton.addEventListener('click', () => approveComment(feedbackTextArea));

                feedbackContainer.appendChild(feedbackTextArea);
                feedbackContainer.appendChild(approveButton);

                commentSection.appendChild(feedbackContainer);

                // Remove the feedback input field
                container.remove();
            }
        });
    } else {
        alert('Please enter your feedback before sending.');
    }
}

function deleteFeedback(container) {
    container.remove();
}

function approveComment(textarea) {
    textarea.disabled = true;
}
