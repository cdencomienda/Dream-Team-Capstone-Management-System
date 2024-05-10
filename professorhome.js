document.addEventListener('profile', function () {
  const editProfileBtn = document.querySelector('.editprofileBtn');
  const logoutBtn = document.querySelector('.logoutBtn');

  editProfileBtn.addEventListener('click', function (event) { 
    event.preventDefault(); 
  }); 
});

function openArchive(){
  window.location.assign("ProfessorHome.php")
}
function notifProf(){
  window.location.assign("NotificationPage.php")
}
function openClassPage(){
  window.location.assign("CourseCreate.php")
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
  document.getElementById('menuBtn').style.display = 'block'; // Show the menuBtn element
  
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
const melonbtn = document.querySelector('.melonbtn');
const editprofileBtn = document.querySelector('.editprofileBtn');

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

function addMembers() { 
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

// function viewMembers() { 
//   var container = document.querySelector('.viewgroup'); 
//   container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
  
// //   var hideGroup = document.getElementById("viewGRP")
// //   if (container) {
// //       hideGroup.style.display = "none";
// //   } 
// }

function viewMembers() { 
  var container = document.querySelector('.viewgroup'); 
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none'; 
  
  // // Check if close button already exists
  // if (!container.querySelector('.closeButton')) {
  //   // Adding the close button
  //   var closeButton = document.createElement('button');
  //   closeButton.innerHTML = '<i class="fa-regular fa-circle-xmark"></i>';
  //   closeButton.setAttribute('type', 'button');
  //   closeButton.setAttribute('class', 'closeButton');
  //   closeButton.onclick = function() {
  //     container.style.display = 'none';
  //   };
  //   container.appendChild(closeButton);
  // }
}

function createGROUP(){ 
}
 
function clsViewGrp(){
  var container = document.querySelector('.addmember');
  container.style.display = 'none';
}
 
 

// IAN DITO ITO FUNCTIONS EDIT MO NLNG
// for the creating group users (student, panel, advisor)
 
 