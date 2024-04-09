
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Menu</title>
    <link rel="stylesheet" href="CourseCreate.css">
    <?php include 'login.php'; ?>
    <?php include 'CourseCreated.php'; ?>
    <?php include 'editProfile.php'; ?>
    <div class="header">
        <div class="wrap">
            <button type="button" class="logobtn"  onclick="openArchive()"></button> 
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
                <div class="menu">
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
                    <form id="editProfileForm" action="editProfile.php" method="POST">
                        <div class="profile">
                            <img src="menu_assets/prof.jpg" alt="profile-img">
                        </div>
                        <h5edit><?php echo $_SESSION['username']; ?><br/>
                        <span><?php echo $_SESSION['user_email']; ?></span>
                        </h5edit>
                        <!-- <h3> <input type="text" id="profileemailID" class="inputEmail" name="newEmail" placeholder="Input new Email"> </h3> -->
                        <h3> <input type="text" id="profilenameID" class="inputname" name="newname" placeholder="Input new Name"> </h3>
                        <h3> <input type="text" id="profilepasswordID" class="inputPassword" name="newPassword" placeholder="Input new Password"> </h3>
                        <button type="submit" class="saveEditbtn">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</head>
<body> 
    <div class="Lsection">
        <div id="sectionBtn"></div>
        <button type="button" class="notif"  onclick="notifProf()">Notification</button>
        <button type="button" class="class"  onclick="openClassPage()">Class</button>
        <button type="button" class="schedule"  onclick="scheduleProf()">Schedule</button>
        <button type="button" class="capstone"  onclick="capstoneProf()">Capstone Defense</button>
    </div>

<!-- courseCreation     -->
    <div class="professorClass">
        <div class="courseCreation" grid>
            <button type="button" class="createAButton" onclick="toggleCourseCreation()">Create a Course</button>
            <form method="post" action="CourseCreated.php" method="POST">
                <div class="containerCreatecourse">
                    <h2>Create Course</h2>
                    <div> 
                        <h3>Course Name:</h3>
                            <input type="text" id="coursenameID" class="inputTerm" name="courseName" placeholder="Input Course name"> 
                            <h3>Course Code:</h3>
                            <input type="text" id="courseCode" class="inputTerm" name="courseCode" placeholder="Input Course Code">
                            <div id="courseCodeSuggestions"></div>
                            
                        <h3> Section: 
                            <input type="text" id="sectionID" class="inputSection" name="Section" placeholder="Input Section">   
                        </h3>
                        <h3> AY: 
                            <input type="text" id="yearID" class="inputAY" name="AcadYear" placeholder=" Input Academic Year">   
                        </h3>
                        <h3> Term:     
                            <input type="number" id="termID" class="Term" name="Term" placeholder="Term" min="1" max="3">
                        </h3>
                        <h3> Unit: 
                            <input type="number" id="unitID" class="inputUnits" name="CourseUnit" placeholder="Unit/s" min="1" max="4">
                        </h3>
                    </div>  
                    <button type="submit" id="ccbutton" class="createcourseButton">Create Course</button>
                </div>
            </form>
        </div> 

<!-- creategroup -->
        <div class="creategroupContainer">
            <h1>Create group</h1>
            <h3>Group Name:</h3>
                        <input type="text" class="inputgroupName" name="groupName" placeholder="Input group name"> 
            <form class="addcheckbox">
                <div class="flex-container">
                    
                    <div>
                        <h3>Add Student:</h3>
                        <input type="text" class="inputName" name="studentName" placeholder="Input name">
                    </div>
                    <div class="checkboxStudent">
                        <input type="checkbox" id="StudentName" name="student" value="studentID">
                        <label for="StudentName"> StudentName</label><br>
                        <input type="checkbox" id="StudentName" name="student" value="studentID">
                        <label for="StudentName"> StudentName</label><br>
                    </div>
                </div>
                <div class="flex-container">
                    <div>
                        <h3>Add Panel:</h3>
                        <input type="text" class="inputName" name="panelName" placeholder="Input name">
                    </div>
                    <div class="checkboxPanel">
                        <input type="checkbox" id="PanelName" name="panel" value="panelID">
                        <label for="PanelName"> PanelName</label><br>
                        <input type="checkbox" id="PanelName" name="panel" value="panelID">
                        <label for="PanelName"> PanelName</label><br>
                    </div>
                </div>
                <div class="flex-container">
                    <div>
                        <h3>Add Advisor:</h3>
                        <input type="text" class="inputName" name="advisorName" placeholder="Input name">
                    </div>
                    <div class="checkboxAdvisor">
                        <input type="checkbox" id="AdvisorName" name="advisor" value="advisorID">
                        <label for="AdvisorName"> AdvisorName</label><br>
                        <input type="checkbox" id="AdvisorName" name="advisor" value="advisorID">
                        <label for="AdvisorName"> AdvisorName</label><br>
                    </div>
                </div>
            </form>
            <button type="button" class="addgroupbtn" onclick="createGROUP()">Add +</button>
        </div>

<!-- viewgroup -->
        <div class="viewgroup">
            <h3>Members:</h3>
                <div class="membersContainer">
                    <label for="StudentName"> StudentName</label><br>
                    <label for="StudentName"> StudentName</label><br>
                    <label for="StudentName"> StudentName</label><br>
                    <label for="StudentName"> StudentName</label><br>
                    <label for="InstructorName"> InstructorName</label><br>
                </div>
        </div>

<!-- add members -->
        <div class="addmember">
            <form class="addcheckbox">
                <div> 
                    <h3>Add Member:</h3>
                    <input type="text" class="inputName" name="studentName" placeholder="Input name"> 
                </div>
                <div class="checkboxStudent">
                    <input type="checkbox" id="StudentName" name="student" value="studentID">
                    <label for="StudentName"> StudentName</label><br>
                    <input type="checkbox" id="StudentName" name="student" value="studentID">
                    <label for="StudentName"> StudentName</label><br>
                </div>
                <button type="button" class="addmemberbtn" onclick="addmem()">Add +</button>
            </form>
        </div>

<!-- set requirements -->
        <div class="setrequirements">
            <h3>Requirements</h3>
                <input type="text" class="inputRequirements" name="requirements" placeholder="Input requirements">
            <h3>Requirements Description</h3>
                <input type="text" class="inputRequirementsDescription" name="requirementsDescription" placeholder="Input Description"> 
            <h3>${courseName}</h3>
        </div>
<!-- rubric -->
        <div class="rubriccontainer">
            <h3>Rubric Code:</h3>
            <input type="text" id="courserubric" class="inputRubricID" name="rubricCode" placeholder="Input Rubric Code">
        </div>
    </div>
    <script 
        src="professorhome.js"> 
    </script>   
</body>
</html>

<script>
    // Function to handle AJAX request for live search
    function liveSearchCourseCode() {
    var input = document.getElementById('courseCode').value;
    var xhr = new XMLHttpRequest();
    if (input.trim() !== '') { // Check if input is not empty
        xhr.open('GET', 'LiveSearchCourseCode.php?search=' + input, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('courseCodeSuggestions').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    } else { // If input is empty, hide the suggestions
        document.getElementById('courseCodeSuggestions').innerHTML = '';
    }
}

// Event listener to trigger live search on input change
document.getElementById('courseCode').addEventListener('input', liveSearchCourseCode);

// Event listener to hide suggestions when the cursor is not in the field
document.getElementById('courseCode').addEventListener('blur', function() {
    document.getElementById('courseCodeSuggestions').innerHTML = '';
});
</script>
