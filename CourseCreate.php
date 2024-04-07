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
    
    <div class="professorClass">
        <div class="courseCreation" grid>
            <button type="button" class="createAButton" onclick="toggleCourseCreation()">Create a Course</button>
            <form method="post" action="handle_course_creation.php">
            <div class="containerCreatecourse" style="display: none;">
                <h2>Create Course</h2>
                <div> 
                    <h3>Course Name:</h3>
                    <input type="text" class="inputTerm" name="courseName" placeholder="Input Course name"> 
                </div>
                <div> 
                    <h3>Course Description:</h3>
                    <input type="text" class="inputTerm" name="courseDescription" placeholder="Input Course description"> 
                </div>
                <div> 
                    <h5> Section: <input type="text" class="inputSection" name=" Section " placeholder="Input Section"> 
                        AY: <input type="text" class="inputAY" name="AcadYear" placeholder=" Input Academic Year"> 
                    </h5>
                        Term: <input type="number" class="Term" name="Term" placeholder="Term" min="1" max="3">
                        Unit: <input type="number" class="inputUnits" name="CourseUnit" placeholder="Unit/s" min="1" max="4">
                    </h5>
                </div> 
                <button type="button" class="createcourseButton" onclick="createcourse()">Create Course</button>
            </div>
            
            </form>
            
            <div class="classcontainer">
                <div class="sectionClass">
                    
                    <div class="creategroup">

                    </div>
                    <div class="viewgroup">

                    </div>
                    <div class="addmember">

                    </div>
                    <div class="setrequirements">

                    </div>

                </div>
            </div> 
        </div>
    </div>
    <script 
        src="professorhome.js"> 
    </script>   
</body>
</html>