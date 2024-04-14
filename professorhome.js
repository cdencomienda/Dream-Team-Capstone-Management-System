// document.addEventListener('profile', function () {
//   const editProfileBtn = document.querySelector('.editprofileBtn');
//   const logoutBtn = document.querySelector('.logoutBtn');

//   editProfileBtn.addEventListener('click', function (event) { 
//     event.preventDefault(); 
//   }); 
// });

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
}

window.onclick = function(event) {
  var overlay = document.getElementById("editProfileOverlay");
  if (event.target == overlay) {
      overlay.style.display = "none";
  }
}

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
  const courseName = document.querySelector('.inputTerm[name="courseName"]').value;
  const courseContainer = document.querySelector('.courseCreation');
  const courseInfo = document.createElement('div');
  courseInfo.classList.add('courseInfo');  

  // AJAX request to fetch courses created by the current user
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'CourseCreateContainer.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
              const courses = JSON.parse(xhr.responseText);
              courses.forEach(course => {
                  const { courseID, courseName } = course;
                  const courseBtn = document.createElement('button');
                  courseBtn.type = 'button';
                  courseBtn.classList.add('courseNAMEbtn');
                  courseBtn.textContent = courseName;
                  courseBtn.onclick = function () {
                      // Function to handle button click
                      courseinfobtn(courseID); // Assuming courseID is passed to courseinfobtn
                  };
                  courseInfo.appendChild(courseBtn);
              });
              courseContainer.appendChild(courseInfo); // Append courseInfo to courseContainer
          } else {
              console.error('Failed to fetch courses');
          }
      }
  };
  xhr.send();

  courseInfo.innerHTML += `
      <div class="dropdown">
          <button type="button" class="classSet" onclick="dropdown()">...</button>
          <div class="dropdown-content" style="display: none;">
              <button type="button" class="dropdownbtn" onclick="creategroup()">Create Group</button>
              <button type="button" class="dropdownbtn" onclick="viewMembers()">View Members</button>
              <button type="button" class="dropdownbtn" onclick="addMembers()">Add Members</button>
              <button type="button" class="dropdownbtn" onclick="setrequirements()">Requirements</button>
              <button type="button" class="dropdownbtn" onclick="rubric()">Rubric</button>
          </div>
      </div>`;

  document.querySelector('.inputTerm[name="courseName"]').value = ''; 
  document.querySelector('.containerCreatecourse').style.display = 'none';
}



function dropdown() {
  const dropdownContent = document.querySelector('.dropdown-content');
  dropdownContent.style.display = (dropdownContent.style.display === 'block') ? 'none' : 'block';
}

function creategroup() { 
  var container = document.querySelector('.creategroupContainer');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
}

function viewMembers() { 
  var container = document.querySelector('.viewgroup');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
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
