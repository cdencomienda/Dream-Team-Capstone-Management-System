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


function addComment() {
    // Get the comments section container
    var commentsSection = document.getElementById('commentsSection');
    var sendIcon = document.createElement('i');
     sendIcon.classList.add('fa-solid', 'fa-trash-can');
     
    // Clone the existing comment section (optional, if needed)
    var newComment = document.createElement('div');
    newComment.classList.add('panel-comments');
  
    // Create the new elements
    var newHeading = document.createElement('h3');
    newHeading.textContent = 'Comment # ' + (commentsSection.children.length + 1);
  
    var newTextArea = document.createElement('textarea');
    newTextArea.classList.add('comments-input');
  
    // Create the send button
    var sendButton = document.createElement('button');
    sendButton.innerHTML = sendIcon.outerHTML;
    sendButton.classList.add('send-button');  // Add a class for styling (optional)
  
    // Append the new elements to the new comment div
    
    newComment.appendChild(newHeading);
    newComment.appendChild(newTextArea);
    newComment.appendChild(sendButton);  // Add the button here
  
    // Append the new comment div to the comments section container
    commentsSection.appendChild(newComment);

    setTimeout(function() {
      commentsSection.scrollTo({ top: newComment.offsetTop, behavior: 'smooth' });
    }, 10); // Adjust delay if needed (in milliseconds)
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

function viewMembers() { 
  var container = document.querySelector('.viewgroup'); 
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none'; 
 
}

function newGroupCreated() {
  var container = document.querySelector('.GroupContainer');
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