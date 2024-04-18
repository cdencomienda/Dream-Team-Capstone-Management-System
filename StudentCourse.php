<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Course</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
     integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    <link rel="stylesheet" href="StudentCourseStyle.css">
    <?php include 'login.php'; ?>
    <div class="header">
        <div class="wrap">
            <button type="button" class="logobtn" onclick="archive()"></button> 
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
</div>
</head>

<body>  
    <div class="hero">
    <div class="Lsection">
        <div id="sectionBtn"></div>
        <button type="button" class="notif"  onclick="notifAuth()">Notification</button>
        <button type="button" class="class"  onclick="studentClass1()">Class</button>
        <button type="button" class="schedule"  onclick="StudentSchedule()">Schedule</button>
        <button type="button" class="capstone"  onclick="Capstone()">Capstone Defense</button>
    </div>
    <div class="StudentClass">
        <div class="course_created" grid>
            <div class="S_courseInfo">
                <h2> Test Course </h2>
            </div>
            <div class="dropdown">
            </div>
        </div>
        <div class="StudentDefault">
            <div>
                <div class="dashboard_header">
                    <div class="groupname_container"> 
                    <h3> 
                    <p class="group_name"> Test Group Name </p>    
                    </h3>
                    </div>  
                    <h2>
                        <div class="button-group"> 
                            <button type="button" class=" Rep-FilesBtn" onclick="r_filesBtnAuth()"> <i class="fa-solid fa-file"></i> Files </button>
                            <button type="button" class=" Submission-Btn" onclick="submissionBtnAuth()"> Submissions </button>
                            <div class="mDropdown">  
                            <button type="button" class=" Members-Btn" onclick="TogglegroupMembers()"> Members </button>                  
                                <div class="membersContainer"> 
                                    member 1 
                                </div>
                            </div>
                        </div>
                    </h2>     
                </div>
                <div class="defaultBody" id="defaultBody">
                    <div class="recentFiles" >
                        'featured files here'
                    </div >
                </div>
                <div class="submissionFrame" id="submissionFrame">
                    <div class="submissionscontainer">
                    submission tab
                    </div>
                </div>
                <div class="studentFilesR" id="studentFilesR">
                    <div class = "sFileContainer">
                        files repository
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="StudentCourse.js"></script> -->
    <script> 
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
                document.getElementById("studentFilesR").style.display = "none";
            }

            function submissionBtnAuth() {
                document.getElementById("defaultBody").style.display = "none";
                document.getElementById("submissionFrame").style.display = "block";
                document.getElementById("studentFilesR").style.display = "none";
            }

            function r_filesBtnAuth() {
                document.getElementById("defaultBody").style.display = "none";
                document.getElementById("submissionFrame").style.display = "none";
                document.getElementById("studentFilesR").style.display = "block";
            }

    </script>   
    </div>
</body>
</html>