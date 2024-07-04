<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advisory</title>
    <link rel="stylesheet" href="Capstone.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                    </div>
                </div>
            </div>
        </div>
    </div> 
</head>
<body>

    <div class="Lsection">
        <button type="button" class="notif" onclick="notifProf()">Notification</button>
        <button type="button" class="class" onclick="openClassPage()">Class</button>
        <button type="button" class="schedule" onclick="scheduleProf()">Schedule</button>
        <button type="button" class="capstone" onclick="capstoneProf()">Capstone Defense</button>
        <button type="button" class="advisory"  onclick="advisoryProf()">Advisory</button>

    </div>
    <div class="wrapper"><!-- start of wrapper scroll -->
    <div class="MainScheduleCont">
        <div class="class-Dropdown">
                <div class="classListDropdown">
                <h4>ADVISORY</h4>
                              
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
                            
                            <button type="button" class="dropdownbtn" onclick="rubric_preview()">Rubric</button>
                        </div>
                    </div>
                    <!-- PanelMember, Lead -->
                    <button type="button" class="createdgroupBTN" onclick="newGroupCreated()">Group name</button>
                    
                    <!-- chair panel -->
                    <button type="button" class="createdgroupBTN" onclick="newGroupCreated2()">Group name2</button>
                </div>   
                <div class="coursesDetails" id="term1">
                    <h3 class="termh3">Courses for Term 1</h3>
                    <div class="coursesDropdown">
                        <div class="dropdownmelon">            
                            <h3 class="courseNameDisplay"> DATAMNGT <button type="button" class="classSet" onclick="dropdownMelon(this)">•••</button></h3>
                            <div class="dropdown-content">
                             
                                <button type="button" class="dropdownbtn" onclick="rubric()">Rubric</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <div class="divButton">
                    <!-- <button class="CreateSched" id = "addScheduleBtn">
                    Add Schedule <i class="fa-solid fa-plus"></i>
                    </button> -->
                </div>
            </div>
        </div>        
    </div>    
    </div><!-- end of wrapper scroll -->    

    <div class="GroupContainer" id = "advisoryGroupContainer"style = "display: none;" >
                    <div class="dashboard_header">
                        <!-- Group Name Box -->
                        <div class="groupname_container" onclick="showDefaultBody()"> 
                            <!-- ian mojica  group name -->
                            <div class="group_name" id="group_name"> 
                                sample     
                            </div>   
                        </div>
                        <script> 
                                    
                        </script> 
                    <div class="button-group"> 
                        <div class = "flsDropdown" data-flsDropdown>
                            <button type="button" class=" Rep-FilesBtn" onclick = "filesbtn()" data-flsDropdown-button> <i class="fa-solid fa-file"></i> Files </button>
                            
                            <div class="filesContainer"> 
                                <div class="documentationCont">
                                    Document Requirement: <br>
                                    <div class="ReqDocumentation">
                                        <div class="attachedDocumentation"onclick="openModal('requirement%20_repository/docu-logs/docu-test1.pdf')"> 
                                        
                                        <img src="menu_assets/file-icon.png" alt="file icon" class="fileIcon">
                                        
                                            <div class="Recent-fileName">docu-test1.pdf</div>
                                            
                                        </div>

                                        <div class = "divDocuReqLogs"> <br>
                                            <button class = "DocuReqLogs" onclick="toggleDocuReqLogs()" > <i class="fa-solid fa-ellipsis"></i> </button>
                                        </div>
                                    </div>     
                                </div>   
                            </div>  
                        </div>
                          <!-- files popup -->
                          <div class="fileLogsPopup" id="DocuReqrmntLogs">
                        <h4>Document Requirement Logs</h4>
                        <!-- Logs will be dynamically added here -->
                        </div>
                      
                        
                        <div class= "group-Rubrics">
                            <button type="button" class=" group-Drubrics" onclick="groupDefenseRubrics()"> <i class="fa-solid fa-table"></i> Rubrics </button>
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
                
                <!-- panelist : role-member -->
                 
                <div class = "defense-main" style = "display: none">
                    <div class="Defense-Page" >      
                        
                        <div class="rubric-container">
                              <!-- dito lagay group name + title ng paper -->
                            <div class ="grpDefense-Details">
                                <div class = "Group Name">
                                    <h3> group </h3>
                                </div>
                                <div class = "capstone-title">
                                    <h3> development of ???</h3>
                                </div>
                            </div>    
                            <div class="rubric-header">
                                <h1>Written Communication</h1>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th class="description-column">Description</th>
                                        <th class="grade-Desc">score description</th>
                                        <th class="grades-column">Grades</th>          
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="criteria">
                                        <td class="description">
                                            <strong>B1. Executive Summary</strong><br>
                                            The project summary includes: a clear, coherent, easily readable & accurate paragraph; consists of complete sentences free from grammatical and factual errors and biases; and includes the right amount of detail.
                                        </td>
                                        <td class="grade_description">
                                            askdjbajdb<br>
                                        </td>
                                        <td class="score-column">
                                            <select>
                                                <option value="7">7</option>
                                                <option value="6">6</option>
                                                <option value="5">5</option>
                                                <option value="4">4</option>
                                                <option value="3">3</option>
                                                <option value="2">2</option>
                                                <option value="1">1</option>
                                                <option value="0">0</option>
                                            </select>
                                        </td>
                                    
                                    </tr>
                                    <tr class="criteria">
                                        <td class="description">
                                            <strong>B1. Executive Summary</strong><br>
                                            The project summary includes: a clear, coherent, easily readable & accurate paragraph; consists of complete sentences free from grammatical and factual errors and biases; and includes the right amount of detail.
                                        </td>
                                        <td class="grade_description">
                                            askdjbajdb<br>
                                        </td>
                                        <td class="score-column">
                                            <select>
                                                <option value="7">7</option>
                                                <option value="6">6</option>
                                                <option value="5">5</option>
                                                <option value="4">4</option>
                                                <option value="3">3</option>
                                                <option value="2">2</option>
                                                <option value="1">1</option>
                                                <option value="0">0</option>
                                            </select>
                                        </td>
                                    
                                    </tr><tr class="criteria">
                                        <td class="description">
                                            <strong>B1. Executive Summary</strong><br>
                                            The project summary includes: a clear, coherent, easily readable & accurate paragraph; consists of complete sentences free from grammatical and factual errors and biases; and includes the right amount of detail.
                                        </td>
                                        <td class="grade_description">
                                            askdjbajdb<br>
                                        </td>
                                        <td class="score-column">
                                            <select>
                                                <option value="7">7</option>
                                                <option value="6">6</option>
                                                <option value="5">5</option>
                                                <option value="4">4</option>
                                                <option value="3">3</option>
                                                <option value="2">2</option>
                                                <option value="1">1</option>
                                                <option value="0">0</option>
                                            </select>
                                        </td>
                                    
                                    </tr><tr class="criteria">
                                        <td class="description">
                                            <strong>B1. Executive Summary</strong><br>
                                            The project summary includes: a clear, coherent, easily readable & accurate paragraph; consists of complete sentences free from grammatical and factual errors and biases; and includes the right amount of detail.
                                        </td>
                                        <td class="grade_description">
                                            askdjbajdb<br>
                                        </td>
                                        <td class="score-column">
                                            <select>
                                                <option value="7">7</option>
                                                <option value="6">6</option>
                                                <option value="5">5</option>
                                                <option value="4">4</option>
                                                <option value="3">3</option>
                                                <option value="2">2</option>
                                                <option value="1">1</option>
                                                <option value="0">0</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>   
                        </div>
                    </div>
                    <!-- for chair panel only -->
                    <div class="commentsCollection">
                        <div class="CommentsDiv">
                            <div class="comments-section">
                                <div class="panel-comments">
                                    <h3>Panel 1 Comments:</h3>
                                    <textarea class="comments-input"></textarea>
                                    <button class="approve-button"><i class="fa-solid fa-check"></i></button>
                                </div>
                            </div>
                            <div class = "">
                                <button class = "gradeSumarry"> summary of grades </button> 
                            </div>    
                        </div>

                    </div>
                    <!-- chair panel end -->
                    <div class="cDiv">
                        <div class="CommentsDiv">
                            <div class="comments-section" id="commentsSection">
                                <!-- <div class="panel-comments">
                                    <h3>Panel 1 Comments:</h3>
                                    <textarea class="comments-input"></textarea>
                                    <button class="delete-button"><i class="fa-solid fa-trash-can"></i></button>
                                </div> -->
                            </div>
                        </div>
                        <div class="addCommBtn">
                            <button class="addComment" onclick="addComment()"><i class="fa-solid fa-plus"></i> Add Comments</button>
                            <button class="sendComment"><i class="fa-solid fa-paper-plane"></i> Send</button>
                        </div>
                    </div>

                </div>  

                    <!-- files -->
                <div class="defaultBody " id="defaultBody">
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
                <!-- Group Defense Rubric -->
               
        </div>  

    <!-- start rubrics set hidden -->  
      <!-- Rubric div -->
        
      <div class="rubriccontainer" style="display: none"> 
                    <div class="secondaryRubriccont">
                    <div class="rubric-container">
                            <h1>Written Communication</h1>
                        </div>
                        <table class="table">        
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
                                    
                                    <td>Relevance</td>
                                    <td>The content is comprehensive, well-researched, and highly informative. It demonstrates a deep understanding of the subject matter.</td>
                                    <td>The content is mostly accurate and relevant but may lack some depth or clarity in certain areas. It generally conveys the required information.</td>
                                    <td>The content is partially accurate and relevant but greatly lacks some depth or clarity in certain areas.</td>
                                    <td>The content is partially accurate and relevant but greatly lacks some depth or clarity in certain areas.</td>
                                    <td>The content is partially accurate and relevant but greatly lacks some depth or clarity in certain areas.</td>
                                    <td>The content is partially accurate and relevant but greatly lacks some depth or clarity in certain areas.</td>
                                    <td>The content is partially accurate and relevant but greatly lacks some depth or clarity in certain areas.</td>
                                </tr>
                                <tr>
        
        
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>        
</div> 
<script src="Capstone.js"></script>
</body>
</html>
