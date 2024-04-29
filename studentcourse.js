// function TogglegroupMembers() { 
//     var container = document.querySelector('.containerCreatecourse');
//     container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
//   }


// Function to fetch and display the student's courses
function fetchStudentCourses() {
    fetch('LiveSearchStudentCourses.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(courses => {
            var coursesList = document.getElementById('coursesList');

            // Clear any previous courses list
            coursesList.innerHTML = '';

            // Display each course in the list
            courses.forEach(course => {
                // Create a container for each course
                var courseContainer = document.createElement('div');
                courseContainer.classList.add('course-container');

                // Create a button for course actions (e.g., view details)
                var courseButton = document.createElement('button');
                courseButton.type = 'button';
                courseButton.textContent = course.courseName;

                courseButton.classList.add('S_courseInfo');

                // Add an event listener to the button to handle course actions
                courseButton.addEventListener('click', function () {
                    handleCourseAction(course.courseID);
                });

                // Append the button to the course container
                courseContainer.appendChild(courseButton);

                // Append the course container to the list
                coursesList.appendChild(courseContainer);
            });
        })
        .catch(error => {
            console.error('Error fetching student courses:', error);
        });
}

// Call the function to fetch student courses when the page loads
fetchStudentCourses();


// Function to fetch and display group members
function fetchGroupMembers() {
    // Fetch the group ID based on the logged-in user
    fetch('GetUserGroupID.php')
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error('Error obtaining group ID:', data.error);
                return;
            }

            // Get the group ID from the response
            const groupID = data.groupID;

            // Use the group ID to fetch and display group members
            fetch(`LiveSearchGroupMembers.php?groupID=${groupID}`)
                .then(response => response.json())
                .then(response => {
                    const groupMembersContainer = document.getElementById('groupMembersContainer');
                    groupMembersContainer.innerHTML = ''; // Clear previous content

                    if (response.error) {
                        // Display error message if server returns an error
                        groupMembersContainer.textContent = response.error;
                    } else {
                        // Display group members
                        response.forEach(member => {
                            const memberElement = document.createElement('div');
                            memberElement.textContent = member.username; // Display member's username
                            groupMembersContainer.appendChild(memberElement);
                        });
                    }
                })
                .catch(error => {
                    console.error('Error fetching group members:', error);
                    const groupMembersContainer = document.getElementById('groupMembersContainer');
                    groupMembersContainer.textContent = 'Error fetching group members. Please try again later.';
                });
        })
        .catch(error => {
            console.error('Error obtaining group ID:', error);
        });
}



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




