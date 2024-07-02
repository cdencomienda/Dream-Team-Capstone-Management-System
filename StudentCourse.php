<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Course</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <title>Class Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=REM&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   

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
                <div class="profile" id="profilePic">
                    <img src="menu_assets/prof.png" alt="profile-img">
                </div>
                <div class="menu" id="menuBtn">
                    <h3><?php echo $_SESSION['fName'] . ' ' . $_SESSION['lname']; ?><br/>
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
                        <button class="close" onclick="closeEditform()"><i class="fa-regular fa-circle-xmark"></i></button>
                    </div>
                    <form id="editProfileForm" action="editProfile.php" method="POST">
                        <div class="profile">
                            <img src="menu_assets/prof.png" alt="profile-img">
                        </div>
                        <h5edit><?php echo $_SESSION['fName'] . ' ' . $_SESSION['lname']; ?><br/>
                        <span><?php echo $_SESSION['user_email']; ?></span>
                        </h5edit>
                        <h3><input type="text" id="profileemailID" class="inputEmail" name="userEmail" placeholder="Input your Email"></h3>
                        <h3><input type="text" id="profileFnameID" class="inputname" name="newFname" placeholder="Input new First Name"></h3>
                        <h3><input type="text" id="profileLnameID" class="inputname" name="newLname" placeholder="Input new Last Name"></h3>
                        <h3><input type="text" id="profilepasswordID" class="inputPassword" name="newPassword" placeholder="Input new Password"></h3>
                        <button type="submit" class="saveEditbtn">Save Changes</button>
                    </form>
                    <?php if(isset($_SESSION['error_message'])) { ?>
                    <div id="error-message" class="show">
                        <?php echo $_SESSION['error_message']; ?>
                        <button onclick="clearErrorMessage()">OK</button>
                    </div>
                    <?php unset($_SESSION['error_message']); } ?>
                </div>
            </div>
        </div>
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
            
            <script src = "homepage.js"></script>
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
                    <div class= "courses"> <h2>Courses</h2></div>
                    <div class="course" id="coursesList">
                    </div> <!-- This will be populated with the list of courses -->
                    <!-- <button type="button" id = "group_name1" class="createdgroupBTN" onclick="newGroupCreated()"></button> -->

                </div>
            <div class="dropdown">
            </div>
        </div>
        <div class="StudentDefault">
            <div class="dashboard_header">

                    <!-- Group Name Box -->

                <div class="groupname_container" onclick = "showDefaultBody()"> 
                    <div class="group_name" id="groupName"> sample </div>   
                </div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    function fetchCourses() {
        fetch('LiveSearchStudentCourses.php') 
            .then(response => response.json())
            .then(data => {
                if (Array.isArray(data)) {
                    const courseContainer = document.querySelector('.course');

                    if (courseContainer) {
                        courseContainer.innerHTML = ''; // Clear existing content

                        data.forEach((course, index) => {
                            // Parse academic_year as an integer
                            const academicYear = parseInt(course.academic_year);
                            // Calculate academic year range in "year - year + 1" format
                            const academicYearRange = academicYear + ' - ' + (academicYear + 1);

                            // Create a new h3 for each course
                            const courseHeader = document.createElement('h3');
                            courseHeader.textContent = `${course.course_code} - AY ${academicYearRange} - ${course.section} - T${course.term}`;

                            // Create a new button for each course
                            const courseButton = document.createElement('button');
                            courseButton.type = 'button';
                            courseButton.id = `group_name${index + 1}`; // Unique ID for each button
                            courseButton.className = 'createdgroupBTN';
                            courseButton.textContent = 'New Group Created'; // Button text
                            courseButton.onclick = function() {
                                newGroupCreated(course);
                            };

                            // Append the courseHeader and courseButton to the container
                            courseContainer.appendChild(courseHeader);
                            courseContainer.appendChild(courseButton);
                        });
                    } else {
                        console.error('No element with class "course" found.');
                    }
                } else {
                    console.log(data.message || 'No courses found for the student.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    // Function to handle the button click event
    function newGroupCreated(course) {
        console.log('New group created for:', course);
        // Add your custom functionality here
    }
    



    // Call the fetchCourses function when the DOM is fully loaded
    fetchCourses();
});

function fetchGroupName() {
    fetch('getGroupNameforButton.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            if (data.error) {
                console.error('Error:', data.error);
                // Handle the error as needed, for example, display it to the user
                alert('Error: ' + data.error);
            } else {
                console.log('Group Name:', data.group_name);
                // Use the group_name as needed, for example, display it on the webpage
                document.getElementById('groupName').innerText = data.group_name;
                document.getElementById('group_name1').innerText = data.group_name;
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
            // Handle fetch error, for example, display it to the user
            alert('Fetch error: ' + error.message);
        });
}

function fetchStudents() {
    fetch("LiveSearchGroupMembers.php")
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            const container = document.getElementById("groupMembersContainer");
            if (data.error) {
                container.innerHTML = data.error;
            } else {
                let output = "";
                data.forEach(student => {
                    output += student + "<br>";
                });
                container.innerHTML = output;
            }
        })
        .catch(error => {
            document.getElementById("groupMembersContainer").innerHTML = "Error: " + error;
        });
}





window.onload = fetchGroupName;


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
                                        <div class ="attachedDocumentation"> 
                                        <img src="menu_assets/file-icon.png" alt="file icon" class="fileIcon">
                                         <div class="fileDetails">
                                            <strong>Final Documentation</strong>
                                            <span>12 KB</span>
                                            </div>    
                                        </div>
                                        <div class = "divDocuReqLogs"> <br> <button class = "DocuReqLogs"> <i class="fa-solid fa-ellipsis"></i> </button>
                                            <div class = "DrequirementLogsCont" id ="DocuReqrmntLogs">
                                                
                                            </div>
                                        </div>
                                    </div>     
                                </div>   
                                <div class = "AdvCont">          
                                    Advisor Recomendation Sheet: 
                                    <div class = "advRecomendation">
                                         <div class = "attachedAdvRecom">
                                         <img src="menu_assets/file-icon.png" alt="file icon" class="fileIcon">
                                            <div class="fileDetails">
                                                <strong>DREAM TEAM - Recommendation</strong>
                                                <span>26 KB</span>
                                            </div>    
                                         </div>    
                                        <div class = "divAdvLogs"> <br> <button class = "AdvLogs"> <i class="fa-solid fa-ellipsis"></i> </button>
                                             <div class = "AdvRequirementLogsCont" id ="AdvReqrmntLogs">

                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>  
                        </div>    

                        <div class="mDropdown" data-flsDropdown>  
                        <button type="button" class="Members-Btn" data-flsDropdown-button onclick="fetchStudents()"  > <i class="fa-solid fa-user-group"></i> Members </button>
                                <!-- Container to display group members -->
                            <div class="GroupmembersContainer" id="groupMembersContainer">   
                            </div>
                    </div>
                        <button type="button" class="Members-Btn" data-flsDropdown-button onclick="fetchStudents()"  > <i class="fa-solid fa-user-group"></i> Rubrics </button> 
                        <!-- defense-rubric    -->
                </h4>
            </div>


            <div class="defaultBody" id="defaultBody">
                <div class="recentFiles">
                    <!-- File posted by another person -->
                    <div class="fileMessage left" onclick="openModal('featuredfiles/DREAM TEAM - Recommendation.pdf')">
                        <div class="fileInfo">
                            <img src="menu_assets/file-icon.png" alt="file icon" class="fileIcon">
                            <div class="fileDetails">
                                <strong>DREAM TEAM - Recommendation</strong>
                                <span>26 KB</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- File posted by you -->
                    <div class="fileMessage right" onclick="openModal('featuredfiles/Final Documentation.pdf')">
                        <div class="fileInfo">
                            <img src="menu_assets/file-icon.png" alt="file icon" class="fileIcon">
                             <div class="fileDetails">
                                 <strong>Final Documentation</strong>
                                 <span>12 KB</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Structure -->
            <div id="fileModal" class="modal">
                <div class="modalContent">
                    <span class="closeButton" onclick="closeModal()">&times;</span>
                    <iframe id="fileFrame" src="" frameborder="0"></iframe>
                </div>
            </div>
            
            <div class="submissionFrame" style = "display: none;" id="submissionFrame">
                <div class="submissionscontainer">
                <div class= "requirement-list">
                    <div class = "req-nameCont"> 
                        <div class="requirement-name">
                            Chapter 1
                        </div>
                    </div>
                </div>
         <style> 

         </style>
                <div class="requirement-details">
    <div class="requirement-title" id="req_title"> <h3> Documentation Requirement for Chapter 1 </h3> </div> <br>
    <div class="requirement-descriptionCont"> Requirement Description: 
        <div class="requirement-descBox" id="req_description"> 
            Attach your file of Chapter 1 for Pre-Defense
        </div>        
    </div>
    <div class="reqfile-version" id="reqfile_version"> 
    </div> <br>   
    <!-- idk kung san lalagay ung file attached id -->
    <div class="Attach-Files"> 
        <form id="file-upload" class="requirement-file">
            <div class="atchFiles">   
                <h3>Attach Files</h3> 
                <!-- Replace img tag with the i tag -->
                <!-- <i class="fa-solid fa-plus" id="attach-btn"></i> -->
                <img src="course_assets/plus.png" alt="attached file" id="attach-btn"> 
                <div id="upload-btn" class="upload-container"></div>
                <label for="input-file"></label>
                <input type="file" accept="application/pdf" id="input-file" name="profile_picture">
            </div>
        </form> 
    </div>   
    <div class="Attached-FileCont">
        <!-- attached files go here -->
    </div>        

    <div class="req-submitbtnCont"> 
        <button class="reqbtn" type="button" id= "submit-btn">
            Submit
        </button>
    </div>
</div>

<script>
     document.getElementById('input-file').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const attachedFileContainer = document.querySelector('.Attached-FileCont');
            
            // Create a new div element to display the file name and remove button
            const fileDiv = document.createElement('div');
            fileDiv.className = 'attached-file';
            fileDiv.textContent = file.name;
            
            // Create a remove button
            const removeBtn = document.createElement('button');
            removeBtn.className = 'remove-btn';
            removeBtn.textContent = 'Remove';
            removeBtn.addEventListener('click', function() {
                attachedFileContainer.removeChild(fileDiv);
            });

            // Append the remove button to the file div
            fileDiv.appendChild(removeBtn);

            // Append the new div to the attached files container
            attachedFileContainer.appendChild(fileDiv);
        }
    });

    document.getElementById('submit-btn').addEventListener('click', function() {
        const attachedFileContainer = document.querySelector('.Attached-FileCont');
        const defaultBody = document.getElementById('defaultBody');
        const files = attachedFileContainer.querySelectorAll('.attached-file');

        files.forEach(fileDiv => {
            const fileName = fileDiv.textContent.replace('Remove', '').trim();

            // Create a new file message div
            const fileMessageDiv = document.createElement('div');
            fileMessageDiv.className = 'fileMessage right';
            fileMessageDiv.onclick = function() { openModal(`featuredfiles/${fileName}`); };

            // Create the file info div
            const fileInfoDiv = document.createElement('div');
            fileInfoDiv.className = 'fileInfo';

            // Create the file icon img
            const fileIconImg = document.createElement('img');
            fileIconImg.src = 'menu_assets/file-icon.png';
            fileIconImg.alt = 'file icon';
            fileIconImg.className = 'fileIcon';

            // Create the file details div
            const fileDetailsDiv = document.createElement('div');
            fileDetailsDiv.className = 'fileDetails';

            // Create the strong element for the file name
            const strongElement = document.createElement('strong');
            strongElement.textContent = fileName;

            // Create the span element for file size (mock size for example)
            const spanElement = document.createElement('span');
            spanElement.textContent = 'Unknown Size';

            // Append elements to their parents
            fileDetailsDiv.appendChild(strongElement);
            fileDetailsDiv.appendChild(spanElement);
            fileInfoDiv.appendChild(fileIconImg);
            fileInfoDiv.appendChild(fileDetailsDiv);
            fileMessageDiv.appendChild(fileInfoDiv);

            // Append the file message div to the recentFiles div
            defaultBody.querySelector('.recentFiles').appendChild(fileMessageDiv);
        });

        // Clear the attached files container after submission
        attachedFileContainer.innerHTML = '';
    });

    function openModal(filePath) {
        alert(`Opening modal for: ${filePath}`);
        // Implement modal opening logic here
    }
</script>



                </div>
            
        </div>
    </div>
    
        </style>
        
    </div>
    <!-- ian end -->    
</body>

</html>