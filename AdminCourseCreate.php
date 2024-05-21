<!DOCTYPE html>
<html lang="en">
<head> 

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" /> 

    <title>Admin Classmenu</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=REM&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <style>
         
        body{
         background: #CBC4BA;
         overflow-x: hidden;
        overflow: hidden;
        }
        #error-message {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 15px;
            background-color: #ffcccc;
            color: #ff0000;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
            display: none;
        }
 
        #error-message.show {
            display: block;
        }
 
        #error-message button {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #ff0000;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .close {
        background-color: transparent; 
        height: 30px;
        width:  30px;
        border: none;
        padding: 5px;
        border-radius: 5px;
        cursor: pointer;
        margin-left: 350px;
        overflow: hidden; 
        }
    
        .close i {
            color: black; 
            font-size: 25px;
            margin:-3px
            transition opacity 0.3s ease; 
        }
       
        .close i:hover {
            opacity: 50%; 
            border-radius:25px;

        }

    </style>


    <link rel="stylesheet" href="AdminHomeStyle.css">
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
                    <img src="menu_assets/prof.png" alt="profile-img">
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
                            <img src="menu_assets/prof.png" alt="profile-img">
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
         <!-- emerson gudito end -->
                </div>
            </div>
        </div>
    </div>
</head>

<body>
    <div class="Lsection">
        <div id="sectionBtn"></div>
        <button type="button" class="notif"  onclick="notifAuth()">Notification</button>
        <button type="button" class="class"  onclick="openClassPage()">Class</button>
        <button type="button" class="schedule"  onclick="Schedule()">Schedule</button>
        <button type="button" class="capstone"  onclick="Capstone()">Capstone Defense</button>
        <button type="button" class="Users"  onclick="Users()">Users</button>
        <button type="button" class="Defense-Reports"  onclick="DefenseR()">Defense Results</button>
    </div>

    <div class="wrapper"><!-- start of wrapper scroll -->
        <div class="class-Dropdown">
            <div class="classListDropdown">                              
                <div class="listClass">  
                    <h4>COURSES AY 2023-2024</h4>
                    <span class="selectedClass">Select a Term</span> 
                    <div class="coursesListed"></div>                        
                </div>
                <ul class="menuCourses"> 
                    <li class="term" data-term="term1">Term 1</li>
                    <li class="term" data-term="term2">Term 2</li>
                    <li class="term" data-term="term3">Term 3</li>
                </ul>
            </div>  

            <div class="coursesDetails" id="term1">
                <h3 class="termh3">Courses for Term 1</h3>
                    <div id="coursesDropdown">
                        <div class="dropdownmelon">            
                            <h3 id="courseNameDisplay"> DATAMNGT <button type="button" class="classSet" onclick="dropdownMelon()">•••</button></h3>
                            <div class="dropdown-content" id="courseActions">
                                <button type="button" class="dropdownbtn" onclick="creategroup()">Create Group</button>          
                                <button type="button" class="dropdownbtn" onclick="viewMembers()">View Members</button>
                                <button type="button" class="dropdownbtn" onclick="addMembers()">Add Members</button>
                                <button type="button" class="dropdownbtn" onclick="setrequirements()">Requirements</button>
                                <button type="button" class="dropdownbtn" onclick="rubric()">Rubric</button>
                            </div>
                        </div>
                        <button type="button" class="createdgroupBTN" onclick="newGroupCreated()">Group name</button>
                    </div>

                    <div id="coursesDropdown">
                        <div class="dropdownmelon">            
                            <h3 id="courseNameDisplay"> CPEDRAF <button type="button" class="classSet" onclick="dropdownMelon()">•••</button></h3>
                            <div class="dropdown-content" id="courseActions">
                                <button type="button" class="dropdownbtn" onclick="creategroup()">Create Group</button>          
                                <button type="button" class="dropdownbtn" onclick="viewMembers()">View Members</button>
                                <button type="button" class="dropdownbtn" onclick="addMembers()">Add Members</button>
                                <button type="button" class="dropdownbtn" onclick="setrequirements()">Requirements</button>
                                <button type="button" class="dropdownbtn" onclick="rubric()">Rubric</button>
                            </div>
                        </div>
                        <button type="button" class="createdgroupBTN" onclick="newGroupCreated()">Group name</button>
                    </div> 

            </div>
            
            <div class="coursesDetails" id="term2">
                <h3 class="termh3">Courses for Term 2</h3>
                <div id="coursesDropdown">
                        <div class="dropdownmelon">            
                            <h3 id="courseNameDisplay"> MIXSIGS <button type="button" class="classSet" onclick="dropdownMelon()">•••</button></h3>
                            <div class="dropdown-content" id="courseActions">
                                <button type="button" class="dropdownbtn" onclick="creategroup()">Create Group</button>          
                                <button type="button" class="dropdownbtn" onclick="viewMembers()">View Members</button>
                                <button type="button" class="dropdownbtn" onclick="addMembers()">Add Members</button>
                                <button type="button" class="dropdownbtn" onclick="setrequirements()">Requirements</button>
                                <button type="button" class="dropdownbtn" onclick="rubric()">Rubric</button>
                            </div>
                        </div>
                        <button type="button" class="createdgroupBTN" onclick="newGroupCreated()">Group name</button>
                    </div>

            </div>

            <div class="coursesDetails" id="term3">
                <h3 class="termh3" >Courses for Term 3</h3>
                <div id="coursesDropdown">
                        <div class="dropdownmelon">            
                            <h3 id="courseNameDisplay"> ROBPROA <button type="button" class="classSet" onclick="dropdownMelon()">•••</button></h3>
                            <div class="dropdown-content" id="courseActions">
                                <button type="button" class="dropdownbtn" onclick="creategroup()">Create Group</button>          
                                <button type="button" class="dropdownbtn" onclick="viewMembers()">View Members</button>
                                <button type="button" class="dropdownbtn" onclick="addMembers()">Add Members</button>
                                <button type="button" class="dropdownbtn" onclick="setrequirements()">Requirements</button>
                                <button type="button" class="dropdownbtn" onclick="rubric()">Rubric</button>
                            </div>
                        </div>
                        <button type="button" class="createdgroupBTN" onclick="newGroupCreated()">Group name</button>
                    </div>

            </div>
            
        </div>

        <div class="adminClass">
            <!-- viewgroup -->
            <div class="viewgroup" id="viewGRP">
                <div>
                    <button class = "closeViewGroup" onclick= "clsViewGrp()">  <i class="fa-regular fa-circle-xmark"></i> </button>
                 </div>
                <h3>Members:</h3>
                    <div class="membersContainer">
                        <h4>StudentName</h4>
                        <h4>StudentName</h4>
                        <h4>StudentName</h4>
                        <h4>StudentName</h4>
                        <h4>InstructorName</h4>
                    </div>
                </div>
        </div>   

    </div><!-- end of wrapper scroll -->



<script src="adminHome.js"></script>   
</body>
</html> 