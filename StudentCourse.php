<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Course</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
     integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src = "studentcourse.js"></script>    
    <link rel="stylesheet" href="StudentCourseStyle.css">
    <?php include 'login.php'; ?>
    <?php include 'editProfile.php'; ?>
    <div class="header">
        <div class="wrap">
            <button type="button" class="logobtn"  onclick="Studentarchive()"></button>
            </div>
        <div class="search">
            <input type="text" class="searchTerm" placeholder="Search for Capstone Projects?">
            <button type="submit" class="searchButton">
            <span>&#128269;</span>
            </button>
        </div>
 
        <div class="container">
            <div class="action">
                <div class="profile">
                    <img src="menu_assets/prof.jpg" alt="profile-img">
                </div>
                <div class="menu" id ="menuBtn">
                    <h3><?php echo $_SESSION['username']; ?><br/>
                        <span><?php echo $_SESSION['user_email']; ?></span>
                    </h3>
                    <button type="button" class="editprofileBtn" id="editProfileBtn">Edit Profile</button>
                    <button type="button" class="logoutBtn" onclick="logOUT()">Logout</button>
                </div>
            </div>
            <!-- editprofile --> 
            <div id="editProfileOverlay" class="editoverlay">
                <div class="dropdown-profile">
        
                    <div>
                        <button class = "close" onclick= "closeEditform()">  <i class="fa-regular fa-circle-xmark"></i> </button>
                    </div>
                    
                    <form id="editProfileForm" action="editProfile.php" method="POST">
                        <div class="profile">
                            <img src="menu_assets/prof.jpg" alt="profile-img">
                        </div>
                        <h5edit><?php echo $_SESSION['username']; ?><br/>
                        <span><?php echo $_SESSION['user_email']; ?></span>
                        </h5edit>
                        <h3> <input type="text" id="profileemailID" class="inputEmail" name="userEmail" placeholder="Input your Email"> </h3>
                        <h3> <input type="text" id="profilenameID" class="inputname" name="newname" placeholder="Input new Name"> </h3>
                        <h3> <input type="text" id="profilepasswordID" class="inputPassword" name="newPassword" placeholder="Input new Password"> </h3>
                        <button type="submit" class="saveEditbtn"> Save Changes </button>
                       
                    </form>
                   
                    <?php if(isset($_SESSION['error_message'])) { ?>
                <div id="error-message" class="show">
                    <?php echo $_SESSION['error_message']; ?>
                    <button onclick="clearErrorMessage()">OK</button>
                </div>
            <?php
                unset($_SESSION['error_message']); // Clear the error message after displaying it
            } ?>
            
        <script>
                window.onload = function() {
                    var urlParams = new URLSearchParams(window.location.search);
        
                    if (urlParams.has('showOverlay')) {
                        document.getElementById('editProfileOverlay').style.display = 'block';
                    }
                    window.onclick = function(event) {
                        if (event.target == overlay) {
                            overlay.style.display = 'none';
                        }
                    }
                }

        </script>
            <script>
            function clearErrorMessage() {
                var errorMessage = document.getElementById("error-message");
                errorMessage.classList.remove("show");
            }
            </script> 
                </div>
            </div>
        </div>
    </div>
</div>
</head>

<body>  
    <div class="hero">
    <div class="Lsection">
        <div id="sectionBtn"></div>
        <button type="button" class="notif"  onclick="studentnotifAuth()">Notification</button>
        <button type="button" class="class"  onclick="studentClass()">Class</button>
        <button type="button" class="schedule"  onclick="StudentSchedule()">Schedule</button>
        <button type="button" class="capstone"  onclick="StudentCapstone()">Capstone Defense</button>
    </div>
    <!-- Ian -->
    <div class="StudentClass">
        <div class="course_created" grid>

            <!-- Container for student's courses -->
            <div class = "studentCourseDropdown" id="studentCoursesDropdown">
                    <h3>My Courses</h3>
                    <div id="coursesList">
                    </div> <!-- This will be populated with the list of courses -->
                    <button type="button" id = "group_name1" class="createdgroupBTN" onclick="newGroupCreated()"></button>

                </div>
            <div class="dropdown">
            </div>
        </div>
        <div class="StudentDefault">
            <div class="dashboard_header">

                    <!-- Group Name Box               -->

                <div class="groupname_container"> 
                    <div class="group_name" id="group_name"></div>   
                </div>
                <script>
     // Function to fetch group information for the logged-in student
                function fetchGroupInfo() {
                    fetch('fetchGroupName.php')
                        .then(response => response.json())
                        .then(groupInfo => {
                    const groupname_container = document.getElementById('group_name');

                    // Check if there is a group
                    if (groupInfo.error) {
                        groupname_container.innerHTML = '<h3>Error: ' + groupInfo.error + '</h3>';
                        } else {
                            // Display the group name in the container
                            groupname_container.innerHTML = '<h3>' + groupInfo.groupname + '</h3>';
                        }
                        })
                        .catch(error => {
                            console.error('Error fetching group information:', error);
                            groupname_container.innerHTML = '<h3>Error loading group information</h3>';
                        });
                        }
                       document.addEventListener('DOMContentLoaded', function() {  
                    // Fetch group information when the page loads
                    fetchGroupInfo();
                    });    

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

function newGroupCreated() {
    var container = document.querySelector('.GroupContainer');
    container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
      
  }

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
                </script>  

                <h4>
                    <div class="button-group"> 
                    <button type="button" class=" Submission-Btn" onclick="submissionBtnAuth()"> <i class="fa-solid fa-clipboard"></i> Submissions </button>

                            <div class = "flsDropdown" data-flsDropdown>
                            <button type="button" class=" Rep-FilesBtn" data-flsDropdown-button> <i class="fa-solid fa-file"></i> Files </button>
                            <div class = "filesContainer"> 
                                <div class = "documentationCont">
                                    Document Requirement: <br>
                                    <div class = "ReqDocumentation">
                                        <div class ="attachedDocumentation"> here attached file </div>
                                        <div class = "divDocuReqLogs"> <br> <button class = "DocuReqLogs"> <i class="fa-solid fa-ellipsis"></i> </button>
                                            <div class = "DrequirementLogsCont" id ="DocuReqrmntLogs">
                                                
                                            </div>
                                        </div>
                                    </div>     
                                </div>   
                                <div class = "AdvCont">          
                                    Advisor Recomendation Sheet: 
                                    <div class = "advRecomendation">
                                         <div class = "attachedAdvRecom"> attached file here </div>    
                                        <div class = "divAdvLogs"> <br> <button class = "AdvLogs"> <i class="fa-solid fa-ellipsis"></i> </button>
                                             <div class = "AdvRequirementLogsCont" id ="AdvReqrmntLogs">

                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>  
                            <script>
                                    
                            </script>

                        </div>    
                        <div class="mDropdown" data-flsDropdown>  
                        <button type="button" class="Members-Btn" data-flsDropdown-button onclick="fetchGroupMembers()"  > <i class="fa-solid fa-user-group"></i> Members </button>
                                <!-- Container to display group members -->
                                <div class="GroupmembersContainer" id="groupMembersContainer"></div>
                            </div>
                        </div>
                    </h4>
                </div>
            <div class="defaultBody" id="defaultBody">
                <div class="recentFiles" >
                    'featured files here'
                </div >
            </div>
            <div class="submissionFrame" id="submissionFrame">
                <div class="submissionscontainer">
                <div class= "requirement-list">
                    <div class = "req-nameCont"> 
                        <div class="requirement-name">
                        
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                        // Function to fetch requirements information for the logged-in student's group
                        function fetchRequirementsInfo() {
                            fetch('fetchRequirements.php')
                                .then(response => response.json())
                                .then(requirements => {
                                    const reqNameContainer = document.querySelector('.req-nameCont');
                                    
                                    // Clear existing content
                                    reqNameContainer.innerHTML = '';

                                    // Populate the container with the group's requirements
                                    requirements.forEach(requirement => {
                                        const div = document.createElement('div');
                                        div.className = 'requirement-name';
                                        div.textContent = requirement;
                                        reqNameContainer.appendChild(div);
                                    });
                                })
                                .catch(error => {
                                    console.error('Error fetching requirements information:', error);
                                });
                        }

                        // Fetch requirements information when the page loads
                        fetchRequirementsInfo();
                    });
                    </script>
                    </div>
                    
                </div>
         <style> 
           .submissionFrame {
                display: none;
            }
         </style>
                <div class= "requirement-details">
                    <div class="requirement-title" id="req_title"> <h3> Documentation requirement </h3> </div> <br>
                    <div class="requirement-due" id="req_due"> <h4> Due : ??/??/???? </h4> </div><br>
                    
                    <div class="requirement-descriptionCont"> Requirement Description: 
                        <div class="requirement-descBox" id="req_description"> 
                            ?????
                        </div>        
                    </div>
                    <div class="reqfile-version" id="reqfile_version"> <h4>Version: ?????</h4> 
                    </div> <br>   
                    <!-- idk kung san lalagay ung file attached id -->
                    <div class="Attach-Files"> 
                            <form id="file-upload" class="requirement-file">
                                <div class="atchFiles">   
                                    <h3>Attach Files   </h3> 
                                    <!-- Replace img tag with the i tag -->
                                    <!-- <i class="fa-solid fa-plus" id="attach-btn"></i> -->
                                    <img src="course_assets/plus.png" alt="attached file" id="attach-btn"> 
                                    <div id="upload-btn" class="upload-container"></div>
                                    <label for="input-file"></label>
                                    <input type="file" accept="pdf" id="input-file" name="profile_picture">
                                </div>
                            </form> 
                        </div>   
                        <div class="Attached-FileCont">
                            <!-- attached files go here -->
                        </div>        

                    <div class="req-submitbtnCont"> 
                        
                        <button class="reqbtn" type="button">
                            submit
                        </button>
                    </div>
                    <script>
                        
                        document.getElementById('input-file').addEventListener('change', function() {
                        var files = this.files; // Get the selected files

                        var fileList = document.createElement('ul'); // Create a list to hold file details
                        for (var i = 0; i < files.length; i++) {
                        // Check if the file is a PDF
                        if (files[i].type === 'application/pdf') {
                            var listItem = document.createElement('li'); // Create list item for each file
                            listItem.style.backgroundColor = '#F8EFE3'; // Set background color
                            listItem.style.borderRadius = '15px';
                            listItem.style.width = '245px';
                            listItem.style.height = '45px';
                                   
                            if (i > 0) {
                                listItem.style.marginTop = '2px'; // Add margin to the top except for the first item
                            } else {
                                listItem.style.marginTop = "5px";
                            }

                            // Create icon element
                            var fileIcon = document.createElement('i');
                            fileIcon.className = 'fa-regular fa-file-pdf'; // Set the class for the icon
                            
                            // Create anchor element
                            var fileLink = document.createElement('a');
                            fileLink.textContent = files[i].name; // Set text content to file name
                            fileLink.href = URL.createObjectURL(files[i]); // Set href to the URL of the file
                            fileLink.download = files[i].name; // Set the download attribute to force download

                            // Append icon and anchor elements to list item
                            listItem.appendChild(fileIcon);
                            listItem.appendChild(fileLink);

                            // Append list item to list
                            fileList.appendChild(listItem);
                        } else {
                            alert("Only PDF files are allowed.");
                        }
                        }
                        var attachedFileCont = document.querySelector('.Attached-FileCont ul');
                        if (!attachedFileCont) {
                        attachedFileCont = document.createElement('ul');
                        attachedFileCont.style.padding = '1px'; // Add padding to the list
                        attachedFileCont.style.listStyleType = 'none'; // Remove default list style
                        document.querySelector('.Attached-FileCont').appendChild(attachedFileCont);
                        }
                        attachedFileCont.appendChild(fileList); // Append file list to Attached-FileCont
                        });    
                        
                            // Get the element with the class "group_name"
                            const groupDiv = document.getElementById('group_name');

                            // Function to decrease opacity by 70%
                            function decreaseOpacity() {
                                groupDiv.style.opacity = '0.80'; // 30% opacity
                            }

                            // Function to reset opacity to default
                            function resetOpacity() {
                                groupDiv.style.opacity = '1'; // 100% opacity
                            }

                            // Add event listeners for mouseover and mouseout
                            groupDiv.addEventListener('mouseover', decreaseOpacity);
                            groupDiv.addEventListener('mouseout', resetOpacity);

                            // Function to handle click event
                            groupDiv.addEventListener('click', function() {
                                // Call the showDefaultBody function
                                showDefaultBody();
                            });
                    </script>
                </div>
            
        </div>
    </div>
    
        </style>
        
    </div>
    <!-- ian end -->
</body>
</html>