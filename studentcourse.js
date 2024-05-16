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

function notifAuth(){
    window.location.assign("NotificationPage.php")
}
function studentClass(){
window.location.assign("StudentCourse.php")
}
function archive(){
window.location.assign("HomePage.php")
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
    // Inner function to toggle display of elements with the StudentDefault class
    function toggleStudentDefaultDisplay() {
        const studentDefaults = document.querySelectorAll('.StudentDefault');
        studentDefaults.forEach(element => {
            if (element.style.display === 'none') {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        });
    }

    // Call the inner function to toggle display
    toggleStudentDefaultDisplay();
}

// Example call to the newGroupCreated function
newGroupCreated();


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



