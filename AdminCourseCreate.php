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
        <button type="button" class="advisory"  onclick="advisoryProf()">Advisory</button>
    </div>

    <div class="wrapper"><!-- start of wrapper scroll -->
        <div class="class-Dropdown">
            <div class="classListDropdown">                              
                <button class="listClass">  
                    <h4>COURSES AY 2023-2024</h4>
                    <span class="selectedClass"></span> 
                    <div class="coursesListed"></div>                        
                </button>
                <ul class="menuCourses"> 
                    <li class="term" data-term="term1">Term 1</li>
                    <li class="term" data-term="term2">Term 2</li>
                    <li class="term" data-term="term3">Term 3</li>
                </ul>
            </div>    
        <div class="coursesDetails" id="term1">
            <h3 class="termh3">Courses for Term 1</h3>
            <div class="coursesDropdown">
                <div class="dropdownmelon">            
                    <h3 class="courseNameDisplay"> DATAMNGT <button type="button" class="classSet" onclick="dropdownMelon(this)">•••</button></h3>
                    <div class="dropdown-content">
                        <button type="button" class="dropdownbtn" onclick="viewMembers()">View Members</button> 
                        <button type="button" class="dropdownbtn" onclick="AddMembers()">Add Members</button> 
                        <button type="button" class="dropdownbtn" onclick="setrequirements()">Requirements</button>
                        <button type="button" class="dropdownbtn" onclick="rubric()">Rubric</button>
                    </div>
                </div>
                <button type="button" class="createdgroupBTN" onclick="newGroupCreated()">Group name</button>
            </div>   
            <div class="coursesDetails" id="term1">
                <h3 class="termh3">Courses for Term 1</h3>
                <div class="coursesDropdown">
                    <div class="dropdownmelon">            
                        <h3 class="courseNameDisplay"> DATAMNGT <button type="button" class="classSet" onclick="dropdownMelon(this)">•••</button></h3>
                        <div class="dropdown-content">
                            <button type="button" class="dropdownbtn" onclick="viewMembers()">View Members</button> 
                            <button type="button" class="dropdownbtn" onclick="AddMembers()">Add Members</button> 
                            <button type="button" class="dropdownbtn" onclick="setrequirements()">Requirements</button>
                            <button type="button" class="dropdownbtn" onclick="rubric()">Rubric</button>
                        </div>
                    </div>
                    <button type="button" class="createdgroupBTN" onclick="newGroupCreated()">Group name</button>
                </div>  
            </div>

            <div class="coursesDetails" id="term2">
                <h3 class="termh3">Courses for Term 2</h3>
                <div class="coursesDropdown">
                    <div class="dropdownmelon">            
                        <h3 class="courseNameDisplay"> MIXSIGS <button type="button" class="classSet" onclick="dropdownMelon(this)">•••</button></h3>
                        <div class="dropdown-content">
                            <button type="button" class="dropdownbtn" onclick="viewMembers()">View Members</button>
                            <button type="button" class="dropdownbtn" onclick="AddMembers()">Add Members</button> 
                            <button type="button" class="dropdownbtn" onclick="setrequirements()">Requirements</button>
                            <button type="button" class="dropdownbtn" onclick="rubric()">Rubric</button>
                        </div>
                    </div>
                    <button type="button" class="createdgroupBTN" onclick="newGroupCreated()">Group name</button>
                </div>
            </div>

            <div class="coursesDetails" id="term3">
                <h3 class="termh3">Courses for Term 3</h3>
                <div class="coursesDropdown">
                    <div class="dropdownmelon">            
                        <h3 class="courseNameDisplay"> ROBPROA <button type="button" class="classSet" onclick="dropdownMelon(this)">•••</button></h3>
                        <div class="dropdown-content">          
                            <button type="button" class="dropdownbtn" onclick="viewMembers()">View Members</button>
                            <button type="button" class="dropdownbtn" onclick="AddMembers()">Add Members</button> 
                            <button type="button" class="dropdownbtn" onclick="setrequirements()">Requirements</button>
                            <button type="button" class="dropdownbtn" onclick="rubric()">Rubric</button>
                        </div>
                    </div>
                    <button type="button" class="createdgroupBTN" onclick="newGroupCreated()">Group name</button>
                </div>
            </div>
            
        </div>

        <div class="coursesDetails" id="term2">
            <h3 class="termh3">Courses for Term 2</h3>
            <div class="coursesDropdown">
                <div class="dropdownmelon">            
                    <h3 class="courseNameDisplay"> MIXSIGS <button type="button" class="classSet" onclick="dropdownMelon(this)">•••</button></h3>
                    <div class="dropdown-content">
                        <button type="button" class="dropdownbtn" onclick="viewMembers()">View Members</button>
                        <button type="button" class="dropdownbtn" onclick="AddMembers()">Add Members</button> 
                        <button type="button" class="dropdownbtn" onclick="setrequirements()">Requirements</button>
                        <button type="button" class="dropdownbtn" onclick="rubric()">Rubric</button>
                    </div>
                </div>
                <button type="button" class="createdgroupBTN" onclick="newGroupCreated()">Group name</button>
            </div>
        </div>

        <div class="coursesDetails" id="term3">
            <h3 class="termh3">Courses for Term 3</h3>
            <div class="coursesDropdown">
                <div class="dropdownmelon">            
                    <h3 class="courseNameDisplay"> ROBPROA <button type="button" class="classSet" onclick="dropdownMelon(this)">•••</button></h3>
                    <div class="dropdown-content">          
                        <button type="button" class="dropdownbtn" onclick="viewMembers()">View Members</button>
                        <button type="button" class="dropdownbtn" onclick="AddMembers()">Add Members</button> 
                        <button type="button" class="dropdownbtn" onclick="setrequirements()">Requirements</button>
                        <button type="button" class="dropdownbtn" onclick="rubric()">Rubric</button>
                    </div>
                </div>
                <button type="button" class="createdgroupBTN" onclick="newGroupCreated()">Group name</button>
            </div>
        </div> 
    </div>
    </div><!-- end of wrapper scroll --> 

        <div class="adminClass">
        <!-- viewgroup div -->
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
                 
        <!-- addmembers div -->
            <div class="addmember" id="addmembers">
                    <div class="flex-container">
                        <h3>Add Members</h3>
                        <!-- lead panel -->
                        <div>
                            <label for="leadPanelist">Selected Lead Panel:</label>
                            <input type="text" id="leadPanelist" name="panelistName" class="inputName" oninput="selectedUserName(this.value, 'panelist')" placeholder="Type a panelist's name">
                        </div>
                    </div>

                    <div class="flex-container">
                        <!-- panel1 -->
                        <div>
                            <label for="panelist1">Selected Panel 1:</label>
                            <input type="text" id="panelist1" name="panelistName" class="inputName" oninput="selectedUserName(this.value, 'panelist')" placeholder="Type a panelist's name">
                        </div>
                    </div>

                    <div class="flex-container">
                        <!-- panel2 -->
                        <div>
                            <label for="panelist2">Selected Panel 2:</label>
                            <input type="text" id="panelist2" name="panelistName" class="inputName" oninput="selectedUserName(this.value, 'panelist')" placeholder="Type a panelist's name">
                        </div>
                    </div>

                    <div class="flex-container">
                        <!-- panel3 -->
                        <div>
                            <label for="panelist3">Selected Panel 3:</label>
                            <input type="text" id="panelist3" name="panelistName" class="inputName" oninput="selectedUserName(this.value, 'panelist')" placeholder="Type a panelist's name">
                        </div>
                    </div>   

                    <div class="flex-container">
                        <!-- advisor -->
                        <div>
                            <label for="advisor">Selected Advisor:</label>
                            <input type="text" id="advisor" name="advisorName" class="inputName" oninput="selectedUserName(this.value, 'advisor')" placeholder="Type an advisor's name">
                        </div>
                    </div> 
                    <button type="submit" class="addreqbtn" onclick="addreqBTN()">Add +</button>
                </div>
        
        <!-- Requirement div -->
            <div class="setrequirements">
                <h3>Requirements</h3>
                <form class="Requirements" method="POST" action="addRequirements.php">
                    <input type="text" class="inputRequirements" name="requirements" placeholder="Input requirements">
                    <h3>Requirements Description</h3>
                    <input type="text" class="inputRequirementsDescription" name="requirementsDescription" placeholder="Input Description">
                    <div></div>
                    <button type="submit" class="addreqbtn" onclick="addreqBTN()">Add +</button>
                </form>
            </div> 

        
             <!-- Rubric div -->
        <div class="rubriccontainer" style="display: none"> 
        <div class="secondaryRubriccont">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="rubric-container">
                <h1>Written Communication</h1>
            </div>
            <table>        
                <div class="rubric-header">
    
                <thead >
            
                    <!-- column title -->
                    <tr>
                        <th style = "background-color: #CBC4BA;">Overall<br> Percentage</th>
                        <th style = "background-color: #CBC4BA;">Learning Outcomes</th>
                        <th style = "background-color: #CBC4BA;">Criteria</th>
                        <th style = "background-color: #CBC4BA;">Excellent (100%)</th>
                        <th style = "background-color: #CBC4BA;">Good (80%)</th>
                        <th style = "background-color: #CBC4BA;">Satisfactory (75%)</th>
                        <th style = "background-color: #CBC4BA;">Slight Satisfactory (50%)</th>
                        <th style = "background-color: #CBC4BA;">Disatisfactory (25%)</th>
                    </tr>
                     <!-- column title end -->
                </thead>
                <tbody>
                    <tr>
                        <td>40%</td>
                        <td>Relevance</td>
                        <td>The content is comprehensive, well-researched, and highly informative. It demonstrates a deep understanding of the subject matter.</td>
                        <td>The content is mostly accurate and relevant but may lack some depth or clarity in certain areas. It generally conveys the required information.</td>
                        <td>The content is partially accurate and relevant but greatly lacks some depth or clarity in certain areas.</td>
                    </tr>
                    <tr>
                        <td>60%</td>
                        <td>Neatness</td>
                        <td>The content is comprehensive, well-researched, and highly informative. It demonstrates a deep understanding of the subject matter.</td>
                        <td>The content is mostly accurate and relevant but may lack some depth or clarity in certain areas. It generally conveys the required information.</td>
                        <td>The content is partially accurate and relevant but greatly lacks some depth or clarity in certain areas.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>        

        <!-- group class div -->
         <div class="GroupContainer">
                    <div class="dashboard_header">
                        <!-- Group Name Box -->
                        <div class="groupname_container"> 
                            <!-- ian mojica  group name -->
                            <div class="group_name" id="group_name"> 
                                sample     
                            </div>   
                        </div>
                        <script> 
                                    
                        </script> 
                    <div class="button-group"> 
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
                                <div class="GroupmembersContainer" id="groupMembersContainer">
                                    member1
                                </div>
                            </div>
                        </div>
                    </h4>
                    </div> 

                    <!-- files -->
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

                    <!-- file repo -->
                    <div class="professorFilesR" id="profFilesR">
                        <div class = "sFileContainer">
                        files repository
                        </div>
                    </div>
                </div> 
                <!-- file requirement -->
        </div>  
            
 

<script src="adminHome.js"></script>   
</body>
</html> 
 