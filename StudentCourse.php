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
                <div class="profile">
                    <img src="menu_assets/users-icon.png" alt="profile-img">
                </div>
                <div class="menu" id ="menuBtn">
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
                        <button class = "close" onclick= "closeEditform()">  <i class="fa-regular fa-circle-xmark"></i> </button>
                    </div>
                    
                    <form id="editProfileForm" action="editProfile.php" method="POST">
                        <div class="profile">
                            <img src="menu_assets/prof.png" alt="profile-img">
                        </div>
                        <h5edit><?php echo $_SESSION['fName'] . ' ' . $_SESSION['lname']; ?><br/>
                        <span><?php echo $_SESSION['user_email']; ?></span>
                        </h5edit>
                        <h3> <input type="text" id="profileemailID" class="inputEmail" name="userEmail" placeholder="Input your Email"> </h3>
                        <h3> <input type="text" id="profileFnameID" class="inputname" name="newFname" placeholder="Input new First Name"> </h3>
                        <h3> <input type="text" id="profileLnameID" class="inputname" name="newLname" placeholder="Input new Last Name"> </h3>
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
                    <h3>My Courses</h3>
                    <div class="course" id="coursesList">

                    edfgsdgers

                    </div> <!-- This will be populated with the list of courses -->
                    <button type="button" id = "group_name1" class="createdgroupBTN" onclick="newGroupCreated()"></button>

                </div>
            <div class="dropdown">
            </div>
        </div>
        <div class="StudentDefault">
            <div class="dashboard_header">

                    <!-- Group Name Box -->

                <div class="groupname_container"> 
                    <div class="group_name" id="groupName"> sample </div>   
                </div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    function fetchCourses() {
        fetch('LiveSearchStudentCourses.php') // Replace with the actual path to your PHP script
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
                            const courseHeader = document.createElement('h4');
                            courseHeader.textContent = `${course.course_code} - ${course.section} - Term ${course.term} - ${academicYearRange}`;

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
            
            <div class="submissionFrame" id="submissionFrame">
                <div class="submissionscontainer">
                <div class= "requirement-list">
                    <div class = "req-nameCont"> 
                        <div class="requirement-name">
                        
                        </div>
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
 
                </div>
            
        </div>
    </div>
    
        </style>
        
    </div>
    <!-- ian end -->    
</body>

</html>