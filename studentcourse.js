// function TogglegroupMembers() { 
//     var container = document.querySelector('.containerCreatecourse');
//     container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
//   }


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



// Add an event listener to the "Members" button
document.querySelector('.Members-Btn').addEventListener('click', fetchGroupMembers);


function studentnotifAuth(){
    window.location.assign("NotificationPage.php")
}
function studentClass(){
window.location.assign("StudentCourse.php")
}
function archive(){
window.location.assign("HomePage.php")
} 
function StudentSchedule(){ 
    window.location.assign("studentSchedule.php")
  } 
  
function showDefaultBody() {
    document.getElementById("defaultBody").style.display = "block";
    document.getElementById("submissionFrame").style.display = "none";
  
}

function submissionBtnAuth() {
    document.getElementById("defaultBody").style.display = "none";
    document.getElementById("submissionFrame").style.display = "flex";

}

function newGroupCreated() {
    var container = document.querySelector('.student');
    container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
  }

// view files  
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



// document.addEventListener('click', e =>{
// const isflsDropdowButton = e.target.matches("[data-flsDropdown-button]")
// if(!isflsDropdowButton && e.target.closest('[data-flsDropdown]') != null)
// return

// let currentflsDropdown
// if(isflsDropdowButton){
//     currentflsDropdown = e.target.closest('[data-flsDropdown]')
//     currentflsDropdown.classList.toggle('active')
// }

// document.querySelectorAll("[data-flsDropdown].active").forEach(flsDropdown => {
//     if (flsDropdown === currentflsDropdown) return
//     flsDropdown.classList.remove("active")
// });
// }) 

   

document.getElementById('input-file').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const attachedFileContainer = document.querySelector('.Attached-FileCont');
        
        // Create a new div element to display the file name
        const fileDiv = document.createElement('div');
        fileDiv.className = 'attached-file';
        fileDiv.textContent = file.name;
        
        // Append the new div to the attached files container
        attachedFileContainer.appendChild(fileDiv);
    }
});
