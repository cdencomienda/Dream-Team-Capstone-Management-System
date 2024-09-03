<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capstone Defense</title>
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
   
    <div class="MainScheduleCont">
        <div class="class-Dropdown">
                <div class="classListDropdown">
                <h4>DEFENSE LIST</h4>
                              
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

    <div class="GroupContainer" id ="GrpContainer"style = "display: none;" >
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

                        <div class="pDropdown" data-pDropdown>  
                            <button type="button" class="Panelist-Btn" data-pDropdown-button onclick="fetchpanelist()"  > <i class="fa-solid fa-user-group"></i> Panelist </button> 
                            <div class="PanelistContainer" id="PanelistContainer">
                                Panel1
                            </div>
                        </div>

                        <div class="gradeSummary" >  
                            <button type="button" class="summary-Btn" data-pDropdown-button onclick="gradeSummary()"> <i class="fa-solid fa-percentage"></i> Grades </button> 
                        </div>  

                    </div>
                    </h4>
                </div> 
                
                <!-- panelist : role-member -->
                 
    
    <div class="defense-main" id="defense-main" style="display: none; overflow-x: hidden;" >
        <div class="Defense-Page" id = "Defense-Page">      
        <div class="panel-Role">
                        
                        <h3>Chair Panel:</h3> <BR>
                        
                    
                    </div>
            <div class="rubric-container">
            <!-- dito lagay group name + title ng paper -->

            
                
                <div class="grpDefense-Details" id="summgrpDefense-Details">
                        
                    <div class="Group Name">
                        <h3>Group</h3>
                    </div>
                        
                
                </div>    
                
                    
                <div class="rubric-header">
                        
                    <h1>Written Communication</h1>
                    
                </div>
                    
                    <table class="table">
                        <thead>
                        
                        <tr>
                            <th class="description-column">Description</th>
                            <th class="grade-Desc">Score Description</th>
                            <th class="grades-column">Grades</th>          
                        </tr>
                        
                        </thead>
                        
                        <tbody>
                        
                            <tr class="criteria">
                                
                                <td class="description">
                                
                                    <strong>B1. Executive Summary</strong><br>
                                
                                    The project summary includes: a clear, coherent, easily readable & accurate paragraph; consists of complete sentences free from grammatical and factual errors and biases; and includes the right amount of detail.
                                
                                </td>
                            
                                <td class="grade_description">Excellent summary with no errors.</td>
                            
                                <td class="score-column">
                                    
                                    <select class="score-select">
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
                                
                                    <strong>B2. eyy ugh</strong><br>
                                
                                    The project summary includes: a clear, coherent, easily readable & accurate paragraph; consists of complete sentences free from grammatical and factual errors and biases; and includes the right amount of detail.
                                
                                </td>
                            
                                <td class="grade_description">Excellent presentation skills with perfect delivery.</td>
                            
                                <td class="score-column">
                                    
                                    <select class="score-select">
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
                                
                                    <strong>B3. oral </strong><br>
                                
                                    The project summary includes: a clear, coherent, easily readable & accurate paragraph; consists of complete sentences free from grammatical and factual errors and biases; and includes the right amount of detail.
                                
                                </td>
                            
                                <td class="grade_description">Outstanding oral communication with no errors.</td>
                            
                                <td class="score-column">
                                    
                                    <select class="score-select">
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
            
            <div class="cDiv">
                <h1>COMMENTS</h2>
                <h2>______________________________</h2>
                <form>

                
                <div class="CommentsDiv">
                    
                    <div class="comments-section" id="commentsSection">

                            <!-- COMMENTS GO HERE -->
                    
                    </div>
                        
                </div>
                </form>
                
                <div class="addCommBtn">
                    <div class="dropdown1">
                        <button class="dropbtn1"><i class="fa-solid fa-chevron-down"></i> Choose Type</button>
                        <div class="dropdown-content1">
                        <button onclick="addComment()">Comment</button>
                        <button onclick="addRevision()">Revision</button>
                        <button onclick="addRequirement()">Additional Requirement</button>
                        </div>
                    </div>
                    <button class="sendComment" onclick = "sendFeedback()"><i class="fa-solid fa-paper-plane"></i> Send</button>
                </div>


                
                <h2>______________________________</h2>       

            </div>

            <!-- for chair panel only -->
            <div class="commentsCollection">
                <div class="CommentsDiv">
                    
                    <div class="comments-section">
                        
                        <div class ="comment-sent" style="width: 95%;">
                            <!-- <textarea disabled class="comments-input"></textarea>
                            
                            <button class="approve-button"><i class="fa-solid fa-check"></i></button> -->
                        </div>
                    
                    </div>
        
                </div>
            </div>
                
        <!-- chair panel end -->
            
        
        
    </div> 

               
    <div class="rubric-summary" id="rubric-summary" style="display: none;">
        
        <div class="panel-gradesContainer">                    
                      
            <div class="panel-grades">
            
                <div class="grpDefense-Details" id = "summary-grpDefense-Details">
        
                    <div class="Group-Name">
        
                        <h3>Group</h3>
    
                    </div>

                </div>
                        
                <!-- Chair Panel Dropdown -->

                        
                <div class="chairPgrade">
                <div class = "chairpanelName"><h2>CHAIR PANEL: </h2></span></div>
                    <div class="Defense-Page" id="summaryGrade">

                        <div class="rubric-container">
                        
                            <!-- Group name and title -->

                            <table>
                            
                                <thead>
                                    <tr>
                                        <th class="description-column" colspan="3">
                                            <strong>Rubric Title</strong>
                                        </th>
                                    </tr>
                                                        
                                
                                </thead>
                                
                                <tbody>
                                    <tr>
                                        <th class="description-column">Description</th>
                                        <th class="grade-Desc">Score Description</th>
                                        <th class="grades-column">Grades</th>
                                    </tr>

                                    <tr class="criteria">
                                    
                                        <td class="description">
                                        
                                            <strong>B1. Executive Summary</strong><br>
                                            The project summary includes: a clear, coherent, easily readable & accurate paragraph; consists of complete sentences free from grammatical and factual errors and biases; and includes the right amount of detail.
                                    
                                        </td>
                                        
                                        <td class="grade_description">example description</td>
                                        <td class="score-column"><span class="score"></span></td>
                                    
                                    </tr>
                                  
                                    <!-- More rows as needed -->
                                
                                </tbody>
                                
                                <tbody>
                                  
                                  <tr class="criteria">
                                  
                                      <td class="description">
                                      
                                          <strong>B1. Executive Summary</strong><br>
                                          The project summary includes: a clear, coherent, easily readable & accurate paragraph; consists of complete sentences free from grammatical and factual errors and biases; and includes the right amount of detail.
                                  
                                      </td>
                                      
                                      <td class="grade_description">example description</td>
                                      <td class="score-column"><span class="score"></span></td>
                                  
                                  </tr>
                                
                                  <!-- More rows as needed -->
                              
                              </tbody>

                            </table>
                        </div>
                          
                    </div>
                        
                </div>
<!--                   
                Lead Panel Dropdown -->
                <!-- <div class="leadPanelContent">
                    <div class = "lead-panelName"><h2>LEAD PANEL: </h2></span></div>
                        <div class="Defense-Page" id="leadSummaryGrade">
                            <div class="rubric-container">
                              <div class="rubric-header">
                                <h1>Oral Communication</h1>
                              </div>
                              <table>
                            
                                <thead>
                                
                                    <tr>
                                        <th class="description-column">Description</th>
                                        <th class="grade-Desc">Score Description</th>
                                        <th class="grades-column">Grades</th>
                                    </tr>
                                
                                </thead>
                                
                                <tbody>
                                  
                                    <tr class="criteria">
                                    
                                        <td class="description">
                                        
                                            <strong>B1. Executive Summary</strong><br>
                                            The project summary includes: a clear, coherent, easily readable & accurate paragraph; consists of complete sentences free from grammatical and factual errors and biases; and includes the right amount of detail.
                                    
                                        </td>
                                        
                                        <td class="grade_description">example description</td>
                                        <td class="score-column"><span class="score"></span></td>
                                    
                                    </tr> -->
                                  
                                    <!-- More rows as needed -->
                                
                                <!-- </tbody>
                                
                                <tbody>
                                  
                                  <tr class="criteria">
                                  
                                      <td class="description">
                                      
                                          <strong>B1. Executive Summary</strong><br>
                                          The project summary includes: a clear, coherent, easily readable & accurate paragraph; consists of complete sentences free from grammatical and factual errors and biases; and includes the right amount of detail.
                                  
                                      </td>
                                      
                                      <td class="grade_description">example description</td>
                                      <td class="score-column"><span class="score"></span></td>
                                  
                                  </tr>
                                 -->
                                  <!-- More rows as needed -->
                              
                              <!-- </tbody>

                            </table>
                            </div>
                    </div>
                </div> -->
                  
                <!-- Panel Member 1 Dropdown
                

            <div class="panelMemberContent">

                <div class = "panel-memberName"><h2>PANEL MEMBER: </h2></span></div>

                          <div class="Defense-Page" id="panelMemberSummaryGrade">
                            <div class="rubric-container">
                              <div class="rubric-header">
                                <h1>Project Evaluation</h1>
                              </div>
                              <table>
                                <thead>
                                  <tr>
                                    <th class="description-column">Description</th>
                                    <th class="grade-Desc">Score Description</th>
                                    <th class="grades-column">Grades</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr class="criteria">
                                    <td class="description">
                                      <strong>B3. Project Impact</strong><br>
                                      The project evaluation includes: assessing the project's impact on the community and its potential for future development.
                                    </td>
                                    <td class="grade_description">example description</td>
                                    <td class="score-column"><span class="score"></span></td>
                                  </tr>
                                  More rows as needed
                                  <tr class="criteria">
                                    <td class="description">
                                      <strong>B3. Project Impact</strong><br>
                                      The project evaluation includes: assessing the project's impact on the community and its potential for future development.
                                    </td>
                                    <td class="grade_description">example description</td>
                                    <td class="score-column"><span class="score"></span></td>
                                  </tr>
                                  <tr class="criteria">
                                    <td class="description">
                                      <strong>B3. Project Impact</strong><br>
                                      The project evaluation includes: assessing the project's impact on the community and its potential for future development.
                                    </td>
                                    <td class="grade_description">example description</td>
                                    <td class="score-column"><span class="score"></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
            -->
            <!-- Panel Member 2 Dropdown             

            <div class="panelMember2Content">
                
                <div class = "panel-member2Name"><h2>PANEL MEMBER 2: </h2></span></div>

                    <div class="Defense-Page" id="panelMember2SummaryGrade">
                        <div class="rubric-container">
                            <div class="rubric-header">
                                <h1>Project Evaluation</h1>
                              </div>
                              <table>
                                <thead>
                                  <tr>
                                    <th class="description-column">Description</th>
                                    <th class="grade-Desc">Score Description</th>
                                    <th class="grades-column">Grades</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr class="criteria">
                                    <td class="description">
                                      <strong>B4. Jollibee Burger Steak </strong><br>
                                      The project evaluation includes: assessing the project's impact on the community and its potential for future development.
                                    </td>
                                    <td class="grade_description">example description</td>
                                    <td class="score-column"><span class="score"></span></td>
                                  </tr> -->
                                  <!-- More rows as needed -->
                                  <!-- <tr class="criteria">
                                    <td class="description">
                                      <strong>B4. Jollibee Burger Steak </strong><br>
                                      The project evaluation includes: assessing the project's impact on the community and its potential for future development.
                                    </td>
                                    <td class="grade_description">example description</td>
                                    <td class="score-column"><span class="score"></span></td>
                                  </tr>
                                  <tr class="criteria">
                                    <td class="description">
                                      <strong>B4. Jollibee Burger Steak </strong><br>
                                      The project evaluation includes: assessing the project's impact on the community and its potential for future development.
                                    </td>
                                    <td class="grade_description">example description</td>
                                    <td class="score-column"><span class="score"></span></td>
                                  </tr>
                                  <tr class="criteria">
                                    <td class="description">
                                      <strong>B4. Jollibee Burger Steak </strong><br>
                                      The project evaluation includes: assessing the project's impact on the community and its potential for future development.
                                    </td>
                                    <td class="grade_description">example description</td>
                                    <td class="score-column"><span class="score"></span></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div> -->
                  
                        <!-- Compute Button -->
                        <button class="compute-button" onclick="computeGrades()">Compute</button>
                      </div>
                    </div>    
                </div>

               


                <!-- Modal for Grade Summary -->
                <div id="gradeModal" class="modal">
                    <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Grade Summary</h2>
                    <table id="gradeTable">
                        <thead>
                        <tr>
                            <th>Panel</th>
                            <th>Grade</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Dynamic rows will be inserted here -->
                        </tbody>
                    </table>
                        <div class = "Grades-Verdict" style="margin-top: 4%;">
                            <div class="putangina">

                            <h2>Total Percentage:</h2>

                            </div>
                         
                            <h3> <p>Verdict:</p> </h3>
                         
                            <select id="verdictDropdown">
                          
                                 
                                <option value="Pass"><h4> Pass</h4></option>
                                <option value="Conditional Pass">Conditional Pass</option>
                                <option value="Re-Defense">Re-Defense</option>
                                <option value="Repeat">Repeat</option>
                                
                          
                            </select>
                          
                            <button id="submitGrade">Submit</button>
                        </div>
                    </div>
                </div>

                  
                  
                 
                  
                
                <!-- files -->
                <div class="defaultBody" id="defaultBody" style ="overflow: auto">
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
                <div class="seondaryRubriccont">
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





<!-- ian territory -->
<script> 

document.addEventListener("DOMContentLoaded", function() {
    fetch('capstoneProfessorSession.php')
        .then(response => response.json())
        .then(data => {
            if (data.match) {
                console.log("Session user matches the database.");
                console.log("User ID:", data.account_id);
            } else {
                console.log("Session user does not match the database.");
                // Handle the case where there is no match
            }
        })
        .catch(error => console.error('Error:', error));
});

function fetchAcademicYears() {
    const classDropdown = document.querySelector('.class-Dropdown');
    classDropdown.innerHTML = '<h3>DEFENSE LIST</h3>'; // Clear previous content

    fetch('panelistYears.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.error) {
                console.error(data.error);
            } else {
                console.log('Fetched academic years:', data); // Log fetched data

                // Map and parse academic_years to yearBtn
                const academicYears = data.map(item => {
                    return {
                        yearBtn: parseInt(item.academic_years[0], 10) || 0, // Parse first element of academic_years array to integer
                        acy_id: item.acy_id
                    };
                });

                // Sort the academic years in descending order based on yearBtn
                academicYears.sort((a, b) => b.yearBtn - a.yearBtn);

                console.log('Sorted academic years:', academicYears);

                const container = document.querySelector('.class-Dropdown');

                academicYears.forEach(academicYear => {
                    const year = academicYear.yearBtn;
                    const displayName = `${year}-${year + 1}`;

                    const classListDropdown = document.createElement('div');
                    classListDropdown.className = 'classListDropdown';

                    const button = document.createElement('button');
                    button.className = 'listClass';
                    button.innerHTML = `<h4>COURSES AY ${displayName}</h4>
                                        <span class="selectedClass"></span>
                                        <div class="coursesListed"></div>`;

                    const ul = document.createElement('ul');
                    ul.className = 'menuCourses';
                    ul.style.display = 'none';

                    ['Term 1', 'Term 2', 'Term 3'].forEach((term, index) => {
                        const li = document.createElement('li');
                        li.className = 'term';
                        li.dataset.term = (index + 1).toString();
                        li.textContent = term;

                        ul.appendChild(li);
                    });

                    button.addEventListener('click', () => {
                        ul.style.display = ul.style.display === 'none' ? 'block' : 'none';
                        console.log(`Button for AY ${displayName} clicked`);
                        acy_Stored(year); // Store acy_id instead of year
                        acy_idStored(year); // Store acy_id instead of year
                    });

                    ul.addEventListener('click', (event) => {
                        const selectedTerm = event.target.dataset.term;

                        if (selectedTerm) {
                            console.log(`Selected term: ${selectedTerm}`);
                            storeSelectedTerm(selectedTerm); // Assuming this function handles storing the selected term
                            fetchCourses(button.parentNode, year, selectedTerm); // Pass the year and selectedTerm to fetchCourses

                            
                            let coursesDropdown = button.parentNode.querySelector('.coursesDropdown');
                            if (coursesDropdown) {
                                coursesDropdown.style.display = coursesDropdown.style.display === 'none' ? 'block' : 'none';
                            } else {
                                coursesDropdown = document.createElement('div');
                                coursesDropdown.className = 'coursesDropdown';
                                button.parentNode.appendChild(coursesDropdown);
                            }
                        }
                    });

                    classListDropdown.appendChild(button);
                    classListDropdown.appendChild(ul);
                    container.appendChild(classListDropdown);
                });
            }
        })
        .catch(error => console.error('Error fetching academic years:', error));
}

document.addEventListener('DOMContentLoaded', fetchAcademicYears);


function acy_Stored(year){
    console.log('current:' + year);

    acYear = year; 

    console.log('stored acYear: ' + acYear);

    fetch('storeYear.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'acYear=' + encodeURIComponent(acYear),
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text(); // Get the raw response text
        })
        .then(responseText => {
            console.log('Raw Response:', responseText); // Log the raw response
            return JSON.parse(responseText); // Parse the response as JSON if needed
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}

function acy_idStored(acy_id) {
    fetch('storeacy_id.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'acYear=' + encodeURIComponent(acy_id),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); // Parse the response as JSON
    })
    .then(data => {
        console.log('Received acy_id:', data.acy_id); // Log the received acy_id
        // Use the received acy_id as needed
        return data.acy_id; // Return acy_id for further use if needed
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
}

function storeSelectedTerm(selectedTerm) {
    const termValue = parseInt(selectedTerm); // Parse the selectedTerm as an integer

    fetch('storeSelectedTerm.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            selectedTerm: termValue // Send the integer value
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('Response from storeSelectedTerm:', data);
        if (data.status === 'success') {
            // Handle success message if needed
            console.log('Selected term stored successfully:', termValue);
        } else {
            // Handle error message if needed
            console.error('Error storing selected term:', data.message);
        }
    })
    .catch(error => {
        console.error('Error storing selected term:', error);
    });
}

function dropdownMelon(button) {
    const targetId = button.dataset.target;
    const dropdownContent = document.getElementById(targetId);
    if (dropdownContent) {
        dropdownContent.style.display = dropdownContent.style.display === 'none' ? 'block' : 'none';
    }
}

function fetchCourses(container, year, selectedTerm) {
    let coursesDropdown = container.querySelector('.coursesDropdown');

    if (!coursesDropdown) {
        coursesDropdown = document.createElement('div');
        coursesDropdown.className = 'coursesDropdown';
        container.appendChild(coursesDropdown);
    } else {
        coursesDropdown.innerHTML = '';
    }

    fetch('fetchCoursePanel.php')
        .then(response => response.json())
        .then(coursesData => {
            if (coursesData.error) {
                console.error('Error fetching courses:', coursesData.error);
                return; // Exit early if there's an error
            }

            console.log('Courses:', coursesData);

            fetch('fetchGroupsPanel.php')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(groupsData => {
                    if (groupsData.error) {
                        console.error('Error fetching groups:', groupsData.error);
                        return; // Exit early if there's an error
                    }

                    console.log('Groups:', groupsData);

                    coursesData.forEach(course => {
                        const courseElement = document.createElement('div');
                        courseElement.className = 'course';

                        const courseTitle = document.createElement('h3');
                        courseTitle.className = 'courseNameDisplay';

                        const button = document.createElement('button');
                        button.type = 'button';
                        button.classList.add('classSet');
                        button.textContent = '•••';
                        button.dataset.target = 'dropdown-' + course.course_id;

                        const dropdownContent = document.createElement('div');
                        dropdownContent.classList.add('dropdown-content');
                        dropdownContent.id = 'dropdown-' + course.course_id;
                        dropdownContent.style.display = 'none';

                        const actions = ['Rubric'];
                        actions.forEach(action => {
                            const actionButton = document.createElement('button');
                            actionButton.type = 'button';
                            actionButton.className = 'dropdownbtn';
                            actionButton.textContent = action;
                            actionButton.onclick = () => handleAction(action, course.course_id);
                            dropdownContent.appendChild(actionButton);
                        });

                        courseTitle.textContent = `${course.course_code} - ${course.section} `;
                        courseTitle.appendChild(button);

                        courseElement.appendChild(courseTitle);
                        courseElement.appendChild(dropdownContent);
                        coursesDropdown.appendChild(courseElement);

                        button.addEventListener('click', function() {
                            dropdownMelon(this);
                            console.log('Clicked Course ID:', course.course_id);
                            saveCourseID(course.course_id);
                        });

                        console.log('Course ID:', course.course_id);

                        if (groupsData[course.course_id]) {
                            groupsData[course.course_id].forEach(group_name => {
                                const groupButton = document.createElement('button');
                                groupButton.type = 'button';
                                groupButton.classList.add('createdgroupBTN');
                                groupButton.onclick = function() {
                                    newGroupCreated(course.course_id, group_name);
                                    console.log('AY:', year, 'Term:', selectedTerm, 'Course ID:', course.course_id, 'Course Section:', course.section, 'Course Code:', course.course_code, 'Group Name:', group_name);
                                    const directoryPath = `AY ${year}-${year + 1} > Term ${selectedTerm} > ${course.course_code} - ${course.section} > ${group_name}`;
                                    setDirectory(directoryPath);
                                    setPanelRole();
                                    saveCourseID(course.course_id);
                                    computeGroupName(group_name);
                                    fetchAssessmentData();
                                    rubricDefense(group_name);
                                };
                                groupButton.textContent = group_name;
                                courseElement.appendChild(groupButton);
                            });
                        }
                    });
                })
                .catch(error => console.error('Error fetching groups data:', error));
        })
        .catch(error => console.error('Error fetching courses:', error));
}


function setDirectory(path) {
    console.log('this is the button directory: ', path);

    const fileDirectory = path;
    console.log('this is the actual directory: ', fileDirectory);

    // Prepare the directory steps
    const directorySteps = fileDirectory.split(' > ').join('/');

    // Check the directory using fetch API
    fetch('profSetDirectory.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ directory: directorySteps })
    })
    .then(response => response.json())
    .then(data => {
        if (data.exists) {
            console.log('Directory exists: ', data.path);
        } else {
            console.log('Directory does not exist: ', data.path);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function newGroupCreated(course_id, group_name) {
    var container = document.querySelector('.GroupContainer');
    container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
    console.log(course_id, group_name);
    fetchGroupData(course_id, group_name);
    fetchStudentGroups();
    fetchPanelGroups();
    requirementName();
    fileFeed();
    

    // Prepare the data to be sent in the request body
    const formData = new FormData();
    formData.append('course_id', course_id);
    formData.append('group_name', group_name);

    // Send an AJAX request using fetch
    fetch('fetchGroupName.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text();
    })
    .then(result => console.log(result))
    .catch(error => console.error('Error:', error));
}


function fetchGroupData(course_id, group_name) {
    // Clear the existing content in the group_name element
    document.getElementById('group_name').textContent = '';

    fetch('fetchGroupName.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            'course_id': course_id,
            'group_name': group_name
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Create a new h3 element for displaying the group name
            const groupHeader = document.createElement('h3');
            groupHeader.textContent = data.group_name;

            // Clear any existing content in the group_name element
            const groupContainer = document.getElementById('group_name');
            groupContainer.innerHTML = '';
            
            // Append the h3 element to the group_name element
            groupContainer.appendChild(groupHeader);

            console.log('Group Name:', data.group_name);
            console.log('Student Group ID:', data.student_group_id);

            // Store data in session using JavaScript (if needed)
            sessionStorage.setItem('student_group_id', data.student_group_id);
        } else {
            console.error('Error:', data.message);
        }
    })
    .catch(error => console.error('Fetch error:', error));
}


function fetchStudentGroups() {
    fetch('fetchStudentGroups.php')
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error(data.error); // Output any error message
            } else {
                const groupMembersContainer = document.querySelector('.GroupmembersContainer');
                
                // Clear the container first
                groupMembersContainer.innerHTML = '';

                // Output adviser's name or "No Adviser"
                const adviserElement = document.createElement('h4');
                adviserElement.textContent = data.adviser ? "Adviser - " + data.adviser : "No Adviser";
                adviserElement.style.textAlign = 'left';
                groupMembersContainer.appendChild(adviserElement);

                // Process the array of students
                if (data.students && data.students.length > 0) {
                    data.students.forEach(student => {
                        const studentElement = document.createElement('h4');
                        studentElement.textContent = student;
                        studentElement.style.textAlign = 'left';
                        groupMembersContainer.appendChild(studentElement);
                    });
                } else {
                    console.log("No students found.");
                }
            }
        })
        .catch(error => console.error('Error:', error));
}





function fetchPanelGroups() {
    const PanelistContainer = document.querySelector('.PanelistContainer');
    PanelistContainer.innerHTML = ''; // Clear existing content

    fetch('fetchPanelGroups.php')
        .then(response => response.json())
        .then(data => {
            // Check for error message
            if (data.error) {
                const errorElement = document.createElement('h4');
                errorElement.textContent = data.error;
                errorElement.style.textAlign = 'left';
                PanelistContainer.appendChild(errorElement);
            } else {
                // Iterate through panelists data
                data.forEach(panelist => {
                    const panelistName = `${panelist.firstName} ${panelist.lastName}`;
                    const panelistRole = panelist.panelRole;
                    
                    // Create an h4 element for each panelist
                    const panelistElement = document.createElement('h4');
                    panelistElement.textContent = `${panelistRole} - ${panelistName}`;
                    panelistElement.style.textAlign = 'left'; // Align text to the left

                    // Append the h4 element to PanelistContainer
                    PanelistContainer.appendChild(panelistElement);
                });
            }
        })
        .catch(error => {
            console.error('Error fetching panelist data:', error);
        });
}


//files

function requirementName() {
    const filesContainer = document.querySelector('.filesContainer');
    filesContainer.innerHTML = ''; // Clear existing content

    fetch('requirementName.php')
        .then(response => response.json())
        .then(data => {

            if (data.length === 0) {
                // If no data is fetched, display a message
                const noFilesMessage = document.createElement('h4');
                noFilesMessage.textContent = 'No files uploaded';
                noFilesMessage.style.display = 'flex';
                noFilesMessage.style.justifyContent = 'center';
                noFilesMessage.style.marginTop = '130px';
                noFilesMessage.classList.add('noFilesMessage');
                filesContainer.appendChild(noFilesMessage);
            } else {
            console.log('Received reqName data:', data);
            data.forEach(reqName => {
                // Create a documentationCont element
                const documentationCont = document.createElement('div');
                documentationCont.classList.add('documentationCont');

                // Create Document Requirement text
                const docRequirement = document.createElement('div');
                docRequirement.textContent = reqName.reqName; // Access reqName property
                documentationCont.appendChild(docRequirement);

                // Create ReqDocumentation container
                const reqDocumentation = document.createElement('div');
                reqDocumentation.classList.add('ReqDocumentation');

                // Create attachedDocumentation div
                const attachedDocumentation = document.createElement('div');
                attachedDocumentation.classList.add('attachedDocumentation');
                attachedDocumentation.setAttribute('onclick', `openModal('${encodeURIComponent(reqName.filePath)}')`);
                attachedDocumentation.onclick = function() {
                        console.log('Open modal for reqName:', reqName.reqName, 'path', reqName.filePath);
                        openModal(reqName.filePath);
                    };

                // Create file icon
                const fileIcon = document.createElement('img');
                fileIcon.src = 'menu_assets/file-icon.png';
                fileIcon.alt = 'file icon';
                fileIcon.classList.add('fileIcon');
                attachedDocumentation.appendChild(fileIcon);

                // Create Recent-fileName div
                const recentFileName = document.createElement('div');
                recentFileName.textContent = reqName.fileName;
                recentFileName.classList.add('Recent-fileName');
                attachedDocumentation.appendChild(recentFileName);

                reqDocumentation.appendChild(attachedDocumentation);

                // Create divDocuReqLogs div
                const divDocuReqLogs = document.createElement('div');
                divDocuReqLogs.classList.add('divDocuReqLogs');

                // Create toggle button with icon
                const toggleButton = document.createElement('button');
                toggleButton.classList.add('DocuReqLogs');
                toggleButton.innerHTML = '<i class="fa-solid fa-ellipsis"></i>';

                // Add onclick event to toggle logs
                toggleButton.onclick = function() {
                    console.log('Clicked toggleButton for reqName:', reqName);
                    // Implement toggleDocuReqLogs, clickedRequirement, and popUpLog as needed
                    toggleDocuReqLogs(reqName); // Pass reqName or related data as needed
                    clickedRequirement(reqName.reqName);
                    popUpLog(reqName.reqName);
                };

                divDocuReqLogs.appendChild(toggleButton);

                reqDocumentation.appendChild(divDocuReqLogs);

                documentationCont.appendChild(reqDocumentation);

                // Append documentationCont to filesContainer
                filesContainer.appendChild(documentationCont);
            });
        }
        })
        .catch(error => console.error('Error fetching reqName data:', error));
}



function clickedRequirement(reqName) {
    // Fetch API request
    fetch('sessionReqName.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ reqName: reqName }), // Use reqName parameter passed to function
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Failed to save reqName to session');
        }
        console.log('reqName saved to session successfully');
    })
    .catch(error => console.error('Error saving reqName to session:', error));
}


function popUpLog(reqName) {
    const logContainer = document.querySelector('.fileLogsPopup'); // Select the container
    logContainer.innerHTML = '';

    // Create an <h4> element
    const heading = document.createElement('h3');
    heading.textContent = reqName;

    // Append the <h4> element to the logContainer
    logContainer.appendChild(heading);

    fetch('popupFile.php')
        .then(response => response.json())
        .then(data => {
            if (data.filePaths && data.filePaths.length > 0) {
                data.filePaths.forEach((filePath, index) => {
                    console.log(filePath);

                    // Extract the file name from the file path
                    const fileName = filePath.split('/').pop();

                    // Create a new log item div
                    const logItem = document.createElement('div');
                    logItem.className = 'logItem';
                    logItem.id = `logItem${index + 1}`;
                    logItem.setAttribute('onclick', `openModal('${filePath}')`);
                    logItem.onclick = function() {
                        console.log('Open modal for reqName:', reqName, 'path', filePath);
                        openModal(filePath);
                    };

                    // Create and append the file icon image
                    const img = document.createElement('img');
                    img.src = 'https://via.placeholder.com/24';
                    img.alt = 'file icon';
                    logItem.appendChild(img);

                    // Create and append the file name div
                    const fileNameDiv = document.createElement('div');
                    fileNameDiv.className = 'fileName';
                    fileNameDiv.textContent = fileName;
                    logItem.appendChild(fileNameDiv);

                    // Append the log item to the container
                    logContainer.appendChild(logItem);
                });
            } else {
                // If no files are uploaded or found
                const noFilesMessage = document.createElement('div');
                noFilesMessage.textContent = 'No Files Uploaded';
                logContainer.appendChild(noFilesMessage);
            }
        })
        .catch(error => console.error('Fetch error: ', error));
}



function fileFeed() {
    const defaultBody = document.querySelector('.defaultBody'); // Select the container
    defaultBody.innerHTML = ''; // Clear previous content if any

    fetch('fileFeed.php', {
        method: 'GET' // Assuming your PHP script uses GET method
    })
    .then(response => response.json()) // Parse the JSON response
    .then(data => {
        // Log the fetched data to the console
        console.log('Fetched data:', data);

        // Iterate over each item in the fetched data
        data.forEach(item => {
            // Create elements for each file message
            const recentFilesDiv = document.createElement('div');
            recentFilesDiv.classList.add('recentFiles'); // Add class 'recentFiles'

            const fileMessage = document.createElement('div');
            fileMessage.classList.add('fileMessage', 'left');
            fileMessage.setAttribute('onclick', `openModal('${item.filePath}')`);
            fileMessage.onclick = function() {
                console.log('Open modal for reqName:', item.reqName, 'path', item.filePath);
                openModal(item.filePath);
            };

            // Create sender element
            const sender = document.createElement('div');
            sender.classList.add('sender');
            sender.textContent = item.firstName + ' ' + item.lastName; // Concatenate first name and last name

            // Create fileInfo container
            const fileInfoDiv = document.createElement('div');
            fileInfoDiv.classList.add('fileInfo');

            // Create fileIcon element
            const fileIconImg = document.createElement('img');
            fileIconImg.src = 'menu_assets/file-icon.png'; // Sample file icon
            fileIconImg.alt = 'file icon';
            fileIconImg.classList.add('fileIcon');

            const fileDetailsDiv = document.createElement('div');
            fileDetailsDiv.classList.add('fileDetails');

            const fileNameStrong = document.createElement('strong');
            fileNameStrong.textContent = item.fileName + ' - V' + item.version + '.pdf';

            fileDetailsDiv.appendChild(fileNameStrong);
            fileInfoDiv.appendChild(fileIconImg); // Append file icon to fileInfoDiv
            fileInfoDiv.appendChild(fileDetailsDiv); // Append file details to fileInfoDiv
            fileMessage.appendChild(sender);
            fileMessage.appendChild(fileInfoDiv); // Append fileInfoDiv to fileMessage
            recentFilesDiv.appendChild(fileMessage); // Append fileMessage to recentFilesDiv
            defaultBody.appendChild(recentFilesDiv); // Append recentFilesDiv to defaultBody
        });

    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });
}

//files
function groups() {
    fetch('FetchGroups.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Data:', data); // Debug statement to check data structure
            // Check if the data contains an error
            if (data.error) {
                console.error('Error in data:', data.error);
            } else {
                // Assuming data is an array of group names
                data.forEach(group_name => {
                    console.log(group_name);
                    // Do whatever you need with the group_name here
                });
            }
        })
        .catch(error => console.error('Error fetching data:', error));
}


function reqName() {
    const createdReq = document.querySelector('.createdReq');
    createdReq.innerHTML = ''; // Clear previous content

    fetch('createdRequirement.php') // Replace 'path_to_your_php_file.php' with your actual PHP file path
        .then(response => response.json())
        .then(data => {
            // Check if data contains reqNames array
            if (data.reqNames && Array.isArray(data.reqNames)) {
                // Loop through the reqNames array and append each item to createdReq
                data.reqNames.forEach(reqName => {
                    const reqElement = document.createElement('div');
                    reqElement.textContent = reqName;
                    createdReq.appendChild(reqElement);
                });
            } else {
                console.error('Invalid data format or missing reqNames array');
            }
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}





function fetchRubric() {
    const rubricContainer = document.querySelector('.secondaryRubriccont');
    rubricContainer.innerHTML = ''; // Clear previous content

    // const rubric = document.querySelector('.table');
    // rubric.innerHTML = ''; // Clear previous content

    fetch('fetchDisplayRubric.php')
        .then(response => response.json())
        .then(data => {
            // Assuming data is an array of results
            console.log('Fetched Data:', data); // Log the entire data fetched from the server

            data.forEach(result => {
                // Display only the results here
                console.log("Rubric ID: " + result.rubrics_id);
                console.log("Rubric Name: " + result.rubric_name);
                console.log("Level Details: ");
                result.level_details.forEach(detail => {
                    console.log("- " + detail);
                });
                console.log("Level Percentages: ");
                console.log(result.level_percentage); // Log the array of level percentages directly
                console.log("Criteria: ");
                result.criteria.forEach((criteria, index) => {
                    console.log("Index: " + index);
                    console.log("Criteria Name: " + criteria.criteria_name);
                    console.log("Criteria Details:");
                    console.log("(" + criteria.criteria_details.length + ") [" + criteria.criteria_details.map(detail => "'" + detail + "'").join(', ') + "]");

                    // Display the criteria details array based on the fetched data
                    const criteriaDetailsArray = criteria.criteria_details;
                    console.log(criteriaDetailsArray); // Log the criteria details array separately
                    // Log the rubric percentage
                    console.log("Rubric Percentage: " + criteria.rubric_percentage);
                });

                // Create a new h1 element to display the rubric name
                const rubricNameH1 = document.createElement('h1');
                rubricNameH1.textContent = result.rubric_name;
                rubricContainer.appendChild(rubricNameH1);

                // Create the table below the rubric name
                const table = document.createElement('table');
                const thead = document.createElement('thead');
                const tr = document.createElement('tr');

                // Table headers based on fetched data
                const headers = [
                    "Overall Percentage",
                    "Learning Outcomes",
                    "Criteria",
                    ...result.level_details.map((detail, index) => `${detail} (${result.level_percentage[index]}%)`)
                ];

                headers.forEach(headerText => {
                    const th = document.createElement('th');
                    th.innerHTML = headerText;
                    tr.appendChild(th);
                });

                thead.appendChild(tr);
                table.appendChild(thead);

                // Create table body to display criteria details
                const tbody = document.createElement('tbody');
                result.criteria.forEach((criteria, index) => {
                    const tr = document.createElement('tr');

                    // Create a cell for rubric percentage
                    const percentageTd = document.createElement('td');
                    percentageTd.innerHTML = criteria.rubric_percentage;
                    tr.appendChild(percentageTd);

                    // Create a cell for criteria name
                    const nameTd = document.createElement('td');
                    nameTd.innerHTML = criteria.criteria_name.join(', ');
                    tr.appendChild(nameTd);

                    // Create cells for each criteria detail
                    criteria.criteria_details.forEach((detail, i) => {
                        const detailTd = document.createElement('td');
                        detailTd.innerHTML = detail;
                        tr.appendChild(detailTd);

                        // Duplicate the first detail (index 0)
                        if (i === 0) {
                            const duplicateDetailTd = document.createElement('td');
                            duplicateDetailTd.innerHTML = detail;
                            tr.appendChild(duplicateDetailTd);
                        }
                    });

                    // Append the row to tbody
                    tbody.appendChild(tr);
                });

                table.appendChild(tbody);
                rubricContainer.appendChild(table);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
}


function clearForm() {
        document.getElementById('selectedPanelist').reset();
    }


function handleAction(action, course_id) {
    console.log('Clicked:', course_id);
    switch (action) {
        case 'Rubric':
            rubric_preview();
            fetchRubric();
            break;
    }
}


function saveCourseID(courseID) {
    fetch('fetchCourseID.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ course_id: courseID })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Course ID saved in session:', data.course_id);
        } else {
            console.error('Failed to save course ID in session:', data.error);
        }
    })
    .catch(error => console.error('Fetch error:', error));
}






function coursesData() {
    fetch('repositoryDirectory.php') // Replace with your PHP script URL
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data); // Output fetched JSON data to console (for demonstration)
            // Process the fetched data here
            processData(data);
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

function processData(data) {
    // Check if the data is an object with status and message properties
    if (data && data.status && data.message) {
        // Check for success status or handle errors
        if (data.status === "success") {
            console.log(data.message); // Log success message
        } else {
            console.error('Error:', data.message); // Log error message
        }
    } else {
        console.error('Error: Data is not in expected format.');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    coursesData();
});



function setPanelRole() {
    fetch('fetchPanelRole.php') // Replace with the path to your PHP script
        .then(response => response.json())
        .then(data => {
            // Process data
            console.log('Panel Role:', data.panelRole);
            
            // Assuming you want to update an element with class .panel-Role
            const panelElement = document.querySelector('.panel-Role');
            const gradesContainer = document.querySelector('.panel-grades');
            const summaryButton = document.querySelector('.summary-Btn');

            if (panelElement) {
                // Create a new h3 element
                const h3Element = document.createElement('h2');
                h3Element.textContent = data.panelRole; // Set text content to fetched panelRole
                
                // Clear existing content and append the new h3 element
                panelElement.innerHTML = ''; // Clear existing content
                panelElement.appendChild(h3Element); // Append the new h3 element
                
                // Additional logic based on panelRole value
                if (data.panelRole === 'Chair Panel') {
                    // Unhide .panel-grades and .summary-Btn if panelRole is 'Chair Panel'
                    if (gradesContainer) {
                        gradesContainer.style.display = ''; // Show the container
                        console.log('.panel-grades shown.');
                    } else {
                        console.warn('Element with class panel-grades not found.');
                    }

                    if (summaryButton) {
                        summaryButton.style.display = ''; // Show the summary button
                        console.log('.summary-Btn shown.');
                    } else {
                        console.warn('Element with class summary-Btn not found.');
                    }
                } else {
                    // Hide .panel-grades and .summary-Btn if panelRole is not 'Chair Panel'
                    if (gradesContainer) {
                        gradesContainer.style.display = 'none'; // Hide the container
                        console.log('.panel-grades hidden.');
                    } else {
                        console.warn('Element with class panel-grades not found.');
                    }

                    if (summaryButton) {
                        summaryButton.style.display = 'none'; // Hide the summary button
                        console.log('.summary-Btn hidden.');
                    } else {
                        console.warn('Element with class summary-Btn not found.');
                    }
                }
            } else {
                console.error('Element with class .panel-Role not found.');
            }
        })
        .catch(error => {
            console.error('Error fetching panel role:', error);
        });
}








var feedbackList = [];

// Function to add feedback
function addFeedback(type, initialRemark = '') {
    var wrapper = document.createElement('div');
    wrapper.classList.add('feedback-wrapper');

    // Create and add a type label
    var typeLabel = document.createElement('div');
    typeLabel.classList.add('feedback-type-label');
    typeLabel.textContent = type; // Set the text to the feedback type
    wrapper.appendChild(typeLabel); // Add the label to the wrapper

    var container = document.createElement('div');
    container.classList.add('feedback-input-container');

    var textarea = document.createElement('textarea');
    textarea.classList.add('feedback-input');
    textarea.placeholder = 'Enter your text here'; // Placeholder remains consistent
    textarea.value = initialRemark; // Set the initial value of the textarea

    var deleteButton = document.createElement('button');
    deleteButton.classList.add('delete-button');
    deleteButton.innerHTML = '<i class="fa-solid fa-trash"></i>';
    deleteButton.addEventListener('click', function() {
        wrapper.remove(); // Remove the wrapper on button click
        removeFromFeedbackList(textarea.value, type); // Pass type to removeFromFeedbackList
    });

    container.appendChild(textarea);
    container.appendChild(deleteButton);

    wrapper.appendChild(container);

    document.getElementById('commentsSection').appendChild(wrapper);

    // Add event listener to capture text content when user finishes typing
    textarea.addEventListener('input', function() {
        // Update the feedback list with the latest textarea value
        updateFeedbackInList(textarea.value, type, wrapper);
    });
}






// Function to update the feedback list
function updateFeedbackInList(text, type, container) {
    // Find if there is already an entry in the feedbackList for this container
    var existingEntry = feedbackList.find(entry => entry.container === container);

    if (existingEntry) {
        // Update the text if the entry already exists
        existingEntry.text = text;
    } else {
        // Add a new entry if none exists for this container
        feedbackList.push({ type: type, text: text, container: container });
    }
}


// Function to remove feedback from the list
function removeFromFeedbackList(text, type) {
    feedbackList = feedbackList.filter(item => !(item.text === text && item.type === type));
}


// Function to clear comments section
function clearCommentsSection() {
    var commentsSection = document.querySelector('.comments-section');
    if (commentsSection) {
        commentsSection.innerHTML = ''; // Clear the contents of .comments-section
    } else {
        console.error('Comments section not found');
    }
}

// Function to send feedback
function sendFeedback() {
    clearCommentsSection();

    // Log the feedback list and selected options
    console.log('Feedback List:', feedbackList);
    console.log('Selected Options:', selectedOptions);

    feedbackList.forEach(item => {
        var panelCommentsDiv = document.createElement('div');
        panelCommentsDiv.classList.add('panel-comments');

        var commentsSection = document.querySelector('.comments-section');
        if (commentsSection) {
            commentsSection.appendChild(panelCommentsDiv);
        } else {
            console.error('Comments section not found');
            return;
        }

        var commentSentDiv = document.createElement('div');
        commentSentDiv.classList.add('comment-sent');
        commentSentDiv.style.width = '95%';

        var textarea = document.createElement('textarea');
        textarea.classList.add('comments-input');
        textarea.setAttribute('disabled', '');
        textarea.textContent = item.text;

        commentSentDiv.appendChild(textarea);

        commentsSection.appendChild(commentSentDiv);
    });

    printSelectedOptions();

    // Send feedback data as a POST request
    fetch('gradingRubric.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ feedbackList: feedbackList, selectedOptions: selectedOptions })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Feedback submitted successfully:', data);
    })
    .catch(error => {
        console.error('Error submitting feedback:', error);
    });

    // Clear feedback list after submission
    feedbackList = [];
}








function rubricDefense(groupName) {
    fetch('fetchDisplayRubric.php')
        .then(response => response.json())
        .then(data => {
            const tableElement = document.querySelector('.table');
            if (tableElement) {
                tableElement.innerHTML = '';
            } else {
                console.error('Table element not found');
                return;
            }

            const table = document.createElement('table');
            const thead = document.createElement('thead');
            const tbody = document.createElement('tbody');

            const headerRow = document.createElement('tr');
            const headers = ["Criteria", "Criteria Details", "Score Description", "Grades"]; //header rubric
            headers.forEach(headerText => {
                const th = document.createElement('th');
                th.textContent = headerText;
                headerRow.appendChild(th);
            });
            thead.appendChild(headerRow);
            table.appendChild(thead);
            tableElement.appendChild(table);

            data.forEach(result => {
                result.criteria.forEach((criteria, criteriaIndex) => {
                    const row = document.createElement('tr');
                    row.classList.add('criteria');

                    const col1 = document.createElement('td');
                    col1.classList.add('description');
                    col1.textContent = criteria.criteria_name;
                    row.appendChild(col1);

                    const col2 = document.createElement('td');
                    col2.classList.add('description');
                    col2.textContent = criteria.criteria_details[0];
                    row.appendChild(col2);

                    const col3 = document.createElement('td');
                    col3.classList.add('grade_description');
                    col3.textContent = criteria.criteria_details[0]; // Default to the first detail
                    row.appendChild(col3);

                    const col4 = document.createElement('td');
                    col4.classList.add('score-column');

                    const select = document.createElement('select');
                    select.classList.add('score-select');

                    // Add a blank first option
                    const blankOption = document.createElement('option');
                    blankOption.value = '';
                    blankOption.textContent = '';
                    select.appendChild(blankOption);

                    // Add options from result.level_details and result.level_percentage
                    result.level_details.forEach((detail, idx) => {
                        const option = document.createElement('option');
                        option.value = result.level_percentage[idx]; // Use corresponding percentage as the value
                        option.textContent = `${detail} (${result.level_percentage[idx]}%)`;
                        select.appendChild(option);
                    });

                    // Set the default selected value
                    const weightedGrade = weightedGrades[criteriaIndex];
                    if (weightedGrade !== undefined) {
                        for (let i = 0; i < select.options.length; i++) {
                            if (select.options[i].value == weightedGrade) {
                                select.selectedIndex = i;
                                col3.textContent = criteria.criteria_details[i]; // Update description based on selected index
                                handleSelectChange({ target: select }, criteria.criteria_name); // Call handler for default value
                                break;
                            }
                        }
                    }

                    // Handle the change event to update the criteria details based on the selected option
                    select.addEventListener('change', function(event) {
                        const selectedIndex = select.selectedIndex - 1; // Adjust for the blank option
                        if (selectedIndex >= 0) {
                            col3.textContent = criteria.criteria_details[selectedIndex];
                        } else {
                            col3.textContent = ''; // Clear the text if the blank option is selected
                        }
                        handleSelectChange(event, criteria.criteria_name);
                    });

                    col4.appendChild(select);
                    row.appendChild(col4);
                    tbody.appendChild(row);
                });

                const rubricHeader = document.querySelector('.rubric-header');
                if (rubricHeader) {
                    rubricHeader.innerHTML = `<h1>${result.rubric_name}</h1>`;
                } else {
                    console.error('Rubric header not found');
                }
            });

            table.appendChild(tbody);

            const groupDiv = document.querySelector('.Group.Name');
            if (groupDiv) {
                groupDiv.innerHTML = `<h3>${groupName}</h3>`;
            } else {
                console.error('Group div not found');
            }
        })
        .catch(error => console.error('Error fetching data:', error));
}



let weightedGrades = [];
let remarkTypes = [];
let remarks = [];

function fetchAssessmentData() {
    fetch('fetchAssessmentData.php') // Replace with the actual path to your PHP file
        .then(function(response) {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(function(data) {
            if (data.error || data.weightedGrades.length === 0) {
                console.log('There is no grade and comment yet.');
                weightedGrades = [];
                remarkTypes = [];
                remarks = [];
                feedbackList = []; // Clear feedbackList when no data is available

                // Clear existing feedback containers
                const commentsSection = document.getElementById('commentsSection');
                if (commentsSection) {
                    commentsSection.innerHTML = ''; // Clear existing feedback containers
                } else {
                    console.error('Comments section not found');
                }
            } else {
                console.log('Weighted Grades:', data.weightedGrades);
                console.log('Remark Types:', data.remarkTypes);
                console.log('Remarks:', data.remarks);

                // Store the weighted grades, remark types, and remarks for later use
                weightedGrades = data.weightedGrades;
                remarkTypes = data.remarkTypes;
                remarks = data.remarks;

                // Initialize feedbackList
                feedbackList = remarkTypes.map((type, index) => {
                    return {
                        type: type,
                        text: remarks[index] || '' // Use empty string if no corresponding remark
                    };
                });

                // Log weightedGrades, remarkTypes, remarks, and feedbackList to check their values
                console.log('Stored Weighted Grades:', weightedGrades);
                console.log('Stored Remark Types:', remarkTypes);
                console.log('Stored Remarks:', remarks);
                console.log('Feedback List:', feedbackList);

                // Clear existing feedback containers
                const commentsSection = document.getElementById('commentsSection');
                if (commentsSection) {
                    commentsSection.innerHTML = ''; // Clear existing feedback containers

                    // Create feedback containers based on valid remark types and remarks
                    remarkTypes.forEach((type, index) => {
                        // Ensure type and corresponding remark are not empty
                        if (type.trim() !== '' && (remarks[index] || '').trim() !== '') {
                            const remark = remarks[index] || ''; // Provide a default value if no remark is available
                            addFeedback(type, remark);
                        }
                    });

                    // Log message if no valid remark types and remarks are available
                    if (remarkTypes.every(type => type.trim() === '') || remarks.every(remark => (remark || '').trim() === '')) {
                        console.log('No valid remark types or remarks available.');
                    }
                } else {
                    console.error('Comments section not found');
                }
            }
        })
        .catch(function(error) {
            console.error('Fetch error:', error);
        });
}











let selectedOptions = []; // Array to store selected options

// Function to print all selected options and their percentages
function printSelectedOptions() {
    console.log("Selected Options and Criteria Details:");
    selectedOptions.forEach(option => {
        console.log(`${option.criteriaName}: ${option.selectedPercentage}%`);
    });
}

function updateSelectedOption(criteriaName, selectedPercentage) {
    const existingIndex = selectedOptions.findIndex(option => option.criteriaName === criteriaName);

    if (existingIndex !== -1) {
        // Update existing entry
        selectedOptions[existingIndex].selectedPercentage = selectedPercentage;
    } else {
        // Add new entry
        const newOption = {
            criteriaName: criteriaName,
            selectedPercentage: selectedPercentage
        };
        selectedOptions.push(newOption);
    }
}

// Function to handle dropdown selection change
function handleSelectChange(event, criteriaName) {
    const selectedPercentage = parseInt(event.target.value, 10); // Get the selected percentage value from the dropdown
    updateSelectedOption(criteriaName, selectedPercentage); // Update the selected option
    printSelectedOptions(); // Print all selected options (optional)
}

document.addEventListener('DOMContentLoaded', fetchAcademicYears);


// start of verdict page


function computeGroupName(group_name) {
    const panelElement = document.querySelector('.Group-Name');
    panelElement.innerHTML = `<h2>${group_name}</h2>`;
}

const summaryBtn = document.querySelector('.summary-Btn');

// Add an event listener for the click event
summaryBtn.addEventListener('click', function() {
    gradeSummary();
    fetchResults();
});

function fetchResults() {
    Promise.all([
        fetch('fetchDisplayRubric.php').then(response => response.json()),
        fetch('fetchPanelistGrade.php').then(response => response.json())
    ])
    .then(([rubricData, testData]) => {
        // Log the entire data fetched from the server
        console.log('Fetched Rubric Data:', rubricData);
        console.log('Fetched Test Data:', testData);

        // Clear existing content in gradeTable
        const gradeTable = document.getElementById('gradeTable');
        gradeTable.innerHTML = ''; // Clear existing content

        // Create thead for table
        const thead = document.createElement('thead');
        const headerRow = document.createElement('tr');

        // Add headers for criteria and grade
        const criteriaHeader = document.createElement('th');
        criteriaHeader.textContent = 'Criteria';

        const gradeHeader = document.createElement('th');
        gradeHeader.textContent = 'Grade';

        // Append headers to header row
        headerRow.appendChild(criteriaHeader);
        headerRow.appendChild(gradeHeader);

        // Append header row to thead
        thead.appendChild(headerRow);

        // Append thead to gradeTable
        gradeTable.appendChild(thead);

        // Create tbody for table
        const tbody = document.createElement('tbody');

        // Process testData for tbody content
        if (testData.error) {
            console.error('Error in testData:', testData.error);
        } else {
            // Loop through professorsData
            testData.professorsData.forEach(professor => {
                // Create a row for each professor
                const row = document.createElement('tr');

                // Create cells for panel role and grade
                const criteriaCell = document.createElement('td');
                criteriaCell.textContent = professor.panelRole; // Assuming panelRole represents criteria

                const gradeCell = document.createElement('td');
                const averageGrade = parseFloat(professor.averageWeightedGrade); // Convert to number
                gradeCell.textContent = isNaN(averageGrade) ? 'N/A' : averageGrade.toFixed(2); // Format as number with 2 decimals

                // Append cells to row
                row.appendChild(criteriaCell);
                row.appendChild(gradeCell);

                // Append row to tbody
                tbody.appendChild(row);
            });
        }

        // Append tbody to gradeTable
        gradeTable.appendChild(tbody);

        // Update totalPercentage
        const totalPercentage = document.querySelector('.putangina'); // Select element by class name
const h2Element = document.createElement('h2'); // Create an <h2> element

if (!testData.error) {
    const formattedAverage = parseFloat(testData.overallAverage).toFixed(2); // Convert to number and format as 2 decimals
    h2Element.textContent = `Total Average: ${formattedAverage}%`; // Display 'Total Average: <average>%'
} else {
    h2Element.textContent = 'Total Average: N/A'; // Display 'Total Average: N/A' if there's an error
}

// Replace the existing content with the <h2> element
totalPercentage.innerHTML = ''; // Clear existing content
totalPercentage.appendChild(h2Element); // Append the <h2> element

        // Populate verdictDropdown
        const verdictDropdown = document.getElementById('verdictDropdown');
        // Clear existing options
        verdictDropdown.innerHTML = '';
        // Define options
        const verdictOptions = [
            { value: 'Pass', text: 'Pass' },
            { value: 'Conditional Pass', text: 'Conditional Pass' },
            { value: 'Re-Defense', text: 'Re-Defense' },
            { value: 'Repeat', text: 'Repeat' }
        ];
        // Create and append options
        verdictOptions.forEach(option => {
            const optionElement = document.createElement('option');
            optionElement.value = option.value;
            optionElement.textContent = option.text;
            verdictDropdown.appendChild(optionElement);
        });

        // Rename modal-content to Grade Summary
        const modalContent = document.querySelector('.modal-content');
        modalContent.querySelector('h2').textContent = 'Grade Summary';
    })
    .catch(error => console.error('Error fetching data:', error));
}


</script>