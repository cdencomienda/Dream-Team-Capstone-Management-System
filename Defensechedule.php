<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DefenseSchedule</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
     integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src = "studentcourse.js"></script>   

    <link rel="stylesheet" href="Defensechedule.css">

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

        <div class="MainScheduleCont">
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h1>Create Defense Schedule</h1>
                    <form id="scheduleForm" action="/submit_schedule" method="POST">
                        <!-- First primary container -->
                        <div class="SchedDetails"> 
                            <!-- secondary Flex -->
                            <div class="DetailsFlex"> 
                                <!-- 1st flexBox -->
                                <div class="titleFLex">
                                    <div class="titleDetails">
                                        <label class="textBox" for="schedTitle">Sched Title:</label>
                                        <input type="text" id="schedTitle" name="schedTitle" class="input-field"><br>
                                    </div>  
                                 </div>
                                <div class="timeDateflexcont">
                                        <!-- second flexBox -->
                                        <div class="dateDetails">
                                            <label  class="textBox" for="date">Date:</label>
                                            <input type="date" id="date" name="date" class="input-field2"><br>
                                        </div>
                                        <div class="timeDetails">
                                            <label  class="textBox" for="time">Time:</label>
                                            <input type="time" id="time" name="time" class="input-field3"><br>
                                        </div>
                                </div>      
                            </div>
                            <!-- Second primary container -->
                            <div class="groupFlex">
                            <label  class="textBox" for="GroupName">Group Name:</label>
                            <input type="text" id="GroupName" name="GroupName" class="input-field"><br>
                            </div>
                        </div>    
                        <button class="SchedSbmit"  type="button" onclick="createDefenseContainer()">Create <i class="fa-solid fa-plus"></i></button>
                    </form>
                </div>
            </div>
            
            <div class= "Schedule" id="scheduleContainer">
             
            </div>
            
            <div class="divButton">
                <button class="CreateSched" id = "addScheduleBtn">
                   Add Schedule <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </div>

    </div>
    <script src="DefenseSchedule.js"></script>
</body>
</html>
   
           