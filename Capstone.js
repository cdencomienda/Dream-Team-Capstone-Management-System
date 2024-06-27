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
  
  document.getElementById('scheduleContainer').addEventListener('click', function() {
    var defenseMainElements = document.getElementsByClassName('defense-main');
    var subelement = document.getElementsByClassName('MainScheduleCont');
    for (var i = 0; i < defenseMainElements.length, subelement.length; i++) {
        defenseMainElements[i].style.display = 'block';
        subelement[i].style.display = 'none';
    }
});