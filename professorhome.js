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

function openArchive(){
  window.location.assign("ProfessorHome.html")
}
function notifProf(){
  window.location.assign("NotificationPage.html")
}
function openClassPage(){
  window.location.assign("CourseCreate.html")
} 
function logOUT(){
  window.location.assign("LoginSignup.html")
}

const tap = document.querySelector('.profile');
tap.addEventListener('click', function () {
  const toggleMenu = document.querySelector('.menu');
  toggleMenu.classList.toggle('active');
}); 

function toggleCourseCreation() {
  var container = document.querySelector('.containerCreatecourse');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
}

function createcourse() { 
  const courseName = document.querySelector('.inputTerm[name="courseName"]').value;
  const courseDescription = document.querySelector('.inputTerm[name="courseDescription"]').value;
 
  const courseContainer = document.querySelector('.courseCreation');
  const courseInfo = document.createElement('div');
  courseInfo.classList.add('courseInfo');  
  courseInfo.innerHTML = `<h2coursename> ${courseName}</h2coursename>  `;
  courseContainer.appendChild(courseInfo);  
   
  courseContainer.appendChild(courseInfo);
 
  document.querySelector('.inputTerm[name="courseName"]').value = ''; 
  document.querySelector('.containerCreatecourse').style.display = 'none';
}

