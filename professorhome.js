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
const melonbtn = document.querySelector('.melonbtn');
const editprofileBtn = document.querySelector('.editprofileBtn');

profile.addEventListener('click', function () {
  const toggleMenu = document.querySelector('.menu');
  toggleMenu.classList.toggle('active');
});


//melonbtn removed

const tap = document.querySelector('.profile', 'melonbtn', 'editprofileBtn');
tap.addEventListener('click', function () {
  const toggleMenu = document.querySelector('.menu', '.settingMelon', );
  toggleMenu.classList.toggle('active', 'melonActivate');
}); 

function toggleCourseCreation() { 
  var container = document.querySelector('.containerCreatecourse');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
}

 
// ito un part na nakaka create dpt ng course kaso may problem
// function createcourse() { 
//   const courseName = document.querySelector('.inputTerm[name="courseName"]').value;
//   const courseContainer = document.querySelector('.courseCreation');
//   const courseInfo = document.createElement('div');
//   courseInfo.classList.add('courseInfo');  

//   // AJAX request to fetch courses created by the current user
//   const xhr = new XMLHttpRequest();
//   xhr.open('POST', 'CourseCreateContainer.php', true);
//   xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//   xhr.onreadystatechange = function () {
//       if (xhr.readyState === XMLHttpRequest.DONE) {
//           if (xhr.status === 200) {
//               const courses = JSON.parse(xhr.responseText);
//               courses.forEach(course => {
//                   const { courseID, courseName } = course;
//                   const courseBtn = document.createElement('button');
//                   courseBtn.type = 'button';
//                   courseBtn.classList.add('courseNAMEbtn');
//                   courseBtn.textContent = courseName;
//                   courseBtn.onclick = function () {
//                       // Function to handle button click
//                       courseinfobtn(courseID); // Assuming courseID is passed to courseinfobtn
//                   };
//                   courseInfo.appendChild(courseBtn);
//               });
//               // Append courseInfo to courseContainer
//               courseContainer.appendChild(courseInfo);
              
//               // Create the dropdown section
//               const dropdownSection = document.createElement('div');
//               dropdownSection.classList.add('dropdown');
//               dropdownSection.innerHTML = `
//                   <div class="dropdown" >
//                   <button type="button" class="classSet" onclick="dropdown()">...</button>
//                   <div class="dropdown-content" >
//                       <button type="button" class="dropdownbtn" onclick="creategroup()">Create Group</button>
//                       <button type="button" class="dropdownbtn" onclick="viewMembers()">View Members</button>
//                       <button type="button" class="dropdownbtn" onclick="addMembers()">Add Members</button>
//                       <button type="button" class="dropdownbtn" onclick="setrequirements()">Requirements</button>
//                       <button type="button" class="dropdownbtn" onclick="rubric()">Rubric</button>
//                   </div>
//               </div>
//               `;
              
//               // Append dropdownSection to professorClass div
//               document.querySelector('.courseCreation').appendChild(dropdownSection);
//           } else {
//               console.error('Failed to fetch courses. Error: ' + xhr.status);
//           }
//       }
//   };
//   xhr.onerror = function() {
//       console.error('Error occurred during the request.');
//   };
//   xhr.send();

//   // Clear input field and hide course creation container
//   document.querySelector('.inputTerm[name="courseName"]').value = ''; 
//   document.querySelector('.containerCreatecourse').style.display = 'none';
// }

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

function viewMembers() { 
  var container = document.querySelector('.viewgroup'); 
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
//   var hideGroup = document.getElementById("viewGRP")
//   if (container) {
//       hideGroup.style.display = "none";
//   } 
}

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

function createGROUP(){
  
}

