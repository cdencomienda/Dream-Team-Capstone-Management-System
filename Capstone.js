var x = document.getElementById("notification");
var y = document.getElementById("teams");
var z = document.getElementById("schedule");
var w = document.getElementById("capstone");

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
  document.getElementById("summaryGrade").style.display = "block";
  document.getElementById("rubric-summary").style.display = "block";
}



function getRandomScore() {
  return Math.floor(Math.random() * 8);
}

// Set a random score for each score span
document.addEventListener('DOMContentLoaded', () => {
  const scores = document.querySelectorAll('.score');
  scores.forEach(score => {
      score.textContent = getRandomScore();
  });
});

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
      var chairPanelGrades = extractPanelGrades(".chairPgrade .criteria");
      var leadPanelGrades = extractPanelGrades(".leadPanelContent .criteria");
      var panelMemberGrades = extractPanelGrades(".panelMemberContent .criteria");

      var panelists = {
          "Chair Panel": calculateAverage(chairPanelGrades),
          "Lead Panel": calculateAverage(leadPanelGrades),
          "Panel Member 1": calculateAverage(panelMemberGrades)
      };

      var totalGrade = 0;
      var totalCriteria = 0;

      // Calculate overall total grade and criteria count
      Object.keys(panelists).forEach(function(panelist) {
          totalGrade += panelists[panelist].totalGrade;
          totalCriteria += panelists[panelist].count;
      });

      // Populate grade table and calculate averages
      var gradeTableBody = document.querySelector("#gradeTable tbody");
      gradeTableBody.innerHTML = "";

      Object.keys(panelists).forEach(function(panelist) {
          var panelistTotalGrade = panelists[panelist].totalGrade;
          var panelistCount = panelists[panelist].count;
          var panelistAverage = panelistTotalGrade / panelistCount;

          var newRow = document.createElement("tr");
          newRow.innerHTML = `<td>${panelist}</td><td>${panelistAverage.toFixed(2)}</td>`;
          gradeTableBody.appendChild(newRow);
      });

      // Calculate overall average
      var overallAverage = totalGrade / totalCriteria;
      var totalPercentage = (overallAverage / 7) * 100; // Assuming max score is 7 per criterion
      document.getElementById("totalPercentage").textContent = totalPercentage.toFixed(2);

      // Open the modal after computing grades
      openModal();
  }

  // Function to extract grades from HTML structure
  function extractPanelGrades(selector) {
      var rows = document.querySelectorAll(selector);
      var grades = [];

      rows.forEach(function(row) {
          var gradeElement = row.querySelector(".score-column .score");
          var grade = gradeElement ? parseInt(gradeElement.textContent) : 0;
          grades.push(grade);
      });

      return grades;
  }

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

