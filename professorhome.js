


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
  window.location.assign("NotificationProf.html")
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
  const courseCreation = document.querySelector('.containerCreatecourse');
  courseCreation.style.display = 'block';
}

function createcourse() {
  // Get input values
  const courseName = document.querySelector('.inputTerm[name="courseName"]').value;
  const courseDescription = document.querySelector('.inputTerm[name="courseDescription"]').value;

  // Create elements to display the course name and description
  const courseContainer = document.querySelector('.courseCreation');
  const courseInfo = document.createElement('div');
  courseInfo.innerHTML = `<h2> ${courseName}</h2> <h3> ${courseDescription}</h3> `;

  // Append the course information to the course container
  courseContainer.appendChild(courseInfo);

  // Clear input fields
  document.querySelector('.inputTerm[name="courseName"]').value = '';
  document.querySelector('.inputTerm[name="courseDescription"]').value = '';

  // Hide the container (optional)
  document.querySelector('.containerCreatecourse').style.display = 'none';
}

