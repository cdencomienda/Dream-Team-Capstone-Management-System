<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Menu</title>
    <link rel="stylesheet" href="CourseCreate.css">
    <?php include 'login.php'; ?>
    <?php include 'CourseCreated.php'; ?>
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
                        <button type="button" class="editprofileBtn">Edit Profile</button>
                        <button type="button" class="logoutBtn" onclick="logOUT()">Logout</button>
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
            <form method="post" action="CourseCreated.php">
                <div class="containerCreatecourse">
                    <h2>Create Course</h2>
                    <div> 
                        <h3>Course Name:</h3>
                            <input type="text" id="coursenameID" class="inputTerm" name="courseName" placeholder="Input Course name"> 
                        <h3>Course Description:</h3>
                            <input type="text" id="descriptionID" class="inputTerm" name="courseDescription" placeholder="Input Course description"> 
                        <h3> Section: 
                            <input type="text" id="sectionID" class="inputSection" name=" Section " placeholder="Input Section">   
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
                    <button type="button" id="CCbutton" class="createcourseButton" onclick="createcourse()">Create Course</button>
                </div>
            </form>
        </div> 
<!-- creategroup -->
        <div class="creategroup">
            <h1>Create group</h1>
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
            <button type="button" class="addgroupbtn" onclick="creategroup()">Add +</button>
        </div>

<!-- viewgroup -->
        <div class="viewgroup">
            
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
    </div>
    <script 
        src="professorhome.js"> 
    </script>   
</body>
</html>